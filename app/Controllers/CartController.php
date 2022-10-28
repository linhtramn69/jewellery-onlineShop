<?php
    namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Support\Facades\Date;
use PDOException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../vendor/autoload.php';
    class CartController extends BaseController{
        public function showCart(){
             if (!auth()) {
            $product = Product::where('ID_type','L01')->limit(6)->get();
            return $this->render('home/index',['products'=>$product]);
        }
        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
        $data = ['carts' => CartDetail::join('products', 'products.ID_product', '=', 'cart_detail.ID_product')->where('ID_cart', $ma_gh)->get()];
        $this->render('products/cart', $data);
        }
        public function addCart(){
            if (!auth()) {
                return $this->render('auth/Login');
            } 
            $soluongmua = 1;
            $masp = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $masp = $_POST['ID_product'];
                $soluongmua = $_POST['soluong'];
            }
            $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
            try{
                CartDetail::create([
                    'ID_cart' => $ma_gh,
                    'ID_product' => $masp,
                    'quanlity' => $soluongmua
                ]);
                session()->setFlash(\FLASH::SUCCESS, "Successfully !");
            } catch(PDOException ){
                $so_luong = CartDetail::where('ID_product', $masp)->where('ID_cart', $ma_gh)->first()->quanlity;
                CartDetail::where('ID_product', $masp)->where('ID_cart', $ma_gh)->update([
                'quanlity' => ($so_luong + $soluongmua)
                ]);
            }
            redirect('/cart');
        }
        public function deleteCart(){
            $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
            CartDetail::where('ID_cart', $ma_gh)->where('ID_product', $_GET['delete'])->delete();
            redirect('/cart');
            
        }
        public function pay(){
            $ma_gh = Cart::join('users','users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
            $carts = CartDetail::where('ID_cart',$ma_gh)->get();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $bill = Bill::create(
                    [
                      'full_name' => $_POST['name'],
                      'number_phone' => $_POST['sdt'],
                      'email_pay' => $_POST['email_pay'],
                      'address' => $_POST['address'],
                      'ID_user' =>  User::where('username', auth()->username)->first()->ID_user,
                      'date_time' => Date::now(),
                      'total' => $_POST['tongtien'],
                      'status_bill' => 0,
                    ]
                );
              
                foreach($carts as $cart){
                    $bill_detail = BillDetail::create(
                        [
                            'ID_bill' => $bill->ID_bill,
                            'ID_product' => $cart->ID_product,
                            'quanlity' => $cart ->quanlity,
                            'note' => $_POST['note']
                        ]
                        );
                
                    CartDetail::where('ID_product', $cart->ID_product)->where('ID_cart',$ma_gh)->delete();    
                }
                if($_POST['flexRadioDefault']== '1'){
                    $httt = 'Tiền mặt';
                }
                else{
                    $httt = 'Chuyển khoản';
                }

                if($_POST['note']==null){
                    $ghi_chu = 'Không có';
                }
                else $ghi_chu = $_POST['note'];
        
                if($bill){
                    $mail = new PHPMailer(true);
                   $mail->isSMTP();
                   $mail->CharSet  = "utf-8";
                   $mail->Host = 'smtp.gmail.com';
                   $mail->SMTPAuth = true;
                   $mail->Username = 'duendeservice@gmail.com';
                   $mail->Password = 'vznrmzgdbdyhzsta';
                   $mail->SMTPSecure = 'ssl';
                   $mail->Port = 465;
                   $mail->setFrom('duendeservice@gmail.com');
                   $mail->addAddress($_POST["email_pay"]);
                   $mail->isHTML(true);
                   $mail->Subject = "Thông tin đơn hàng";
                   $mail->Body = '<table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:680px">
                   <tbody>
                   <tr>
                       <td bgcolor="#ffffff" align="center">
                        
                           <table width="90%" border="0" cellspacing="0" cellpadding="0">
                              
                               <tbody><tr>
                                   <td align="center">
                                       <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                                           <tbody><tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:30px 0px 0px 0px">                                                       														
                                                           Kính gửi Quý khách hàng: <span style="color:#f5821f;font-weight:400"> '.$_POST['name'].', </span>	                                                       
                                               </td>
                                           </tr>
                                            <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">                                                       													
                                                           Đơn hàng của bạn đã được đặt thành công, thông tin đến quý khách như sau:                                                       
                                               </td>
                                           </tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Mã đơn hàng: <span style="color:#f5821f;font-weight:400"> '.$bill->ID_bill.' </span>                                                       
                                               </td></tr>
                                           <tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Số điện thoại: <span style="color:#f5821f;font-weight:400"> '.$_POST['sdt'].' </span>                                                       
                                               </td></tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																											
                                                           Địa chỉ: <span style="color:#f5821f;font-weight:400"> '.$_POST['address'].' </span>                                                       
                                               </td><td>
                                           </td></tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Thời gian đặt hàng: <span style="color:#f5821f;font-weight:400"> '.$bill->date_time.' </span>                                                        
                                           </td></tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Ghi chú: <span style="color:#f5821f;font-weight:400"> '.$ghi_chu.' </span>                                                        
                                           </td></tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Hình thức thanh toán: <span style="color:#f5821f;font-weight:400"> '.$httt.' </span>                                                        
                                           </td></tr>
                                           <tr>
                                               <td align="center" style="text-align:justify;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;font-style:italic;color:#0b499c;padding:10px 0px 0px 0px">																												
                                                           Tổng tiền: <span style="color:#f5821f;font-weight:400"> '.$_POST['tongtien'].' vnđ </span>                                                        
                                           </td></tr>
                                       </tbody></table>                                            
                                   </td>
                               </tr>		                         
                           </tbody></table>								
                           
                       </td>
                   </tr>
                   <tr>
                       <td align="center" bgcolor="#ffffff">                               

                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                               <tbody><tr>
                                   <td align="center" style="padding:20px 0px 20px 0px"> 
                                       <font face="Arial, Helvetica, sans-serif" size="3" color="#ffffff" style="font-size:13px">
                                           <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#0b499c">
                                               Chân thành cảm ơn quý khách hàng đã tin tưởng và sử dụng sản phẩm của DUENDE.
                                           </span>
                                       </font>
                                   </td>
                               </tr>
                           </tbody></table>                               
                       </td>
                   </tr>
               </tbody></table>';
                   $mail->send();
                  }
                if($_POST['flexRadioDefault']== '1'){
                    session()->setFlash(\FLASH::SUCCESS, "Đặt hàng thành công !");
                    redirect('/cart');
                } else
                {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                
                    $vnp_TmnCode = "TFM7L29T"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "PKQGAXMOMGVRCEDQXDHCNWVCPDSCWUHI"; //Chuỗi bí mật
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://duende.local/vnpay_return";
                    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
                    //Config input format
                    //Expire
                    $startTime = date("YmdHis");
                    $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

                    $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Thanh toán VNPAY';
                    $vnp_OrderType = "orther";
                    $vnp_Amount = $_POST['tongtien'] * 100;
                    $vnp_Locale = "vn";
                    $vnp_BankCode = "NCB";
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                    
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array('code' => '00'
                        , 'message' => 'success'
                        , 'data' => $vnp_Url);
                        if ($_SERVER['REQUEST_METHOD']=='POST') {
                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            echo json_encode($returnData);
                            
                        }
                }
            }
                
        }

        public function success(){
            session()->setFlash(\FLASH::SUCCESS, "Thanh toán thành công!");     
            return $this->render('products/vnpay_return');
        }
    }

?>
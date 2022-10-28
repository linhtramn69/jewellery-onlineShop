<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;
use App\Models\User;
use App\Models\Account;
use App\Models\Cart;
use PDOException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../vendor/autoload.php';
class RegisterController extends BaseController{
    public function showRegisterForm(){
        return $this->render('auth/Register');
    }
   
    public function register()
    {
        $credentials = $this->getCredentials();
        $account = new User();
        $account->fill($credentials);
        if(!$account->validate($credentials)){
            session()->setFlash(\FLASH::ERROR, "Something went wrong. Please try again.");

        return $this->render('auth/Register');
        }
        try {
                $successed = Account::insert([
                    'username' =>  $credentials['username'],
                    'password' => $credentials['password'],
                    'role' => 0
                ]);
            
                if ($successed) {
                    $user = User::create([
                        'email' =>  $credentials['email'],
                        'username' =>$credentials['username'],
                        'full_name' => $credentials['full_name'],
                        'otp' => random_int(1000,9999),
                        'verify' => 0
                    ]);
                    
                    Cart::create([
                        'ID_user' => $user->ID_user
                    ]);
                }
                if($user){
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
                    $mail->addAddress($_POST["email"]);
                    $mail->isHTML(true);
                    $mail->Subject = "Verify Account";
                    $mail->Body = '
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_-7420206429851077222background-table"
                        style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
                         <tbody >
                            <tr>
                                <td valign="top" align="center"
                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
                                        
                                        <table  cellpadding="0" cellspacing="0" border="0" align="center"
                                            style="border-collapse:collapse;padding:0;margin:0 auto;width:600px">
                                            <tbody>
                                                <tr>
                                                    <td valign="top"
                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px;margin:0;border:1px solid #ebebeb;background:#fff">
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            style="border-collapse:collapse;padding:0;margin:0;width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 20px 15px;margin:0;line-height:18px">
                                                                        <h1
                                                                            style="font-family:Verdana,Arial;font-weight:bold;font-size:25px;margin-bottom:25px;margin-top:5px;line-height:28px">
                                                                            Chào quý khách '.$user->full_name.',</h1>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">DUENDE đã nhận
                                                                            được yêu cầu đăng ký tài khoản của quý khách.</p>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">Mã OTP xác thực tài khoản:</p>
                                                                        <table cellspacing="0" cellpadding="0"
                                                                            style="border-collapse:collapse;padding:0;margin:0 auto;width:220px;text-align:center">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:middle;padding: top 20spx;0;margin:0 auto;background-color:#3696c2;color:#fff;width:100%;height:40px;display:block;border:0 none;text-align:center;text-transform:uppercase;white-space:nowrap">
                                                                                        <h3 style="font-weight:600; font-size: 2rem">'.$user->otp.'</h3>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">Mọi thắc mắc và
                                                                            góp ý vui lòng liên hệ với bộ phận chăm sóc khách hàng</p>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">- Hotline: 1900
                                                                            6017</p>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">- Giờ làm việc:
                                                                            8:00 - 22:00 (Tất cả các ngày bao gồm cả Lễ Tết)</p>
                                                                        <p style="font-family:Verdana,Arial;font-weight:normal">- Email hỗ trợ:
                                                                            <a href="mailto:hoidap@.vn" style="color:#3696c2"
                                                                                target="_blank">hoidap@duende.vn</a></p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    ';
                    $mail->send();
                    session()->setFlash(\FLASH::SUCCESS, "Congratulations !");
                    return $this->render('auth/Verify');
                }
        }catch (PDOException $e) {
            session()->setFlash(\FLASH::ERROR, "Something went wrong. Please try again.");
            return $this->render('auth/Register');
    }
} 
    public function getCredentials()
    {
        return [
            'full_name' => $_POST['full_name'] ?? null,
            'username'=> $_POST['username'] ?? null,
            'email' => $_POST['email'] ?? null,
            'password' => $_POST['password'] ?? null,
            'confirm_password' => $_POST['confirm_password'] ?? null
        ];
    }

}

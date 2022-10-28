<?php
namespace App\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\TypeProduct;
use PDOException;

    class AdminController extends BaseController{
        public function index(){
            return $this->render('admins/Product',['products'=>Product::All()]);
        }
        public function addProduct(){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                try{
                    Product::create([
                        'ID_product' => $_POST['ID_product'],
                        'name_product' => $_POST['name_product'],
                        'price' => $_POST['price'],
                        'image' => $_POST['image'],
                        'ID_type' => $_POST['type_product']
                    ]);   
                    session()->setFlash(\FLASH::SUCCESS, "Successfully !");
                }
                catch(PDOException ){
                    session()->setFlash(\FLASH::ERROR, "ID already exist !");
                }
            }
            redirect('/admin');
        }
        public function deleteProduct(){
            
            Product::where('ID_product', $_GET['ID_product'])->delete();
            session()->setFlash(\FLASH::SUCCESS, "Successfully !"); 
            $this->render('admins/Product', ['products'=>Product::All()]); 
        }
    
        public function editProduct(){
            if(isset($_GET["ID_product"])){
                $this->render('admins/Product', ['products'=>Product::All(),"update"=>Product::where("ID_product",$_GET['ID_product'])->first()]); 
            }
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                Product::where("ID_product",$_POST["ID_product"])->update([
                    'name_product'=>$_POST['name_product'],
                    'ID_type' => $_POST['type_product'],
                    'price' => $_POST['price'],
                    'image' => $_POST['image']
                ]);
                session()->setFlash(\FLASH::SUCCESS, "Successfully !");
                redirect('/adminProduct');
            }
        }
        public function Bill(){
            return $this->render('admins/Bill',['bills'=>Bill::All()]);
        }
        public function detailBill()
        {
            return $this->render('admins/BillDetail',[
                'billdetails'=>BillDetail::where('ID_bill',$_GET['ID_bill'])->get(),
                'bill' => Bill::where('ID_bill',$_GET['ID_bill'])->first()
            ]);
        }
        public function acceptBill(){
            Bill::where('ID_bill', $_GET['ID_bill'])->update(['status_bill' => 1]);
            redirect('/adminBill');
        }
        public function cancleBill(){
            Bill::where('ID_bill', $_GET['ID_bill'])->update(['status_bill' => -1]);
            redirect('/adminBill');
        }
        public function User(){
            return $this->render('admins/User',['users'=>User::All()]);
        }
    
        
    }

?>
<?php
    namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;

    class HomeController extends BaseController{
        public function index(){
            return $this->render('home/index',['products'=>Product::where('flag',1)->get()]);
        }
        public function product(){
            if(isset($_GET['id_type'])){
                return $this->render('products/product',['products'=>Product::where('ID_type',$_GET['id_type'])->get(),
                'typeProduct'=>TypeProduct::where('ID_type',$_GET['id_type'])->first()]);
            }
            return $this->render('products/product',['products'=>Product::All(), 'type'=>0]);
            
        }
        
    }

?>
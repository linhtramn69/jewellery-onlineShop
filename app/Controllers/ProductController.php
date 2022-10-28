<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
    class ProductController extends BaseController{
        public function product(){
            if(isset($_GET['id_type'])){
                return $this->render('products/product',[
                    'products'=>Product::where('ID_type',$_GET['id_type'])->get(),
                    'typeProduct'=>TypeProduct::where('ID_type',$_GET['id_type'])->first()
                ]);
            }
    
            return $this->render('products/product', ['products'=>Product::All(), 'type'=>0]);
    
        }
        public function productDetail(){
            return $this->render('products/productDetail',['productDetail'=>Product::where('ID_product',$_GET['id'])->first()]);
        }
        public function search(){
                return $this->render('products/product',
                ['products'=>Product::where('name_product','like' ,'%'.$_POST['search'].'%')->get(),
                'type'=>0]);
        }
    }

?>
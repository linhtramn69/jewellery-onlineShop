<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<main>
    <div class="">
        <!-- BANNER -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <img src="assets/images/banners/home.png" alt="" class="img-fluid w-100">
                </div>
            </div>

        </section>

        <!-- SERVICE -->
        <section class="option">
            <div class="container">
                <div class="row row-cols-3 py-2 pt-3 text-center">
                    <div class="col">
                        <h6><i class="fas fa-dolly me-2"></i>FREESHIP</h6>
                    </div>
                    <div class="col">
                        <h6><i class="fas fa-box-open me-2"></i>HOÀN TRẢ MIỄN PHÍ</h6>
                    </div>
                    <div class="col">
                        <h6><i class="fas fa-hand-holding-heart me-2"></i>BẢO HÀNH VĨNH VIỄN</h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRODUCTS -->
        <section>
            <div class="container">
                <div class="option-product d-block text-center py-5 ">
                    <a href="#"><button class="me-5 mb-lg-0 mb-3">DÂY CHUYỀN</button></a>
                    <a href="#"><button class="me-5">NHẪN</button></a>
                    <a href="#"><button class="me-5">LẮC TAY</button></a>
                    <a href="#"><button class="me-5">KHUYÊN TAI</button></a>
                </div>
                <h4 class="option-title">MÓN QUÀ TRI ÂN</h4>
                <div class="product-home row row-cols-lg-4 row-cols-md-2 row-cols-1 mt-5">
                <?php foreach( $products as $product) : ?>
                    <div class="col">
                    <a class="" href="/productDetail?id=<?=$product->ID_product ?>">
                        <div class="card">
                             <?php 
                             echo '<img src="assets/images/products/';
                             if($product->ID_type == 'L04')
                             echo 'daychuyen/' .$product->image;
                             else if($product->ID_type=='L02')
                             echo 'lactay/' .$product->image;
                             else if($product->ID_type=='L03')
                             echo 'khuyentai/' .$product->image;
                             else echo 'nhan/' .$product->image;
                             echo'" class="card-img-top" alt="...">';
                             ?>
                            <div class="card-body">
                                <div class="card-title text-center"><?=$product->name_product?></div>
                                <div class="d-flex mt-3">
                                    <div class="me-auto mt-2"><?=$product->price?></div>
                                    <div class="ms-auto">
                                        <a href="/addcart?id=<?=$product->ID_product?>">
                                            <button class="btn-addcart"><i class="fal fa-plus fs-4"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <?php endforeach;?>
                </div>
                 
            </div>
           
        </section>

        <!-- COLLECTION -->
        <section class="bst-home pb-4">
            <div class="container">
                <div class="row">
                    <img src="assets/images/banners/hinh3.PNG" class="img-fluid w-100" alt="...">
                </div>
                <div class="row row-cols-lg-3 row-cols-1 mt-3">
                    <div class="col">
                        <div class="card border-0">
                            <img src="assets/images/banners/banner3-1.png" class="card-img" alt="">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center">BỘ SƯU TẬP ELAN</h5>
                                <button>KHÁM PHÁ</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="assets/images/banners/banner4-1.png" class="card-img" alt="">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center">BỘ SƯU TẬP ASPIRATION</h5>
                                <button>KHÁM PHÁ</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <img src="assets/images/banners/banner5-1.png" class="card-img" alt="">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center">BỘ SƯU TẬP EMALIE</h5>
                                <button>KHÁM PHÁ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php $this->stop() ?>
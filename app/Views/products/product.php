<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <!-- BANNER -->
    <section>
        <div class="container-fluid">
            <div class="row text-uppercase">
                <?php
                echo '<img src="assets/images/banners/';
                if (isset($type)) echo 'hinh2.jpg" alt="" class="img-fluid banner-all w-100">';
                else if ($typeProduct->ID_type == 'L01')
                    echo 'nhan.png" alt="" class="img-fluid w-100">';
                else if ($typeProduct->ID_type == 'L02')
                    echo 'lactay.png" alt="" class="img-fluid w-100">';
                else if ($typeProduct->ID_type == 'L03')
                    echo 'khuyentai.png" alt="" class="img-fluid w-100">';
                else
                    echo 'daychuyen.png" alt="" class="img-fluid w-100">';
                ?>
            </div>

        </div>
        
    </section>

    <!-- SERVICE -->
    <section class="option">
        <div class="container">
            <div class="row row-cols-3 py-2 pt-3 text-center">
                <div class="col">
                    <h6><i class="fas fa-dolly me-2 "></i>FREESHIP</h6>
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

    <section>
        <div class="container">
            <h2 class="name-product text-center mt-5 mb-5">ĐỊNH NGHĨA CỦA SỰ THANH LỊCH</h2>
            <div class="product-home row row-cols-lg-4 row-cols-md-2 row-cols-1">
                <?php foreach ($products as $product) : ?>
                    <div class="col">
                        <a class="" href="/productDetail?id=<?= $product->ID_product ?>">
                            <div class="card">
                                <?php
                                echo '<img src="assets/images/products/';
                                if ($product->ID_type == 'L04')
                                    echo 'daychuyen/' . $product->image;
                                else if ($product->ID_type == 'L02')
                                    echo 'lactay/' . $product->image;
                                else if ($product->ID_type == 'L03')
                                    echo 'khuyentai/' . $product->image;
                                else echo 'nhan/' . $product->image;
                                echo '" class="card-img-top" alt="...">';
                                ?>
                                <div class="card-body">
                                    <div class="card-title text-center"><?= $product->name_product ?></div>
                                    <div class="d-flex mt-3">
                                        <div class="mt-2"><?= $product->price ?> $</div>
                                        <div class="ms-auto">
                                            <a href="/addcart?id=<?= $product->ID_product ?>">
                                                <button class="btn-addcart"><i class="fal fa-plus fs-4"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php $this->stop(); ?>
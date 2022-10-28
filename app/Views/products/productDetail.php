<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <section>
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-sm-1 mt-5">
                <div class="col-lg-7 col-12">
                    <?php
                    echo '<img src="assets/images/products/';
                    if ($productDetail->ID_type == 'L04')
                        echo 'daychuyen/' . $productDetail->image;
                    else if ($productDetail->ID_type == 'L02')
                        echo 'lactay/' . $productDetail->image;
                    else if ($productDetail->ID_type == 'L03')
                        echo 'khuyentai/' . $productDetail->image;
                    else echo 'nhan/' . $productDetail->image;
                    echo '" class="w-75 ms-5 img-fluid" alt="...">';
                    ?>
                </div>
                <div class="col-lg-5 col-12 mt-4 mb-5">
                    <form action="/addCart" method="post">
                        <div class="product-detail card">
                            <div class="card-title">
                                <div class="d-flex">
                                    <h2 class="me-auto p-2"><?= $productDetail->name_product ?></h2>
                                    <p class="p-2"><?= $productDetail->price ?> $</p>
                                </div>
                            </div>
                            <div class="card-body">
                            <input type="hidden" value="<?= $productDetail->ID_product ?>" name="ID_product" />
                                <ul type="square" class="py-2">
                                    <li>
                                        <div class="pt-3"><label>Số lượng: </label>
                                            <input type="number" name="soluong" class="text-center ms-4" value="1" min="1" max="20" style="width:50px" />
                                        </div>
                                    </li>
                                    <li>FREESHIP</li>
                                    <li>HOÀN TRẢ MIỄN PHÍ</li>
                                    <li>Thuế và lệ phí hải quan sẽ được áp dụng khi giao hàng theo quy định của Hải Quan
                                        Việt Nam</li>
                                </ul>
                                <button type="submit" class="btn-adddetail mt-4">ADD TO CART<i class="fas fa-arrow-right ms-3"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="info-detail mb-4">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <div class="row row-cols-lg-4 row-cols-sm-1 text-center pb-3">
                        <div class="col">DETAILS</div>
                        <div class="col">SHIPPING INFO</div>
                        <div class="col">PAYMENT OPTIONS</div>
                        <div class="col">RETURNS & EXCHANGES</div>
                    </div>
                </thead>
                <tbody>
                    <div class="row row-cols-lg-2 row-cols-sm-1 mt-4">
                        <div class="col-lg-6 col-12">
                            <p>Chiếc nhẫn Elan, với độ bóng tuyệt đẹp, dành cho cả nam và nữ. Chiếc nhẫn này được nghệ nhân chau chuốt theo phong cách tao nhã tuyệt vời và mang hơi hưởng từ sức hút của chiếc Lắc Tay Elan vào trong thiết kế. Nhẫn Elan là mảnh ghép cuối cùng hoàn hảo cho mọi trang phục của bạn.</p>
                        </div>
                        <div class="col-lg-5 col-12 ms-auto">
                            <div class="product-info card">
                                <div class="info d-flex">
                                    <h2 class="me-auto pt-2">Mã sản phẩm</h2>
                                    <p class="pt-2">DW00400088</p>
                                </div>
                                <div class="info d-flex">
                                    <h2 class="me-auto pt-2">Màu sắc</h2>
                                    <p class="pt-2">Rose gold</p>
                                </div>
                                <div class="info d-flex">
                                    <h2 class="me-auto pt-2">Kích thước</h2>
                                    <p class="pt-2">44 cm</p>
                                </div>
                                <div class="info d-flex">
                                    <h2 class="me-auto pt-2">Vật liệu</h2>
                                    <p class="pt-2">Thép không gỉ 316L</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>

    </section>
</main>
<?php $this->stop(); ?>
<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>

<div class="col-lg-10 col-sm-12">
    <div class="container">
        <div class="col-md-2">
            <a href="/adminBill"> <button type="button" class="btn btn-primary w-25 mb-4 mt-3 justify-content-md-end">
                    <i class="fas fa-arrow-left fs-5"></i></button></a>     
        </div>
            <div class="row row-cols-2 bg-light py-1 text-start">
                <div class="col pt-2">
                    <ul>
                        <li> <span class="fw-bold me-2">ID:</span> <?=$bill->ID_bill?></li>
                        <li> <span class="fw-bold me-2">Họ tên:</span>  <?=$bill->full_name?></li>
                        <li> <span class="fw-bold me-2">Địa chỉ:</span> <?=$bill->address?></li>
                    </ul>
                </div>
                <div class="col pt-2">
                    <ul>
                        <li> <span class="fw-bold me-2">Tổng tiền:</span> <?=$bill->total?> đ</li>
                        <li><span class="fw-bold me-2">Số điện thoại:</span> <?=$bill->number_phone?></li>
                        <li><span class="fw-bold me-2">Thời gian lập:</span> <?=$bill->date_time?></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
              <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="text-center">
                            ID
                        </td>
                        <td>
                            Hình ảnh
                        </td>
                        <td>
                            Tên sản phẩm
                        </td>
                        <td>
                           Số lượng
                        </td>
                        <td>
                            Thành tiền
                        </td>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach($billdetails as $billdetail):?>
                        <tr class="align-middle">
                            <td>
                            <?=$billdetail->products->ID_product?>
                            </td>
                            <td>
                            <?php
                                echo '<img src="assets/images/products/';
                                if ($billdetail->products->ID_type == 'L04')
                                    echo 'daychuyen/' . $billdetail->products->image;
                                else if ($billdetail->products->ID_type == 'L02')
                                    echo 'lactay/' . $billdetail->products->image;
                                else if ($billdetail->products->ID_type == 'L03')
                                    echo 'khuyentai/' . $billdetail->products->image;
                                else echo 'nhan/' . $billdetail->products->image;
                                echo '"alt="" width="80" height="80">';
                                ?>
                            
                            </td>
                            <td>
                                <?=$billdetail->products->name_product?>
                            </td>
                            <td>
                                <?=$billdetail->quanlity?>
                            </td>
                            <td>
                            <?=$billdetail->products->price * $billdetail->quanlity?> đ
                            </td>  
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>  
            </div>

    </div>

    <?php $this->stop(); ?>
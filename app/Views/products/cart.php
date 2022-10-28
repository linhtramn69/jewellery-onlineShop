<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <div class="container-fluid">
        <div class="row rows-col-md-2 row-cols-1 p-5">
            <div class="col-lg-8 col-12 pt-2">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($carts as $cart) : ?>
                            <tr class="align-middle ">

                                <td class="w-25">
                                    <?php
                                    $sum = $cart->price * $cart->quanlity;
                                    $total += $sum;
                                    echo '<img src="assets/images/products/';
                                    if ($cart->ID_type == 'L04')
                                        echo 'daychuyen/' . $cart->image;
                                    else if ($cart->ID_type == 'L02')
                                        echo 'lactay/' . $cart->image;
                                    else if ($cart->ID_type == 'L03')
                                        echo 'khuyentai/' . $cart->image;
                                    else echo 'nhan/' . $cart->image;
                                    echo '"width="50%" alt="...">';
                                    ?>
                                </td>
                                <td><?= $cart->name_product ?></td>
                                <td><?= $cart->price ?> đ</td>
                                <td><?= $cart->quanlity ?></td>
                                <td><?= $sum ?> đ</td>
                                <td>
                                    <a href="/deleteCart?delete=<?= $cart->ID_product ?>">
                                        <div class="btn btn-close"></div>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pay col-lg-4 col-12">
                <div class="card shadow-sm" style="max-width: 29rem;">
                    <div class="card-body">
                        <h5 class="card-title border-bottom pt-1 pb-3 text-center">Thông tin đơn hàng</h5>
                        <div class="card-subtitle">
                            <div class="d-flex border-bottom py-2">
                                <div class="p-2">Tổng tiền : </div>
                                <div class="ms-auto p-2 text-danger"><?= $total ?> đ</div>
                            </div>
                        </div>
                        <p class="card-text py-3">Phí vận chuyển sẽ được tính ở trang thanh toán.
                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                        <button type="button" class="btn-submit py-2 w-100 mb-2" data-bs-toggle="modal" data-bs-target="#pay">Đặt hàng</button>
                        <?php
                        if (auth()) {
                            echo '<a href="/bill?user=' . auth()->username . '"><button class="btn-forgot py-2 w-100 mb-2">Danh sách đơn hàng</button></a>';
                        }
                        ?>
                        <a href="/product"><button class="btn-forgot py-2 w-100 mb-2">Tiếp tục mua hàng</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="/pay" method="post" style="width:30rem;">
                        <input type="hidden" name="magh" value="<?= $carts[0]['ID_cart'] ?>" />
                        <input type="hidden" name="makh" value="<?= $ID_user ?>" />
                        <input type="hidden" name="tongtien" value="<?= $total ?>" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Họ tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email_pay" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ghi chú (nếu có):</label>
                                    <input type="text" name="note" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                <label for="message-text" class="col-form-label">Hình thức thanh toán</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Tiền mặt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    VNPAY
                                    </label>
                                </div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="p-2">Tổng tiền : </div>
                                    <div class="ms-auto p-2 text-danger"><?= $total ?> đ</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-forgot py-2" data-bs-dismiss="modal">Thoát</button>
                                <button type="submit" class="btn-submit border-0 py-2" name="redirect">Thanh toán</button></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
<?php $this->stop(); ?>
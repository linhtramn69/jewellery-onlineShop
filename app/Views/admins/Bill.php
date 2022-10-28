<?php $this->layout(config('view.admin')) ?>
<?php $this->start('page') ?>
<div class="col-lg-10 mt-5">
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="text-center">
                            ID
                        </td>
                        <td>
                            Họ tên
                        </td>
                        <td>
                            Số điện thoại
                        </td>
                        <td>
                            Ngày lập
                        </td>
                        <td>
                            Địa chỉ
                        </td>
                        <td>
                            Trạng thái đơn hàng
                        </td>
                        <td>
                            Chi tiết
                        </td>
                        <td>
                            Thao tác
                        </td>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($bills as $bill) : ?>
                        <tr class="align-middle">
                            <td>
                                <?= $bill->ID_bill ?>
                            </td>
                            <td>
                                <?= $bill->full_name ?>
                            </td>
                            <td>
                                <?= $bill->number_phone ?>
                            </td>
                            <td>
                                <?= $bill->date_time ?>
                            </td>
                            <td>
                                <?= $bill->address ?>
                            </td>
                            <?php
                            if ($bill->status_bill == 0) {
                                echo '
                                <td>
                                    <p class="badge rounded-pill mt-3 alert-warning">Đang xác nhận</p>
                                </td>
                                <td>
                                    <a href="/detailBill?ID_bill=' . $bill->ID_bill . '">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a> 
                                </td>
                                <td>
                                <a href="/acceptBill?ID_bill=' . $bill->ID_bill . '">
                                    <i class="fa-solid fa-square-check fs-5 me-2 text-success"></i>
                                </a>
                                <a href="/cancleBill?ID_bill=' . $bill->ID_bill . '">
                                    <i class="fa-solid fa-ban fs-5 text-danger"></i>
                                </a>
                                </td>
                                ';
                            } else if ($bill->status_bill == 1) {
                                echo '
                                <td>
                                    <p class="badge rounded-pill mt-3 alert-success">Đã xác nhận</p>
                                </td>
                                <td>
                                    <a href="/detailBill?ID_bill=' . $bill->ID_bill . '">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a> 
                                </td>
                                <td>
                                </td>
                                ';
                            } else echo '
                                <td>
                                    <p class="badge rounded-pill mt-3 alert-danger">Đã hủy</p>
                                </td>
                                <td>
                                    <a href="/detailBill?ID_bill=' . $bill->ID_bill . '">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a> 
                                </td>
                                <td>
                                </td>
                                ';

                            ?>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $this->stop(); ?>
<?php $this->layout(config('view.verify')) ?>
<?php $this->start('page'); ?>

<main class="pt-5 pb-5 form-login container">
        <div class="row">
            <div class="card shadow col-md-8 mx-auto d-block" style="max-width: 100rem;">
                <div class="card-body p-5">
                    <h2 class="text-center pb-2">Xác thực tài khoản</h2>
                    <p>Chúng tôi vừa gửi mã xác thực đến email của bạn. Vui lòng kiểm tra thư và quay lại đây để điền mã.</p>
                    <div class="container">
                        <div class="pb-3">
                            <form action="/verify" autocomplete="off" method="POST" id="form-verify" novalidate>             
                            <div class="error-text">Mã xác thực</div>
                                <div class="fields-input">
                                
                                <input type="text" name="otp-verify" class="otp_field w-100 mt-3 py-1" min="0" max="9" required onpaste="false">
                                    <!-- <input type="number" name="otp1" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                                    <input type="number" name="otp2" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                                    <input type="number" name="otp3" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                                    <input type="number" name="otp4" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false"> -->
                                </div>
                                <button type="submit" name="verify" class="btn btn-submit rounded-pill mt-4 w-100 mb-3">Verify Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
<?php $this->stop(); ?>
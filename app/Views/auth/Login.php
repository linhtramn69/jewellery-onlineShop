<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>

<main class="pt-5 pb-5 form-login container">
        <div class="row">
            <div class="card shadow col-md-6 mx-auto d-block" style="max-width: 34rem;">
                <div class="card-body">
                    <a href="/"><img src="assets/images/banners/login.jpg" class="w-75 mx-auto d-block mb-3" alt=""></a>
                    <div class="container">
                        <div class="mx-auto mb-4">
                            <a href="#"><button class="btn btn-twitter w-100 mb-3 rounded-pill"><i
                                        class="fab fa-twitter me-3"></i>Sign in with Twitter</button></a>
                            <a href="#"> <button class="btn btn-google w-100 mb-3 rounded-pill"><i
                                        class="fab fa-google me-3"></i>Sign in with Google</button></a>
                            <a href="#"> <button class="btn btn-facebook w-100 mb-3 rounded-pill"><i
                                        class="fab fa-facebook me-3"></i>Sign in with Facebook</button></a>
                        </div>
                        <hr>
                        <div class="pb-3 pt-4">
                            <form action="/login" method="POST" id="" novalidate>             
                                <div class="bg-light rounded-pill shadow-sm mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="" type="submit" class="btn"><i
                                                    class="fa fa-user text-dark mx-2"></i></button>
                                        </div>
                                        <input type="text" placeholder="Username" aria-describedby="" name="username"
                                            class="form-control border-0 bg-light rounded-pill">
                                    </div>
                                </div>
                                
                                <div class="bg-light rounded-pill shadow-sm mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="" type="submit" class="btn"><i
                                                    class="fas fa-lock text-dark mx-2"></i></button>
                                        </div>
                                        <input type="password" placeholder="Password" aria-describedby=""
                                            name="password" class="form-control border-0 bg-light rounded-pill">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-submit rounded-pill w-100 mb-3">Đăng nhập</button>
                            </form>
                            <div class="text-start pb-5">
                                <span class="text-muted">Don't have an account ?</span> <a href="/register" class="text-decoration-none">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
<?php $this->stop(); ?>
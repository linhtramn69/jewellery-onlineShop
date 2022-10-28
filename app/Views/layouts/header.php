<header class="position-sticky" style="top: 0; z-index: 1000;">
    <div class="header-title">
        <a href="/home" class="text-decoration-none">
            <h5 class="text-center p-2 text-white">DUENDE</h5>
        </a>
    </div>
    <nav class="py-2 navbar navbar-expand-lg mb-2">
        <div class=" flex-grow-1 me-5">
            <button class="navbar-toggler border-0 " data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-pills justify-content-end pt-2 ms-4">
                    <li class="nav-item"><a href="/product" class="">TẤT CẢ</a></li>
                    <li class="nav-item"><a href="/product?id_type=L04" class="">DÂY CHUYỀN</a></li>
                    <li class="nav-item"><a href="/product?id_type=L01" class="">NHẪN</a></li>
                    <li class="nav-item"><a href="/product?id_type=L02" class="">LẮC TAY</a></li>
                    <li class="nav-item"><a href="/product?id_type=L03" class="">KHUYÊN TAI</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                BỘ SƯU TẬP
                            </a>
                            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">ELAN COLLECTION</a></li>
                                <li><a class="dropdown-item" href="#">ASPIRATION COLLECTION</a></li>
                                <li><a class="dropdown-item" href="#">ELEVATION COLLECTION</a></li>
                                <li><a class="dropdown-item" href="#">EMALIE COLLECTION</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class=" me-4 ms-4">
                    <form action="/search" method="post" class="">
                        <div class="input-group border rounded-pill">
                            <input type="search" placeholder="Nhập từ bạn cần tìm?" aria-describedby="button-addon3" class="form-control rounded-pill border-0" name="search" value="">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="submit" class="btn btn-link text-dark"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" mt-1 ms-4">
                    <a href="/cart"><i class="fa-solid fa-bag-shopping text-dark fs-4"></i></a>
                    <?php

                    if (auth()) {
                        echo '<a href="" class="text-dark text-decoration-none p-3">' . auth()->username . '</a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="text-decoration-none text-dark">Log out</a>
                            ';
                    } else echo '<a href="/login"><i class="fa-regular fa-circle-user text-dark ms-3 fs-4"></i></a>'

                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="modal fade" id="logoutModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title ms-3">Sign Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body ">
                <h4 class="text-center text-danger">Are you sure?</h4>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="border-1 py-2 p-3 btn-fogot" data-bs-dismiss="modal">
                    <i class="lni lni-close"></i> Cancel
                </button>
                <a href="/logout">
                    <button type="button" class="border-0 py-2 p-3 btn-submit" data-bs-dismiss="modal" onclick="logout(event)">
                        <i class="lni lni-power-switch"></i>Logout
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
<div class="col-lg-2">
    <div class="sidebar side-bar " style="background-color: white;color: #6c749d;">
        <div class="p-2" style="list-style-type: disc;">

            <span class="navbar-brand mb-0 h1 center-content" style="font-size: 25px;padding: 10px 0px;">DUENDE</span>
            <hr>
            <li>
                <a href="#" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-tasks"></i></div>
                    <span class="p-2 d-flex center-content">Quản Lý</span>
                </a>
            </li>
            <li>
                <a href="/adminProduct" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-shopping-cart"></i></div>
                    <span class="p-2 d-flex center-content">Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a href="/adminBill" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-receipt"></i></div>
                    <span class="p-2 d-flex center-content">Đơn Hàng</span>
                </a>
            </li>
            <li>
                <a href="/adminUser" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-user"></i></div>
                    <span class="p-2 d-flex center-content">Khách Hàng</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="#" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-cog"></i></div>
                    <span class="p-2 d-flex center-content">Cài Đặt</span>
                </a>
            </li>
            <li>
                <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="d-flex  flex-row my-2">
                    <div class="icon-f center-content"><i class="fas fa-sign-out"></i></div>
                    <span class="p-2 d-flex center-content">Đăng xuất</span>
                </a>
            </li>


        </div>
    </div>
</div>
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
                    <button type="button" class="border-0 py-2 p-3 btn btn-primary" data-bs-dismiss="modal" onclick="logout(event)">
                        <i class="lni lni-power-switch"></i>Logout
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
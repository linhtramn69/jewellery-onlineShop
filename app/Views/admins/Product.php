<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>

<div class="col-lg-10 container-fluid" style="background-color:#ecf1f7;">
    <main class="container" style="height: 100vh;">
        <div class="row mb-4">
            <div class="col-md-4 d-flex">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span>THÊM SẢN PHẨM</span>
                </button>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="text-center">
                            Mã SP
                        </td>
                        <td>
                            Hình Ảnh
                        </td>
                        <td>
                            Tên SP
                        </td>
                        <td>
                            Giá SP
                        </td>
                        <td>
                            Loại SP
                        </td>
                        <td>
                            Thực Hiện
                        </td>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td>
                                <?= $product->ID_product ?>
                            </td>
                            <td>
                                <?php
                                echo '<img src="assets/images/products/';
                                if ($product->ID_type == 'L04')
                                    echo 'daychuyen/' . $product->image;
                                else if ($product->ID_type == 'L02')
                                    echo 'lactay/' . $product->image;
                                else if ($product->ID_type == 'L03')
                                    echo 'khuyentai/' . $product->image;
                                else echo 'nhan/' . $product->image;
                                echo '"alt="" width="80" height="80">';
                                ?>

                            </td>
                            <td>
                                <?= $product->name_product ?>
                            </td>
                            <td>
                                <?= $product->price ?> đ
                            </td>
                            <td>
                                <?= $product->typeProduct->name_type ?>
                            </td>
                            <td>
                                <a href="editProduct?ID_product=<?=$product->ID_product?>"><button type="button" class="editProduct btn-action btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProduct">
                                    <i class="fa-solid fa-pen"></i>
                                </button></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" id="<?= $product->ID_product ?>" 
                                    onclick="handleDelete('<?=$product->ID_product?>','<?=$product->name_product?>')">
                                    <i class="text-white fa-solid fa-trash"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <a id="delete" href=""><button type="button" class="btn btn-danger">Xóa</button></a>
                    </div>
                </div>
            </div>
        </div>        <script>
            function handleDelete(id, name) {
                document.getElementById('modal-body').innerHTML = "Bạn có chắc chắn muốn xóa " + name + " không ? Thao tác này không thể hoàn tác"
                document.getElementById('delete').setAttribute('href', "/deleteProduct?ID_product="+id)
            }
        </script>
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="namemodal" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/addProduct" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="namemodal">Thêm sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="ID_product" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="ID_product">
                            </div>
                            <div class="mb-2">
                                <label for="name_product" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name_product">
                            </div>
                            <div class="mb-2">
                                <label for="type_product" class="form-label">Loại sản phẩm</label>
                                <select class="form-select" name="type_product">
                                    <option>Chọn loại</option>
                                    <option value="L01">Nhẫn</option>
                                    <option value="L02">Lắc tay</option>
                                    <option value="L03">Khuyên Tay</option>
                                    <option value="L04">Dây Chuyền</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="mb-2">
                                <label for="image" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary" id="add">Thêm Sản Phẩm </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($update)):?>
        <div class="modal" style="display:block" id="editProduct" tabindex="-1" aria-labelledby="namemodal" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/editProduct" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="namemodal">Cập nhật</h5>
                            <a href="/adminProduct"><button type="button" class="btn-close" aria-label="Close"></button></a>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="ID_product" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" disabled value="<?=$update->ID_product?>">
                                <input type="hidden" class="form-control"  name="ID_product" value="<?=$update->ID_product?>">
                            </div>
                            <div class="mb-2">
                                <label for="name_product" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name_product" value="<?=$update->name_product?>">
                            </div>
                            <div class="mb-2">
                                <label for="type_product" class="form-label">Loại sản phẩm</label>
                                <select class="form-select" name="type_product" >
                                    <option value="<?=$update->ID_type?>"><?=$update->typeProduct->name_type?></option>
                                    <option value="L01">Nhẫn</option>
                                    <option value="L02">Lắc tay</option>
                                    <option value="L03">Khuyên Tay</option>
                                    <option value="L04">Dây Chuyền</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="price" value="<?=$update->price?>">
                            </div>
                            <div class="mb-2">
                                <label for="image" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/adminProduct"><button type="button" class="btn btn-secondary" >Hủy</button></a>
                            <button type="submit" class="btn btn-primary" id="add">Cập nhật</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <?php endif;?>
    </main>
</div>

<?php $this->stop(); ?>
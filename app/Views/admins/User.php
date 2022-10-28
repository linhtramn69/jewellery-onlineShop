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
                            Email
                        </td>
                        <td>
                            Username
                        </td>
                        <td>
                            Thao tác
                        </td>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td>
                                <?= $user->ID_user ?>
                            </td>
                            <td>
                                <?= $user->full_name ?>
                            </td>
                            <td>
                                <?= $user->email ?>
                            </td>
                            <td>
                                <?= $user->username ?>
                            </td>
                            <td>
                                <div class="btn btn-close">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->stop(); ?>
<?php
require 'view/template/header.php';
//file hiển thị thông báo lỗi
require_once 'view/commons/message.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh sách độc giả</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=docgia&action=add"><button class="btn btn-primary">Thêm Độc giả</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã độc giả</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Năm sinh</th>
                            <th scope="col">nghề nghiệp</th>
                            <th scope="col">Ngày cấp thẻ</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($docgia as $bd) {
                            $urlEdit =
                            "index.php?controller=docgia&action=edit&bdid=" . $bd['madg'];
                            $urlDelete =
                            "index.php?controller=docgia&action=delete&bdid=" . $bd['madg'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $bd['madg'] ?></th>
                                <td><?php echo $bd['hovaten'] ?></td>
                                <td><?php echo $bd['gioitinh'] ?></td>
                                <td><?php echo $bd['namsinh'] ?></td>
                                <td><?php echo $bd['nghenghiep'] ?></td>
                                <td><?php echo $bd['ngaycapthe'] ?></td>
                                <td><?php echo $bd['ngayhethan'] ?></td>
                                <td><?php echo $bd['diachi'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Xóa khỏi danh sách?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
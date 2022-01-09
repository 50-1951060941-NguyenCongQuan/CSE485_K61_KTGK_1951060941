<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Độc Gỉa</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=docgia&action=admin"><button class="btn btn-primary">Xem chi tiết</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đọc giả</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Năm sinh</th>
                            <th scope="col">Nghề nghiệp</th>
                            <th scope="col">Ngày cấp thẻ</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($docgia as $madg) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $madg['madg'] ?></th>
                                <td><?php echo $madg['hovaten'] ?></td>
                                <td><?php echo $madg['gioitinh'] ?></td>
                                <td><?php echo $madg['namsinh'] ?></td>
                                <td><?php echo $madg['nghenghiep'] ?></td>
                                <td><?php echo $madg['ngaycapthe'] ?></td>
                                <td><?php echo $madg['ngayhethan'] ?></td>
                                <td><?php echo $madg['diachi'] ?></td>
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
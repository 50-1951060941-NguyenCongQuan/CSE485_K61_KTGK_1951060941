<?php

require_once 'model/docgiaModel.php';
class docgiaController{
    function index(){
        $dgModal = new docgiaModal();
        $docgia = $dgModal->getAllDb();
        require_once 'view/docgia/index.php';
    }
    function admin(){
        $dgModal = new docgiaModal();
        $docgia = $dgModal->getAllDb();
        require_once 'view/docgia/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            // $madg = $_POST['madg'];
            $hovaten = $_POST['hovaten'];
            $gioitinh = $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($hovaten)|| empty($_POST['gioitinh']) || empty($namsinh) || empty($nghenghiep) || empty($ngaycapthe) || empty($ngayhethan)|| empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioitinh = $_POST['gioitinh'];
                $dgModal = new docgiaModal();
                $dgArr = [
                    // 'madg' => $madg ,
                   'hovaten' => $hovaten ,
                    'gioitinh'=> $gioitinh,
                   'namsinh' => $namsinh ,
                   'nghenghiep' =>$nghenghiep ,
                    'ngaycapthe'=>$ngaycapthe ,
                    'ngayhethan'=> $ngayhethan,
                    'diachi'=>$diachi ,
           
                    
                ];
                $isAdd = $dgModal->insert($dgArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=dogia&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/docgia/add.php';
    }
    function edit(){
        if (!isset($_GET['madg'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        if (!is_numeric($_GET['madg'])) {
            $_SESSION['error'] = "mã độc giả phải là số";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        $madg = $_GET['madg'];
        $dgModal = new docgiaModal();
        $BD = $dgModal->getBDById($madg);
        $error = '';
        if (isset($_POST['submit'])) {
            // $madg = $_POST['madg'];
            $hovaten = $_POST['hovaten'];
            $gioitinh = $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($hovaten)|| empty($_POST['gioitinh']) || empty($namsinh) || empty($nghenghiep) || empty($ngaycapthe) || empty($ngayhethan)|| empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioitinh = $_POST['gioitinh'];
                $dgModal = new docgiaModal();
                $dgArr = [
                    // 'madg' => $madg ,
                   'hovaten' => $hovaten ,
                    'gioitinh'=> $gioitinh,
                   'namsinh' => $namsinh ,
                   'nghenghiep' =>$nghenghiep ,
                    'ngaycapthe'=>$ngaycapthe ,
                    'ngayhethan'=> $ngayhethan,
                    'diachi'=>$diachi ,
                ];
                $isAdd = $dgModal->update($dgArr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/docgia/edit.php';
    }
    function delete(){
        $madg = $_GET['madg'];
        if (!is_numeric($madg)) {
            header("Location: index.php?controller=book&action=index");
            exit();
        }
        $dgModal = new docgiaModal();
        $isDelete = $dgModal->delete($madg);
        if ($isDelete) {
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=admin&tt=$TT");
        exit();
    }
}

?>
<?php
if (isset($_SESSION['user']) && $_SESSION['user']){
    $username = "root"; // Khai báo username
    $password = ""; // Khai báo password
    $server = "localhost"; // Khai báo server
    $dbname = "barbershop"; // Khai báo database
    // Kết nối database tintuc
    $connect = new mysqli($server, $username, $password, $dbname);
    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
        die("Không kết nối :" . $conn->connect_error);
        exit();
    }
    $tenkh = "";
    $tongtien = 0;
    $id_giohang = "";
    // $soluong = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["tenkh"])) { $tenkh = $_POST['tenkh']; }
        if(isset($_POST["tongtien"])) { $tongtien = $_POST['tongtien']; }  
        if(isset($_POST["id_giohang"])) { $id_giohang =$_POST['id_giohang']; }
        $username = $_SESSION['user'];
        $sql3 = "SELECT * FROM khachhang WHERE username = '$username'";
        $ketqua2 = $connect->query($sql3);
        $row = $ketqua2->fetch_array(MYSQLI_ASSOC);
        $tenkh = $row['hoten'];
        $sql2 = "SELECT * FROM `giohang` WHERE id_giohang = '$id_giohang' && username = '$username'";
        $ketqua1 = $connect->query($sql2);
        $rows = $ketqua1->fetch_array(MYSQLI_ASSOC);
        if($rows ==  0){
            $sql = " INSERT INTO `donhang` (tenkh,tongtien,id_giohang)
            values ('$tenkh','$tongtien', '$id_giohang')";
            // move_uploaded_file($hinhanh_tmp, 'img/sanpham/'.$product_img);
            $res = $connect->query($sql);
            // if($res == TRUE){
            // 	$_SESSION['order'] = "<div class='success text-center'>Đơn hàng đã được đặt thành công.</div>";
            // 	header('location:cart_order.php');
            // }
        }
        else{
            $tongtien = $tongtien + $rows['tongtien'];
            $sql = "update `donhang` set tenkh = '$tenkh' ,tongtien = '$tongtien', id_giohang = '$id_giohang' id_giohang = '$id_giohang' && username = '$username'";
            $res = $connect->query($sql);
            // if($res == TRUE){
            // 	$_SESSION['order'] = "<div class='success text-center'>Đơn hàng đã được đặt thành công.</div>";
            // 	header('location:cart_order.php');
            // }
        }
    }
    $connect->close();

}?>   
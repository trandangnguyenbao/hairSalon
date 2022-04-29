<?php
if (isset($_SESSION['user']) && $_SESSION['user']){
// Kết nối database tintuc
include 'config.php';
$username = $_SESSION['user'];
    $sql = "SELECT * FROM `khachhang` WHERE username = '{$username}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$conn) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
if (isset($_POST['sbm'])){
    $gioitinh=$_POST['gioitinh'];
    $ngaysinh=$_POST['ngaysinh'];
    $noisinh=$_POST['noisinh'];
    $sql = "UPDATE khachhang SET gioitinh='$gioitinh', ngaysinh = '$ngaysinh', noisinh = '$noisinh' WHERE username = '{$username}'";
    $query = mysqli_query($conn,$sql);
    if($query == TRUE){
        $_SESSION['update'] = "Cập nhật lịch hẹn thành công!";
        header("location:taikhoan.php");
    } 
    else{
        $_SESSION['update'] = "Quản Lý Lịch Hẹn Thất Bại!";
        header("location:taikhoan.php");
    }
    $connect->close();
    }}
?> 
<?php
include "header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="remixicons/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css"> 
    <title>Document</title>
</head>
<body>
    <section id="account">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 thongtintaikhoan" style="background-color: #d8d8d8;">
                    <h3 style="color:var(--brand); margin-top: 50px;">Hồ Sơ Của Tôi</h3>
                    <p style="color:#000; font-size: 20px; font-weight: 400;">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <hr>
                    <form action="" method="POST" style="height: auto; width: 800px; margin-top: 0px; padding: 30px 30px;">
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']){
                        include 'config.php';
                        $username = $_SESSION['user'];
                        $result=mysqli_query($conn, "SELECT * FROM `khachhang` where username = '{$username}'");
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                        <label for="" style="width:120px;  font-weight: bolder;">Tài Khoản:</label>
                        <input type="text" value="<?php echo $row['username']?>" disabled style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Mật Khẩu:</label>
                        <input type="text"  name="password" value="<?php echo $row['password']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px; background-color: #d4d4d4; border: none; outline: none;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Họ Và Tên:</label>
                        <input type="text" disabled value="<?php echo $row['hoten']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Số Điện Thoại:</label>
                        <input type="text" disabled value="<?php echo $row['username']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Ngày Sinh:</label>
                        <input type="text" name="ngaysinh" value="<?php echo $row['ngaysinh']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Giới Tính:</label>
                        <input type="text" name="gioitinh" value="<?php echo $row['gioitinh']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Nơi Sinh:</label>
                        <input type="text" name="noisinh" value="<?php echo $row['noisinh']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <input type="submit" value="Sửa Thông Tin" name="sbm" style="height: 50px; width: 200px; background-color: #d4d4d4; margin-left: 300px;">
                        <?php }}?>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 thongtintaikhoan" style="padding: 100px 50px;">
                    <div class="img-border" style="border: 1px solid #d4d4d4; padding: 30px;">
                    <img src="../DATTCNPM/img/download.png" alt="" style="border-radius: 100%;">
                    <p style="text-align: center; color: #ffab76; font-size: 15px; font-weight: bolder;">Hình Ảnh</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
  include "footer.php"
?>
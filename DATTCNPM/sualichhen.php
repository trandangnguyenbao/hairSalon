
<?php
$username = "root"; // Khai báo username
$password = ""; // Khai báo password
$server = "localhost"; // Khai báo server
$dbname = "barbershop"; // Khai báo database
// Kết nối database tintuc
include 'config.php';
    $id_lichhen = $_GET['id_lichhen'];
    $sql = "SELECT * FROM `lichhen` WHERE id_lichhen = $id_lichhen";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
if (isset($_POST['sbm'])){
    $id_lichhen = $_GET['id_lichhen'];
    $note=$_POST['note'];
    $ngay=$_POST['ngay'];
    $chinhanh=$_POST['chinhanh'];
    $thoigian=$_POST['gio'].':'.$_POST['phut'];
    $dichvu=$_POST['dichvu'];
    $sql = "UPDATE lichhen SET note='$note', ngay = '$ngay', thoigian = '$thoigian', chinhanh = '$chinhanh', dichvu = '$dichvu'  WHERE id_lichhen=$id_lichhen";
    $query = mysqli_query($connect,$sql);
    if($query == TRUE){
        $_SESSION['update'] = "Cập nhật lịch hẹn thành công!";
        header("location:quanlylichhen.php");
    } 
    else{
        $_SESSION['update'] = "Quản Lý Lịch Hẹn Thất Bại!";
        header("location:quanlylichhen.php");
    }
    $connect->close();
    }
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
                    <h3 style="color:var(--brand); margin-top: 50px;">Sửa Lịch Hẹn Của Tôi</h3>
                    <p style="color:#000; font-size: 20px; font-weight: 400;">Quản lý lịch hẹn để bạn có thể xem và huỷ lịch nhanh chóng.</p>
                    <hr>
                    <form  action="" method="POST" style="text-align: center; height: auto; width: 800px; margin-top: 0px; padding: 30px 30px;">
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']){
                        include 'config.php';
                        $username = $_SESSION['user'];
                        $result=mysqli_query($conn, "SELECT * FROM `lichhen` where phone = '{$username}'");
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                        <label for="" style="width:120px; font-weight: bolder;">Họ Và Tên:</label>
                        <input type="text" disabled value="<?php echo $row['name']?>" style=" background-color: #fff;font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Số Điện Thoại:</label>
                        <input type="text" disabled value="<?php echo $row['phone']?>" style=" background-color: #fff;font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Ngày Đặt:</label>
                        <input type="text" name="ngay" value="<?php echo $row['ngay']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px; border:none"><br>
                        <?php } ?>
                        <label for="" style="width:120px; font-weight: bolder;">Thời Gian:</label>
                        <select  name="gio" style="background-color: #fff ;font-size: 20px; color:#000;height: 40px; width:298px ;margin-bottom: 10px; border:none">
                    <option value="7 giờ">7 giờ</option>
                    <option value="8 giờ">8 giờ</option>
                    <option value="9 giờ">9 giờ</option>
                    <option value="10 giờ">10 giờ</option>
                    <option value="11 giờ">11 giờ</option>
                                    <option value="12 giờ">12 giờ</option>
                    <option value="13 giờ">13 giờ</option>
                                    <option value="14 giờ">14 giờ</option>
                    <option value="15 giờ">15 giờ</option>
                                    <option value="16 giờ">16 giờ</option>
                    <option value="17 giờ">17 giờ</option>
                                    <option value="18 giờ">18 giờ</option>
                    <option value="19 giờ">19 giờ</option>
                                    <option value="20 giờ">20 giờ</option>
                    <option value="21 giờ">21 giờ</option>
                                    <option value="22 giờ">22 giờ</option>
                    <option value="23 giờ">23 giờ</option>
                                    </select>
                  <select name="phut" style="background-color: #fff ;font-size: 20px; color:#000;height: 40px; width:300px ;margin-bottom: 10px; border:none">
                    <option value="00 phút">00 phút</option>
                    <option value="05 phút">05 phút</option>
                    <option value="10 phút">10 phút</option>
                    <option value="15 phút">15 phút</option>
                    <option value="20 phút">20 phút</option>
                    <option value="25 phút">25 phút</option>
                    <option value="30 phút">30 phút</option>
                    <option value="35 phút">35 phút</option>
                    <option value="40 phút">40 phút</option>
                    <option value="45 phút">45 phút</option>
                    <option value="50 phút">50 phút</option>
                    <option value="55 phút">55 phút</option>
                  </select><br>
                        <label for="" style="width:120px; font-weight: bolder;">Chi Nhánh:</label>
                        <select style="background-color: #fff ;font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px; border:none" name="chinhanh">
                  <?php
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
                                  $id=$_GET['id'];
                            $sql = "SELECT * FROM `chinhanh`";
                            $ket_qua =  $connect->query($sql);
                            $i=0;
                            while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
                            $i++;
					              ?>
                        <option value="<?php echo $row['diachi']?>"><?php echo $row['diachi']?></option>
                        <?php } ?>
                  </select>
                  <?php
                        include 'config.php';
                        $username = $_SESSION['user'];
                        $result=mysqli_query($conn, "SELECT * FROM `lichhen` where phone = '{$username}'");
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                        <label for="" style="width:120px; font-weight: bolder;">Ghi Chú:</label>
                        <input type="text" name="note" value="<?php echo $row['note']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Dịch Vụ:</label>
                        <input type="text" name="dichvu" value="<?php echo $row['dichvu']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                    <?php } ?>
                       <input type="submit" name="sbm" value="Cập Nhật Lịch Hẹn" style="text-align: center; padding: 5px; background-color: #f68037; border: none; border-radius: 5px; color: #fff; font-size: 18px; font-weight: 600;">
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
  include "footer.php"
?>
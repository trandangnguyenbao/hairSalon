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
                    <h3 style="color:var(--brand); margin-top: 50px;">Lịch Hẹn Của Tôi</h3>
                    <p style="color:#000; font-size: 20px; font-weight: 400;">Quản lý lịch hẹn để bạn có thể xem và huỷ lịch nhanh chóng.</p>
                    <hr>
                    <form action="" method="POST" style="height: auto; width: 800px; margin-top: 0px; padding: 30px 30px;">
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']){
                        include 'config.php';
                        $username = $_SESSION['user'];
                        $result=mysqli_query($conn, "SELECT * FROM `lichhen` where phone = '{$username}'");
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                        <label for="" style="width:120px; font-weight: bolder;">Họ Và Tên:</label>
                        <input type="text" disabled value="<?php echo $row['name']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Số Điện Thoại:</label>
                        <input type="text" disabled value="<?php echo $row['phone']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Ngày Đặt:</label>
                        <input type="text" disabled name="ngaysinh" value="<?php echo $row['ngay']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Thời Gian:</label>
                        <input type="text" disabled name="gioitinh" value="<?php echo $row['thoigian']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Chi Nhánh:</label>
                        <input type="text" disabled name="noisinh" value="<?php echo $row['chinhanh']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Ghi Chú:</label>
                        <input type="text" disabled name="noisinh" value="<?php echo $row['note']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <label for="" style="width:120px; font-weight: bolder;">Dịch Vụ:</label>
                        <input type="text" disabled name="noisinh" value="<?php echo $row['dichvu']?>" style="font-size: 20px; color:#000;height: 40px; width:600px ;margin-bottom: 10px;"><br>
                        <ul class="lichhen" style="display: flex; padding:20px 150px; justify-content: space-around;">
                        <li class="lichhen"><a href="sualichhen.php?id_lichhen=<?php echo $row['id_lichhen']?>" class="sualichhen" style="padding:10px 10px; border: none; border-radius: 5px; background-color: #f68037; font-size: 18px; font-weight: 600; color: #fff;">Sửa Lịch Hẹn</a></li>
                        <li class="lichhen"><a href="xoalichhen.php?id_lichhen=<?php echo $row['id_lichhen']?>" class="huylichhen" style="padding:10px 10px; border: none; border-radius: 5px; background-color: #f68037; font-size: 18px; font-weight: 600; color: #fff;">Huỷ Lịch Hẹn</a></li>
                        </ul>
                        <?php }}?>
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
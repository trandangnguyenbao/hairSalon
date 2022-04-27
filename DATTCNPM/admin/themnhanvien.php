<?php
    include 'config.php';
    // $sql_brand = "SELECT * FROM brands";
    // $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $hoten = $_POST['hoten'];
        $type = $_POST['type'];
        $chucvu = $_POST['chucvu'];
        $chinhanh = $_POST['chinhanh'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $noisinh = $_POST['noisinh'];
        $background = $_FILES['background']['name'];
        $image_tmp = $_FILES['background']['tmp_name'];
        $sql = "INSERT INTO `khachhang` (username, password,hoten , chucvu,chinhanh, type,background, noisinh,gioitinh,ngaysinh) VALUES('$username', '$password', '$hoten', '$chucvu', '$chinhanh' , '$type', '$background','$noisinh' , '$gioitinh',  '$ngaysinh')";
        $query = mysqli_query($conn, $sql);
        move_uploaded_file($image_tmp, '../img/'.$background);
        header('location: quanlynhanvien.php');
    }
    if(isset($_POST['sbm'])){
        $username = $_POST['hoten'];
        $chinhanh = $_POST['chinhanh'];
        $chucvu = $_POST['chucvu'];
        $sql = "INSERT INTO `calam` (tennv, chinhanh,chucvu) VALUES('$username', '$chinhanh', '$chucvu')";
        $query = mysqli_query($conn, $sql);
        // move_uploaded_file($image_tmp, '../img/kieutoc/'.$img);
        header('location: quanlynhanvien.php');
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        label{
            font-weight: 500;
        }

        .card input[type="search"]{
            margin-right: -6px;
        }

        .card input[type="search"]:focus, .card-header button:focus{
            box-shadow: none!important;   
        }

        .card-header button{
            width: 140px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
    <title>Document</title>
    
</head>
<div class="container-fluid">
    <div class="card">  
        <div class="card-header">
            <h2>Thêm Nhân Viên</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tài Khoản</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Họ Tên</label> <br>
                    <input type="text" name="hoten">
                </div>

                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <select name="gioitinh" id="">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input type="text" name="ngaysinh" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nơi Sinh</label>
                    <input type="text" name="noisinh" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" name="background" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phân Quyền</label><br>
                    <select name="type" id="" style="height: 38px;">
                        <option value="admin">admin</option>
                        <option value="nhanvien">nhanvien</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Chức Vụ</label><br>
                    <select name="chucvu" id="" style="height: 38px;">
                        <option value="Nhân Viên Tư Vấn">Nhân Viên Tư Vấn</option>
                        <option value="Barber">Barber</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Chi Nhánh</label><br>
                <select name="chinhanh" style="height: 40px;">
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
                </div>
                <!-- <input type="hidden" name="type" value="admin" class="form-control"> -->
                <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
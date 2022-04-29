<?php
    include 'config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `khachhang` WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if(isset($_POST['sua'])){
        $password = $_POST['password'];
        $chinhanh = $_POST['chinhanh'];
        $type = $_POST['type'];
        $sql = "UPDATE `khachhang` SET password = md5('$password'), chinhanh = '$chinhanh', type = '$type' WHERE id = $id";

        $query = mysqli_query($conn, $sql);
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
            <h2>Cập Nhật Nhân Viên</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                </div>
                <div class="form-group">
                    <label>Phân Quyền</label><br>
                    <select name="type" id="" style="height: 40px;">
                        <option value="admin">admin</option>
                        <option value="nhanvien">nhanvien</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="">Chi Nhánh</label><br>
                <select class="" name="chinhanh" style="height: 40px;">
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
                    <input type="submit" name="sua" class="btn btn-success"></input>
            </form>
        </div>
    </div>
</div>
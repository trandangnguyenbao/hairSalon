<?php
    include 'config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `khachhang` WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if(isset($_POST['sbm'])){
        $tennv = $_POST['tennv'];
        $chinhanh = $_POST['chinhanh'];
        $calam = $_POST['calam'];
        $ngaylam = $_POST['ngaylam'];
        $chucvu = $_POST['chucvu'];
        $sql = "INSERT INTO calam(tennv, chinhanh, calam, ngaylam, chucvu) value ('$tennv', '$chinhanh', '$calam', '$ngaylam', '$chucvu')";
        $query = mysqli_query($conn, $sql);
        header('location: quanlycalam.php');
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
            <h2>Tạo Lịch Làm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên Nhân Viên</label>
                    <input type="text" name="tennv" class="form-control" value="<?php echo $row['hoten']; ?>">
                </div>
                <div class="form-group">
                    <label>Chi Nhánh</label>
                    <input type="text" name="chinhanh" class="form-control" value="<?php echo $row['chinhanh']; ?>">
                </div>
                <div class="form-group">
                    <label>Ca Làm</label>
                    <select name="calam" id="" style="padding: 5px 20px;">
                        <option value="Ca 1">Ca 1</option>
                        <option value="Ca 2">Ca 2</option>
                        <option value="Ca 3">Ca 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Làm</label>
                    <input type="text" name="ngaylam" class="form-control" value="" placeholder="YYYY/MM/DD">
                </div>
                <div class="form-group">
                    <label>Chức Vụ</label>
                    <input type="text" name="chucvu" class="form-control" value="<?php echo $row['chucvu']; ?>">
                </div>
                <input type="submit" name="sbm" class="btn btn-success"></input>
            </form>
        </div>
    </div>
</div>
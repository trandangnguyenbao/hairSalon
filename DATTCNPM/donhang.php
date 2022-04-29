<?php
    include "header.php";
?>

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
                $username = "";
                $id_giohang = "";
                $tongtien = 0;
                $ngaydat = "";
                $ngaygiao = "";
                // $soluong = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST["tenkh"])) { $tenkh = $_POST['tenkh']; }
                    if(isset($_POST["username"])) { $username = $_POST['username']; }  
                    if(isset($_POST["id_giohang"])) { $id_giohang =$_POST['id_giohang']; }
                    if(isset($_POST["tongtien"])) { $tongtien =$_POST['tongtien']; }
                    if(isset($_POST["ngaydat"])) { $ngaydat =$_POST['ngaydat']; }
                    if(isset($_POST["ngaygiao"])) { $ngaygiao =$_POST['ngaygiao']; }
                    $username = $_SESSION['user'];
                    $sql1 = "SELECT * FROM khachhang where username = $username";
                    $ketqua = $connect->query($sql1);
					$rowss = $ketqua->fetch_array(MYSQLI_ASSOC);
                    $tenkh = $rowss['hoten'];
                    $sql3 = "SELECT * FROM giohang where username = $username";
                    $ketqua2 = $connect->query($sql3);
                    $Row = $ketqua2->fetch_array(MYSQLI_ASSOC);
                    $id_giohang = $Row['id_giohang'];
					
					$sql = " INSERT INTO donhang (id_giohang,tongtien,tenkh, ngaydat, ngaygiao)
					values ('$id_giohang','$tongtien', '$tenkh', '$ngaydat', '$ngaygiao')";
                        // move_uploaded_file($hinhanh_tmp, 'img/sanpham/'.$product_img);
					$res = $connect->query($sql);
						// if($res == TRUE){
						// 	$_SESSION['order'] = "<div class='success text-center'>Đơn hàng đã được đặt thành công.</div>";
						// 	header('location:cart_order.php');
						// }
				    $connect->close();
			
           } }?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/boostrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="remixicons/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css"> 
    <title>hair salon</title>
</head>
<body id="home" data-bs-spy="scroll" data-bs-target=".navbar">
    <section id="shopping-cart">
        <div class="container">
        <h3>Đơn Hàng</h3>
            <div class="row gy-5"> 
                <div class="col-lg-12 shopping-cart">
                    <table class="shopping__cart">
                        <tr>
                            <th style="width: 30%;"><input type="checkbox" class="shopping__cart-item"></th>
                            <th style="width: 20%;">Mã Giỏ Hàng</th>
                            <th style="width: 20%;">Ngày Đặt Hàng</th>
                            <th style="width: 20%;">Ngày Giao Dự Kiến</th>
                            <th style="width: 20%;">Tổng Tiền</th>
                            <th style="width: 3%;">Tình Trạng</th>
                            <th style="width: 5%;"></th>
                        </tr>
                        <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']){
                            include 'config.php';
                            $tenkh = "";
                            $username = $_SESSION['user'];
                            $results=mysqli_query($conn, "SELECT * FROM `khachhang` where username = $username");
                            $rows = mysqli_fetch_assoc($results);
                            $tenkh = $rows['hoten']; 
                            $result=mysqli_query($conn, "SELECT * FROM donhang where tenkh = '{$tenkh}'");
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = mysqli_query($conn, "SELECT * FROM donhang where tenkh ='{$tenkh}'");
                            $totalRecords = $totalRecords->num_rows;
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 8;


                            $total_page = ceil($totalRecords / $limit);

                            if ($current_page > $total_page){
                                $current_page = $total_page;
                            }
                            else if ($current_page < 1){
                                $current_page = 1;
                            }
                            
                            $start = ($current_page - 1) * $limit;
                            $result = mysqli_query($conn, "SELECT * FROM donhang where tenkh = '{$tenkh}'");
                            // $results = mysqli_query($conn, "SELECT * FROM `product` ");
                            $i=0;
                            while ($row = mysqli_fetch_assoc($result)){              
                            $i++;	
                        ?>
                        <tr style="color: #d5d5d5;">
                            <td style="text-align: center;"><input type="checkbox" class="shopping__cart-item"></td>
                            <td style="text-align: center;"><?php echo $row['id_giohang']?></td>
                            <td style="text-align: center;"><?php echo $row['ngaydat']?></td>
                            <td style="text-align: center;"><?php echo $row['ngaygiao']?></td>
                            <td style="text-align: center;"><?php echo number_format($row['tongtien'], 0, ",", ".")?></td>
                            <td style="text-align: center;"><?php echo $row['tinhtrang']?></td>
                            <td>
                                <a href="delete_donhang.php?id=<?php echo $row['id']?>"><i class="ri-delete-bin-5-line"></i></a>
                            </td>
                        </tr>
                        <?php }}?>
                    </table>
                </div>
                <h1 class="text-color">Sản Phẩm Liên Quan</h1>
                <div class="row gy-5 shopping-cartslide">
                    
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
                                // $product_type=$_GET['product_type'];
                                $sql = "SELECT * FROM sanpham where product_type = `product_type`";
                                $ket_qua =  $connect->query($sql);
                                      $i=0;
                                  while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
                                  $i++;
                            ?>
                        <div class="col-lg-3 col-md-6 product-new">
                            <div class="product-link"><a href="product-details.php?id=<?= $row['id']?>">
                            <img src="img/sanpham/<?php echo $row['product_img']; ?>" alt="">
                            <div class="social-links">
                                <a href="#" class="social__links"><i class="ri-heart-fill"></i></a>
                                <a href="#" class="social__links"><i class="ri-shopping-bag-line"></i></a>
                            </div> 
                            <p class="descript"><a href="product_details.php?id=<?= $row['id']?>"><?= $row['product_name'] ?></a></p>
                            <ul class="price">
                                <li class="price-now">
                                    <p><?= number_format($row['product_cost'], 0, ",", ".") ?></p>
                                </li>
                                <li class="price-old"><del><?= number_format($row['product_oldcost'], 0, ",", ".") ?></del></li>
                            </ul>
                            <ul class="rating">
                                <li class="rating"><i class="ri-star-fill"></i></li>
                                <li class="rating"><i class="ri-star-fill"></i></li>
                                <li class="rating"><i class="ri-star-fill"></i></li>
                                <li class="rating"><i class="ri-star-fill"></i></li>
                                <li class="rating"><i class="ri-star-fill"></i></li>
                            </ul>
                            <?php
                        ?> 
                            </div></a>
                        </div>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </section>
    <script>
        $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
            if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
        })
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('.shopping-cartslide').slick({
  slidesToShow: 4,
  slidesToScroll: 1, 
  arrows:true,
  Infinity:true
});

var filtered = false;

$('.js-filter').on('click', function(){
  if (filtered === false) {
    $('.filtering').slick('slickFilter',':even');
    $(this).text('Unfilter Slides');
    filtered = true;
   } else {
    $('.filtering').slick('slickUnfilter');
     $(this).text('Filter Slides');
     filtered = false;
   }
});
  </script>
</body>
</html>

<?php
  include "footer.php"
?>

<?php
    include "footer.php";
?>

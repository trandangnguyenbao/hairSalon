<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location:account.php");
}
?>
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
    <style>
     @media (min-width:801px) and (max-width:992px){
      li.menu__icon{
        display: none;
      }
      a.nav-link{
        font-size: 16px;
        font-weight: 500;
      }
      li.hidden{
        display: none;
      }
      li.account_hidden{
        display: none;
      }

    }
      @media (min-width:320px) and (max-width:801px){
        li.menu__icon{
          position: relative;
          left: 90%;
          list-style-type: none;
        }
        li.nav-dropdown{
          display: none;
        }
        ul.navbar-nav{
          display: block;
          flex-direction: column;
          padding-left: 25px;
        }
        li.nav-item{
          display: block;
          background-color: #fff;
          border-radius: 5px;
          border: 1px solid #d5d5d5;
          box-shadow: 0px 10px 15px #d5d5d5;
        }
        a.nav-link{
          color:#000 ;
          margin: 0;
          padding: 10px;
        }
        .nav__item > li.hidden{
          display: block;
        }
        li.account_hidden{
          background-color: transparent;
          position: absolute;
          margin-top: -10px;
          padding-right: 50px;
        }
        nav ul {
          position: fixed;
          top: 94px;
          left: 0;
          background: #fff;
          width: 100%;
          height: 100%;
          overflow: hidden;
          transition: max-height 0.5s;
      }
        li.account{
          display: none;
        }
      }

    </style>
</head>
<body id="home" data-bs-spy="scroll" data-bs-target=".navbar">
     <!-- NAVBAR -->
     
     <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand fixed-top">
      <div class="container-fluid" style="display: flex; justify-content: space-between;">
        <a class="navbar-brand" href="#"><img class="logo" src="img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-lg-auto ms-md-12" id="navbarNav">
          <ul class="navbar-nav ms-lg-auto ms-md-auto ms-sm-auto ms-auto" id="itemList">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php" >Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="hanhtrinhtoasang.php">Hành Trình Toả Sáng</a>
            </li>
            <li class="nav-item hidden">
              <a class="nav-link" aria-current="page" href="index.php#booking">Đặt Lịch</a>
            </li>
            <li class="nav-item hidden d-lg-none">
                  <a class="nav-link" aria-current="page" href="danhgia.php">Đánh Giá</a>
            </li>
            <li class="nav-item hidden d-lg-none">
              <a class="nav-link" aria-current="page" href="product.php">BarBer Shop</a>
            </li>
            <li class="nav-item hidden d-lg-none">
              <a class="nav-link" aria-current="page" href="khamphakieutoc.php">Khám Phá Kiểu Tóc</a>
            </li>
            <li class="nav-item d-md-none hidden-search">
              <a class="nav-link" aria-current="page" href="searchshop.php">Tìm Shop Gần Nhất</a>
            </li>
            <li class="nav-item hidden">
                  <a class="nav-link" aria-current="page" href="searchshop.php">Tìm Shop Gần Nhất</a>
                </li>
            <!-- List Menu -->
            <li class="nav-dropdown">TÌM HIỂU THÊM
              <ul class="nav__item">
                <li class="nav-item ">
                  <a class="nav-link" aria-current="page" href="danhgia.php">Đánh Giá</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" aria-current="page" href="product.php">BarBer Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="khamphakieutoc.php">Khám Phá Kiểu Tóc</a>
                </li>
                <li class="nav-item d-sm-none d-lg-block d-md-block">
                  <a class="nav-link" aria-current="page" href="searchshop.php">Tìm Shop Gần Nhất</a>
                </li>
                <li class="nav-item hidden">
                  <a class="nav-link" aria-current="page" href="index.php#booking">Đặt Lịch</a>
                </li>
                <li class="nav-item hidden search">
                  <a class="nav-link" aria-current="page" href="searchshop.php">Tìm Shop Gần Nhất</a>
                </li>
              </ul>
              <!-- List Menu -->
              <li class="nav-item nav-dropdown account "><?php 
              if (isset($_SESSION['user']) && $_SESSION['user']){
                        echo $_SESSION['user'];
                    }
                    else{
                        echo 'Bạn chưa đăng nhập';
                    }
                    ?>
                <ul class="nav-link nav__item">
                    
                  <li class="nav-item"><a class="nav-link" href="taikhoan.php">Tài Khoản Của Tôi</a></li>
                  <li class="nav-item"><a class="nav-link" href="donhang.php">Đơn Hàng</a></li>
                  <li class="nav-item"><a class="nav-link" href="quanlylichhen.php">Lịch Hẹn</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Đăng Xuất</a></li>
                </ul>
              </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="shopping-cart.php"><i style="font-size: 25px;" class="ri-shopping-cart-fill"></i></a>
            </li>

              <!-- Menu-dropdown -->
              
              <!-- Menu-dropdown -->
          </ul>
                  <li class="menu__icon" >
                    <i class="ri-menu-line" onclick="menutoggle()">
                    </i>
                  </li>
                  <li class="nav-item nav-dropdown account_hidden hidden" style="list-style: none;"><?php 
              if (isset($_SESSION['user']) && $_SESSION['user']){
                        echo $_SESSION['user'];
                    }
                    else{
                        echo 'Bạn chưa đăng nhập';
                    }
                    ?>
                <ul class="nav-link nav__item">
                    
                  <li class="nav-item"><a class="nav-link" href="taikhoan.php">Tài Khoản Của Tôi</a></li>
                  <li class="nav-item"><a class="nav-link" href="donhang.php">Đơn Hàng</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Đăng Xuất</a></li>
                </ul>
              </li>
          <!-- <a href="#" class="btn btn-outline-brand ms-lg-3">Book Now</a> -->
        </div>
      </div>
    </nav>
  <!-- // NAVBAR -->
    
    <!-- HERO -->
      <section id="hero">
          <div class="container-fluid">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <a href=""><img src="img/layer1.jpg" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                  <a href=""><img src="img/layer2.jpg" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                  <a href=""><img src="img/layer3.jpg" alt="Third slide"></a>
                </div>
                <div class="carousel-item">
                  <a href=""><img src="img/layer4.jpg" alt="Four slide"></a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      </section>
    <!-- // HERO -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('.product-bottom').slick({
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
   <script>
        var itemList = document.getElementById("itemList");
        var navItem = document.getElementsByClassName("nav-item");
        var navLink = document.getElementsByClassName("nav-link");
        // itemList.style.maxWidth = "0px";

        function menutoggle(){
            console.log('itemList');
            if(itemList.style.maxHeight == "0px")
                {
                  itemList.style.maxHeight = "100%";
                  itemList.style.flexDirection = "Collumn";
                  navItem.style.display = "block";
                  navLink.style.display = "block";
                  navLink.style.color = "red";
                  itemList.style.marginTop = "300px";
                  itemList.style.color = "";
                }
            else
                {
                  itemList.style.maxHeight = "0px";
                } 
}

    
    </script>
  </body>
</html>
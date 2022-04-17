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
}//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$tenkh =" ";
$tongtien = " ";
$id_giohang = " ";
$username = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["tenkh"])) { $tenkh = $_POST['tenkh']; }
	if(isset($_POST["tongtien"])) { $tongtien = $_POST['tongtien']; }
	if(isset($_POST["id_giohang"])) { $id_giohang =$_POST['id_giohang']; }
	// if(isset($_POST["tongtien"])) { $tongtien =$_POST['tongtien']; }
	// if(isset($_POST["tinhtrang"])) { $tinhtrang =$_POST['tinhtrang']; }
	$username = $_SESSION['user'];
  	$sql1 = "SELECT * FROM khachhang where username = '{$username}'";
	$query =  $connect->query($sql1);
	$row = $query->fetch_array();
    $tenkh = $row['hoten'];
	$sql2 = "SELECT * FROM giohang where username = '{$username}'";
	$query1 =  $connect->query($sql2);
	$rows = $query1->fetch_array();
    $id_giohang = $row['id_giohang'];
	// $tongtien = $giatien * $soluong;
//Code xử lý, insert dữ liệu vào table
	$sql = "INSERT INTO donhang (tenkh, id_giohang, tongtien)
	VALUES ('$tenkh', $id_giohang'', '$tongtien')";
    if ($connect->query($sql) === TRUE) {
        header("http://localhost/DATT/DATTCNPM/index.php");
 } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
		header("shopping-cart.php");
 }
}
//Đóng database
    $connect->close();
}
?>
<?php
$servername = "localhost"; // Thay đổi tên máy chủ nếu cần thiết
$username = "sa"; // Thay đổi tên người dùng nếu cần thiết
$password = "123456"; // Thay đổi mật khẩu nếu cần thiết
$dbname = "ClothingStore"; // Thay đổi tên cơ sở dữ liệu nếu cần thiết

// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$connection) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>
<?php
$query = "SELECT name, image, price FROM products";
$result = mysqli_query($connection, $query);

// Kiểm tra và xử lý kết quả truy vấn
if (mysqli_num_rows($result) > 0) {
    // Lặp qua từng hàng dữ liệu và hiển thị
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];

        // Hiển thị thông tin sản phẩm trong HTML
        echo "<h1>$name</h1>";
        echo "<img src='$image' alt='Product Image'>";
        echo "<p>Price: $price</p>";
    }
} else {
    echo "Không có sản phẩm nào.";
}

// Giải phóng kết quả truy vấn và đóng kết nối
mysqli_free_result($result);
mysqli_close($connection);
?>
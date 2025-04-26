<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị hệ thống</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f6fa;
        }

        .wrapper {
            display: flex;
        }

        .sidebar {
            width: 230px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar ul li:hover {
            background: #34495e;
            cursor: pointer;
        }

        .main {
            flex: 1;
            padding: 30px;
            background: #ecf0f1;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-add {
            background: #3498db;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #bdc3c7;
            text-align: left;
        }

        th {
            background: #34495e;
            color: white;
        }

        .thumb {
            width: 60px;
            height: auto;
        }

        .btn {
            padding: 6px 10px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            margin-right: 5px;
            display: inline-block;
        }

        .btn-blue { background: #2980b9; }
        .btn-green { background: #27ae60; }
        .btn-red { background: #e74c3c; }
        .btn-blue:hover, .btn-green:hover, .btn-red:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <aside class="sidebar">
        <h2>Quản trị hệ thống</h2>
        <ul>
            <li>📊 Thống kê</li>
            <li>🛒 Quản lý bán hàng</li>
            <li>📚 Sản phẩm</li>
            <li>👨‍💼 Khách hàng</li>
            <li>🧾 Đơn hàng</li>
            <li>📈 Slider</li>
            <li>⚙️ Hệ thống</li>
        </ul>
    </aside>

    <main class="main">
        <header>
            <h1>Danh sách sản phẩm</h1>
            <a href="#" class="btn-add">+ Thêm mới</a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Loại sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Nhập hàng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Truy vấn danh sách sản phẩm từ database
                $result = mysqli_query($con, "SELECT * FROM products");
                while ($row = mysqli_fetch_assoc($result)) {
                    // Đường dẫn tới ảnh sản phẩm dựa vào PID
                    $imgPath = "img/books/" . $row['PID'] . ".png";
                    
                    // Kiểm tra xem ảnh có tồn tại không
                    if (!file_exists($imgPath)) {
                        $imgPath = "img/books/noimg.png"; // Nếu không có ảnh, dùng ảnh mặc định
                    }

                    // Xác định trạng thái sản phẩm
                    $status = $row['Available'] > 0 ? '✅' : '❌';

                    // Hiển thị thông tin sản phẩm
                    echo "<tr>
                        <td>{$row['PID']}</td>
                        <td><img src='$imgPath' class='thumb'></td>
                        <td>{$row['Title']}</td>
                        <td>{$row['Available']}</td>
                        <td>{$row['Category']}</td>
                        <td>$status</td>
                        <td><a href='#' class='btn btn-blue'>📦 Nhập hàng</a></td>
                        <td>
                            <a href='edit_product.php?pid={$row['PID']}' class='btn btn-green'>✏️ Sửa</a>
                            <a href='delete_product.php?pid={$row['PID']}' onclick='return confirm(\"Xóa sản phẩm?\")' class='btn btn-red'>🗑️ Xóa</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</div>
</body>
</html>

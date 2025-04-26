<?php
	session_start();
  if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
	include "dbconnect.php";
         $customer=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="author" content="Shivangi Gupta">
    <title>order</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid #D67B22;padding-left:0px;padding-right:0px;}
        .panel-heading {background:#D67B22 !important;color:white !important;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}

.section {
    padding: 15px 0;
}

h2 {
    font-size: 18px;
    color: #D67B22;
    margin-bottom: 10px;
    padding-bottom: 5px; /* Space between text and line */
    border-bottom: 1px solid #ddd; /* Line color and thickness */
}

.address-form, .payment-form, .promo-code {
    display: flex;
    flex-direction: column;
}

input, select {
    padding: 8px;
    margin: 5px 0;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="radio"] {
    width: auto;
    margin-right: 10px;
}

button {
    background-color: #D67B22;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    border-radius: 4px;
}

button:hover {
    background-color: #b35819;
}

.order-summary {
    display: flex;
    align-items: center;
}

.order-summary .item {
    display: flex;
    width: 100%;
    justify-content: space-between;
}

.order-summary img {
    width: 100px;
    height: auto;
    margin-right: 10px;
}

.price {
    text-align: right;
}

.discounted-price {
    color: red;
}

.checkout-btn {
    text-align: center;
    margin-top: 20px;
}

.checkout-btn button {
    padding: 15px 30px;
    font-size: 16px;
}
/* Inner container styling */
.checkout-container {
    background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}
.background-border3 {
	background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}

/* Border styling for Phương thức thanh toán */
.background-border2 {
    background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}
.background-border4 {
    background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}

/* Border styling for Thông tin khác */
.background-border5 {
    background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}

/* Border styling for Kiểm tra lại đơn hàng */
.background-border6 {
    background-color: white; /* Main content background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional inner shadow */
    width: 90%;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
}
.flex-container {
        display: flex;
        flex-direction: column; /* Stack the rows vertically */
    }
    .flex-item {
        display: flex; /* Display item flex */
        justify-content: space-between; /* Distribute space evenly */
        align-items: center; /* Center items vertically */
        border: 1px solid #ddd; /* Optional: add a border around items */
        padding: 10px; /* Add some padding */
        margin-bottom: 10px; /* Space between items */
        border-radius: 5px; /* Optional: round corners */
    }
    .panel img {
        max-width: 100%; /* Ensure image scales */
        height: auto; /* Maintain aspect ratio */
    }

    </style>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
         	 </button>
          	<a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.jpg"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
	        <?php
	        if(!isset($_SESSION['user']))
	          {
	            echo'
	            <li>
	                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Login</button>
	                  <div id="login" class="modal fade" role="dialog">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                                <h4 class="modal-title text-center">Login Form</h4>
	                            </div>
	                            <div class="modal-body">
	                              <ul >
	                                <li>
	                                  <div class="row">
	                                      <div class="col-md-12 text-center">
	                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
	                                              <div class="form-group">
	                                                  <label class="sr-only" for="username">Username</label>
	                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
	                                              </div>
	                                              <div class="form-group">
	                                                  <label class="sr-only" for="password">Password</label>
	                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
	                                                  <div class="help-block text-right">
	                                                      <a href="#">Forget the password ?</a>
	                                                  </div>
	                                              </div>
	                                              <div class="form-group">
	                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
	                                                      Sign in
	                                                  </button>
	                                              </div>
	                                          </form>
	                                      </div>
	                                  </div>
	                                </li>
	                              </ul>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                            </div>
	                        </div>
	                    </div>
	                  </div>
	            </li>
	            <li>
	              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Sign Up</button>
	                <div id="register" class="modal fade" role="dialog">
	                  <div class="modal-dialog">
	                      <div class="modal-content">
	                          <div class="modal-header">
	                              <button type="button" class="close" data-dismiss="modal">&times;</button>
	                              <h4 class="modal-title text-center">Member Registration Form</h4>
	                          </div>
	                          <div class="modal-body">
	                            <ul >
	                              <li>
	                                <div class="row">
	                                    <div class="col-md-12 text-center">
	                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
	                                            <div class="form-group">
	                                                <label class="sr-only" for="username">Username</label>
	                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
	                                            </div>
	                                            <div class="form-group">
	                                                <label class="sr-only" for="password">Password</label>
	                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
	                                            </div>
	                                            <div class="form-group">
	                                                <button type="submit" name="submit" value="register" class="btn btn-block">
	                                                    Sign Up
	                                                </button>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                              </li>
	                            </ul>
	                          </div>
	                          <div class="modal-footer">
	                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                          </div>
	                      </div>
	                  </div>
	                </div>
	            </li>';
	          } 
	        else
	            echo '<li> <a href="destroy.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Đăng Xuất</a></li>';
	        ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id="top">
    <div id="searchbox" class="container-fluid" style="width: 112%; margin-left: -6%; margin-right: -6%; display: flex; align-items: center;">
        <form role="search" method="POST" action="Result.php" style="flex: 1;">
            <input type="text" class="form-control" name="keyword" style="width: 80%; margin: 20px 10%;" 
                   placeholder="Tìm kiếm sách, tác giả hoặc tiểu thuyết ...">
        </form>
        <!-- <ul class="nav navbar-nav" style="display: flex; margin-left: auto; align-items: center;">
            ?php
            if (isset($_SESSION['user'])) {
                echo '<li style="margin-left: 10px;">
                          <a href="destroy.php" class="btn btn-lg">
                              <span class="glyphicon glyphicon-log-out"></span>&nbsp;Đăng Xuất
                          </a>
                      </li>';
            }
            ?
        </ul> -->
    </div>
</div>
<div class="background-border">
<div class="checkout-container">
        <!-- Shipping Address Section -->
        <section class="section">
            <h2>Địa chỉ giao hàng</h2>
            <form class="address-form">
                <label>Họ và tên người nhận</label>
                <input type="text" placeholder="Nhập họ và tên người nhận">
                
                <label>Email</label>
                <input type="email" placeholder="Nhập email">

                <label>Số điện thoại</label>
                <input type="tel" placeholder="VD: 0975123xxx (10 ký tự số)">

                <label>Quốc gia</label>
                <select>
                    <option>Việt Nam</option>
                    <option>Hoa Kỳ</option>
                    <option>Nhật Bản</option>
                    <option>Hàn Quốc</option>
                    <option>Pháp</option>
                    <option>Đức</option>
                    <option>Canada</option>
                    <option>Úc</option>
                    <option>Thái Lan</option>
                    <option>Singapore</option>
                </select>

                <label>Tỉnh/Thành Phố</label>
                <select>
                    <option>Chọn tỉnh/thành phố</option>
                    <option>Hà Nội</option>
                    <option>TP. Hồ Chí Minh</option>
                    <option>Đà Nẵng</option>
                    <option>Hải Phòng</option>
                    <option>Cần Thơ</option>
                    <option>Bắc Ninh</option>
                    <option>Huế</option>
                    <option>Quảng Ninh</option>
                    <option>Đồng Nai</option>
                    <option>Bình Dương</option>
                    <option>Khánh Hòa</option>

                </select>

                <label>Quận/Huyện</label>
                <select>
                    <option>Chọn quận/huyện</option>
                    <option>Quận 1</option>
                    <option>Quận 3</option>
                    <option>Quận 7</option>
                    <option>Quận Bình Thạnh</option>
                    <option>Quận Gò Vấp</option>
                    <option>Huyện Củ Chi</option>
                    <option>Huyện Đông Anh</option>
                    <option>Quận Hoàn Kiếm</option>
                    <option>Quận Ba Đình</option>
                    <option>Huyện Thanh Trì</option>

                </select>

                <label>Phường/Xã</label>
                <select>
                    <option>Chọn phường/xã</option>
                    <option>Phường Bến Nghé</option>
                    <option>Phường Bến Thành</option>
                    <option>Phường Thảo Điền</option>
                    <option>Phường Linh Trung</option>
                    <option>Phường Trung Hòa</option>
                    <option>Xã Tân Lập</option>
                    <option>Xã Đông La</option>
                    <option>Phường Hàng Mã</option>
                    <option>Phường Quán Thánh</option>
                    <option>Xã Vĩnh Ngọc</option>

                </select>

                <label>Địa chỉ nhận hàng</label>
                <input type="text" placeholder="Nhập địa chỉ nhận hàng">
            </form>
        </section>
    </div>

    	<div class="background-border3">
        <!-- Shipping Method Section -->
        <section class="section">
            <h2>Phương thức vận chuyển</h2>
            <p>Quý khách vui lòng điền và xác định địa chỉ giao hàng trước.</p>
        </section>
    </div>

    	<div class="background-border2">
        <!-- Payment Method Section -->
        <section class="section">
            <h2>Phương thức thanh toán</h2>
            <form class="payment-form">
                <label><input type="radio" name="payment" value="VNPay"> VNPay</label>
                <label><input type="radio" name="payment" value="ShopeePay"> Ví ShopeePay</label>
                <label><input type="radio" name="payment" value="Momo"> Ví Momo</label>
                <label><input type="radio" name="payment" value="Cash"> Thanh toán bằng tiền mặt khi nhận hàng</label>
                <label><input type="radio" name="payment" value="ATM"> ATM / Internet Banking</label>
                <label><input type="radio" name="payment" value="Visa"> Visa / Master / JCB</label>
            </form>
        </section>
    </div>

        <!-- Promo Code Section -->
<div class="background-border4">
    <section class="section">
        <h2>Mã khuyến mãi / Quà tặng</h2>
        <div class="promo-code">
            <input type="text" placeholder="Nhập mã khuyến mãi/Quà tặng">
            <button>Áp dụng</button>
            <a href="#" id="openDialog">Chọn mã khuyến mãi</a>
        </div>
    </section>
</div>

<!-- Dialog Box -->
<div id="promoDialog" class="dialog-overlay" style="display: none;">
    <div class="dialog-content">
        <h3>CHỌN MÃ KHUYẾN MÃI <span> Có thể áp dụng đồng thời nhiều mã</span></h3>
        <input type="text" placeholder="Nhập mã khuyến mãi/Quà tặng">
        <button>Áp dụng</button>
        <div class="no-promo">
            <img src="img/voucher.jpg" alt="No Promo" style="width: 100px;">
            <p>Không có khuyến mãi nào</p>
        </div>
        <button id="closeDialog">Đóng</button>
    </div>
</div>

<!-- CSS -->
<style>
.dialog-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.dialog-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
    text-align: center;
}

.no-promo {
    margin-top: 20px;
}
</style>

<!-- JavaScript -->
<script>
document.getElementById('openDialog').addEventListener('click', function() {
    document.getElementById('promoDialog').style.display = 'flex';
});

document.getElementById('closeDialog').addEventListener('click', function() {
    document.getElementById('promoDialog').style.display = 'none';
});
</script>

        <div class="background-border5">
        <!-- Other Information Section -->
        <section class="section">
            <h2>Thông tin khác</h2>
            <label><input type="checkbox"> Ghi chú</label>
            <label><input type="checkbox"> Xuất hóa đơn GTGT</label>
            <p style="color: gray;">*Từ ngày 01/11/2020...</p>
        </section>
    </div>

<div class="background-border6">
    <!-- Order Summary Section -->
    <section class="section">
        <h2>Kiểm tra lại đơn hàng</h2>
        <div class="order-summary">
            <div class="item">
                <?php
                if (isset($_SESSION['user'])) {   
                    if (isset($_GET['ID'])) {   
                        $product = $_GET['ID'];
                        $quantity = $_GET['quantity'];
                        $query = "SELECT * FROM cart WHERE Customer='$customer' AND Product='$product'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);

                        if (mysqli_num_rows($result) == 0) {
                            $query = "INSERT INTO cart VALUES ('$customer', '$product', '$quantity')"; 
                            $result = mysqli_query($con, $query);
                        } else {
                            $new = $_GET['quantity'];
                            $query = "UPDATE cart SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
                            $result = mysqli_query($con, $query);
                        }
                    }

                    $query = "SELECT PID, Title, Quantity, Price FROM cart INNER JOIN products ON cart.Product = products.PID 
                              WHERE Customer='$customer'";
                    $result = mysqli_query($con, $query); 
                    $total = 0;

                    if (mysqli_num_rows($result) > 0) {   
                        echo '<div class="row flex-container">'; // Use flexbox for the container
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $path = "img/books/" . $row['PID'] . ".png";
                            $Stotal = $row['Quantity'] * $row['Price'];
                            $StotalFormatted = number_format($Stotal, 0, ',', '.');

                            // Flexbox item for each product
                            echo '<div class="panel flex-item" style="margin-top:20px; width:1100px; display: flex; align-items: center;">
                                <div style="width: 100px; text-align: center;">' . $row['PID'] . '</div>
                                <div style="width: 100px; text-align: center;">
                                    <img class="image-responsive block-center" src="' . $path . '" style="height: 100px;">
                                </div>
                                <div style="flex-grow: 1; text-align: center;">' . $row['Title'] . '</div>
                                <div style="width: 80px; text-align: center;">' . $row['Quantity'] . '</div>
                                <div style="width: 120px; text-align: center;">' . number_format($row['Price'], 0, ',', '.') . ' đ</div>
                                <a href="cart.php?remove=' . $row['PID'] . '" class="btn btn-sm" 
                                   style="background:#D67B22;color:white;font-weight:800; margin-left: 10px;">Xóa sản phẩm</a>
                            </div>';

                            $total += $Stotal;                                                  
                        } 
                        echo '</div>'; // Close the flex container

                        $totalFormatted = number_format($total, 0, ',', '.');
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Total Price Display -->
    <div class="container" style="margin-top: 20px;">
        <div class="row">  
            <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-md-4 text-center" style="color:#D67B22;font-weight:800; right: -150px;">
                <div class="panel-heading">Tổng giá sản phẩm</div>
                <div class="panel-body" style="font-size: 24px;"><?php echo $totalFormatted . ' đ'; ?></div>
            </div>
        </div>
    </div>

    <div class="checkout-btn" style="text-align: center; margin-top: 20px;">
    <button id="checkoutBtn">Xác nhận thanh toán</button>
</div>

<!-- Dialog container -->
<div id="dialog" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: black; color: white; padding: 20px; border-radius: 8px; text-align: center; z-index: 1000;">
    <p>Xác nhận thanh toán thành công! Qúy khách sẽ được chuyển đến trang chủ</p>
    <button id="closeBtn" style="margin-top: 10px;">Đóng</button>
</div>

<!-- Overlay background -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

<script>
    document.getElementById('checkoutBtn').addEventListener('click', function() {
        // Show the dialog and overlay
        document.getElementById('dialog').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    });

    document.getElementById('closeBtn').addEventListener('click', function() {
        // Redirect to index.php when "Đóng" is clicked
        window.location.href = 'index.php';
    });
</script>
    
</div>
</div>
<footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>Liên hệ với chúng tôi!</h2>
                      <!-- <hr class="primary"> -->
                      <!-- <p>Vẫn đang phân vân? Hãy gọi cho chúng tôi hoặc gửi email, chúng tôi sẽ phản hồi bạn sớm nhất có thể!</p> -->
                      <!-- <hr class="primary"> -->
                      <p>Phạm Minh Hải - 21103200113</p>
                      <p>Ngô Thế Duy - 21103200063</p>
                      <p>Nguyễn Đức Duy - 21103200064</p>
                  </div>
                  <!-- <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>0397163206</p>
                          <p>0397163206</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>BookStore@gmail.com</p>
                      </div>
                  </div> -->
              </div>
              <div class="hidden-sm-down col-md-2 col-lg-2">
              </div>
              <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                  <h2 style="color:#D67B22;">Theo dõi chúng tôi tại</h2>
                  <div>
                      <a href="https://twitter.com/strandbookstore">
                      <img title="Twitter" alt="Twitter" src="img/social/twitter.png" width="35" height="35" />
                      </a>
                      <a href="https://www.linkedin.com/company/strand-book-store">
                      <img title="LinkedIn" alt="LinkedIn" src="img/social/linkedin.png" width="35" height="35" />
                      </a>
                      <a href="https://www.facebook.com/strandbookstore/">
                      <img title="Facebook" alt="Facebook" src="img/social/facebook.png" width="35" height="35" />
                      </a>
                      <a href="https://plus.google.com/111917722383378485041">
                      <img title="google+" alt="google+" src="img/social/google.jpg" width="35" height="35" />
                      </a>
                      <a href="https://www.pinterest.com/strandbookstore/">
                      <img title="Pinterest" alt="Pinterest" src="img/social/pinterest.jpg" width="35" height="35" />
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</body>
</html>
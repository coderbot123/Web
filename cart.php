<?php
	session_start();
  if(!isset($_SESSION['user']))
       header("location: index.php?Message=Đăng nhập để tiếp tục");
	include "dbconnect.php";
         $customer=$_SESSION['user'];
?>
<?php

        if(isset($_GET['place']))
                 {  
                    $query="DELETE FROM cart where Customer='$customer'";
                    $result=mysqli_query($con,$query);
                 ?>
                    <script type="text/javascript">
                         alert("Đơn hàng đã được đặt thành công!! Xin vui lòng chuẩn bị tiền mặt. Nó sẽ được thu khi giao hàng.");
                    </script>
                 <?php                  
                  }
        if(isset($_GET['remove']))
                 {  $product=$_GET['remove'];
                    $query="DELETE FROM cart where Customer='$customer' AND Product='$product'";
                    $result=mysqli_query($con,$query);
                 ?>
                    <script type="text/javascript">
                         alert("Loại bỏ sản phẩm thành công");
                    </script>
                 <?php                  
                  }     
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
        .panel {padding-left:0px;padding-right:0px;}
        .panel-heading {background:#D67B22 !important;color:white !important;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
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


	<?php

echo '<div class="container-fluid" id="cart">
      <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:#D67B22;text-transform:uppercase; margin-top:10px; margin-left:-20px">Giỏ hàng của bạn</h2>
           </div>
        </div>
      <div class="background-border6" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <!-- Order Summary Section -->
        <section class="section">
            <div class="order-summary">
                <div class="item">';

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
                            $StotalFormatted = number_format($Stotal, 0, ',', '.' );

                            // Flexbox item for each product
                            echo '<div class="panel flex-item" style="margin-top:20px; display: flex; align-items: center; box-shadow: none;">
                                <label style="width: 100px; text-align: center;">
                                    <input type="checkbox" name="cartItem" class="cart-item" value="' . $row['PID'] . '" /> 
                                    <span class="checkbox-custom"></span>
                                </label>
                                <div style="width: 100px; text-align: center;">
                                    <img class="image-responsive block-center" src="' . $path . '" style="height: 100px;">
                                </div>
                                <div style="flex-grow: 1; text-align: center;">' . $row['Title'] . '</div>
                                <div style="width: 80px; text-align: center;" >' . $row['Quantity'] . '</div>
                                <div style="width: 120px; text-align: center;">' . number_format($row['Price'], 0, ',', '.') . ' đ</div>
                                <a href="cart.php?remove=' . $row['PID'] . '" class="btn btn-sm" 
                                   style="background:#D67B22;color:white;font-weight:800; margin-left: 90px;"><i class="fas fa-trash-alt" ></i></a>
                            </div>';
                            echo '<div style="border-bottom: 1px solid #ddd; margin: 10px 0;"></div>'; // Line separator

                            $total += $Stotal;                                                  

                        } 
                        echo '</div>'; // Close the flex container

                        $totalFormatted = number_format($total, 0, ',', '.' );
                        echo '<div class="container" >
                                <div class="row">  
                                    <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:#D67B22;font-weight:800;" >
                                        <div class="panel-heading" >Tổng giá sản phẩm</div>
                                        <div class="panel-body">' . $totalFormatted . ' đ</div>
                                    </div>
                                </div>
                             </div>';
                        echo '<br><br>';
                        echo '<div class="row">
                                 <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                                      <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;">Tiếp tục mua sắm</a>
                                 </div>
                                 <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-1 col-lg-4">
                                      <a href="pay.php?place=true" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;margin-top:5px;">Thanh toán ngay</a>
                                 </div>
                             </div>';
                    } else {
                        // If cart is empty
                        echo '<div class="row" style="margin-bottom:10px; margin-left:-40px">
                                <div class="col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5">
                                      <div class="cart-image">
            <img src="img/emtycart/cart.png" alt="Empty Cart">
        </div>
         <!-- Message below the cart image -->
                <div class="empty-cart-message"style="margin-top: 10px; font-size: 24px; color: #888; text-align:left">
                    Chưa có sản phẩm 
                </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-xs-9 col-xs-offset-3 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                                      <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;">Mua sắm ngay</a>
                                 </div>
                              </div>';
                    }               
                } else { 
                    echo "<div class='row'>
                            <div class='col-xs-12 text-center'>
                                <span style='color:#D67B22;font-weight:bold;'>Đăng nhập để tiếp tục</span>
                            </div>
                          </div>";
                }

                echo '</div>'; // Close the order summary item div
                echo '</div>'; // Close the background-border6 div
                echo '</div>'; // Close the container-fluid div
?>

<style>
/* Custom styles for checkboxes */
.checkbox-custom {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #D67B22;
    border-radius: 4px;
    position: relative;
    cursor: pointer;
    background-color: white;
}

.checkbox-custom:after {
    content: "✔";
    color: white;
    position: absolute;
    top: -2px;
    left: 2px;
    font-size: 16px;
    display: none;
}

/* Hide default checkbox */
input[type="checkbox"] {
    display: none; /* Hide the default checkbox */
}

input[type="checkbox"]:checked + .checkbox-custom {
    background-color: #D67B22; /* Change background when checked */
}

input[type="checkbox"]:checked + .checkbox-custom:after {
    display: block; /* Show the ✔ when checked */
}
</style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
<html>		
<?php
session_start();
include "dbconnect.php";

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}

if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $query = "SELECT * from users where UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con,$query)or die(mysql_error());
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             print'
                <script type="text/javascript">alert("Đăng nhập thành công!!!");</script>
                  ';
        }
        else
        {    print'
              <script type="text/javascript">alert("Tài khoản hoặc mật khẩu không chính xác!!");</script>
                  ';
        }
  }
  else if($_POST['submit']=="register")
  {
        $username=$_POST['register_username'];
        $password=$_POST['register_password'];
        $query="select * from users where UserName = '$username'";
        $result=mysqli_query($con,$query) or die(mysql_error);
        if(mysqli_num_rows($result)>0)
        {   
               print'
               <script type="text/javascript">alert("Tên tài khoản đã đuợc sử dụng");</script>
                    ';

        }
        else
        {
          $query ="INSERT INTO users VALUES ('$username','$password')";
          $result=mysqli_query($con,$query);
          print'
                <script type="text/javascript">
                 alert("Đăng kí thành công!!!");
                </script>
               ';
        }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Duy The">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
      .modal-header {background:#D67B22;color:#fff;font-weight:800;}
      .modal-body{font-weight:800;}
      .modal-body ul{list-style:none;}
      .modal .btn {background:#D67B22;color:#fff;}
      .modal a{color:#D67B22;}
      .modal-backdrop {position:inherit !important;}
       #login_button,#register_button{background:none;color:#D67B22!important;}       
       #query_button {
    position: fixed;
    right: 10px;
    bottom: 10px;
    width: 60px; /* Set width */
    height: 60px; /* Set height */
    background-color: #D67B22;
    color: #fff;
    border-color: #f05f40;
    border-radius: 50%; /* Make the button circular */
    text-align: center; /* Center align text */
    display: flex; /* Flexbox for centering content */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    padding: 0; /* Remove padding */
    font-size: 24px; /* Adjust font size for the icon */
}
.menu-container {
    display: flex;
    gap: 30px; /* Adjust this value to increase/decrease space between items */
    background-color: white;
    padding: 10px;
    border-radius: 25px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%; /* Adjust width as needed, or use a fixed width like 600px */
    max-width: 1234px; /* Optional: Set a maximum width to prevent it from growing too large */
    margin: 0 auto;
}

        .menu-item {
            text-align: center;
            color: #333;
        }

        .menu-icon {
            width: 60px;
            margin-top:10px;
            height: 60px;
            background-color: #f44336; /* Default icon color */
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
            font-size: 24px;
            color: white;
        }

        /* Individual Icon Colors */
        .icon-phap-luat { background-color: #e57373; }
        .icon-mcbooks { background-color: #2196f3; }
        .icon-flash-sale { background-color: #ff5722; }
        .icon-ma-giam-gia { background-color: #64b5f6; }
        .icon-san-pham-moi { background-color: #ffb74d; }
        .icon-tro-gia { background-color: #f06292; }
        .icon-do-cu { background-color: #4caf50; }
        .icon-ban-si { background-color: #ef5350; }
        .icon-manga { background-color: #ff7043; }
        .icon-ngoai-van { background-color: #90caf9; }

        .menu-text {
            font-size: 14px;
        }
  #query_button i {
    font-size: 28px; /* Make the icon size bigger */
}

@media (max-width: 767px) {
    #query_button {
        width: 50px; /* Smaller size for mobile */
        height: 50px; /* Smaller size for mobile */
    }

    #query_button i {
        font-size: 24px; /* Adjust icon size for mobile */
    }

}
body {
    background-color: #F0F0F0; /* Light gray background */
    color: #333; /* Default text color */
}
    .slider-box {; /* Red outline */
    border-radius: 10px; /* Optional: Rounded corners */
    padding: 10px; /* Add some padding around the slider */
    margin: 0 auto; /* Center the box */
    position: relative; /* Positioning for the buttons */
    background-color: orange; /* Red background inside the box */
}

/* Slider Container */
.slider-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    width: 100%; /* Adjust width to fit the page */
    overflow: hidden;
    padding: 20px 0;
}

/* Slider */
#slider {
    display: flex;
    overflow-x: scroll;
    scroll-behavior: smooth;
    padding: 10px 0;
    width: 100%; /* Use full width of the container */
    margin: 0 auto;
}

/* Hide scrollbar */
#slider::-webkit-scrollbar {
    display: none;
}


/* Book Card */
.book-card {
    flex: 0 0 calc(25% - 20px); /* Each book takes up 25% of the container width minus padding */
    height: auto;
    border-radius: 10px;
    margin: 0 10px;
    border: 1px solid #919191;
    padding: 10px;
    text-align: center;
    transition: box-shadow 0.3s ease;
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
}
/* Title Styles */
.title {
    display: flex; /* Use flexbox for title and countdown */
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
    margin: 0; /* Remove default margin */
}

/* Countdown Styles */
.countdown {
    display: flex; /* Flexbox for countdown */
    margin-left: 10px; /* Space between title and countdown */
    font-size: 24px; /* Adjust font size for visibility */
}

/* Countdown Digits Styles */
.digit {
    font-weight: bold;
    color: #FF0000; /* Color for digits */
    margin: 0 2px; /* Space between digits */
}


/* Book Image */
.book-card .block-center.img-responsive {
    width: 120px;
    height: auto;
    margin: 0 auto;
}

/* Progress Bar Container */
.progress-container {
    position: relative;
    width: 100%;
    height: 15px; /* Smaller height */
    background-color: #e0e0e0;
    border-radius: 8px; /* Adjusted for smaller height */
    margin-top: 15px;
    margin-bottom: 5px;
    overflow: hidden;
}

/* Dynamic Progress Fill */
.progress-bar {
    height: 100%; /* Matches the container's height */
    background-color: #FF0000;
    border-radius: 8px; /* Adjusted for smaller height */
    width: 0%; /* Initial width of 0%, set dynamically */
    transition: width 0.4s ease;
}


/* Centered "Đã bán" Text in the Progress Container */
.progress-container .progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-weight: bold;
    font-size: 14px;
    pointer-events: none;
}

/* Navigation Buttons */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
    font-size: 18px;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

/* Book Block Style */


.book-block .book_price {
    font-weight: bold;
    margin-bottom: 10px; /* Reduced bottom margin */
}

.book-block .book_price sub {
    font-weight: 100;
    padding: 0 5px;
}

.book-block .label {
    font-size: 12px;
    padding: 5px;
    background-color: #f0ad4e;
}

        .countdown {
            display: flex;
            justify-content: center; /* Center the countdown */
            margin-top: 0px; /* Space between title and countdown */
            padding:10px 0;
            font-family: 'Courier New', Courier, monospace; /* Use a monospace font for the flip clock */
            font-size: 24px; /* Set font size */
            color: #333; /* Color for the countdown text */
        }

        .digit {
            background: #333;
            color: white;
            width: 30px;
            height: 40px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            position: relative;
            transition: transform 0.3s;
        }

        h2 {
            text-align: center;
            position: relative;
            display: inline-block;
            margin-bottom: 20px; /* Space between title and countdown */
        }

        h2 i {
            color: red; /* Color for the fire icon */
            margin-right: 10px; /* Space between icon and text */
        }
/* Slider Box */
.new-slider-box {
    padding: 10px;
    margin: 0 auto;
    position: relative;
    width:1800px;
    background-color: #FFFFFF; /* Red outline */
    padding: 10px; /* Add some padding around the slider */
    margin: 0 auto; /* Center the box */
    position: relative; /* Positioning for the buttons */ /* Red background inside the box */
    border-bottom-left-radius: 10px; /* Round top left corner */
    border-bottom-right-radius: 10px; 
}

/* Slider Container */
.new-slider-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    width: 100%; /* Adjust width to fit the page */
    overflow: hidden;
    padding: 20px 0;

}

/* Slider */
#new-slider {
    display: flex;
    scroll-behavior: smooth;
    padding: 10px 0;
    width: 100%; /* Use full width of the container */
    margin: 0 auto;
    display: flex;
    overflow-x: auto; /* Allows horizontal scrolling */
}

#new-slider::-webkit-scrollbar {
    display: none;
}

/* Book Card */
.new-book-card {
    flex: 0 0 calc(20% - 20px);
    margin-left: 20px;
    margin-right: 20px;
    height: auto;
    margin: 0 10px;
    padding: 10px;
    text-align: center;
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: box-shadow 0.3s ease;
}
/* Title */
.slider-title {
    font-size: 24px; /* Adjust font size as needed */
    font-weight: bold; /* Make the text bold */
    margin-bottom: 10px; /* Space below the title */
    color: black; /* Title color */
    text-align: left;
    font-family: 'Arial', sans-serif;
    font-size:20px
 /* Align text to the left */
}
/* Line Below Title */
.line {
    height: 1px; /* Thickness of the line */
    background-color: lightgray; /* Color of the line */
    margin-bottom: 5px; /* Space below the line */
    width: 200%; /* Set the line width to 100% of its container */
    max-width: 300000000000px; /* Optional: Set a max-width for the line */
    margin-left: auto; /* Center the line */
    margin-right: auto; /* Center the line */
}

/* View All Link */
.view-all {
    position: absolute; /* Absolute positioning for the link */
    top: 20px; /* Space from the top */
    right: 10px; /* Space from the right */
    background-color: transparent; /* No background */
    color: black; /* Green text color */
    padding: 5px 10px; /* Padding for the button */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* Remove underline */
    font-weight: bold; /* Make it bold */
}
/* Icon Container */
.icon-container {
    display: inline-flex; /* Keep it inline with text */
    justify-content: center; /* Center the icon horizontally */
    align-items: center; /* Center the icon vertically */
    width: 16px; /* Reduced width for the circular box */
    height: 16px; /* Reduced height for the circular box */
    background-color: black; /* Black background */
    border-radius: 25%; /* Make it circular */
    margin-left: 5px; /* Space between text and icon */
    color: white; /* White color for the icon */
    font-size: 12px; /* Smaller font size for the arrow icon */
    font-weight: bold; /* Make the arrow bolder for visibility */
    text-align: center; /* Center the icon in the box */
    line-height: 16px; /* Center the arrow vertically within the box */
}

.new-book-block {
    margin-right: 40px; /* Adjust this value to increase or decrease the spacing */
    flex: 0 0 auto;
     /* Ensures that the book blocks do not shrink */
}


    .tab_box {
        display: flex;
        gap: 10px;
        margin-bottom: 2px;
        width: 100%;
        justify-content: space-around;
        align-items: center;
        border-bottom: 2px solid rgba(229, 229, 229);
        position: relative;
    }
    .tab_box .tab_btn {
      padding: 10px;
            background-color: #fff;
            color: #333;                  
            border-radius: 5px;
            position: relative;
            font-weight: bold;
        font-size: 18px;
        background: none;
        border: none;
        padding: 18px;
        cursor: pointer;
    }
    .tab_box .tab_btn.active {
        color: #e41a28;
    }
    .content_box {
        padding: 20px;
    }
    .content_box .content {
        display: none;
        animation: moving .5s ease;
    }
    @keyframes moving {
        from { transform: translate(50px); opacity: 0; }
        to { transform: translate(0px); opacity: 1; }
    }
    .content_box .content.active {
        display: block;
    }
    .line {
        position: absolute;
        top: 62px;
        left: 0;
        width: 90px;
        height: 5px;
        background-color: #e41a28;
        border-radius: 10px;
        transition: all .3s ease-in-out;
        pointer-events: none; /* Prevents interaction */
    }


/* Book Image */
.new-block-center.new-img-responsive {
    width: 120px;
    height: auto;
    margin: 0 auto;
}


/* Book Title */
.new-book-title {
    font-size: 16px;
    font-weight: bold;
    margin: 10px 0;
}

/* Book Price */
.new-book-price {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.new-price-current {
    color: #FF0000;
    font-weight: bold;
}

.new-price-original {
    color: #828282;
    text-decoration: line-through;
}

.new-label-warning {
    font-size: 12px;
    padding: 2px 6px;
    background-color: #f0ad4e;
    color: white;
    border-radius: 3px;
}


/* Progress Bar */
.new-progress-container {
    position: relative;
    width: 100%;
    height: 15px; /* Smaller height */
    background-color: #e0e0e0;
    border-radius: 8px; /* Adjusted for smaller height */
    margin-top: 10px;
    margin-bottom: 5px;
    overflow: hidden;
}

.new-progress-bar {
    height: 100%; /* Matches the container's height */
    background-color: #FF0000;
    border-radius: 8px; /* Adjusted for smaller height */
    width: 0%; /* Initial width of 0%, set dynamically */
    transition: width 0.4s ease;
}


.new-progress-container .new-progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-weight: bold;
    font-size: 14px;
    pointer-events: none;
}

/* Navigation Buttons */
.new-prev, .new-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
    font-size: 18px;
}

.new-prev {
    left: 10px;
}

.new-next {
    right: 10px;
}
       /* Styles for the second set of tabs */
.tab_box_2 {
    display: flex;
    gap: 10px;
    margin-bottom: 2px;
    width: 100%;
    justify-content: space-around;
    align-items: center;
    border-bottom: 2px solid rgba(229, 229, 229);
    position: relative;
}

.tab_box_2 .tab_btn_2 {
    padding: 10px;
    background-color: #fff;
    color: #333;
    border-radius: 5px;
    position: relative;
    font-weight: bold;
    font-size: 18px;
    background: none;
    border: none;
    padding: 18px;
    cursor: pointer;
}

.tab_box_2 .tab_btn_2.active {
    color: #e41a28;
}

.content_box_2 {
    padding: 20px;
}

.content_box_2 .content_2 {
    display: none;
    animation: moving .5s ease;
}

.content_box_2 .content_2.active {
    display: block;
}

.line_2 {
    position: absolute;
    top: 62px;
    left: 0;
    width: 90px;
    height: 5px;
    background-color: #e41a28;
    border-radius: 10px;
    transition: all .3s ease-in-out;
    pointer-events: none; /* Prevents interaction */
}

     .sidebar {
    width: 30%;
    background-color: #f7f7f7;
    border-right: 1px solid #ddd;
    padding: 20px;
    box-sizing: border-box;
}
.sidebar h2 {
    font-size: 20px;
    margin-bottom: 15px;
}
.book-item {
    display: flex;
    align-items: center;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
    border-radius: 5px;
}
.book-item img {
    width: 100px;
    height: 70px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 3px;
}
.book-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.book-title {
    font-weight: bold;
    color: #333;
    margin: 0;
    font-size: 14px;
}
.book-author, .book-score {
    font-size: 12px;
    color: #666;
    margin: 2px 0;
}
.book-item:hover {
    background-color: #e0e0e0;
}
.book-item.active {
    background-color: #E0E0E0;
    color: white;
}
.content {
    width: 70%;
    padding: 20px;
    box-sizing: border-box;
}
.content img {
    width: 300px; /* Updated width */
    height: 268px; /* Updated height */
    object-fit: cover; /* Maintain aspect ratio */
    border-radius: 5px; /* Keep the rounded corners */
    margin-bottom: 20px; /* Space below the image */
}
.content h3 {
    font-size: 24px;
    color: #333;
    margin: 0;
}
.content p {
    margin: 5px 0;
    color: #555;
}
.price {
    color: #e60023;
    font-weight: bold;
}
.discount {
    color: #007bff;
    font-size: 14px;
    margin-left: 10px;
}
  .category-container {
        display: flex;
        justify-content: space-between;
        gap: 20px; /* Điều chỉnh khoảng cách giữa các item */
        padding: 20px;
        flex-wrap: nowrap;
    }
    .category-box {
        width: 290px;
        height: 330px;
        background-color: #f1f1f1;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: left;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .category-title {
        font-size: 18px;
        font-weight: bold;
        margin-top: -10px;
    }
    .category-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
    } 
        }

    </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Thương hiệu và nút chuyển đổi được nhóm lại để hiển thị trên thiết bị di động tốt hơn -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.jpg"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Phần đăng nhập, đăng kí, giỏ hàng -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
        <?php
if (!isset($_SESSION['user'])) {
    echo '
    <li>
        <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">
            <i class="fas fa-sign-in-alt"></i> Đăng nhập
        </button>
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Đăng nhập</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                            <div class="form-group">
                                <label class="sr-only" for="username">Username</label>
                                <input type="text" name="login_username" class="form-control" placeholder="Tên tài khoản" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="login_password" class="form-control" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="login" class="btn btn-block">
                                    <i class="fas fa-sign-in-alt"></i> Đăng nhập
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li>
        <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">
            <i class="fas fa-user-plus"></i> Đăng kí
        </button>
        <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Đăng kí</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" onsubmit="return validatePassword()">
                            <div class="form-group">
                                <label class="sr-only" for="username">Username</label>
                                <input type="text" name="register_username" class="form-control" placeholder="Tên tài khoản" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" id="register_password" name="register_password" class="form-control" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" required>
                            </div>
                            <div id="password_error" style="color: red; display: none;">Mật khẩu không trùng khớp</div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                    <i class="fas fa-user-plus"></i> Đăng kí
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </li>';
} else {
    echo '
    <li>
        <a href="#" class="btn btn-lg">Xin chào ' . $_SESSION['user'] . '.</a>
    </li>
    <li>
        <a href="cart.php" class="btn btn-lg">
            <i class="fas fa-shopping-cart"></i> Giỏ hàng
        </a>
    </li>
    <li>
        <a href="destroy.php" class="btn btn-lg">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </li>';
}
?>

<script>
function validatePassword() {
    var password = document.getElementById("register_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    var errorMessage = document.getElementById("password_error");

    if (password !== confirmPassword) {
        errorMessage.style.display = "block";
        return false;
    } else {
        errorMessage.style.display = "none";
        return true;
    }
}
</script>


          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- Phần Menu thả xuống -->
  <div id="top">
    <div id="searchbox" class="container-fluid" style="width: 112%; margin-left: -6%; margin-right: -6%; background: #D67B22; display: flex; justify-content: space-between; align-items: center;">
        <form role="search" method="POST" action="Result.php" style="width: 70%; margin: 20px 10px;" id="searchForm">
            <div style="display: flex; align-items: center; position: relative;">
                <!-- Dropdown Menu with specific categories -->
                <select class="form-control" name="category" id="categoryDropdown" style="margin-right: 10px; width: 150px;">
                    <option value="">Chọn thể loại</option>
                    <option value="tieu%20thuyet">Tiểu thuyết</option>
                    <option value="ngoai%20ngu">Ngoại Ngữ</option>
                    <option value="tri%20thuc">Tri thức</option>
                    <option value="chinh%20tri">Chính Trị</option>
                    <option value="ky%20nang%20song">Kỹ năng sống</option>
                    <option value="truyen%20tranh">Truyện tranh</option>
                    <option value="kinh%20doanh">Kinh doanh</option>
                    <option value="nau%20an">Nấu ăn</option>
                </select>
                
                <!-- Tìm kiếm -->
                <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm sách, tác giả hoặc tiểu thuyết...." style="flex: 1; padding-right: 30px;">
                
                <!-- Icon tìm kiếm -->
                <button type="submit" class="search-button" style="background: none; border: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                    <i class="fas fa-search" style="font-size: 20px; color: #D67B22;"></i>
                </button>
            </div>
        </form>
        <!-- Phần yêu cầu đăng nhập để tiếp tục -->
        <!--         ?php
                // if(!isset($_SESSION['user'])) {
                //     echo '
                //     <li style="margin-left: 15px;">
                //         <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">
                //             <i class="fas fa-sign-in-alt"></i> Đăng nhập
                //         </button>
                //         <div id="login" class="modal fade" role="dialog">
                //             <div class="modal-dialog">
                //                 <div class="modal-content">
                //                     <div class="modal-header">
                //                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                //                         <h4 class="modal-title text-center">Đăng nhập</h4>
                //                     </div>
                //                     <div class="modal-body">
                //                         <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                //                             <div class="form-group">
                //                                 <label class="sr-only" for="username">Username</label>
                //                                 <input type="text" name="login_username" class="form-control" placeholder="Tên tài khoản" required>
                //                             </div>
                //                             <div class="form-group">
                //                                 <label class="sr-only" for="password">Password</label>
                //                                 <input type="password" name="login_password" class="form-control" placeholder="Mật khẩu" required>
                //                             </div>
                //                             <div class="form-group">
                //                                 <button type="submit" name="submit" value="login" class="btn btn-block">
                //                                     <i class="fas fa-sign-in-alt"></i> Đăng nhập
                //                                 </button>
                //                             </div>
                //                         </form>
                //                     </div>
                //                     <div class="modal-footer">
                //                         <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     </li>
                //     <li style="margin-left: 15px;">
                //         <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">
                //             <i class="fas fa-user-plus"></i> Đăng kí
                //         </button>
                //         <div id="register" class="modal fade" role="dialog">
                //             <div class="modal-dialog">
                //                 <div class="modal-content">
                //                     <div class="modal-header">
                //                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                //                         <h4 class="modal-title text-center">Đăng kí</h4>
                //                     </div>
                //                     <div class="modal-body">
                //                         <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                //                             <div class="form-group">
                //                                 <label class="sr-only" for="username">Username</label>
                //                                 <input type="text" name="register_username" class="form-control" placeholder="Tên tài khoản" required>
                //                             </div>
                //                             <div class="form-group">
                //                                 <label class="sr-only" for="password">Password</label>
                //                                 <input type="password" name="register_password" class="form-control" placeholder="Mật khẩu" required>
                //                             </div>
                //                             <div class="form-group">
                //                                 <button type="submit" name="submit" value="register" class="btn btn-block">
                //                                     <i class="fas fa-user-plus"></i> Đăng kí
                //                                 </button>
                //                             </div>
                //                         </form>
                //                     </div>
                //                     <div class="modal-footer">
                //                         <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     </li>';
                // } else {
                //     echo '
                //     <li style="margin-left: 15px;">
                //         <a href="#" class="btn btn-lg">
                //             Xin chào ' . $_SESSION['user'] . '.
                //         </a>
                //     </li>
                //     <li style="margin-left: 15px;">
                //         <a href="cart.php" class="btn btn-lg">
                //             <i class="fas fa-shopping-cart"></i> Giỏ hàng
                //         </a>
                //     </li>
                //     <li style="margin-left: 15px;">
                //         <a href="destroy.php" class="btn btn-lg">
                //             <i class="fas fa-sign-out-alt"></i> Đăng xuất
                //         </a>
                //     </li>';
                // }
                ?
            </ul>
        </div>
    </div>
</div>
 -->

<script>
    const dropdown = document.getElementById('categoryDropdown');
    
    // Add change event listener to dropdown
    dropdown.addEventListener('change', function() {
        const selectedValue = dropdown.value;

        // Redirect to Product.php with the selected category if it's not empty
        if (selectedValue) {
            window.location.href = `Product.php?value=${selectedValue}`;
        }
    });
    
    // Prevent form submission if a category is selected
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        if (dropdown.value) {
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
          </div>
      </div>
      <!-- Banner danh mục sản phẩm, Banner slide, Banner box -->
      <div class="container-fluid" id="header">
          <div class="row">
            <!-- Banner danh mục sản phẩm -->
              <div class="col-md-3 col-lg-3" id="category" style="margin-top: 10px;">
                  <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;"> Danh mục sản phẩm </div>
                  <ul>
                      <li> <a href="Product.php?value=Tiểu thuyết"> Tiểu thuyết  </a> </li>
                      <li> <a href="Product.php?value=Ngoại Ngữ"> Ngoại Ngữ </a> </li>
                      <li> <a href="Product.php?value=Tri Thức"> Tri thức </a> </li>
                      <li> <a href="Product.php?value=Chính Trị"> Chính Trị </a> </li>
                      <li> <a href="Product.php?value=Kỹ Năng Sống"> Kỹ năng sống </a> </li>
                      <li> <a href="Product.php?value=Truyện Tranh"> Truyện tranh </a> </li>
                      <li> <a href="Product.php?value=Kinh Doanh"> Kinh doanh </a> </li>
                      <li> <a href="Product.php?value=Nấu Ăn"> Nấu ăn </a> </li>

                  </ul>

              </div>
              <!-- Banner slide -->
              <div class="col-md-6 col-lg-6">
                  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" >
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                          <li data-target="#myCarousel" data-slide-to="3"></li>
                          <li data-target="#myCarousel" data-slide-to="4"></li>
                          <li data-target="#myCarousel" data-slide-to="5"></li>
                      </ol>
                      
                        <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <a href="Product.php?value=Tiểu thuyết">
                            <img class="img-responsive " href="Product.php?value=Ngoại Ngữ" src="img/carousel/1.jpg">
                        </a>
                          </div>

                          <div class="item">
                            <a href="Product.php?value=Ngoại Ngữ">
                            <img class="img-responsive "src="img/carousel/2.jpg">
                        </a>
                          </div>

                          <div class="item">
                            <a href="Product.php?value=Kinh Doanh">
                            <img class="img-responsive" src="img/carousel/3.jpg">
                        </a>
                          </div>

                          <div class="item">
                            <a href="Product.php?value=Kỹ Năng Sống">
                            <img class="img-responsive"src="img/carousel/4.jpg">
                        </a>
                          </div>

                          <div class="item">
                            <a href="Product.php?value=Tri Thức">
                            <img class="img-responsive" src="img/carousel/5.jpg">
                        </a>
                          </div>

                          <div class="item">
                            <a href="Product.php?value=Chính Trị">
                            <img class="img-responsive" src="img/carousel/6.jpg">
                        </a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner box -->
              <div class="col-md-3 col-lg-3" id="offer">
                  <a href="Product.php?value=Ngoại Ngữ">              <img class="img-responsive center-block" src="img/offers/4.png"></a>
                  <a href="Product.php?value=Nấu Ăn">        <img class="img-responsive center-block" src="img/offers/5.png"></a>
                  <a href="Product.php?value=Tri Thức"> <img class="img-responsive center-block" src="img/offers/6.png"></a>
              </div>
          </div>
      </div>

  </div> 
<!-- Banner box lựa chọn danh mục sản phẩm -->
<div class="menu-container">
    <div class="menu-item">
        <a href="Product.php?value=Pháp luật">
            <div class="menu-icon icon-phap-luat" style="margin-right: 40px; margin-left: 30px;">
                <img src="img/icons/1.png" alt="Pháp luật" width="40" height="40">
            </div>
            <div class="menu-text">Tủ sách Pháp luật</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=MCBooks">
            <div class="menu-icon icon-mcbooks" style="margin-right: 25px;">
                <img src="img/icons/2.png" alt="MCBooks" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -25px;">MCBooks</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Flash Sale">
            <div class="menu-icon icon-flash-sale" style="margin-right: 40px;">
                <img src="img/icons/3.png" alt="Flash Sale" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Flash Sale</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Giảm Giá">
            <div class="menu-icon icon-ma-giam-gia" style="margin-right: 30px;">
                <img src="img/icons/4.png" alt="Mã Giảm Giá" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px"> Giảm Giá</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Sản Phẩm Mới">
            <div class="menu-icon icon-san-pham-moi" style="margin-right: 40px;">
                <img src="img/icons/5.png" alt="Sản Phẩm Mới" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Sản Phẩm Mới</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Sản Phẩm Trợ Giá">
            <div class="menu-icon icon-tro-gia" style="margin-right: 25px;">
                <img src="img/icons/6.png" alt="Sản Phẩm Được Trợ Giá" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Sản Phẩm Được Trợ Giá</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Phiên Chợ Đồ Cũ">
            <div class="menu-icon icon-do-cu" style="margin-right: 25px;">
                <img src="img/icons/7.png" alt="Phiên Chợ Đồ Cũ" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Phiên Chợ Đồ Cũ</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Bán Sỉ">
            <div class="menu-icon icon-ban-si" style="margin-right: 25px;">
                <img src="img/icons/8.png" alt="Bán Sỉ" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Bán Sỉ</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Truyện Tranh">
            <div class="menu-icon icon-manga" style="margin-right: 25px;">
                <img src="img/icons/9.png" alt="Manga" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Manga</div>
        </a>
    </div>
    <div class="menu-item">
        <a href="Product.php?value=Ngoại Văn">
            <div class="menu-icon icon-ngoai-van" style="margin-right: 25px;">
                <img src="img/icons/10.png" alt="Ngoại Văn" width="40" height="40">
            </div>
            <div class="menu-text" style="margin-left: -30px">Ngoại Văn</div>
        </a>
    </div>
</div>

    <!-- Danh mục sản phẩm flash sale -->
  <div class="container-fluid text-center" id="new">
    <div class="slider-container">
        <div class="slider-box" style="background-color:#FF6A68">
        <div style="text-align: center; margin-bottom: 10px;">
          <div class="book-card">
    <h2 class="title" style="margin-right: 100px;">
      <i class="fas fa-bolt" style="color:yellow"></i>
      <span style=" display: flex;align-items: center;color: red;font-size: 24px;font-weight: bold;font-style: italic;">FLASH SALE</span>
      <span style="font-size: 20px; margin-left: 20px;">Kết thúc trong</span><!-- Flash sale -->
        <span class="countdown" id="countdown">
            <span class="digit" id="days">00</span>:
            <span class="digit" id="hours">00</span>:
            <span class="digit" id="minutes">00</span>:
            <span class="digit" id="seconds">00</span>
        </span>
    </h2>
</div>

</div>

     <!-- New div for the red outline -->
            <button class="prev" onclick="document.getElementById('slider').scrollLeft -= 300;">&#10094;</button>

            <div class="slider" id="slider">
    <!-- First Slide -->
    <div class="book-card">
        <a href="description.php?ID=ENT-1&category=new">
            <div class="book-block">
                <div class="tag">New</div>
                <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                <img class="block-center img-responsive" src="img/new/1.png" alt="Book 1">
                <hr>
                Sơn Trà Nở Muộn <br>
                <span style="color:#FF0000;">54.000 đ</span> &nbsp;
                <span style="text-decoration:line-through;color:#828282;">65.000</span>
                <span class="label label-warning">-18%</span>
            </div>
        </a>
        <div class="progress-container">
            <div class="progress-bar" id="progress1">
                <div class="progress-text">Đã bán 76</div>
            </div>
        </div>
    </div>

    <!-- Second Slide -->
    <div class="book-card">
        <a href="description.php?ID=CHILD-7&category=new">
            <div class="book-block">
                <div class="tag">New</div>
                <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                <img class="block-center img-responsive" src="img/new/35.png" alt="Book 2">
                <hr>
                Muối - Sự Hồi Sinh Nơi Sâu Thẳm Vụn Vỡ <br>
                <span style="color:#FF0000;">128.000đ</span> &nbsp;
                <span style="text-decoration:line-through;color:#828282;">166.000</span>
                <span class="label label-warning">-23%</span>
            </div>
        </a>
        <div class="progress-container">
            <div class="progress-bar" id="progress2">
                <div class="progress-text">Đã bán 25</div>
            </div>
        </div>
    </div>

    <!-- Third Slide -->
    <div class="book-card">
        <a href="description.php?ID=ENT-10&category=new">
            <div class="book-block">
                <div class="tag">New</div>
                <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                <img class="block-center img-responsive" src="img/new/36.png" alt="Book 3">
                <hr>
               Vòng Lặp <br>
                <span style="color:#FF0000;">90.000đ</span> &nbsp;
                <span style="text-decoration:line-through;color:#828282;">109.000đ</span>
                <span class="label label-warning">-18%</span>
            </div>
        </a>
        <div class="progress-container">
            <div class="progress-bar" id="progress3">
                <div class="progress-text">Đã bán 94</div>
            </div>
        </div>
    </div>

                <!-- Fourth Slide -->
                <div class="book-card">
                    <a href="description.php?ID=CHILD-6&category=new">
                        <div class="book-block">
                            <div class="tag">New</div>
                            <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                            <img class="block-center img-responsive" src="img/new/37.png" alt="Book 4">
                            <hr>
                            Nóng Giận Là Bản Năng, Tĩnh Lặng Là Bản Lĩnh (Tái Bản 2020) <br>
                            <span style="color:#FF0000;">71.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">89.000đ</span>
                            <span class="label label-warning">-20%</span>
                        </div>
                    </a>
                    <div class="progress-container">
            <div class="progress-bar" id="progress4">
                <div class="progress-text">Đã bán 62</div>
            </div>
        </div>
                </div>

                <!-- Fifth Slide -->
                <div class="book-card">
                    <a href="description.php?ID=NEW-5&category=new">
                        <div class="book-block">
                            <div class="tag">New</div>
                            <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                            <img class="block-center img-responsive" src="img/new/5.png" alt="Book 5">
                            <hr>
                            Sách Luyện Thi Tiếng Anh 5 - Tập 1 (2023) <br>
                            <span style="color:#FF0000;">139.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">63.000đ</span>
                            <span class="label label-warning">-55%</span>
                        </div>
                    </a>
                    <div class="progress-container">
            <div class="progress-bar" id="progress5">
                <div class="progress-text">Đã bán 59</div>
            </div>
        </div>
                </div>
                <script type="text/javascript">
  // Function to update individual progress bars
function updateProgress(id, percent) {
    document.getElementById(id).style.width = percent + '%';
}

// Example usage to set different progress levels
updateProgress('progress1', 75); // 75% for first book
updateProgress('progress2', 50); // 50% for second book
updateProgress('progress3', 90); // 90% for third book
updateProgress('progress4', 75); // 75% for first book
updateProgress('progress5', 50); // 50% for second book
</script>

                <!-- Repeat for more book cards as needed -->
            </div>
            <button class="next" onclick="document.getElementById('slider').scrollLeft += 300;">&#10095;</button>
            <div style="text-align: center; margin-top: 20px;">
    </div>
        </div> <!-- End of slider-box -->
    </div>
</div>

 <div id="new-book-section" style="display: none;">
        <h2>Sách hay</h2>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-1&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="img/tag.png" alt="Tag"></div>
                        <img class="book block-center img-responsive" src="img/new/1.png">
                        <hr>
                        Sơn Trà Nở Muộn <br>
                        <span style="color:#FF0000;">180.000 đ</span> &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 248.000 </span>
                        <span class="label label-warning">-28%</span>
                    </div>
                </a>
            </div>
            <!-- More books... -->
        </div>
    </div>
</div>
<script>
    let countdownTime = 1440; // 4 minutes in seconds

    function updateCountdown() {
        const minutes = Math.floor(countdownTime / 60);
        const seconds = countdownTime % 60;

        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');

        if (countdownTime > 0) {
            countdownTime--;
        } else {
            // When the countdown ends, hide the slider and show the new book section
            clearInterval(interval);
            document.getElementById('slider-section').style.display = 'none';
            document.getElementById('new-book-section').style.display = 'block';
        }
    }

    const interval = setInterval(updateCountdown, 1000);
    updateCountdown(); // Initial call to display immediately
</script>

  <div class="container-fluid text-center" id="new">
    <div class="book-block" style ="background:white">
    <h2><span class="fas fa-fire" style="color:red"></span> Tổng hợp sách mới nổi bật <span class="fas fa-fire" style="color:red"></span></h2></div>
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-1&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/1.png">
                  <hr>
                  Sơn Trà Nở Muộn <br>
                  <span style="color:#FF0000;">180.000 đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 248.000 </span>
                  <span class="label label-warning">-28%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
   <a href="description.php?ID=NEW-2-1&category=new">
      <div class="book-block">
         <div class="tag">New</div>
         <div class="tag-side"><img src="img/tag.png"></div>
         <img class="block-center img-responsive" src="img/new/2-1.png">
         <hr>
         Những Kẻ Mê Sách <br>
         <span style="color:#FF0000;">180.000đ</span> &nbsp
         <span style="text-decoration:line-through;color:#828282;"> 226.000 </span>
         <span class="label label-warning">-18%</span>
      </div>
   </a>
</div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-3&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/3-1.png">
                  <hr>
                  Alice Ở Xứ Sở Diệu Kì Và Alice Ở Xứ Sở Trong Gương <br>
                  <span style="color:#FF0000;">77.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 100.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-4&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/4-1.png">
                  <hr>
                  Kẻ Lừa Đảo Chân Thật <br>
                  <span style="color:#FF0000;">97.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 118.000đ </span>
                  <span class="label label-warning">-18%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-5&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/5.png">
                  <hr>
                  Tư Duy Ngược <br>
                  <span style="color:#FF0000;">69.500đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 130.000đ </span>
                  <span class="label label-warning">-50%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-6&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/6.png">
                  <hr>
                  25 Độ Âm  <br>
                  <span style="color:#FF0000;">124.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 158.000đ </span>
                  <span class="label label-warning">-22%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-7&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/7.png">
                  <hr>
                  Combo Sách Sức Mạnh Tiềm Thức + Bí Mật Tư Duy Triệu Phú (Bộ 2 Cuốn) <br>
                  <span style="color:#FF0000;">180.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 236.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-8&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/8.png">
                  <hr>
                  Doraemon - Tiểu Thuyết - Nobita Và Bản Giao Hưởng Địa Cầu <br>
                  <span style="color:#FF0000;">54.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 60.000đ </span>
                  <span class="label label-warning">-10%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-9&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/9.png">
                  <hr>
                  Nhà Giả Kim (Tái Bản 2020) <br>
                  <span style="color:#FF0000;">62.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 79.000đ </span>
                  <span class="label label-warning">-22%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-10&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/10.png">
                  <hr>
                  Tiểu Sử Các Quốc Gia Qua Góc Nhìn Lầy Lội  <br>
                  <span style="color:#FF0000;">168.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 215.000đ </span>
                  <span class="label label-warning">-22%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-11&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/11.png">
                  <hr>
                  Flow - Dòng Chảy <br>
                  <span style="color:#FF0000;">174.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 228.000đ </span>
                  <span class="label label-warning">-24%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-12&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/12.png">
                  <hr>
                  Ước Mơ Đẹp Nhất Là Khi Em Dốc Cạn Trái Tim Theo Đuổi <br>
                  <span style="color:#FF0000;">92.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 119.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-13&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/13.png">
                  <hr>
                  Tiếng Hú Trên Đỉnh Pù Cải <br>
                  <span style="color:#FF0000;">34.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 40.000đ </span>
                  <span class="label label-warning">-16%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-14&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/14.png">
                  <hr>
                  Thương Hoài Ngàn Năm  <br>
                  <span style="color:#FF0000;">71.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 86.000đ </span>
                  <span class="label label-warning">-18%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-15&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/15.png">
                  <hr>
                  Danh Tác Văn Học Việt Nam - Sợi Tóc <br>
                  <span style="color:#FF0000;">27.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 35.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-16&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/16.png">
                  <hr>
                  Hoàng Tử Bé (Tái Bản 2022) <br>
                  <span style="color:#FF0000;">27.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 35.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-17&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/17.png">
                  <hr>
                  Đám Trẻ Ở Đại Dương Đen <br>
                  <span style="color:#FF0000;">77.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 99.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-18&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/18.png">
                  <hr>
                  Trần Triều Nhàn Thoại  <br>
                  <span style="color:#FF0000;">98.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 119.000đ </span>
                  <span class="label label-warning">-18%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-19&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/19.png">
                  <hr>
                  Trăng Tan Đáy Nước <br>
                  <span style="color:#FF0000;">115.500đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 150.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-20&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/20.png">
                  <hr>
                  Tước Gấm Giấu Đay <br>
                  <span style="color:#FF0000;">159.000</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 198.000đ </span>
                  <span class="label label-warning">-20%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-21&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/21.png">
                  <hr>
                  Rỉ Rả… Phố Phường <br>
                  <span style="color:#FF0000;">128.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 156.000đ </span>
                  <span class="label label-warning">-18%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-22&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/22.png">
                  <hr>
                  Góc Nhỏ Có Nắng  <br>
                  <span style="color:#FF0000;">54.120đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 68.000đ </span>
                  <span class="label label-warning">-20%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-23&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/23.png">
                  <hr>
                  Cất Cho Tôi Những Ngày Xanh Nắng Hạ <br>
                  <span style="color:#FF0000;">84.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 109.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-24&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/24.png">
                  <hr>
                  Không Sao Mà Có Tớ Ở Đây - Tặng Kèm Bookmark <br>
                  <span style="color:#FF0000;">69.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 84.000đ </span>
                  <span class="label label-warning">-18%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-25&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/25.png">
                  <hr>
                  Đất Rừng Phương Nam (Tái Bản) <br>
                  <span style="color:#FF0000;">63.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 81.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-26&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/26.png">
                  <hr>
                  [Light Novel] Dược Sư Tự Sự - Tập 4  <br>
                  <span style="color:#FF0000;">107.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 125.000đ </span>
                  <span class="label label-warning">-15%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-27&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/33.png">
                  <hr>
                  Đồng Bằng Sông Cửu Long - Nét Sinh Hoạt Xưa, Văn Minh Miệt Vườn <br>
                  <span style="color:#FF0000;">89.000</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 105.000đ </span>
                  <span class="label label-warning">-16%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-28&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/28.png">
                  <hr>
                  Vì Cậu Là Bạn Nhỏ Của Tớ <br>
                  <span style="color:#FF0000;">80.000</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 100.000 </span>
                  <span class="label label-warning">-20%</span>
              </div>
            </a>
          </div>
      </div>
  </div>
  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-29&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/29.png">
                  <hr>
                  [Light Novel] Chúa Tể Bóng Tối - Tập 1  <br>
                  <span style="color:#FF0000;">112.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 128.000đ </span>
                  <span class="label label-warning">-13%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-30&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/30.png">
                  <hr>
                  Hãy Là Tất Cả, Hoặc Không Là Gì  <br>
                  <span style="color:#FF0000;">115.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 149.000đ </span>
                  <span class="label label-warning">-23%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-31&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/31.png">
                  <hr>
                  Lén Nhặt Chuyện Đời  <br>
                  <span style="color:#FF0000;">42.500đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 85.000đ </span>
                  <span class="label label-warning">-50%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-32&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/34.png">
                  <hr>
                  Binh Pháp Tổn Tử Và 36 Kế <br>
                  <span style="color:#FF0000;">49.000đ</span> &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 98.000đ </span>
                  <span class="label label-warning">-2%</span>
              </div>
            </a>
          </div>
      </div>
  </div>

  <!--<div class="container-fluid" id="author">
      <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3">
              <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block" src="img/popular-author/0.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="img/popular-author/1.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="img/popular-author/2.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="img/popular-author/3.jpg"></a>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3">
              <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="img/popular-author/4.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="img/popular-author/5.jpg"><a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="img/popular-author/6.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="img/popular-author/7.jpg"></a>
          </div>
      </div>
  </div>-->

  <div class="new-book-card-title" style="background-color: #FCDDEF; padding: 20px; width: 100%;  box-sizing: border-box; margin-bottom: -20px; margin-top: 20px;    border-top-left-radius: 10px; /* Round top left corner */
    border-top-right-radius: 10px; "> <!-- Full width with thicker border -->
    <h2 class="slider-title" style="margin: 0;">
        <i class="fas fa-chart-line"></i> Thương hiệu nổi bật
    </h2>
</div>
                  
<div class="new-container-fluid text-center" id="new" >
    <div class="new-slider-container" >
        <div class="new-slider-box" >
            <!-- Title Section -->
            <div class="title-section" style="text-align: left;">
                <!-- <h2 class="slider-title">Thương hiệu nổi bật</h2> -->
                 <div class="tab_box">
                        <button class="tab_btn active">Alphabooks</button>
                        <button class="tab_btn">Bách Việt</button>
                        <button class="tab_btn">First News</button>
                        <div class="line"></div>
                 </div>

            <div class="content_box">
              <div class="content active">
            <!-- Alphabooks slide -->
            <div class="new-slider" id="Alphabooks" style="display:flex;">
                <!-- Book Slide 1 -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-33&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/Alphabooks/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Nexus - Lược Sử Của Những Mạng Lưới Thông Tin </div>
                            <div class="new-book-price">
                                <span class="new-price-current">465.760đ</span> 
                                <span class="new-price-original">568.000đ</span>
                                <span class="new-label-warning">-18%</span>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-34&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/Alphabooks/2.png" alt="Book 2">
                            <hr>
                           Sapiens Lược Sử Loài Người <br>
                            <span style="color:#FF0000;">209.300đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">299.000đ</span>
                            <span class="new-label-warning">-30%</span>
                        </div>
                    </a>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-35&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/Alphabooks/3.png" alt="Book 3">
                            <hr>
                            Việt Nam - Lịch Sử Không Biên Giới <br>
                            <span style="color:#FF0000;">266.500đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">325.000đ</span>
                            <span class="new-label-warning">-18%</span>
                        </div>
                    </a>
                </div>

                <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-36&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/Alphabooks/4.png" alt="Book 4">
                            <hr>
                            Sapiens - Lược Sử Loài Người - Ấn Bản Bỏ Túi <br>
                            <span style="color:#FF0000;">111.300đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">159.000đ</span>
                            <span class="new-label-warning">-30%</span>
                        </div>
                    </a>
                </div>

                <!-- Fifth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-37&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/Alphabooks/5.png" alt="Book 5">
                            <hr>
                            Nexus - Lược Sử Của Những Mạng Lưới Thông Tin - Bìa cứng <br>
                            <span style="color:#FF0000;">250.250đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">325.000đ</span>
                            <span class="new-label-warning">-23%</span>
                        </div>
                    </a>
                </div>
            </div>
            <div style="text-align: center; margin-top: -10px;">
                <a id="viewMoreLink" href="Product.php?value=Alphabooks" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px; margin-left: 350px;">
                    Xem thêm
                </a>
            </div>
          </div>


          <div class="content">
        <!-- Bach Viet slides -->
            <div class="new-slider" style="display:flex;">
                <!-- Book Slide 1 -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-38&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/BachViet/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Combo Sách Chiến Tranh Tiền Tệ (Bộ 5 Phần)</div>
                            <div class="new-book-price">
                                <span class="new-price-current">613.250đ</span> 
                                <span class="new-price-original">890.000đ</span>
                                <span class="new-label-warning">-31%</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-39&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/BachViet/2.png" alt="Book 2">
                            <hr>
                            Chiến Tranh Tiền Tệ - Phần 2 -Sự Thống Trị Của Quyền Lực Tài Chính (Tái Bản 2022) <br>
                            <span style="color:#FF0000;">170.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">119.000đ</span>
                            <span class="new-label-warning">-30%</span>
                        </div>
                    </a>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-40&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/BachViet/3.png" alt="Book 3">
                            <hr>
                            Chiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Tái bản 2022) <br>
                            <span style="color:#FF0000;">165.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">115.500đ</span>
                            <span class="new-label-warning">-30%</span>
                        </div>
                    </a>
                </div>

                <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-41&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/BachViet/4.png" alt="Book 4">
                            <hr>
                            Thiên Thần Và Ác Quỷ - Bìa Cứng (Tái bản 2023) <br>
                            <span style="color:#FF0000;">155.350đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">239.000đ</span>
                            <span class="new-label-warning">-35%</span>
                        </div>
                    </a>
                </div>

                <!-- Fifth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-42&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/BachViet/5.png" alt="Book 5">
                            <hr>
                           Tư Duy Chiến Lược - Lý Thuyết Trò Chơi Thực Hành <br>
                            <span style="color:#FF0000;">120.900đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">186.000đ</span>
                            <span class="new-label-warning">-35%</span>
                        </div>
                    </a>
                </div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <a id="viewMoreLink" href="Product.php?value=Bách Việt" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px; margin-left: 350px;">
                    Xem thêm
                </a>
            </div>
      </div>

      <div class="content" >
        <div class="new-slider" style="display:flex;">
         <!-- Book Slide 1 -->
                <div class="new-book-card" >
                    <a href="description.php?ID=NEW-43&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/FirstNews/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Hiểu Về Trái Tim (Tái Bản 2023)</div>
                            <div class="new-book-price">
                                <span class="new-price-current">134.300đ</span> 
                                <span class="new-price-original">158.000đ</span>
                                <span class="new-label-warning">-15%</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-44&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/FirstNews/2.png" alt="Book 2">
                            <hr>
                            Flow - Dòng chảy  <br>
                            <span style="color:#FF0000;">171.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">228.000đ</span>
                            <span class="new-label-warning">-25%</span>
                        </div>
                    </a>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-45&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/FirstNews/3.png" alt="Book 3">
                            <hr>
                            Bạn Đang Nghịch Gì Với Đời Mình? <br>
                            <span style="color:#FF0000;">93.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">124.000đ</span>
                            <span class="new-label-warning">-25%</span>
                        </div>
                    </a>
                </div>
        <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-46&category=new">
                        <div class="new-book-block" >
                            <img class="new-block-center new-img-responsive" src="img/THNB/FirstNews/4.png" alt="Book 4">
                            <hr>
                            Minh Triết Trong Ăn Uống Của Phương Đông (Tái Bản 2023) <br>
                            <span style="color:#FF0000;">126.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">168.000đ</span>
                            <span class="new-label-warning">-25%</span>
                        </div>
                    </a>
                </div>

                <!-- Fifth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-47&category=new">
                        <div class="new-book-block" style="width:150px">
                            <img class="new-block-center new-img-responsive" src="img/THNB/FirstNews/5.png" alt="Book 5">
                            <hr>
                            Chia Sẻ Từ Trái Tim (Thích Pháp Hòa) <br>
                            <span style="color:#FF0000;">120.960đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">168.000đ</span>
                            <span class="new-label-warning">-28%</span>
                        </div>
                    </a>
                </div>
              </div>
              <div style="text-align: center; margin-top: 20px;">
                <a id="viewMoreLink" href="Product.php?value=First News" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px; margin-left: 350px;">
                    Xem thêm
                </a>
            </div>
      </div>
          
             <button class="new-prev" onclick="scrollSlider(-300)">&#10094;</button>
            <button class="new-next" onclick="scrollSlider(300)">&#10095;</button>
            
        </div> <!-- End of slider-box -->
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    const tabs = document.querySelectorAll('.tab_btn');
const allContent = document.querySelectorAll('.content');
const line = document.querySelector('.line');

// event nút
tabs.forEach((tab, index) => {
  tab.addEventListener('click', (e) => {
    // Remove active class from all tabs and add it to the clicked tab
    tabs.forEach(tab => tab.classList.remove('active'));
    tab.classList.add('active');

    // Adjust the line to underline the active tab
    line.style.width = e.target.offsetWidth + "px";
    line.style.left = e.target.offsetLeft + "px";

    // Show the relevant content based on the clicked tab index
    allContent.forEach(content => content.classList.remove('active'));
    allContent[index].classList.add('active');
  });
});

  </script>

  <div class="category-container" style="margin-top: -30px; margin-bottom: 50px">
    <a href="Product.php?value=Thiếu Nhi" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-left: -20px; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Thiếu Nhi</div>
            <img src="img/bannerbox/ThieuNhi/1.png" alt="Đồ chơi" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/bannerbox/ThieuNhi/2.png" alt="Small Toy 1" style="width: 35%; height: auto;">
                <img src="img/bannerbox/ThieuNhi/3.png" alt="Small Toy 2" style="width: 35%; height: auto;">
                <img src="img/bannerbox/ThieuNhi/4.png" alt="Small Toy 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
    
    <a href="Product.php?value=Truyện Tranh" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Manga - Truyện tranh</div>
            <img src="img/bannerbox/Manga/1.png" alt="Dụng cụ học sinh" class="category-image" style="width: 100%; height: auto; margin-top: -10px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/bannerbox/Manga/2.png" alt="Small School Supply 1" style="width: 35%; height: auto;">
                <img src="img/bannerbox/Manga/3.png" alt="Small School Supply 2" style="width: 35%; height: auto;">
                <img src="img/bannerbox/Manga/4.png" alt="Small School Supply 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
    
    <a href="Product.php?value=Ngoại Văn" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Ngoại Văn</div>
            <img src="img/bannerbox/NgoaiVan/1.png" alt="Văn phòng phẩm" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/bannerbox/NgoaiVan/2.png" alt="Small Stationery 1" style="width: 35%; height: auto;">
                <img src="img/bannerbox/NgoaiVan/3.png" alt="Small Stationery 2" style="width: 35%; height: auto;">
                <img src="img/bannerbox/NgoaiVan/4.png" alt="Small Stationery 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>

    <a href="Product.php?value=Tác Phẩm Kinh Điển" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Tác Phẩm Kinh Điển</div>
            <img src="img/bannerbox/VanHoc/1.png" alt="Bách hóa online" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: -10px;">
                <img src="img/bannerbox/VanHoc/2.png" alt="Small Online Store Item 1" style="width: 35%; height: auto;">
                <img src="img/bannerbox/VanHoc/3.png" alt="Small Online Store Item 2" style="width: 35%; height: auto;">
                <img src="img/bannerbox/VanHoc/4.png" alt="Small Online Store Item 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
</div>

                  <div class="new-book-card-title" style="background-color: #FCDDEF; padding: 20px; width: 100%; box-sizing: border-box; margin-bottom: -20px; margin-top: -20px;    border-top-left-radius: 10px; /* Round top left corner */
    border-top-right-radius: 10px; "> <!-- Full width with thicker border -->
    <h2 class="slider-title" style="margin: 0;">
        <i class="fas fa-chart-line"></i> Xu hướng mua sắm
    </h2>
</div>
<div class="new-container-fluid text-center" id="new">
    <div class="new-slider-container">
        <div class="new-slider-box">
            <!-- Existing Title Section -->
             <div class="title-section" style="text-align: left;">
              <div class="tab_box_2">
                        <button class="tab_btn_2 active">Xu Hướng Theo Ngày</button>
                        <button class="tab_btn_2">Sách HOT - Giảm Sốc</button>
                        <button class="tab_btn_2">Bestseller Ngoại Văn</button>
                        <div class="line_2"></div>
                 </div>
            </div>
            <div class="content_box_2">
      <div class="content_2 active" id="content_trending" >
            <!-- Slider for Book Cards -->
            <div class="new-slider" style="display:flex;">
                <!-- Book Slide 1 -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-48&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Hoa Học Trò - Số 1444 </div>
                            <div class="new-book-price">
                                <span class="new-price-current">19.000</span> 
                                <span class="new-price-original">20.000đ</span>
                                <span class="new-label-warning">-5%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress1" >
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-49&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/2.png" alt="Book 2">
                            <hr>
                            Tết Ở Làng Địa Ngục <br>
                            <span style="color:#FF0000;">121.680đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">169.000đ</span>
                            <span class="new-label-warning">-28%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress2">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-50&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/3.png" alt="Book 3">
                            <hr>
                            Cổ Học Tinh Hoa (Bìa Cứng) <br>
                            <span style="color:#FF0000;">103.950đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">135.000đ</span>
                            <span class="new-label-warning">-23%</span>
                        </div>
                    </a>
                                        <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress3">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-51&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/4.png" alt="Book 4">
                            <hr>
                            Liễu Phàm Tứ Huấn <br>
                            <span style="color:#FF0000;">47.200đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">59.000đ</span>
                            <span class="new-label-warning">-20%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress4">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>

                <!-- Five Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-52&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/5.png" alt="Book 5">
                            <hr>
                            Cổ Mỹ Từ <br>
                            <span style="color:#FF0000;">123.200đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">160.000đ</span>
                            <span class="new-label-warning">-23%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress5">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>
                </div>

             <!-- Slider for Book Cards -->
            <div class="new-slider" id="new-slider">
                <!-- six slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-57&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/6.png" alt="Book 6">
                            <hr>
                            <div class="new-book-title">Lén Nhặt Chuyện Đời</div>
                            <div class="new-book-price">
                                <span class="new-price-current">42.500đ</span> 
                                <span class="new-price-original">85.000đ</span>
                                <span class="new-label-warning">-50%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress6">
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Seven Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-53&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/7.png" alt="Book 7">
                            <hr>
                            Hoàng Tử Bé (Song Ngữ Việt-Anh) <br>
                            <span style="color:#FF0000;">56.880đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">79.000đ</span>
                            <span class="new-label-warning">-43%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress7">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Eight Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-54&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/8.png" alt="Book 8">
                            <hr>
                            Thương <br>
                            <span style="color:#FF0000;">60.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">75.000đ</span>
                            <span class="new-label-warning">-20%</span>
                        </div>
                    </a>
                            <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress8">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Nine Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-55&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/9.png" alt="Book 9">
                            <hr>
                            Có Hai Con Mèo Ngồi Bên Cửa sổ (Tái Bản 2023) <br>
                            <span style="color:#FF0000;">84.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">100.000đ</span>
                            <span class="new-label-warning">-16%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress9">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>

                 <!-- Ten Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-56&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/10.png" alt="Book 10">
                            <hr>
                            Thả Trôi Phiền Muộn (Tái Bản 2023) <br>
                            <span style="color:#FF0000;">87.700đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">110.000đ</span>
                            <span class="new-label-warning">-23%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress10">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
              <a href="Product.php?value=Xu Hướng Theo Ngày" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px;">
            Xem thêm
        </a>
    </div>
              </div>

                <div class="content_2" id="content_hot">
            <!-- Slider for Book Cards -->
            <div class="new-slider" style="display:flex;">
                <!-- Book Slide 1 -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-58&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Vẽ cho Em Một Màu Bình Yên!</div>
                            <div class="new-book-price">
                                <span class="new-price-current">55.900đ</span> 
                                <span class="new-price-original">86.000đ</span>
                                <span class="new-label-warning">-35%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress11" >
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-59&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/2.png" alt="Book 2">
                            <hr>
                            Kí Họa Venice <br>
                            <span style="color:#FF0000;">146.250đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">225.000đ</span>
                            <span class="new-label-warning">-35%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress12">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-60&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/3.png" alt="Book 3">
                            <hr>
                            Những Người Vợ Tốt <br>
                            <span style="color:#FF0000;">94.250đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">145.000đ</span>
                            <span class="new-label-warning">-35%</span>
                        </div>
                    </a>
                                        <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress13">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-61&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/4.png" alt="Book 4">
                            <hr>
                            Đầu Tư Chứng Khoán <br>
                            <span style="color:#FF0000;">192.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">300.000đ</span>
                            <span class="new-label-warning">-36%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress14">
                            <div class="new-progress-text">Đã bán 45</div>
                        </div>
                    </div>
                </div>

                <!-- Five Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-62&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/5.png" alt="Book 5">
                            <hr>
                            Tiếng Gọi Của Hoang Dã <br>
                            <span style="color:#FF0000;">64.900đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">118.000đ</span>
                            <span class="new-label-warning">-45%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress15">
                            <div class="new-progress-text">Đã bán 59</div>
                        </div>
                    </div>
                </div>
                </div>

             <!-- Slider for Book Cards -->
            <div class="new-slider" id="new-slider">
                <!-- six slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-63&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/6.png" alt="Book 6">
                            <hr>
                            <div class="new-book-title">Một Thư Viện Ở Paris</div>
                            <div class="new-book-price">
                                <span class="new-price-current">152.750đ</span> 
                                <span class="new-price-original">235.000đ</span>
                                <span class="new-label-warning">-35%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress16">
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Seven Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-64&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/7.png" alt="Book 7">
                            <hr>
                            Tư Duy Triệu Phú <br>
                            <span style="color:#FF0000;">55.250đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">85.000đ</span>
                            <span class="new-label-warning">-35%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress17">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Eight Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-65&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/8.png" alt="Book 8">
                            <hr>
                            Combo Sách Trí Tuệ Của Người Xưa <br>
                            <span style="color:#FF0000;">185.102đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">306.000đ</span>
                            <span class="new-label-warning">-39%</span>
                        </div>
                    </a>
                            <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress18">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Nine Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-66&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/9.png" alt="Book 9">
                            <hr>
                            Combo Bộ 2 Cuốn <br>
                            <span style="color:#FF0000;">154.840đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">250.000đ</span>
                            <span class="new-label-warning">-38%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress19">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>

                 <!-- Ten Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-67&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/HOT/10.png" alt="Book 10">
                            <hr>
                            Yêu Em Từ Cái Nhìn Đầu Tiên (Tái Bản 2023) <br>
                            <span style="color:#FF0000;">110.980đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">179.000đ</span>
                            <span class="new-label-warning">-38%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress20">
                            <div class="new-progress-text">Đã bán 0</div>
                        </div>
                    </div>
                </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
              <a href="Product.php?value=Sách HOT - Giảm Sốc" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px;">
            Xem thêm
        </a>
    </div>
              </div>


              <div class="content_2" id="content_bestseller">
            <!-- Slider for Book Cards -->
            <div class="new-slider" style="display:flex;">
                <!-- Book Slide 1 -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-68&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/1.png" alt="Book 1">
                            <hr>
                            <div class="new-book-title">Never Split The Difference</div>
                            <div class="new-book-price">
                                <span class="new-price-current">200.700đ</span> 
                                <span class="new-price-original">233.000đ</span>
                                <span class="new-label-warning">-13%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress21" >
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Second Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-69&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/2.png" alt="Book 2">
                            <hr>
                            Violet Bent Backwards Over The Grass <br>
                            <span style="color:#FF0000;">560.700đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">651.000đ</span>
                            <span class="new-label-warning">-13%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress22">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Third Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-70&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/3.png" alt="Book 3">
                            <hr>
                            A Little Life <br>
                            <span style="color:#FF0000;">299.552đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">341.000đ</span>
                            <span class="new-label-warning">-12%</span>
                        </div>
                    </a>
                                        <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress23">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-71&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/4.png" alt="Book 4">
                            <hr>
                            Better Than The Movies <br>
                            <span style="color:#FF0000;">261.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">303.000đ</span>
                            <span class="new-label-warning">-13%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress24">
                            <div class="new-progress-text">Đã bán 49</div>
                        </div>
                    </div>
                </div>

                <!-- Five Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-72&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/5.png" alt="Book 5">
                            <hr>
                            Educated <br>
                            <span style="color:#FF0000;">235.800đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">274.000đ</span>
                            <span class="new-label-warning">-13%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress25">
                            <div class="new-progress-text">Đã bán 63</div>
                        </div>
                    </div>
                </div>
                </div>

             <!-- Slider for Book Cards -->
            <div class="new-slider" id="new-slider">
                <!-- six slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-73&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/11.png" alt="Book 6">
                            <hr>
                            <div class="new-book-title">They Both Die At The End</div>
                            <div class="new-book-price">
                                <span class="new-price-current">205.200đ</span> 
                                <span class="new-price-original">239.000đ</span>
                                <span class="new-label-warning">-14%</span>
                            </div>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress26">
                            <div class="new-progress-text">Đã bán 76</div>
                        </div>
                    </div>
                </div>

                <!-- Seven Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-74&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/7.png" alt="Book 7">
                            <hr>
                            Annie of Green Gables (Vintage Classics) <br>
                            <span style="color:#FF0000;">132.300đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">170.000đ</span>
                            <span class="new-label-warning">-22%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress27">
                            <div class="new-progress-text">Đã bán 25</div>
                        </div>
                    </div>
                </div>

                <!-- Eight Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-75&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/8.png" alt="Book 8">
                            <hr>
                            Love For Imperfect Things <br>
                            <span style="color:#FF0000;">230.850đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">280.000đ</span>
                            <span class="new-label-warning">-17%</span>
                        </div>
                    </a>
                            <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress28">
                            <div class="new-progress-text">Đã bán 94</div>
                        </div>
                    </div>
                </div>

                <!-- Nine Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-76&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/9.png" alt="Book 9">
                            <hr>
                            Diary Of A Wimpy Kid - Book 19 - Hot Mess <br>
                            <span style="color:#FF0000;">280.250đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">340.000đ</span>
                            <span class="new-label-warning">-17%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress29">
                            <div class="new-progress-text">Đã bán 48</div>
                        </div>
                    </div>
                </div>

                 <!-- Ten Slide -->
                <div class="new-book-card">
                    <a href="description.php?ID=NEW-77&category=new">
                        <div class="new-book-block">
                            <img class="new-block-center new-img-responsive" src="img/XHMS/bestseller/10.png" alt="Book 10">
                            <hr>
                            A Brief History Of Intelligence <br>
                            <span style="color:#FF0000;">573.000đ</span> &nbsp;
                            <span style="text-decoration:line-through;color:#828282;">666.000đ</span>
                            <span class="new-label-warning">-14%</span>
                        </div>
                    </a>
                    <div class="new-progress-container">
                        <div class="new-progress-bar" id="new-progress30">
                            <div class="new-progress-text">Đã bán 62</div>
                        </div>
                    </div>
                </div>

                </div>
                <div style="text-align: center; margin-top: 20px;">
              <a href="Product.php?value=Ngoại Văn" class="btn" style="background-color: #fff; color: #FF0000; padding: 10px 20px; font-size: 16px; text-decoration: none; border: 2px solid #FF0000; width: 200px; height: 50px;">
            Xem thêm
        </a>
    </div>
              </div>


            
  </div>
        </div> 
    </div>
</div>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab_btn_2');
    const contentTrending = document.getElementById('content_trending');
    const contentHot = document.getElementById('content_hot');
    const contentBestseller = document.getElementById('content_bestseller');
    const line = document.querySelector('.line_2');

    // event nút
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            // Remove the active class from all tabs
            tabs.forEach(tab => tab.classList.remove('active'));
            // Add the active class to the clicked tab
            tab.classList.add('active');

            // Update the line position and width
            line.style.width = e.target.offsetWidth + "px";
            line.style.left = e.target.offsetLeft + "px";

            // Toggle content visibility based on the active tab
            if (index === 0) {  // Assuming "xu hướng theo ngày" is the first tab
                contentTrending.classList.add('active');
                contentHot.classList.remove('active');
                contentBestseller.classList.remove('active');
            } else if (index === 1) {  // Assuming "Sách HOT - Giảm sốc" is the second tab
                contentTrending.classList.remove('active');
                contentHot.classList.add('active');
                contentBestseller.classList.remove('active');
            } else if (index === 2) {  // Assuming "Best Seller" is the third tab
                contentTrending.classList.remove('active');
                contentHot.classList.remove('active');
                contentBestseller.classList.add('active');
            }
        });
    });


    // jaascript thanh tiến trình
    function updateProgress(id, percent) {
        const progressBar = document.getElementById(id);
        if (progressBar) {
            progressBar.style.width = percent + '%';
        }
    }

    
    //thanh tiến trình

    updateProgress('new-progress1', 75);
    updateProgress('new-progress2', 50);
    updateProgress('new-progress3', 90);
    updateProgress('new-progress4', 80);
    updateProgress('new-progress5', 62);
    updateProgress('new-progress6', 75);
    updateProgress('new-progress7', 50);
    updateProgress('new-progress8', 90);
    updateProgress('new-progress9', 46);
    updateProgress('new-progress10', 64);
    updateProgress('new-progress11', 75);
    updateProgress('new-progress12', 50);
    updateProgress('new-progress13', 90);
    updateProgress('new-progress14', 88);
    updateProgress('new-progress15', 81);
    updateProgress('new-progress16', 75);
    updateProgress('new-progress17', 50);
    updateProgress('new-progress18', 90);
    updateProgress('new-progress19', 96);
    updateProgress('new-progress20', 79);
    updateProgress('new-progress21', 75);
    updateProgress('new-progress22', 50);
    updateProgress('new-progress23', 90);
    updateProgress('new-progress24', 34);
    updateProgress('new-progress25', 59);
    updateProgress('new-progress26', 75);
    updateProgress('new-progress27', 50);
    updateProgress('new-progress28', 90);
    updateProgress('new-progress29', 74);
    updateProgress('new-progress30', 58);
});
                </script>




<div class="new-book-card-title" style="background-color: #FCDDEF; padding: 20px; width: 100%; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
    <h2 class="slider-title" style="margin: 0;">
        <i class="fas fa-book"></i> Tủ sách nổi bật
    </h2>
</div>

<div class="new-container-fluid text-center" id="new" >
    <div class="new-slider-container" style="position: relative; overflow: hidden; width: 100% ; ">
        <div class="new-slider-box" style="display: flex; transition: transform 0.5s ease; ">
            <div class="new-slider" id="new-slider-1" style="display: flex; ">
                <!-- Book Slides -->
                <a href="Product.php?value=Tác Phẩm kinh Điển">
                    <div class="new-book-block" style="margin-left: 30px; margin-right: 30px;">
                        <img class="new-block-center new-img-responsive" src="img/cap/1.png" alt="Book 1">
                        <div class="new-book-title" style="width: 100%; ">Tác phẩm kinh điển</div>
                    </div>
                </a>
                <a href="Product.php?value=Nguyễn Nhật Ánh">
                    <div class="new-book-block" style="margin-right: 30px;">
                        <img class="new-block-center new-img-responsive" src="img/cap/2.png" alt="Book 2">
                        <div class="new-book-title">Nguyễn Nhật Ánh</div>
                    </div>
                </a>
                <a href="product.php?value=Ngoại Ngữ&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/3.png" alt="Book 3">
                        <div class="new-book-title">Take Note! Dễ học</div>
                    </div>
                </a>
                <a href="product.php?value=Kinh Doanh&category=new">
                    <div class="new-book-block" style="">
                        <img class="new-block-center new-img-responsive" src="img/cap/9.png" alt="Book 4" style="align-items: self-start;">
                        <div class="new-book-title">Đầu tư tương lai</div>
                    </div>
                </a>
                <a href="product.php?value=Tri Thức&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/5.png" alt="Book 5">
                        <div class="new-book-title">Tư duy siêu việt</div>
                    </div>
                </a>
                <a href="product.php?value=Thiếu Nhi&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/6.png" alt="Book 3">
                        <div class="new-book-title">Truyện đọc cho bé</div>
                    </div>
                </a>
                <a href="product.php?value=Văn học Việt Nam&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/7.png" alt="Book 3">
                        <div class="new-book-title">Văn học Việt Nam</div>
                    </div>
                </a>
                <a href="product.php?value=Tự tin vào lớp 1&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/8.png" alt="Book 3">
                        <div class="new-book-title">Tự tin vào lớp 1</div>
                    </div>
                </a>

                <!-- More slides here -->
            </div><!-- End of new-slider-1 -->

            <div class="new-slider" id="new-slider-2" style="display: none;">
                <a href="product.php?value=Song Ngữ Thiếu Nhi&category=new">
                    <div class="new-book-block" style="margin-left: 30px">
                        <img class="new-block-center new-img-responsive" src="img/cap/10.png" alt="Book 10">
                        <div class="new-book-title">Song Ngữ Thiếu Nhi</div>
                    </div>
                </a>
                <a href="product.php?value=Kỹ Năng Sống&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/11.png" alt="Book 11">
                        <div class="new-book-title">Chữa Lành Tâm Hồn</div>
                    </div>
                </a>
                <a href="product.php?value=Kinh Dị - Bí Ẩn&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/12.png" alt="Book 12">
                        <div class="new-book-title">Kinh dị - Bí ẩn</div>
                    </div>
                </a>
                <a href="description.php?ID=ENT-13&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/13.png" alt="Book 13">
                        <div class="new-book-title">Ehon Nhật Bản</div>
                    </div>
                </a>
                <a href="description.php?ID=ENT-14&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/14.png" alt="Book 14">
                        <div class="new-book-title">Nuôi Con Thảnh Thơi</div>
                    </div>
                </a>
                <a href="product.php?value=Tô màu cảm xúc&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/15.png" alt="Book 14">
                        <div class="new-book-title">Tô Màu cảm Xúc</div>
                    </div>
                </a>
                <a href="description.php?ID=ENT-14&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/16.png" alt="Book 14">
                        <div class="new-book-title">Nghệ Thuật MKT</div>
                    </div>
                </a>
                <a href="description.php?ID=ENT-14&category=new">
                    <div class="new-book-block">
                        <img class="new-block-center new-img-responsive" src="img/cap/17.png" alt="Book 14">
                        <div class="new-book-title">Tủ Sách Giáng Sinh</div>
                    </div>
                </a>
            </div> <!-- End of new-slider-2 -->
        </div> <!-- End of new-slider-box --> <!-- End of new-slider-box -->

        <button class="new-next" style="border-radius: 25px; background-color:white; color: black;" onclick="nextSlider()">&#10095;</button>
        <button class="new-prev" style="border-radius: 25px; background-color:white; color: black;" onclick="prevSlider()">&#10094;</button>
    </div> <!-- End of new-slider-container -->
</div> <!-- End of new-container-fluid -->

<script>
let currentSlider = 1;

function nextSlider() {
    const slider1 = document.getElementById('new-slider-1');
    const slider2 = document.getElementById('new-slider-2');

    if (currentSlider === 1) {
        slider1.style.display = 'none'; // Hide first slider
        slider2.style.display = 'flex'; // Show second slider
        currentSlider = 2; // Update to the second slider
    }
}

function prevSlider() {
    const slider1 = document.getElementById('new-slider-1');
    const slider2 = document.getElementById('new-slider-2');

    if (currentSlider === 2) {
        slider1.style.display = 'flex'; // Show first slider
        slider2.style.display = 'none'; // Hide second slider
        currentSlider = 1; // Update to the first slider
    }
}
</script>


    <div class="new-book-card-title" style="background-color: #FCDDEF; padding: 20px; width: 100%; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
    <h2 class="slider-title" style="margin: 0;">
        <i class="fas fa-book"></i> Bảng xếp hạng bán chạy tuần
    </h2>
</div>
<div class="container" style="width: 1500px; background-color: white; padding: 20px; width: 100%; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; ">
    <div class="container" style="display: flex; width: 100%; max-width: 1200px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <h2>Top bán chạy</h2>
            <div class="book-item" onclick="showDetails('book1')" ondblclick="navigateToBook('NEW-22')">
                <span style="font-weight: bold; margin-right: 10px; display: inline-block;">
                    01 
                    <i class="fas fa-arrow-up" style="color: green; display: block; margin-top: 3px;"></i>
                </span>
                <img src="img/top/1.png" alt="Góc Nhỏ Có Nắng">
                <div class="book-info">
                    <p class="book-title">Góc Nhỏ Có Nắng</p>
                    <p class="book-author">Tác giả: Little Rainbow</p>
                    <p class="book-score">Điểm: 1683</p>
                </div>
            </div>
            <div class="book-item" onclick="showDetails('book2')" ondblclick="navigateToBook('NEW-80')">
                <span style="font-weight: bold; margin-right: 10px; display: inline-block;">
                    02 
                    <i class="fas fa-arrow-up" style="color: green; display: block; margin-top: 3px;"></i>
                </span>
                <img src="img/top/2.png" alt="Tô Bình Yên Về Hạnh Phúc">
                <div class="book-info">
                    <p class="book-title">Tô Bình Yên Về Hạnh Phúc</p>
                    <p class="book-author">Tác giả: Kulzsc</p>
                    <p class="book-score">Điểm: 1034</p>
                </div>
            </div>
            <div class="book-item" onclick="showDetails('book3')" ondblclick="navigateToBook('ENT-3')">
                <span style="font-weight: bold; margin-right: 10px; display: inline-block;">
                    03 
                    <i class="fas fa-arrow-up" style="color: green; display: block; margin-top: 3px;"></i>
                </span>
                <img src="img/top/4.png" alt="Lên Nhật Chuyện Đời">
                <div class="book-info">
                    <p class="book-title">Lên Nhật Chuyện Đời</p>
                    <p class="book-author">Tác giả: Mộc Trầm</p>
                    <p class="book-score">Điểm: 946</p>
                </div>
            </div>
            <div class="book-item" onclick="showDetails('book4')" ondblclick="navigateToBook('NEW-81')">
                <span style="font-weight: bold; margin-right: 10px; display: inline-block;">
                    04 
                    <i class="fas fa-arrow-up" style="color: green; display: block; margin-top: 3px;"></i>
                </span>
                <img src="img/top/3.png" alt="Trốn Lên Mái Nhà Để Khóc">
                <div class="book-info">
                    <p class="book-title">Trốn Lên Mái Nhà Để Khóc</p>
                    <p class="book-author">Tác giả: Lam</p>
                    <p class="book-score">Điểm: 825</p>
                </div>
            </div>
            <div class="book-item" onclick="showDetails('book5')" ondblclick="navigateToBook('NEW-82')">
                <span style="font-weight: bold; margin-right: 10px; display: inline-block;">
                    05 
                    <i class="fas fa-arrow-up" style="color: green; display: block; margin-top: 3px;"></i>
                </span>
                <img src="img/top/5.png" alt="Trăng">
                <div class="book-info">
                    <p class="book-title">Trắng</p>
                    <p class="book-author">Tác giả: Han Kang</p>
                    <p class="book-score">Điểm: 748</p>
                </div>
            </div>
        </div>

        <!-- Right Content Area -->
        <div class="content" id="content" style="display: flex; align-items: flex-start; padding-left: 20px;">
            <img src="img/top/1.png" alt="Book Cover" id="bookImage" style="max-width: 300px; margin-right: 20px;">
            <div>
                <h3 id="bookTitle">Góc Nhỏ Có Nắng</h3>
                <p id="bookAuthor">Tác giả: Little Rainbow</p>
                <p id="bookPublisher">Nhà xuất bản: Thanh Niên</p>
                <p class="price" id="bookPrice" style="text-color:red">57,120 đ <span class="MRP" style="text-decoration:line-through;color:#828282;"> 68.000đ </span><span class="discount">-16%</span></p>
                <p id="bookDescription">Với 30 chủ đề tô màu phong phú đa dạng, mỗi bức tranh như là một lời thư thả tâm tình gửi đến bạn...</p>

            </div>
        </div>
    </div>
    
</div>

<script>
    const bookData = {
        book1: {
            title: "Góc Nhỏ Có Nắng",
            author: "Little Rainbow",
            publisher: "Thanh Niên",
            price: "57,120 đ",
            MRP: "68.000đ",
            discount: "-16%",
            description: "Với 30 chủ đề tô màu phong phú đa dạng, mỗi bức tranh như là một lời thư thả tâm tình gửi đến bạn...",
            image: "img/top/1.png",
            score: 1683
        },
        book2: {
            title: "Tô Bình Yên Về Hạnh Phúc",
            author: "Kulzsc",
            publisher: "NXB Trẻ",
            price: "68,000 đ",
            MRP: "99,000đ",
            discount: "-10%",
            description: "Một cuốn sách mang lại sự bình yên cho tâm hồn.",
            image: "img/top/2.png",
            score: 1034
        },
        book3: {
            title: "Lên Nhật Chuyện Đời",
            author: "Mộc Trầm",
            publisher: "NXB Văn Học",
            price: "85,000 đ",
            MRP: "68.000đ",
            discount: "-5%",
            description: "Những câu chuyện cảm động về cuộc sống ở Nhật Bản.",
            image: "img/top/4.png",
            score: 946
        },
        book4: {
            title: "Trốn Lên Mái Nhà Để Khóc",
            author: "Lam",
            publisher: "NXB Kim Đồng",
            price: "71,250 đ",
            MRP: "95.000đ",
            discount: "-12%",
            description: "Cuốn sách giúp bạn tìm lại chính mình qua những trang viết dịu dàng.",
            image: "img/top/3.png",
            score: 825
        },
        book5: {
            title: "Trắng",
            author: "Han Kang",
            publisher: "NXB Phụ Nữ Việt Nam",
            price: "75.050 đ",
            MRP: "79.000 đ",
            discount: "-5%",
            description: "Một cuốn sách sâu sắc về tâm lý và sự tha thứ.",
            image: "img/top/5.png",
            score: 748
        }
    };

    function showDetails(bookId) {
        
        document.querySelectorAll('.book-item').forEach(item => item.classList.remove('active'));

        
        document.querySelector(`[onclick="showDetails('${bookId}')"]`).classList.add('active');

        
        const book = bookData[bookId];
        document.getElementById('bookTitle').textContent = book.title;
        document.getElementById('bookAuthor').textContent = `Tác giả: ${book.author}`;
        document.getElementById('bookPublisher').textContent = `Nhà xuất bản: ${book.publisher}`;
        document.getElementById('bookPrice').innerHTML = `<span style="text-color:red"class="price">${book.price} <span style="text-decoration:line-through;color:#828282; class="MRP" >${book.MRP}</span><span class="discount">${book.discount}</span>`;
        document.getElementById('bookDescription').textContent = book.description;
        document.getElementById('bookImage').src = book.image;
    }

    function navigateToBook(bookId) {
        
        window.location.href = `description.php?ID=${bookId}&category=new`; 
    }
</script>


<div class="category-container" style="margin-top: 20px; margin-bottom: 50px">
    <a href="Product.php?value=Tiểu thuyết" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-left: -20px; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Tiểu thuyết</div>
            <img src="img/bia/1.png" alt="Đồ chơi" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/top/1.png" alt="Small Toy 1" style="width: 35%; height: auto;">
                <img src="img/top/2.png" alt="Small Toy 2" style="width: 35%; height: auto;">
                <img src="img/top/3.png" alt="Small Toy 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
    
    <a href="Product.php?value=Ngoại Ngữ" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Sách học ngoại ngữ</div>
            <img src="img/bia/2.png" alt="Dụng cụ học sinh" class="category-image" style="width: 100%; height: auto; margin-top: -10px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/books/LIT-1.png" alt="Small School Supply 1" style="width: 35%; height: auto;">
                <img src="img/books/LIT-2.png" alt="Small School Supply 2" style="width: 35%; height: auto;">
                <img src="img/books/LIT-3.png" alt="Small School Supply 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
    
    <a href="Product.php?value=Kỹ Năng Sống" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Tâm lý kỹ năng</div>
            <img src="img/bia/3.png" alt="Văn phòng phẩm" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: 10px;">
                <img src="img/books/CHILD-6.png" alt="Small Stationery 1" style="width: 35%; height: auto;">
                <img src="img/books/CHILD-7.png" alt="Small Stationery 2" style="width: 35%; height: auto;">
                <img src="img/books/CHILD-8.png" alt="Small Stationery 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>

    <a href="Product.php?value=Kinh Doanh" style="text-decoration: none; color: inherit;">
        <div class="category-box" style="background-color: white; padding: 20px; box-sizing: border-box; margin-bottom: -20px; margin-top: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="category-title">Kinh doanh</div>
            <img src="img/bia/4.png" alt="Bách hóa online" class="category-image" style="width: 100%; height: auto; margin-top: -20px;">
            <div style="display: flex; justify-content: space-around; margin-top: -10px;">
                <img src="img/books/BUS-1.png" alt="Small Online Store Item 1" style="width: 35%; height: auto;">
                <img src="img/books/BUS-2.png" alt="Small Online Store Item 2" style="width: 35%; height: auto;">
                <img src="img/books/BUS-3.png" alt="Small Online Store Item 3" style="width: 35%; height: auto;">
            </div>
        </div>
    </a>
</div>




  <footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>Liên hệ với chúng tôi!</h2>
                      <hr class="primary">
                      <p>Vẫn đang phân vân? Hãy gọi cho chúng tôi hoặc gửi email, chúng tôi sẽ phản hồi bạn sớm nhất có thể!</p>
                      <!-- <hr class="primary"> -->
                      <p>Phạm Minh Hải - 21103200113</p>
                      <p>Ngô Thế Duy - 21103200063</p>
                      <p>Nguyễn Đức Duy - 21103200064</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>123-456-789</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>BookStore@gmail.com</p>
                      </div>
                  </div>
              </div>
              <div class="hidden-sm-down col-md-2 col-lg-2">
              </div>
              <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                  <h2 style="color:#D67B22;">Theo dõi chúng tôi tại</h2>
                  <div>
                      <a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1">
                      <img title="Twitter" alt="Twitter" src="img/social/twitter.png" width="35" height="35" />
                      </a>
                      <a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1">
                      <img title="LinkedIn" alt="LinkedIn" src="img/social/linkedin.png" width="35" height="35" />
                      </a>
                      <a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1">
                      <img title="Facebook" alt="Facebook" src="img/social/facebook.png" width="35" height="35" />
                      </a>
                      <a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1">
                      <img title="google+" alt="google+" src="img/social/google.jpg" width="35" height="35" />
                      </a>
                      <a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1">
                      <img title="Pinterest" alt="Pinterest" src="img/social/pinterest.jpg" width="35" height="35" />
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
  <!-- MESSANGE NÚT -->
  <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">
      <i class="fab fa-facebook-messenger"></i> <!-- Messenger icon -->
  </button>
  
  <!-- HÔ TRỢ TRỰC TUYẾN -->
  <div class="modal fade" id="query" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Hỗ trợ trực tuyến</h4>
          </div>
          <div class="modal-body">           
                    <form method="post" action="query.php" class="form" role="form">
                        <div class="form-group">
                             <label class="sr-only" for="name">Name</label>
                             <input type="text" class="form-control"  placeholder="Tên của bạn" name="sender" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="email">Email</label>
                             <input type="email" class="form-control" placeholder="abc@gmail.com" name="senderEmail" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="query">Message</label>
                             <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Nhập nội dung cần hỗ trợ" required></textarea>
                        </div>
                        <div class="form-group">
                              <button type="submit" name="submit" value="query" class="btn btn-block">
                                  Gửi hỗ trợ
                              </button>
                        </div>
                    </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          </div>
      </div>
    </div>  
  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>	
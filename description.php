<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Đăng nhập để tiếp tục");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title> Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>  
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .tag {display:inline;float:left;padding:2px 5px;width:auto;background:#F5A623;color:#fff;height:23px;}
        .tag-side{display:inline;float:left;}
        #books {border:1px solid #DEEAEE; margin-bottom:20px;padding-top:30px;padding-bottom:20px;background:#fff; margin-left:10%;margin-right:10%;}
        #description {border:1px solid #DEEAEE; margin-bottom:20px;padding:20px 50px;background:#fff;margin-left:10%;margin-right:10%;}
        #description hr{margin:auto;}
        #service{background:#fff;padding:20px 10px;width:112%;margin-left:-6%;margin-right:-6%;}
        .glyphicon {color:#D67B22;}
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
         .slider-box {
    margin: 0 auto; /* Center the box */
    position: relative; /* Required for positioning the link */
    background-color: white;
    border-radius: 10px;
    padding: 20px; /* Padding around the slider */
    width: 80%; /* Adjust width as needed */
    max-width: 1200px; /* Optional max width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
}

/* Title */
.slider-title {
    font-size: 24px; /* Adjust font size as needed */
    font-weight: bold; /* Make the text bold */
    margin-bottom: 10px; /* Space below the title */
    color: black; /* Title color */
    text-align: left; /* Align text to the left */
}
/* Line Below Title */
.line {
    height: 2px; /* Thickness of the line */
    background-color: lightgray; /* Color of the line */
    margin-bottom: 5px; /* Space below the line */
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

/* Hover Effect */
.view-all:hover {
    color: #218838; /* Darker green on hover */
}

/* Slider Container */
.slider-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    width: 100%;
}

/* Slider */
.slider {
    display: flex;
    overflow-x: scroll;
    scroll-behavior: smooth;
    padding: 10px 0;
    width: 100%;
    scrollbar-width: none; /* Hide scrollbar in Firefox */
}

.slider::-webkit-scrollbar {
    display: none; /* Hide scrollbar in Chrome, Safari, and Edge */
}

/* Navigation Buttons */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: lightgray; /* White background */
    color: black; /* Black arrow */
    border: none; /* No border */
    border-radius: 50%; /* Make it round */
    width: 40px; /* Round button width */
    height: 40px; /* Round button height */
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: none; /* Remove shadow */
    outline: none; /* Remove outline */
}

/* Positioning Navigation Buttons */
.prev {
    left: 10px; /* Position on the left */
}

.next {
    right: 10px; /* Position on the right */
}

/* Adjust Arrow Size */
.prev::before, .next::before {
    font-size: 18px; /* Adjust arrow size */
}

/* Book Card */
.book-card {
    flex: 0 0 calc(25% - 20px); /* 25% width for each card */
    height: auto; /* Automatic height */
    margin: 0 10px; /* Margin between cards */
    border: none; /* Remove border */
    padding: 10px; /* Padding inside the card */
    text-align: center; /* Center text */
    transition: box-shadow 0.3s ease;
    background-color: white; /* White background */
    box-shadow: none; /* Remove box shadow */
}

/* Book Image */
.book-card .block-center.img-responsive {
    width: 120px; /* Image width */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto; /* Center image */
}

/* Remove any additional outlines or borders */
.book-card, .book-block, .tag, .tag-side img {
    border: none; /* Remove all borders */
    outline: none; /* Remove all outlines */
    box-shadow: none; /* Remove any shadows */
}

   .rating-box {
    background-color: white;
    border-radius: 10px;
    padding: 20px; /* Adjust padding */
    margin: 20px auto; /* Center the box */
    width: 80%; /* Adjust width as needed */
    max-width: 1200px; /* Max width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
}

.rating-score {
    font-size: 18px; /* Font size for score */
    margin-bottom: 10px; /* Space below the score */
}

.star-rating {
    display: flex;
    flex-direction: column; /* Stack the stars vertically */
    align-items: center; /* Center align */
}

.stars {
    display: flex; /* Align stars in a row */
}

.star {
    font-size: 30px; /* Size of stars */
    color: #d3d3d3; /* Default gray color */
    cursor: pointer; /* Pointer on hover */
    margin: 0 2px; /* Space between stars */
    transition: color 0.3s; /* Smooth color transition */
}

.star:hover,
.star.selected {
    color: gold; /* Color of the star on hover and selection */
}

.rating-value {
    margin-top: 10px; /* Space above rating value */
    font-size: 16px; /* Font size for the rating value */
}

.comment-box {
    background-color: white; /* Red background inside the box */
    border-radius: 10px;
    padding: 20px; /* Adjust padding */
    margin: 20px auto; /* Center the box */
    width: 80%; /* Adjust width as needed */
    max-width: 1200px; /* Max width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
}

.comment-box h3 {
    font-size: 20px; /* Font size for comment section header */
    margin-bottom: 15px; /* Space below header */
}

#commentInput {
    width: 100%; /* Full width for the textarea */
    padding: 10px; /* Padding inside the textarea */
    border: 1px solid #ccc; /* Border color */
    border-radius: 5px; /* Rounded corners */
    margin-bottom: 10px; /* Space below the textarea */
    resize: vertical; /* Allow vertical resize only */
}

#submitComment {
    background-color: #007bff; /* Button color */
    color: white; /* Text color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 15px; /* Padding inside the button */
    cursor: pointer; /* Pointer on hover */
    transition: background-color 0.3s; /* Smooth background color transition */
}

#submitComment:hover {
    background-color: #0056b3; /* Darker button color on hover */
}

#commentsSection {
    margin-top: 20px; /* Space above comments section */
}

.comment {
    display: flex; /* Align user icon and comment text */
    align-items: flex-start; /* Align items to the top */
    margin: 10px 0; /* Space between comments */
}

.comment-icon {
    margin-right: 10px; /* Space between icon and text */
}

.user-icon {
    width: 40px; /* Size of the user icon */
    height: 40px; /* Size of the user icon */
    border-radius: 50%; /* Circular shape */
}

.comment-text {
    background-color: #f9f9f9; /* Light background for comments */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Padding inside comment box */
    max-width: 85%; /* Limit the width of comment text */
}

h3 {
    margin-bottom: 10px; /* Space below the heading */
}

textarea {
    width: 100%; /* Full width */
    padding: 10px; /* Inner padding */
    border: 1px solid #ccc; /* Border */
    border-radius: 5px; /* Rounded corners */
    resize: none; /* Prevent resizing */
}

button {
    margin-top: 10px; /* Space above the button */
    padding: 10px 15px; /* Padding for the button */
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
}

button:hover {
    background-color: #218838; /* Darker green on hover */
}

#commentsSection {
    margin-top: 20px; /* Space above the comments section */
}

.comment {
    background-color: #f8f9fa; /* Light background for each comment */
    border: 1px solid #ccc; /* Border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Inner padding */
    margin: 5px 0; /* Space between comments */
}

.line {
    height: 1px; /* Height of the line */
    background-color: #ddd; /* Color of the line */
    margin: 5px 0; /* Space above and below the line */
    width: 100%; /* Full width */
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
          <a class="navbar-brand" href="index.php"><img alt="Brand" src="img/logo.jpg" style="width: 118px;margin-top: -7px;margin-left: -10px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <?php
                  if(isset($_SESSION['user']))
                    {
                      echo'
                    <li>
    <a href="cart.php" class="btn btn-md">
        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Giỏ hàng
    </a>
</li>
<li>
    <a href="destroy.php" class="btn btn-md">
        <span class="glyphicon glyphicon-log-out"></span>&nbsp;Đăng xuất
    </a>
</li>
                         ';
                    }
               ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div id="top">
    <div id="searchbox" class="container-fluid" style="width: 112%; margin-left: -6%; margin-right: -6%; display: flex; align-items: center;">
        <!-- <a class="navbar-brand" href="index.php" style="padding: 1px;">
            <img class="img-responsive" alt="Brand" src="img/booklogo.png" style="width: 147px; margin: 0px;">
        </a> -->
        <form role="search" action="Result.php" method="post" style="flex: 1; margin: 20px;">
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sách, tác giả hoặc tiểu thuyết..." style="width: 100%;">
        </form>
        <!-- <ul class="nav navbar-nav" style="display: flex; margin-left: auto;">
            ?php
            if (isset($_SESSION['user'])) {
                echo '
                <li style="margin-left: 10px;">
                    <a href="cart.php" class="btn btn-md">
                        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Giỏ hàng
                    </a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="destroy.php" class="btn btn-md">
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;Đăng xuất
                    </a>
                </li>';
            }
            ?
        </ul> -->
    </div>
</div>

<?php
    include "dbconnect.php";
    $PID = $_GET['ID'];
    $query = "SELECT * FROM products WHERE PID='$PID'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {   
        while ($row = mysqli_fetch_assoc($result)) {
            $path = "img/books/" . $row['PID'] . ".png";
            echo '
            <div class="container-fluid" id="books">
                <div class="row">
                    <div class="col-sm-10 col-md-6">
                        <div class="tag">' . $row["Discount"] . '%OFF</div>
                        <div class="tag-side"><img src="img/orange-flag.png"></div>
                        <img class="center-block img-responsive" src="' . $path . '" height="550px" style="padding:20px;">
                    </div>
                    <div class="col-sm-10 col-md-4 col-md-offset-1">
                        <h2>' . $row["Title"] . '</h2>
                        <span style="color:#00B9F5;">
                            #' . $row["Author"] . '&nbsp;&nbsp; #' . $row["Publisher"] . '
                        </span>
                        <hr>
                        <span style="font-weight:bold;"> Số lượng : </span>
                        <div class="quantity-container" style=" padding: 10px; border-radius: 5px; display: flex; align-items: center; width:150px;margin-left:60px;margin-top:-45px">
                            <button onclick="changeQuantity(-1)" style="border: none; background: white; color: black; padding: 10px; border-radius: 5px; cursor: pointer;font-size: 24px; margin-top:0px">-</button>
                            <select id="quantity" onchange="checkQuantity()" style="margin: 0 10px; padding: 5px;">
                            ';
                            for ($i = 1; $i <= $row['Available']; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            echo '</select>';
                            echo '<button onclick="changeQuantity(1)" style="border: none; background: white; color: black; padding: 10px; border-radius: 5px; cursor: pointer;font-size: 24px; margin-top:0px">+</button>
                        </div>
                        <br><br><br>
                        <a id="buyLink" href="javascript:void(0);" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;" onclick="buyNow(\'' . $row["PID"] . '\', ' . $row["Price"] . ', ' . $row["MRP"] . ', ' . $row["Discount"] . ')">
                            Mua ngay với giá ' . number_format($row["Price"], 0, ',', '.') . ' đ <br>
                            <span style="text-decoration:line-through;"> ' . $row["MRP"] . ' đ</span> 
                            | giảm giá ' . $row["Discount"] . '% 
                        </a>
                        <a href="javascript:void(0);" onclick="addToCart(\'' . $PID . '\')" class="btn btn-lg btn-danger" style="padding:15px; text-decoration:none; margin-top:15px;background-color: #fff; color: #FF0000;font-size: 16px; border: 2px solid #FF0000;  padding:15px 30px;">
                            Thêm vào giỏ hàng
                        </a>
                    </div>
                </div>
            </div>';

            echo '
            <div class="container-fluid" id="description">
                <div class="row">
                    <h2> Mô tả sản phẩm </h2> 
                    <p>' . $row['Description'] . '</p>
                    <pre style="background:inherit;border:none;">
   Mã Hàng       ' . $row["PID"] . '   <hr> 
   Tiêu đề       ' . $row["Title"] . ' <hr> 
   Tác giả       ' . $row["Author"] . ' <hr>
   Số lượng      ' . $row["Available"] . ' <hr> 
   NXB           ' . $row["Publisher"] . ' <hr> 
   Năm XB       ' . $row["Edition"] . ' <hr>
   Ngôn ngữ      ' . $row["Language"] . ' <hr>
   Số trang      ' . $row["page"] . ' <hr>
   Cân nặng      ' . $row["weight"] . ' <hr>
                    </pre>
                </div>
            </div>';
        }
    }
?>

<!-- Notification Overlay HTML -->
<div id="cartNotification" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color:black; color:white; padding:20px 40px; border-radius:10px; text-align:center; opacity:0.9;">
    <div style="width:60px; height:60px; background-color:#28a745; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
        <span style="font-size:30px; color:white;">✔</span>
    </div>
    <p style="font-size:20px; font-weight:bold;">Đã thêm vào giỏ hàng thành công</p>
</div>


<!-- JavaScript for AJAX functionality and Notification Control -->
<script>
function addToCart(PID) {
    const quantity = document.getElementById('quantity').value;

    // Create an AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "cart.php?ID=" + PID + "&quantity=" + quantity, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            showNotification(); // Show notification on success
        }
    };
    xhr.send();
}

function showNotification() {
    const notification = document.getElementById("cartNotification");
    notification.style.display = "block"; // Show the notification

    setTimeout(() => {
        notification.style.display = "none"; // Hide the notification after 1 second
    }, 1000);
}

function changeQuantity(change) {
    const quantitySelect = document.getElementById('quantity');
    let currentQuantity = parseInt(quantitySelect.value);
    const maxQuantity = parseInt(quantitySelect.options[quantitySelect.options.length - 1].value); // Get the max available quantity

    // Update the quantity based on the change
    if (change === 1 && currentQuantity < maxQuantity) {
        currentQuantity++;
    } else if (change === -1 && currentQuantity > 1) {
        currentQuantity--;
    }

    // Set the updated quantity back to the select element
    quantitySelect.value = currentQuantity;
}

function checkQuantity() {
    const quantitySelect = document.getElementById('quantity');
    const maxQuantity = parseInt(quantitySelect.options[quantitySelect.options.length - 1].value); // Get the max available quantity

    // If the selected quantity is greater than available, reset to max
    if (parseInt(quantitySelect.value) > maxQuantity) {
        quantitySelect.value = maxQuantity;
    }
}

function buyNow(PID, price, mrp, discount) {
    const quantity = document.getElementById('quantity').value;
    const target = "cart.php?ID=" + PID + "&quantity=" + quantity;

    // Redirect to the constructed URL
    window.location.href = target;
}
</script>


<div class="slider-box">
    <div class="slider-title">Xem thêm các sản phẩm tương tự</div>
    <div class="line"></div> <!-- Line below the title -->
    <a href="Product.php?value=tieu%20thuyet" class="view-all">
        Xem tất cả
        <div class="icon-container">⇨</div> <!-- Arrow inside a round black box -->
    </a>
    <div class="slider-container">
        <button class="prev" onclick="document.getElementById('slider').scrollLeft -= 300;">&#10094;</button>
        <div class="slider" id="slider">
            <!-- First Slide -->
            <div class="book-card">
                <a href="description.php?ID=ENT-1&category=new">
                    <div class="book-block">
                        <img class="block-center img-responsive" src="img/new/1.png" alt="Book 1">
                        <hr>
                        Sơn Trà Nở Muộn <br>
                        <span style="color:#FF0000;">180.000 đ</span> &nbsp;
                        <span style="text-decoration:line-through;color:#828282;">248.000</span>
                        <span class="label label-warning">-28%</span>
                    </div>
                </a>
            </div>

            <!-- Second Slide -->
            <div class="book-card">
                <a href="description.php?ID=ENT-2&category=new">
                    <div class="book-block">
                        <img class="block-center img-responsive" src="img/new/2.png" alt="Book 2">
                        <hr>
                        Tiếng Anh 3 - Global Success - Tập 1 - Sách Bài Học (2023) <br>
                        <span style="color:#FF0000;">62.000đ</span> &nbsp;
                        <span style="text-decoration:line-through;color:#828282;">120</span>
                        <span class="label label-warning">-43%</span>
                    </div>
                </a>
            </div>

            <!-- Third Slide -->
            <div class="book-card">
                <a href="description.php?ID=ENT-3&category=new">
                    <div class="book-block">
                        <img class="block-center img-responsive" src="img/new/3.png" alt="Book 3">
                        <hr>
                        Global Success - Tiếng Anh 11 - Student Book (2023) <br>
                        <span style="color:#FF0000;">58.000đ</span> &nbsp;
                        <span style="text-decoration:line-through;color:#828282;">59.000đ</span>
                        <span class="label label-warning">-1%</span>
                    </div>
                </a>
            </div>

            <!-- Fourth Slide -->
            <div class="book-card">
                <a href="description.php?ID=NEW-4&category=new">
                    <div class="book-block">
                        <img class="block-center img-responsive" src="img/new/4.png" alt="Book 4">
                        <hr>
                        Vở Bài Tập Tiếng Việt 5 - Tập 1 (Chân Trời) (Chuẩn) <br>
                        <span style="color:#FF0000;">17.000đ</span> &nbsp;
                        <span style="text-decoration:line-through;color:#828282;">18.000</span>
                        <span class="label label-warning">-1%</span>
                    </div>
                </a>
            </div>

            <!-- Fifth Slide -->
            <div class="book-card">
                <a href="description.php?ID=NEW-5&category=new">
                    <div class="book-block">
                        <img class="block-center img-responsive" src="img/new/5.png" alt="Book 5">
                        <hr>
                        Sách Luyện Thi Tiếng Anh 5 - Tập 1 (2023) <br>
                        <span style="color:#FF0000;">25.000đ</span> &nbsp;
                        <span style="text-decoration:line-through;color:#828282;">30.000đ</span>
                        <span class="label label-warning">-17%</span>
                    </div>
                </a>
            </div>
            <!-- Repeat for more book cards as needed -->
        </div>
        <button class="next" onclick="document.getElementById('slider').scrollLeft += 300;">&#10095;</button>
        <div style="text-align: center; margin-top: 20px;"></div>
    </div> <!-- End of slider-container -->
</div> <!-- End of slider-box -->
<div class="rating-box">
    <div class="rating-score">Đánh giá sản phẩm</div>
    <div class="star-rating">
        <div class="stars">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <div class="rating-value">0/5 (0 đánh giá)</div>
    </div>
</div>
<script>
const stars = document.querySelectorAll('.star');
const ratingValue = document.querySelector('.rating-value');
let selectedRating = 0; // To store the selected rating value

stars.forEach(star => {
    star.addEventListener('click', () => {
        // Get the value of the clicked star
        selectedRating = star.getAttribute('data-value');

        // Update the rating value displayed
        ratingValue.textContent = `${selectedRating}/5 (0 đánh giá)`; // Adjust this part later for actual reviews count

        // Remove the selected class from all stars
        stars.forEach(s => s.classList.remove('selected'));

        // Add selected class to the clicked star and all stars to the left
        stars.forEach((s, index) => {
            if (index < selectedRating) {
                s.classList.add('selected');
            }
        });
    });
});
</script>

<div class="comment-box">
    <h3>Để lại nhận xét</h3>
    <textarea id="commentInput" placeholder="Viết nhận xét của bạn tại đây..." rows="4"></textarea>
    <button id="submitComment">Gửi</button>
    
    <div id="commentsSection">
        <h4>Nhận xét:</h4>
        <div id="commentsList"></div>
    </div>
</div>
<script type="text/javascript">
const names = ["Duy", "Hai", "Donal Trump", "Putin", "Hilary Clinton", "JackMa", "Elon Musk", "Hannah"];

document.getElementById('submitComment').addEventListener('click', function() {
    const commentInput = document.getElementById('commentInput');
    const commentsList = document.getElementById('commentsList');
    const commentText = commentInput.value.trim();

    if (commentText && selectedRating > 0) {
        const randomName = names[Math.floor(Math.random() * names.length)];
        
        const commentDiv = document.createElement('div');
        commentDiv.classList.add('comment');

        // Create an icon div
        const iconDiv = document.createElement('div');
        iconDiv.classList.add('comment-icon');

        // Create an image element for the icon
        const iconImage = document.createElement('img');
        iconImage.src = 'img/person/user.png'; // Update this path to your image
        iconImage.alt = 'User Icon';
        iconImage.classList.add('user-icon');

        // Append the image to the icon div
        iconDiv.appendChild(iconImage);

        const textDiv = document.createElement('div');
        textDiv.classList.add('comment-text');
        textDiv.innerHTML = `<strong>${randomName}</strong>: ${commentText} <br /> <span class="star" style="font-size: 1.5em;">${'&#9733;'.repeat(selectedRating)}${'&#9734;'.repeat(5 - selectedRating)}</span>`;

        commentDiv.appendChild(iconDiv);
        commentDiv.appendChild(textDiv);
        commentsList.appendChild(commentDiv);
        commentInput.value = '';

        // Reset selected rating after submitting
        selectedRating = 0; 
        ratingValue.textContent = `0/5 (0 đánh giá)`;
        stars.forEach(s => s.classList.remove('selected'));
    } else {
        alert('Vui lòng để nhận xét và đánh giá trước khi gửi.');
    }
});
</script>



<footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>Liên hệ với chúng tôi!</h2>
                      <hr class="primary">
                      <!-- <p>Still Confused? Give us a call or send us an email and we will get back to you as soon as possible!</p> -->
                      <p>Phạm Minh Hải - 21103200113</p>
                      <p>Ngô Thế Duy - 21103200063</p>
                      <p>Nguyễn Đức Duy - 21103200064</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>123-456-6789</p>
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

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">
      <i class="fab fa-facebook-messenger"></i> <!-- Messenger icon -->
  </button>
  
  <!-- Modal -->
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
 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script>
            $(function () {
                var link = $('#buyLink').attr('href');
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                $('#quantity').on('change', function () {
                    $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                });
            });
    </script>

</body>
</html>       

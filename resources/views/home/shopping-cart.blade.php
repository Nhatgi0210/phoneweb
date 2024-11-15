<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!--  -->
    
    <style>
/* Cấu hình mặc định */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

/* Container giỏ hàng */
.cart-container {
    width: 80%;
    margin: 80px auto;
}

/* Các phần trong giỏ hàng */
.cart-part {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Căn đều các phần tử để tối ưu không gian */
    flex-wrap: nowrap; /* Ngăn các phần tử xuống dòng */
    gap: 10px; /* Thêm khoảng cách giữa các phần tử nếu cần */
}

.cart-img {
    width: 20%;
}

.cart-img img {
    width: 150px;
    height: 150px;
    object-fit: contain;
}

.cart-desc {
    font-size: 20px;
    text-align: center;
    flex: 1; /* Cho phép phần mô tả mở rộng chiếm không gian cần thiết */
    min-width: 150px; /* Đặt chiều rộng tối thiểu để ngăn bị ép quá nhỏ */
}

/* Giảm kích thước ô nhập */
.cart-quantity {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px; /* Thay đổi chiều rộng của phần tử nhập để nhỏ hơn */
    border-radius: 10px; /* Bo góc cho div */
    background-color: #f5f5f5; /* Nền sáng cho toàn bộ div */
    overflow: hidden; /* Đảm bảo không có phần tử nào bị nhô ra ngoài */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng bóng mờ nhẹ */
    padding: 5px; /* Khoảng cách trong div */
}

/* Giảm kích thước của ô input */
.cart-quantity input {
    width: 80%; /* Chiếm hết chiều rộng của div */
    padding: 5px; /* Giảm padding để ô nhỏ hơn */
    font-size: 16px; /* Giảm kích thước chữ */
    text-align: center;
    border: 1px solid #ccc; /* Viền mỏng, màu xám nhạt */
    border-radius: 5px; /* Bo góc cho ô nhập */
    outline: none;
    transition: background-color 0.3s ease, border-color 0.3s ease; /* Thêm hiệu ứng khi focus */
}

/* Thay đổi màu viền khi focus */
.cart-quantity input:focus {
    background-color: #e8f5fe; /* Nền sáng khi focus vào ô nhập */
    border-color: #3498db; /* Viền màu xanh khi focus */
}


/* Cột giá và tổng */
.cart-price,
.cart-total {
    text-align: center;
    width: 15%;
}

/* Nút xóa */
.cart-remove {
    width: 10%;
}

.remove-btn {
    background-color: transparent; /* Nền trong suốt ban đầu */
    border: 2px solid transparent; /* Viền trong suốt */
    color: #e74c3c; /* Màu đỏ cho icon */
    font-size: 24px; /* Tăng kích thước icon */
    padding: 8px 16px; /* Khoảng cách trong nút */
    border-radius: 5px; /* Bo tròn góc nút */
    cursor: pointer; /* Thay đổi con trỏ thành pointer khi hover */
    transition: all 0.3s ease; /* Tạo hiệu ứng chuyển mượt mà */
    border: 2px solid #c0392b; /* Viền đỏ đậm khi hover */
}

.remove-btn:hover {
    background-color: #e74c3c; /* Nền đỏ khi hover */
    color: white; /* Màu trắng cho icon khi hover */
}

.cart-summary {
    display: flex; /* Dùng flexbox để căn chỉnh */
    justify-content: space-between; /* Chia đều khoảng cách giữa các phần tử */
    align-items: center; /* Căn giữa theo chiều dọc */
    padding: 20px; /* Thêm khoảng cách trong container */
    background-color: rgba(123, 131, 126, 0.5); /* Nền xanh lá trong suốt (rgba: red, green, blue, alpha) */
    border-radius: 10px; /* Bo góc cho giỏ hàng */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ */
    margin-left: 0; /* Đặt lại về vị trí ban đầu */
    margin-right: 0; /* Đảm bảo giỏ hàng không bị lệch ra ngoài */
    width: 80%; /* Chiếm 80% chiều rộng của màn hình */
    max-width: 1000px; /* Tối đa không quá 1000px */
    margin: 0 auto; /* Canh giữa giỏ hàng */
    flex-wrap: wrap; /* Cho phép các phần tử con thu nhỏ lại khi cần */
}

.cart-summary .item {
    flex: 1 1 200px; /* Mỗi phần tử con có thể chiếm tối thiểu 200px */
    min-width: 150px; /* Đảm bảo phần tử con không thu nhỏ quá 150px */
    margin: 10px; /* Khoảng cách giữa các phần tử */
}

@media (max-width: 768px) {
    .cart-summary {
        flex-direction: column; /* Khi màn hình nhỏ, các phần tử con sẽ xếp theo cột */
        width: 100%; /* Khi thu nhỏ màn hình, giỏ hàng chiếm toàn bộ chiều rộng */
        margin-left: 0; /* Đảm bảo không có margin trái khi thu nhỏ */
    }
}



/* Căn chỉnh các nút ở cùng hàng */
.product-actions {
    display: flex;
    justify-content: left; /* Căn giữa hai nút */
    gap: 10px; /* Khoảng cách giữa các nút */
    width: 100%; /* Chiếm toàn bộ chiều rộng */
    margin-top: 10px; /* Khoảng cách với phần trên */
}

/* Style cho nút Checkout */
.checkout {
    background-color: #42b0f5; /* Màu nền xanh dương */
    color: white; /* Màu chữ trắng */
    padding: 8px 50px; /* Giảm chiều ngang padding */
    font-size: 14px; /* Kích thước chữ */
    border: none;
    border-radius: 25px; /* Bo góc cho nút */
    text-align: center;
    text-decoration: none; /* Bỏ gạch dưới */
    cursor: pointer;
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
    flex-grow: 0; /* Tắt tính năng mở rộng chiều rộng */
}

/* Hiệu ứng hover cho nút Checkout */
.checkout:hover {
    background-color: #75bef6; /* Màu nền thay đổi khi hover */
    transform: translateY(-8px); /* Hiệu ứng nâng nút lên khi hover */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Thêm bóng đổ khi hover */
    color: white;
}

/* Style cho nút Xóa hết */
.remove-all {
    background-color: #ea7c70; /* Màu nền đỏ */
    color: white; /* Màu chữ trắng */
    padding: 8px 50px; /* Giảm chiều ngang padding */
    font-size: 14px; /* Kích thước chữ */
    border: none;
    border-radius: 25px; /* Bo góc cho nút */
    cursor: pointer;
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
    flex-grow: 0; /* Tắt tính năng mở rộng chiều rộng */
}

/* Hiệu ứng hover cho nút Xóa hết */
.remove-all:hover {
    background-color: #f69f96; /* Màu nền thay đổi khi hover */
    /* transform: translateY(-8px); Hiệu ứng nâng nút lên khi hover */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Thêm bóng đổ khi hover */
    color: white;
}
#total {
    color: #14f579; /* Màu xanh dương cho số tiền để làm nổi bật */
    font-size: 30px; /* Kích thước chữ cho số tiền lớn hơn một chút */
    font-weight: bold;
}
.product-total h2 {
    margin-right: 10px; /* Đảm bảo khoảng cách hợp lý giữa chữ và số */
}
.product-total {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px; /* Kích thước chữ lớn hơn để nổi bật */
    font-weight: bold; /* Đậm chữ để gây chú ý */
    color: #333; /* Màu chữ tối, dễ đọc */
    padding: 10px 20px; /* Thêm padding để phần này không bị chật */
    background-color: #f8f8f8; /* Nền sáng để phần này nổi bật hơn */
    border-radius: 10px; /* Bo góc để mềm mại hơn */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ nhẹ */
}
.cart-price p,
.cart-price h4 {
    white-space: nowrap;
}
.cart-total p,
.cart-total h4 {
    white-space: nowrap;
}
.fa-check-circle {
    color: rgb(7, 242, 7); /* Màu xanh lá */
    font-size: 14px; /* Kích thước icon */
}
/* Nút xác nhận */
.cart-confirm {
    width: 10%; /* Điều chỉnh chiều rộng */
}

/* Nút xác nhận với biểu tượng */
.confirm-btn {
    background-color: transparent; /* Nền trong suốt ban đầu */
    border: 2px solid transparent; /* Viền trong suốt */
    color: #2ecc71; /* Màu xanh lá cho icon */
    font-size: 24px; /* Tăng kích thước icon */
    padding: 8px 16px; /* Khoảng cách trong nút */
    border-radius: 5px; /* Bo tròn góc nút */
    cursor: pointer; /* Thay đổi con trỏ thành pointer khi hover */
    transition: all 0.3s ease; /* Tạo hiệu ứng chuyển mượt mà */
    border: 2px solid #27ae60; /* Viền xanh đậm khi hover */
}

/* Hiệu ứng hover cho nút xác nhận */
.confirm-btn:hover {
    background-color: #2ecc71; /* Nền xanh khi hover */
    color: white; /* Màu trắng cho icon khi hover */
}



    </style>
   
</head>

<body style=" max-width: 100vw; /* Giới hạn chiều rộng tối đa của trang */
overflow-x: hidden; /* Ẩn thanh cuộn ngang nếu có */
margin: 0 auto;">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class=""></i></small>
                <small class="ms-4"><i class=""></i></small>
            </div>
            <div class="col-lg-6 px-5 text-end" style="color: rgb(21, 20, 20) !important;">
                <small style="color: rgb(24, 24, 25) !important;">Follow us:</small>
                <a class="text-body ms-3" href="" style="color: rgb(8, 8, 8) !important;"><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href="" style="color: rgb(16, 16, 16) !important;"><i class="fab fa-instagram"></i></a>
            </div>
            
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" >
            <div style="display: flex;">
                 <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <svg width="100" height="100" viewBox="0 0 100 100">
                    <!-- Định nghĩa vùng cắt hình tròn -->
                    <defs>
                        <clipPath id="circleClip">
                            <!-- Hình tròn với bán kính 50 để phù hợp với kích thước SVG -->
                            <circle cx="50" cy="50" r="50" />
                        </clipPath>
                    </defs>
                  
                    <!-- Ảnh được cắt và tự động co giãn trong hình tròn -->
                    <image href="img/caheo.png" width="100" height="100" clip-path="url(#circleClip)" preserveAspectRatio="xMidYMid meet" />
                    
                </svg>
               
            </a>
            </div>
           
            
              
              
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Điện thoại</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Samsung</a>
                            <a href="feature.html" class="dropdown-item">iPhone</a>
                            <a href="testimonial.html" class="dropdown-item">Oppo</a>
                            <a href="404.html" class="dropdown-item">Xiaomi</a>
                        </div>
                    </div>
                    <a href="about.html" class="nav-item nav-link">So sánh</a>
                    <a href="product.html" class="nav-item nav-link">Giỏ hàng</a>
                   
                    <a href="contact.html" class="nav-item nav-link">Tài khoản</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

<!-- div trống -->
<div style="height: 180px;"></div>

<!-- div trống -->




<!-- giỏ hàng -->

<div class="container">
   

    <!-- test1 -->
    <table style="width: 100%; border-collapse: collapse;">
        <!-- <thead>
            <tr>
                <th style="padding: 8px; ">Cột 1</th>
                <th style="padding: 8px; ">Cột 2</th>
                <th style="padding: 8px; ">Cột 3</th>
                <th style="padding: 8px; ">Cột 4</th>
                <th style="padding: 8px; ">Cột 5</th>
                <th style="padding: 8px; ">Cột 6</th>
            </tr>
        </thead> -->
        <tbody>
            <tr>
               <!-- Sản phẩm 1 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- Hết sản phẩm 1 -->
 
<!-- sản phâmr 2 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/13prm.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3> iPhone 13 Pro Max</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- hết sp2 -->

<!-- sản phẩm 3 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- hết sản phẩm 3 -->

<!-- spham4 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>

   
</tr>
<!-- hép spham 4 -->
         <hr>
        </tbody>
    </table>
    
    <!-- endtesst1 -->
    

    
     
    <div class="cart-summary">
        <div class="product-total">
            <h2>Tổng tiền (VNĐ) : <span id="total">39.980.000.000 </span></h2>
        </div>
        <div class="product-actions">
            <a href="#" class="checkout">Checkout</a>
            <button class="remove-all">Xóa hết</button>
        </div>
    </div>
    
    
    
    
    
</div>



<!-- hết phần giỏ hàng -->






<div style="height: 200px;">

</div>








 <!-- Footer Start -->
  <footer class="footer">
 <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
                <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- Footer End -->
  


    


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        document.querySelector('.confirm-btn').addEventListener('click', function() {
            // Logic xử lý xác nhận ở đây
            alert('Đã xác nhận!');
        });
    </script>
    
    <script>
  window.addEventListener('scroll', function() {
    const cartSummary = document.querySelector('.cart-summary');
    const footer = document.querySelector('footer');

    // Lấy vị trí của footer và của cart-summary
    const footerTop = footer.getBoundingClientRect().top;
    const cartSummaryHeight = cartSummary.offsetHeight;
    const windowHeight = window.innerHeight;

    if (footerTop < windowHeight) {
        // Khi footer xuất hiện trong vùng hiển thị, đặt cart-summary ở trên footer
        cartSummary.style.position = 'absolute';
        cartSummary.style.bottom = 'auto';
        cartSummary.style.top = `${footer.offsetTop - cartSummaryHeight - 20}px`; // 20px để tạo khoảng cách
    } else {
        // Khi chưa chạm tới footer, giữ cart-summary cố định ở dưới cùng
        cartSummary.style.position = 'fixed';
        cartSummary.style.bottom = '20px';
        cartSummary.style.top = 'auto';
    }
});

    </script>
    </body>
    </html>
    
</body>

</html>
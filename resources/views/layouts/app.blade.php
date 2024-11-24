<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMART PHONE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')  }}" rel="stylesheet">
    <!--  -->
    @yield('css')
    {{-- css của inforProduct --}}
    @yield('cssin4')
    <style>
        @keyframes slideIn {
    from {
        transform: translateX(100%); /* Bắt đầu từ bên phải ngoài màn hình */
        opacity: 0;
    }
    to {
        transform: translateX(0); /* Đưa vào vị trí ban đầu */
        opacity: 1;
    }
}
@keyframes slideOut {
    from {
        transform: translateX(0); /* Đang ở trong màn hình */
        opacity: 1;
    }
    to {
        transform: translateX(100%); /* Di chuyển ra ngoài màn hình */
        opacity: 0;
    }
}
        #userMenu {
    position: absolute;
    top: 20%; /* Đặt menu cách avatar 50px */
    right: 0;
    background-color: #fff;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    display: none;
    opacity: 0;
    z-index: 100;
    transform: translateX(80%); /* Bắt đầu ở ngoài màn hình */
}


#userMenu.show {
    display: block;
    opacity: 1; /* Khi hiển thị, opacity = 1 */
    transform: translateY(0); /* Vị trí ban đầu khi hiển thị */
}

#userMenu ul {
    list-style: none;
    padding: 10px;
    margin: 0;
    
}

#userMenu ul li {
    padding: 15px;
    border-bottom: 1px solid #eee;
    font-size: 14px; 
}

#userMenu ul li:hover {
    background-color: #f7f7f7;
}

#userMenu ul li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
}

#userMenu ul li a .icon {
    margin-right: 10px;
}

#userMenu .profile {
    text-align: center;
    padding: 20px;
    /* background-color: #007BFF; màu nen cho userr */ 
    background-image: url('img/dammay.png');
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#userMenu .profile img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

#userMenu .profile .name {
    font-size: 20px;
    font-weight: bold;
}

#userMenu .profile .email {
    font-size: 14px;
    color: #ddd;
}
    </style>
   
   
</head>

<body>
    <!-- Navbar Start -->
        @include('layouts.nav')
    <!-- Navbar End -->
    <div class="space" style="margin-top: 180px"></div>

    {{-- sosanh --}}
    @yield('sosanh') 

{{-- in4 product --}}
@yield('thongtin')

{{-- gio hàng --}}
@yield('giohang')


    @yield('main_content')

   @include('layouts.secondary_content')
 
{{-- menu profile --}}

{{-- endmenu profile --}}

    <!-- Footer Start -->
        @include('layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
{{-- menu logout --}}
{{-- <div class="user-menu" id="userMenu">
    <div class="profile">
        <img src="{{ asset('img/gai.jpg') }}" alt="Profile Picture" style="object-fit: cover;">
        <div class="name">Nguyễn Văn A</div>
        <div class="email"> <p style="color: #8d8a7f;">NguyenVanA@gmail.com</p></div>
    </div>
    <ul>
        <li><a href="#"><i class="fas fa-user icon"></i>Xem thông tin</a></li>
        <li><a href="#"><i class="fas fa-exchange-alt icon"></i>Chuyển đổi tài khoản</a></li>
        <li><a href="#"><i class="fas fa-file-invoice icon"></i>Đơn hàng</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt icon"></i>Đăng xuất</a></li>
    </ul>
</div> --}}
{{-- endmenu logout --}}

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        document.querySelectorAll('.formatted-number').forEach(function(element) {
            let number = parseInt(element.textContent, 10); 
            element.textContent = number.toLocaleString('vi-VN'); 
        });
    </script>
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
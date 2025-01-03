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
   
    {{-- css giỏ hàng --}}
    @yield('cssgiohang')
  

</head>

<body>
    <!-- Navbar Start -->
        @include('layouts.nav')
    <!-- Navbar End -->
   

   



{{-- gio hàng --}}
@yield('giohang')


   


 


    <!-- Footer Start -->
        @include('layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


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
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('#myButton');
    console.log(button);  // Kiểm tra xem button có tồn tại không
    if (button) {
        button.addEventListener('click', function() {
            alert('Button clicked');
        });
    } else {
        console.warn('Button not found');
    }
});


</script>

</body>

</html>
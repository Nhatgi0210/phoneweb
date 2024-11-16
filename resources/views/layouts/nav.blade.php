 <!-- Navbar Start -->
 <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class=""></i></small>
            <small class="ms-4"><i class=""></i></small>
        </div>
        <div class="col-lg-6 px-5 text-end" style="color: white !important;">
            <small style="color: rgb(246, 248, 250) !important;">Follow us:</small>
            <a class="text-body ms-3" href="" style="color: white !important;"><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href="" style="color: white !important;"><i class="fab fa-instagram"></i></a>
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
                <image href="{{ asset('frontend/img/caheo.png') }}" width="100" height="100" clip-path="url(#circleClip)" preserveAspectRatio="xMidYMid meet" />
                
            </svg>
           
        </a>
        </div>
       
        
          
          
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link">Trang chủ</a>
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Điện thoại</a>
                    <div class="dropdown-menu m-0">
                    @foreach ($brands as $brand)
                        <a href="#" class="dropdown-item">{{ $brand->name }}</a>
                    @endforeach
                        
                        
                    </div>
                </div>
                <a href="{{ route('sosanh') }}" class="nav-item nav-link">So sánh</a>
                <a href="product.html" class="nav-item nav-link">Giỏ hàng</a>
               
                <a href="dangkidangnhap.html" class="nav-item nav-link">Tài khoản</a>
                <a href="#" onclick="return false;">
                    <input type="text" placeholder="Tìm kiếm" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px; background-color: transparent; color: #333;">
                </a>
                
            </div>
            <div class="d-none d-lg-flex ms-2">
            
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
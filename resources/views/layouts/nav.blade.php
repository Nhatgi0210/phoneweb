 <!-- Navbar Start -->

 @php
                if (auth()->check()) {
                    $link = "#";
                    $username = auth()->user()->name;
                }
                else{
                    $link = route('login');
                    $username = "Chưa đăng nhập";
                }
@endphp

 <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class=""></i></small>
            <small class="ms-4"><i class=""></i></small>
        </div>
        <div class="col-lg-6 px-5 text-end" style="color: white !important;">
            <small style="color: rgb(15, 129, 243) !important;">Follow us:</small>
            <a class="text-body ms-3" href="" style="color: rgb(48, 122, 241) !important;"><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href="" style="color: rgb(245, 122, 200) !important;"><i class="fab fa-instagram"></i></a>
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
                        <a href="{{ url('/products/') }}" class="dropdown-item">Tất cả</a>
                    @foreach ($brands as $brand)
                        <a href="{{ url('/brands/' . $brand->name) }}" class="dropdown-item">{{ $brand->name }}</a>
                    @endforeach
                        
                        
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Phụ kiện</a>
                    <div class="dropdown-menu m-0">
                       
                    @foreach ($categories as $category)
                        <a href="{{ url('/categories/' . $category->name) }}" class="dropdown-item">{{ $category->name }}</a>
                    @endforeach
                        
                        
                    </div>
                </div>
                <a href="{{ route('sosanh') }}" class="nav-item nav-link">So sánh</a>
                {{-- <a href="{{ route('profile') }}" class="nav-item nav-link">xem thông tin</a> --}}
                <a href="{{ route('shopping_cart') }}" class="nav-item nav-link">Giỏ hàng</a>
               
                <a href="{{ route('login') }}" class="nav-item nav-link">Tài khoản</a>

                <form action="{{ route('showsearch') }}" method="GET" id="search-form">
                    <input type="text" id="search-boxa" name="phonea" placeholder="Tìm kiếm" 
                           style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px; background-color: transparent; color: #333;">
                    <input type="submit" value="🔍" style="background: none; border: none; cursor: pointer; font-size: 20px; color: #78c0ed;">
                    <ul id="suggestion-list12" class="suggestion-list"></ul>
                </form>
                
                
                
                
            </div>
            
            
            <div class="d-none d-lg-flex ms-2">
                {{-- {{ route('register') }} --}}
                <a class="btn-sm-square bg-white rounded-circle ms-3"id="menuu" href="{{ $link }}">
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



<div class="user-menu" id="userMenu">
   
    <ul style="color: #333;">
        {{-- <li><a href="{{ route('sosanh') }}"><i class="fas fa-user icon"></i>Xem thông tin</a></li> --}}
        {{-- <li><a href="#"><i class="fas fa-exchange-alt icon"></i>Chuyển đổi tài khoản</a></li> --}}
        <a href="{{ route('profile') }}"> <li><i class="fas fa-user icon"></i>&nbsp;&nbsp;&nbsp;Xem thông tin</li> </a>
        <a href=""> <li><i class="fas fa-exchange-alt icon"></i>&nbsp;&nbsp;&nbsp;Chuyển đổi tài khoản</li></a>
      
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <li><i class="fas fa-sign-out-alt icon"></i>&nbsp;&nbsp;&nbsp;Đăng xuất</li>
        </a>
        
    </ul>
</div>


<script>
document.getElementById('menuu').addEventListener('click', function (event) {
    const userMenu = document.getElementById('userMenu');
    
    // Ngừng sự kiện click để tránh ảnh hưởng đến liên kết trong menu
    event.stopPropagation(); 

    // Nếu menu đang hiển thị, thu vào
    if (userMenu.style.display === 'block') {
        userMenu.style.animation = 'slideOut 0.3s forwards';
        setTimeout(() => {
            userMenu.style.display = 'none';
        }, 300);
    } else {
        userMenu.style.display = 'block';
        userMenu.style.animation = 'slideIn 0.3s forwards';
    }
});

// Đảm bảo menu đóng lại khi click bên ngoài
window.addEventListener('click', function (event) {
    const userMenu = document.getElementById('userMenu');
    if (!userMenu.contains(event.target) && !document.getElementById('menuu').contains(event.target)) {
        userMenu.style.animation = 'slideOut 0.3s forwards';
        setTimeout(() => {
            userMenu.style.display = 'none';
        }, 300);
    }
});

</script>
<script>
    function handleSearch(searchBoxId, suggestionListId) {
        const routeUrl = "{{ route('search.products') }}";
        const searchBox = document.getElementById(searchBoxId);
        const suggestionList = document.getElementById(suggestionListId);
        searchBox.addEventListener('input', function () {
            const keyword = searchBox.value.trim();

        
            if (keyword.length > 2) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `${routeUrl}?keyword=${encodeURIComponent(keyword)}`, true);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        const data = xhr.responseText;  
                        suggestionList.innerHTML = data;  

                        // Đảm bảo rằng các sự kiện click vào gợi ý được xử lý
                        document.querySelectorAll('.suggestion-item').forEach(item => {
                            item.addEventListener('click', function () {
                                searchBox.value = this.textContent;
                                suggestionList.innerHTML = ''; // Xóa danh sách gợi ý
                            });
                        });
                    }
                };

                xhr.send();
            } else {
                suggestionList.innerHTML = ''; // Xóa danh sách gợi ý nếu từ khóa quá ngắn
            }
        });
    }
    handleSearch('search-boxa','suggestion-list12');
   
</script>


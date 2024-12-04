<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
}

body {
    display: flex;
    height: 100vh;
    overflow: hidden;
    background-color: #f4f6f9;
}

.container {
    display: flex;
    width: 100%;
}
.table-custom select {
    width: 100%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
}

.sidebar {
    width: 250px;
    background-color: #73a9df;
    color: white;
    padding: 20px;
    transition: width 0.3s;
    position: relative;
    display: flex;
    flex-direction: column;
    border-radius: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.5em;
}

.sidebar ul {
    list-style: none;
}

.sidebar ul li {
    padding: 15px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar ul li:hover {
    background-color: #1abc9c;
}

.sidebar .menu-title,
.sidebar .menu-list {
    display: block;
}

.sidebar.collapsed {
    width: 60px;
    padding: 10px;
}

.sidebar.collapsed .menu-title,
.sidebar.collapsed .menu-list {
    display: none;
}

.toggle-btn {
    background-color: #1abc9c;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    position: absolute;
    top: 10px;
    left: 10px;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s;
}

.toggle-btn:hover {
    background-color: #16a085;
}

.main-content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    transition: margin-left 0.3s;
    margin-left: 1px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.search-bar {
    padding: 10px;
    width: 250px;
    border: 1px solid #bdc3c7;
    border-radius: 5px;
}

.icons {
    display: flex;
    align-items: center;
}

.icons span {
    margin-left: 15px;
    font-size: 24px;
    cursor: pointer;
    transition: color 0.3s;
}

.icons span:hover {
    color: #1abc9c;
}

.metrics {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.widget {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    flex: 1;
    text-align: center;
    transition: transform 0.2s;
}

.widget:hover {
    transform: translateY(-5px);
}

.data-table {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ecf0f1;
    text-align: left;
}

th {
    background-color: #ecf0f1;
    color: #34495e;
    font-weight: bold;
}

td {
    color: #7f8c8d;
}

/* User menu styles */
/* User menu styles */
#userMenu {
    position: absolute;
    top: 30px; /* Đặt menu cách avatar 50px */
    right: 0;
    background-color: #fff;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    display: none;
    opacity: 0;
    z-index: 100;
    transform: translateX(100%); /* Bắt đầu ở ngoài màn hình */
}


#userMenu.show {
    display: block;
    opacity: 1; /* Khi hiển thị, opacity = 1 */
    transform: translateY(0); /* Vị trí ban đầu khi hiển thị */
}

#userMenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#userMenu ul li {
    padding: 15px;
    border-bottom: 1px solid #eee;
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


/* Media Queries for responsive design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .main-content {
        padding: 10px;
    }

    .search-bar {
        width: 200px;
    }

    .metrics {
        flex-direction: column;
    }

    .widget {
        flex: 1 1 100%;
        margin-bottom: 20px;
    }

    .sidebar.collapsed {
        width: 60px;
    }
}

@media (max-width: 480px) {
    .toggle-btn {
        font-size: 16px;
    }

    .sidebar {
        width: 150px;
    }

    .main-content {
        padding: 5px;
    }

    .sidebar.collapsed {
        width: 60px;
    }
}
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
.user-avatar {
    width: 40px;  /* Đặt kích thước ảnh */
    height: 40px; /* Đặt kích thước ảnh */
    border-radius: 50%;  /* Tạo ảnh hình tròn */
    object-fit: cover;  /* Cắt ảnh cho phù hợp */
    cursor: pointer;  /* Đổi con trỏ khi hover vào ảnh */
    transition: transform 0.3s ease;  /* Thêm hiệu ứng khi hover */
}

.user-avatar:hover {
    transform: scale(1.1);  /* Phóng to ảnh một chút khi hover */
}
/* Container để chứa các widget */
.metrics {
    display: flex;                     /* Sử dụng Flexbox để căn chỉnh các phần tử con */
    justify-content: space-around;     /* Căn đều các widget trên trục ngang */
    margin-bottom: 20px;               /* Khoảng cách dưới cùng của container */
}

/* Style chung cho tất cả các widget */
.widget {
    padding: 20px;                     /* Khoảng cách bên trong widget */
    border-radius: 8px;                /* Bo góc cho widget */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Hiệu ứng bóng cho widget */
    background: #fff;                  /* Màu nền trắng */
    text-align: center;                /* Căn giữa nội dung trong widget */
    font-size: 16px;                   /* Kích thước font chữ */
    font-weight: bold;                 /* Đậm font chữ */
    color: #333;                       /* Màu chữ */
}

/* Widget loại AA */
.widget-aa {
    background-color: #f8d7da;         /* Màu nền cho widget loại AA */
    color: #721c24;                    /* Màu chữ cho widget loại AA */
}

/* Widget loại BB */
.widget-bb {
    background-color: #d4edda;         /* Màu nền cho widget loại BB */
    color: #155724;                    /* Màu chữ cho widget loại BB */
}

/* Widget loại CC */
.widget-cc {
    background-color: #d1ecf1;         /* Màu nền cho widget loại CC */
    color: #0c5460;                    /* Màu chữ cho widget loại CC */
}

.search-container {
    display: flex;
    align-items: center;
    border: 1px solid #bdc3c7;
    border-radius: 30px; /* Bo tròn viền */
    overflow: hidden; /* Đảm bảo không có phần tử nào tràn ra ngoài */
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 300px; /* Độ rộng tổng thể */
}

.search-bar {
    flex: 1; /* Để ô input chiếm toàn bộ không gian còn lại */
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    outline: none; /* Bỏ viền xanh khi nhấn vào */
    border-radius: 0; /* Bỏ bo góc riêng lẻ (phụ thuộc vào parent) */
}

.search-btn {
    background-color: #1abc9c; /* Màu nền nút */
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 0; /* Bỏ bo góc */
}

.search-btn:hover {
    background-color: #16a085; /* Màu nền khi hover */
}

.search-btn i {
    margin: 0;
    font-size: 16px; /* Kích thước icon */
}

.widget2 {
            width: 100%;
            max-width: 600px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .widget2 h2 {
            margin: 0 0 20px;
        }
        .chart-container {
            position: relative;
            width: 100%;
        }
        .legend {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .legend div {
            display: flex;
            align-items: center;
        }
        .legend span {
            width: 10px;
            height: 10px;
            display: inline-block;
            margin-right: 5px;
        }
        .btn-view {
    background-color: #5bc0de;
    color: white;
}

.btn-edit {
    background-color: #f0ad4e;
    color: white;
}

.btn-delete {
    background-color: #d9534f;
    color: white;
}

  @yield('cssthongtincanhan');
  @yield('cssmanageproduct');
  @yield('cssmanageuser');
  @yield('csseditproduct');
  @yield('cssaddproduct');
  @yield('cssadminduyet');

    </style>
</head>
<body>
 
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="toggle-btn">☰</button>
            <h2 class="menu-title">Menu</h2>
            <ul class="menu-list">
                <a href="{{ route('profile') }}" style="text-decoration: none; color: inherit;">
                    <li><i class="fas fa-user"></i> Xem thông tin cá nhân</li>
                </a>
        
                @if(auth()->user()->position_id == 3) 
                    <!-- Nhân viên và Admin -->
                    <a href="{{ route('admin') }}" style="text-decoration: none; color: inherit;">
                        <li><i class="fas fa-tachometer-alt"></i> Bảng theo dõi</li>
                    </a>
                @endif
        
                @if(auth()->user()->position_id == 3) 
                    <!-- Chỉ Admin -->
                    <a href="{{ route('adminthongtin') }}" style="text-decoration: none; color: inherit;">
                        <li><i class="fas fa-users"></i> Quản lý người dùng</li>
                    </a>
                @endif
        
                @if(auth()->user()->position_id == 2 || auth()->user()->position_id == 3) 
                    <!-- Nhân viên và Admin -->
                    <a href="{{ route('admin_manage_product') }}" style="text-decoration: none; color: inherit;">
                        <li><i class="fas fa-chart-line"></i> Quản lý sản phẩm</li>
                    </a>
                    <a href="{{ route('admin_duyet') }}" style="text-decoration: none; color: inherit;">
                        <li><i class="fas fa-chart-line"></i> Quản lý đơn hàng</li>
                    </a>
                @else

                <a href="{{ route('address') }}" style="text-decoration: none; color: inherit;">
                    <li><i class="fas fa-home"></i> Thông tin giao hàng</li>
                </a>
                <a href="{{ route('donhang') }}" style="text-decoration: none; color: inherit;">
                    <li><i class="fas fa-home"></i> Thông tin đơn hàng</li>
                </a>
                @endif
                <!-- Ai cũng thấy -->
              
                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
                    <li><i class="fas fa-home"></i> Về trang chủ</li>
                </a>
        
                <!-- Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <li><i class="fas fa-sign-out-alt"></i> Đăng xuất</li>
                </a>
            </ul>
        </div>
        
        
        <!-- Main content -->
        <div class="main-content">
            <div class="header">
                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Search...">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
                <div></div>
                
                <div class="icons">
                    <span class="notification-bell">🔔</span>
                    <!-- User avatar icon -->
                    <span class="user-profile" id="userAvatar"><div class="icons">
                        <img id="userAvatar" src="{{ asset('img/user.png') }}" alt="User Avatar" class="user-avatar">
                    </div>
                    </span>
                </div>
            </div>
            
           @yield('thongtincanhan') 
           @yield('admin')
           @yield('manageproduct')
           @yield('manageuser')
           @yield('editproduct')
           @yield('addproduct')
           @yield('admin_duyet');
        </div>
    </div>

    <!-- User Profile Menu -->
    <div class="user-menu" id="userMenu">
        <div class="profile">
            <img src="{{ asset('img/user.png') }}" alt="Profile Picture" style="object-fit: cover;">
            <div class="name">{{ $user->name }}</div>
        <div class="email"> <p style="color: #f3efe2;">{{ $user->email }}</p></div>
        </div>
        <ul>
            <li><a href="#"><i class="fas fa-user icon"></i>Xem thông tin</a></li>
          
            <li><a href="#"><i class="fas fa-file-invoice icon"></i>Đơn hàng</a></li>
            <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                <li><i class="fas fa-sign-out-alt"></i> Đăng xuất</li>
            </a>
        </ul>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar
    document.querySelector('.toggle-btn').addEventListener('click', function () {
        document.querySelector('.sidebar').classList.toggle('collapsed');
        document.querySelector('.main-content').style.marginLeft = document.querySelector('.sidebar').classList.contains('collapsed') ? '10px' : '30px';
    });

    // Show/Hide user menu when clicking on user avatar
    document.getElementById('userAvatar').addEventListener('click', function () {
        const userMenu = document.getElementById('userMenu');
        
        // Nếu menu đang hiển thị, thu vào
        if (userMenu.style.display === 'block') {
            userMenu.style.animation = 'slideOut 0.3s forwards'; // Hiệu ứng thu vào
            setTimeout(() => {
                userMenu.style.display = 'none';
            }, 300);
        } 
        // Nếu menu không hiển thị, thu vào
        else {
            userMenu.style.display = 'block';
            userMenu.style.animation = 'slideIn 0.3s forwards'; // Hiệu ứng thu vào
        }
    });

    // Close user menu if clicked outside
    window.addEventListener('click', function (event) {
        const userMenu = document.getElementById('userMenu');
        if (!userMenu.contains(event.target) && !document.getElementById('userAvatar').contains(event.target)) {
            userMenu.style.animation = 'slideOut 0.3s forwards'; // Thu vào menu khi click ra ngoài
            setTimeout(() => {
                userMenu.style.display = 'none';
            }, 300);
        }
    });
});



    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
     <script>
         var ctx = document.getElementById('myChart').getContext('2d');
         var myChart = new Chart(ctx, {
             type: 'doughnut',
             data: {
                 labels: ['Khách hàng 25-40 tuổi', 'Khách hàng trẻ dưới 25 tuổi', 'Khách hàng trên 60 tuổi', 'Khách hàng 40-60 tuổi'],
                 datasets: [{
                     data: [38, 22, 12, 28],
                     backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                     borderWidth: 2,
                     borderColor: '#fff',
                     hoverBorderWidth: 3
                 }]
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: true,
                 legend: {
                     display: false
                 },
                 cutoutPercentage: 70,
                 elements: {
                     arc: {
                         roundedCornersFor: 3
                     }
                 },
                 tooltips: {
                     callbacks: {
                         label: function(tooltipItem, data) {
                             var label = data.labels[tooltipItem.index] || '';
                             if (label) {
                                 label += ': ';
                             }
                             label += Math.round(data.datasets[0].data[tooltipItem.index]) + '%';
                             return label;
                         }
                     }
                 }
             }
         });
     </script>
     <script>
        
        document.getElementById('province').addEventListener('change', function() {
          
             const provinceCode = this.value;
             const districtSelect = document.getElementById('district');
            
            
             if (!provinceCode) {
                 districtSelect.innerHTML = '<option value="">Chọn quận, huyện</option>';
                 return;
             }
    
            
             const xhr = new XMLHttpRequest();
             xhr.open('post', "{{ route('district') }}", true);
             xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
             xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

             xhr.onreadystatechange = function() {
                 if (xhr.readyState === 4 ) {
                    // alert(xhr.responseText);
                     const districts = JSON.parse(xhr.responseText);

                   
                     let options = '<option value="">Chọn quận, huyện</option>';
                     
                     districts.forEach(function(district) {
                       
                         options += `<option value="${district.code}">${district.full_name}</option>`;
                      
                     });
                
                     districtSelect.innerHTML = options;
                 } else if (xhr.readyState === 4) {
                     alert('Đã xảy ra lỗi khi tải danh sách huyện!');
                 }
             };
             xhr.send(JSON.stringify({ code: provinceCode }));
    
        });
        //lay xa phuong
    document.getElementById('district').addEventListener('change', function() {
          
          const districtCode = this.value;
          const wardSelect = document.getElementById('ward');
         
         
          if (!districtCode) {
              wardSelect.innerHTML = '<option value="">Chọn quận, huyện</option>';
              return;
          }
 
         
          const xhr = new XMLHttpRequest();
          xhr.open('post', "{{ route('ward') }}", true);
          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

          xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 ) {
                 // alert(xhr.responseText);
                  const wards = JSON.parse(xhr.responseText);

                
                  let options = '<option value="">Chọn Phường, xã</option>';
                  
                  wards.forEach(function(ward) {
                    
                      options += `<option value="${ward.code}">${ward.full_name}</option>`;
                   
                  });
             
                  wardSelect.innerHTML = options;
              } else if (xhr.readyState === 4) {
                  alert('Đã xảy ra lỗi khi tải danh sách huyện!');
              }
          };
          xhr.send(JSON.stringify({ code: districtCode }));
 
     });
    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');
    const addressvl = document.getElementById('address');
    
     document.getElementById('road').addEventListener('change', function() {
        

        const province = provinceSelect.options[provinceSelect.selectedIndex].text;
        const district = districtSelect.options[districtSelect.selectedIndex].text;
        const ward = wardSelect.options[wardSelect.selectedIndex].text;
        const road = this.value;
        // Ghép các thông tin và gán vào ô input
        const address = [road,province, district, ward]
            .filter(item => item)  // Lọc các giá trị không trống
            .join(', ');  // Ghép các thông tin bằng dấu phẩy

        addressvl.value = address;  // Cập nhật giá trị cho input
    });     
    </script> 

</body>
</html>
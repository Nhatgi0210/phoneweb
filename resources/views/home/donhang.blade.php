@extends('layouts.appadmin')
@section('thongtincanhan')
<div class="container2">
    {{-- <!-- Left section: Service Info -->
    <div class="service-info">
        <img src="{{ asset('img/user.png') }}" alt="Profile Picture" class="profile-picture">
        <h3>{{ old('name', $user->name) }}  </h3>
         <p>Tham gia ngày : <strong>10/10/2024</strong></p>

    </div> --}}

    <!-- Right section: Personal Information -->
    <div class="personal-info">
        
        @foreach ($orders as $order)
            
        <h2>Thông tin đơn hàng</h2>
        <div class="invoice-box">
            
            {{-- <h3 style="color: rgb(29, 146, 223);">CHỜ DUYỆT</h3> --}}
            @switch($order->status)
             
                @case('pending')
                    <h3 style="color: rgb(255, 238, 0);"> Chờ duyệt </h3>
                    @break
                @case('approved')
                    <h3 style="color: rgb(0, 255, 106);"> Đã duyệt </h3>
                    @break
                   
                @case('rejected')
                    <h3 style="color: rgb(236, 70, 70);"> Không duyệt </h3>
                    @break
               
            @endswitch
            <table cellpadding="0" cellspacing="0" id="hoadon-js">
                <tr class="top">
                    <td colspan="3">
                        <table>
                            <tr>
                                <td>
                                    Ngày Tạo: <strong>{{ date('d-m-20y') }}</strong>
                                </td>
                                <td>
                                    
                                    {{-- <span>Địa chỉ giao hàng:</span> {{ session('address', auth()->user()->address) }}<br> --}}
                                    <span>Tên khách hàng:</span> <b>{{ auth()->user()->name }}</b><br>
                                    <span>Số điện thoại:</span> <b>{{ $order->phone }}</b><br>
                                    <span>Địa chỉ giao hàng:</span> <b>{{ $order->address }}</b><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Sản phẩm
                    </td>
                    <td>
                        Giá
                    </td>
                    {{-- <td style="text-align: right">
                        Giá
                    </td> --}}
                </tr>
                @php
                    $price = 0;
                @endphp
                @foreach($orderItems->where('order_id', $order->id) as $orderItem)
                <tr class="item">
                    <td>
                        <b>{{ $orderItem->product->name }}</b> <p>(số lượng:{{ $orderItem->quantity }})</p>
                    </td>
                    <td class="formatted-number reformat">
                        <b>{{ $orderItem->price }}</b>
                        
                    </td>
                    {{-- <td class="formatted-number reformat" style="text-align: right; font-weight: 700;">
                        <b>{{ $orderItem->price }}</b>
                    </td> --}}
                </tr>
               
                @endforeach
    
                <tr class="item">
                    <td>
                        <b>Tổng tiền hàng:</b>
                    </td>
                    <td colspan="2">
                        <b id="total-price" class="formatted-number reformat">{{ $order->total_price }}</b>
                    </td>
                </tr>
                <tr class="item">
                    <td>
                       <b>Phí vận chuyển</b>
                    </td>
                    <td colspan="2">
                        <b>50.000 VND</b>
                    </td>
                </tr>
                <tr class="item">
                    <td>
                         <b>Giảm giá (Voucher) </b>
                    </td>
                    <td colspan="2">
                        <b>-1.000.000 VND</b>
                    </td>
                </tr>
                <tr class="total">
                    <td><b> Tổng cộng: </b></td>
                    <td colspan="2" style="color: rgb(3, 202, 70); font-size: 20px; font-weight: 600">
                       <span class="formatted-number total-js reformat">{{ $total = ($order->total_price - 1000000 + 50000) < 0 ? 0 : ($order->total_price - 1000000 - 50000) }}</span> VND
                    </td>
                    {{-- <input type="hidden" name > --}}
                </tr>
            </table>
        </div>
 <br>
        ---------------------------------------------------------
            <br>
        @endforeach   
      
    </div>
</div>
@endsection



@section('cssthongtincanhan')

.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 250px;
    background-color: #21a5bc;
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
    width: 40px;
}

.toggle-btn:hover {
    background-color: #16a085;
}

.main-content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    transition: margin-left 0.3s;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
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
    top: 8%; /* Đặt menu cách avatar 50px */
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
    background-color: #007BFF;
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


/* Media Queries for responsive design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
        border-radius: 20px;
    }

    .main-content {
        padding: 10px;
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
/* them */
.container2
 {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    flex-wrap: wrap; /* Để các phần tử tự xuống dòng trên màn hình nhỏ */
}

.personal-info, .service-info {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 100%; /* Định dạng 2 phần tử song song */
}

h2, h3 {
    color: #333;
}

label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
}

.input2, select, .button2 {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.button2 {
    background-color: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
}

.button2:hover {
    background-color: #218838;
}

.service-info {
    text-align: center;
}

.profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.stats {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.stats div {
    text-align: center;
}

.stats p {
    margin: 5px 0;
}

/* Responsive Styles */
@media (max-width: 1068px) {
    .container2 {
        flex-direction: column; /* Chuyển từ dạng ngang sang dọc */
        align-items: center;
    }

    .personal-info, .service-info {
        width: 90%; /* Mỗi phần tử chiếm toàn bộ chiều ngang */
        margin-bottom: 20px;
    }
}

@media (max-width: 1480px) {
    h2, h3 {
        font-size: 1.2em; /* Giảm kích thước chữ trên màn hình nhỏ */
    }

    .button2 {
        font-size: 0.9em;
        padding: 8px;
    }

    .stats {
        flex-direction: column;
        align-items: center;
    }

    .stats div {
        margin-bottom: 10px;
    }
}
@endsection


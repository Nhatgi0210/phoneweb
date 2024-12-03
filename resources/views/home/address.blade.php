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
        <h2>Danh sách thông tin giao hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>Địa chỉ</th>
                    <th>SDT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                       <td>{{ $address->address }}</td>
                       <td>{{ $address->sdt }}</td>
                       <td>
                            <form action=" {{ route('address.cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="address" id="" value="{{ $address->address }}">
                                <input type="hidden" name="sdt" value="{{ $address->sdt }}">
                                <button class="btn-custom btn-add">Chọn</button>
                            </form> 
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Thêm địa chỉ mới</h2>
        <form action="{{ route('address.add') }}" method="POST">
            @csrf
            <label for="province">Tỉnh,thành phố</label>
            <select  id="province">
                @foreach ($provinces as $province )
                    <option value="{{ $province->code }}">{{ $province->full_name }}</option>
                @endforeach
            </select>
            <label for="district">Quận, huyện</label>
            <select  id="district">
                <option value="">Chọn quận, huyện</option>
            </select>
            <label for="ward">Xã Phường</label>
            <select  id="ward">
                    <option value="">Chọn Xã, phường</option>
            </select>
            <label>Đường, số nhà:</label>
            <input type="text" value=""  class="input2"  id="road">

            <label for="address">Địa chỉ</label>
            <input type="text" class="input2" name="address" id="address" required>
            <label>Số điện thoại:</label>
            <input type="text" class="input2"  name="phone" id="phone"  value="{{ old('phone', $user->phone) }}"required>

            <input type="hidden" name="userId" id="" value="{{ $user->id }}">
            <button type="submit" class="button2">Cập nhật thông tin</button>
        </form>
            
           
      
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


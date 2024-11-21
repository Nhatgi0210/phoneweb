@extends('layouts.appadmin')

@section('cssmanageuser')
.table-custom {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.table-custom th, .table-custom td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.table-custom th {
    background-color: #f2f2f2;
    color: #333;
}

.table-custom tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-custom tbody tr:hover {
    background-color: #f1f1f1;
}

/* Nút Xem, Sửa, Xóa */
.btn-custom {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 5px;
    text-align: center;
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

.btn-custom:hover {
    opacity: 0.8;
}
.search-container {
    display: none;
}
.search2-container {
    display: flex;
    justify-content: right;
    align-items: center;
    margin: 20px 0;
}

/* Ô tìm kiếm */
.search2-bar {
    padding: 10px;
    width: 250px;
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 25px 0 0 25px; /* Bo tròn góc trái */
    outline: none;
}

/* Nút tìm kiếm */
.search2-btn {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50; /* Màu xanh lá */
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 0 25px 25px 0; /* Bo tròn góc phải */
    cursor: pointer;
}
@endsection

@section('manageuser')
<div class="search2-container">
    <input type="text" class="search2-bar" placeholder="Tìm kiếm...">
    <button class="search2-btn">Tìm kiếm</button>
</div>
<br>
<h1 class="my-4">Danh Sách Người Dùng</h1>
<br>

<table class="table-custom">
    <thead>
        <tr>
            <th>Số Thứ Tự</th>
            <th>Họ và Tên</th>
            <th>Gmail</th>
            <th>Số Điện Thoại</th>
            <th>Quyền Hạn</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Nguyễn Văn A</td>
            <td>nguyenvana@gmail.com</td>
            <td>0901234567</td>
            <td>Quản trị viên</td>
            <td>
                <a href="aa">   <button class="btn-custom btn-view">Xem</button></a>
                <button class="btn-custom btn-edit">Sửa</button>
                <button class="btn-custom btn-delete">Xóa</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Trần Thị B</td>
            <td>tranthib@gmail.com</td>
            <td>0912345678</td>
            <td>Nhân viên</td>
            <td>
                <button class="btn-custom btn-view">Xem</button>
                <button class="btn-custom btn-edit">Sửa</button>
                <button class="btn-custom btn-delete">Xóa</button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Phạm Minh C</td>
            <td>phamminhc@gmail.com</td>
            <td>0923456789</td>
            <td>Quản lý</td>
            <td>
                <button class="btn-custom btn-view">Xem</button>
                <button class="btn-custom btn-edit">Sửa</button>
                <button class="btn-custom btn-delete">Xóa</button>
            </td>
        </tr>
        <!-- Add more rows here -->
    </tbody>
</table>
@endsection
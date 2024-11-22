@extends('layouts.appadmin')
@section('cssmanageproduct')
h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #4CAF50;
    color: white;
}

table td {
    background-color: #f9f9f9;
}

/* Styling the buttons */
.btn {
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    margin: 0 5px;
    display: inline-block;
}

.btn-view {
    background-color: #007bff;
    color: white;
}

.btn-edit {
    background-color: #ffc107;
    color: white;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

/* Hover effect */
.btn:hover {
    opacity: 0.8;
}

.btn-view:hover {
    background-color: #0056b3;
}

.btn-edit:hover {
    background-color: #e0a800;
}

.btn-delete:hover {
    background-color: #c82333;
}
.search-container {
    display: none;
}
/* Container chứa ô tìm kiếm và nút */
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
/* Định nghĩa kiểu dáng của nút */
.nutthem {
    padding: 12px 30px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
    background-color: #007bff;
    border: 2px solid #007bff;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Hiệu ứng hover */
.nutthem:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    transform: translateY(-3px); /* Nâng nút lên khi hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Làm đậm bóng khi hover */
}


@endsection

@section('manageproduct')
<div class="search2-container">
    <input type="text" class="search2-bar" placeholder="Tìm kiếm...">
    <button class="search2-btn">Tìm kiếm</button>
</div>
<h2>Danh Sách Sản Phẩm</h2> <br>
<button class="nutthem">Thêm sản phẩm </button>

<table>
    <thead>
        <tr>
            <th>Số Thứ Tự</th>
            <th>Tên Sản Phẩm</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Điện Thoại iPhone 14</td>
            <td>
                <a href="#" class="btn btn-view">Xem</a>
                <a href="#" class="btn btn-edit">Sửa</a>
                <a href="#" class="btn btn-delete">Xóa</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Điện Thoại Samsung Galaxy S23</td>
            <td>
                <a href="#" class="btn btn-view">Xem</a>
                <a href="#" class="btn btn-edit">Sửa</a>
                <a href="#" class="btn btn-delete">Xóa</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Xiaomi 13</td>
            <td>
                <a href="#" class="btn btn-view">Xem</a>
                <a href="#" class="btn btn-edit">Sửa</a>
                <a href="#" class="btn btn-delete">Xóa</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
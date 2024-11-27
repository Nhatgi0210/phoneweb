@extends('layouts.appadmin')

@section('cssmanageuser')
<style>
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

.search2-container {
    display: flex;
    justify-content: right;
    align-items: center;
    margin: 20px 0;
}

.search2-bar {
    padding: 10px;
    width: 250px;
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 25px 0 0 25px;
    outline: none;
}

.search2-btn {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 0 25px 25px 0;
    cursor: pointer;
}
</style>
@endsection

@section('manageuser')
<div class="search2-container">
    <input type="text" class="search2-bar" placeholder="Tìm kiếm...">
    <button class="search2-btn">Tìm kiếm</button>
</div>
<br>
<h1 class="my-4">Danh Sách Khách Hàng</h1>
<br>

<table class="table-custom">
    <thead>
        <tr>
            <th>Số Thứ Tự</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $index => $user)
        <tr id="user-{{ $user->id }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('admin_thongtin2', $user->id) }}" style="text-decoration: none;">
                    <button class="btn-custom btn-view">Xem</button>
                </a>
                <a href="{{ route('edit_user', $user->id) }}" style="text-decoration: none;">
                    <button class="btn-custom btn-edit">Sửa</button>
                </a>
                <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Không có khách hàng nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

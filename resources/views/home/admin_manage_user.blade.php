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
        @foreach ($users as $index => $user)
        <tr id="user-{{ $user->id }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->position->name }}</td>
            <td>
                <a href="{{ route('admin_thongtin2', $user->id) }}" style="text-decoration: none;">
                    <button class="btn-custom btn-view">Xem</button>
                </a>
                
                <a href="{{ route('edit_user', $user->id) }}" style="text-decoration: none;">
                    <button class="btn-custom btn-edit">Sửa</button>
                </a>
        
                <!-- Hiển thị nút Xóa nếu không phải admin -->
                @if ($user->position->id != 3) 
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Xóa</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
        
    
    </tbody>
</table>
<script>
 <script>
  function deleteUser(userId) {
    // Hiển thị cảnh báo xác nhận xóa
    if (confirm("Are you sure you want to delete this user?")) {
        // Gửi yêu cầu AJAX DELETE tới server
        fetch(`/user/${userId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);  // Log phản hồi để kiểm tra
            if (data.success) {
                alert("User deleted successfully!");
                document.getElementById(`user-${userId}`).remove(); // Xóa người dùng khỏi DOM
            } else {
                alert("Error deleting user!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("There was an error deleting the user!");
        });
    }
}
</script>
</script>





@endsection
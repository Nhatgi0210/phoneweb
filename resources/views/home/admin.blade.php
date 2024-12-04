@extends('layouts.appadmin')
@section('admin')
<div class="content">
    <div class="metrics">
        <div class="widget widget-aa">
            <div class="title">Tổng khách hàng</div>
            <div class="value">
                <span class="amount">21</span>
                <span class="currency">Khách</span>
            </div>
        </div>
        <div class="widget widget-bb">
            <div class="title">Đơn hàng chờ duyệt</div>
            <div class="value">
                <span class="amount">6</span>
                <span class="currency">Đơn</span>
            </div>
        </div>
        <div class="widget widget-cc">
            <div class="title">Đơn hàng đã duyệt</div>
            <div class="value">
                <span class="amount">3</span>
                <span class="currency">Đơn</span>
            </div>
        </div>
    </div>
    
    
    
    <div class="widget2">
        <h2>Tổng quan phân khúc khác hàng</h2>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="legend">
            <div><span style="background-color: #FF6384;"></span> Khách hàng 25-40 tuổi</div>
            <div><span style="background-color: #36A2EB;"></span>Khách hàng trẻ dưới 25 tuổi</div>
            <div><span style="background-color: #FFCE56;"></span>Khách hàng trên 60 tuổi</div>
            <div><span style="background-color: #4BC0C0;"></span> Khách hàng 40-60 tuổi</div>
        </div>
        
    </div>
    
    <div class="data-table" style="margin-top: 10px;">
        <h3>Danh sách khách hàng</h3>
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
    </div>
</div>
@endsection

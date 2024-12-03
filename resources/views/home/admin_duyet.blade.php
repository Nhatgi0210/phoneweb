@extends('layouts.appadmin')

@section('admin_duyet')

<h1>Danh Sách Đơn Hàng Chờ Duyệt</h1>
<table>
    <thead>
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Khách Hàng</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ number_format($order->total_price) }} VND</td>
            {{-- <td>{{ $order->status }}</td> --}}
            <td>
                @switch($order->status)
                    @case('pending')
                        Chờ duyệt
                        @break
                    @case('approved')
                        Đã duyệt
                        @break
                    @case('rejected')
                        Không duyệt
                        @break
                    @default
                        Không xác định
                @endswitch
            </td>
            
            <td>
                <form action="{{ route('orders.approve', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" style="
                        background-color: #28a745; 
                        color: white; 
                        border: none; 
                        padding: 8px 12px; 
                        border-radius: 4px; 
                        cursor: pointer; 
                        transition: background-color 0.3s ease;
                    " 
                    onmouseover="this.style.backgroundColor='#218838'" 
                    onmouseout="this.style.backgroundColor='#28a745'">
                        Duyệt
                    </button>
                </form>

                <form action="{{ route('orders.reject', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" style="
                        background-color: #dc3545; 
                        color: white; 
                        border: none; 
                        padding: 8px 12px; 
                        border-radius: 4px; 
                        cursor: pointer; 
                        transition: background-color 0.3s ease;
                    " 
                    onmouseover="this.style.backgroundColor='#c82333'" 
                    onmouseout="this.style.backgroundColor='#dc3545'">
                        Không Duyệt
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

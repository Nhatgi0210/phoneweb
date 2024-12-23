@extends('layouts.appadmin')

@section('admin_duyet')

<h1>Danh Sách Đơn Hàng Chờ Duyệt</h1>
<table>
    <thead>
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Khách Hàng</th>
            <th>Ngày Đặt Hàng</th> <!-- Thêm cột Ngày Đặt Hàng -->
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr onclick="window.location.href='{{ route('hoadon', ['ordID' => $order->id]) }}'" style="cursor: pointer;">
            
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td> <!-- Hiển thị ngày đặt hàng -->

                <td>{{ number_format($order->total_price) }} VND</td>
                <td>
                    @switch($order->status)
                
                        @case('pending')
                            <span style="color: rgb(255, 238, 0);"><b> Chờ duyệt</b> </span>
                            @break
                        @case('approved')
                            <span style="color: rgb(0, 255, 106);"><b>Đã duyệt</b>  </span>
                            @break
                        
                        @case('rejected')
                            <span style="color: rgb(236, 70, 70);"><b> Không duyệt</b> </span>
                            @break
                
                    @endswitch
                </td>
                <td>
                    @if ($order->status =='pending')
                        
                    
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
                    @endif
                    {{-- <button type="submit" style="
                            background-color: blue; 
                            color: white; 
                            border: none; 
                            padding: 8px 12px; 
                            border-radius: 4px; 
                            cursor: pointer; 
                            transition: background-color 0.3s ease;
                        " 
                        onmouseover="this.style.backgroundColor='#109cd3'" 
                        onmouseout="this.style.backgroundColor='blue'">
                            Xem
                        </button> --}}
                </td>
           
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@extends('layouts.appadmin')
@section('admin')
<div class="content">
    <div class="metrics">
        <div class="widget widget-aa">
            <div class="title">Tổng khách hàng</div>
            <div class="value">
                <span class="amount">999</span>
                <span class="currency">Khách</span>
            </div>
        </div>
        <div class="widget widget-bb">
            <div class="title">Đơn hàng chờ duyệt</div>
            <div class="value">
                <span class="amount">120</span>
                <span class="currency">Đơn</span>
            </div>
        </div>
        <div class="widget widget-cc">
            <div class="title">Đơn hàng đã duyệt</div>
            <div class="value">
                <span class="amount">3499</span>
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
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Phan Văn Sơn</td>
                <td>phanvson05@gmail.com</td>
            </tr>
        </table>
    </div>
</div>
@endsection

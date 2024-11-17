@extends('layouts.app')
@section('css')
<style>

    tr:hover {
            background-color: #42dcf0; /* Hiệu ứng hover cho hàng */
        }
        
        th, td {
            font-family: Arial, sans-serif; /* Font chữ */
            font-size: 16px; /* Kích thước chữ */
        }
        table {
            border-radius: 10px; /* Bo góc cho toàn bộ bảng */
            overflow: hidden; /* Đảm bảo không có phần nào nhô ra ngoài */
            transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
        }
        </style>
@endsection
@section('sosanh') 
<!-- so sánh -->
<div style="height:200px"></div>
<div style="text-align: center;">
    <div class="d-flex justify-content-center align-items-center border-animation-left" style="flex-wrap: nowrap;">
        
        <!-- Ô vuông đầu tiên -->
        <div class="d-flex flex-column justify-content-center align-items-center" style="flex: 1; max-width: 50%; padding: 10px;">
            <!-- Ô chứa ảnh -->
            <div style="width: 100%; max-width: 300px; height: auto; background-color: #b9f4f4; display: flex; justify-content: center; align-items: center; border: 2px solid #000;">
                <img src="{{ asset('img/a344.jpg') }}" alt="" style="max-width: 100%; height: auto;">
            </div>
            <br>
            <!-- Ô input phía dưới -->
            <input type="text" placeholder="nhập điện thoại 1" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
        </div>
        
        <!-- Dấu phân cách -->
        <div style="border-left: 1px solid #ccc; height: 300px; margin: 0 15px; flex-shrink: 0;"></div>
        
        <!-- Ô vuông thứ hai -->
        <div class="d-flex flex-column justify-content-center align-items-center" style="flex: 1; max-width: 50%; padding: 10px;">
            <!-- Ô chứa ảnh -->
            <div style="width: 100%; max-width: 300px; height: auto; background-color: #b9f4f4; display: flex; justify-content: center; align-items: center; border: 2px solid #000;">
                <img src="img/a799.jpg" alt="" style="max-width: 100%; height: auto;">
            </div>
            <br>
            <!-- Ô input phía dưới -->
            <input type="text" placeholder="nhập điện thoại 2" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
        </div>
        
    </div>
</div>
<!-- hết so sánh -->


<!-- hiển thị bảng so sánh -->
 <center>
    <h1 class="display-5 mb-3">Kết quả so sánh </h1>

 </center>

 <table style="width: 100%; border-collapse: collapse; margin: 20px; border-radius: 10px; overflow: hidden; border: 1px solid #0d9ef8;">
    <thead style="background-color: #78c0ed; color: white;">
        <tr>
            <th style="width: 10%; padding: 10px; border: 1px solid #78c0ed; text-align: center;">Thông số</th>
            <th style="width: 45%; padding: 10px; border: 1px solid #78c0ed; text-align: center;">Điện thoại 1</th>
            <th style="width: 45%; padding: 10px; border: 1px solid #78c0ed; text-align: center;">Điện thoại 2</th>
        </tr>
    </thead>
    <tbody>
        <tr style="background-color: #ffffff;">
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Chip</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 2</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 3</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">RAM</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 5</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 6</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">ROM</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 5</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 6</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Pin</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 5</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Nội dung 6</td>
        </tr>
    </tbody>
</table>


 <!-- hết hiển thị bản so sánhh -->

@endsection
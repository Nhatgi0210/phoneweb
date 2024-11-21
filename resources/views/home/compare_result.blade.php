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
            <div style="width: 100%; max-width: 300px; height: auto; background-color: #ffffff; display: flex; justify-content: center; align-items: center; border: 2px solid #000; height: 300px">
                <img src="{{ asset('storage/'.$phone1->main_image_path ) }}" alt="" style="max-width: 100%; height: auto;">
            </div>
            <br>
            <!-- Ô input phía dưới -->
            <input id="search-box1" type="text" value="{{ $phone1->name }}" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
           
        </div>
        
        <!-- Dấu phân cách -->
        <div style="border-left: 1px solid #ccc; height: 300px; margin: 0 15px; flex-shrink: 0;"></div>
        
        <!-- Ô vuông thứ hai -->
        <div class="d-flex flex-column justify-content-center align-items-center" style="flex: 1; max-width: 50%; padding: 10px;">
            <!-- Ô chứa ảnh -->
            <div style="width: 100%; max-width: 300px; height: auto; background-color: #ffffff; display: flex; justify-content: center; align-items: center; border: 2px solid #000;height: 300px">
                <img src="{{asset('storage/'.$phone2->main_image_path) }}" alt="" style="max-width: 100%; height: auto;">
            </div>
            <br>
            <!-- Ô input phía dưới -->
            <input id="search-box2" type="text" value="{{ $phone2->name }}" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
          
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
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->chip }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->chip }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">RAM</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->ram }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->ram }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Bộ nhớ</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->rom }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->rom }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Pin</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->pin }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->pin }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Màn hình</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->man_hinh }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->man_hinh }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Camera trước</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->camera_truoc }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->camera_truoc }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">Camera sau</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config1->camera_sau }}</td>
            <td style="padding: 10px; border: 1px solid #78c0ed; text-align: center;">{{ $config2->camera_sau }}</td>
        </tr>
    </tbody>
</table>


 <!-- hết hiển thị bản so sánhh -->
 

@endsection
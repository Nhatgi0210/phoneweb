@extends('layouts.app')
@section('cssin4')
<style>

body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
           
        }
        /* .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        } */
        .product-info {
            display: flex;
            gap: 20px;
        }
        .image-container img {
            width: 400px;
            border-radius: 8px;
        }
        .details {
            flex: 1;
        }
        .details h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }
        .price {
            color: #3665f3;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .special-offer {
            color: rgb(21, 20, 20);
            margin-bottom: 10px;
        }
        .actions button {
            background-color: #72bfe6;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        .table-container {
            margin-top: 30px;
        }
        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd; /* Khung cho các ô trong bảng */
    padding: 8px;
    text-align: center;
}

table th {
    background-color: #69d0e8; /* Màu nền cho dòng đầu tiên */
    color: white;
}

table td {
    background-color: #fff;
}

table tr:nth-child(even) td {
    background-color: #f9f9f9; /* Tô màu nền cho các hàng chẵn */
}

        /* Thêm vào phần <style> */
@media (max-width: 768px) {
    .product-info {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .image-container img {
        width: 100%;
        max-width: 300px;
    }
    .details {
        margin-top: 20px;
    }
    table {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .price {
        font-size: 24px;
    }
    table th, table td {
        padding: 5px;
    }
}
.cart-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #6db9e9;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.cart-button i {
    margin-right: 8px; /* Khoảng cách giữa icon và text */
}

.cart-button:hover {
    background-color: #94f47a;
    transform: translateY(-3px);
}


        </style>
@endsection
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
@section('thongtin')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: -130px; height: 550px;">
        <div class="container" >
            <h1 class="display-3 mb-3 animated slideInDown" style="font-size: 40px; margin-top: 80px">/Thông tin chi tiết</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#"></a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#"></a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page"></li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container" style="margin-top: 120px">
    @isset($product)
   
    <div class="product-info">
        <div class="image-container">
            <img src="{{  asset('storage/' .$product->main_image_path)}}" alt="Product Image">
        </div>
        <div class="details">
            <h2>{{ $product->name }}</h2>
            <p class="price"><span class="formatted-number">{{ $product->discount_price }}</span> <span class="formatted-number" style="text-decoration: line-through; color: #888;">{{ $product->original_price }}</span></p>
            <p class="special-offer">Đang trong thời gian giảm giá</p>
            <div class="actions">
              
                <button class="cart-button">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Cấu hình</th>
                    <th>Thông số</th>
                </tr>
            </thead>
            <tbody>
              
                    <tr>
                        <td>Chip</td>
                        <td>{{ $config->chip }}</td>
                    </tr>
                    <tr>
                        <td>Ram</td>
                        <td>{{ $config->ram }}</td>
                    </tr>
                    <tr>
                        <td>Bộ nhớ</td>
                        <td>{{  $config->rom}}</td>
                    </tr>
                    <tr>
                        <td>Pin</td>
                        <td>{{ $config->pin }}</td>
                    </tr>
                     <tr>
                        <td>Màn hình</td>
                        <td>{{ $config->man_hinh }}</td>
                    </tr>
                    <tr>
                        <td>Camera trước</td>
                        <td>{{$config->camera_truoc }}</td>
                    </tr>
                    <tr>
                        <td>Camera sau</td>
                        <td>{{$config->camera_sau}}</td>
                    </tr>
              
            </tbody>
        </table>
    </div>
    @endisset
</div>

   
@endsection
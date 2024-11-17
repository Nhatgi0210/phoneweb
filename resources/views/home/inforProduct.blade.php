@extends('layouts.app')
@section('cssin4')
<style>

body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
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
<div class="container" style="margin-top: 120px">
    <div class="product-info">
        <div class="image-container">
            <img src="img/13prm.jpg" alt="Product Image">
        </div>
        <div class="details">
            <h2>iPhone 13 Pro Max</h2>
            <p class="price">22.000.000 <span style="text-decoration: line-through; color: #888;">24.000.000</span></p>
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
                    <th>Số thứ tự</th>
                    <th>Cấu hình</th>
                    <th>Thông số</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>màn hình </td>
                    <td>6.5 in</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ROM</td>
                    <td>128GB</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>RAM</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Chip</td>
                    <td>A18</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Pin</td>
                    <td>3400 mAh</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>

   
@endsection
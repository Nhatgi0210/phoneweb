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
                    <tr>
                        <td>Hãng</td>
                        <td>{{$product->brand->name}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
    {{--  --}}
    <br>
    @if(auth()->check())
    <form action="{{ route('comments.store2') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <textarea name="content" placeholder="Nhập bình luận của bạn..." required></textarea>
        <button type="submit">Gửi bình luận</button>
    </form>
@else
    <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
@endif

{{--  --}}

@if($comments->isEmpty())
    <p>Chưa có bình luận nào.</p>
@else
    <!-- Lặp qua các bình luận để hiển thị -->
    @foreach($comments as $comment)
        <div class="comment">
            <strong>{{ $comment->user->name }}</strong> <!-- Hiển thị tên người dùng -->
            <p>{{ $comment->content }}</p>
            <small>{{ $comment->created_at->format('d/m/Y H:i') }}</small> <!-- Thời gian bình luận -->
        </div>
    @endforeach
@endif



    {{--  --}}
    @endisset
    <br>
    <div class=" text-start mb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-3">Các sản phẩm liên quan </h1>
    
    </div>
    <br>
    <div class="row g-4">
        @foreach ($relatedProducts as $relatedProduct)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="product-item">
                <div class="position-relative bg-light overflow-hidden" style="width: 300px; height: 200px;">
                    <img class="img-fluid" src="{{ asset('storage/' .$relatedProduct->main_image_path) }}" alt=""
                         style="max-width: 100%; max-height: 100%; object-fit: contain; display: block; margin: auto;">
                </div>
                <div class="text-center p-4">
                    <a class="d-block h5 mb-2" href="{{ route('product.show', ['id' => $relatedProduct->id]) }}">{{ $relatedProduct->name }}</a>
                    <span class="text-primary me-1 formatted-number">{{ $relatedProduct->discount_price }}</span>
                    <span class="text-body text-decoration-line-through formatted-number">{{ $relatedProduct->original_price }}</span>
                </div>
                <div class="d-flex border-top">
                    <small class="w-50 text-center border-end py-2">
                        <a class="text-body" href="{{ route('product.show', ['id' => $relatedProduct->id]) }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                    </small>
                    <small class="w-50 text-center py-2">
                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   


    
    
</div>

   
@endsection
@extends('layouts.app2')
@section('giohang')

<!-- giỏ hàng -->
<div style="height: 100px"></div>
<div class="container">
   

    <!-- test1 -->
    <table style="width: 100%; border-collapse: collapse;">
       
        <tbody>
            <tr>
               <!-- Sản phẩm 1 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- Hết sản phẩm 1 -->
 
<!-- sản phâmr 2 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/13prm.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3> iPhone 13 Pro Max</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- hết sp2 -->

<!-- sản phẩm 3 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
            <button id="myButton">Click Me</button>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>
</tr>
<!-- hết sản phẩm 3 -->

<!-- spham4 -->
<tr>
    <td style="padding: 8px;">
        <div class="cart-img">
            <img src="img/14.jpg" alt="" style="width: 150px; height: 150px;">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-desc">
            <h3>Samsung Galaxy S24 Ultra</h3>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-quantity">
            <input type="number" id="quantity" min="0" value="1">
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-price">
            <p >giá sale <i class="fas fa-check-circle"></i></p>
            <h4 style="color: #08d062;">28.000.000</h4>
        </div>
    </td>

    <td style="padding: 8px;">
        <div class="cart-total">
            <p>giá gốc</p>
            <h4><s style="color: #f53a14;">30.999.990</s></h4>
        </div>
    </td>

    <td style="padding: 8px; ">
        <div class="cart-remove">
            <button class="remove-btn">
                <i class="fas fa-trash-alt"></i> 
            </button>
        </div>
    </td>

   
</tr>
<!-- hép spham 4 -->
         <hr>
        </tbody>
    </table>
    
    <!-- endtesst1 -->
    

    
     
    <div class="cart-summary">
        <div class="product-total">
            <h2>Tổng tiền (VNĐ) : <span id="total">39.980.000.000 </span></h2>
        </div>
        <div class="product-actions">
            <a href="#" class="checkout">Checkout</a>
            <button class="remove-all">Xóa hết</button>
        </div>
    </div>
    
    
    
    
    
</div>
@endsection

@section('cssgiohang')
<style>
    /* Cấu hình mặc định */
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    
    /* Container giỏ hàng */
    .cart-container {
        width: 80%;
        margin: 80px auto;
    }
    
    /* Các phần trong giỏ hàng */
    .cart-part {
        display: flex;
        align-items: center;
        justify-content: space-between; /* Căn đều các phần tử để tối ưu không gian */
        flex-wrap: nowrap; /* Ngăn các phần tử xuống dòng */
        gap: 10px; /* Thêm khoảng cách giữa các phần tử nếu cần */
    }
    
    .cart-img {
        width: 20%;
    }
    
    .cart-img img {
        width: 150px;
        height: 150px;
        object-fit: contain;
    }
    
    .cart-desc {
        font-size: 20px;
        text-align: center;
        flex: 1; /* Cho phép phần mô tả mở rộng chiếm không gian cần thiết */
        min-width: 150px; /* Đặt chiều rộng tối thiểu để ngăn bị ép quá nhỏ */
    }
    
    /* Giảm kích thước ô nhập */
    .cart-quantity {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px; /* Thay đổi chiều rộng của phần tử nhập để nhỏ hơn */
        border-radius: 10px; /* Bo góc cho div */
        background-color: #f5f5f5; /* Nền sáng cho toàn bộ div */
        overflow: hidden; /* Đảm bảo không có phần tử nào bị nhô ra ngoài */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng bóng mờ nhẹ */
        padding: 5px; /* Khoảng cách trong div */
    }
    
    /* Giảm kích thước của ô input */
    .cart-quantity input {
        width: 80%; /* Chiếm hết chiều rộng của div */
        padding: 5px; /* Giảm padding để ô nhỏ hơn */
        font-size: 16px; /* Giảm kích thước chữ */
        text-align: center;
        border: 1px solid #ccc; /* Viền mỏng, màu xám nhạt */
        border-radius: 5px; /* Bo góc cho ô nhập */
        outline: none;
        transition: background-color 0.3s ease, border-color 0.3s ease; /* Thêm hiệu ứng khi focus */
    }
    
    /* Thay đổi màu viền khi focus */
    .cart-quantity input:focus {
        background-color: #e8f5fe; /* Nền sáng khi focus vào ô nhập */
        border-color: #3498db; /* Viền màu xanh khi focus */
    }
    
    
    /* Cột giá và tổng */
    .cart-price,
    .cart-total {
        text-align: center;
        width: 15%;
    }
    
    /* Nút xóa */
    .cart-remove {
        width: 10%;
    }
    
    .remove-btn {
        background-color: transparent; /* Nền trong suốt ban đầu */
        border: 2px solid transparent; /* Viền trong suốt */
        color: #e74c3c; /* Màu đỏ cho icon */
        font-size: 24px; /* Tăng kích thước icon */
        padding: 8px 16px; /* Khoảng cách trong nút */
        border-radius: 5px; /* Bo tròn góc nút */
        cursor: pointer; /* Thay đổi con trỏ thành pointer khi hover */
        transition: all 0.3s ease; /* Tạo hiệu ứng chuyển mượt mà */
        border: 2px solid #c0392b; /* Viền đỏ đậm khi hover */
    }
    
    .remove-btn:hover {
        background-color: #e74c3c; /* Nền đỏ khi hover */
        color: white; /* Màu trắng cho icon khi hover */
    }
    
    .cart-summary {
        display: flex; /* Dùng flexbox để căn chỉnh */
        justify-content: space-between; /* Chia đều khoảng cách giữa các phần tử */
        align-items: center; /* Căn giữa theo chiều dọc */
        padding: 20px; /* Thêm khoảng cách trong container */
        background-color: rgba(123, 131, 126, 0.5); /* Nền xanh lá trong suốt (rgba: red, green, blue, alpha) */
        border-radius: 10px; /* Bo góc cho giỏ hàng */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ */
        margin-left: 0; /* Đặt lại về vị trí ban đầu */
        margin-right: 0; /* Đảm bảo giỏ hàng không bị lệch ra ngoài */
        width: 80%; /* Chiếm 80% chiều rộng của màn hình */
        max-width: 1000px; /* Tối đa không quá 1000px */
        margin: 0 auto; /* Canh giữa giỏ hàng */
        flex-wrap: wrap; /* Cho phép các phần tử con thu nhỏ lại khi cần */
    }
    
    .cart-summary .item {
        flex: 1 1 200px; /* Mỗi phần tử con có thể chiếm tối thiểu 200px */
        min-width: 150px; /* Đảm bảo phần tử con không thu nhỏ quá 150px */
        margin: 10px; /* Khoảng cách giữa các phần tử */
    }
    
    @media (max-width: 768px) {
        .cart-summary {
            flex-direction: column; /* Khi màn hình nhỏ, các phần tử con sẽ xếp theo cột */
            width: 100%; /* Khi thu nhỏ màn hình, giỏ hàng chiếm toàn bộ chiều rộng */
            margin-left: 0; /* Đảm bảo không có margin trái khi thu nhỏ */
        }
    }
    
    
    
    /* Căn chỉnh các nút ở cùng hàng */
    .product-actions {
        display: flex;
        justify-content: left; /* Căn giữa hai nút */
        gap: 10px; /* Khoảng cách giữa các nút */
        width: 100%; /* Chiếm toàn bộ chiều rộng */
        margin-top: 10px; /* Khoảng cách với phần trên */
    }
    
    /* Style cho nút Checkout */
    .checkout {
        background-color: #42b0f5; /* Màu nền xanh dương */
        color: white; /* Màu chữ trắng */
        padding: 8px 50px; /* Giảm chiều ngang padding */
        font-size: 14px; /* Kích thước chữ */
        border: none;
        border-radius: 25px; /* Bo góc cho nút */
        text-align: center;
        text-decoration: none; /* Bỏ gạch dưới */
        cursor: pointer;
        transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
        flex-grow: 0; /* Tắt tính năng mở rộng chiều rộng */
    }
    
    /* Hiệu ứng hover cho nút Checkout */
    .checkout:hover {
        background-color: #75bef6; /* Màu nền thay đổi khi hover */
        transform: translateY(-8px); /* Hiệu ứng nâng nút lên khi hover */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Thêm bóng đổ khi hover */
        color: white;
    }
    
    /* Style cho nút Xóa hết */
    .remove-all {
        background-color: #ea7c70; /* Màu nền đỏ */
        color: white; /* Màu chữ trắng */
        padding: 8px 50px; /* Giảm chiều ngang padding */
        font-size: 14px; /* Kích thước chữ */
        border: none;
        border-radius: 25px; /* Bo góc cho nút */
        cursor: pointer;
        transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
        flex-grow: 0; /* Tắt tính năng mở rộng chiều rộng */
    }
    
    /* Hiệu ứng hover cho nút Xóa hết */
    .remove-all:hover {
        background-color: #f69f96; /* Màu nền thay đổi khi hover */
        /* transform: translateY(-8px); Hiệu ứng nâng nút lên khi hover */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Thêm bóng đổ khi hover */
        color: white;
    }
    #total {
        color: #14f579; /* Màu xanh dương cho số tiền để làm nổi bật */
        font-size: 30px; /* Kích thước chữ cho số tiền lớn hơn một chút */
        font-weight: bold;
    }
    .product-total h2 {
        margin-right: 10px; /* Đảm bảo khoảng cách hợp lý giữa chữ và số */
    }
    .product-total {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px; /* Kích thước chữ lớn hơn để nổi bật */
        font-weight: bold; /* Đậm chữ để gây chú ý */
        color: #333; /* Màu chữ tối, dễ đọc */
        padding: 10px 20px; /* Thêm padding để phần này không bị chật */
        background-color: #f8f8f8; /* Nền sáng để phần này nổi bật hơn */
        border-radius: 10px; /* Bo góc để mềm mại hơn */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ nhẹ */
    }
    .cart-price p,
    .cart-price h4 {
        white-space: nowrap;
    }
    .cart-total p,
    .cart-total h4 {
        white-space: nowrap;
    }
    .fa-check-circle {
        color: rgb(7, 242, 7); /* Màu xanh lá */
        font-size: 14px; /* Kích thước icon */
    }
    /* Nút xác nhận */
    .cart-confirm {
        width: 10%; /* Điều chỉnh chiều rộng */
    }
    
    /* Nút xác nhận với biểu tượng */
    .confirm-btn {
        background-color: transparent; /* Nền trong suốt ban đầu */
        border: 2px solid transparent; /* Viền trong suốt */
        color: #2ecc71; /* Màu xanh lá cho icon */
        font-size: 24px; /* Tăng kích thước icon */
        padding: 8px 16px; /* Khoảng cách trong nút */
        border-radius: 5px; /* Bo tròn góc nút */
        cursor: pointer; /* Thay đổi con trỏ thành pointer khi hover */
        transition: all 0.3s ease; /* Tạo hiệu ứng chuyển mượt mà */
        border: 2px solid #27ae60; /* Viền xanh đậm khi hover */
    }
    
    /* Hiệu ứng hover cho nút xác nhận */
    .confirm-btn:hover {
        background-color: #2ecc71; /* Nền xanh khi hover */
        color: white; /* Màu trắng cho icon khi hover */
    }
    
    
    
        </style>
@endsection
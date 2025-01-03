

@extends('layouts.appadmin')

@section('addproduct')
<h1>Thêm Sản Phẩm</h1>

<!-- Hiển thị lỗi nếu có -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('add_product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Loại sản phẩm -->
    <div class="form-group">
        <label for="MaDM">Loại sản phẩm:</label>
        <select id="MaDM" name="MaDM" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Hãng sản phẩm -->
    <div class="form-group">
        <label for="MaLSP">Hãng:</label>
        <select id="MaLSP" name="MaLSP" class="form-control">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tên sản phẩm -->
    <div class="form-group">
        <label for="TenSP">Tên sản phẩm:</label>
        <input type="text" id="TenSP" name="TenSP" class="form-control" placeholder="Nhập tên sản phẩm">
    </div>

    <!-- Đơn giá -->
    <div class="form-group">
        <label for="DonGia">Đơn giá:</label>
        <input type="text" id="DonGia" name="DonGia" class="form-control" placeholder="Nhập đơn giá sản phẩm">
    </div>

    <!-- Các thông số cấu hình -->
    <div class="form-group">
        <label for="man_hinh">Màn hình:</label>
        <input type="text" id="man_hinh" name="man_hinh" class="form-control" placeholder="Nhập thông số màn hình">
    </div>

    <div class="form-group">
        <label for="Chip">Chip:</label>
        <input type="text" id="Chip" name="Chip" class="form-control" placeholder="Nhập thông tin chip">
    </div>

    <div class="form-group">
        <label for="RAM">RAM:</label>
        <input type="text" id="RAM" name="RAM" class="form-control" placeholder="Nhập dung lượng RAM">
    </div>

    <div class="form-group">
        <label for="ROM">ROM:</label>
        <input type="text" id="ROM" name="ROM" class="form-control" placeholder="Nhập dung lượng ROM">
    </div>
    <div class="form-group">
        <label for="camera_truoc">Camera truoc:</label>
        <input type="text" id="camera_truoc" name="camera_truoc" class="form-control" placeholder="Nhập thông số camera trước">
    </div>
    <div class="form-group">
        <label for="camera_sau">Camera sau:</label>
        <input type="text" id="camera_sau" name="camera_sau" class="form-control" placeholder="Nhập thông số camera sau">
    </div>

    <div class="form-group">
        <label for="Pin">Pin:</label>
        <input type="text" id="Pin" name="Pin" class="form-control" placeholder="Nhập dung lượng pin">
    </div>

    <!-- Hình ảnh -->
    <div class="form-group">
        <label for="HinhAnh1">Hình ảnh:</label>
        <input type="file" id="HinhAnh1" name="HinhAnh1" class="form-control">
    </div>

    <!-- Mô tả -->
    <div class="form-group">
        <label for="MoTa">Mô tả:</label>
        <textarea id="MoTa" name="MoTa" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
    </div>

    <!-- Trạng thái -->
    <div class="form-group">
        <label for="TrangThai">Trạng thái:</label>
        <input type="checkbox" id="TrangThai" name="TrangThai" value="1"> <em>(Check cho phép hiển thị sản phẩm)</em>
    </div>

    <button type="submit" class="btn">Thêm sản phẩm</button>
</form>
@endsection



@section('cssaddproduct')
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f7f7f7;
}

.form-control:focus {
    border-color: #4CAF50;
    outline: none;
    background-color: #fff;
}

.form-group img {
    margin-bottom: 10px;
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #45a049;
}

.form-group em {
    font-size: 12px;
    color: #777;
}

.form-group textarea {
    height: 150px;
    resize: vertical;
}

/* Styling the select dropdown */
select.form-control {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
}
@endsection

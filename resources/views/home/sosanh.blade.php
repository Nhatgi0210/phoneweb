@extends('layouts.app')
@section('css')
<style>
 /* Đặt kiểu cho bảng */
 table {
            width: 100%; /* Đặt lại kích thước bảng nhỏ hơn */
            margin: 20px auto; /* Căn giữa bảng */
            border-collapse: collapse; /* Loại bỏ khoảng cách giữa các cell */
            border-radius: 8px; /* Bo góc cho bảng */
            overflow: hidden; /* Đảm bảo bo góc của bảng */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ xung quanh bảng */
        }

        /* Kiểu cho các ô trong bảng */
        th, td {
            padding: 8px 12px; /* Giảm padding để bảng nhỏ hơn */
            text-align: center; /* Căn giữa nội dung trong ô */
            font-size: 14px; /* Giảm kích thước font chữ */
            border: 1px solid #ddd; /* Đặt viền nhẹ cho các ô */
        }

        /* Màu nền của tiêu đề cột */
        th {
            background-color: #4CAF50; /* Nền màu xanh lá */
            color: white; /* Màu chữ trắng */
            font-size: 16px; /* Font chữ lớn hơn một chút */
        }

        /* Màu nền của các hàng */
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Nền màu sáng cho các hàng chẵn */
        }

        tr:hover {
            background-color: #f1f1f1; /* Nền màu xám khi hover lên hàng */
        }

        /* Cột đầu tiên (số thứ tự) */
        td:first-child {
            font-size: 12px; /* Giảm kích thước font cho cột số thứ tự */
            font-weight: bold; /* Làm đậm số thứ tự */
            background-color: #f1f1f1; /* Nền nhẹ cho cột số thứ tự */
        }
         /* Tạo kiểu cho nút */
         .beautiful-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #7beb7f;
            border: none;
            border-radius: 50px; /* Bo tròn góc */
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease; /* Hiệu ứng mượt mà */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        }

        /* Hiệu ứng hover */
        .beautiful-button:hover {
            background-color: #49f551; /* Màu nền thay đổi khi hover */
            transform: scale(1.1); /* Phóng to nút khi hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Đổ bóng đậm hơn */
        }

        /* Hiệu ứng khi nút được nhấn */
        .beautiful-button:active {
            transform: scale(1); /* Trở về kích thước ban đầu khi nhấn */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ khi nhấn */
        }
    .suggestion-item {
        padding: 5px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background: #f0f0f0;
    }
    .suggestion-list {
        position: absolute;
        top:calc(100% + 35px);
        max-height: 180px;
        overflow-y: auto;
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 0;
        margin: 0;
        list-style-type: none;
        z-index: 10; 
    }
</style>
@endsection
@section('sosanh') 
<!-- so sánh -->
<div style="height:100px"></div>
<div style="text-align: center;">
    <form action="{{ route('compare.phone') }}" method="get">
         <div class="d-flex justify-content-center align-items-center border-animation-left" style="flex-wrap: nowrap;">
        
        <!-- Ô vuông đầu tiên -->
            <div class="d-flex flex-column justify-content-center align-items-center" style="flex: 1; max-width: 50%; padding: 10px;">
                <!-- Ô chứa ảnh -->
                <div style="width: 100%; max-width: 300px; height: auto; background-color: #b9f4f4; display: flex; justify-content: center; align-items: center; border: 2px solid #000;">
                    <img src="{{ asset('img/phone1.png') }}" alt="" style="max-width: 100%; height: auto;">
                </div>
                <br>
                <!-- Ô input phía dưới -->
                <input id="search-box1" type="text" required placeholder="nhập điện thoại 1" name="phone1" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
                <ul id="suggestion-list1" class="suggestion-list"></ul>
            </div>
            
            <!-- Dấu phân cách -->
            <div style="border-left: 1px solid #ccc; height: 300px; margin: 0 15px; flex-shrink: 0;"></div>
            
            <!-- Ô vuông thứ hai -->
            <div class="d-flex flex-column justify-content-center align-items-center" style="flex: 1; max-width: 50%; padding: 10px;">
                <!-- Ô chứa ảnh -->
                <div style="width: 100%; max-width: 300px; height: auto; background-color: #b9f4f4; display: flex; justify-content: center; align-items: center; border: 2px solid #000;">
                    <img src="img/phone2.png" alt="" style="max-width: 100%; height: auto;">
                </div>
                <br>
                <!-- Ô input phía dưới -->
                <input id="search-box2" type="text" required placeholder="nhập điện thoại 2" name="phone2" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
                <ul id="suggestion-list2" class="suggestion-list"></ul>
            </div>
        
        </div>
        <input type="submit" value="So sánh">
    </form>
   
   
</div>
<!-- hết so sánh -->


<!-- hiển thị bảng so sánh -->


 <!-- hết hiển thị bản so sánhh -->
 <script>
    function handleSearch(searchBoxId, suggestionListId) {
        const routeUrl = "{{ route('search.products') }}";
        const searchBox = document.getElementById(searchBoxId);
        const suggestionList = document.getElementById(suggestionListId);
        searchBox.addEventListener('input', function () {
            const keyword = searchBox.value.trim();

        
            if (keyword.length > 2) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `${routeUrl}?keyword=${encodeURIComponent(keyword)}`, true);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        const data = xhr.responseText;  
                        suggestionList.innerHTML = data;  

                        // Đảm bảo rằng các sự kiện click vào gợi ý được xử lý
                        document.querySelectorAll('.suggestion-item').forEach(item => {
                            item.addEventListener('click', function () {
                                searchBox.value = this.textContent;
                                suggestionList.innerHTML = ''; // Xóa danh sách gợi ý
                            });
                        });
                    }
                };

                xhr.send();
            } else {
                suggestionList.innerHTML = ''; // Xóa danh sách gợi ý nếu từ khóa quá ngắn
            }
        });
    }
    handleSearch('search-box1','suggestion-list1');
    handleSearch('search-box2','suggestion-list2');
</script>

@endsection
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
<div style="height:200px"></div>
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
                <input id="search-box1" type="text" placeholder="nhập điện thoại 1" name="phone1" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
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
                <input id="search-box2" type="text" placeholder="nhập điện thoại 2" name="phone2" style="padding: 10px; border: 2px solid #78c0ed; border-radius: 20px; outline: none; width: 100%; max-width: 200px; font-size: 16px; margin-top: 10px;">
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
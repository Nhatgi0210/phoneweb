<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMART PHONE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')  }}" rel="stylesheet">
    <!--  -->
    @yield('css')
    {{-- css của inforProduct --}}
    @yield('cssin4')
    <style>
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
        @keyframes slideIn {
    from {
        transform: translateX(100%); /* Bắt đầu từ bên phải ngoài màn hình */
        opacity: 0;
    }
    to {
        transform: translateX(0); /* Đưa vào vị trí ban đầu */
        opacity: 1;
    }
}
@keyframes slideOut {
    from {
        transform: translateX(0); /* Đang ở trong màn hình */
        opacity: 1;
    }
    to {
        transform: translateX(100%); /* Di chuyển ra ngoài màn hình */
        opacity: 0;
    }
}
#userMenu {
    position: fixed; /* Đặt vị trí menu cố định trên màn hình */
    top: 120px; /* Khoảng cách từ viền trên màn hình */
    right: 20px; /* Khoảng cách từ viền phải màn hình */
    background-color: #fff;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    display: none;
    opacity: 0;
    z-index: 1000;
    transform: translateX(80%); /* Bắt đầu ở ngoài màn hình */
    color: #333 !important; /* Sửa lại cú pháp */
}

#userMenu.show {
    display: block;
    opacity: 1;
    transform: translateX(0); /* Hiển thị menu */
}



#userMenu ul {
    list-style: none;
    padding: 10px;
    margin: 0;
    
}

#userMenu ul li {
    padding: 15px;
    border-bottom: 1px solid #eee;
    font-size: 14px; 
}

#userMenu ul li:hover {
    background-color: #f7f7f7;
}

#userMenu ul li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
}

#userMenu ul li a .icon {
    margin-right: 10px;
}

#userMenu .profile {
    text-align: center;
    padding: 20px;
    /* background-color: #007BFF; màu nen cho userr */ 
    background-image: url('img/dammay.png');
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#userMenu .profile img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

#userMenu .profile .name {
    font-size: 20px;
    font-weight: bold;
}

#userMenu .profile .email {
    font-size: 14px;
    color: #ddd;
}

/* footer */
/* Bong bóng chat */
#chat-bubble {
  width: 50px;
  height: 50px;
  background-color: #6200ea;
  color: white;
  font-size: 24px;
  text-align: center;
  line-height: 50px;
  border-radius: 50%;
  position: fixed;
  bottom: 20px;
  right: 20px;
  cursor: pointer;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Hộp thoại chat */
#chat-box {
  display: none;
  width: 300px;
  height: 400px;
  border: 1px solid #ccc;
  border-radius: 10px;
  position: fixed;
  bottom: 80px;
  right: 20px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
}

/* Header */
#chat-header {
  padding: 10px;
  background-color: #6200ea;
  color: white;
  text-align: center;
  font-weight: bold;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Tin nhắn */
#chat-messages {
  flex-grow: 1;
  padding: 10px;
  overflow-y: auto;
  border-bottom: 1px solid #ddd;
}

.bot-message {
  margin-bottom: 10px;
  text-align: left;
  color: #555;
}

.user-message {
  margin-bottom: 10px;
  text-align: right;
  color: #000;
}

/* Gợi ý câu hỏi */
#chat-suggestions {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  padding: 5px;
  justify-content: space-around;
}

.suggestion-btn {
  background-color: #e0e0e0;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  font-size: 12px;
  cursor: pointer;
}

.suggestion-btn:hover {
  background-color: #d6d6d6;
}

/* Input */
#chat-input-container {
  display: flex;
  padding: 10px;
}

#chat-input {
  flex-grow: 1;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 5px;
  outline: none;
}

#send-btn {
  margin-left: 10px;
  padding: 5px 10px;
  background-color: #6200ea;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#send-btn:hover {
  background-color: #4500b5;
}


    </style>
   
   
</head>

<body>
    <!-- Navbar Start -->
        @include('layouts.nav')
    <!-- Navbar End -->
    <div class="space" style="margin-top: 180px"></div>

    {{-- sosanh --}}
    @yield('sosanh') 

{{-- in4 product --}}
@yield('thongtin')

{{-- gio hàng --}}
@yield('giohang')


    @yield('main_content')

   @include('layouts.secondary_content')
 
{{-- menu profile --}}

{{-- endmenu profile --}}

    <!-- Footer Start -->
        @include('layouts.footer')
    <!-- Footer End -->


   
    
{{-- menu logout --}}
{{-- <div class="user-menu" id="userMenu">
    <div class="profile">
        <img src="{{ asset('img/gai.jpg') }}" alt="Profile Picture" style="object-fit: cover;">
        <div class="name">Nguyễn Văn A</div>
        <div class="email"> <p style="color: #8d8a7f;">NguyenVanA@gmail.com</p></div>
    </div>
    <ul>
        <li><a href="#"><i class="fas fa-user icon"></i>Xem thông tin</a></li>
        <li><a href="#"><i class="fas fa-exchange-alt icon"></i>Chuyển đổi tài khoản</a></li>
        <li><a href="#"><i class="fas fa-file-invoice icon"></i>Đơn hàng</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt icon"></i>Đăng xuất</a></li>
    </ul>
</div> --}}
{{-- endmenu logout --}}
<!-- Bong bóng chat -->
<div id="chat-bubble">
    🤔
  </div>
  
  <!-- Hộp thoại chat -->
  <div id="chat-box">
    <div id="chat-header">Hỗ Trợ Khách Hàng</div>
    <div id="chat-messages">
      <!-- Tin nhắn chào mừng -->
      <div class="bot-message"> Quý khách có câu hỏi nào thắc mắc ạ?</div>
    </div>
    <div id="chat-suggestions">
      <button class="suggestion-btn">Hỏi về sản phẩm</button>
      <button class="suggestion-btn">Hỏi về đơn hàng</button>
      <button class="suggestion-btn">Khác</button>
    </div>
    <div id="chat-input-container">
      <input type="text" id="chat-input" placeholder="Nhập tin nhắn...">
      <button id="send-btn">Gửi</button>
    </div>
  </div>
  
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        document.querySelectorAll('.formatted-number').forEach(function(element) {
            let number = parseInt(element.textContent, 10); 
            element.textContent = number.toLocaleString('vi-VN'); 
        });
        function getNumberFromFormattedElement(element) {
            let formattedText = element.textContent; // Lấy nội dung đã format
            let plainNumber = parseInt(formattedText.replace(/\./g, ''), 10); // Loại bỏ dấu chấm và chuyển thành số
        return plainNumber;
        }
        function formatNumber(element){
            let number = parseInt(element.textContent, 10); 
            element.textContent = number.toLocaleString('vi-VN'); 
        }
    </script>
     <script>
        document.querySelector('.confirm-btn').addEventListener('click', function() {
            // Logic xử lý xác nhận ở đây
            alert('Đã xác nhận!');
        });
    </script>
    
    <script>
        window.addEventListener('scroll', function() {
          const cartSummary = document.querySelector('.cart-summary');
          const footer = document.querySelector('footer');
      
          // Lấy vị trí của footer và của cart-summary
          const footerTop = footer.getBoundingClientRect().top;
          const cartSummaryHeight = cartSummary.offsetHeight;
          const windowHeight = window.innerHeight;
      
          if (footerTop < windowHeight) {
              // Khi footer xuất hiện trong vùng hiển thị, đặt cart-summary ở trên footer
              cartSummary.style.position = 'absolute';
              cartSummary.style.bottom = 'auto';
              cartSummary.style.top = `${footer.offsetTop - cartSummaryHeight - 20}px`; // 20px để tạo khoảng cách
          } else {
              // Khi chưa chạm tới footer, giữ cart-summary cố định ở dưới cùng
              cartSummary.style.position = 'fixed';
              cartSummary.style.bottom = '20px';
              cartSummary.style.top = 'auto';
          }
      });
      
          </script>
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
            
                const productId = this.getAttribute('data-product-id');
                const userId = this.getAttribute('data-user-id');
                const routeUrl = "{{ route('cart.add') }}";
                
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `${routeUrl}`, true);

            
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content')); // CSRF Token
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if(xhr.responseText.length < 50)
                            alert(xhr.responseText);
                        else{
                            window.location.href = "{{ route('login') }}";

                        }
                    };
                };

                xhr.onerror = function () {
                    alert('Không thể kết nối đến server.');
                };
                const data = JSON.stringify({
                    product_id: productId,
                    user_id: userId
                });
                xhr.send(data);
            });
        });

    </script>
    <script>
        window.onload = () => {
  const chatBox = document.getElementById('chat-box');
  chatBox.style.display = 'none'; // Đảm bảo chat box luôn bị ẩn khi tải trang
};
// Lấy các phần tử cần thiết
const chatBubble = document.getElementById('chat-bubble');
const chatBox = document.getElementById('chat-box');

// Hiện/Ẩn hộp thoại chat khi nhấn bong bóng
chatBubble.addEventListener('click', (e) => {
  e.stopPropagation(); // Ngừng sự kiện bọt khí để tránh việc đóng hộp thoại khi nhấn bong bóng
  // Toggle hiển thị hộp thoại chat
  if (chatBox.style.display === 'none' || chatBox.style.display === '') {
    chatBox.style.display = 'flex'; // Hiện hộp thoại
  } else {
    chatBox.style.display = 'none'; // Ẩn hộp thoại
  }
});

// Ẩn hộp thoại khi nhấn ra ngoài
document.addEventListener('click', (e) => {
  // Kiểm tra nếu nhấn ra ngoài hộp thoại và bong bóng
  if (!chatBox.contains(e.target) && e.target !== chatBubble) {
    chatBox.style.display = 'none'; // Ẩn hộp thoại
  }
});

// Gửi tin nhắn
const sendBtn = document.getElementById('send-btn');
const chatInput = document.getElementById('chat-input');
const chatMessages = document.getElementById('chat-messages');

function sendMessage(message) {
  if (message.trim() === '') return;

  // Thêm tin nhắn người dùng
  const userMessage = document.createElement('div');
  userMessage.textContent = `Bạn: ${message}`;
  userMessage.className = 'user-message';
  chatMessages.appendChild(userMessage);

  // Clear input
  chatInput.value = "";

  // Tự động cuộn xuống cuối
  chatMessages.scrollTop = chatMessages.scrollHeight;

  // Thêm phản hồi bot
  setTimeout(() => {
    const botReply = document.createElement('div');
    botReply.textContent = "Cảm ơn quý khách! Chúng tôi sẽ phản hồi ngay.";
    botReply.className = 'bot-message';
    chatMessages.appendChild(botReply);

    chatMessages.scrollTop = chatMessages.scrollHeight;
  }, 1000);
}

// Sự kiện nhấn nút Gửi
sendBtn.addEventListener('click', () => {
  sendMessage(chatInput.value);
});

// Nhấn Enter để gửi tin nhắn
chatInput.addEventListener('keypress', (e) => {
  if (e.key === 'Enter') {
    sendMessage(chatInput.value);
  }
});

// Sự kiện cho các nút gợi ý
const suggestionButtons = document.querySelectorAll('.suggestion-btn');
suggestionButtons.forEach((button) => {
  button.addEventListener('click', () => {
    sendMessage(button.textContent);
  });
});

</script>
</body>

</html>
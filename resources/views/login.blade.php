<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/stylelogin.css"/>
 
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/styleLogin.css')
  </head>
  <body>
    <div class="container">
      <div class="Form login-form">
        <h2>Login</h2>
        <form  action="xulia.php" method="post" name="form">
          <div class="input-box">
            <i class="bx bxs-user"></i>
            <label for="#">Email </label>
            <input type="text"id="email" placeholder="Nhập Email*" name="name" />
          </div>
          <div class="input-box">
            <i class="bx bxs-key"></i>
            <input type="text"id="password" placeholder="Nhập mật khẩu*" name="matkhau" />
            <label for="#">Password</label>
          </div>
          <div class="forgot-section">
            <span
              ><input type="checkbox" name="" id="checked" />Remember Me</span
            >
            <span><a href="#">Quên mật khẩu ?</a></span>
          </div>
          <button class="btn" onclick="validateForm()">Login</button>
        </form>
       
        <p class="RegisteBtn RegiBtn"><a href="#">Register Now</a></p>
      </div>
      <div class="Form Register-form">
        <h2>Register</h2>
        <form action="#">
          <div class="input-box">
            <i class="bx bxs-user"></i>
            <label for="#">Nhập Email mới:</label>
            <input type="text"id="newemail" placeholder="Nhập Email*" />
          </div>
          <div class="input-box">
            <i class="bx bxs-key"></i>
            <input type="text"id="newpassword" placeholder="Nhập mật khẩu*" />
            <label for="#">Mật khẩu</label>
          </div>
          <div class="input-box">
            <i class="bx bxs-key"></i>
            <input type="text"id="newpassword2" placeholder="Nhập lại mật khẩu*" />
            <label for="#">Nhập lại mật khẩu</label>
          </div>
          <div class="forgot-section">
            <span
              ><input type="checkbox" name="" id="checked" />Remember Me</span
            >
            <span><a href="#">Forgot Password ?</a></span>
          </div>
          <button class="btn" class="loginBtn" onclick="validateForm2()">Register</button>
        </form>
       
        <p class="LoginBtn"><a href="#">Login Now</a></p>
      </div>
    </div>
    <script>
      const container = document.querySelector(".container");
      const loginForm = document.querySelector(".login-form");
      const registerForm = document.querySelector(".Register-form");
      const regiBtn = document.querySelector(".RegiBtn");
      const loginBtn = document.querySelector(".LoginBtn");

      regiBtn.addEventListener("click", () => {
        registerForm.classList.add("active");
        loginForm.classList.add("active");
      });

      loginBtn.addEventListener("click", () => {
        registerForm.classList.remove("active");
        loginForm.classList.remove("active");
      });

      // Redirect to index.html when clicking outside the forms
      document.body.addEventListener("click", (event) => {
        if (!container.contains(event.target)) {
          window.location.href = "index.html";
        }
      });

      // Prevent body click event when clicking inside the container
      container.addEventListener("click", (event) => {
        event.stopPropagation();
      });
    </script>
  <script>
    function validateForm() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
    
      // Kiểm tra nếu email hoặc password trống
      if (email === "" || password === "") {
        alert("Vui lòng điền đủ thông tin.");
        return;
      }
    
      // Kiểm tra định dạng email và độ dài ít nhất 13 kí tự
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email) || email.length < 13) {
        alert("Email sai định dạng và phải ít nhất 13 kí tự.");
        return;
      }
    
      // Kiểm tra mật khẩu có ít nhất 8 kí tự
      if (password.length < 8) {
        alert("Mật khẩu ít nhất 8 kí tự.");
        return;
      }
    
      // Nếu tất cả điều kiện đều đúng, có thể gửi form
      alert("Đăng nhập thành công!");
    }
    </script>
    <script>
      function validateForm2() {
        var newemail = document.getElementById("newemail").value;
        var newpassword = document.getElementById("newpassword").value;
        var newpassword2 = document.getElementById("newpassword2").value;
      
        // Kiểm tra xem các trường nhập liệu có để trống không
        if (newemail === "" || newpassword === "" || newpassword2 === "") {
          alert("Bạn chưa điền thông tin.");
          return false;
        }
      
        // Kiểm tra định dạng email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(newemail)) {
          alert("Email không đúng định dạng.");
          return false;
        }
      
        // Kiểm tra mật khẩu có ít nhất 8 ký tự
        if (newpassword.length < 8 || newpassword2.length < 8) {
          alert("Mật khẩu ít nhất phải có 8 ký tự.");
          return false;
        }
      
        // Kiểm tra mật khẩu và mật khẩu xác nhận giống nhau
        if (newpassword !== newpassword2) {
          alert("Mật khẩu không trùng khớp.");
          return false;
        }
      
        alert("Đăng kí thành công!");
      
        // Nếu tất cả điều kiện đều đúng, cho phép submit form
        return true;
      }
      </script>
      
  </body>
</html>

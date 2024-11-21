<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Signup Form</title>
  <link rel="stylesheet" href="style.css">
  <style>
   /* Các CSS bạn đã viết trước đó */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #f0f0f0;
  position: relative;
}

.container {
  display: flex;
  width: 100%;
  max-width: 900px;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  position: relative;
  z-index: 2;
}

.form-container {
  flex: 1;
  padding: 40px;
  display: flex;
  flex-direction: column; /* Đảm bảo các phần tử bên trong được sắp xếp theo chiều dọc */
  justify-content: center;
}

h2 {
  color: #ff6b6b;
  margin-bottom: 20px;
  text-align: center; /* Đảm bảo tiêu đề được căn giữa */
}

.social-icons {
  display: flex;
  justify-content: center; /* Căn giữa các logo */
  gap: 10px;
  margin-bottom: 20px;
}

.social-icons a img {
  width: 24px;
  height: 24px;
}

p {
  color: #666666;
  margin-bottom: 20px;
  text-align: center; /* Căn giữa đoạn văn */
}

form {
  display: flex;
  flex-direction: column;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
  outline: none;
}

.checkbox-container {
  display: flex;
  align-items: center;
  font-size: 14px;
  color: #666666;
  margin-bottom: 20px;
  justify-content: center; /* Căn giữa các liên kết */
}

.checkbox-container input {
  margin-right: 10px;
}

.checkbox-container a {
  color: #ff6b6b;
  text-decoration: none;
}

.checkbox-container a:hover {
  text-decoration: underline;
}

button {
  padding: 12px;
  border: none;
  border-radius: 5px;
  background-color: #ff6b6b;
  color: #ffffff;
  font-size: 16px;
  cursor: pointer;
  margin-bottom: 15px;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #e65555;
}

.signin-btn {
  background-color: #ffffff;
  color: #ff6b6b;
  border: 1px solid #6bff75;
}

.signin-btn:hover {
  background-color: #77f3a5;
  color: #ffffff;
}

.illustration {
  display: none;
  flex: 1;
  background: url('{{ asset('img/bglogin12.jpg') }}') center/cover no-repeat;
}

@media (min-width: 768px) {
  .illustration {
    display: block;
  }
}

/* Mở rộng thẻ a bao phủ toàn bộ body */
a {
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1; /* Thẻ <a> nằm dưới form */
  cursor: pointer;
}

  </style>
</head>
<body>
  <!-- Thẻ <a> để chuyển hướng khi nhấp ngoài form -->
  <a href="{{ route('home') }}"></a> 

  <div class="container">
    <div class="form-container" id="signupForm">
      <h2>Create Account</h2>
      
      <p>Vui lòng điền đủ thông tin</p>
      <form action="#">
        <input type="text" placeholder="Name" required>
        <input type="email" placeholder="Email" required>
        <input type="text" placeholder="Phone number" required>
        <input type="password" placeholder="Password" required>
        <input type="password" placeholder="Confirm Password" required>
        <label class="checkbox-container" >
          <input type="checkbox" required>
        Tôi đồng ý với&nbsp;<div class="p" style="color: red;"><u>Điều khoản</u></div>&nbsp;của công ty
        </label>
        <button type="submit">Sign Up</button>
      </form>
      <button class="signin-btn">Sign In</button>
    </div>
    <div class="illustration">
      <!-- Illustration background -->
    </div>
  </div>
</body>
</html>

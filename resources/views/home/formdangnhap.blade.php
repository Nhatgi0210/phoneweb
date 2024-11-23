<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Login Form</title>
  <link rel="stylesheet" href="style.css">
  <style>
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
}

.container {
  display: flex;
  width: 100%;
  max-width: 900px;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.illustration {
  display: none;
  flex: 1;
  background: url('img/bgdangnhap33.jpg') center/cover no-repeat;
}

.form-container {
  flex: 1;
  padding: 40px;
}

h2 {
  color: #ff6b6b;
  margin-bottom: 20px;
}

.social-icons {
  display: flex;
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
}

form {
  display: flex;
  flex-direction: column;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
  outline: none;
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

.signup-link {
  font-size: 14px;
  color: #666666;
}

.signup-link a {
  color: #ff6b6b;
  text-decoration: none;
}

.signup-link a:hover {
  text-decoration: underline;
}

@media (min-width: 768px) {
  .illustration {
    display: block;
  }
}

  </style>
</head>
<body>
  <div class="container">
    <div class="illustration">
      <!-- Phần minh họa bên trái -->
    </div>
    <div class="form-container">
      <h2>Login to Your Account</h2>
      <div class="social-icons">
        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/google-logo.png" alt="Google"></a>
        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/facebook.png" alt="Facebook"></a>
      </div>
      <p>or use your email account:</p>
      <form action="#">
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <button type="submit">Sign In</button>
      </form>
      <p class="signup-link">Don't have an account? <a href="{{ route('dangki') }}">Sign Up</a></p>
    </div>
  </div>
</body>
</html>
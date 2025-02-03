
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Login and Registration Page</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

   
    <nav id="navbar">
        <ul id="nav-links">
            <li><a href="home1.php">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>


    <div class="login-container">
        <div class="login-box">
            <h1>Login To Vote</h1>
            <form class="login-form" method="POST" action="logincheck.php">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Enter Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : (isset($_COOKIE['username']) ? $_COOKIE['username'] : ''); ?>" required>
                </div>

                <div class="input-group">
    <label for="password">Password:</label>
    <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <i class="fa fa-eye" id="togglePassword"></i>
    </div>
</div>

                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <input type="submit" id="submit" value="Login">
            </form>

            <div class="forgot-password">
                <button><a href="#">Forgot Password?</a></button>
            </div>
        </div>
    </div>

    <script>
        
        const togglePassword = document.querySelector("#togglePassword");
const passwordField = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
  const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});
    </script>

</body>
</html>



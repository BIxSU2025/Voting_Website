<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        #logo img{
            border: none;
            border-radius: 50%;
            height: 50px;
            width: 70px;
                }
#navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: #fff;
  border-bottom: 1px solid #ddd;
}

    </style>
</head>
<body>



    <nav id="navbar">
                <div id="logo">
                <img src="./photo/logo1.png" alt="logo ">
                </div>


                
<ul id="nav-links">
    <li><a href="adminloginpage.php">Admin</a></li>
    <li><a href="loginpage.php">Login In</a></li>
  <li> <a href="#">News</a></li>
  <li> <a href="#">Contact Us</a></li>
  <li> <a href="home1.php">Home</a></li>
</ul>

    </nav>
    <section class="banner">
        <h1>Want Development then Vote the Right Candidate.</h1>
        <p>Introducing Our New Online voting platform vote faster and securely.</p>
        <button>Learn more</button>
    </section>
    <section class="grid">
        <a href="newaccountregistration.php">
            <i class="fa-regular fa-address-card fa-beat fa-2xl" style="color: #c64727;"></i>
            <h3>Registration</h3> 
            
        </a>
        <a href="howtovote.php">
            <i class="fa-solid fa-envelope-open-text fa-bounce fa-2xl" style="color: #c64727;"></i>
            <h3>How to Vote</h3>
        </a>
        
        <a href="result.php">
            <i class="fa-solid fa-square-poll-vertical fa-beat fa-2xl" style="color: #513f1f;"></i>
            <h3>View Election Results</h3>
        </a>
        
    </section>
</body>
</html>
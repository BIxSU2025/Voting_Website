<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Registration</title>
    <style>
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Navbar Styling */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(2px); 
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            z-index: 1000;
        }

        #nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            margin-left: auto; /* Push links to the right */
        }

        #nav-links li {
            margin: 0 15px;
        }

        #nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            position: relative;
            display: inline-block;
            padding-bottom: 5px;
        }

        #nav-links a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background: #ff7e5f;
            transition: width 0.3s ease-in-out;
        }

        #nav-links a:hover::after {
            width: 100%;
        }

        /* Back Button */
        .back-btn {
            margin-top: 100px;
            background-color: #ff7e5f;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        /* Form Container Styling */
        .container {
            /* background-color: #ffffff; */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 150px;
        }

        .title {
            text-align: center;
            font-family: 'Georgia', serif;
            font-weight: bold;
            font-size: 24px;
            color: #333;
        }

        /* Form Fields Styling */
        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input:focus, select:focus {
            border-color: #ff7e5f;
        }

        .btn {
            margin-top: 20px;
            background-color: #ff7e5f;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        .btn:hover {
            background-color: #bb4a2e;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul id="nav-links">
            <li><a href="home1.php">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="loginpage.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="title">New Account Registration</div>
        <form action="insertNewAccountcheck.php" method="post" enctype="multipart/form-data">
            <label for="username">User Name:</label>
            <input type="text" name="username" placeholder="Insert a Valid Username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Insert a Valid Email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Insert a Password" required>

            <label for="retype_password">Retype Password:</label>
            <input type="password" name="retype_password" placeholder="Retype Password" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" name="address" placeholder="Insert Your Address" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" placeholder="Insert Your Phone Number" required>

            <label for="voters_id_number">Enter Voter's ID Number:</label>
            <input type="text" name="voters_id_number" placeholder="Insert Voter's ID Number" required>

            <label for="voters_id">Upload Voter's ID:</label>
            <input type="file" name="voters_id" required>

            <input type="submit" class="btn" value="Register">
        </form>
    </div>
</body>
</html>

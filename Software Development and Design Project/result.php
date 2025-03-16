<?php
include("dbconnect.php");


$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch vote counts
$data = [];
$candidates = ['Person A', 'Person B', 'Person C'];
foreach ($candidates as $candidate) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM voting_system WHERE candidate_name = ?");
    $stmt->bind_param("s", $candidate);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $data[$candidate] = $count;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Vote Results</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            text-align: center;
            padding: 20px;
        }
        .result-container {
            width: 80%;
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .result-item {
            font-size: 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    
<nav id="navbar">
                  
<ul id="nav-links">
<li> <a href="home1.php">Home</a></li>
    
  <li> <a href="#">News</a></li>
  <li> <a href="#">Contact Us</a></li>
  <li><a href="loginpage.php">Login In</a></li>
  
</ul>

    </nav>





    <h1>Live Voting Results</h1>
    <div class="result-container">
        <?php foreach ($data as $candidate => $count): ?>
            <div class="result-item">
                <strong><?php echo $candidate; ?>:</strong> <?php echo $count; ?> votes
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

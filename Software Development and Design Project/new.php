<?php

include("logincheck.php");
include("dbconnect.php");

// Ensure a user is logged in before proceeding
if (!isset($_SESSION['username'])) {
    exit();
}

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username']; // Get the logged-in username

// Check if the user has already voted
$stmt = $conn->prepare("SELECT candidate_name FROM voting_system WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

$hasVoted = ($stmt->num_rows > 0);
$stmt->close();

// Handle voting
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vote']) && !$hasVoted) {
    $candidate = $_POST['vote'];

    $stmt = $conn->prepare("INSERT INTO voting_system (username, candidate_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $candidate);

    if ($stmt->execute()) {
        $hasVoted = true; // Update voting status
        echo "<p class='success-message' style='text-align: center;'>Thank you, $username! You voted for $candidate!</p>";
    } else {
        echo "<p class='error-message' style='text-align: center;'>Error saving your vote.</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background: #333;
            padding: 1rem;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        nav li {
            color: white;
            list-style: none;
            font-size: 1rem;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .voting-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        .candidate {
            margin: 15px 0;
            padding: 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 25px; /* Fully rounded buttons */
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            width: 100%;
        }

        .candidate:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .success-message {
            color: #28a745;
            font-size: 18px;
        }

        .error-message {
            color: #dc3545;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <nav>
        <li style="float:right; padding-top:15px; font-weight:bold;">Welcome: <?php echo $_SESSION['username']; ?></li>
        <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </nav>

    <div class="container">
        <div class="voting-container">
            <h1>Vote for Your Candidate</h1>

            <?php if ($hasVoted): ?>
                <p class="error-message">You have already voted!</p>
            <?php else: ?>
                <form method="POST">
                    <button class="candidate" type="submit" name="vote" value="Person A">Vote for A</button>
                    <button class="candidate" type="submit" name="vote" value="Person B">Vote for B</button>
                    <button class="candidate" type="submit" name="vote" value="Person C">Vote for C</button>
                </form>
            <?php endif; ?>
            
        </div>
    </div>

</body>
</html>

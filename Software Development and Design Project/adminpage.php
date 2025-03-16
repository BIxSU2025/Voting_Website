<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
        }

        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            background-color: #333;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
        }

        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .logout-btn {
            background-color: red;
            border: none;
            padding: 0.5rem 1rem;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: darkred;
        }

        /* Table styling */
        table {
            width: 70%;
            margin: 5rem auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 1rem;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btndelete, .btnsuccess {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .btndelete {
            background-color: red;
            color: white;
        }

        .btnsuccess {
            background-color: green;
            color: white;
        }

        .btndelete:hover {
            background-color: darkred;
        }

        .btnsuccess:hover {
            background-color: darkgreen;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <form action="logoutadminpage.php" method="POST" style="margin: 0;">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <?php
    include("dbconnect.php");

    try {
        $q = "SELECT `ID`, `username`, `status` FROM `newaccountregistration`";
        $result = mysqli_query($con, $q);

        echo "<table>";
        echo "<tr><th>S.N</th><th>Username</th><th>Status</th><th colspan=3>Action</th></tr>";

        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $id = $row[0];

            $rowColor = $row[2] == "pending" ? "color:black" : ($row[2] == "active" ? "color:green" : "color:red");
            echo "<tr style='{$rowColor}'>";

            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }

            echo "<td><a href='suspendUser.php?id=$id' class='btndelete'>Suspend</a></td>";
            echo "<td><a href='activateUser.php?id=$id' class='btnsuccess'>Activate</a></td>";
            echo "<td><a href='deleteUser.php?id=$id' class='btndelete'>Delete</a></td>";
            echo "</tr>";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
</body>
</html>
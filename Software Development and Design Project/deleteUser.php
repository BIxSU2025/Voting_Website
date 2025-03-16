<?php
include("dbconnect.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer for security

    $query = "DELETE FROM newaccountregistration WHERE ID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

   
    header("Location: adminpage.php");
    exit();
}
?>

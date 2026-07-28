<?php

require_once '../includes/auth.php';

requireRole('Student');

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Student Dashboard</h1>

        <p>Welcome, <?php echo htmlspecialchars($_SESSION['student_name']); ?>.</p>

        <a href="../logout.php">Logout</a>
    </div>

</div>

</body>

</html>
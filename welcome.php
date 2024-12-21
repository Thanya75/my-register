<?php 
session_start();

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo "<script>
        alert('กรุณาเข้าสู่ระบบก่อนใช้งานหน้านี้');
        window.location.href = 'signin.php'; 
    </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?php echo htmlspecialchars($_SESSION['fname'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <hr>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, quibusdam earum laudantium praesentium ab
            reiciendis atque voluptas, et similique, corrupti voluptatibus quam esse. Mollitia sed autem necessitatibus
            nulla accusamus pariatur.
        </p>
        <hr>
        <a href="logout.php" class="btn btn-danger" onclick="return confirm('ยืนยันการออกจากระบบ?')"
            class="glyphicon glyphicon-log-in">logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlK
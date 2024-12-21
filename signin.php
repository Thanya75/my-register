<?php
    session_start();
    include_once('functions.php');
    $userdata = new DB_con();

    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $password = $_POST['password'];

        $result = $userdata->signin($uname, $password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['fullname'];
            echo "<script>alert('Login Successful!');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('รหัสผ่านไม่ถูกต้อง!');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">เข้าสู่ระบบ</h1>
        <form method="post">
            <div  iv class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
            <br>
            <br>
            <a href="register.php" >ยังไม่ได้สมัครสมาชิก</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    include_once('functions.php');
    $userdata = new DB_con();

    if (isset($_POST['submit'])) {
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $uemail = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            echo "<script>
                alert('รหัสผ่านไม่ตรงกัน โปรดลองอีกครั้ง');
                window.location.href = 'register.php';
            </script>";
            exit();
        }

        $sql = $userdata->registration($fname, $uname, $uemail, $password);

        if ($sql) {
            echo "<script>alert('Registor Successful!');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again.');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="mt-5">สมัครสมาชิก</h1>
        <form method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="username" name="fullname" required>
            </div>
            <div iv class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)"
                    required>
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                    onblur="validateForm(this.value)" required>
                <span id="passwordavailable"></span>
            </div>
            <button type="submit" name="submit" id="submit" onclick="return confirm('ยืนยันการสมัครสมาชิก?')"
                class="btn btn-success">Register</button>
            <br>
            <br>
            <a href="signin.php">เป็นสมาชิกอยู่แล้ว</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    function checkusername(val) {
        $.ajax({
            type: 'POST',
            url: 'checkuser_available.php',
            data: 'username=' + val,
            success: function(data) {
                $('#usernameavailable').html(data);
            }
        });
    }

    function validateForm() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            alert('รหัสผ่านไม่ตรงกัน โปรดลองอีกครั้ง');
            return false; // ป้องกันการส่งฟอร์ม
        }
        return true; // อนุญาตให้ส่งฟอร์ม
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>
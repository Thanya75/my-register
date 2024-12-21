<?php 

    include_once('functions.php');

    $usernamecheck = new DB_con();

    // Getting post value
    $uname = $_POST['username'];

    $sql = $usernamecheck->usernameavailable($uname);

    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        echo "<span style='color: red;'>ชื่อผู้ใช้นี้เชื่อมโยงกับบัญชีอื่นแล้ว.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color: green;'>ชื่อผู้ใช้ สามารถลงทะเบียนได้.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>

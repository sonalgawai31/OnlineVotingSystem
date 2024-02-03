<?php
    session_start();
    include("connect.php");

    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role' ");

    if(mysqli_num_rows($check)>0) {
        $userData = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role = 2");
        $groupsData = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userData'] = $userData;
        $_SESSION['groupsData'] = $groupsData;

        echo '
            <script>
                window.location = "../routes/dashboard.php";
            </script>
        ';
    }
    else{
        echo '
            <script>
                alert("Invalid Credential or User not found");
                window.location = "../";
            </script>
        ';
    }
?>
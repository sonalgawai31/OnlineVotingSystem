<?php
    include("connect.php");

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['temp_name'];
    $role = $_POST['role'];

    if ($password == $cpassword) {
        move_uploaded_file($temp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name','$mobile','$address','$password','$image','$role',0,0)");
        if ($insert) {
            echo '
            <script>
                alert("Registration Successfully");
                window.location = "../";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("Some error occur");
                window.location = "../routes/registration.html";
            </script>
        '; 
        }
    }else{
        echo '
        <script>
            alert("Password and confirm password does not match");
            window.location = "../routes/registration.html";
        </script>
        ';
    }
?>
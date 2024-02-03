<?php
    session_start();
    if(!isset($_SESSION['userData'])){
        header("location: ../");
    }

    $userData = $_SESSION['userData'];
    $groupsData = $_SESSION['groupsData'];

    if($_SESSION['userData']['status']==0){
        $status = '<b style="color:red">Not Votted</b>';
    }else{
        $status = '<b style="color:green">Votted</b>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Online Voting System - Dashboard</title>
</head>
<body>
    <style>
        #backbtn{
            color: white;
            background-color: blue;
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            float: left;
            margin: 10px;
        }
        #logoutbtn{
            color: white;
            background-color: blue;
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            float: right;
            margin: 10px;
        }
        #profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }
        #Group{
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;
        }
        #votebtn{
            color: white;
            background-color: blue;
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
        }
        #mainpanel{
            padding: 10px;
        }
        #voted{
            color: white;
            background-color: green;
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
        }
    </style>
    <div id="mainSection">
        <center>
        <div id="headerSection">
        <a href="../"><button id="backbtn"> Back</button> </a>
        <a href="../routes/logout.php"><button id="logoutbtn">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        </center>
        <hr>
        <div id="mainpanel">
        <div id="profile">
           <center> <img src="../uploads/<?php echo $userData['photo'] ?>" alt="" height="150px" width="150px"> </center><br><br>
            <b>Name : </b><?php echo $userData['name']?>  <br><br>
            <b>Mobile : </b><?php echo $userData['mobile']?> <br><br>
            <b>Adress : </b><?php echo $userData['address']?> <br><br>
            <b>Status : </b><?php echo $status ?> <br><br>
        </div>
        <div id="Group">
            <?php
                if($_SESSION['groupsData']){
                    for($i = 0 ; $i < count($groupsData) ; $i++){
                        ?>
                        <div>
                            <img style="float: right;" src="../uploads/<?php echo $groupsData[$i]['photo']  ?>" alt="" height="100px" width="100px">
                            <b>Group Name : </b><?php echo $groupsData[$i]['name'] ?> <br><br>
                            <b>Votes : </b><?php echo $groupsData[$i]['votes'] ?> <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsData[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsData[$i]['id'] ?>">
                                <?php
                                    if($_SESSION['userData']['status']==0){
                                        ?>
                                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                                        <?php
                                    }else{
                                        ?>
                                            <button disabled type="button"  name="votebtn" value="vote" id="voted">voted</button>
                                        <?php
                                    }
                                ?>
                            </form>
                        </div>
                        <hr>
                        <?php
                    }
                }else{

                }
            ?>
        </div>
        </div>

    </div>
</body>
</html>
<?php
    require_once("config.php");

    $conn = mysqli_connect(DBSERVER,DBUSER,DBPASS,"you");

$alldata =  mysqli_query($conn ,"SELECT * FROM `form` ");
while($data = mysqli_fetch_assoc($alldata)){

    $usernames = $data['username'];
    echo $usernames;
}

 
<?php
    require_once("./app/conection.php");

    function direct($web){
        ob_start();
        header("location:$web");
        exit;
    }

    function excution($sql){
        global $conn;
        return mysqli_query($conn , $sql);

    }
    
    function alldata($sql){
        $user = excution($sql);
        $alldataa = [];
        while ($aa = mysqli_fetch_assoc($user)) {
            $alldataa [] = $aa;
        }
        return $alldataa;
        
    }

    function countuser($sql){
        global $conn;
        $resalt = mysqli_query($conn , $sql);
        $count = mysqli_num_rows($resalt);
        return $count;
    }
    function finduser($sql){
        
        global $conn;
        $resalt = mysqli_query($conn , $sql);
        return mysqli_fetch_assoc($resalt) ;
    }

?>
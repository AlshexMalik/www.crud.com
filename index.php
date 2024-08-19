

<?php
require_once("print.php");
ob_start();
 

 

require('./app/helper.php') ;


    if(isset($_POST['sub'])){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $gendar = $_POST['gendara'];
        
        excution("INSERT INTO `user`(`user_name`, `user_email`, `user_passowrd`, `user_gendar`)
         VALUES ('{$name}','{$email}','{$pass}','{$gendar}')");
       direct('./index.php');
    }
    if (isset($_GET['delet_id'])) {
      
        $delet__id = $_GET['delet_id'];
      
        $check = countuser("SELECT * FROM `user` WHERE `user_id`=$delet__id ");

        if ($check > 0) {
            echo "2";
                excution("DELETE FROM `user` WHERE `user_id`=$delet__id ");
                direct('./index.php');
           
         
        }else echo "not found";
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row m-auto">
        <h1 class="text-primary text-center">start crud</h1>
                <hr>
        <div class="col">
                <?php
                    if (isset($_GET['update_id'])) {
                        $up__id = $_GET['update_id'];
                        $da = finduser("SELECT * FROM `user` WHERE `user_id`=$up__id ");
                      
                      $check = countuser("SELECT * FROM `user` WHERE `user_id`=$up__id ");
                      
                      if ($check > 0) {
                          
                        # $namee = $_POST['namee'];
                        #  $passe = $_POST['passe'];
                        #  $emaile = $_POST['emaile'];
                        #  $gendare = $_POST['gendarae'];
                        # excution("UPDATE `user` SET `user_name`='{$namee}',`user_email`='{$emaile}',`user_passowrd`='{$passe}',`user_gendar`='{$gendare}' WHERE `user_id =$update__id ");
                        # direct('./index.php');
                      }else echo "not found";
                        ?>
                         <form action="index.php" method="POST">
                    <div class="col-lg-6 col-12 m-auto p-5 shadow">
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" readonly value="<?=$up__id;?>"  required placeholder="UserName" name="id">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" value="<?=$da['user_name'];?>"  required placeholder="UserName" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="email" class="form-control" value="<?=$da['user_email'];?>"  required  placeholder="Email" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                    <input type="password" class="form-control"   required  placeholder="Password" name="pass">
                    </div>
                    <div class="mb-3 mt-3">
                    <select required name="gendara" class="form-select">
                    <option><?=$da['user_gendar'];?></option>    
                    <option value="male">male</option>
                        <option value="femal">female</option>
                        
                     </select> 
                    </div>

                        <button type="submit" class="btn btn-success form-control" name="sube">Submit</button>
                    </div>
                    </form> 

                    <?PHP

                    }else{
                    ?>
                    <form action="index.php" method="POST">
                    <div class="col-lg-6 col-12 m-auto p-5 shadow">
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control"  required placeholder="UserName" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="email" class="form-control" required  placeholder="Email" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                    <input type="password" class="form-control" required  placeholder="Password" name="pass">
                    </div>
                    <div class="mb-3 mt-3">
                    <select required name="gendara" class="form-select">
                    <option></option>    
                    <option value="male">male</option>
                        <option value="femal">female</option>
                        
                     </select> 
                    </div>

                        <button type="submit" class="btn btn-primary form-control" name="sub">Submit</button>
                    </div>
                    </form> 
                    <?php

}
                        

                ?>
            </div>
            <?php 

            ?>
        </div>
        <div class="row">
            <div class="col">
    <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>full name</th>
                            <th>Email</th>
                            <th>creat account</th>
                            <th>apdate account</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            
                            $bb =alldata("SELECT * FROM `user`;");
                            
                            foreach($bb as $user){
                               
                                ?>
                            <tr>
                            <td><?=$user['user_id'];?></td>
                            <td><?=$user['user_name'];?></td>
                            <td><?=$user['user_email'];?></td>
                            <td><?=$user['user_creat'];?></td>
                            <td><?=$user['user_updat'];?></td>

                            <td>
                                <a class="btn btn-warning" href="index.php?update_id=<?=$user['user_id'];?>">edit</a>
                                <a class="btn btn-danger" href="index.php?delet_id=<?=$user['user_id'];?>">delet</a>
                            </td>
                        </tr>


                                <?php
                            }
                        ?>                   
                         <tr>
                        <th>
                        all users <?=countuser("SELECT * FROM `user`;");?>
                        
                        </th>
                    </tr>
                    </tbody>

                </table>
                </div>
            </div>
        </div><a href="print.php" class="btn btn-primary" >print</a>
    </div>
</body>
</html>
<?php
    if(isset($_POST['sube'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $gendar = $_POST['gendara'];
        
        excution("UPDATE `user` SET `user_name`='{$name}',`user_email`='{$email}',`user_passowrd`='{$pass}',`user_gendar`='{$gendar}' 
        WHERE `user_id`= {$id}");
       direct('./index.php');
    }


?>
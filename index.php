<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP CRUD application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<div class="container">
    
    <?php require_once"server.php"; ?>

    <?php  
        if(isset($_SESSION['message'])) :
    ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>" >
            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            header("Refresh:1");
             ?>
    </div>

    <?php endif; ?>
    <?php 
        $mysqli= new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));
        $result= $mysqli->query("SELECT * FROM Datatable") or die($mysqli->error);
        //pre_r($result);
        //pre_r($result->fetch_assoc());
    ?>

    <div class="row justify-content-center">
    <table class="table">
    <thead>
    <tr>
        
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>location</th>
        <th>Registration Date</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    
    <?php
        while($row=$result->fetch_assoc()): 
    ?>
    <tr>
        <td><?php echo $row['name'];  ?></td>
        <td><?php echo $row['email'];  ?></td>
        <td><?php echo $row['phone'];  ?></td>
        <td><?php echo $row['location'];  ?></td>
        <td><?php echo $row['RegistrationDate']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>"  class="btn btn-info"> Edit</a>
            <a href="server.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
        
        </td>
    </tr>
    <?php endwhile; ?>
    
    </table>
    
    </div>

        
    <?php

        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
    <div class="row justify-content-center my-5">
    <form class="form-group" action="server.php" method="post" style="width: 500px;">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group">
    <label for="name">Name</label>
    <input class="form-contdol" type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your full name" required>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input class="form-contdol" type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
    <label for="phone">Phone</label>
    <input class="form-contdol" type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone number" required>
    </div>
    <div class="form-group">
    <label for="location">Location</label>
    <input class="form-contdol" type="text" name="location" value="<?php echo $location; ?>" placeholder="Location" required>
    </div>
    <br>
    <?php
        if($update==true) :
    ?>
    <button class="btn btn-info" type="submit" name="update">Update</button>
    <?php else : ?>
    <button class="btn btn-primary" type="submit" name="save">Submit</button>
    <?php endif; ?>

    
    </form>
    </div>
    </div>
</body>
</html>
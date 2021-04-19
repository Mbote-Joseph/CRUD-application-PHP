<?php
 session_start();
$mysqli= new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));
$id=0;
$name='';
$email='';
$phone='';
$location='';
$update=false;


if(isset($_POST['save'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $location=$_POST['location'];


    $mysqli->query("INSERT INTO Datatable(name, email, phone,location) VALUES('$name','$email','$phone','$location')" ) or 
     die($mysqli->error);


    $_SESSION['message']="Record Created !";
    $_SESSION['msg_type']="success";

    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    

    $mysqli->query("DELETE FROM Datatable WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record Deleted !";
    $_SESSION['msg_type']="danger";
    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $result =$mysqli->query("SELECT * FROM Datatable WHERE id=$id") or die($mysqli->error);

    if(count($results->num_rows)){
        $row= $result->fetch_array();
        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $location=$row['location'];

    }
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $location=$_POST['location'];

    $mysqli->query("UPDATE Datatable SET name='$name', email='$email', phone='$phone', location='$location' WHERE id=$id ") or die($mysqli->error);


    $_SESSION['message']='Record have being updated !';
    $_SESSION['msg_type']='info';
    header("location: index.php");
}

//$result= $mysqli->query("SELECT * FROM Datatable") or die($mysqli->error);

?>
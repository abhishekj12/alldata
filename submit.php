<?php
    include('connection.php');
    if(isset($_POST['submit'])){
        //echo "<pre>";print_r($_POST);exit;
            try{
                $name= $_POST['name'];
                $email=$_POST['email'];
                $right = $_POST['rights'];
                $data =implode(",",$right);
                $query = "INSERT INTO data (name,email,pernission) VALUES ('$name','$email','$data')";
                if(mysqli_query($conn,$query))
                {
                        header("Location:index.php");
                }
            } catch(Exception $e){
                echo $e->getMessage();
            }
    }
?>
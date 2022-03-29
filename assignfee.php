<?php 
  include('connection.php');
  if(isset($_REQUEST['courseName'])){
     $name =  $_REQUEST['courseName'];
     $query = mysqli_query($conn,"SELECT * FROM course WHERE course_name = '$name'")or die(mysqli_error($conn));
     foreach($query as $value){
        echo $value['fee'];
     }
  }



?>
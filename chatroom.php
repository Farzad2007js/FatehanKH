<?php

/*این فایل چت روم هست شامل اچ تی ام ال و پی اچ پی*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if( isset($_POST['name']) && isset($_POST['message'])) {

       if(! empty($_POST['message'] && $_POST['name'])) {

        $name=$_POST['name'];
        $message=$_POST['message'];

        $connect=mysqli_connect('localhost:3306' , 'root' , '');
        mysqli_select_db($connect , 'fatehan');
        $show='<div class="txt">'."<span>".$name."</span>"."<p>". $message."</p>"."</div>";
        $query="INSERT INTO chats (message) VALUE ('$show')";
        mysqli_query($connect , $query);
        header("Location:chatroom.php");
       }           

         
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chatroom.css">
    <title>نظرات</title>
</head>
<body>
    <div class="box">
        <form id="chat" action="#" method="POST">
            <div class="fname">
            <input type="text" name="name" id="name" placeholder="نام شما">
            </div>
            <div class="text">
                <textarea name="message" id="message" cols="30" rows="10" placeholder="پیام شما"></textarea></div>
            <div class="button"><input type="submit" value="ارسال" name="btn"  id="btn"></div>
        </form>
        <div class="show">
            <div class="mess">
            <?php 
                   $connect=mysqli_connect('localhost:3306' , 'root' , '');
                   mysqli_select_db($connect , 'fatehan');
                    $request="SELECT message FROM chats";
                    $result=mysqli_query($connect , $request);
                     if(mysqli_num_rows($result)==13){
                        mysqli_query($connect , 'DELETE FROM chats');
                     }
                     else{
                    if(mysqli_num_rows($result)>0){
                      while($row=mysqli_fetch_assoc($result)){
                        echo $row['message'];
                      }
                    }
                }
         ?>
            </div>
        </div>
    </div>
</body>

</html>
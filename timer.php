<?php
 
    $status="بازی هنوز آغاز نشده است";
    session_start();
    $id=$_SESSION['login'];
     $connect=mysqli_connect('localhost:3306' , 'root' , '');
     mysqli_select_db($connect , 'fatehan');
     //ارسال درخواست بازی
     if(isset($_POST['request_ga'])){
        $geter_game_username=$_POST['game_re'];
        $geter_game_id=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT id FROM users WHERE username='$geter_game_username'")));
        $sender_game_id=$id;
        if($geter_game_id==NULL){
            print '<script> alert("کاربر مورد نظر یافت نشد")</script>';
         }
         else{
             $kind=1;
             $request="INSERT INTO request_game (mem1 , mem2 , ki_re) VALUES ('$sender_game_id' , '$geter_game_id' , '$kind')";
             $check=mysqli_query($connect , $request);
             if($check){
                 print '<script> alert("درخواست ارسال شد و درصورت پذیرش وارد بازی خواهید شد")</script>';
                 $request2="SELECT id FROM request_game WHERE mem1='$sender_game_id' AND mem2='$geter_game_id '";
                 $ch_re=mysqli_fetch_assoc(mysqli_query($connect , $request2));
                 $_SESSION['game']=$ch_re;
                 header("Refresh:1 , url=timer.php");
             }
             else{
                 print '<script> alert(" درخواست ارسال نشد ")</script>'; 
             }
         }
    }

    $game_id=$_SESSION['game'];
    $ki_re=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT ki_re FROM request_game WHERE id='$game_id' ")));
    if($ki_re=="2"){
        $status="بازی آغاز شد";
        header("Refresh:1 , url=Game2.php");
    }
    else{
       if($ki_re==NULL){
        print '<script> alert(" درخواست  شما رد شد ")</script>';
        header("Refresh:1 , url=client.php");
       }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $status  ?></h1>
</body>

<script>


</script>

</html>
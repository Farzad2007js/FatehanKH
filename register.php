<?php

$message="خوش آمدید";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $back="img/usericon.png";

  if(isset($fname) && isset($lname) && isset($username)  && isset($password)  ) {

      if(! empty($fname) && ! empty($lname) && ! empty($username) &&  ! empty($password)  ) {

              //حالا باید به دیتابیس متصل شویم و بررسی کنیم که نام کاربری و رمز عبور از قبل در دیتابیس نباشد

                //اتصال به دیتابیس
                $connect=mysqli_connect('localhost:3306' , 'root' , '');
                //انتخاب دیتابیس
                mysqli_select_db($connect , 'fatehan');

                //بررسی مقادیر دیتابیس
                $query=mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE username='$username'"));
                $query2=mysqli_fetch_assoc(mysqli_query($connect , "SELECT pass FROM users WHERE pass='$password'"));
                
                if($query==NULL && $query2==NULL){
                  mysqli_query($connect , "INSERT INTO users (username , pass , fname , lname , back ) VALUES ('$username' , '$password' , '$fname' , '$lname' , '$back' )");
                  $message="اطلاعات با موفقیت ثبت شد ";
                  header("Refresh: 2; url=http://localhost/Math/login.php");
                }
                else{
                    $message="نام کاربری و رمز عبور در سیستم موجود می باشد لطفا آنها را تغییر داده یا وارد شوید";
                    header("Refresh: 2; url=http://localhost/Math/register.php");
                }
      }
      else{
          $message="لطفا  همه فیلد ها را کامل کنید";
          header("Refresh: 2; url=http://localhost/Math/register.php");
      }

  }
  else{
      $message="فیلد مورد نظر وجود ندارد";
  }

}









?>







<!DOCTYPE html>
 <html lang="en" dir="rtl" >
<head >
    <title>ثبت نام</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="register.css"><div class="contianer"></div>
</head>
<body>


 <div class="contianer">
   
  <form  class="form" action="#" method="POST">

  <h2 class="title" ><?php echo $message  ?> </h2>

 <div class="vorod title">اگر قبلا ثبت نام کرده اید روی ورود کلیک کنید
  <div class="small"> <button class="btv"> <a class="a1" href="login.php">ورود</a></button> </div>
 </div>
<label class="f1  big1" for="">نام: </label>
<div class="inputfa"><input type="text" placeholder="نام خود را وارد کنید " class="in1 big1"  name="fname"  required></div>


<label class="f2  big1" for="" > نام خانوادگی :</label>
<div class="inputfa"><input type="text"  placeholder="نام خانوادگی خود را وارد کنید" class="in2  big1" name="lname" required></div>

<label for="" class="f9 big1">نام کاربری:</label>
<div class="inputfa"><input type="text" class="in2 big1 " name="username" minlength="5" required></div>

<label class="f4  big1 pas" for="">رمز عبور:</label>
<div class="inputfa"> <input type="password" class="in4  big1" name="password" minlength="6" required></div>

<div class="inputfa"><button name="form" class="btn" id="btnsubmit" type="submit">ثبت نام</button></div>

</form>
  </div>

</body>

 </html>
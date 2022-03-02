<?php



session_start();
//اعتبار سنجی فرم ورود کاربر
//اگر کاربر لاگین بود دیگر نیازی به ورود نیست
 if(isset($_SESSION['login'])){

    header("Location:http://localhost/Math/client.php");
  
}
else{



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username=$_POST['username'];
    $password=$_POST['password'];

    if(isset($username) && isset($password)){

       if(! empty($username) && ! empty($password)){

            //اتصال به دیتابیس
            $connect=mysqli_connect('localhost:3306' , 'root' , '');
           
            //چک کردن اینکه آیا ایمیل از قبل در دیتابیس موجود است یا خیر

              mysqli_select_db($connect , 'fatehan');
              $query=mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE username='$username'")); 
               $query2=mysqli_fetch_assoc(mysqli_query($connect , "SELECT pass FROM users WHERE pass='$password'")); 
               //گرفتن ایدی برای ذخیره سشن
               $id=mysqli_fetch_assoc(mysqli_query($connect , "SELECT id FROM users WHERE username='$username'"));

               if($query=="" && $query2==""){
                 //اگه کاربر اکانت نداشت میفرسته صفحه ثبت نام
                header("Location:http://localhost/Math/register.php");
               }

              else{
                
                  header("Location:http://localhost/Math/client.php");
                  //برای ثبت ورود کاربر
                  $_SESSION['login']=implode($id);
                
              }

       }

    }

}

}

?>







<!DOCTYPE html>
 <html lang="en" dir="rtl" >
<head >
    <title>ورود</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css"><div class="contianer"></div>
</head>
<body>
    <h2 class="title">فرم ورود</h2>
    <div class="contianer form">
    <form action="#" method="POST" class="form">
        
     <label for="" class="f1">نام کاربری:</label>
      <input type="text" class="in1" placeholder="نام کاربری خود را وارد کنید" name="username" minlength="5" required>
     <label for="" class="f2">رمز عبور:</label>
      <input type="password" class="in2" placeholder="رمز عبور خود را وارد کنید" name="password" minlength="6" required>
    <div class="bigfaramosh"> <div> <a class="faramosh" href="php/forget_p.php">رمز عبور خود را فراموش کرده ام</a> </div> </div> 
      <div class="big" >
      <button name="form" class="btn">ورود</button>
    </div>
    </form>
</div>
</body>
</html>
<?php

  //گرفتن ایدی کاربر از طریق سشن
    //گرفتن مشخصات
    $connect=mysqli_connect('localhost:3306' , 'root' , '');
    mysqli_select_db($connect , 'fatehan');
    session_start();
    $id=$_SESSION['login'];
    //اگر کاربر ورود کرده باشد به صفحه خود می رود 
    if(isset($id)){
      $name=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT fname FROM users WHERE id='$id'")));
      $family=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT lname FROM users WHERE id='$id'")));
      $username=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE id='$id'")));
      $back=implode(mysqli_fetch_assoc(mysqli_query($connect , "SELECT back FROM users WHERE id='$id'")));
    }
    //اگر وارد نشده باشد میفرستد به صغحه ورود
    else{
      header("Location: http://localhost/Math/login.php");
    }
      //خروج کاربر از اکانت
      if(isset($_POST['sub'])){
        unset($_SESSION['login']);
        header("Location: http://localhost/Math/login.php");
      }

      //تغییر پروفایل
      if(isset($_POST['s-file'])){
         $file_name=$_FILES["file"]["name"];
         $file_temp=$_FILES["file"]["tmp_name"];
         $c=move_uploaded_file($file_temp , "profiles/".$file_name);
         $addres="profiles/".$file_name;
         if($c){
             print '<script> alert("پروفایل با موفقیت عوض شد")</script>';
             $update="UPDATE users SET back='$addres' WHERE id='$id'";
             mysqli_query($connect , $update);
             header("Location:client.php");
         }
         else{
            print '<script> alert("پروفایل عوض نشد")</script>';
         }
      }


      //ارسال درخواست دوستی
      if(isset($_POST['request_fr'])){
          if(! empty($_POST['friend_re'])){
              $send_user=$id;
              $g_user=$_POST['friend_re'];
              $get_user_id=implode (mysqli_fetch_assoc(mysqli_query($connect , "SELECT id FROM users WHERE username='$g_user'")));
              if($get_user_id==NULL){
                print '<script> alert("کاربر مورد نظر یافت نشد")</script>';
             }
             else{
                $kind=1;
                $request="INSERT INTO request_fr (mem1 , mem2 , ki_re) VALUES ('$send_user' , '$get_user_id' , '$kind')";
                $check=mysqli_query($connect , $request);
                if($check){
                    print '<script> alert("درخواست ارسال شد و درصورت پذیرش در لیست دوستان شما نشان داده خواهد شد")</script>';
                    header("Refresh:1 , url=client.php");
                }
                else{
                    print '<script> alert(" درخواست ارسال نشد ")</script>'; 
                }
             }
             
          }
          else{
            print '<script> alert("نام کاربری مورد نظر را وارد کنید")</script>';
            
          }
          }

          

         

           //پذیرش درخواست دوستی
           if(isset($_POST['rece'])){
             $sender_id=$_POST['sender_id'];
             $rece="UPDATE request_fr SET ki_re='2' WHERE mem2='$id' AND mem1='$sender_id' AND ki_re='1'";
             $check2=mysqli_query($connect , $rece);
             if($check2){
                print '<script> alert("  درخواست پذیرفته شد ")</script>';
                header("Refresh:1 , url=client.php");
             }
             else{
                print '<script> alert(" درخواست پذیرفته نشد")</script>';
                header("Refresh:1 , url=client.php");
             }
           }

        //   //حذف درخواست دوستی
           if(isset($_POST['delete'])){
               $sender_id=$_POST['sender_id'];
               $delete="DELETE FROM request_fr WHERE mem2='$id' AND mem1='$sender_id' AND ki_re='1'";
               $check3=mysqli_query($connect , $delete);
               if($check3){
                print '<script> alert("درخواست حذف شد")</script>';
                header("Refresh:1 , url=client.php");
             }
             else{
                print '<script> alert("درخواست حذف نشد")</script>';
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
    <link rel="stylesheet" href="client.css">
    <title>صفحه کاربر</title>
</head>
<body>
    <nav>
        <div class="head">
            <div class="home">
                <a href="index.html">صفحه اصلی</a>
            </div>

        </div>
    </nav>
        <div class="profile">
            <div class="ex_ac">
                <form action="#" method="POST">
                <input type="submit" name="sub" id="exit" value="خروج از اکانت">
                </form>
            </div>

            <div class="image">
               <img src="<?php echo $back ?>" alt="">
            </div>

            <div class="change">
            <form action="#" method="POST" id="f_form" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" value="تغییر پروفایل" id="s_file" name="s-file">
            </form>
            </div>
        </div>
        <div class="text">
            <div class="user">
                <p><?php echo $username ?></p>
            </div>
            <div class="family">
                <p><?php echo $family ?></p>
            </div>
            <div class="name">
                <p><?php echo $name ?></p>
            </div>
        </div>

        <div class="se_da">
            <div class="se_ga">
                <h1>ارسال درخواست بازی</h1>
                <div class="se_text">
                    <form action="timer.php" method="POST">
                    <input type="text" name="game_re" class="re" placeholder="نام کاربری مورد نظر را وارد کنید" required >
                    <input type="submit" value="ارسال" name="request_ga" class="btn_send">
                    </form>
                </div>
            </div>
            <div class="se_fr">
                <h1>ارسال درخواست دوستی</h1>
                <div class="se_text">
                <form action="#" method="POST">
                    <input type="text" name="friend_re" class="re" placeholder="نام کاربری مورد نظر را وارد کنید" required>
                    <input type="submit" value="ارسال" name="request_fr" class="btn_send">
                    </form>
                </div>
            </div>
        </div>

    <div class="dar">
        <div class="game">
            <h1>بازی ها</h1>
            <div class="game_in"></div>
        </div>
        <div class="request">
            <h1>درخواست ها</h1>
            <div class="re_ki">
                  <?php
                    $query=mysqli_query($connect , "SELECT mem1 FROM request_fr WHERE mem2='$id' AND ki_re='1' "); 
                    if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_assoc($query)){
                        $i_user=$row['mem1'];
                        echo '<div class= '.'"show_request"'.'>'.'<span>'.
                        implode (mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE id='$i_user'")))
                        .'</span>'.'<p id= '.'show_p'.'>'."Has Sent You a Friend Request".'</p>'.'<form action='.'# '.'method='.'POST'.'>'.'<input type='.'hidden '.'name='.'sender_id '.'value='.$i_user .'>'
                        .'<input type='.'submit '.'name='.'rece '.'value='.'پذیرش'.'>'.'<input type='.'submit '.'name='.'delete '.'value='.'حذف'.'>'.'</form>'.'</div>';
                                  
                     }
                  }

                  $query2=mysqli_query($connect , "SELECT mem1 FROM request_game WHERE mem2='$id' AND ki_re='1' "); 
                  if(mysqli_num_rows($query2)>0){
                  while($row2=mysqli_fetch_assoc($query2)){
                      $i_user2=$row2['mem1'];
                      echo '<div class= '.'"show_request"'.'>'.'<span>'.
                      implode (mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE id='$i_user2'")))
                      .'</span>'.'<p id= '.'show_p'.'>'."Has Sent You a Friend Request".'</p>'.'<form action='.'Game2.php '.'method='.'POST'.'>'.'<input type='.'hidden '.'name='.'sender_id '.'value='.$i_user2 .'>'
                      .'<input type='.'submit '.'name='.'rece_game '.'value='.'پذیرش'.'>'.'<input type='.'submit '.'name='.'delete_game '.'value='.'حذف'.'>'.'</form>'.'</div>';
                                
                   }
                }

                ?>
            </div>
        </div>
        <div class="friend">
            <h1>دوستان</h1>
            <div class="fr_in">
            <?php
                
                $query=mysqli_query($connect , "SELECT mem1 FROM request_fr WHERE mem2='$id' AND ki_re='2' "); 
                    if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_assoc($query)){
                        $i_user=$row['mem1'];
                        $friend=implode (mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE id='$i_user'")));
                        echo '<p id='.'fri_p'.'>'. $friend .'</p>';
                    }
                }

                                
                $query=mysqli_query($connect , "SELECT mem2 FROM request_fr WHERE mem1='$id' AND ki_re='2' "); 
                    if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_assoc($query)){
                        $i_user2=$row['mem2'];
                        $friend2=implode (mysqli_fetch_assoc(mysqli_query($connect , "SELECT username FROM users WHERE id='$i_user2'")));
                        echo '<p id='.'fri_p'.'>'. $friend2 .'</p>';
                    }
                }
           ?>
            </div>
        </div>
    </div>
</body>

</html>
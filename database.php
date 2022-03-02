<?php

// //اتصال به سرور
// $connect=mysqli_connect('localhost:3306' , 'root' , '');

// //بررسی برقراری ارتباط
//  if (! $connect) {
//      echo 'could not connect';
//      exit;
//  }else{
//  echo 'connected';
//  }

// //ساخت دیتابیس
//  $C_DataBase='CREATE DATABASE Fatehan';
//  mysqli_query($connect , $C_DataBase);

//   $connect=mysqli_connect('localhost:3306' , 'root' , '');
//    mysqli_select_db($connect , 'fatehan');
//    $U_table='CREATE table users (id INT AUTO_INCREMENT , fname VARCHAR(100) NOT NULL , 
//    lname VARCHAR(100) NOT NULL , username VARCHAR(100) NOT NULL , pass VARCHAR(100) NOT NULL , back VARCHAR(500) NOT NULL ,primary key (id))';
//    $d=mysqli_query($connect , $U_table);

//    if(! $d){
//       echo 'Eror';
//   }
//    else {
//        echo 'hello';
//    }

//  $connect=mysqli_connect('localhost:3306' , 'root' , '');
//   mysqli_select_db($connect , 'fatehan');
//   $U_table='CREATE table chats (id INT AUTO_INCREMENT , name VARCHAR(100) NOT NULL , message VARCHAR(100) NOT NULL , primary key (id))';
//   $d=mysqli_query($connect , $U_table);

//   if(! $d){
//       echo 'Eror';
//   }
//   else {
//      echo 'hello';
//   }

//    $connect=mysqli_connect('localhost:3306' , 'root' , '');
//     mysqli_select_db($connect , 'fatehan');
//     $U_table='CREATE table request_fr (id INT AUTO_INCREMENT , mem1 VARCHAR(100) NOT NULL , mem2 VARCHAR(100) NOT NULL , ki_re VARCHAR(100) NOT NULL , primary key (id))';
//     $d=mysqli_query($connect , $U_table);

//     if(! $d){
//         echo 'Eror';
//     }
//     else {
//        echo 'hello';
//    }

//    $connect=mysqli_connect('localhost:3306' , 'root' , '');
//    mysqli_select_db($connect , 'fatehan');
//    $U_table='CREATE table request_game (id INT AUTO_INCREMENT , mem1 VARCHAR(100) NOT NULL , mem2 VARCHAR(100) NOT NULL , ki_re VARCHAR(100) NOT NULL , primary key (id))';
//    $d=mysqli_query($connect , $U_table);

//    if(! $d){
//        echo 'Eror';
//    }
//    else {
//       echo 'hello';
//   }

  
  $connect=mysqli_connect('localhost:3306' , 'root' , '');
  mysqli_select_db($connect , 'fatehan');
  $U_table='CREATE table games (id INT AUTO_INCREMENT , mem1 VARCHAR(100) NOT NULL , mem2 VARCHAR(100) NOT NULL , date timestamp , primary key (id))';
  $d=mysqli_query($connect , $U_table);

  if(! $d){
      echo 'Eror';
  }
  else {
     echo 'hello';
 }

?>
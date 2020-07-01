<?php
 $username = $_POST["username"];
 $password = $_POST["password"];

 if( $username == "admin" and $password== "123456") {
 header("Location: main.html");
 }
 else{
 header("Location: index.html");
 echo "Go home looser";
 }





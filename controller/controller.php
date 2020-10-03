<?php
include_once("../models/Access.php");
$entry = new Entry();
if(isset($_POST["signup"])){
   echo $entry::register($_POST["fname"],$_POST["lname"],$_POST["email"],$_POST["password"]);
}

if(isset($_POST["login"])){
   echo  $entry::login($_POST["email"],$_POST["password"]);
}

if(isset($_POST["logout"])){
   echo $entry::logout();
}

if(isset($_POST["getDetails"])){
echo Entry::details();
}

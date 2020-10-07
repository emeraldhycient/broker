<?php
include_once("../models/Access.php");
include_once("../models/block_io.php");

$blockIo = new blockIo;

$entry = new Entry();


if(isset($_POST["getexchange"])){
   echo $blockIo::getExchange();
}

if(isset($_POST["fetchAllDeposit"])){
echo $entry::fetchAllDeposit();
}

if(isset($_POST["totalDeposit"])){
echo $entry::totalDeposit();
}

if(isset($_POST["insertPayment"])){
   echo $entry::insertPayment($_POST["tx_ref"],$_POST["amount"]);
}

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

<?php
include_once("../models/Access.php");
include_once("../models/block_io.php");
include_once("../models/alphaAdmin.php");

header('Content-Type: application/json');

$blockIo = new blockIo;

$entry = new Entry();

$alphaAdmin = new alphaAdmin();

if(isset($_POST["adminlogin"])){
   alphaAdmin::login($_POST["email"],$_POST["password"]);
}

if(isset($_POST["login"])){
 echo   $entry::login($_POST["email"],$_POST["password"]);
}

if(isset($_POST["getproofs"])){
   echo $entry::fetchScreenshot();
}

if(isset($_POST["btcdetail"])){
   echo $entry::btcdetails();
}

if(isset($_POST["changeEmail"])){
   echo $alphaAdmin::changeEmail($_POST["email"]);
}

if(isset($_POST["price"])){
   echo $alphaAdmin::insertBitcoinPrice($_POST["price"]);
}

if(isset($_POST["walletaddress"])){
   echo $alphaAdmin::insertWalletAddress($_POST["walletaddress"]);
}

if(isset($_POST["amount"])){
   echo $alphaAdmin::approvePayment($_POST["userid"],$_POST["tx_ref"],$_POST["amount"],$_POST["proveid"]);
}

if(isset($_POST["proveid"])){
   echo $alphaAdmin::fetchSingleScreenshot($_POST["proveid"]);
}

if(isset($_POST["Screenshots"])){
   echo $alphaAdmin::fetchScreenshot();
}

if(isset($_POST["allinvestment"])){
echo $alphaAdmin::allInvestment();
}

if(isset($_FILES["proof"])){
   echo $entry::insertScreenshot($_FILES["proof"]);
}

if(isset($_POST["totalInvestments"])){
   echo $alphaAdmin::totalInvestments();
}

if(isset($_POST["allRegistered"])){
   echo $alphaAdmin::allRegistered();
}

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

if(isset($_POST["logout"])){
   echo $entry::logout();
}

if(isset($_POST["getDetails"])){
echo Entry::details();
}
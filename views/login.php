<?php
session_start();

if(isset($_SESSION["logged"]))
{
header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>btc site</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./../asset/styles.css">
</head>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" id="larger">
                    <h1 class="mt-5 text-white title" style="font-weight: bolder;font-size:1.5em;"><i
                            class="fa fa-bitcoin fa-2x mt-2" style="color:gold"></i> <span
                            class="text-danger">Bitcoin</span>Vesto</h1>
                    <p class="text-white m-3">Sign in and explore <strong>Bitcoin</strong>vesto.com . </p>
                </div>
                <div class="col-md-5 p-5" id="log">
                    <div class="error">

                    </div>
                    <h5 class="mb-3">Enter your email and password below. </h5>
                    <form class="form-group" id="login" method="POST" action="../controller/controller.php">
                        <input type="email" id="email" class="form-control" placeholder="Email"
                            style="background-color:whitesmoke" required important><br>
                        <input type="password" id="password" class="form-control" placeholder="password"
                            style="background-color:whitesmoke" required important><br>
                        <div class="form-inline">
                            <input type="submit" id="shinybluebtn" class="btn btn-info mt-3" value="Login">
                            <p class="p-3">OR</p>
                            <button class="btn"><a href="./signup.html">Create New Account</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
<script src="./../asset/script.js "></script>
</html>
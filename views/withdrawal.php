<?php
session_start();

if(!isset($_SESSION["logged"]))
{
    die(" <center><h1>No direct Access allowed</h1> <BR>
           <a href='./login.php'>login here</a>
           <p>OR</p>
           <a href='./signup.html'>Create Account here</a>
           </center> 
    ");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to your dashboard
        <?php echo $_SESSION["username"]; ?>
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../asset/styles.css">
</head>
<style>
.edger {
    background-color: rgb(8, 61, 77);
    height: 300px;
    border-bottom-left-radius: 25%;
    border-bottom-right-radius: 25%;
}

.settings {
    margin-top: -40%;
}

@media (min-width:760px) {
    .settings {
        margin-top: -30%;
    }

    .edger {
        background-color: rgb(8, 61, 77);
        height: 400px;
        border-bottom-left-radius: 25%;
        border-bottom-right-radius: 25%;
    }
}

@media (max-width:380px) {
    .settings {
        margin-top: -70%;
    }

    .edger {
        background-color: rgb(8, 61, 77);
        height: 300px;
        border-bottom-left-radius: 25%;
        border-bottom-right-radius: 25%;
    }
}
</style>
</head>

<body>

    <main>
        <div class="edger"></div>
        <div class="container settings">
            <center>
                <div class="col-md-8 box pt-5" id="box4">
                    <center>
                        <h5 class="text-muted">Withdraw Fund</h5>
                        <div class="col-md-6">
                            <form class="form-group pt-5">
                                <input type="number" name="amount" placeholder="Enter Amount" class="form-control mb-2">
                                <input type="text" name="address"
                                    placeholder="Wallet address-:Type address very careful" class="form-control mb-2">
                                <input type="submit" class="btn btn-info" value="process withdrawal">
                            </form>
                        </div>
                    </center>
                </div>
            </center>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="./../asset/script.js "></script>
<script>
</script>

</html>
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
                <div class="col-md-10">
                    <div class="col-md-8 box" id="box3">
                        <h5 class="text-muted p-3">Withdrawal Histories</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th class="ml-1 mr-5">Tx_Ref</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>

            </center>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
<script src="./../asset/script.js "></script>
<script>
</script>

</html>
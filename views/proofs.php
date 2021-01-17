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
body {
    overflow: hidden;
}

#largerportion {
    overflow-y: scroll;
    height: 100vh;
    padding-top: 90px;
}
</style>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark fixed-top " id="dashnav">
            <h1 class="navbar-brand text-white title" style="font-weight: bolder;font-size:1.5em;"><i
                    class="fa fa-bitcoin mt-2" style="color:gold"></i> <span class="text-danger">Bitcoin</span>Vesto
            </h1>
            <button class="navbar-toggler first-button" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent20" aria-controls="navbarSupportedContent20" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="animated-icon1"><span></span><span></span><span></span></div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent20">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user mr-1"></i>
                            <?php echo strtoupper($_SESSION["username"]); ?> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposit</span> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./deposit.php" id="Deposit1">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposit</span> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./deposithistory.php" id="Deposit1">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposit hiistory</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./withdrawal.php" id="withdrawal1">
                            <i class="fa fa-money"></i>
                            <span>Withdrawal</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./withdrawalhistory.php" id="withdrawal1">
                            <i class="fa fa-money"></i>
                            <span>Withdrawal history</span> </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./proofs.php" id="withdrawal1">
                            <i class="fa fa-image"></i>
                            <span>uploaded Images</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="logout1">
                            Logout<i class="fa fa-sign-out ml-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <div class="row" id="app">
            <div class="col-md-3 text-muted" id="side">
                <ul>
                    <li class="">
                        <i class="fa fa-user mr-1"></i>
                        <?php echo strtoupper($_SESSION["username"]); ?>
                    </li>
                    <li>
                        <i class="fa fa-dashboard text-muted"></i>
                        <a href="./dashboard.php" class="text-muted">Dashboard</a>
                    </li>
                    <li>
                        <a href="./deposit.php" id="Deposit2" class="text-muted">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposit</span></a>
                    </li>
                    <li>
                        <a href="./deposithistory.php" id="Deposit2" class="text-muted">
                            <i class="fa fa-history"></i>
                            <span>Deposit History</span></a>
                    </li>
                    <li>
                        <a href="./withdrawal.php" id="withdrawal2" class="text-muted">
                            <i class="fa fa-money"></i>
                            <span>Withdrawal</span>
                        </a>
                    </li>
                    <li>
                        <a href="./withdrawalhistory.php" id="withdrawal2" class="text-muted">
                            <i class="fa fa-history"></i>
                            <span>Withdrawal History</span>
                        </a>
                    </li>
                    <li class="bg-info p-2 mt-3">
                        <a href="./proofs.php" id="proofbtn" class="text-white">
                            <i class="fa fa-image"></i>
                            <span>uploaded Images</span>
                        </a>
                    </li>
                    <li id="logout2">
                        Logout<i class="fa fa-sign-out ml-1"></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-9" id="largerportion">
                <center>
                    <div class="col-md-9">
                        <div class="screenshots">
                        </div>
                    </div>
                </center>
            </div>

        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
<script src="./../asset/script.js "></script>
<script>
$(document).ready(() => {
    $.ajax({
        url: './../controller/controller.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'getproofs': 'getproofs'
        },
        success: (res) => {
            parseScreenshots(res);
        }
    })

    function parseScreenshots(data) {

        console.log(data);

        if (data.status === 'success') {
            $.each(data, (i, val) => {

                let template = `<div class="card mb-2">
                                <div class="card-header ">
                                    <span class="badge badge-success ">status : ${val.status}</span>
                                </div>
                                <div class="card-body">
                                    <img src="./../asset/photos/${val.screenshot} " alt="" style="width:100%;height:300px ">
                                </div>
                               
                            </div>`
                $(".screenshots").append(template)
            })

        } else {

            let template = `<div class="card mb-2">
                                <div class="card-header ">
                                    <span class="badge badge-success ">status : error</span>
                                </div>
                                <div class="card-body ">
                                    <h6> no data found </h6>
                                </div>
                               
                            </div>`
            $(".screenshots").append(template)

        }
    }
})
</script>

</html>
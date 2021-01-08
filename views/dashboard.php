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
                    <li class="nav-item active">
                        <i class="fa fa-dashboard text-white"></i>
                        <a href="./dashboard.php" class="text-white">Dashboard</a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" javascript:void(0);" id="Deposit1">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposits</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" id="withdrawal1">
                            <i class="fa fa-money"></i>
                            <span>Withdrawals</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" id="withdrawal1">
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
            <div class="col-md-2 text-muted" id="side">
                <ul>
                    <li class="mb-4">
                        <i class="fa fa-user mr-1"></i>
                        <?php echo strtoupper($_SESSION["username"]); ?>
                    </li>
                    <li class="bg-info p-2">
                        <i class="fa fa-dashboard text-white"></i>
                        <a href="./dashboard.php" class="text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="Deposit2" class="text-muted">
                            <i class="fa fa-credit-card"></i>
                            <span>Deposits</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="withdrawal2" class="text-muted">
                            <i class="fa fa-money"></i>
                            <span>Withdrawals</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="proofbtn" class="text-muted">
                            <i class="fa fa-image"></i>
                            <span>uploaded Images</span>
                        </a>
                    </li>
                    <li id="logout2">
                        Logout<i class="fa fa-sign-out ml-1"></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="largerportion">
                <div class="row">
                    <div class="col-md-3 box" id="box1">
                        <span class="badge badge-danger">
                            Earnings
                        </span>
                        <div class="mt-3 d-flex">
                            <i class="fa fa-money fa-3x mr-3"></i>
                            <h4><b>Usd</b></h4>
                            <h4 class="ml-1"><b>00.00</b></h4>
                        </div>
                    </div>
                    <div class="col-md-3 box" id="box2">
                        <span class="badge badge-success">
                            Active Deposits
                        </span>
                        <div class="mt-3 d-flex">
                            <i class="fa fa-credit-card fa-3x mr-3"></i>
                            <h4><b>Usd</b></h4>
                            <h4 class="ml-1"><b>00.00</b></h4>
                        </div>
                    </div>
                    <div class="col-md-4 box" id="box3">
                        <h5 class="text-muted p-3">Deposit History</h5>
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
                    <div class="col-md-10 pt-4 m-auto" id="bitcoinbox">
                        <center>
                            <h4 class="text-muted mb-2">
                                <i class="fa fa-bitcoin fa-2x mr-1 text-warning"></i>Current Bitcoin Market Trend
                            </h4>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>price_base</th>
                                    <th>price</th>
                                    <th>exchange</th>
                                </thead>
                                <tbody id="bitcointablebody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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
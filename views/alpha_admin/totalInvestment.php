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
    <link rel="stylesheet" href="../../asset/styles.css">
    <style>
    body {
        overflow: hidden;
    }

    .side {
        height: 100vh;
        padding-top: 100px;
        box-shadow: 5px 5px 42px 5px rgba(0, 0, 0, 0.3);
        position: static;
        padding-left: 30px;
    }

    .main {
        margin-top: 100px;
        overflow: scroll;
        height: 100vh;
    }

    .side ul {
        list-style-type: none;
    }

    .side ul li {
        font-weight: bolder;
        margin-bottom: 20px;
    }

    #box2 {
        height: 200px;
        background: linear-gradient(90deg, rgb(185, 201, 216), rgb(211, 171, 177));
    }

    @media(max-width: 760px) {
        .side {
            display: none;
        }

        .moneybox {
            box-shadow: 5px 5px 42px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 40%;
            margin-left: 7px;
            margin-right: 15px;
            border-radius: 12px;
            width: 100%;
        }

        #in {
            margin-left: 25%;
        }
    }

    @media(max-width:370px) {
        .side {
            display: none;
        }

        .moneybox {
            box-shadow: 5px 5px 42px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 40%;
            margin-left: 7px;
            margin-right: 15px;
            border-radius: 12px;
            width: 100%;
        }

        #ins {
            margin-left: 25%;
        }
    }

    @media(min-width: 760px) {
        .main {
            margin-top: 60px;
            overflow: scroll;
            height: 100vh;
            padding-left: 60px;
        }

        .moneybox {
            box-shadow: 5px 5px 42px 5px rgba(0, 0, 0, 0.3);
            padding: 10px;
            margin-top: 200px;
            margin-left: 10%;
            margin-bottom: 10%;
            margin-right: 20px;
            border-radius: 10px;
            width: 600px;
        }

        #ins {
            margin-left: 40%;
        }
    }
    </style>
</head>
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
                        <b class="text-info" href="#">
                            <i class="fa fa-user mr-1"></i>
                            <?php echo strtoupper($_SESSION["username"]); ?>
                        </b>
                    </li>
                    <li class=" nav-item">
                        <a class=" nav-link" href=" ./dashboard.php " id=" paymentProof2 ">
                            <i class=" fa fa-money "></i>
                            <span>Payment Proof</span> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link allRegistered2" href="allRegistered.php" id=" allRegistered2 ">
                            <i class=" fa fa-users "></i>
                            <span>All Registered</span></a>
                    </li>
                    <li class=" nav-item ">
                        <a class=" nav-link bitcoinTrend2 " href="bitcoinTrend.html" id=" ">
                            <i class=" fa fa-stack-overflow "></i>
                            <span>Bitcoin Trend</span> </a>
                    </li>
                    <li class=" nav-item active">
                        <a class=" nav-link text-white totalInvestment2 " href="totalInvestment.php" id=" ">
                            <i class=" fa fa-road "></i>
                            <span>Total Investments</span> </a>
                    </li>
                    <li class=" nav-item ">
                        <a class=" nav-link allInvestment2" href="allInvestment.php" id=" allInvestment ">
                            <i class=" fa fa-bus "></i>
                            <span>All Investments</span>
                        </a>
                    </li>
                    <li class=" nav-item ">
                        <a class=" nav-link " href="settings.php" id=" ">
                            <i class=" fa fa-stack-exchange "></i>
                            <span>settings</span> </a>
                    </li>
                    <li class=" nav-item ">
                        <a class=" nav-link " href=" # " id=" logout1 ">
                            Logout<i class=" fa fa-sign-out ml-1 "></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class=" container-fluid ">
            <div class=" row ">
                <div class=" col-md-3 side ">
                    <ul>
                        <li class=" mb-4 text-info">
                            <b>
                                <i class=" fa fa-user mr-1 "></i>
                                <?php echo strtoupper($_SESSION["username"]); ?>
                            </b>
                        </li>
                        <li>
                            <a href=" ./dashboard.php " id=" paymentProof " class=" text-muted ">
                                <i class=" fa fa-money "></i>
                                <span>Payment Proof</span>
                            </a>
                        </li>
                        <li>
                            <a href="allRegistered.php" class="allRegistered  text-muted " id=" allRegistered ">
                                <i class=" fa fa-users "></i>
                                <span>All Registered</span>
                            </a>
                        </li>
                        <li>
                            <a href="bitcoinTrend.html" id=" " class=" text-muted bitcoinTrend ">
                                <i class=" fa fa-stack-overflow "></i>
                                <span>Bitcoin Trend</span>
                            </a>
                        </li>
                        <li class=" bg-info p-2">
                            <a href="totalInvestment.php" id=" " class=" text-white totalInvestment ">
                                <i class=" fa fa-road "></i>
                                <span>Total Investments</span>
                            </a>
                        </li>
                        <li>
                            <a href="allInvestment.php" id=" " class=" text-muted allInvestment ">
                                <i class=" fa fa-bus "></i>
                                <span>All Investments</span>
                            </a>
                        </li>
                        <li>
                            <a href="settings.php" id=" " class=" text-muted ">
                                <i class=" fa fa-stack-exchange "></i>
                                <span>settings</span>
                            </a>
                        </li>
                        <li id=" logout2 " class=" text-muted ">
                            Logout<i class=" fa fa-sign-out ml-1 "></i>
                        </li>
                    </ul>
                </div>
                <div class=" col-md-9 pt-5 main ">
                    <div class=" container attach text-muted ">
                        <div class="ttlinvestment ">

                        </div>
                        <div class="pt-4" id="bitcoinbox">
                            <center>
                                <h4 class="text-muted mb-2 ">
                                    <i class="fa fa-bitcoin fa-2x mr-1 text-warning "></i>Current Bitcoin Market Trend
                                </h4>
                            </center>
                            <div class="table-responsive ">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <th>S/N</th>
                                        <th>price_base</th>
                                        <th>price</th>
                                        <th>exchange</th>
                                    </thead>
                                    <tbody class="bitcointablebody ">
                                        <tr>
                                            <td></td>
                                            <td><i class="fa fa-bomb "></i>Unable to display data right now </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
<script>
$(document).ready(() => {

    $.ajax({
        url: '../../controller/controller.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'totalInvestments': 'totalInvestments'
        },
        success: (res) => {
            parseTotalInvestments(res);
        }
    })

    function parseTotalInvestments(data) {
        let template = null

        if (data.status === 'success') {
            template = `
                           <div class="total ">
                            <div class=" moneybox text-muted " id="box2 ">
                                <span class="badge badge-success ">
                                        All Deposits
                                    </span>
                                <div class="mt-5 d-flex " id="ins ">
                                    <i class="fa fa-credit-card fa-3x mr-3 "></i>
                                    <h3><b>Usd</b></h3>
                        <h3 class="ml-1 " style="color: rgb(226, 222, 222); "><b>${data.totalInvestments}</b></h3>
            </div>
            </div>
            </div>
            `

            $(".ttlinvestment").append(template)

        } else {
            template = `
                           <div class="total ">
                            <div class=" moneybox text-muted " id="box2 ">
                                <span class="badge badge-success ">
                                        All Deposits
                                    </span>
                                <div class="mt-5 d-flex " id="ins ">
                                    <i class="fa fa-credit-card fa-3x mr-3 "></i>
                                    <h3><b>Usd</b></h3>
                        <h3 class="ml-1 " style="color: rgb(226, 222, 222); "><b>${data.totalInvestments}</b></h3>
            </div>
            </div>
            </div>
            `
            $(".ttlinvestment").append(template)


        }
    }
    $.ajax({
        url: '../../controller/controller.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'getexchange': 'getexchange'
        },
        success: (res) => {
            $(".bitcointablebody ").empty()
            parseTrend(res);
        }
    })

    function parseTrend(res) {
        let template = null;
        $.each(res.data.prices, (i, val) => {
            template = ` <tr>
                <td>${i}</td>
                <td>${val.price_base}</td>
                <td>${parseInt(val.price).toLocaleString()}</td>
                <td>${val.exchange}</td>
            </tr>`
            $(".bitcointablebody ").append(template)
        })

    }

});
</script>

</html>
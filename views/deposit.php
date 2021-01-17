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
                <div class="col-md-6 box pt-5" id="box4">
                    <center>
                        <h5 class="text-muted mb-3">Deposit Fund</h5>
                        <div class="">
                            <h6 class="text-muted mb-1 btcprice"></h6>
                            <textarea class="form-control mb-2" id="walletid"></textarea>
                            <button class="btn btn-info btn-sm  mb-2" id="copy" onclick="copyTextFun()"><i
                                    class="fa fa-copy pr-2"></i>copy</button><br>
                            <h6 class="text-success">Pay withcredit card</h6>
                            <input type="number" id="amount" placeholder="Enter Amount > $100"
                                class="btn btn-sm btn-default">
                            <a href="javascript:void(0);" id="cardpay"> <i class="fa fa-credit-card"></i>cardpay</a>
                        </div>
                        <div class="mt-4">
                            <p class="text-muted">upload payment proof</p>
                            <form class="form-group" id="proofform" action="./../controller/controller.php"
                                method="post" enctype="multipart/form-data">
                                <input type="file" name="proof" class="btn btn-success btn-sm mb-3">
                                <button type="submit" id="proofsubmit" class="btn btn-warning btn-sm text-white"><i
                                        class="fa fa-upload mr-1"></i>upload</button>
                            </form>
                        </div>
                    </center>
                </div>
            </center>
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
$(document).ready(() => {
    $.ajax({
        url: './../controller/controller.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'btcdetail': 'btcdetail'
        },
        success: (res) => {

            let template = null

            if (res.status === 'success') {

                template = `<b>1 usd = ${res.data.btcprice} BTC</b>`

                $(".btcprice").append(template)

                $("#walletid").append(res.data.walletaddress)

            } else {
                alert("an error occured")
            }
        }
    })
})
</script>

</html>
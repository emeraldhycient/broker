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
            margin-top: -16%;
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
            margin-top: -50%;
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
</head>

<body>
    <main>
        <div class="">
            <div class="edger">
            </div>
            <div class="container settings">
                <center>
                    <h4 class="text-white">settings</h4>
                </center>
                <div class="col-md-7 ml-auto mr-auto  card p-3">
                    <h5>change Email</h5>
                    <form class="form-group input-group-sm email">
                        <label>Email:</label>
                        <div class="form-inline">
                            <input type="email" placeholder="Enter a new Email" id="email" class="form-control col mr-1"
                                important required>
                            <button type="submit" class="btn btn-sm btn-info">submit</button>
                        </div>
                    </form>
                </div><br><br>
                <div class="col-md-7 ml-auto mr-auto  card p-3">
                    <form class="form-group input-group-sm address">
                        <h5>Change Bitcoin Wallet Address</h5>
                        <label>Wallet Address :</label>
                        <div class="form-inline">
                            <input type="text" placeholder="Enter walletaddress " id="address"
                                class="form-control col mr-1" important required>
                            <button type="submit" class="btn btn-sm btn-info">submit</button>
                        </div>
                    </form>
                </div><br><br>
                <div class="col-md-7 ml-auto mr-auto  card p-3">
                    <form class="form-group input-group-sm price">
                        <h5>Change Bitcoin price</h5>
                        <label>Btc Price per dollar :</label>
                        <div class="form-inline">
                            <input type="text" placeholder="btc price per dollar" id="price"
                                class="form-control col mr-1" important required>
                            <button type="submit" class="btn btn-sm btn-info">submit</button>
                        </div>
                    </form>
                </div><br><br>
                <div class="col-md-7 m-auto card p-5" id="log">
                    <div class="error">

                    </div>
                    <h5 class="mb-3">Create Your Account. </h5>
                    <form class="form-group">
                        <div class="form-inline">
                            <input type="text" id="fname" name="fname" class="form-control mr-2 mb-3"
                                placeholder="First Name" style="background-color:whitesmoke" required important>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name"
                                style="background-color:whitesmoke" required important>
                        </div><br>
                        <input type="email" id="emails" name="email" class="form-control" placeholder="Email"
                            style="background-color:whitesmoke" required important><br>
                        <div class="form-inline">
                            <input type="password" id="password" name="password" class="form-control mr-2 mb-3"
                                placeholder="password" style="background-color:whitesmoke" required important><br>
                            <input type="password" id="cpassword" name="cpassword" class="form-control"
                                placeholder="confirm password" style="background-color:whitesmoke" required
                                important><br>
                        </div>
                        <div class="form-inline">
                            <input type="submit" id="shinybluebtn" class="btn btn-info mt-3" value="Create new user">
                        </div>
                    </form>
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
    $(".email").submit((e) => {
        e.preventDefault()

        const email = $("#email").val()

        $.ajax({
            url: '../../controller/controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                "changeEmail": "changeEmail",
                "email": email
            },
            success: (data) => {
                if (data.status === 'success') {
                    alert(data.message)
                } else {
                    alert("an error occured")
                }
            }
        })

    })

    $(".address").submit((e) => {
        e.preventDefault()

        const walletaddress = $("#address").val()

        $.ajax({
            url: '../../controller/controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                "walletaddress": walletaddress
            },
            success: (data) => {
                if (data.status === 'success') {
                    alert(data.message)
                } else {
                    alert("an error occured")
                }
            }
        })

    })


    $(".price").submit((e) => {
        e.preventDefault()

        const price = $("#price").val()

        $.ajax({
            url: '../../controller/controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                "price": price
            },
            success: (data) => {
                if (data.status === 'success') {
                    alert(data.message)
                } else {
                    alert("an error occured")
                }
            }
        })

    })

})
</script>

</html>
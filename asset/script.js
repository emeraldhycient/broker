$(document).ready(() => {

    getCustomerDetails()

    $(document).on("click", "#Deposit1", function() {
        depositForm()
    })

    $(document).on("click", "#Deposit2", function() {
        depositForm()
    })

    $(document).on("click", "#withdrawal1", function() {
        withdrawalForm()
    })

    $(document).on("click", "#withdrawal2", function() {
        withdrawalForm()
    })

    function withdrawalForm() {
        template = `
        <div class="col-md-2 text-muted" id="side">
        <ul>
            <li class="mb-4">
                <i class="fa fa-user mr-1"></i>
                ${name.toUpperCase()}
            </li>
            <li class="bg-info p-2">
                <i class="fa fa-dashboard text-white"></i>
                <a href="./dashboard.php" class="text-white">Dashboard</a></li>
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
            <li id="logout2">
                Logout<i class="fa fa-sign-out ml-1"></i>
            </li>
        </ul>
    </div>
                <div class="col-md-3 box" id="box1">
                    <span class="badge badge-danger">
                       Earnings
                </span>
                    <div class="mt-3 d-flex">
                        <i class="fa fa-money fa-3x mr-3"></i>
                        <h4><b>Usd</b></h4>
                        <h4 class="ml-3"><b>00.00</b></h4>
                    </div>
                </div>
                <div class="col-md-3 box pt-5" id="box4">
                <center>
                <h5 class="text-muted">Withdraw Fund</h5>
                   <form class="form-group pt-5">
                   <input type="number" name="amount" placeholder="Enter Amount" class="form-control mb-2">
                   <input type="text" name="address" placeholder="Wallet address-:Type address very careful" class="form-control mb-2">
                   <input type="submit" class="btn btn-info" value="process withdrawal">
                   </form>
                   </center>
                </div>
                <div class="col-md-3 box" id="box3">
                    <h5 class="text-muted p-3">Withdrawal History</h5>
                    <div class="d-flex">
                        <h6 class="text-muted ml-1 mr-5">Tnx</h6>
                        <h6 class="text-muted ml-5">Amount</h6>
                        <h6 class="text-muted ml-4">Date</h6>
                    </div>
                    <hr>
                </div>
        `
        $("#app").fadeIn();
        $("#app").empty()
        $("#app").append(template)
    }

    function depositForm() {

        template = `
        <div class="col-md-2 text-muted" id="side">
        <ul>
            <li class="mb-4">
                <i class="fa fa-user mr-1"></i>
                ${name.toUpperCase()}
            </li>
            <li class="bg-info p-2">
                <i class="fa fa-dashboard text-white"></i>
                <a href="./dashboard.php" class="text-white">Dashboard</a></li>
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
            <li id="logout2">
                Logout<i class="fa fa-sign-out ml-1"></i>
            </li>
        </ul>
    </div>
    <div class="col-md-3 box" id="box1">
    <span class="badge badge-success">
   Active Deposits
     </span>
    <div class="mt-3 d-flex">
        <i class="fa fa-credit-card fa-3x mr-3"></i>
        <h4><b>Usd</b></h4>
        <h4 class="ml-3"><b>00.00</b></h4>
    </div>
</div>
                <div class="col-md-3 box pt-5" id="box4">
                <center>
                <h5 class="text-muted mb-3">Deposit Fund</h5>
                <div class="">
                <h6 class="text-muted mb-1"><b>1 usd = 0.0000918 BTC</b></h6>
                <textarea class="form-control mb-2" id="walletid">hf64dy74hdyd63g35gedyd74h4u484jrhfyd63g363ge6</textarea>
                <button class="btn btn-info btn-sm  mb-2" id="copy" onclick="copyTextFun()"><i class="fa fa-copy pr-2"></i>copy</button><br>
                  <input type="number"  id="amount" placeholder="Enter Amount > $100" class="btn btn-sm btn-default">
                <a href="javascript:void(0);" id="cardpay"> <i class="fa fa-credit-card"></i> Pay with credit card</a>
                </div>
                <div class="mt-4">
                <p class="text-muted">upload payment proof</p>
                   <form class="form-group">
                   <input type="file" name="proof" class="btn btn-success btn-sm mb-3" value="click to choose file">
                   <button type="submit" class="btn btn-warning btn-sm text-white"><i class="fa fa-upload mr-1"></i>upload</button>
                   </form>
                   </div>
                   </center>
                </div>
                <div class="col-md-3 box" id="box3">
                    <h5 class="text-muted p-3">Deposit History</h5>
                    <div class="d-flex">
                        <h6 class="text-muted ml-1 mr-5">Tnx</h6>
                        <h6 class="text-muted ml-5">Amount</h6>
                        <h6 class="text-muted ml-4">Date</h6>
                    </div>
                    <hr>
                </div>
        `
        $("#app").fadeIn();
        $("#app").empty()
        $("#app").append(template)

    }

    $(document).on("click", "#cardpay", function() {
        amount = $("#amount").val()
        if (amount >= 100) {
            makePayment(amount)
        } else {
            alert("Amount must be greater than $100")
        }
    })

    let email, phone_number, name = null;

    function makePayment($amount) {
        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-326f6f4a1c250d847cb8214d66d85d66-X",
            tx_ref: generateId(18),
            amount: amount,
            currency: "USD",
            country: "us",
            payment_options: "card, ussd",
            customer: {
                email: email,
                phone_number: "",
                name: name,
            },
            callback: function(data) {
                console.log(data);
            },
            onclose: function() {
                // close modal
            },
            customizations: {
                title: "BitcoinVesto",
                description: "fund your BitcoinVesto account to start earning free coins",
                logo: "https://assets.piedpiper.com/logo.png",
            },
        });
    }

    function generateId(len) {
        return new Array(len).join().replace(/(.|$)/g, function() { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });
    }

    function getCustomerDetails() {
        $.ajax({
            url: "../controller/controller.php",
            type: "POST",
            data: {
                "getDetails": "getDetails"
            },
            dataType: "JSON",
            success: (data) => {
                email = data.email
                name = data.name
            }
        })
    }

    $(document).on("click", "#copy", function() {
        copyTextFun()
    })


    function copyTextFun() {
        copytext = document.getElementById("walletid");
        copytext.select()
        copytext.setSelectionRange(0, 99999)

        if (document.execCommand("copy")) {
            alert("address copied" + " " + " " + copytext.value)
        } else {
            alert("unable to copy wallet address")
        }

    }

    $("#login").submit((e) => {
        e.preventDefault();
        email = $("#email").val();
        password = $("#password").val();

        $.ajax({
            url: "../controller/controller.php",
            type: "post",
            data: {
                "login": "login",
                "email": email,
                "password": password
            },
            dataType: "JSON",
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "./dashboard.php"
                } else {
                    error = ` <center>
                            <h4 class="p-auto bg-warning rounded text-white">${data.message}</h4>
                        </center>`

                    $(".error").append(error);
                    $(".error").fadeIn();
                    setTimeout(function() {
                        $(".error").empty()
                    }, 3000)
                }
            }
        })
    })

    $("#signup").submit((e) => {
        e.preventDefault();
        fname = $("#fname").val();
        lname = $("#lname").val();
        email = $("#email").val();
        password = $("#password").val();
        cpassword = $("#cpassword").val();
        if (password == cpassword) {
            if (password.length > 8) {
                $.ajax({
                    url: "../controller/controller.php",
                    type: "post",
                    data: {
                        "signup": "signup",
                        "fname": fname,
                        "lname": lname,
                        "email": email,
                        "password": password,
                        "cpassword": cpassword
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == "success") {
                            window.location.href = "./dashboard.php"
                        } else {
                            console.log(data);
                        }
                    }
                })
            } else {
                error = ` <center>
                    dataType: "JSON",
                        <h6 class="p-auto bg-warning rounded text-white">Password length must exceed 8characters</h6>
                    </center>`

                $(".error").append(error);
                $(".error").fadeIn();
                setTimeout(function() {
                    $(".error").empty()
                }, 3000)
            }
        } else {
            error = ` <center>
                        <h6 class="p-auto bg-danger rounded text-white">passwords doesnt match</h6>
                    </center>`

            $(".error").append(error);
            $(".error").fadeIn();
            setTimeout(function() {
                $(".error").empty()
            }, 3000)
        }
    })



    $("#logout1").click(() => {
        logout()
    })

    $("#logout2").click(() => {
        logout()
    })


    function logout() {
        $.ajax({
            url: "../controller/controller.php",
            type: "post",
            data: {
                "logout": "logout"
            },
            success: function(data) {
                if (data.status == "failed") {
                    return false
                } else {
                    location.href = "./login.php"
                }
            }
        })
    }
})
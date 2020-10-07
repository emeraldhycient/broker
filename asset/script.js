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
        let template = `
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
        `
        $("#app").fadeIn();
        $("#app").empty()
        $("#app").append(template)
    }

    function depositForm() {

        let template = `
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
    </div><br><br><br><br>
    <div class="col-md-3 box" id="box2">
    ${alldpt}
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <th class="ml-1 mr-5">Tx_Ref</th>
                        <th>Amount</th>
                        <th>Date</th>
                        </thead>
                         <tbody id="tbody">
                             ${alltransct}
                         </tbody>
                    </table>
                </div>
                    <hr>
                </div>
        `
        $("#app").fadeIn();
        $("#app").empty()
        $("#app").append(template)

    }

    $(document).on("click", "#cardpay", function() {
        let amount = $("#amount").val()
        if (amount >= 100) {
            makePayment(amount)
        } else {
            alert("Amount must be greater than $100")
        }
    })

    let email, name = null;

    function makePayment(amount) {
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
                if (data.status == "successful") {
                    console.log(data)
                    $.ajax({
                        url: "../controller/controller.php",
                        type: "post",
                        data: {
                            "insertPayment": "insertPayment",
                            "tx_ref": data.tx_ref,
                            "amount": data.amount
                        },
                        dataType: "JSON",
                        success: (data2) => {
                            if (data2.status == "success") {
                                alert(data2.message)
                            } else {
                                console.log(data2)
                            }
                        }
                    })
                } else {
                    alert("error unable to process payment now try later")
                }
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

    let alldpt, alltransct = null

    $.ajax({
        url: "../controller/controller.php",
        type: "POST",
        data: {
            "totalDeposit": "totalDeposit"
        },
        dataType: "JSON",
        success: (data) => {
            alldpt = allDeposit(data)
            $("#box2").empty()
            $("#box2").fadeIn()
            $("#box2").append(allDeposit(data))

        }
    })

    function allDeposit(data) {
        let template = null;
        if (data.status == "success") {
            if (data.allDeposit > 0) {
                template = `
            <span class="badge badge-success">
            Active Deposits
              </span>
             <div class="mt-3 d-flex">
                 <i class="fa fa-credit-card fa-3x mr-3"></i>
                 <h4><b>Usd</b></h4>
                 <h4 class="ml-3"><b>${parseInt(data.allDeposit).toLocaleString()}</b></h4>
             </div>
            `
            } else {
                template = `
                <span class="badge badge-success">
                Active Deposits
                  </span>
                 <div class="mt-3 d-flex">
                     <i class="fa fa-credit-card fa-3x mr-3"></i>
                     <h4><b>Usd</b></h4>
                     <h4 class="ml-3"><b>00.00</b></h4>
                 </div>
                `
            }
        } else {
            template = `
            <span class="badge badge-success">
            Active Deposits
              </span>
             <div class="mt-3 d-flex">
                 <i class="fa fa-credit-card fa-3x mr-3"></i>
                 <h4><b>Usd</b></h4>
                 <h4 class="ml-3"><b>00.00</b></h4>
             </div>
            `
        }
        return template
    }

    $.ajax({
        url: "../controller/controller.php",
        type: "POST",
        data: {
            "fetchAllDeposit": "fetchAllDeposit"
        },
        dataType: "JSON",
        success: (data) => {
            /* console.log(data);
             alltransct = fetchAllDeposit2(data)*/
            $("#tbody").fadeIn()
            fetchAllDeposit(data)
        }
    })

    function fetchAllDeposit(data) {
        let template = null
        if (data.status == "success") {
            $.each(data.alldeposit, (i, val) => {
                template = `
                <tr>
                <td>${val.tx_ref}</td>
                <td>${val.amount}</td>
                <td>${val.date}</td>
                </tr>
                `
                $("#tbody").append(template)
            })
        } else {
            template = `
            <tr>
            <td>No Data Found</td>
            </tr>
            `
            $("#tbody").append(template)
        }
    }

    /* function fetchAllDeposit2(data) {

         if (data.status == "success") {
             $.each(data.alldeposit, (i, val) => {
                 let template = `
                 <tr>
                 <td>${val.tx_ref}</td>
                 <td>${val.amount}</td>
                 <td>${val.date}</td>
                 </tr>
                 `
                 $("#tbody").append(template)
             })
         } else {
             let template = `
             <tr>
             <td>No Data Found</td>
             </tr>
             `
             $("#tbody").append(template)

         }

     }*/

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
        let copytext = document.getElementById("walletid");
        copytext.select()
        copytext.setSelectionRange(0, 99999)

        if (document.execCommand("copy")) {
            alert("address copied" + " " + " " + copytext.value)
        } else {
            alert("unable to copy wallet address")
        }

    }

    $.ajax({
        url: "./controller/controller.php",
        type: "post",
        data: {
            "getexchange": "getexchange"
        },
        dataType: "JSON",
        success: function(data) {
            displaybtc(data)
        }
    })

    function displaybtc(data) {
        let template = null;
        if (data.status == "success") {
            $.each(data.data.prices, (i, val) => {
                template = ` <tr>
                <td>${val.price_base}</td>
                <td>${parseInt(val.price).toLocaleString()}</td>
                <td>${val.exchange}</td>
            </tr>`
                $("#bitcointablebody").append(template)
            })
        } else {
            template = ` <tr>
                <td><i class="fa fa-bomb"></i>Unable to display data right now </td>
            </tr>`
            $("#bitcointablebody").append(template)
        }
    }
    $("#login").submit((e) => {
        e.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();

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
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
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
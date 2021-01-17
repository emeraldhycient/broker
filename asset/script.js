$(document).ready(() => {

    getCustomerDetails()


    $(document).on("click", "#proofsubmit", (e) => {
        e.preventDefault()
        var form = $("#proofform")
        var formData = new FormData(form[0]);

        $.ajax({
            url: './../controller/controller.php',
            type: 'POST',
            data: formData,
            success: data => {
                alert(data)
            },
            cache: false,
            contentType: false,
            processData: false
        })

    })

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
                 <h4 class="ml-1"><b>${parseInt(data.allDeposit).toLocaleString()}</b></h4>
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
                     <h4 class="ml-1"><b>00.00</b></h4>
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
                 <h4 class="ml-1"><b>00.00</b></h4>
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
        url: "../controller/controller.php",
        type: "post",
        data: {
            "getexchange": "getexchange"
        },
        dataType: "JSON",
        success: function(data) {
            displaybtc(data)
        }
    })


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
                if (data.status === 'success') {
                    location.href = "./dashboard.php"
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
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert(errorThrown);
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
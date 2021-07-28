<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>DIGICO LABS</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Start css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/plugins/pnotify/css/pnotify.custom.min.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-xl-6">
                                    <form id="basic-form-wizard" action="#">
                                        <div>
                                            <h3>Start</h3>
                                            <section>
                                                <h4 class="font-22 mb-3">Create an Account !!!</h4>
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text"
                                                           class="form-control @error('firstname') is-invalid @enderror"
                                                           name="firstname" value="{{ old('firstname') }}"
                                                           id="firstname">
                                                    @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text"
                                                           class="form-control @error('lastname') is-invalid @enderror"
                                                           name="lastname" value="{{ old('lastname') }}" id="lastname">
                                                    @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" id="address"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nic">NIC Number</label>
                                                    <input type="text" class="form-control" id="nic">
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobilenumber">Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobilenumber"
                                                    >
                                                </div>

                                            </section>
                                            <h3>Profile</h3>
                                            <section>
                                                <h4 class="font-22 mb-3">Setup Your Profile !!!</h4>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email"
                                                           value="{{ old('email') }}" id="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text"
                                                           class="form-control @error('username') is-invalid @enderror"
                                                           name="username"
                                                           value="{{ old('username') }}" id="username">
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" id="password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-confirm">Confirm Password</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation">
                                                </div>
                                            </section>
                                            <h3>Packages</h3>
                                            <section>
                                                <h4 class="font-22 mb-3">Package Details !!!</h4>
                                                @foreach($items as $item)
                                                    <div
                                                        class="d-flex flex-row justify-content-between align-items-center mb-5">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <input type="checkbox" id="{{$item->id}}" name="package"
                                                                   onclick="checkpackage({{$item->id}})"
                                                                   class="mr-2">
                                                            <label for="{{$item->id}}" class="mb-0"
                                                                   style="font-size: 12px">
                                                                {{$item->item_name}}
                                                            </label>
                                                        </div>

                                                        <span style="font-size: 12px">LKR {{$item->unit_price}}</span>
                                                        <input type="number" id="unitprice{{$item->id}}"
                                                               value="{{$item->unit_price}}" class="d-none">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <label for="qty{{$item->id}}" class="mb-0 mr-2"
                                                                   style="font-size: 12px">
                                                                QTY
                                                            </label>
                                                            <input type="number" id="qty{{$item->id}}" class="border"
                                                                   onkeypress="keypressvalueAdd(event,{{$item->id}})"
                                                                   value="0" disabled
                                                                   style="font-size: 13px;padding: 4px 6px;max-width: 100px">
                                                        </div>

                                                        <div class="d-flex flex-row align-items-center">
                                                            <label for="subTotalpackage{{$item->id}}" class="mb-0 mr-2"
                                                                   style="font-size: 12px">
                                                                Sub Total
                                                            </label>
                                                            <input type="number" id="subTotalpackage{{$item->id}}"
                                                                   class="border" disabled value="0"
                                                                   style="font-size: 13px;padding: 4px 6px;max-width: 100px">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <p>After Enter QTY Press Enter to see to Amount of Package</p>
                                            </section>
                                            <h3>Finish</h3>
                                            <section>
                                                <h4 class="font-22 mb-3">Let's Finished !!!</h4>
                                                <br>
                                                <br>
                                                <div class="form-group">
                                                    <label for="finaltotal">Final Amount</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">LKR</span>
                                                            <span class="input-group-text">0.00</span>
                                                        </div>
                                                        <input type="text" id="finaltotal" disabled class="form-control"
                                                               aria-label="Dollar amount (with dot and two decimal places)">
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="acceptTerms">
                                                    <label class="custom-control-label" for="acceptTerms">I Agree with
                                                        the Terms and Conditions.</label>
                                                </div>
                                            </section>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/custom/custom-form-wizard.js')}}"></script>
<!-- Switchery js -->
<script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
<!-- Form Step js -->
<script src="{{asset('assets/plugins/jquery-step/jquery.steps.min.js')}}"></script>

<!-- Pnotify js -->
<script src="{{asset('assets/plugins/pnotify/js/pnotify.custom.min.js')}}"></script>
<script src="{{asset('assets/js/custom/custom-pnotify.js')}}"></script>
>
<script>

    function checkTermCondition() {
        let result = false;
        if ($("#acceptTerms").prop('checked') == true) {
            result = true;
        } else {
            result = false;
        }
        return result;
    }

    function checkpackage(id) {
        if ($("#" + id).prop('checked') == true) {
            $('#qty' + id).val(0);
            $('#subTotalpackage' + id).val(0);
            $('#qty' + id).removeAttr('disabled');
        } else {
            $('#qty' + id).val(0);
            $('#subTotalpackage' + id).val(0);
            $('#qty' + id).attr('disabled', 'disabled');
        }

    }

    function keypressvalueAdd(event, id) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            let unitprice = parseFloat($('#unitprice' + id).val());
            let itemqty = parseInt($('#qty' + id).val());
            let itemtotamount = unitprice * itemqty;
            $('#subTotalpackage' + id).val(itemtotamount);
        }

    }

    function loadfunction(value) {
        if (value == 0) {
            if (validationProfileUser()) {
                return true;
            } else {
                return false;
            }
        } else if (value == 1) {
            if (validateregisteruser() & validationProfileUser()) {
                return true;
            } else {
                return false;
            }
        } else if (value == 2) {
            if (validateregisteruser() & validationProfileUser() & packagecheck()) {
                return true;
            } else {
                return false;
            }
        } else if (value == 3) {
            if (validateregisteruser() & validationProfileUser() & packagecheck()){
                if(checkTermCondition()){
                    return true;
                } else{
                    new PNotify({
                        title: 'Error Notice', text: "Please check out Term & Condition and Put tik Before Submit.", type: 'info'
                    });
                    return false;
                }
            }else{
                new PNotify({
                    title: 'Error Notice', text: "Validation Error Please check Again and Submit!", type: 'info'
                });
                return false;
            }
        }
    }


    function validateemail() {
        let result = false;
        let regExp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        $('#email').css('border-color', 'red');
        if (!($('#email').val() == null || $('#email').val() == "") && $('#email').val().trim().match(regExp)) {
            $('#email').css('border-color', '');
            result = true;
        } else {
            $('#email').css('border-color', 'red');
            result = false;
        }

        return result;
    }
    let packagedetails = {
        id: null,
        itemqty: null,
        itemtotamount: null
    };

    let allpackage = [];
    function packagecheck() {
        allpackage.length=0;
        let result = false;
        let totalamount = 0;
        let i=0;
        var boxes = $('input[name=package]:checked');
        if (boxes.length > 0) {
            boxes.each(function (i, a) {
                let id = a.id;
                let unitprice = parseFloat($('#unitprice' + id).val());
                let itemqty = parseInt($('#qty' + id).val());
                let itemtotamount = unitprice * itemqty;
                $('#subTotalpackage' + id).val(itemtotamount);
                totalamount += itemtotamount;
                let packagedetails = {
                    id: id,
                    itemqty: itemqty,
                    itemtotamount: itemtotamount
                };
                if (totalamount>0) {
                    allpackage.push(packagedetails);
                    result = true;
                }else{
                    new PNotify({
                        title: 'Error Notice', text: "Please add the Qty to Package Your checked ", type: 'info'
                    });
                    result = false;
                }
            });
            $('#finaltotal').val(totalamount);

        } else {
            new PNotify({
                title: 'Error Notice', text: "Please select at least one Package before Final. ", type: 'info'
            });
            result = false;
        }
        return result;

    }

    function validateUsername() {
        let result = false;
        // let regExp = /^(?=.{8,20}$)(?![_.0-9])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        let regExp = /^[a-zA-Z0-9_]{6,}$/;
        $('#username').css('border-color', 'red');
        if (!($('#username').val() == null || $('#username').val() == "") && $('#username').val().trim().match(regExp)) {
            $('#username').css('border-color', '');
            result = true;
        } else {
            $('#username').css('border-color', 'red');
            result = false;
        }
        return result;
    }


    function validateNIC() {
        let result = false;
        let regExp = '^([0-9]{9}[x|X|v|V]|[0-9]{12})$';
        $('#nic').css('border-color', 'red');
        if (!($('#nic').val() == null || $('#nic').val() == "") && $('#nic').val().trim().match(regExp)) {
            $('#nic').css('border-color', '');
            result = true;
        } else {
            $('#nic').css('border-color', 'red');
            result = false;
        }
        return result;
    }


    function validatecontact_number() {
        let result = false;
        let regExp = /^(?:0)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/;
        let regExp2 = /0((11)|(2(1|[3-7]))|(3[1-8])|(4(1|5|7))|(5(1|2|4|5|7))|(6(3|[5-7]))|([8-9]1))([2-4]|5|7|9)[0-9]{6}/;
        $('#mobilenumber').css('border-color', 'red');
        if (!($('#mobilenumber').val() == null || $('#mobilenumber').val() == "") && ($('#mobilenumber').val().trim().match(regExp) || $('#mobilenumber').val().trim().match(regExp2))) {
            $('#mobilenumber').css('border-color', '');
            result = true;
        } else {
            $('#mobilenumber').css('border-color', 'red');
            result = false;
        }

        return result;
    }

    function validatepassword() {
        let result = false;
        // let regExp = /^(?=.{8,20}$)(?![_.0-9])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        let regExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
        $('#password').css('border-color', 'red');
        if (!($('#password').val() == null || $('#password').val() == "") && $('#password').val().trim().match(regExp)) {
            $('#password').css('border-color', '');
            result = true;
        } else {
            $('#password').css('border-color', 'red');
            result = false;
        }
        return result;
    }

    function validateconfirmpassword() {
        let result = false;
        // let regExp = /^(?=.{8,20}$)(?![_.0-9])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        let regExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
        $('#password-confirm').css('border-color', 'red');
        if (!($('#password-confirm').val() == null || $('#password-confirm').val() == "") && $('#password-confirm').val().trim().match(regExp)) {
            $('#password-confirm').css('border-color', '');
            if ($('#password').val().trim() == $('#password-confirm').val().trim()) {
                $('#password-confirm').css('border-color', '');
                $('#password').css('border-color', '');
                result = true;
            } else {
                $('#password-confirm').css('border-color', 'red');
                $('#password').css('border-color', 'red');
                result = false;
            }
        } else {
            $('#password-confirm').css('border-color', 'red');
            result = false;
        }
        return result;
    }

    function limitcommon(field, maxChar) {
        let ref = $(field),
            val = ref.val();
        if (val.length >= maxChar) {
            ref.val(function () {
                return val.substr(0, maxChar);
            });
        }
    }

    $("#password-confirm").prop("disabled", true);
    $(function () {
        $('#password').keyup(function () {
            const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
            let mobilenum = $('#password').val();
            if (mobilenum.trim().match(regex)) {
                $('#password').css('border-color', '');
                $("#password-confirm").prop("disabled", false);
            } else {
                $("#password-confirm").prop("disabled", true);
                $('#password').css('border-color', 'red');
            }
            limitcommon(this, 14);
        });
        $('#password-confirm').keyup(function () {
            const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
            let mobilenum = $('#password-confirm').val();
            if (mobilenum.trim().match(regex)) {
                $('#password-confirm').css('border-color', '');
                $('#password').css('border-color', '');
            } else {
                $('#password-confirm').css('border-color', 'red');
                $('#password').css('border-color', 'red');
            }
            limitcommon(this, 14);
        });

    });

    function validateOther() {
        let result = false;
        if (!($('#firstname').val() == "")) {
            $('#firstname').css('border-color', '');
            if (!($('#lastname').val() == "")) {
                $('#lastname').css('border-color', '');
                if (!($('#address').val() == "")) {
                    $('#address').css('border-color', '');
                    result = true;
                } else {
                    $('#address').css('border-color', 'red');
                    result = false
                }
            } else {
                $('#lastname').css('border-color', 'red');
                result = false;
            }

        } else {
            $('#firstname').css('border-color', 'red');
            result = false;
        }
        return result;

    }

    function validationProfileUser() {
        if (validateOther() && validateNIC() & validatecontact_number()) {
            return true;
        } else {
            return false;
        }
    }

    function validateregisteruser() {
        if (validateemail() & validatepassword() & validateUsername() & validateconfirmpassword()) {
            return true;
        } else {
            return false;
        }
    }


    function registeruser() {


        var action = "{{ env("APP_URL") }}";
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let emailaddress = $('#email').val();
        let username = $('#username').val();
        let address = $('#address').val();
        let nic = $('#nic').val();
        let mobilenumber = $('#mobilenumber').val();
        let passwordinput = $('#password').val();
        let confirmpasswordinput = $('#password-confirm').val();
        let fullamount = $('#finaltotal').val();

        let form_data = new FormData();
        form_data.append("_token", "{{ csrf_token() }}");
        form_data.append("firstname", firstname.trim());
        form_data.append("lastname", lastname.trim());
        form_data.append("address", address);
        form_data.append("username", username.trim());
        form_data.append("email", emailaddress.trim());
        form_data.append("nic", nic.trim());
        form_data.append("mobilenumber", mobilenumber.trim());
        form_data.append("password", passwordinput.trim());
        form_data.append("password_confirmation", confirmpasswordinput.trim());
        var json_arr = JSON.stringify(allpackage);
        form_data.append("packages", json_arr);
        form_data.append("fullamount", fullamount);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (validateregisteruser() & validationProfileUser()) {
            if (passwordinput == confirmpasswordinput) {
                $.ajax({
                    url: action + "/register",
                    method: 'post',
                    data: form_data,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    async: true,
                    success: function (result) {
                        if (result === "1") {
                            new PNotify({
                                title: 'Success notice', text: 'User Added Successfully!', type: 'success'
                            });
                            window.location = action;
                        }

                    },
                    error: function (error) {
                        let emailer = error['responseJSON']['errors']['email'];
                        let nameer = error['responseJSON']['errors']['username'];
                        let passworder = error['responseJSON']['errors']['password'];
                        if (emailer != undefined) {
                            if (emailer[0] == "The email has already been taken.") {
                                $('#email').css('border-color', 'red');
                                new PNotify({
                                    title: 'Error Notice', text: emailer, type: 'info'
                                });
                            }
                        }
                        if (nameer != undefined) {
                            if (nameer[0] == "The username has already been taken.") {
                                new PNotify({
                                    title: 'Error Notice', text: nameer, type: 'info'
                                });
                                $('#username').css('border-color', 'red');
                            }
                        }
                        if (passworder != undefined) {
                            if (passworder[0] == "The password field is required.") {
                                new PNotify({
                                    title: 'Error Notice', text: passworder, type: 'info'
                                });
                                $('#password').css('border-color', 'red');
                                $('#password-confirm').css('border-color', 'red');
                            }
                        }
                        new PNotify({
                            title: 'Error Notice', text: 'User Added Fail !', type: 'info'
                        });
                    }
                })
            } else {
                new PNotify({
                    title: 'Error Notice', text: 'Password does not Match !', type: 'info'
                });
            }
        } else {
            new PNotify({
                title: 'Error Notice', text: 'Some thing went Wrong!', type: 'info'
            });
        }
    }
</script>
<!-- End js -->
</body>
</html>

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
    <!-- DataTables css -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive Datatable css -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Switchery css -->
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/pnotify/css/pnotify.custom.min.css')}}" rel="stylesheet" type="text/css">

    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar">
                <a href="#" class="logo logo-large"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid"
                                                         alt="logo"></a>
                <a href="#" class="logo logo-small"><img src="{{asset('assets/images/small_logo.svg')}}"
                                                         class="img-fluid" alt="logo"></a>
            </div>
            <!-- End Logobar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <ul class="vertical-menu">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="ri-home-6-fill"></i><span>Dashboard</span>
                        </a>
                        <a href="{{ route('package') }}">
                            <i class="ri-knife-fill"></i><span>Package</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="#" class="mobile-logo"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid"
                                                             alt="logo"></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="#">
                                        <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                        <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="#">
                                        <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                        <i class="ri-close-line menu-hamburger-close"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="#">
                                        <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                        <i class="ri-close-line menu-hamburger-close"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="profilelink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                                src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid"
                                                alt="profile"><span
                                                class="live-icon">{{Auth::user()->firstname}}  {{Auth::user()->lastname}}</span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                                    class="ri-shut-down-line"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->

        <!-- Start Contentbar -->
        <div class="contentbar">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12">
                    <br>
                    <br>
                    <div class="card-header">
                        <h5 class="card-title">Package Details</h5>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-body" id="packagedata">
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
                            <p>After Enter QTY Press Enter to see to Sub Total of Packages</p>
                            <br>
                            <br>
                            <button type="button" id="checkoutbtn" onclick="checkoutOnclick()" class="btn btn-primary">
                                Checkout
                            </button>
                        </div>
                        <div class="card-body d-none" id="checkoutdata">
                            <div class="row">
                                <div class="col-md-6">
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
                            </div>
                            <button type="button" id="checkoutbtn" onclick="makePackageOrder()" class="btn btn-warning">Proceed to Pay</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End Contentbar -->
        <!-- Start Footerbar -->
        <div class="footerbar">
            <footer class="footer">
                <p class="mb-0">© 2021 DIGICO LABS - All Rights Reserved.</p>
            </footer>
        </div>
        <!-- End Footerbar -->
    </div>
    <!-- End Rightbar -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/vertical-menu.js')}}"></script>
<!-- Switchery js -->
<script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
<!-- Core js -->
<script src="{{asset('assets/js/core.js')}}"></script>

<!-- Pnotify js -->
<script src="{{asset('assets/plugins/pnotify/js/pnotify.custom.min.js')}}"></script>
<script src="{{asset('assets/js/custom/custom-pnotify.js')}}"></script>
<script>

    function checkoutOnclick() {
        if (packagecheck()) {
            $('#packagedata').addClass('d-none');
            $('#checkoutdata').removeClass('d-none');
        } else {
            $('#checkoutdata').addClass('d-none');
            $('#packagedata').removeClass('d-none');
        }
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

    let packagedetails = {
        id: null,
        itemqty: null,
        itemtotamount: null
    };

    let allpackage = [];

    function packagecheck() {
        allpackage.length = 0;
        let result = false;
        let totalamount = 0;
        let i = 0;
        var boxes = $('input[name=package]:checked');
        if (boxes.length > 0) {

            boxes.each(function (i, a) {
                let id = a.id;
                let unitprice = parseFloat($('#unitprice' + id).val());
                let itemqty = parseInt($('#qty' + id).val());
                let itemtotamount = unitprice * itemqty;
                $('#subTotalpackage' + id).val(itemtotamount);
                totalamount += itemtotamount;
                if (totalamount > 0) {
                    let packagedetails = {
                        id: id,
                        itemqty: itemqty,
                        itemtotamount: itemtotamount
                    };
                    allpackage.push(packagedetails);
                    result = true;
                } else {
                    if (i == 0) {
                        new PNotify({
                            title: 'Error Notice', text: "Please add some Qty to Package", type: 'info'
                        });
                    }
                    result = false;
                    i++;
                }
            });
            $('#finaltotal').val(totalamount);

        } else {
            new PNotify({
                title: 'Error Notice', text: "Please select at least one Package before checkout.", type: 'info'
            });
            result = false;
        }
        return result;

    }

    function makePackageOrder() {


        var action = "{{ env("APP_URL") }}";
        let fullamount = $('#finaltotal').val();

        let form_data = new FormData();
        form_data.append("_token", "{{ csrf_token() }}");
        form_data.append("user", {{Auth::id()}});
        var json_arr = JSON.stringify(allpackage);
        form_data.append("packages", json_arr);
        form_data.append("fullamount", fullamount);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: action + "/api/package/create",
            method: 'post',
            data: form_data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            async: true,
            success: function (result) {
                if (result.code === 200) {
                    new PNotify({
                        title: 'Success notice', text: 'Package Ordered Successfully!', type: 'success'
                    });
                    window.location = action+"/package";
                }else {
                    new PNotify({
                        title: 'Error Notice', text: 'Package Ordered Fail !', type: 'info'
                    });
                }

            },
            error: function (error) {
                new PNotify({
                    title: 'Error Notice', text: 'Package Ordered Fail !', type: 'info'
                });
            }
        })
    }
</script>
<!-- End js -->

</body>
</html>

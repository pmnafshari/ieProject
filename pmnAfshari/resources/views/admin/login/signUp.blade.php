<!DOCTYPE html>
<html lang="En" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>مهندسی اینترنت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/admin/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/admin/dist/css/custom-style.css">

    <!--*******************************************-->
    <!-- For this page -->

    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">

    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>


    <!-- DataTables for table features-->
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">

</head>
<body class="hold-transition sidebar-mini bg-gray-light">


<div class="container">
    @include('notification.notification')
    <div class="row justify-content-center">

            <div class="card col-11 col-md-5 my-2">
                <div class="card-header">
                    <h3 class="card-title">ثبت نام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <form action="{{route('registerFirst')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group  col-11">
                                <label for="IDInputName">نام</label>
                                <input type="text" class="form-control" id="IDInputName" name="firstname" aria-describedby="nameHelp" placeholder="نام خود را وارد کنید">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-11">
                                <label for="IDInputLastname">نام خانوادگی</label>
                                <input type="text" class="form-control" id="IDInputLastname" name="lastname" aria-describedby="lastnameHelp" placeholder="نام خانوادگی خود را وارد کنید">
                                <small id="lastnameHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-11">
                                <label for="IDTelNumber">شماره تلفن همراه</label>
                                <input type="number" class="form-control" id="IDTelNumber" name="mobile" aria-describedby="telHelp" placeholder="شماره تلفن همراه خود را وارد کنید" >
                                <small id="telHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-11">
                                <label for="IDEmail">ایمیل</label>
                                <input type="email" class="form-control" id="IDEmail" name="email" aria-describedby="" placeholder="ایمیل خود را وارد کنید">
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-11">
                                <label>تاریخ تولد</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                    </div>

                                    <input class="normal-example form-control example1" name="date_of_birth" id="IDTarikhTavallod"  >
                                </div>
                            </div>

                            <div class="form-group col-11">
                                <label for="IDPassword">رمز عبور</label>
                                <input type="password" class="form-control" id="IDPassword" name="password" placeholder="رمز عبور خود را وارد کنید">
                            </div>


                        </div>

                        <div class="text-center mt-5 mb-2">
                            <input type="submit" class="btn btn-success text-center " value="ثبت نام">
                        </div>

                    </form>

                    <div class="col-md-12 text-center my-3 mb-2">
                        <small class="form-text text-muted" id="IDSubmitHelp">رمز عبور خود را فراموش کرده اید؟ <br>
                            <a href="{{route('forgetPassword')}}">فراموشی رمزعبور</a>
                        </small>
                    </div>
                    <div class="col-md-12 text-center my-2 mb-2">

                        <a href="{{route('login.create')}}">ورود</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

</div>


<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Slimscroll -->
<script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin/plugins/fastclick/fastclick.js"></script>

<!--********************************************************************************************************-->
<!--for this page-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Persian Data Picker -->
<!-- Persian Data Picker -->
<script src="/admin/dist/js/persian-date.min.js"></script>
<script src="/admin/dist/js/persian-datepicker.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
<script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>


<!-- DataTables -->
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>

    function showPasswordFunction() {
        let x = document.getElementById("IDPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $(document).ready(function() {
        $(".example1").pDatepicker({
            // initialValueType: "gregorian",
            format: 'YYYY-MM-DD',
            // onSelect: "year",
            onSelect: function (unix) {
                to.touched = true;
                if (from && from.options && from.options.maxDate != unix) {
                    var cachedValue = from.getState().selected.unixDate;
                    from.options = {maxDate: unix};
                    if (from.touched) {
                        from.setDate(cachedValue);
                    }
                }
            },
            calendar:{
                persian: {
                    locale: 'fa'
                }
            },
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            },
        });
    });
</script>

</body>
</html>

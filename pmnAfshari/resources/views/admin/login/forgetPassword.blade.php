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


</head>
<body class="hold-transition sidebar-mini bg-gray-light">


<div class="container">
    @include('notification.notification')
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card my-5 shadow">
                <div class="card-header">
                    <h3 class="card-title">بازیابی رمز عبور</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="row justify-content-center" action="{{route('login.resetPassword')}}"  method="post" >
                        @csrf

                        <div class="form-group col-md-7">
                            <label for="IDUserName">شماره تلفن همراه</label>
                            <input type="text" class="form-control" id="IDUserName" name="mobile"required aria-describedby=IDUserNameHelp"" placeholder="موبایل خود را وارد کنید">
                            <small class="form-text text-muted" id="IDUserNameHelp">برای بازیابی رمز عبور شماره همراه خود را وارد کنید</small>
                        </div>

                        <div class="col-md-7 text-center my-3 mb-2">

                            <input type="submit" class="btn btn-success text-center mb-2 col-6" value="بازیابی رمز عبور" name="passwordRecoveryInput"  id="IDPasswordRecoveryInput" aria-describedby="IDPasswordRecoveryInputHelp">

                            <small class="form-text text-muted" id="IDPasswordRecoveryInputHelp">اطلاعات کاربری خود را دارید؟ <br>
                                <a href="{{route('login.create')}}">ورود به پنل ارتباط با مشتریان</a></small>

                        </div>

                    </form>
                </div>
            </div>
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

</body>
</html>

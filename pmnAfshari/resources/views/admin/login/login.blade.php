<!DOCTYPE html>
<html lang="En" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>مهندسی اینترنت</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

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

    @include('notification.notification')

    </head>
    <body class="hold-transition sidebar-mini bg-gray-light">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
        @endforeach
        @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card my-5 shadow">
                    <div class="card-header">
                        <h3 class="card-title">ورود به پنل ارتباط با مشتریان</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form  class="row justify-content-center" method="post" action="{{route('login.store')}}">
                            @csrf
                            <div class="form-group col-md-7">
                                <label for="IDUserName">موبایل/email</label>
                                <input type="text" class="form-control" id="IDUserName" required name="login" aria-describedby=IDUserNameHelp"" placeholder="اطلاعات کاربری خود را وارد کنید">
                                <small class="form-text text-muted" id="IDUserNameHelp">موبایل/ایمیل خود را وارد کنید</small>
                            </div>

                               <div class="form-group col-md-7 mb-0">
                                <label for="IDPassword">رمز عبور</label>
                                <input type="Password" class="form-control" id="IDPassword" name="password" required  aria-describedby="IDPasswordHelp" placeholder="رمزعبور خود را وارد کنید">
                            </div>

                            <div class="form-group form-check  col-md-7 px-5 justify-content-end" >
                                <input type="checkbox" class="form-check-input" id="showPasswordCheck1" onclick="showPasswordFunction();">
                                <label class="form-check-label" for="showPasswordCheck1">نمایش رمزعبور </label>
                            </div>



                            <div class="form-group col-md-7 mb-0">

                                <span id="captcha_image" >
                                    {!! captcha_img() !!}
                                </span>
                                <button class="btn text-center mb-1 col-2" id="reload"><i class="fa fa-refresh"></i></button>
                                <input type="Password" class="form-control" id="IDPassword" name="captcha"  aria-describedby="IDPasswordHelp" placeholder="کپچا">
                            </div>


                        <div class="col-md-7 text-center my-3 mb-2">
                            <input type="submit" class="btn btn-success text-center mb-2 col-6" value="ورود" name="submitInput"  id="IDSubmitInput" aria-describedby="IDSubmitHelp">

                        </div>

                    </form>
                    <div class="col-md-12 text-center my-3 mb-2">
                        <small class="form-text text-muted" id="IDSubmitHelp">رمز عبور خود را فراموش کرده اید؟ <br>
                            <a href="{{route('forgetPassword')}}">فراموشی رمزعبور</a>
                        </small>
                    </div>
                    <div class="col-md-12 text-center my-2 mb-2">

                            <a href="{{route('registerCreate')}}">ثبت نام</a>
                    </div>
                    <div class="col-md-12 text-center my-2 mb-2">

                    </div>
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
<script>
    $('#reload').click(function (e)
    {
        e.preventDefault();
        $.ajax({
            type:'GET',
            url:'reload',
            success:function (res){
                $('#captcha_image').html(res.captcha);
            }

        })
    })

    ;
</script>
<script>

    function showPasswordFunction() {
        let x = document.getElementById("IDPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>
</html>

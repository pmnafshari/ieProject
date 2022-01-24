@if(session()->has('danger'))
<body class="">
<div class="row">
    <div class="col-12">
        <div class="row justify-content-center justify-content-md-around">

            <div class="card col-11 col-md-7 my-2 shadow h-100">
                <!-- /.card-header -->
                <div class="card-body">

                    <h5 class="text-center"> &#10060 {{session()->get('danger')}}</h5>

                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if(session()->has('success'))
    <body class="">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center justify-content-md-around">

                <div class="card col-11 col-md-7 my-2 shadow h-100">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <h5 class="text-center"> &#9989 {{session()->get('success')}}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif




@if(session()->has('info'))
    <body class="">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center justify-content-md-around">

                <div class="card col-11 col-md-7 my-2 shadow h-100">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <h5 class="text-center"> &#10004 {{session()->get('info')}}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



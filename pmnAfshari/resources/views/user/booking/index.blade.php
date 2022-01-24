@extends('user.layout.master')
@section('links')
    <!-- For this page -->
    <!-- (MULTIPLE SELECT)   -->
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">

    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>


@endsection

@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center justify-content-md-around">

                    <div class="card col-12 h-100 bg-transparent">
                        <div class="card-header">
                            <h3 class="card-title">انتخاب سرویس ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body  py-1">




                            @foreach($branches as $branch)
                                <!--start branch card-->
                                <div class="card col-12 h-100">
                                    <div class="row p-2 ">
                                        <div class="col-4 my-autom-2 font-weight-bold lead"> <img src="{{$branch->icon}}" class="shakhe-icon "></img> </div>
                                        <div class="col-4 my-autom-2 font-weight-bold lead">{{$branch->title}}</div>
                                        <button type="button" class="accordion-details btn btn-sm btn-secondary shadow-none w-auto h-100 my-auto mr-auto m-2 my-1">  <span class="fa fa-arrow-down"></span></button>
                                        <!-- /.card-header -->
                                        <div class="panel1 card-body">
                                            <div class=" row py-3 border-top">

                                            @foreach($branch->services as $service)
                                                <!-- start service card-->
                                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                                    <div class="card w-100 bg-gray-light p-1 ">
                                                        <div class="service-card-img">
                                                            <img class="card-img-top" src="{{$service->file}}" alt="Card image cap">
                                                        </div>
                                                        <div class="card-body py-2">
                                                            <h5 class="card-title font-weight-bold text-center">{{$service->title}}</h5>
                                                        </div>
                                                        <ul class="list-group list-group-flush bg-transparent my-2">
                                                            <li class="list-group-item bg-transparent border-0  py-1 small">قیمت : <Span class="font-weight-bold lead">{{$service->price}}</Span> تومان</li>
                                                            <li class="list-group-item bg-transparent border-0 py-1 small ">پیش پرداخت :<Span class="font-weight-bold lead">{{$service->perPaymentCalculate($service)}}</Span> تومان</li>
                                                        </ul>


                                                        <form action="{{route('service.booking.Store',$service)}}" method="post" enctype="multipart/form-data">
                                                            @csrf


                                                              <div class="card-body row pb-0">


                                                                  <div class="input-group col-12">
                                                                      <select class=" w-100 " name="provider_id" >
                                                                          <option selected disabled class="text-muted">ارائه دهنده را از اینجا انتخاب کنید</option>
                                                                          @foreach($service->providers as $provider)
                                                                              <option value="{{$provider->id}}"> {{$provider->firstname}} {{$provider->lastname}} </option>
                                                                          @endforeach

                                                                      </select>

                                                                  </div>


                                                                  <div class="input-group input-group-sm col-12 my-2">
                                                                      <div class="input-group-prepend">
                                                                          <i class="fa fa-calendar"></i>
                                                                          <span class="input-group-text">تاریخ :</span>
                                                                      </div>
                                                                      <input class="normal-example form-control  shadow-none example1" name="date" data-placeholder="انتخاب تاریخ" value="IDTarikhTavallod" >
                                                                  </div>


                                                                  <div class="card-body row pb-0 p-3 ">

                                                                      <input type="submit" class="btn btn-success px-2 mx-auto btn-secondary" value="ثبت سفارش" name="submitInput"  id="IDSubmitInput" aria-describedby="IDSubmitHelp">

                                                                  </div>

{{--                                                            </form>--}}


                                                                  <div class="card-body row pb-0 p-3 ">
                                                                      <a href="{{route('booking.gallery.index',$service)}}" class="btn btn-info px-2 mx-auto btn-secondary" target="_blank" rel="noopener noreferrer">
                                                                          <span class="fa fa-picture-o mx-1"></span>گالری تصاویر</a>
                                                                  </div>                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/. branch card-->


                            @endforeach

                                <form action="{{route('booking.clock',\Illuminate\Support\Facades\Auth::user())}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-6 mx-auto  text-center mb-1 position-fixed fixed-bottom d-flex justify-content-center">
                                        <input type="submit" class="btn btn-success text-center mb-2 w-100" value="ثبت سفارش" name="submitInput"  id="IDSubmitInput" aria-describedby="IDSubmitHelp">
                                    </div>
                                </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')


    <script src="/admin/plugins/multipleSelect/multiple-select.min.js"></script>


    <!-- Persian Data Picker -->
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>


    <script>

        $('.multiple-select').multipleSelect({
        })

        // persian datePicker
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

        // $(".example1").val("انتخاب تاریخ");

        var accordionDetails = document.getElementsByClassName("accordion-details");
        for (let i = 0; i < accordionDetails.length; i++) {
            accordionDetails[i].addEventListener("click", function() {
                this.classList.toggle("active");
                let panel = this.nextElementSibling;
                let btn =this;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";


                }
            });
        }
    </script>


@endsection

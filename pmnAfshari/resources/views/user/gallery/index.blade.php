@extends('user.layout.master')
@section('links')

@endsection

@section('content')

    <div class="row">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">

                <div class="card w-100 h-10 p-2">
                    <div class="card-body ">

                        <div class="row mb-4">

                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small"> خدمت: </label>
                                <span class="  lead font-weight-bolder"  >{{$service->title}}</span>
                            </div>

                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small"> شاخه خدمت: </label>
                                <span class="  lead font-weight-bolder">{{$service->branch->title}}</span>
                            </div>

                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small"> هزینه : </label>
                                <span class="  lead font-weight-bolder"> {{$service->price}} تومان </span>
                            </div>
                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small"> پیش پرداخت : </label>
                                <span class="  lead font-weight-bolder"> {{$service->prepayment}} درصد </span>
                            </div>

                        </div>
                    </div></div>

            </div>

            <div class="col-md-12 col-lg-3 p-1 my-2">
                <div class="card w-100 h-100 rounded px-2 py-2 ">

                    <img class="card-img-top img-responsive rounded" src="{{$service->file}}" alt="Card image cap">
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



            @foreach($service->pictures as $picture)
                <div class="col-md-12 col-lg-3 p-1 my-2">
                    <div class="card w-100 h-100 rounded px-2 py-2 ">

                        <img class="card-img-top img-responsive rounded" src="{{$picture->path}}" alt="Card image cap">
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent mt-auto">

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            @endforeach
        </div>
    </div>

@endsection
@section('scripts')


@endsection

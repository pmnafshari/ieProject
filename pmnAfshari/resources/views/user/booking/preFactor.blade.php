@extends('user.layout.master')
@section('links')


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center justify-content-md-around">

                            <div class="card col-11 col-md-8 my-2 shadow h-100">
                                <div class="card-header">
                                    <h3 class="card-title">پیش فاکتور</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <p>نام کاربر: <span>{{$user->firtname}} {{$user->lastname}}</span></p>



                                    <p>خدمات درخواستی: <span>({{\App\Models\Booking::countBook($booked)}} خدمت)</span> <span>

                                    @foreach($booked as $book)

                                            @if(\App\Models\Buying::where('booking_id',$book->id)->exists() )
                                                {{$book->service->title}} ,
                                            @endif

                                            @endforeach</span></p>

                                    <p>مبلغ کل: <span>
                                            {{\App\Models\Booking::perFactorPrice($user)}}
                                        </span> تومان </p>

                                    <p>پیش پرداخت: <span>
                                            {{\App\Models\Booking::perFactorPrepayment($user)}}
                                        </span>تومان
                                    </p>
                                    <p>مبلغ قابل پرداخت باقی مانده: <span>
                                            {{ \App\Models\Booking::perFactorPrice($user) - \App\Models\Booking::perFactorPrepayment($user)}}
                                        </span>تومان
                                    </p>


                                    <div class="row justify-content-around mt-5">
                                        <button class="btn btn-sm btn-danger col-5 col-md-4" onclick="location.href='{{route('booking.delete.clock',$user)}}';">لغو سفارش</button>
                                        <button class="btn btn-sm btn-success col-5 col-md-4" onclick="location.href='';">تایید و پرداخت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection

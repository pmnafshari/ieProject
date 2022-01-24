
@extends('admin.layout.master')
@section('links')


    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">

    <!-- (MULTIPLE SELECT)   -->
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">


    <!-- select menu searchable -->
    <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">


@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card my-4">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش ساعت تعطیلی</h3>
                        <br>
                        <h8>
                            <span>شروع ساعت کاری : </span><span>{{$workTime->first()->start}}</span>
                        </h8>
                        <br>
                        <h8>
                            <span>پایان ساعت کاری : </span><span>{{$workTime->first()->end}}</span>
                        </h8>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <small id="closingTimeSubmitHelp" class="form-text text-muted"><strong></strong></small>

                        <form class="row border rounded p-3 my-3" method="post" action="{{route('offTime.update',$offTime)}}" >
                            @csrf
                            @method('PATCH')

                            <div class=" form-group col-6 " id="closingTimeStartContainer ">
                                <label for="IDStartClosingTime">شروع تعطیلی</label>
                                <select  class=" select2 custom-select border-0 p-0 m-0 bg-transparent "  name="start" id="IDStartClosingTime"
                                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                    <option value="{{$offTime->first()->start}}" selected> {{$offTime->first()->start}} </option>

                                    @if($workTime->first()->start <= "00:00"&& $workTime->first()->end >= "00:00")                             <option value="00:00">00:00</option>      @endif
                                    @if($workTime->first()->start <= "00:15"&& $workTime->first()->end >= "00:15")                         <option value="00:15">00:15 </option>  @endif
                                    @if($workTime->first()->start <= "00:30"&& $workTime->first()->end >= "00:30")                         <option value="00:30">00:30</option> @endif
                                    @if($workTime->first()->start <= "00:45"&& $workTime->first()->end >= "00:45")                         <option value="00:45">00:45</option> @endif
                                    @if($workTime->first()->start <= "01:00"&& $workTime->first()->end >= "01:00")                         <option value="01:00">01:00</option> @endif
                                    @if($workTime->first()->start <= "01:15"&& $workTime->first()->end >= "01:15")                         <option value="01:15">01:15</option> @endif
                                    @if($workTime->first()->start <= "01:30"&& $workTime->first()->end >= "01:30")                        <option value="01:30">01:30</option> @endif
                                    @if($workTime->first()->start <= "01:45"&& $workTime->first()->end >= "01:45")                         <option value="01:45">01:45</option> @endif
                                    @if($workTime->first()->start <= "02:00"&& $workTime->first()->end >= "02:00")                         <option value="02:00">02:00</option> @endif
                                    @if($workTime->first()->start <= "02:15"&& $workTime->first()->end >= "02:15")                         <option value="02:15">02:15</option> @endif
                                    @if($workTime->first()->start <= "02:30"&& $workTime->first()->end >= "02:30")                         <option value="02:30">02:30</option> @endif
                                    @if($workTime->first()->start <= "02:45"&& $workTime->first()->end >= "02:45")                         <option value="02:45">02:45</option> @endif
                                    @if($workTime->first()->start <= "03:00"&& $workTime->first()->end >= "03:00")                         <option value="03:00">03:00</option> @endif
                                    @if($workTime->first()->start <= "03:15"&& $workTime->first()->end >= "03:15")                         <option value="03:15">03:15</option> @endif
                                    @if($workTime->first()->start <= "03:30"&& $workTime->first()->end >= "03:30")                         <option value="03:30">03:30</option> @endif
                                    @if($workTime->first()->start <= "03:45"&& $workTime->first()->end >= "03:45")                       <option value="03:45">03:45</option> @endif
                                    @if($workTime->first()->start <= "04:00"&& $workTime->first()->end >= "04:00")                         <option value="04:00">04:00</option> @endif
                                    @if($workTime->first()->start <= "04:15"&& $workTime->first()->end >= "04:15")                        <option value="04:15">04:15</option> @endif
                                    @if($workTime->first()->start <= "04:30"&& $workTime->first()->end >= "04:30")                         <option value="04:30">04:30</option> @endif
                                    @if($workTime->first()->start <= "04:45"&& $workTime->first()->end >= "04:45")                         <option value="04:45">04:45</option> @endif
                                    @if($workTime->first()->start <= "05:00"&& $workTime->first()->end >= "05:00")                        <option value="05:00">05:00</option> @endif
                                    @if($workTime->first()->start <= "05:15"&& $workTime->first()->end >= "05:15")                         <option value="05:15">05:15</option> @endif
                                    @if($workTime->first()->start <= "05:30"&& $workTime->first()->end >= "05:30")                         <option value="05:30">05:30</option> @endif
                                    @if($workTime->first()->start <= "05:45"&& $workTime->first()->end >= "05:45")                         <option value="05:45">05:45</option> @endif
                                    @if($workTime->first()->start <= "06:00"&& $workTime->first()->end >= "06:00")                         <option value="06:00">06:00</option> @endif
                                    @if($workTime->first()->start <= "06:15"&& $workTime->first()->end >= "06:15")                        <option value="06:15">06:15</option> @endif
                                    @if($workTime->first()->start <= "06:30"&& $workTime->first()->end >= "06:30")                        <option value="06:30">06:30</option> @endif
                                    @if($workTime->first()->start <= "06:45"&& $workTime->first()->end >= "06:45")                         <option value="06:45">06:45</option> @endif
                                    @if($workTime->first()->start <= "07:00"&& $workTime->first()->end >= "07:00")                         <option value="07:00">07:00</option> @endif
                                    @if($workTime->first()->start <= "07:15"&& $workTime->first()->end >= "07:15")                         <option value="07:15">07:15</option> @endif
                                    @if($workTime->first()->start <= "07:30"&& $workTime->first()->end >= "07:30")                         <option value="07:30">07:30</option> @endif
                                    @if($workTime->first()->start <= "07:45"&& $workTime->first()->end >= "07:45")                         <option value="07:45">07:45</option> @endif
                                    @if($workTime->first()->start <= "08:00"&& $workTime->first()->end >= "08:00")                         <option value="08:00">08:00</option> @endif
                                    @if($workTime->first()->start <= "08:15"&& $workTime->first()->end >= "08:15")                         <option value="08:15">08:15</option> @endif
                                    @if($workTime->first()->start <= "08:30"&& $workTime->first()->end >= "08:30")                         <option value="08:30">08:30</option> @endif
                                    @if($workTime->first()->start <= "08:45"&& $workTime->first()->end >= "08:45")                         <option value="08:45">08:45</option> @endif
                                    @if($workTime->first()->start <= "09:00"&& $workTime->first()->end >= "09:00")                         <option value="09:00">09:00</option> @endif
                                    @if($workTime->first()->start <= "09:15"&& $workTime->first()->end >= "09:15")                        <option value="09:15">09:15</option> @endif
                                    @if($workTime->first()->start <= "09:30"&& $workTime->first()->end >= "09:30")                        <option value="09:30">09:30</option> @endif
                                    @if($workTime->first()->start <= "09:45"&& $workTime->first()->end >= "09:45")                       <option value="09:45">09:45</option> @endif
                                    @if($workTime->first()->start <= "10:00"&& $workTime->first()->end >= "10:00")                         <option value="10:00">10:00</option> @endif
                                    @if($workTime->first()->start <= "10:15"&& $workTime->first()->end >= "10:15")                        <option value="10:15">10:15</option> @endif
                                    @if($workTime->first()->start <= "10:30"&& $workTime->first()->end >= "10:30")                       <option value="10:30">10:30</option> @endif
                                    @if($workTime->first()->start <= "10:45"&& $workTime->first()->end >= "10:45")                      <option value="10:45">10:45</option> @endif
                                    @if($workTime->first()->start <= "11:00"&& $workTime->first()->end >= "11:00")                       <option value="11:00">11:00</option> @endif
                                    @if($workTime->first()->start <= "11:15"&& $workTime->first()->end >= "11:15")                      <option value="11:15">11:15</option> @endif
                                    @if($workTime->first()->start <= "11:30"&& $workTime->first()->end >= "11:30")                       <option value="11:30">11:30</option> @endif
                                    @if($workTime->first()->start <= "11:45"&& $workTime->first()->end >= "11:45")                        <option value="11:45">11:45</option> @endif
                                    @if($workTime->first()->start <= "12:00"&& $workTime->first()->end >= "12:00")                        <option value="12:00">12:00</option> @endif
                                    @if($workTime->first()->start <= "12:15"&& $workTime->first()->end >= "12:15")                       <option value="12:15">12:15</option> @endif
                                    @if($workTime->first()->start <= "12:30"&& $workTime->first()->end >= "12:30")                   <option value="12:30">12:30</option> @endif
                                    @if($workTime->first()->start <= "12:45"&& $workTime->first()->end >= "12:45")                        <option value="12:45">12:45</option> @endif
                                    @if($workTime->first()->start <= "13:00"&& $workTime->first()->end >= "13:00")                    <option value="13:00">13:00</option> @endif
                                    @if($workTime->first()->start <= "13:15"&& $workTime->first()->end >= "13:15")                       <option value="13:15">13:15</option> @endif
                                    @if($workTime->first()->start <= "13:30"&& $workTime->first()->end >= "13:30")                   <option value="13:30">13:30</option> @endif
                                    @if($workTime->first()->start <= "13:45"&& $workTime->first()->end >= "13:45")                   <option value="13:45">13:45</option> @endif
                                    @if($workTime->first()->start <= "14:00"&& $workTime->first()->end >= "14:00")                   <option value="14:00">14:00</option> @endif
                                    @if($workTime->first()->start <= "14:15"&& $workTime->first()->end >= "14:15")                   <option value="14:15">14:15</option> @endif
                                    @if($workTime->first()->start <= "14:30"&& $workTime->first()->end >= "14:30")                   <option value="14:30">14:30</option> @endif
                                    @if($workTime->first()->start <= "14:45"&& $workTime->first()->end >= "14:45")                   <option value="14:45">14:45</option> @endif
                                    @if($workTime->first()->start <= "15:00"&& $workTime->first()->end >= "15:00")                   <option value="15:00">15:00</option> @endif
                                    @if($workTime->first()->start <= "15:15"&& $workTime->first()->end >= "15:15")                   <option value="15:15">15:15</option> @endif
                                    @if($workTime->first()->start <= "15:30"&& $workTime->first()->end >= "15:30")                     <option value="15:30">15:30</option> @endif
                                    @if($workTime->first()->start <= "15:45"&& $workTime->first()->end >= "15:45")                    <option value="15:45">15:45</option> @endif
                                    @if($workTime->first()->start <= "16:00"&& $workTime->first()->end >= "16:00")                     <option value="16:00">16:00</option> @endif
                                    @if($workTime->first()->start <= "16:15"&& $workTime->first()->end >= "16:15")                   <option value="16:15">16:15</option> @endif
                                    @if($workTime->first()->start <= "16:30"&& $workTime->first()->end >= "16:30")                   <option value="16:30">16:30</option> @endif
                                    @if($workTime->first()->start <= "16:45"&& $workTime->first()->end >= "16:45")                   <option value="16:45">16:45</option> @endif
                                    @if($workTime->first()->start <= "17:00"&& $workTime->first()->end >= "17:00")                   <option value="17:00">17:00</option> @endif
                                    @if($workTime->first()->start <= "17:15"&& $workTime->first()->end >= "17:15")                   <option value="17:15">17:15</option> @endif
                                    @if($workTime->first()->start <= "17:30"&& $workTime->first()->end >= "17:30")                   <option value="17:30">17:30</option> @endif
                                    @if($workTime->first()->start <= "17:45"&& $workTime->first()->end >= "17:45")                   <option value="17:45">17:45</option> @endif
                                    @if($workTime->first()->start <= "18:00"&& $workTime->first()->end >= "18:00")                   <option value="18:00">18:00</option> @endif
                                    @if($workTime->first()->start <= "18:15"&& $workTime->first()->end >= "18:15")                   <option value="18:15">18:15</option> @endif
                                    @if($workTime->first()->start <= "18:30"&& $workTime->first()->end >= "18:30")                   <option value="18:30">18:30</option> @endif
                                    @if($workTime->first()->start <= "18:45"&& $workTime->first()->end >= "18:45")                   <option value="18:45">18:45</option> @endif
                                    @if($workTime->first()->start <= "19:00"&& $workTime->first()->end >= "19:00")                    <option value="19:00">19:00</option> @endif
                                    @if($workTime->first()->start <= "19:15"&& $workTime->first()->end >= "19:15")                   <option value="19:15">19:15</option> @endif
                                    @if($workTime->first()->start <= "19:30"&& $workTime->first()->end >= "19:30")                   <option value="19:30">19:30</option> @endif
                                    @if($workTime->first()->start <= "19:45"&& $workTime->first()->end >= "19:45")                      <option value="19:45">19:45</option> @endif
                                    @if($workTime->first()->start <= "20:00"&& $workTime->first()->end >= "20:00")                      <option value="20:00">20:00</option> @endif
                                    @if($workTime->first()->start <= "20:15"&& $workTime->first()->end >= "20:15")                     <option value="20:15">20:15</option> @endif
                                    @if($workTime->first()->start <= "20:30"&& $workTime->first()->end >= "20:30")                      <option value="20:30">20:30</option> @endif
                                    @if($workTime->first()->start <= "20:45"&& $workTime->first()->end >= "20:45")                     <option value="20:45">20:45</option> @endif
                                    @if($workTime->first()->start <= "21:00"&& $workTime->first()->end >= "21:00")                     <option value="21:00">21:00</option> @endif
                                    @if($workTime->first()->start <= "21:15"&& $workTime->first()->end >= "21:15")                     <option value="21:15">21:15</option> @endif
                                    @if($workTime->first()->start <= "21:30"&& $workTime->first()->end >= "21:30")                     <option value="21:30">21:30</option> @endif
                                    @if($workTime->first()->start <= "21:45"&& $workTime->first()->end >= "21:45")                    <option value="21:45">21:45</option> @endif
                                    @if($workTime->first()->start <= "22:00"&& $workTime->first()->end >= "22:00")                    <option value="22:00">22:00</option> @endif
                                    @if($workTime->first()->start <= "22:15"&& $workTime->first()->end >= "22:15")                    <option value="22:15">22:15</option> @endif
                                    @if($workTime->first()->start <= "22:30"&& $workTime->first()->end >= "22:30")                    <option value="22:30">22:30</option> @endif
                                    @if($workTime->first()->start <= "22:45"&& $workTime->first()->end >= "22:45")                    <option value="22:45">22:45</option> @endif
                                    @if($workTime->first()->start <= "23:00"&& $workTime->first()->end >= "23:00")                    <option value="23:00">23:00</option> @endif
                                    @if($workTime->first()->start <= "23:15"&& $workTime->first()->end >= "23:15")                     <option value="23:15">23:15</option> @endif
                                    @if($workTime->first()->start <= "23:30"&& $workTime->first()->end >= "23:30")                     <option value="23:30">23:30</option> @endif
                                    @if($workTime->first()->start <= "23:45"&& $workTime->first()->end >= "23:45")                     <option value="23:45">23:45</option> @endif
                                    @if($workTime->first()->start <= "24:00"&& $workTime->first()->end >= "24:00")                   <option value="24:00">24:00</option> @endif







                                </select>
                            </div>
                            <div class=" form-group col-6 ">
                                <label for="IDEndClosingTime">پایان تعطیلی</label>
                                <select  class=" select2 custom-select border-0 p-0 m-0 bg-transparent "  name="end" id="IDEndClosingTime"
                                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                    <option value="{{$offTime->first()->start}}" selected> {{$offTime->first()->start}} </option>

                                    @if($workTime->first()->start <= "00:00"&& $workTime->first()->end >= "00:00")                             <option value="00:00">00:00</option>      @endif
                                    @if($workTime->first()->start <= "00:15"&& $workTime->first()->end >= "00:15")                         <option value="00:15">00:15 </option>  @endif
                                    @if($workTime->first()->start <= "00:30"&& $workTime->first()->end >= "00:30")                         <option value="00:30">00:30</option> @endif
                                    @if($workTime->first()->start <= "00:45"&& $workTime->first()->end >= "00:45")                         <option value="00:45">00:45</option> @endif
                                    @if($workTime->first()->start <= "01:00"&& $workTime->first()->end >= "01:00")                         <option value="01:00">01:00</option> @endif
                                    @if($workTime->first()->start <= "01:15"&& $workTime->first()->end >= "01:15")                         <option value="01:15">01:15</option> @endif
                                    @if($workTime->first()->start <= "01:30"&& $workTime->first()->end >= "01:30")                        <option value="01:30">01:30</option> @endif
                                    @if($workTime->first()->start <= "01:45"&& $workTime->first()->end >= "01:45")                         <option value="01:45">01:45</option> @endif
                                    @if($workTime->first()->start <= "02:00"&& $workTime->first()->end >= "02:00")                         <option value="02:00">02:00</option> @endif
                                    @if($workTime->first()->start <= "02:15"&& $workTime->first()->end >= "02:15")                         <option value="02:15">02:15</option> @endif
                                    @if($workTime->first()->start <= "02:30"&& $workTime->first()->end >= "02:30")                         <option value="02:30">02:30</option> @endif
                                    @if($workTime->first()->start <= "02:45"&& $workTime->first()->end >= "02:45")                         <option value="02:45">02:45</option> @endif
                                    @if($workTime->first()->start <= "03:00"&& $workTime->first()->end >= "03:00")                         <option value="03:00">03:00</option> @endif
                                    @if($workTime->first()->start <= "03:15"&& $workTime->first()->end >= "03:15")                         <option value="03:15">03:15</option> @endif
                                    @if($workTime->first()->start <= "03:30"&& $workTime->first()->end >= "03:30")                         <option value="03:30">03:30</option> @endif
                                    @if($workTime->first()->start <= "03:45"&& $workTime->first()->end >= "03:45")                       <option value="03:45">03:45</option> @endif
                                    @if($workTime->first()->start <= "04:00"&& $workTime->first()->end >= "04:00")                         <option value="04:00">04:00</option> @endif
                                    @if($workTime->first()->start <= "04:15"&& $workTime->first()->end >= "04:15")                        <option value="04:15">04:15</option> @endif
                                    @if($workTime->first()->start <= "04:30"&& $workTime->first()->end >= "04:30")                         <option value="04:30">04:30</option> @endif
                                    @if($workTime->first()->start <= "04:45"&& $workTime->first()->end >= "04:45")                         <option value="04:45">04:45</option> @endif
                                    @if($workTime->first()->start <= "05:00"&& $workTime->first()->end >= "05:00")                        <option value="05:00">05:00</option> @endif
                                    @if($workTime->first()->start <= "05:15"&& $workTime->first()->end >= "05:15")                         <option value="05:15">05:15</option> @endif
                                    @if($workTime->first()->start <= "05:30"&& $workTime->first()->end >= "05:30")                         <option value="05:30">05:30</option> @endif
                                    @if($workTime->first()->start <= "05:45"&& $workTime->first()->end >= "05:45")                         <option value="05:45">05:45</option> @endif
                                    @if($workTime->first()->start <= "06:00"&& $workTime->first()->end >= "06:00")                         <option value="06:00">06:00</option> @endif
                                    @if($workTime->first()->start <= "06:15"&& $workTime->first()->end >= "06:15")                        <option value="06:15">06:15</option> @endif
                                    @if($workTime->first()->start <= "06:30"&& $workTime->first()->end >= "06:30")                        <option value="06:30">06:30</option> @endif
                                    @if($workTime->first()->start <= "06:45"&& $workTime->first()->end >= "06:45")                         <option value="06:45">06:45</option> @endif
                                    @if($workTime->first()->start <= "07:00"&& $workTime->first()->end >= "07:00")                         <option value="07:00">07:00</option> @endif
                                    @if($workTime->first()->start <= "07:15"&& $workTime->first()->end >= "07:15")                         <option value="07:15">07:15</option> @endif
                                    @if($workTime->first()->start <= "07:30"&& $workTime->first()->end >= "07:30")                         <option value="07:30">07:30</option> @endif
                                    @if($workTime->first()->start <= "07:45"&& $workTime->first()->end >= "07:45")                         <option value="07:45">07:45</option> @endif
                                    @if($workTime->first()->start <= "08:00"&& $workTime->first()->end >= "08:00")                         <option value="08:00">08:00</option> @endif
                                    @if($workTime->first()->start <= "08:15"&& $workTime->first()->end >= "08:15")                         <option value="08:15">08:15</option> @endif
                                    @if($workTime->first()->start <= "08:30"&& $workTime->first()->end >= "08:30")                         <option value="08:30">08:30</option> @endif
                                    @if($workTime->first()->start <= "08:45"&& $workTime->first()->end >= "08:45")                         <option value="08:45">08:45</option> @endif
                                    @if($workTime->first()->start <= "09:00"&& $workTime->first()->end >= "09:00")                         <option value="09:00">09:00</option> @endif
                                    @if($workTime->first()->start <= "09:15"&& $workTime->first()->end >= "09:15")                        <option value="09:15">09:15</option> @endif
                                    @if($workTime->first()->start <= "09:30"&& $workTime->first()->end >= "09:30")                        <option value="09:30">09:30</option> @endif
                                    @if($workTime->first()->start <= "09:45"&& $workTime->first()->end >= "09:45")                       <option value="09:45">09:45</option> @endif
                                    @if($workTime->first()->start <= "10:00"&& $workTime->first()->end >= "10:00")                         <option value="10:00">10:00</option> @endif
                                    @if($workTime->first()->start <= "10:15"&& $workTime->first()->end >= "10:15")                        <option value="10:15">10:15</option> @endif
                                    @if($workTime->first()->start <= "10:30"&& $workTime->first()->end >= "10:30")                       <option value="10:30">10:30</option> @endif
                                    @if($workTime->first()->start <= "10:45"&& $workTime->first()->end >= "10:45")                      <option value="10:45">10:45</option> @endif
                                    @if($workTime->first()->start <= "11:00"&& $workTime->first()->end >= "11:00")                       <option value="11:00">11:00</option> @endif
                                    @if($workTime->first()->start <= "11:15"&& $workTime->first()->end >= "11:15")                      <option value="11:15">11:15</option> @endif
                                    @if($workTime->first()->start <= "11:30"&& $workTime->first()->end >= "11:30")                       <option value="11:30">11:30</option> @endif
                                    @if($workTime->first()->start <= "11:45"&& $workTime->first()->end >= "11:45")                        <option value="11:45">11:45</option> @endif
                                    @if($workTime->first()->start <= "12:00"&& $workTime->first()->end >= "12:00")                        <option value="12:00">12:00</option> @endif
                                    @if($workTime->first()->start <= "12:15"&& $workTime->first()->end >= "12:15")                       <option value="12:15">12:15</option> @endif
                                    @if($workTime->first()->start <= "12:30"&& $workTime->first()->end >= "12:30")                   <option value="12:30">12:30</option> @endif
                                    @if($workTime->first()->start <= "12:45"&& $workTime->first()->end >= "12:45")                        <option value="12:45">12:45</option> @endif
                                    @if($workTime->first()->start <= "13:00"&& $workTime->first()->end >= "13:00")                    <option value="13:00">13:00</option> @endif
                                    @if($workTime->first()->start <= "13:15"&& $workTime->first()->end >= "13:15")                       <option value="13:15">13:15</option> @endif
                                    @if($workTime->first()->start <= "13:30"&& $workTime->first()->end >= "13:30")                   <option value="13:30">13:30</option> @endif
                                    @if($workTime->first()->start <= "13:45"&& $workTime->first()->end >= "13:45")                   <option value="13:45">13:45</option> @endif
                                    @if($workTime->first()->start <= "14:00"&& $workTime->first()->end >= "14:00")                   <option value="14:00">14:00</option> @endif
                                    @if($workTime->first()->start <= "14:15"&& $workTime->first()->end >= "14:15")                   <option value="14:15">14:15</option> @endif
                                    @if($workTime->first()->start <= "14:30"&& $workTime->first()->end >= "14:30")                   <option value="14:30">14:30</option> @endif
                                    @if($workTime->first()->start <= "14:45"&& $workTime->first()->end >= "14:45")                   <option value="14:45">14:45</option> @endif
                                    @if($workTime->first()->start <= "15:00"&& $workTime->first()->end >= "15:00")                   <option value="15:00">15:00</option> @endif
                                    @if($workTime->first()->start <= "15:15"&& $workTime->first()->end >= "15:15")                   <option value="15:15">15:15</option> @endif
                                    @if($workTime->first()->start <= "15:30"&& $workTime->first()->end >= "15:30")                     <option value="15:30">15:30</option> @endif
                                    @if($workTime->first()->start <= "15:45"&& $workTime->first()->end >= "15:45")                    <option value="15:45">15:45</option> @endif
                                    @if($workTime->first()->start <= "16:00"&& $workTime->first()->end >= "16:00")                     <option value="16:00">16:00</option> @endif
                                    @if($workTime->first()->start <= "16:15"&& $workTime->first()->end >= "16:15")                   <option value="16:15">16:15</option> @endif
                                    @if($workTime->first()->start <= "16:30"&& $workTime->first()->end >= "16:30")                   <option value="16:30">16:30</option> @endif
                                    @if($workTime->first()->start <= "16:45"&& $workTime->first()->end >= "16:45")                   <option value="16:45">16:45</option> @endif
                                    @if($workTime->first()->start <= "17:00"&& $workTime->first()->end >= "17:00")                   <option value="17:00">17:00</option> @endif
                                    @if($workTime->first()->start <= "17:15"&& $workTime->first()->end >= "17:15")                   <option value="17:15">17:15</option> @endif
                                    @if($workTime->first()->start <= "17:30"&& $workTime->first()->end >= "17:30")                   <option value="17:30">17:30</option> @endif
                                    @if($workTime->first()->start <= "17:45"&& $workTime->first()->end >= "17:45")                   <option value="17:45">17:45</option> @endif
                                    @if($workTime->first()->start <= "18:00"&& $workTime->first()->end >= "18:00")                   <option value="18:00">18:00</option> @endif
                                    @if($workTime->first()->start <= "18:15"&& $workTime->first()->end >= "18:15")                   <option value="18:15">18:15</option> @endif
                                    @if($workTime->first()->start <= "18:30"&& $workTime->first()->end >= "18:30")                   <option value="18:30">18:30</option> @endif
                                    @if($workTime->first()->start <= "18:45"&& $workTime->first()->end >= "18:45")                   <option value="18:45">18:45</option> @endif
                                    @if($workTime->first()->start <= "19:00"&& $workTime->first()->end >= "19:00")                    <option value="19:00">19:00</option> @endif
                                    @if($workTime->first()->start <= "19:15"&& $workTime->first()->end >= "19:15")                   <option value="19:15">19:15</option> @endif
                                    @if($workTime->first()->start <= "19:30"&& $workTime->first()->end >= "19:30")                   <option value="19:30">19:30</option> @endif
                                    @if($workTime->first()->start <= "19:45"&& $workTime->first()->end >= "19:45")                      <option value="19:45">19:45</option> @endif
                                    @if($workTime->first()->start <= "20:00"&& $workTime->first()->end >= "20:00")                      <option value="20:00">20:00</option> @endif
                                    @if($workTime->first()->start <= "20:15"&& $workTime->first()->end >= "20:15")                     <option value="20:15">20:15</option> @endif
                                    @if($workTime->first()->start <= "20:30"&& $workTime->first()->end >= "20:30")                      <option value="20:30">20:30</option> @endif
                                    @if($workTime->first()->start <= "20:45"&& $workTime->first()->end >= "20:45")                     <option value="20:45">20:45</option> @endif
                                    @if($workTime->first()->start <= "21:00"&& $workTime->first()->end >= "21:00")                     <option value="21:00">21:00</option> @endif
                                    @if($workTime->first()->start <= "21:15"&& $workTime->first()->end >= "21:15")                     <option value="21:15">21:15</option> @endif
                                    @if($workTime->first()->start <= "21:30"&& $workTime->first()->end >= "21:30")                     <option value="21:30">21:30</option> @endif
                                    @if($workTime->first()->start <= "21:45"&& $workTime->first()->end >= "21:45")                    <option value="21:45">21:45</option> @endif
                                    @if($workTime->first()->start <= "22:00"&& $workTime->first()->end >= "22:00")                    <option value="22:00">22:00</option> @endif
                                    @if($workTime->first()->start <= "22:15"&& $workTime->first()->end >= "22:15")                    <option value="22:15">22:15</option> @endif
                                    @if($workTime->first()->start <= "22:30"&& $workTime->first()->end >= "22:30")                    <option value="22:30">22:30</option> @endif
                                    @if($workTime->first()->start <= "22:45"&& $workTime->first()->end >= "22:45")                    <option value="22:45">22:45</option> @endif
                                    @if($workTime->first()->start <= "23:00"&& $workTime->first()->end >= "23:00")                    <option value="23:00">23:00</option> @endif
                                    @if($workTime->first()->start <= "23:15"&& $workTime->first()->end >= "23:15")                     <option value="23:15">23:15</option> @endif
                                    @if($workTime->first()->start <= "23:30"&& $workTime->first()->end >= "23:30")                     <option value="23:30">23:30</option> @endif
                                    @if($workTime->first()->start <= "23:45"&& $workTime->first()->end >= "23:45")                     <option value="23:45">23:45</option> @endif
                                    @if($workTime->first()->start <= "24:00"&& $workTime->first()->end >= "24:00")                   <option value="24:00">24:00</option> @endif


                                </select>
                            </div>
                            <div class="text-right my-3 mb-2">
                                <input type="submit" class="btn btn-success text-center mb-2" value="ثبت ساعت تعطیلی" aria-describedby="closingTimeSubmitHelp" name="setClosingTime"  id="IDSetClosingTime">

                            </div>
                        </form>

                    </div>
                </div>




            </div>
            <!-- /.card-body -->
        </div>


        </div>

        </div>
        <!--/.row-->

    </section>
@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>



    <!--address RelatedSelect-->
    <script src="/admin/plugins/iranAddressJS/Iran-Address-JS.js"></script>

    <!--24HourClockValue-->
    <script src="/admin/plugins/24HourClockValue/24HourClockValue.js"></script>

    <!-- (MULTIPLE SELECT) -->
    <script src="/admin/plugins/multipleSelect/multiple-select.min.js"></script>

    <!-- select menu searchable -->
    <script src="/admin/plugins/select2/select2.full.min.js" ></script>

    <script>

        $(function () {
            $('.select2').select2()
        });



        loadClock();


    </script>

@endsection


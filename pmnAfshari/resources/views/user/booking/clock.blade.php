<select
    class=" select2 custom-select border-0 p-0 m-0 bg-transparent "
    name="clock" id="IDStartTime"
    data-animate="fade"
    data-filter-placeholder="از اینجا جستجو کنید"
    data-filter="true">
    @if(App\Models\Buying::where('booking_id',$booked->id)->exists())
        @foreach(\App\Models\Buying::where('booking_id',$booked->id)->get() as $cart)
            <option value="" selected>
                {{$cart->clock}}
            </option>
        @endforeach

    @else

        @if(\App\Models\WorkTime::first()->start <= "00:00" && (\App\Models\WorkTime::first()->end) >= "00:00" )

            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <="00:00" && (\App\Models\OffTime::first()->end) <= "00:00") || (\App\Models\OffTime::first()->start >= "00:00" && (\App\Models\OffTime::first()->end) >= "00:00"))
                    <option value="00:00">00:00 -  {{\App\Models\Booking::endClock( $booked ,"00:00")}}</option>
                @endif

            @else
                <option value="00:00">00:00 - {{\App\Models\Booking::endClock( $booked ,"00:00")}}</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "00:15"&& (\App\Models\WorkTime::first()->end) >= "00:15")
            @if(\App\Models\OffTime::exists())
                @if((\App\Models\OffTime::first()->start <=  "00:15" && (\App\Models\OffTime::first()->end) <=  "00:15") || (\App\Models\OffTime::first()->start >= "00:15" && (\App\Models\OffTime::first()->end) >= "00:15"))
                    <option value="00:15">00:15</option>
                @endif
            @else
                <option value="00:15">00:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "00:30"&& (\App\Models\WorkTime::first()->end) >= "00:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "00:30" && (\App\Models\OffTime::first()->end) <= "00:30") || (\App\Models\OffTime::first()->start >= "00:30" && (\App\Models\OffTime::first()->end) >= "00:30"))
                    <option value="00:30">00:30</option>
                @endif

            @else
                <option value="00:30">00:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "00:45"&& (\App\Models\WorkTime::first()->end) >= "00:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "00:45" && (\App\Models\OffTime::first()->end) <= "00:45") || (\App\Models\OffTime::first()->start >= "00:45" && (\App\Models\OffTime::first()->end) >= "00:45"))
                    <option value="00:45">00:45</option>
                @endif

            @else
                <option value="00:45">00:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "01:00"&& (\App\Models\WorkTime::first()->end) >= "01:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "01:00" && (\App\Models\OffTime::first()->end) <= "01:00") || (\App\Models\OffTime::first()->start >= "01:00" && (\App\Models\OffTime::first()->end) >= "01:00"))
                    <option value="01:00">01:00</option>
                @endif

            @else
                <option value="01:00">01:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "01:15"&& (\App\Models\WorkTime::first()->end) >= "01:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "01:15" && (\App\Models\OffTime::first()->end) <= "01:15") || (\App\Models\OffTime::first()->start >= "01:15" && (\App\Models\OffTime::first()->end) >= "01:15"))
                    <option value="01:15">01:15</option>
                @endif

            @else
                <option value="01:15">01:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "01:30"&& (\App\Models\WorkTime::first()->end) >= "01:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "01:30" && (\App\Models\OffTime::first()->end) <= "01:30") || (\App\Models\OffTime::first()->start >= "01:30" && (\App\Models\OffTime::first()->end) >= "01:30"))
                    <option value="01:30">01:30</option>
                @endif

            @else
                <option value="01:30">01:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "01:45"&& (\App\Models\WorkTime::first()->end) >= "01:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "01:45" && (\App\Models\OffTime::first()->end) <= "01:45") || (\App\Models\OffTime::first()->start >= "01:45" && (\App\Models\OffTime::first()->end) >= "01:45"))
                    <option value="01:45">01:45</option>
                @endif

            @else
                <option value="01:45">01:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "02:00"&& (\App\Models\WorkTime::first()->end) >= "02:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "02:00" && (\App\Models\OffTime::first()->end) <= "02:00") || (\App\Models\OffTime::first()->start >= "02:00" && (\App\Models\OffTime::first()->end) >= "02:00"))
                    <option value="02:00">02:00</option>
                @endif

            @else
                <option value="02:00">02:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "02:15"&& (\App\Models\WorkTime::first()->end) >= "02:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "02:15" && (\App\Models\OffTime::first()->end) <= "02:15") || (\App\Models\OffTime::first()->start >= "02:15" && (\App\Models\OffTime::first()->end) >= "02:15"))
                    <option value="02:15">02:15</option>
                @endif

            @else
                <option value="02:15">02:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "02:30"&& (\App\Models\WorkTime::first()->end) >= "02:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "02:30" && (\App\Models\OffTime::first()->end) <= "02:30") || (\App\Models\OffTime::first()->start >= "02:30" && (\App\Models\OffTime::first()->end) >= "02:30"))
                    <option value="02:30">02:30</option>
                @endif

            @else
                <option value="02:30">02:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "02:45"&& (\App\Models\WorkTime::first()->end) >= "02:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "02:45" && (\App\Models\OffTime::first()->end) <= "02:45") || (\App\Models\OffTime::first()->start >= "02:45" && (\App\Models\OffTime::first()->end) >= "02:45"))
                    <option value="02:45">02:45</option>
                @endif

            @else
                <option value="02:45">02:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "03:00"&& (\App\Models\WorkTime::first()->end) >= "03:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "03:00" && (\App\Models\OffTime::first()->end) <= "03:00") || (\App\Models\OffTime::first()->start >= "03:00" && (\App\Models\OffTime::first()->end) >= "03:00"))
                    <option value="03:00">03:00</option>
                @endif

            @else
                <option value="03:00">03:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "03:15"&& (\App\Models\WorkTime::first()->end) >= "03:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "03:15" && (\App\Models\OffTime::first()->end) <= "03:15") || (\App\Models\OffTime::first()->start >= "03:15" && (\App\Models\OffTime::first()->end) >= "03:15"))
                    <option value="03:15">03:15</option>
                @endif

            @else
                <option value="03:15">03:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "03:30"&& (\App\Models\WorkTime::first()->end) >= "03:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "03:30" && (\App\Models\OffTime::first()->end) <= "03:30") || (\App\Models\OffTime::first()->start >= "03:30" && (\App\Models\OffTime::first()->end) >= "03:30"))
                    <option value="03:30">03:30</option>
                @endif

            @else
                <option value="03:30">03:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "03:45"&& (\App\Models\WorkTime::first()->end) >= "03:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "03:45" && (\App\Models\OffTime::first()->end) <= "03:45") || (\App\Models\OffTime::first()->start >= "03:45" && (\App\Models\OffTime::first()->end) >= "03:45"))
                    <option value="03:45">03:45</option>
                @endif

            @else
                <option value="03:45">03:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "04:00"&& (\App\Models\WorkTime::first()->end) >= "04:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "04:00" && (\App\Models\OffTime::first()->end) <= "04:00") || (\App\Models\OffTime::first()->start >= "04:00" && (\App\Models\OffTime::first()->end) >= "04:00"))
                    <option value="04:00">04:00</option>
                @endif

            @else
                <option value="04:00">04:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "04:15"&& (\App\Models\WorkTime::first()->end) >= "04:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "04:15" && (\App\Models\OffTime::first()->end) <= "04:15") || (\App\Models\OffTime::first()->start >= "04:15" && (\App\Models\OffTime::first()->end) >= "04:15"))
                    <option value="04:15">04:15</option>
                @endif

            @else
                <option value="04:15">04:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "04:30"&& (\App\Models\WorkTime::first()->end) >= "04:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "04:30" && (\App\Models\OffTime::first()->end) <= "04:30") || (\App\Models\OffTime::first()->start >= "04:30" && (\App\Models\OffTime::first()->end) >= "04:30"))
                    <option value="04:30">04:30</option>
                @endif

            @else
                <option value="04:30">04:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "04:45"&& (\App\Models\WorkTime::first()->end) >= "04:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "04:45" && (\App\Models\OffTime::first()->end) <= "04:45") || (\App\Models\OffTime::first()->start >= "04:45" && (\App\Models\OffTime::first()->end) >= "04:45"))
                    <option value="04:45">04:45</option>
                @endif

            @else
                <option value="04:45">04:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "05:00"&& (\App\Models\WorkTime::first()->end) >= "05:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "05:00" && (\App\Models\OffTime::first()->end) <= "05:00") || (\App\Models\OffTime::first()->start >= "05:00" && (\App\Models\OffTime::first()->end) >= "05:00"))
                    <option value="05:00">05:00</option>
                @endif

            @else
                <option value="05:00">05:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "05:15"&& (\App\Models\WorkTime::first()->end) >= "05:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "05:15" && (\App\Models\OffTime::first()->end) <= "05:15") || (\App\Models\OffTime::first()->start >= "05:15" && (\App\Models\OffTime::first()->end) >= "05:15"))
                    <option value="05:15">05:15</option>
                @endif

            @else
                <option value="05:15">05:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "05:30"&& (\App\Models\WorkTime::first()->end) >= "05:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "05:30" && (\App\Models\OffTime::first()->end) <= "05:30") || (\App\Models\OffTime::first()->start >= "05:30" && (\App\Models\OffTime::first()->end) >= "05:30"))
                    <option value="05:30">05:30</option>
                @endif

            @else
                <option value="05:30">05:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "05:45"&& (\App\Models\WorkTime::first()->end) >= "05:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "05:45" && (\App\Models\OffTime::first()->end) <= "05:45") || (\App\Models\OffTime::first()->start >= "05:45" && (\App\Models\OffTime::first()->end) >= "05:45"))
                    <option value="05:45">05:45</option>
                @endif

            @else
                <option value="05:45">05:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "06:00"&& (\App\Models\WorkTime::first()->end) >= "06:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "06:00" && (\App\Models\OffTime::first()->end) <= "06:00") || (\App\Models\OffTime::first()->start >= "06:00" && (\App\Models\OffTime::first()->end) >= "06:00"))
                    <option value="06:00">06:00</option>
                @endif

            @else
                <option value="06:00">06:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "06:15"&& (\App\Models\WorkTime::first()->end) >= "06:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "06:15" && (\App\Models\OffTime::first()->end) <= "06:15") || (\App\Models\OffTime::first()->start >= "06:15" && (\App\Models\OffTime::first()->end) >= "06:15"))
                    <option value="06:15">06:15</option>
                @endif

            @else
                <option value="06:15">06:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "06:30"&& (\App\Models\WorkTime::first()->end) >= "06:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "06:30" && (\App\Models\OffTime::first()->end) <= "06:30") || (\App\Models\OffTime::first()->start >= "06:30" && (\App\Models\OffTime::first()->end) >= "06:30"))
                    <option value="06:30">06:30</option>
                @endif

            @else
                <option value="06:30">06:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "06:45"&& (\App\Models\WorkTime::first()->end) >= "06:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "06:45" && (\App\Models\OffTime::first()->end) <= "06:45") || (\App\Models\OffTime::first()->start >= "06:45" && (\App\Models\OffTime::first()->end) >= "06:45"))
                    <option value="06:45">06:45</option>
                @endif

            @else
                <option value="06:45">06:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "07:00"&& (\App\Models\WorkTime::first()->end) >= "07:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "07:00" && (\App\Models\OffTime::first()->end) <= "07:00") || (\App\Models\OffTime::first()->start >= "07:00" && (\App\Models\OffTime::first()->end) >= "07:00"))
                    <option value="07:00">07:00</option>
                @endif

            @else
                <option value="07:00">07:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "07:15"&& (\App\Models\WorkTime::first()->end) >= "07:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "07:15" && (\App\Models\OffTime::first()->end) <= "07:15") || (\App\Models\OffTime::first()->start >= "07:15" && (\App\Models\OffTime::first()->end) >= "07:15"))
                    <option value="07:15">07:15</option>
                @endif

            @else
                <option value="07:15">07:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "07:30"&& (\App\Models\WorkTime::first()->end) >= "07:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "07:30" && (\App\Models\OffTime::first()->end) <= "07:30") || (\App\Models\OffTime::first()->start >= "07:30" && (\App\Models\OffTime::first()->end) >= "07:30"))
                    <option value="07:30">07:30</option>
                @endif

            @else
                <option value="07:30">07:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "07:45"&& (\App\Models\WorkTime::first()->end) >= "07:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "07:45" && (\App\Models\OffTime::first()->end) <= "07:45") || (\App\Models\OffTime::first()->start >= "07:45" && (\App\Models\OffTime::first()->end) >= "07:45"))
                    <option value="07:45">07:45</option>
                @endif

            @else
                <option value="07:45">07:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "08:00"&& (\App\Models\WorkTime::first()->end) >= "08:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "08:00" && (\App\Models\OffTime::first()->end) <= "08:00") || (\App\Models\OffTime::first()->start >= "08:00" && (\App\Models\OffTime::first()->end) >= "08:00"))
                    <option value="08:00">08:00</option>
                @endif

            @else
                <option value="08:00">08:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "08:15"&& (\App\Models\WorkTime::first()->end) >= "08:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "08:15" && (\App\Models\OffTime::first()->end) <= "08:15") || (\App\Models\OffTime::first()->start >= "08:15" && (\App\Models\OffTime::first()->end) >= "08:15"))
                    <option value="08:15">08:15</option>
                @endif

            @else
                <option value="08:15">08:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "08:30"&& (\App\Models\WorkTime::first()->end) >= "08:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "08:30" && (\App\Models\OffTime::first()->end) <= "08:30") || (\App\Models\OffTime::first()->start >= "08:30" && (\App\Models\OffTime::first()->end) >= "08:30"))
                    <option value="08:30">08:30</option>
                @endif

            @else
                <option value="08:30">08:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "08:45"&& (\App\Models\WorkTime::first()->end) >= "08:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "08:45" && (\App\Models\OffTime::first()->end) <= "08:45") || (\App\Models\OffTime::first()->start >= "08:45" && (\App\Models\OffTime::first()->end) >= "08:45"))
                    <option value="08:45">08:45</option>
                @endif

            @else
                <option value="08:45">08:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "09:00"&& (\App\Models\WorkTime::first()->end) >= "09:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "09:00" && (\App\Models\OffTime::first()->end) <= "09:00") || (\App\Models\OffTime::first()->start >= "09:00" && (\App\Models\OffTime::first()->end) >= "09:00"))
                    <option value="09:00">09:00</option>
                @endif

            @else
                <option value="09:00">09:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "09:15"&& (\App\Models\WorkTime::first()->end) >= "09:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "09:15" && (\App\Models\OffTime::first()->end) <= "09:15") || (\App\Models\OffTime::first()->start >= "09:15" && (\App\Models\OffTime::first()->end) >= "09:15"))
                    <option value="09:15">09:15</option>
                @endif

            @else
                <option value="09:15">09:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "09:30"&& (\App\Models\WorkTime::first()->end) >= "09:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "09:30" && (\App\Models\OffTime::first()->end) <= "09:30") || (\App\Models\OffTime::first()->start >= "09:30" && (\App\Models\OffTime::first()->end) >= "09:30"))
                    <option value="09:30">09:30</option>
                @endif

            @else
                <option value="09:30">09:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "09:45"&& (\App\Models\WorkTime::first()->end) >= "09:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "09:45" && (\App\Models\OffTime::first()->end) <= "09:45") || (\App\Models\OffTime::first()->start >= "09:45" && (\App\Models\OffTime::first()->end) >= "09:45"))
                    <option value="09:45">09:45</option>
                @endif

            @else
                <option value="09:45">09:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "10:00"&& (\App\Models\WorkTime::first()->end) >= "10:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "10:00" && (\App\Models\OffTime::first()->end) <= "10:00") || (\App\Models\OffTime::first()->start >= "10:00" && (\App\Models\OffTime::first()->end) >= "10:00"))
                    <option value="10:00">10:00</option>
                @endif

            @else
                <option value="10:00">10:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "10:15"&& (\App\Models\WorkTime::first()->end) >= "10:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "10:15" && (\App\Models\OffTime::first()->end) <= "10:15") || (\App\Models\OffTime::first()->start >= "10:15" && (\App\Models\OffTime::first()->end) >= "10:15"))
                    <option value="10:15">10:15</option>
                @endif

            @else
                <option value="10:15">10:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "10:30"&& (\App\Models\WorkTime::first()->end) >= "10:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "10:30" && (\App\Models\OffTime::first()->end) <= "10:30") || (\App\Models\OffTime::first()->start >= "10:30" && (\App\Models\OffTime::first()->end) >= "10:30"))
                    <option value="10:30">10:30</option>
                @endif

            @else
                <option value="10:30">10:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "10:45"&& (\App\Models\WorkTime::first()->end) >= "10:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "10:45" && (\App\Models\OffTime::first()->end) <= "10:45") || (\App\Models\OffTime::first()->start >= "10:45" && (\App\Models\OffTime::first()->end) >= "10:45"))
                    <option value="10:45">10:45</option>
                @endif

            @else
                <option value="10:45">10:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "11:00"&& (\App\Models\WorkTime::first()->end) >= "11:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "11:00" && (\App\Models\OffTime::first()->end) <= "11:00") || (\App\Models\OffTime::first()->start >= "11:00" && (\App\Models\OffTime::first()->end) >= "11:00"))
                    <option value="11:00">11:00</option>
                @endif

            @else
                <option value="11:00">11:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "11:15"&& (\App\Models\WorkTime::first()->end) >= "11:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "11:15" && (\App\Models\OffTime::first()->end) <= "11:15") || (\App\Models\OffTime::first()->start >= "11:15" && (\App\Models\OffTime::first()->end) >= "11:15"))
                    <option value="11:15">11:15</option>
                @endif

            @else
                <option value="11:15">11:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "11:30"&& (\App\Models\WorkTime::first()->end) >= "11:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "11:30" && (\App\Models\OffTime::first()->end) <= "11:30") || (\App\Models\OffTime::first()->start >= "11:30" && (\App\Models\OffTime::first()->end) >= "11:30"))
                    <option value="11:30">11:30</option>
                @endif

            @else
                <option value="11:30">11:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "11:45"&& (\App\Models\WorkTime::first()->end) >= "11:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "11:45" && (\App\Models\OffTime::first()->end) <= "11:45") || (\App\Models\OffTime::first()->start >= "11:45" && (\App\Models\OffTime::first()->end) >= "11:45"))
                    <option value="11:45">11:45</option>
                @endif

            @else
                <option value="11:45">11:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "12:00"&& (\App\Models\WorkTime::first()->end) >= "12:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "12:00" && (\App\Models\OffTime::first()->end) <= "12:00") || (\App\Models\OffTime::first()->start >= "12:00" && (\App\Models\OffTime::first()->end) >= "12:00"))
                    <option value="12:00">12:00</option>
                @endif

            @else
                <option value="12:00">12:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "12:15"&& (\App\Models\WorkTime::first()->end) >= "12:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "12:15" && (\App\Models\OffTime::first()->end) <= "12:15") || (\App\Models\OffTime::first()->start >= "12:15" && (\App\Models\OffTime::first()->end) >= "12:15"))
                    <option value="12:15">12:15</option>
                @endif

            @else
                <option value="12:15">12:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "12:30"&& (\App\Models\WorkTime::first()->end) >= "12:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "12:30" && (\App\Models\OffTime::first()->end) <= "12:30") || (\App\Models\OffTime::first()->start >= "12:30" && (\App\Models\OffTime::first()->end) >= "12:30"))
                    <option value="12:30">12:30</option>
                @endif

            @else
                <option value="12:30">12:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "12:45"&& (\App\Models\WorkTime::first()->end) >= "12:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "12:45" && (\App\Models\OffTime::first()->end) <= "12:45") || (\App\Models\OffTime::first()->start >= "12:45" && (\App\Models\OffTime::first()->end) >= "12:45"))
                    <option value="12:45">12:45</option>
                @endif

            @else
                <option value="12:45">12:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "13:00"&& (\App\Models\WorkTime::first()->end) >= "13:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "13:00" && (\App\Models\OffTime::first()->end) <= "13:00") || (\App\Models\OffTime::first()->start >= "13:00" && (\App\Models\OffTime::first()->end) >= "13:00"))
                    <option value="13:00">13:00</option>
                @endif

            @else
                <option value="13:00">13:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "13:15"&& (\App\Models\WorkTime::first()->end) >= "13:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "13:15" && (\App\Models\OffTime::first()->end) <= "13:15") || (\App\Models\OffTime::first()->start >= "13:15" && (\App\Models\OffTime::first()->end) >= "13:15"))
                    <option value="13:15">13:15</option>
                @endif

            @else
                <option value="13:15">13:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "13:30"&& (\App\Models\WorkTime::first()->end) >= "13:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "13:30" && (\App\Models\OffTime::first()->end) <= "13:30") || (\App\Models\OffTime::first()->start >= "13:30" && (\App\Models\OffTime::first()->end) >= "13:30"))
                    <option value="13:30">13:30</option>
                @endif

            @else
                <option value="13:30">13:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "13:45"&& (\App\Models\WorkTime::first()->end) >= "13:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "13:45" && (\App\Models\OffTime::first()->end) <= "13:45") || (\App\Models\OffTime::first()->start >= "13:45" && (\App\Models\OffTime::first()->end) >= "13:45"))
                    <option value="13:45">13:45</option>
                @endif

            @else
                <option value="13:45">13:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "14:00"&& (\App\Models\WorkTime::first()->end) >= "14:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "14:00" && (\App\Models\OffTime::first()->end) <= "14:00") || (\App\Models\OffTime::first()->start >= "14:00" && (\App\Models\OffTime::first()->end) >= "14:00"))
                    <option value="14:00">14:00</option>
                @endif

            @else
                <option value="14:00">14:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "14:15"&& (\App\Models\WorkTime::first()->end) >= "14:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "14:15" && (\App\Models\OffTime::first()->end) <= "14:15") || (\App\Models\OffTime::first()->start >= "14:15" && (\App\Models\OffTime::first()->end) >= "14:15"))
                    <option value="14:15">14:15</option>
                @endif

            @else
                <option value="14:15">14:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "14:30"&& (\App\Models\WorkTime::first()->end) >= "14:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "14:30" && (\App\Models\OffTime::first()->end) <= "14:30") || (\App\Models\OffTime::first()->start >= "14:30" && (\App\Models\OffTime::first()->end) >= "14:30"))
                    <option value="14:30">14:30</option>
                @endif

            @else
                <option value="14:30">14:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "14:45"&& (\App\Models\WorkTime::first()->end) >= "14:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "14:45" && (\App\Models\OffTime::first()->end) <= "14:45") || (\App\Models\OffTime::first()->start >= "14:45" && (\App\Models\OffTime::first()->end) >= "14:45"))
                    <option value="14:45">14:45</option>
                @endif

            @else
                <option value="14:45">14:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "15:00"&& (\App\Models\WorkTime::first()->end) >= "15:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "15:00" && (\App\Models\OffTime::first()->end) <= "15:00") || (\App\Models\OffTime::first()->start >= "15:00" && (\App\Models\OffTime::first()->end) >= "15:00"))
                    <option value="15:00">15:00</option>
                @endif

            @else
                <option value="15:00">15:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "15:15"&& (\App\Models\WorkTime::first()->end) >= "15:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "15:15" && (\App\Models\OffTime::first()->end) <= "15:15") || (\App\Models\OffTime::first()->start >= "15:15" && (\App\Models\OffTime::first()->end) >= "15:15"))
                    <option value="15:15">15:15</option>
                @endif

            @else
                <option value="15:15">15:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "15:30"&& (\App\Models\WorkTime::first()->end) >= "15:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "15:30" && (\App\Models\OffTime::first()->end) <= "15:30") || (\App\Models\OffTime::first()->start >= "15:30" && (\App\Models\OffTime::first()->end) >= "15:30"))
                    <option value="15:30">15:30</option>
                @endif

            @else
                <option value="15:30">15:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "15:45"&& (\App\Models\WorkTime::first()->end) >= "15:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "15:45" && (\App\Models\OffTime::first()->end) <= "15:45") || (\App\Models\OffTime::first()->start >= "15:45" && (\App\Models\OffTime::first()->end) >= "15:45"))
                    <option value="15:45">15:45</option>
                @endif

            @else
                <option value="15:45">15:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "16:00"&& (\App\Models\WorkTime::first()->end) >= "16:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "16:00" && (\App\Models\OffTime::first()->end) <= "16:00") || (\App\Models\OffTime::first()->start >= "16:00" && (\App\Models\OffTime::first()->end) >= "16:00"))
                    <option value="16:00">16:00</option>
                @endif

            @else
                <option value="16:00">16:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "16:15"&& (\App\Models\WorkTime::first()->end) >= "16:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "16:15" && (\App\Models\OffTime::first()->end) <= "16:15") || (\App\Models\OffTime::first()->start >= "16:15" && (\App\Models\OffTime::first()->end) >= "16:15"))
                    <option value="16:15">16:15</option>
                @endif

            @else
                <option value="16:15">16:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "16:30"&& (\App\Models\WorkTime::first()->end) >= "16:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "16:30" && (\App\Models\OffTime::first()->end) <= "16:30") || (\App\Models\OffTime::first()->start >= "16:30" && (\App\Models\OffTime::first()->end) >= "16:30"))
                    <option value="16:30">16:30</option>
                @endif

            @else
                <option value="16:30">16:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "16:45"&& (\App\Models\WorkTime::first()->end) >= "16:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "16:45" && (\App\Models\OffTime::first()->end) <= "16:45") || (\App\Models\OffTime::first()->start >= "16:45" && (\App\Models\OffTime::first()->end) >= "16:45"))
                    <option value="16:45">16:45</option>
                @endif

            @else
                <option value="16:45">16:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "17:00"&& (\App\Models\WorkTime::first()->end) >= "17:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "17:00" && (\App\Models\OffTime::first()->end) <= "17:00") || (\App\Models\OffTime::first()->start >= "17:00" && (\App\Models\OffTime::first()->end) >= "17:00"))
                    <option value="17:00">17:00</option>
                @endif

            @else
                <option value="17:00">17:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "17:15"&& (\App\Models\WorkTime::first()->end) >= "17:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "17:15" && (\App\Models\OffTime::first()->end) <= "17:15") || (\App\Models\OffTime::first()->start >= "17:15" && (\App\Models\OffTime::first()->end) >= "17:15"))
                    <option value="17:15">17:15</option>
                @endif

            @else
                <option value="17:00">17:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "17:30"&& (\App\Models\WorkTime::first()->end) >= "17:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "17:30" && (\App\Models\OffTime::first()->end) <= "17:30") || (\App\Models\OffTime::first()->start >= "17:30" && (\App\Models\OffTime::first()->end) >= "17:30"))
                    <option value="17:30">17:30</option>
                @endif

            @else
                <option value="17:30">17:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "17:45"&& (\App\Models\WorkTime::first()->end) >= "17:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "17:45" && (\App\Models\OffTime::first()->end) <= "17:45") || (\App\Models\OffTime::first()->start >= "17:45" && (\App\Models\OffTime::first()->end) >= "17:45"))
                    <option value="17:45">17:45</option>
                @endif

            @else
                <option value="17:45">17:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "18:00"&& (\App\Models\WorkTime::first()->end) >= "18:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "18:00" && (\App\Models\OffTime::first()->end) <= "18:00") || (\App\Models\OffTime::first()->start >= "18:00" && (\App\Models\OffTime::first()->end) >= "18:00"))
                    <option value="18:00">18:00</option>
                @endif

            @else
                <option value="18:00">18:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "18:15"&& (\App\Models\WorkTime::first()->end) >= "18:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "18:15" && (\App\Models\OffTime::first()->end) <= "18:15") || (\App\Models\OffTime::first()->start >= "18:15" && (\App\Models\OffTime::first()->end) >= "18:15"))
                    <option value="18:15">18:15</option>
                @endif

            @else
                <option value="18:15">18:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "18:30"&& (\App\Models\WorkTime::first()->end) >= "18:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "18:30" && (\App\Models\OffTime::first()->end) <= "18:30") || (\App\Models\OffTime::first()->start >= "18:30" && (\App\Models\OffTime::first()->end) >= "18:30"))
                    <option value="18:30">18:30</option>
                @endif

            @else
                <option value="18:30">18:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "18:45"&& (\App\Models\WorkTime::first()->end) >= "18:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "18:45" && (\App\Models\OffTime::first()->end) <= "18:45") || (\App\Models\OffTime::first()->start >= "18:45" && (\App\Models\OffTime::first()->end) >= "18:45"))
                    <option value="18:45">18:45</option>
                @endif

            @else
                <option value="18:45">18:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "19:00"&& (\App\Models\WorkTime::first()->end) >= "19:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "19:00" && (\App\Models\OffTime::first()->end) <= "19:00") || (\App\Models\OffTime::first()->start >= "19:00" && (\App\Models\OffTime::first()->end) >= "19:00"))
                    <option value="19:00">19:00</option>
                @endif

            @else
                <option value="19:00">19:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "19:15"&& (\App\Models\WorkTime::first()->end) >= "19:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "19:15" && (\App\Models\OffTime::first()->end) <= "19:15") || (\App\Models\OffTime::first()->start >= "19:15" && (\App\Models\OffTime::first()->end) >= "19:15"))
                    <option value="19:15">19:15</option>
                @endif

            @else
                <option value="19:15">19:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "19:15"&& (\App\Models\WorkTime::first()->end) >= "19:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "19:15" && (\App\Models\OffTime::first()->end) <= "19:15") || (\App\Models\OffTime::first()->start >= "19:15" && (\App\Models\OffTime::first()->end) >= "19:15"))
                    <option value="19:15">19:15</option>
                @endif

            @else
                <option value="19:15">19:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "19:45"&& (\App\Models\WorkTime::first()->end) >= "19:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "19:45" && (\App\Models\OffTime::first()->end) <= "19:45") || (\App\Models\OffTime::first()->start >= "19:45" && (\App\Models\OffTime::first()->end) >= "19:45"))
                    <option value="19:45">19:45</option>
                @endif

            @else
                <option value="19:45">19:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "20:00"&& (\App\Models\WorkTime::first()->end) >= "20:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "20:00" && (\App\Models\OffTime::first()->end) <= "20:00") || (\App\Models\OffTime::first()->start >= "20:00" && (\App\Models\OffTime::first()->end) >= "20:00"))
                    <option value="20:00">20:00</option>
                @endif

            @else
                <option value="20:00">20:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "20:15"&& (\App\Models\WorkTime::first()->end) >= "20:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "20:15" && (\App\Models\OffTime::first()->end) <= "20:15") || (\App\Models\OffTime::first()->start >= "20:15" && (\App\Models\OffTime::first()->end) >= "20:15"))
                    <option value="20:15">20:15</option>
                @endif

            @else
                <option value="20:15">20:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "20:30"&& (\App\Models\WorkTime::first()->end) >= "20:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "20:30" && (\App\Models\OffTime::first()->end) <= "20:30") || (\App\Models\OffTime::first()->start >= "20:30" && (\App\Models\OffTime::first()->end) >= "20:30"))
                    <option value="20:30">20:30</option>
                @endif

            @else
                <option value="20:30">20:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "20:45"&& (\App\Models\WorkTime::first()->end) >= "20:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "20:45" && (\App\Models\OffTime::first()->end) <= "20:45") || (\App\Models\OffTime::first()->start >= "20:45" && (\App\Models\OffTime::first()->end) >= "20:45"))
                    <option value="20:45">20:45</option>
                @endif

            @else
                <option value="20:45">20:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "21:00"&& (\App\Models\WorkTime::first()->end) >= "21:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "21:00" && (\App\Models\OffTime::first()->end) <= "21:00") || (\App\Models\OffTime::first()->start >= "21:00" && (\App\Models\OffTime::first()->end) >= "21:00"))
                    <option value="21:00">21:00</option>
                @endif

            @else
                <option value="21:00">21:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "21:15"&& (\App\Models\WorkTime::first()->end) >= "21:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "21:15" && (\App\Models\OffTime::first()->end) <= "21:15") || (\App\Models\OffTime::first()->start >= "21:15" && (\App\Models\OffTime::first()->end) >= "21:15"))
                    <option value="21:15">21:15</option>
                @endif

            @else
                <option value="21:15">21:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "21:30"&& (\App\Models\WorkTime::first()->end) >= "21:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "21:30" && (\App\Models\OffTime::first()->end) <= "21:30") || (\App\Models\OffTime::first()->start >= "21:30" && (\App\Models\OffTime::first()->end) >= "21:30"))
                    <option value="21:30">21:30</option>
                @endif

            @else
                <option value="21:30">21:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "21:45"&& (\App\Models\WorkTime::first()->end) >= "21:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "21:45" && (\App\Models\OffTime::first()->end) <= "21:45") || (\App\Models\OffTime::first()->start >= "21:45" && (\App\Models\OffTime::first()->end) >= "21:45"))
                    <option value="21:45">21:45</option>
                @endif

            @else
                <option value="21:45">21:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "22:00"&& (\App\Models\WorkTime::first()->end) >= "22:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "22:00" && (\App\Models\OffTime::first()->end) <= "22:00") || (\App\Models\OffTime::first()->start >= "22:00" && (\App\Models\OffTime::first()->end) >= "22:00"))
                    <option value="22:00">22:00</option>
                @endif

            @else
                <option value="22:00">22:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "22:15"&& (\App\Models\WorkTime::first()->end) >= "22:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "22:15" && (\App\Models\OffTime::first()->end) <= "22:15") || (\App\Models\OffTime::first()->start >= "22:15" && (\App\Models\OffTime::first()->end) >= "22:15"))
                    <option value="22:15">22:15</option>
                @endif

            @else
                <option value="22:15">22:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "22:30"&& (\App\Models\WorkTime::first()->end) >= "22:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "22:30" && (\App\Models\OffTime::first()->end) <= "22:30") || (\App\Models\OffTime::first()->start >= "22:30" && (\App\Models\OffTime::first()->end) >= "22:30"))
                    <option value="22:30">22:30</option>
                @endif

            @else
                <option value="22:30">22:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "22:45"&& (\App\Models\WorkTime::first()->end) >= "22:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "22:45" && (\App\Models\OffTime::first()->end) <= "22:45") || (\App\Models\OffTime::first()->start >= "22:45" && (\App\Models\OffTime::first()->end) >= "22:45"))
                    <option value="22:45">22:45</option>
                @endif

            @else
                <option value="22:45">22:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "23:00"&& (\App\Models\WorkTime::first()->end) >= "23:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "23:00" && (\App\Models\OffTime::first()->end) <= "23:00") || (\App\Models\OffTime::first()->start >= "23:00" && (\App\Models\OffTime::first()->end) >= "23:00"))
                    <option value="23:00">23:00</option>
                @endif

            @else
                <option value="23:00">23:00</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "23:15"&& (\App\Models\WorkTime::first()->end) >= "23:15")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "23:15" && (\App\Models\OffTime::first()->end) <= "23:15") || (\App\Models\OffTime::first()->start >= "23:15" && (\App\Models\OffTime::first()->end) >= "23:15"))
                    <option value="23:15">23:15</option>
                @endif

            @else
                <option value="23:15">23:15</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "23:30"&& (\App\Models\WorkTime::first()->end) >= "23:30")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "23:30" && (\App\Models\OffTime::first()->end) <= "23:30") || (\App\Models\OffTime::first()->start >= "23:30" && (\App\Models\OffTime::first()->end) >= "23:30"))
                    <option value="23:30">23:30</option>
                @endif

            @else
                <option value="23:30">23:30</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "23:45"&& (\App\Models\WorkTime::first()->end) >= "23:45")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "23:45" && (\App\Models\OffTime::first()->end) <= "23:45") || (\App\Models\OffTime::first()->start >= "23:45" && (\App\Models\OffTime::first()->end) >= "23:45"))
                    <option value="23:45">23:45</option>
                @endif

            @else
                <option value="23:45">23:45</option>
            @endif
        @endif
        @if(\App\Models\WorkTime::first()->start <= "24:00"&& (\App\Models\WorkTime::first()->end) >= "24:00")
            @if(\App\Models\OffTime::exists())

                @if((\App\Models\OffTime::first()->start <= "24:00" && (\App\Models\OffTime::first()->end) <= "24:00") || (\App\Models\OffTime::first()->start >= "24:00" && (\App\Models\OffTime::first()->end) >= "24:00"))
                    <option value="24:00">24:00</option>
                @endif

            @else
                <option value="24:00">24:00</option>
            @endif
        @endif


    @endif
</select>

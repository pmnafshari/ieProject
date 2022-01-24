<div class="card-body ">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">تعیین ساعت کاری</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body row border rounded ">
            <div class=" form-group col-6" id="startTimeContainer">
                <label for="IDStartTime">شروع ساعت کاری</label>
                <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent border"  name="start" id="IDStartTime"
                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                    @foreach(\App\Models\Provider::providerClocks() as $providerClock)
                        <option value="{{$providerClock}}">{{$providerClock}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" form-group col-6  ">
                <label for="IDEndTime">پایان ساعت کاری</label>
                <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent "  name="end" id="IDEndTime"
                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                    @foreach(\App\Models\Provider::providerClocks() as $providerClock)
                        <option value="{{$providerClock}}"   selected>{{$providerClock}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div></div>

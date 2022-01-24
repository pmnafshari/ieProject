@extends('admin.layout.master')
@section('links')


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 ">
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تنظیمات پنل</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
{{--    @dd($setting->get())--}}
                        <form action="{{route('apiSetting.update',$setting)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="card col-12">
                                    <div class="card-body d-flex flex-column py-5">
                                        <div class="form-group">
                                            <label for="keywordTextarea">keyword</label>
                                            <textarea class="form-control" id="keywordTextarea" rows="3" name="keyword">{{$setting->keyword}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptionTextarea">description</label>
                                            <textarea class="form-control" id="descriptionTextarea" rows="3" name="description">{{$setting->description}}</textarea>
                                        </div>

                                    </div>
                                </div>



                            </div>

                            <div class="text-center mt-5 mb-2">
                                <input type="submit" class="btn btn-success text-center " value="ثبت">
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection

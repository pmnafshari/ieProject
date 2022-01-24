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

                        <form action="{{route('rules.store')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="card col-12">
                                    <div class="card-body d-flex flex-column py-5">
                                        <div class="form-group">
                                            <label for="keywordTextarea">قوانین :</label>
                                            <textarea class="form-control" id="keywordTextarea" rows="3" name="rules"></textarea>
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

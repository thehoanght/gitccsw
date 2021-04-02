@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('selling-import') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header"><strong>Basic Form</strong> Elements</div>
                            @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <div class="card-body">

                                <input class="form-file-input" type="file" name="emailfile" required="true">

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                                <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection

@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit status for change ID') }}: {{ $data->id }}
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/change/{{ $data->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Email old ID</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Email') }}"
                                            name="email_old_id" value="{{ $data->email_old_id }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Email new ID</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Pass') }}"
                                            name="email_new_id" value="{{ $data->email_new_id }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            @if ($data->status == 'pending')
                                                <option value="pending" selected="true">Pending</option>
                                                <option value="done">Done</option>
                                                <option value="review">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone">Failphone</option>
                                                <option value="other">Other</option>
                                            @elseif ($data->status == 'done')
                                                <option value="pending">Pending</option>
                                                <option value="done" selected="true">Done</option>
                                                <option value="review">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone">Failphone</option>
                                                <option value="other">Other</option>
                                            @elseif ($data->status == 'review')
                                                <option value="pending">Pending</option>
                                                <option value="done">Done</option>
                                                <option value="review" selected="true">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone">Failphone</option>
                                                <option value="other">Other</option>

                                            @elseif ($data->status == 'custom')
                                                <option value="pending">Pending</option>
                                                <option value="done" selected="true">Done</option>
                                                <option value="review">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone">Failphone</option>
                                                <option value="other">Other</option>
                                            @elseif ($data->status == 'failphone')
                                                <option value="pending">Pending</option>
                                                <option value="done">Done</option>
                                                <option value="review">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone" selected="true">Failphone</option>
                                                <option value="other">Other</option>
                                            @else
                                                <option value="pending">Pending</option>
                                                <option value="done">Done</option>
                                                <option value="review">Review</option>
                                                <option value="custom">Custom</option>
                                                <option value="failphone">Failphone</option>
                                                <option value="other" selected="true">Other</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('change.index') }}"
                                    class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection

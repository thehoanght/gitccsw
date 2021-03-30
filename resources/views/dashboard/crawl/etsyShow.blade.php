@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Email: {{ $etsy->email_old }}</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/crawl/' . $etsy->id . '/edit') }}"> @csrf<button class="btn btn-primary">Edit</button></form>
                        <br>

                        <p><h4>Email:</h4> {{ $etsy->email_old }}</p>
                        <h4>Password:</h4>
                        <p> {{ $etsy->etsy_password_old }}</p>
                        <h4>Credit Card:</h4>
                        <p>{{ $etsy->credit_card }}</p>
                        <h4>CC Type:</h4>
                        <p>{{ $etsy->credit_card_type }}</p>
                        <h4> Status: </h4>
                        <p>
                            {{ $etsy->status }}
                        </p>
                        <h4>Note type:</h4>
                        <p>{{ $etsy->note_type }}</p>
                        <a href="{{ route('notes.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

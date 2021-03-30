@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $etsy->title }}
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/crawl/{{ $etsy->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Email</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Email') }}"
                                            name="email_old" value="{{ $etsy->email_old }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Password</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Pass') }}"
                                            name="etsy_password_old" value="{{ $etsy->etsy_password_old }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Credit Card</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->credit_card == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Credit Card Type</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Credit Card Type') }}"
                                            name="credit_card_type" value="{{ $etsy->credit_card_type }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Date Created Account</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ __('Date Created Account') }}" name="date_created_account"
                                            value="{{ $etsy->date_created_account }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Zipcode</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Zipcode') }}"
                                            name="address" value="{{ $etsy->address }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Purchased</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->purchased == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Purchased at</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Purchased at') }}"
                                            name="purchased" value="{{ $etsy->purchased }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>GEO</label>
                                        <input class="form-control" type="text" placeholder="{{ __('GEO') }}"
                                            name="country" value="{{ $etsy->country }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Shop</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->shop == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Shop Url</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Shop Url') }}"
                                            name="shop_url" value="{{ $etsy->shop_url }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Facebook</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->facebook == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Google</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->google == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Twitter</label>
                                        <select class="form-control" name="status_id">
                                            @if ($etsy->twitter == 'TRUE')
                                                <option value="TRUE" selected="true">TRUE</option>
                                                <option value="FALSE">TRUE</option>
                                            @else
                                                <option value="TRUE">TRUE</option>
                                                <option value="FALSE" selected="true">FALSE</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Note</label>
                                        <textarea class="form-control" id="textarea-input" name="note" rows="9"
                                            placeholder="{{ __('Note..') }}">{{ $etsy->note }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            @if ($etsy->status == 0)
                                                <option value="1">Unconfirm</option>
                                                <option value="0" selected="true">SendEmail</option>
                                            @else
                                                <option value="1" selected="true">Unconfirm</option>
                                                <option value="0">SendEmail</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('crawl.index') }}"
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

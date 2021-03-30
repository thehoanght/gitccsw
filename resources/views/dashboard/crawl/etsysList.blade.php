@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_accounts}}</div>
                      <div>Total Accounts</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><small class="text-muted">Inlcude pending, done, etc,...</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_pending}}</div>
                      <div>Pending</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: {{$total_accounts!=0?$total_pending/$total_accounts:0*100}}%" aria-valuenow="{{$total_pending}}" aria-valuemin="0" aria-valuemax="{{$total_accounts}}"></div>
                      </div><small class="text-muted">Etsy status is "null"</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_processing}}</div>
                      <div>Processing</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: {{$total_accounts!=0?$total_processing/$total_accounts:0*100}}%" aria-valuenow="{{$total_processing}}" aria-valuemin="0" aria-valuemax="{{$total_accounts}}"></div>
                      </div><small class="text-muted">{{$total_confirm}} send email, {{$total_unconfirm}} don't send.</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_purchased}}</div>
                      <div>Purchased</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: {{$total_accounts!=0?$total_pending/$total_accounts:0*100}}%" aria-valuenow="{{$total_purchased_done}}" aria-valuemin="0" aria-valuemax="{{$total_purchased}}"></div>
                      </div><small class="text-muted">Confirm: {{$total_purchased_done}}/Unconfirm: {{$total_purchased - $total_purchased_done}}</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Etsy Crawl') }}
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>CC</th>
                                        <th>Created</th>
                                        <th>Zipcode</th>
                                        <th>Purchase</th>
                                        <th>GEO</th>
                                        <th>FB</th>
                                        <th>Google</th>
                                        <th>Twitter</th>
                                        <th>DateCrawl</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etsys as $etsy)
                                        <tr>
                                            <td>{{ $etsy->id }}</td>
                                            <td>
                                                <a href="{{ url('/crawl/' . $etsy->id . '/edit') }}"
                                                    class="btn btn-block btn-primary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                @if ($etsy->status == "0")
                                                    <span class="badge badge-success">SendEmail</span>
                                                @else
                                                    <span class="badge badge-secondary">Unconfirm</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ url('/crawl/' . $etsy->id) }}">{{ strtolower($etsy->email_old)}}</a></td>
                                            <td>{{ $etsy->etsy_password_old }}</td>
                                            <td class="text-center">
                                                @if ($etsy->credit_card == 'Visa')
                                                    <svg class="c-icon c-icon-xl">
                                                        <use
                                                            xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-visa">
                                                        </use>
                                                    </svg>
                                                @elseif ($etsy->credit_card == 'MasterCard')
                                                    <svg class="c-icon c-icon-xl">
                                                        <use
                                                            xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-mastercard">
                                                        </use>
                                                    </svg>
                                                @elseif ($etsy->credid_card == "American%20Express")
                                                    <svg class="c-icon c-icon-xl">
                                                        <use
                                                            xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-amex">
                                                        </use>
                                                    </svg>
                                                @else
                                                    ...
                                                @endif
                                            </td>
                                            <td>{{ $etsy->date_created_account }}</td>
                                            <td>{{ $etsy->address }}</td>
                                            <td class="text-center">
                                                @if ($etsy->purchased != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-success">TRUE</span>
                                                @endif
                                            </td>
                                            <td>{{ $etsy->country }}</td>
                                            <td class="text-center">
                                                @if ($etsy->facebook != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($etsy->google != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($etsy->twitter != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                            </td>
                                            <td>{{ $etsy->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $etsys->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

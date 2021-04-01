@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_change}}</div>
                      <div>Total Change</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><small class="text-muted">Inlcude pending, done, etc,...</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-success">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_done}}</div>
                      <div>Done</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: {{$total_change != 0?$total_done/$total_change*100:0}}%" aria-valuenow="{{$total_done}}" aria-valuemin="0" aria-valuemax="{{$total_change}}"></div>
                      </div><small class="text-muted">Change status is "done"</small>
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
                        <div class="progress-bar" role="progressbar" style="width: : {{$total_change != 0?$total_pending/$total_change*100:0}}%" aria-valuenow="{{$total_pending}}" aria-valuemin="0" aria-valuemax="{{$total_change}}"></div>
                      </div><small class="text-muted">Wait for confirm</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body">
                      <div class="text-value-lg">{{$total_fail}}</div>
                      <div>Fail</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: : {{$total_change != 0?$total_fail/$total_change*100:0}}%" aria-valuenow="{{$total_fail}}" aria-valuemin="0" aria-valuemax="{{$total_change}}"></div>
                      </div><small class="text-muted">Status is "failphone", "review", etc...</small>
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
                            <i class="fa fa-align-justify"></i>{{ __('Change Email List') }}
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Status</th>
                                        <th>Email_Old</th>
                                        <th>Email_New</th>
                                        <th>Purchased</th>
                                        <th>Shop</th>
                                        <th>FB/GG/TW</th>
                                        <th>ChangeAt</th>
                                        <th>ConfirmAt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>
                                                <a href="{{ url('/change/' . $data->id . '/edit') }}"
                                                    class="btn btn-block btn-primary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                @if ($data->status == "done")
                                                    <span class="badge badge-success">{{$data->status}}</span>
                                                @elseif ($data->status == "custom")
                                                    <span class="badge badge-warning">{{$data->status}}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{$data->status}}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ url('/crawl/' . $data->email_old_id ) }}">{{ strtolower(DB::table('etsy_accounts')->find($data->email_old_id)->email_old)}}</a></td>
                                            <td>{{ DB::table('email_accounts')->find($data->email_new_id)->email  }}</td>
                                            <td class="text-center">
                                                @if (DB::table('etsy_accounts')->find($data->email_old_id)->purchased != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-success">TRUE</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (DB::table('etsy_accounts')->find($data->email_old_id)->shop != 'TRUE')
                                                    <span class="badge badge-secondary"><a href="https://etsy.com/shop/{{DB::table('etsy_accounts')->find($data->email_old_id)->shop}}">{{DB::table('etsy_accounts')->find($data->email_old_id)->shop}}</a></span>
                                                @else
                                                    <span class="badge badge-success"><a href="https://etsy.com/shop/{{DB::table('etsy_accounts')->find($data->email_old_id)->shop}}">{{DB::table('etsy_accounts')->find($data->email_old_id)->shop}}</a></span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (DB::table('etsy_accounts')->find($data->email_old_id)->facebook != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                                @if (DB::table('etsy_accounts')->find($data->email_old_id)->google != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                                @if (DB::table('etsy_accounts')->find($data->email_old_id)->twitter != 'TRUE')
                                                    <span class="badge badge-secondary">FALSE</span>
                                                @else
                                                    <span class="badge badge-warning">TRUE</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->change_email_at }}</td>
                                            <td>{{ $data->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $datas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

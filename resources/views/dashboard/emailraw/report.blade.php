@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">

                <div class="col-sm-6 col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-2xl">
                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-chart-pie"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg">{{$total_email}}</div><small
                                class="text-muted text-uppercase font-weight-bold">Total Emails</small>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-2xl">
                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-speedometer"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg">{{$email_available}}</div><small
                                class="text-muted text-uppercase font-weight-bold">Email Available</small>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Email Available</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-hover table-outline mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            <svg class="c-icon">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-people"></use>
                                            </svg>
                                        </th>
                                        <th>Email</th>
                                        <th class="text-center">Status</th>
                                        <th>Email Recover</th>
                                        <th class="text-center">Type</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                @foreach ( $emails as $email )
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class="c-avatar"><img class="c-avatar-img" src="assets/img/hotmail.jpg"
                                                    alt="{{$email->email}}"><span class="c-avatar-status bg-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>{{$email->email}}</div>
                                            <div class="small text-muted"><span>Pass: {{$email->password}}</span> | Added: {{$email->created_at}}</div>
                                        </td>
                                        <td class="text-center">
                                            @if ($email->status == "0")
                                                <span class="badge badge-secondary">Used</span>
                                            @else
                                                <span class="badge badge-success">Available</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">{{$email->email_recover}}</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <svg class="c-icon c-icon-xl">
                                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-mastercard">
                                                </use>
                                            </svg>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last update </div><strong>{{$email->updated_at}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            {{ $emails->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection

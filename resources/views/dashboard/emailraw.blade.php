@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6 col-lg-6">
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Add Email</a><a class="dropdown-item" href="#">Search</a><a class="dropdown-item" href="#">Export</a></div>
                      </div>
                      <div class="text-value-lg">9.823</div>
                      <div>Total Emails</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-6">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      <button class="btn btn-transparent p-0 float-right" type="button">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                        </svg>
                      </button>
                      <div class="text-value-lg">9.823</div>
                      <div>Available</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Email Table</div>
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
                            <th>Created at</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                            </td>
                            <td>
                              <div>Yiorgos Avraamu</div>
                              <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-us c-icon-xl" id="us" title="us"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>50%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-mastercard"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>10 sec ago</strong>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>
                            </td>
                            <td>
                              <div>Avram Tarasios</div>
                              <div class="small text-muted"><span>Recurring</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-br c-icon-xl" id="br" title="br"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>10%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-visa"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>5 minutes ago</strong>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"><span class="c-avatar-status bg-warning"></span></div>
                            </td>
                            <td>
                              <div>Quintin Ed</div>
                              <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-in c-icon-xl" id="in" title="in"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>74%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-stripe"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>1 hour ago</strong>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"><span class="c-avatar-status bg-secondary"></span></div>
                            </td>
                            <td>
                              <div>Enéas Kwadwo</div>
                              <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-fr c-icon-xl" id="fr" title="fr"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>98%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-paypal"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>Last month</strong>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                            </td>
                            <td>
                              <div>Agapetus Tadeáš</div>
                              <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-es c-icon-xl" id="es" title="es"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>22%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-apple-pay"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>Last week</strong>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>
                            </td>
                            <td>
                              <div>Friderik Dávid</div>
                              <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-pl c-icon-xl" id="pl" title="pl"></i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>43%</strong></div>
                                <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                              </div>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td class="text-center">
                              <svg class="c-icon c-icon-xl">
                                <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-amex"></use>
                              </svg>
                            </td>
                            <td>
                              <div class="small text-muted">Last login</div><strong>Yesterday</strong>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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

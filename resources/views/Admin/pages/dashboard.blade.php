@extends("Admin.AdminLayout.app")
@section('title', 'Dashboard')


@section('content')


<div class="content-page">
    <div class="content">

        <!-- breadcrum-->
        <x-AdminComps.adminBreadcrum
            pageTitle="Dashboard"
            urlTitle="Home"
            url="{{ route('adminDashboard') }}"
        />




        <div class="row">
            <div class="col-xl-4">
                <div class="card card-box" style="height: 318px">
                    <h4 class="header-title mb-3">ONLINE ADMIN</h4>
                    <div class="text-center">
                        <img src="{{ auth()->guard('admin')->user()->photo }}" style="width: 100%; height: 210px; object-fit:contain">
                        <h4>{{ ucwords(auth()->guard('admin')->user()->first_name) }} {{ ucwords(auth()->guard('admin')->user()->last_name) }}</h4>
                    </div>
                </div>
            </div>

            @if(auth()->guard('admin')->user()->id == 1)
            <div class="col-xl-8">
                <div class="card card-box">
                    <h4 class="header-title mb-3">Recent Admin Activity</h4>

                    <div class="table-responsive" style="height: 230px; border: 1px solid #ccc; overflow-y: scroll;">
                        <table class="table table-borderless table-hover table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>IP Address</th>
                                <th>Browser</th>
                                <th>Location</th>
                                <th>Last Seen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loginAct as $log):
                                $descriptions = json_decode($log->location);
                            ?>
                                <tr>
                                <td><?=ucwords($log->first_name)?></td>
                                <td><?=ucwords($log->last_name)?></td>
                                <td><?=$log->ip?></td>
                                <td><?=$log->browser?></td>
                                <td>
                                    {{-- <?php if($descriptions) {
                                    foreach ($descriptions as $desc) {?>
                                        <span><?=$desc->city?></span>
                                    <?php } } ?> --}}
                                </td>
                                <td>{{ date('M d, Y', strtotime($log->created_at)) }}</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                  </table>
              </div>
              </div>
            </div>
            @endif
        </div>




        <div class="row">
            <div class="col-xl-6">
                <div class="card card-box">
                    <h4 class="header-title mb-3">Vendor's Information</h4>
                    <ul class="list-group">
                        @foreach ($vendor as $ven)
                        <li class="list-group-item">Developer Name: <span> {{ $ven->name }}</span></li>
                        <li class="list-group-item">Website: <span> <a href="{{ $ven->website }}" target="_blank">{{ $ven->website }}</a></span></li>
                        <li class="list-group-item">Date Relesed: <span>{{ date('M d, Y', strtotime($ven->version_date)) }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-xl-6">
              <div class="card card-box">
                <h4 class="header-title mb-3">Client Information</h4>
                <ul class="list-group">
                    <li class="list-group-item">Client Name: <span>{{ ucwords($client->site_name) }}</span></li>
                    <li class="list-group-item">Server: <span>{{ $client->site_url }}</span></li>
                    <li class="list-group-item">Server IP Address: <span>107.31.58.183</span></li>
                </ul>
              </div>
            </div>
        </div>



    </div>
</div>



@endsection

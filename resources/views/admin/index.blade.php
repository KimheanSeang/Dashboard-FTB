@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                            data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                        data-input>
                </div>
                <button id="printButton" type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <script>
                    document.getElementById("printButton").addEventListener("click", function() {
                        window.print();
                    });
                </script>

                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">All User</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if (Auth::user()->can('all.admin'))
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ route('all.admin') }}"><i data-feather="eye"
                                                        class="icon-sm me-2"></i> <span class="">View</span></a>
                                            @endif
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <!-- User Count Section -->
                                        @php
                                            $previousUsersCount = 1;
                                            $currentUsersCount = App\Models\User::count();
                                            $usersCountChange = $currentUsersCount - $previousUsersCount;

                                            $usersCountChangePercentage =
                                                $previousUsersCount != 0
                                                    ? ($usersCountChange / $previousUsersCount) * 1
                                                    : 0;
                                        @endphp
                                        <h3 class="mb-2">{{ $currentUsersCount }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="{{ $usersCountChange > 0 ? 'text-success' : 'text-danger' }}">
                                                <span>{{ $usersCountChangePercentage }}%</span>
                                                <i data-feather="{{ $usersCountChange > 0 ? 'arrow-up' : 'arrow-down' }}"
                                                    class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">All File</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @if (Auth::user()->can('chatbot.menu'))
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ route('all.doc') }}"><i data-feather="eye"
                                                        class="icon-sm me-2"></i> <span class="">View</span></a>
                                            @endif
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        @php
                                            $previousFilesCount = 1; // You need to fetch the previous count from somewhere, such as database
                                            $currentFilesCount = App\Models\UploadFile::count();
                                            $filesCountChange = $currentFilesCount - $previousFilesCount;
                                            $filesCountChangePercentage =
                                                $previousFilesCount != 0
                                                    ? ($filesCountChange / $previousFilesCount) * 1
                                                    : 0;
                                        @endphp
                                        <h3 class="mb-2">{{ $currentFilesCount }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="{{ $filesCountChange > 0 ? 'text-success' : 'text-danger' }}">
                                                <span>{{ $filesCountChangePercentage }}%</span>
                                                <i data-feather="{{ $filesCountChange > 0 ? 'arrow-up' : 'arrow-down' }}"
                                                    class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">All Task</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            @if (Auth::user()->can('all.task'))
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ route('all.todo') }}"><i data-feather="eye"
                                                        class="icon-sm me-2"></i> <span class="">View</span></a>
                                            @endif
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        @php
                                            $previousTasksCount = 1; // You need to fetch the previous count from somewhere, such as database
                                            $currentTasksCount = App\Models\Task::count();
                                            $tasksCountChange = $currentTasksCount - $previousTasksCount;
                                            $tasksCountChangePercentage =
                                                $previousTasksCount != 0
                                                    ? ($tasksCountChange / $previousTasksCount) * 1
                                                    : 0;
                                        @endphp
                                        <h3 class="mb-2">{{ $currentTasksCount }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="{{ $tasksCountChange > 0 ? 'text-success' : 'text-danger' }}">
                                                <span>{{ $tasksCountChangePercentage }}%</span>
                                                <i data-feather="{{ $tasksCountChange > 0 ? 'arrow-up' : 'arrow-down' }}"
                                                    class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="growthChart" class="mt-md-3 mt-xl-0"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Real-Time chart</h6>
                        <div class="flot-chart-wrapper">
                            <div class="flot-chart" id="flotRealTime" style="padding: 0px;"><canvas class="flot-base"
                                    width="976" height="500"
                                    style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 781.2px; height: 400px;"></canvas>
                                <div class="flot-text"
                                    style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis"
                                        style="position: absolute; inset: 0px;">
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 23px; text-align: center;">
                                            0</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 144px; text-align: center;">
                                            50</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 265px; text-align: center;">
                                            100</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 390px; text-align: center;">
                                            150</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 515px; text-align: center;">
                                            200</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; max-width: 111px; top: 382px; left: 639px; text-align: center;">
                                            250</div>
                                    </div>
                                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis"
                                        style="position: absolute; inset: 0px;">
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 367px; left: 14px; text-align: right;">0</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 306px; left: 8px; text-align: right;">25</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 245px; left: 8px; text-align: right;">50</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 184px; left: 8px; text-align: right;">75</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 123px; left: 1px; text-align: right;">100</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 61px; left: 1px; text-align: right;">125</div>
                                        <div class="flot-tick-label tickLabel"
                                            style="position: absolute; top: 0px; left: 1px; text-align: right;">150</div>
                                    </div>
                                </div><canvas class="flot-overlay" width="976" height="500"
                                    style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 781.2px; height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>UserName</th>
                                        <th>User Email</th>
                                        <th>Create At</th>
                                        <th>Create By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alladmin as $key => $item)
                                        @if ($key < 10)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <img
                                                        src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : url('upload/no.jpg') }}">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->created_by }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

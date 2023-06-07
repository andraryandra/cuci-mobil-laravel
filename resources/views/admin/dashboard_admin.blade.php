@extends('layouts.app')
@section('title', 'Dahsboard - Home')
@section('contentAdmin')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Amezia</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard 2</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard 2</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body row justify-content-center">
                    <div class="col-5 align-self-center">
                        <h4 class="mt-0 mb-2 font-20">1530</h4>
                        <p class="mb-2 text-muted font-13 text-nowrap">Unique Visitors</p>
                        <span class="badge badge-soft-success mt-1 shadow-none"><i
                                class="mdi mdi-menu-up font-16"></i>20.15%</span>
                    </div>
                    <div class="col-7 align-self-center"><span class="peity-line" data-width="100%"
                            data-peity='{ "fill": ["#b5f1e0"],"stroke": ["#0acf97"]}'
                            data-height="80">1,2,3,4,3,6,3,5,3,3,4,2</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body row justify-content-center">
                    <div class="col-5 align-self-center">
                        <h4 class="mt-0 mb-2 font-20">8320</h4>
                        <p class="mb-2 text-muted font-13 text-nowrap">New Users</p>
                        <span class="badge badge-soft-danger mt-1 shadow-none"><i
                                class="mdi mdi-menu-down font-16"></i>7.15%</span>
                    </div>
                    <div class="col-7 align-self-center text-right"><span class="peity-line" data-width="100%"
                            data-peity='{ "fill": ["#d6d8f5"],"stroke": ["#777edd"]}'
                            data-height="80">0,3,6,3,4,2,6,1,8,4,4,2</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body row justify-content-center">
                    <div class="col-5 align-self-center">
                        <h4 class="mt-0 mb-2 font-20">1840</h4>
                        <p class="mb-2 text-muted font-13 text-nowrap">New Orders</p>
                        <span class="badge badge-soft-danger mt-1 shadow-none"><i
                                class="mdi mdi-menu-down font-16"></i>6.05%</span>
                    </div>
                    <div class="col-7 align-self-center"><span class="peity-line" data-width="100%"
                            data-peity='{ "fill": ["#fdebb5"],"stroke": ["#f9bc0b"]}'
                            data-height="80">2,4,7,3,5,3,6,3,4,3,2,1,2</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body row justify-content-center">
                    <div class="col-5 align-self-center">
                        <h4 class="mt-0 mb-2 font-20">2501</h4>
                        <p class="mb-2 text-muted font-13 text-nowrap">Total Sales</p>
                        <span class="badge badge-soft-success mt-1 shadow-none"><i
                                class="mdi mdi-menu-up font-16"></i>8.97%</span>
                    </div>
                    <div class="col-7 align-self-center"><span class="peity-bar"
                            data-peity='{ "fill": ["#ffd1e1", "#ffd1e1"]}' data-width="100%"
                            data-height="80">5,6,2,8,9,4,7,10,11,12,10,4,7,10</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-0">Overview</h5>
                    <div class="row">
                        <div class="col-lg-9 col-xl-9 border-right">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div id="morris-line-chart" class="morris-chart overview-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 col-xl-3">
                            <div class="card mb-0 overview shadow-none">
                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="overview-content"><i
                                                        class="mdi mdi-share-variant text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-8 text-right">
                                                <p class="text-muted font-13 mb-0">Sheres</p>
                                                <h4 class="mb-0 font-20">7,503</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="overview-content"><i
                                                        class="mdi mdi-gesture-double-tap text-purple"></i>
                                                </div>
                                            </div>
                                            <div class="col-8 text-right">
                                                <p class="text-muted font-13 mb-0">Clicks</p>
                                                <h4 class="mb-0 font-20">3,503</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="overview-content"><i class="mdi mdi-earth text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-8 text-right">
                                                <p class="text-muted font-13 mb-0">Countries</p>
                                                <h4 class="mb-0 font-20">51</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="overview-content"><i
                                                        class="mdi mdi-access-point text-pink"></i></div>
                                            </div>
                                            <div class="col-8 text-right">
                                                <p class="text-muted font-13 mb-0">Virality</p>
                                                <h4 class="mb-0 font-20">4.55%</h4>
                                            </div>
                                            <div class="col-12">
                                                <div class="progress mt-4" style="height: 6px;">
                                                    <div class="progress-bar progress-animated bg-pink" role="progressbar"
                                                        style="max-width: 85%; border-radius: 5px;" aria-valuenow="85"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body donut">
                    <h5 class="mt-0">Summary</h5>
                    <div id="animating-donut" class="ct-chart ct-golden-section mb-3 summary-chart"></div>
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item mt-2">
                            <span class="text-muted font-13"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-info"></i>In-Store</span>
                        </li>
                        <li class="list-inline-item mt-2">
                            <span class="text-muted font-13"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-danger"></i>Download</span>
                        </li>
                        <li class="list-inline-item mt-2">
                            <span class="text-muted font-13"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-success"></i>Mail-Order</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-0">By Countrues</h5>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div id="world-map-markers" class="dashboard-map"></div>
                        </div>
                        <div class="col-md-12 col-lg-4 align-self-center">
                            <p class="text-muted font-13 mb-1"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-success"></i>India <span
                                    class="float-right">35%</span></p>
                            <div class="progress mb-4" style="height: 3px;">
                                <div class="progress-bar progress-animated bg-success" role="progressbar"
                                    style="max-width: 35%; border-radius: 50px;" aria-valuenow="55" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted font-13 mb-1"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-success"></i>USA <span
                                    class="float-right">58%</span></p>
                            <div class="progress mb-4" style="height: 3px;">
                                <div class="progress-bar progress-animated bg-success" role="progressbar"
                                    style="max-width: 58%; border-radius: 50px;" aria-valuenow="58" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted font-13 mb-1"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-danger"></i>Russia <span
                                    class="float-right">85%</span></p>
                            <div class="progress mb-4" style="height: 3px;">
                                <div class="progress-bar progress-animated bg-danger" role="progressbar"
                                    style="max-width: 85%; border-radius: 50px;" aria-valuenow="85" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted font-13 mb-1"><i
                                    class="mdi mdi-checkbox-blank-circle mr-2 text-success"></i>Australia
                                <span class="float-right">71%</span>
                            </p>
                            <div class="progress mb-0" style="height: 3px;">
                                <div class="progress-bar progress-animated bg-success" role="progressbar"
                                    style="max-width: 71%; border-radius: 50px;" aria-valuenow="71" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="card bg-primary text-white income">
                <div class="card-body">
                    <h5 class="mt-0">This Month Income</h5>
                    <div class="">
                        <h1 class="my-4"><i class="mdi mdi-wallet text-light mr-3"></i>$ 8530.50</h1>
                        <span class="float-right">Last Month : $6500.50</span> <a href="#"
                            class="text-white my-4">Read More<i class="mdi mdi-arrow-right ml-2"></i></a>
                        <div class="mt-4"><span class="peity-bar" data-peity='{ "fill": ["#9dcee8", "#9dcee8"]}'
                                data-width="100%"
                                data-height="162">1,2,3,4,3,6,3,5,3,8,4,2,6,3,5,3,8,4,2,5,2,3,4,3,6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

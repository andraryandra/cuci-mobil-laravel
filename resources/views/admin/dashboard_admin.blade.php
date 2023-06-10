@extends('layouts.app')
@section('title', 'Dahsboard - Home')
@section('contentAdmin')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Admin</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard - Admin</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <!-- Menampilkan grafik -->
        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body text-center">
                    <i class="fa fa-user fa-2x"></i>
                    <h4 class="mt-0 mb-2 font-20">{{ $users_count }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Total Users</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body text-center">
                    <i class="fa fa-car fa-2x"></i>
                    <h4 class="mt-0 mb-2 font-20">{{ $kategori_mobil_count }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Total Kategori Mobil</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body text-center">
                    <i class="fa fa-cube fa-2x"></i>
                    <h4 class="mt-0 mb-2 font-20">{{ $produk_count }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Total Produk</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-content">
                <div class="card-body text-center">
                    <i class="fa fa-money fa-2x"></i>
                    <h4 class="mt-0 mb-2 font-20">{{ $transaksi_count }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Total Transaksi</p>
                </div>
            </div>
        </div>





    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-0">Welcome To Dashboard - {{ Auth::user()->name }}</h5>
                    <div class="row">

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
                    <div class="chart-container">
                        <canvas id="user-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Omset Booking per Produk</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h1 class="my-1">
                            <i class="mdi mdi-wallet text-light mr-3 text-primary"></i>
                            {{ array_sum($transaksiCounts) }}
                        </h1>
                        <h3 class="bg-primary p-2 text-white rounded">
                            Total: {{ 'IDR. ' . number_format($total_transaksi_sum, 0, ',', '.') }}
                        </h3>
                        @foreach ($totalOmset as $omset)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $omset->nama_produk }}
                                <span class="badge badge-primary badge-pill">
                                    Rp {{ number_format($omset->total_omset, 0, ',', '.') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Transaksi per Produk</h5>
                </div>
                <div class="card-body">
                    <div style="height: 260px;">
                        <canvas id="chartpendapatan"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Transaksi Omset per Kategori Mobil</h5>
                </div>
                <div class="card-body">
                    <div style="height: 260px;">
                        <div class="chart-container">
                            <canvas id="omsetChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Transaksi per Kategori Mobil</h5>
                </div>
                <div class="card-body">
                    <div style="height: 400px">
                        <canvas id="kategori-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @push('style')
    @endpush

    @push('script')
        <script src="{{ url('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var userRoles = {!! json_encode($userRoles) !!};
                var userCounts = {!! json_encode($userCounts) !!};

                var colors = ['#4CAF50', '#FFC107', '#2196F3', '#9C27B0', '#E91E63'];

                var ctx = document.getElementById("user-chart").getContext("2d");
                var chart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: userRoles,
                        datasets: [{
                            data: userCounts,
                            backgroundColor: colors,
                            borderColor: "#fff",
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: "bottom"
                        },
                        cutout: "70%",
                        plugins: {
                            title: {
                                display: true,
                                text: "Users by Role",
                                font: {
                                    size: 16
                                }
                            }
                        }
                    }
                });
            });
        </script>

        {{-- <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var produkNames = {!! json_encode($produkNames) !!};
                    var produkPrices = {!! json_encode($produkPrices) !!};

                    var ctx = document.getElementById("transaksi-chart").getContext("2d");
                    var chart = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: produkNames,
                            datasets: [{
                                label: "Total Transaksi",
                                data: produkPrices,
                                backgroundColor: "#9dcee8",
                                borderWidth: 0
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        display: false
                                    }
                                },
                                y: {
                                    grid: {
                                        display: true
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            },
                            plugins: {
                                title: {
                                    display: false
                                }
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 10,
                                    top: 10,
                                    bottom: 10
                                }
                            },
                            maintainAspectRatio: false
                        }
                    });
                });
            </script> --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var produkNames = {!! json_encode($produkNames) !!};
                var produkPrices = {!! json_encode($produkPrices) !!};

                var ctx = document.getElementById("transaksi-chart").getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: produkNames,
                        datasets: [{
                            label: "Total Transaksi",
                            data: produkPrices,
                            backgroundColor: "#9dcee8",
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    display: false
                                }
                            },
                            y: {
                                grid: {
                                    display: true
                                },
                                ticks: {
                                    beginAtZero: true
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: false
                            }
                        },
                        layout: {
                            padding: {
                                left: 10,
                                right: 10,
                                top: 10,
                                bottom: 10
                            }
                        },
                        maintainAspectRatio: false
                    }
                });
            });
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var kategoriLabels = {!! json_encode($kategoriLabels) !!};
                var totalTransaksiData = {!! json_encode($totalTransaksi->pluck('total_transaksi')) !!};

                var ctx = document.getElementById("kategori-chart").getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: kategoriLabels,
                        datasets: [{
                            label: "Total Transaksi",
                            data: totalTransaksiData,
                            backgroundColor: "#9dcee8",
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    display: true, // Menampilkan label
                                    autoSkip: false, // Tidak melakukan skip otomatis
                                    maxRotation: 0 // Tidak memutar label
                                }
                            },
                            y: {
                                grid: {
                                    display: true
                                },
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(value) {
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: false
                            }
                        },
                        layout: {
                            padding: {
                                left: 10,
                                right: 10,
                                top: 10,
                                bottom: 10
                            }
                        },
                        maintainAspectRatio: false
                    }
                });
            });
        </script>

        <script>
            // Create a chart instance
            var ctx = document.getElementById('chartpendapatan').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($produkNames) !!},
                    datasets: [{
                        label: 'Total Transaksi',
                        data: {!! json_encode($totalTransaksiCounts) !!},
                        backgroundColor: '#6EA4FF',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <script>
            var kategoriLabelsProduk = {!! json_encode($kategoriLabelsProduk) !!};
            var omsetData = {!! json_encode($omsetData) !!};

            var omsetData = {
                labels: kategoriLabelsProduk,
                datasets: [{
                    label: 'Omset',
                    data: omsetData,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            };

            var omsetChart = new Chart('omsetChart', {
                type: 'bar',
                data: omsetData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Rp ' + context.parsed.y.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ",");
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection

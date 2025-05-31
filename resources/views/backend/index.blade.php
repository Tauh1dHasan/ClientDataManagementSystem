@extends('backend.layouts.app')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-3 col-lg-6">
                <div class="card mb-3">
                    <a href="{{route('admin.clientInfo.index')}}" style="text-decoration: none">
                        <div class="card-body">
                            <div class="d-flex fw-bold mb-3">
                                <span class="flex-grow-1 db-card-title">Listed Clients</span>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">{{ $clientInfoCount }}</h3>
                                </div>
                                <div class="col-5">
                                    <i class="fas fa-users fa-4x fa-fw me-1 text-success"></i>
                                </div>
                            </div>
                            <div class="text-inverse text-opacity-50 text-truncate">
                                Total Listed Clients<br>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card mb-3">
                    <a href="{{route('admin.clientInfo.index')}}" style="text-decoration: none">
                        <div class="card-body">
                            <div class="d-flex fw-bold mb-3">
                                <span class="flex-grow-1 db-card-title">Listed Client Data Count</span>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">{{ $clientDataCount }}</h3>
                                </div>
                                <div class="col-5">
                                    <i class="fas fa-users fa-4x fa-fw me-1 text-success"></i>
                                </div>
                            </div>
                            <div class="text-inverse text-opacity-50 text-truncate">
                                Total Client Data Count<br>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card mb-3">
                    <a href="{{route('admin.clientTask.pendingTask')}}" style="text-decoration: none">
                        <div class="card-body">
                            <div class="d-flex fw-bold mb-3">
                                <span class="flex-grow-1 db-card-title">Pending Client Task</span>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">{{ $pendingClientTaskCount }}</h3>
                                </div>
                                <div class="col-5">
                                    <i class="fas fa-users fa-4x fa-fw me-1 text-warning"></i>
                                </div>
                            </div>
                            <div class="text-inverse text-opacity-50 text-truncate">
                                Pending Client Task Count<br>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            @can('total_visitor_count')
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <a href="{{route('admin.visitor.index')}}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="d-flex fw-bold mb-3">
                                    <span class="flex-grow-1 db-card-title">Listed Visitors</span>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-7">
                                        <h3 class="mb-0">{{ $visitor_count }}</h3>
                                    </div>
                                    <div class="col-5">
                                        <i class="fas fa-users fa-4x fa-fw me-1 text-success"></i>
                                    </div>
                                </div>
                                <div class="text-inverse text-opacity-50 text-truncate">
                                    Total Listed Visitors in VMS <br>
                                </div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endcan
            
            @can('total_host_count')
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <a href="/admin/user/index?name=&role_id=3" style="text-decoration: none">
                            <div class="card-body">
                                <div class="d-flex fw-bold mb-3">
                                    <span class="flex-grow-1 db-card-title">Listed Host</span>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-7">
                                        <h3 class="mb-0">{{ $host_count }}</h3>
                                    </div>
                                    <div class="col-5">
                                        <i class="fas fa-user fa-4x fa-fw me-1 text-success"></i>
                                    </div>
                                </div>
                                <div class="text-inverse text-opacity-50 text-truncate">
                                    Total Listed Host in VMS <br>
                                </div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endcan
            
            @can('total_appointment_count')
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <a href="{{route('admin.appointment.index')}}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="d-flex fw-bold mb-3">
                                    <span class="flex-grow-1 db-card-title">Total Appointment</span>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-7">
                                        <h3 class="mb-0">{{ $total_appointment_count }}</h3>
                                    </div>
                                    <div class="col-5">
                                        <i class="fas fa-calendar-check fa-4x fa-fw me-1 text-success"></i>
                                    </div>
                                </div>
                                <div class="text-inverse text-opacity-50 text-truncate">
                                    Total Appointment in VMS <br>
                                </div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endcan

            @can("today's_appointment_count")
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <a href="/admin/appointment?from={{$date}}&to={{$date}}&name=&status=" style="text-decoration: none">
                            <div class="card-body">
                                <div class="d-flex fw-bold mb-3">
                                    <span class="flex-grow-1 db-card-title">Today's Appointment</span>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-7">
                                        <h3 class="mb-0">{{ $today_appointment_count }}</h3>
                                    </div>
                                    <div class="col-5">
                                        <i class="fas fa-calendar-check fa-4x fa-fw me-1 text-success"></i>
                                    </div>
                                </div>
                                <div class="text-inverse text-opacity-50 text-truncate">
                                    Today's Total Appointment in VMS <br>
                                </div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endcan
            
        </div>

        {{-- <div class="row">

            @can('status_wise_chart')
                <div class="col-xl-6">
                    <div id="apexChartPieChart" class="mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h6 style="display: inline;">Status Wise Appointment Percentage</h6>
                                <a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none">
                                    <i class="bi bi-fullscreen"></i>
                                </a>
                                <div id="statusWiseChart"></div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                            <div class="hljs-container">
                                <pre><code class="xml"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            
            @can('monthly_chart')
                <div class="col-xl-6">
                    <div id="apexChartColumnChart" class="mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h6 style="display: inline;">Monthly Appointment Count</h6>
                                <a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none">
                                    <i class="bi bi-fullscreen"></i>
                                </a>
                                <div id="apexColumnChart"></div>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                            <div class="hljs-container">
                                <pre><code class="xml"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            
        </div> --}}


    </div>
@endsection

@push('script')
    {{-- <script>
        var handleRenderApexChart = function() {
            Apex = {
                title: {
                    style: {
                        fontSize: '14px',
                        fontWeight: '600',
                        fontFamily: app.font.bodyFontFamily,
                        color: app.color.bodyColor
                    }
                },

                legend: {
                    fontFamily: app.font.bodyFontFamily,
                    labels: { colors: app.color.bodyColor }
                },

                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: app.font.bodyFontFamily
                    }
                },

                grid: { borderColor: app.color.borderColor },

                dataLabels: {
                    style: {
                        fontSize: '12px',
                        fontFamily: app.font.bodyFontFamily,
                        fontWeight: '600',
                        colors: undefined
                    }
                },

                xaxis: {
                    axisBorder: {
                        show: true,
                        color: app.color.borderColor,
                        height: 1,
                        width: '100%',
                        offsetX: 0,
                        offsetY: -1
                    },

                    axisTicks: {
                        show: true,
                        borderType: 'solid',
                        color: app.color.borderColor,
                        height: 6,
                        offsetX: 0,
                        offsetY: 0
                    },

                    labels: {
                        style: {
                            colors: app.color.bodyColor,
                            fontSize: '12px',
                            fontFamily: app.font.bodyFontFamily,
                            fontWeight: app.font.bodyFontWeight,
                            cssClass: 'apexcharts-xaxis-label',
                        }
                    }
                },

                yaxis: {
                    labels: {
                        style: {
                            colors: app.color.bodyColor,
                            fontSize: '12px',
                            fontFamily: app.font.bodyFontFamily,
                            fontWeight: app.font.bodyFontWeight,
                            cssClass: 'apexcharts-xaxis-label',
                        }
                    }
                }
            };

            // statusWiseChart
            var statusWiseChartOptions = {
                chart: {
                    height: 368,
                    type: 'pie',
                },
                dataLabels: {
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 1,
                        opacity: 1
                    }
                },
                stroke: { show: false },
                
                colors: [ 
                    'rgba('+ app.color.warningRgb +', .75)',
                    'rgba('+ app.color.pinkRgb +', .75)',
                    'rgba('+app.color.themeRgb +', .75)',
                    'rgba('+app.color.indigoRgb +', .75)',
                    'rgba('+ app.color.bodyColorRgb + ', .5)',
                    'rgba('+ app.color.primaryRgb + ', .5)',
                ],

                labels: [
                    // 'PBI',
                    @foreach($statusWiseDatas as $statusWiseData)
                        @if($statusWiseData->appointment_status == 0)
                            'Pending',
                        @elseif($statusWiseData->appointment_status == 1)
                            'Approved',
                        @elseif($statusWiseData->appointment_status == 2)
                            'Declined/Canceled',
                        @elseif($statusWiseData->appointment_status == 3)
                            'Re-Scheduled',
                        @elseif($statusWiseData->appointment_status == 4)
                            'On-going',
                        @elseif($statusWiseData->appointment_status == 5)
                            'Complete',
                        @endif
                    @endforeach
                ],

                series: [
                    // 100,
                    @foreach($statusWiseDatas as $statusWiseData)
                        {{$statusWiseData->statusWiseCount($statusWiseData->appointment_status)}},
                    @endforeach
                ],

                // title: { text: 'Organization Wise Received Link Percentage' }
            };
            var statusWiseChart = new ApexCharts(
                document.querySelector('#statusWiseChart'),
                statusWiseChartOptions
            );
            statusWiseChart.render();


            // apexColumnChart
            var apexColumnChartOptions = {
                chart: {
                    height: 350,
                    type: 'bar'
                },
                // title: {
                //     text: 'Year, Monthly Received Link',
                //     align: 'left'
                // },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'	
                    },
                },
                dataLabels: { enabled: false },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                colors: [app.color.theme, app.color.indigo, app.color.inverse],
                series: [
                    { 
                        name: 'Link Count', 
                        data: [
                            // 100,200,300,400,500,600
                            @foreach($monthlyDatas as $monthlyData)
                                {{$monthlyData->count}},
                            @endforeach
                        ] 
                    },

                ],

                xaxis: { 
                        categories: 
                        [
                            // 'A', 'B', 'C', 'D', 'E', 'F',
                            @foreach($monthlyDatas as $monthlyData)
                                '{{$monthlyData->month}}',
                            @endforeach
                        ] 
                    },


                yaxis: {
                    title: {
                        text: 'Link Count',
                        style: {
                            color: 'rgba('+ app.color.bodyColorRgb + ', .5)',
                            fontSize: '12px',
                            fontFamily: app.font.bodyFontFamily,
                            fontWeight: app.font.bodyFontWeight
                        }
                    }
                },
                fill: { opacity: 1 },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " Links"
                        }
                    }
                }
            };
            var apexColumnChart = new ApexCharts(
                document.querySelector('#apexColumnChart'),
                apexColumnChartOptions
            );
            apexColumnChart.render();

        };

        /* Controller
        ------------------------------------------------ */
        $(document).ready(function() {
            handleRenderApexChart();
            
            $(document).on('theme-reload', function() {
                $('#LEAwiseChart', '#MediaWiseChart', '#apexColumnChart', '#apexBarChart').empty();
                
                handleRenderApexChart();
            });
        });
    </script> --}}
@endpush
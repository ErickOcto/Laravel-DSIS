@extends('layouts.officer')

@section('officer-header')
Detail Vote {{ $event->name }}
@endsection

@section('officer-content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Bar Chart</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Donut Chart</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Pie Chart</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Line Chart</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <div id="chart"></div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div id="donut-chart"></div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                    <div id="pie-chart"></div>
                                </div>
                                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                                    <div id="line-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            Hitung Mundur Selesai Acara:
                            <div class="fs-1" id="countdown"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('add-script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data grafik
        var chartData = {
            series: [{
                name: "Pilihan",
                data: [
                    @foreach ($voteCandidates as $item)
                    {{ $item }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [
                    @foreach ($candidates as $item)
                    '{{ $item->name }}',
                    @endforeach
                ],
            },
            yaxis: {
                title: {
                    text: 'Total Suara'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " suara"
                    }
                }
            }
        };

        // Inisialisasi dan render grafik
        var chart = new ApexCharts(document.querySelector("#chart"), chartData);
        chart.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data donut chart
        var donutChartData = {
            series: [
                    @foreach ($voteCandidates as $item)
                        {{ $item }},
                    @endforeach
            ],
            chart: {
                type: 'donut',
                height: 350,
            },
            labels: [
                    @foreach ($candidates as $item)
                    '{{ $item->name }}',
                    @endforeach
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        // Inisialisasi dan render donut chart
        var donutChart = new ApexCharts(document.querySelector("#donut-chart"), donutChartData);
        donutChart.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data pie chart
        var pieChartData = {
            series: [
                    @foreach ($voteCandidates as $item)
                        {{ $item }},
                    @endforeach
            ],
            chart: {
                type: 'pie',
                height: 350,
            },
            labels: [
                    @foreach ($candidates as $item)
                    '{{ $item->name }}',
                    @endforeach
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        // Inisialisasi dan render pie chart
        var pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieChartData);
        pieChart.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data line chart
        var lineChartData = {
            series: [{
                name: 'Series 1',
                data: [
                    @foreach ($voteCandidates as $item)
                        {{ $item }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'line',
                height: 350,
            },
            xaxis: {
                categories: [
                    @foreach ($candidates as $item)
                    '{{ $item->name }}',
                    @endforeach
                ]
            }
        };

        // Inisialisasi dan render line chart
        var lineChart = new ApexCharts(document.querySelector("#line-chart"), lineChartData);
        lineChart.render();
    });
</script>


    <script>
      var endDate = new Date("{{ $event->event_end }}").getTime();
      var countdownInterval = setInterval(function() {
        var now = new Date().getTime();
        var timeDifference = endDate - now;
        var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
        document.getElementById("countdown").innerHTML = days + "h " + hours + "j " + minutes + "m " + seconds + "d ";
        if (timeDifference <= 0) {
          clearInterval(countdownInterval);
          document.getElementById("countdown").innerHTML = "Acara selesai!";
        }
      }, 1000);
    </script>
@endpush

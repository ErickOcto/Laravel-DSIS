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
                        <div class="card-body">
                            <div id="chart"></div>
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

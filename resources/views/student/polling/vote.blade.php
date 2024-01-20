@extends('layouts.student')

@section('student-header')
Acara {{ $event->name }}
@endsection

@section('student-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Detail Acara
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        Acara
                        <div class="fs-1">{{ $event->name }}</div>
                    </div>
                    <div class="col-4">
                        Kategori
                        <div class="fs-1">{{ $event->category }}</div>
                    </div>
                    <div class="col-4">
                        Hitung Mundur Selesai Acara:
                        <div class="fs-1" id="countdown"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($candidates as $item)
                <div class="col-12">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="{{ asset('/storage/candidate/' . $item->image) }}" class="img-fluid rounded-start" alt="{{ $item->name }}">
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                          <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text my-4">{{ $item->vision }}</p>
                            <form action="{{ route('student.vote.create', $event->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="candidate_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-primary">
                                    Vote {{ $item->name }}
                                </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('add-script')
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

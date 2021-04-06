@extends("layouts.main")

@section("content")

@include('flash')

    <div class="container">

    <h3 class="text-center mt-3">Latest results</h3>

    @foreach($candidates as $candidate)
        <div class="card mb-3 mt-3">
            <div class="card-body">
                Candidate name: {{$candidate->name}}

                <details class="mt-3">
                    <summary>Some information about the Candidate</summary>
                    <p>{{$candidate->information}}</p>
                </details>

                <h3 class="text-center"><span class="badge-pill badge-success">{{($candidate->votes/1000) * 100}} %</span></h3>

                <div class="progress mt-5">
                    <div class="progress-bar" role="progressbar" style="width: {{ ($candidate->votes)/1000 *100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"></div>
                </div>
            </div>       
        </div>
    @endforeach
    </div>

@endsection
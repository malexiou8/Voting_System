@extends("layouts.main")

@section("content")

@include('flash')

<h3 class="text-center mt-3">Latest Results</h3>
@foreach($candidates as $candidate)
    <div class="container">
        

    

        <div class="card mb-3 mt-3">
        
            <div class="card-body">

            Candidate Name: {{$candidate->name}}
            <details class="mt-3">
                    <summary>Get to know this candidate</summary>
                    <p>{{$candidate->information}}</p>
            </details>

            <h3 class="text-center"><span style="background-color:green" class="badge badge-success">{{($candidate->votes/1000)*100}}% </span></h3>

                <div class="progress mt-5">
                <div class="progress-bar" role="progressbar" style="width: {{ ($candidate->votes/1000)*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"></div>
                </div>

            </div>
            
        </div>

    </div>
    @endforeach
   

@endsection

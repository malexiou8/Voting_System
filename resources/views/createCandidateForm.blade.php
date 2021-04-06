@extends('layouts.main')

@section('content')


<div class="container mt-5"> 
    <h2  class="text-center">Insert New candidate to the system</h2>

    <form action="{{route ('createCandidate')}}" method="post">
        {{ csrf_field()}}

        <div class="form-group"> 
        <label>Candidate Name</label>
        <input type="text" name="candidateName" class="form-control" placeholder="Type the name of the candidate"/>
        </div>
        
        <div class="form-group mt-3"> 
        <label>Candidate information</label>
        <input type="text" name="candidateInfo" class="form-control" placeholder="Type more info about the candidate"/>
        </div>

        <button type="submit" class="btn btn-primary mt-3"> Submit </button>

    </form>


</div>

@endsection

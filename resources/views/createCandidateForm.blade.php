@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Insert New Candidate to the System</h2>
    <form action="{{route('createCandidate')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
        <label>Candidate Name</label>
        <input type="text" name="candidateName" class="form-control" placeholder="Type the name of the candidate" required/>
        </div>

        <div class="form-group">
        <label>Candidate Information</label>
        <input type="text" name="candidateInfo" class="form-control" placeholder="Type more information about the candidate"/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
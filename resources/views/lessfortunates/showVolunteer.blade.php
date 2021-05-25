@extends('layouts.appVolunteer')

@section('content')
    <h3 class="text-dark mb-3">{{$lessfortunate->name}} <a href="/volunteer/reports/form?id={{$lessfortunate->id}}" type="button" class="btn btn-danger">Report</a> <a href="/volunteer/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {{-- <p>IC: {{$lessfortunate->ic}}</p> --}}
    <p>Address: {{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->city}} {{$lessfortunate->state}}</p>
    <p>Phone: {{$lessfortunate->phone}}</p>
    <hr>
    <small>Created on {{$lessfortunate->created_at}}</small>
    <hr>
   
@endsection

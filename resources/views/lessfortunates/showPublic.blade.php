@extends('layouts.app')

@section('content')
    <h3 class="text-dark mb-3">{{$lessfortunate->name}} [ID: {{$lessfortunate->id}}] <a href="/reports/form?id={{$lessfortunate->id}}" type="button" class="btn btn-danger">Report</a> <a href="/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {{-- <p>IC: {{$lessfortunate->ic}}</p> --}}
    <p>Address: {{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->postcode}} {{$lessfortunate->city}} {{$lessfortunate->state}}
        <a href="http://maps.google.com/?q={{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->postcode}} {{$lessfortunate->city}} {{$lessfortunate->state}}">
            <i class="material-icons" style="font-size:30px;color:red">place</i>
        </a>
    </p>
    <p>Phone: {{$lessfortunate->phone}}</p>
    <hr>
    <small>Created on {{date('d-m-Y h:i:s', strtotime($lessfortunate->created_at))}}</small>
    <hr>
   
@endsection

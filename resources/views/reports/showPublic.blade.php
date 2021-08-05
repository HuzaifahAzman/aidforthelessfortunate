@extends('layouts.app')

@section('content')
    <h3 class="mb-3">Current Less Fortunate Data <a href="javascript:history.go(-1)" type="button" class="btn btn-secondary">Back</a></h3>    

    <div class="card">
        <div class="card-body">
            <h4 class="text-dark mb-3">{{$lessfortunate->name}} </h4>
            {{-- <p>IC: {{$lessfortunate->ic}}</p> --}}
            <p>Address: {{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->city}} {{$lessfortunate->state}}</p>
            <p>Phone: {{$lessfortunate->phone}}</p>
            <hr>
            <small>Created on {{$lessfortunate->created_at}}</small>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h4 class="mb-3">Information Report Form</h4>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['action' => 'ReportsController@storePublic', 'method' => 'POST', 'id' => 'editForm']) !!}
                    {{Form::hidden('id', $lessfortunate->id)}}
                    {{Form::hidden('reportType', 'correction')}}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', $lessfortunate->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone')}}
                            {{Form::text('phone', $lessfortunate->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Address Line 1')}}
                            {{Form::text('address', $lessfortunate->address, ['class' => 'form-control', 'placeholder' => 'Adress Line 1'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('address2', 'Address Line 2')}}
                            {{Form::text('address2', $lessfortunate->address2, ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('city', 'City')}}
                            {{Form::text('city', $lessfortunate->city, ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('state', 'State')}}
                            {{Form::select('state', ['Johor' => 'Johor', 'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'Melaka' => 'Melaka', 
                            'Negeri Sembilan' => 'Negeri Sembilan', 'Pahang' => 'Pahang', 'Penang' => 'Penang', 'Perak' => 'Perak', 
                            'Perlis' => 'Perlis', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Selangor' => 'Selangor', 'Terengganu' => 'Terengganu'], 
                            $lessfortunate->state, ['class' => 'form-control', 'placeholder' => 'Select a state...'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('postcode', 'Postcode')}}
                            {{Form::text('postcode', $lessfortunate->postcode, ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
                        </div>
                        <div class="form-group">
                            {{-- {{Form::hidden('_method', 'PUT')}} --}}
                            {{-- <button type="button" class="btn btn-primary" onclick="confirmEdit()">Submit</button> --}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
   
@endsection

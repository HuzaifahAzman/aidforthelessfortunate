@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Create New Less Fortunate <a href="/admin/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {!! Form::open(['action' => 'LessFortunateController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('address', 'Address Line 1')}}
            {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1'])}}
        </div>
        <div class="form-group">
            {{Form::label('address2', 'Address Line 2')}}
            {{Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2'])}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
        </div>
        <div class="form-group">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['Selangor' => 'Selangor', 'Sabah' => 'Sabah', 'Johor' => 'Johor'], null, ['class' => 'form-control', 'placeholder' => 'Select a state...'])}}
        </div>
        <div class="form-group">
            {{Form::label('postcode', 'Postcode')}}
            {{Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
   
@endsection

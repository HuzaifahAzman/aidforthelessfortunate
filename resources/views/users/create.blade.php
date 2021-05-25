@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Create New Admin or Volunteer <a href="/admin/volunteers" type="button" class="btn btn-secondary">Back</a></h3>

    {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('userType', 'User Type')}}
            {{Form::select('userType', ['Volunteer' => 'Volunteer', 'Admin' => 'Admin'], null, ['class' => 'form-control', 'placeholder' => 'Select a user type...'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
   
@endsection

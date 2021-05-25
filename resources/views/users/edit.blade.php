@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Edit User <a href="/admin/volunteers" type="button" class="btn btn-secondary">Back</a></h3>

    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'id' => 'editForm']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'readonly'], )}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('userType', 'User Type')}}
            {{Form::select('userType', ['Volunteer' => 'Volunteer', 'Admin' => 'Admin'], $user->userType, ['class' => 'form-control', 'placeholder' => 'Select a user type...'])}}
        </div>
        <div class="form-group">
            {{Form::hidden('_method', 'PUT')}}
            <button type="button" class="btn btn-primary" onclick="confirmEdit()">Submit</button>
            {{-- {{Form::submit('Submit', ['class' => 'btn btn-primary', 'onClick' => 'confirmDelete()'])}}; --}}
        </div>
    {!! Form::close() !!}
   
@endsection

<script>
    function confirmEdit() {
        var result = confirm("Confirm edit?");
        if (result) {
            document.getElementById("editForm").submit();// Form submission
        } 
    }
</script>
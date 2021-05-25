@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Edit Less Fortunate <a href="/admin/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {!! Form::open(['action' => ['LessFortunateController@update', $lessfortunate->id], 'method' => 'POST', 'id' => 'editForm']) !!}
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
            {{Form::text('address', $lessfortunate->address, ['class' => 'form-control', 'placeholder' => 'Address Line 1'])}}
        </div>
        <div class="form-group">
            {{Form::label('address2', 'Address Line 2')}}
            {{Form::text('address2', $lessfortunate->address2, ['class' => 'form-control', 'placeholder' => 'Address Line 2'])}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::text('city', $lessfortunate->city, ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
        </div>
        <div class="form-group">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['Selangor' => 'Selangor', 'Sabah' => 'Sabah', 'Johor' => 'Johor'], $lessfortunate->state, ['class' => 'form-control', 'placeholder' => 'Select a state...'])}}
        </div>
        <div class="form-group">
            {{Form::label('postcode', 'Postcode')}}
            {{Form::text('postcode', $lessfortunate->postcode, ['class' => 'form-control', 'placeholder' => 'Adress Line 2'])}}
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
@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">{{$user->name}} <a href="/admin/volunteers" type="button" class="btn btn-secondary">Back</a></h3>

    {{-- <p>IC: {{$user->ic}}</p> --}}
    <p>Email: {{$user->email}}</p>
    {{-- <p>Password: {{$user->password}}</p> --}}
    <p>Phone: {{$user->phone}}</p>
    <p>User Type: {{$user->userType}}</p>
    <hr>
    <small>Created on {{$user->created_at}}</small>
    <hr>
    <div class="row">
        <a href="/admin/volunteers/{{$user->id}}/edit" class="btn btn-primary ml-2">Edit</a>  
        <button type="button" class="btn btn-danger ml-2" onclick="confirmDelete()">Delete</button>
        {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST' , 'id' => 'deleteForm'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{-- {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} --}}
        {!!Form::close() !!}
    </div>
   
@endsection

<script>
    function confirmDelete() {
        var result = confirm("Confirm delete?");
        if (result) {
            document.getElementById("deleteForm").submit();// Form submission
        } 
    }
</script>
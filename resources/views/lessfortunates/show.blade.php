@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">{{$lessfortunate->name}} [ID: {{$lessfortunate->id}}] <a href="/admin/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {{-- <p>IC: {{$lessfortunate->ic}}</p> --}}
    <p>Address: {{$lessfortunate->address . ' ' . $lessfortunate->address2 . ' ' . $lessfortunate->postcode . ' ' . $lessfortunate->city . ' ' . $lessfortunate->state}}
        <a href="http://maps.google.com/?q={{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->postcode}} {{$lessfortunate->city}} {{$lessfortunate->state}}">
            <i class="material-icons" style="font-size:30px;color:red">place</i>
        </a>
    </p>
    <p>Phone: {{$lessfortunate->phone}}</p>
    <hr>
    <small>Created on {{date('d-m-Y h:i:s', strtotime($lessfortunate->created_at))}}</small>
    <hr>
    <div class="row">
        <a href="/admin/lessfortunates/{{$lessfortunate->id}}/edit" class="btn btn-primary ml-2">Edit</a>  
        <button type="button" class="btn btn-danger ml-2" onclick="confirmDelete()">Delete</button> 
        {!!Form::open(['action' => ['LessFortunateController@destroy', $lessfortunate->id], 'method' => 'POST', 'class' => 'pull-right' , 'id' => 'deleteForm'])!!}
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
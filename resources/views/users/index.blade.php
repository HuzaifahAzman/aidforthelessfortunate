@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Admin & Volunteer <a href="/admin/volunteers/create" type="button" class="btn btn-primary">Create New Admin or Volunteer</a></h3>
    
    @if(count($users) > 0) 
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-light">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            @foreach ($users as $a)
                <tbody>
                    <tr class="@if($loop->odd) table-active @endif">
                        <th scope="row">{{$a->id}}</th>
                        <td><a href="/admin/volunteers/{{$a->id}}">{{$a->name}}</a></td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->phone}}</td>
                        <td>
                            @if ($a->userType == 'Admin') 
                                <span class="badge badge-dark">Admin</span> 
                            @else 
                                <span class="badge badge-info">Volunteer</span> 
                            @endif
                        </td>
                        <td>
                            <a href="/admin/volunteers/{{$a->id}}/edit" class="btn btn-primary mr-2">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo 'deleteForm' . $a->id ?>', '<?php echo $a->name ?>')">Delete</button>

                            {!!Form::open(['action' => ['UsersController@destroy', $a->id], 'method' => 'POST' , 'id' => 'deleteForm' . $a->id])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{-- {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} --}}
                            {!!Form::close() !!}
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>

        <br>
        {{$users->links()}}

    @else
        <p>No Less Fortunate Record Found.</p>
    @endif
@endsection

<script>
    function confirmDelete(formName,name) {
        var result = confirm("Confirm delete " + name + "?");
        if (result) {
            document.getElementById(formName).submit();// Form submission
        } 
    }
</script>
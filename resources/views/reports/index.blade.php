@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Report</h3>

    @if(count($reports) > 0) 
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-light">
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            @foreach ($reports as $report)
                <tbody>
                    <tr class="@if($loop->odd) table-active @endif">
                        <th scope="row">{{$report->lessFortunate_id}}</th>
                        <td>{{$report->name}}</td>
                        <td>{{$report->address . ' ' . $report->address2}}</td>
                        <td>{{$report->phone}}</td>
                        {{-- <td>
                            @if ($report->reportType == 'correction') 
                                <span class="badge badge-dark">Correction</span> 
                            @else 
                                <span class="badge badge-info">New Less Fortunate</span> 
                            @endif
                        </td> --}}
                        <td>
                            {{-- <a href="/admin/volunteers/{{$report->id}}/edit" class="btn btn-primary mr-2">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo 'deleteForm' . $report->id ?>', '<?php echo $report->name ?>')">Delete</button> --}}

                            {{-- {!!Form::open(['action' => ['UsersController@destroy', $report->id], 'method' => 'POST' , 'id' => 'deleteForm' . $report->id])!!} --}}
                                {{-- {{Form::hidden('_method', 'DELETE')}} --}}
                                {{-- {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} --}}
                            {{-- {!!Form::close() !!} --}}
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>

        <br>
        {{$reports->links()}}

    @else
        <p>No Less Fortunate Record Found.</p>
    @endif

@endsection

@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">Report</h3>
    <p>*Bolded items are the new information reported</p>
    <p>*Above row is the original Less Fortunate data</p>

    @if(count($reports) > 0) 
        <table class="table">
            <thead>
                <tr class="" style="background-color: #343a40; color:white">
                    <th>Report ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            @foreach ($reports as $report)
                <tbody>
                    <tr class="@if($loop->odd) table-primary @else table-info @endif">
                        <th rowspan="2">{{$report->id}}</th>
                        <th rowspan="2">{{$report->lessFortunate_id}}</th>
                        <td>{{$report->LF_name}}</td>
                        <td>{{$report->LF_address . ' ' . $report->LF_address2 . ' ' . $report->LF_city . ' ' . $report->LF_state}}</td>
                        <td>{{$report->LF_phone}}</td>
                        {{-- <td>
                            @if ($report->reportType == 'correction') 
                                <span class="badge badge-dark">Correction</span> 
                            @else 
                                <span class="badge badge-info">New Less Fortunate</span> 
                            @endif
                        </td> --}}
                        <td rowspan="2">
                            <span class="badge @if($report->status == 'rejected') badge-dark @elseif($report->status == 'approved') badge-success @endif">
                                @if ($report->status == 'pending')
                                    {!!Form::open(['action' => ['ReportsController@update', $report->id], 'method' => 'POST' , 'id' => 'updateForm' . $report->id])!!}
                                        {{Form::hidden('_method', 'PUT')}}
                                        <select name="action" onchange="if (confirm('Confirm Update?')==true) this.form.submit(); else location.reload();" class="form-control form-select" style="width: 90px; padding: .175rem .25rem; cursor:pointer;">
                                            <option selected>{{ucfirst($report->status)}}</option>
                                            <option value="reject">Reject</option>
                                            <option value="approve">Approve</option>
                                        </select>  
                                        {{Form::hidden('lf_id', $report->lessFortunate_id)}}
                                        {{Form::hidden('name', $report->name)}}
                                        {{Form::hidden('phone', $report->phone)}}
                                        {{Form::hidden('address', $report->address)}}
                                        {{Form::hidden('address2', $report->address2)}}
                                        {{Form::hidden('city', $report->city)}}
                                        {{Form::hidden('state', $report->state)}}
                                        {{Form::hidden('postcode', $report->postcode)}}
                                    {!!Form::close() !!}
                                @else 
                                    {{ucfirst($report->status)}}
                                @endif
                            </span>
                        </td>
                        <td rowspan="2" style="padding-left: 0">
                            @if ($report->status != 'approved')
                                <a class="pe-auto" onclick="confirmDelete('<?php echo 'deleteForm' . $report->id ?>', '<?php echo $report->name ?>')" style="cursor:pointer;">
                                    <div class="mt-2 text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </div>
                                </a>
                                
                                {!!Form::open(['action' => ['ReportsController@destroy', $report->id], 'method' => 'POST' , 'id' => 'deleteForm' . $report->id])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                {!!Form::close() !!}
                            @endif
                        </td>
                    </tr>
                    @if ($report->status != 'approved')
                        <tr class="@if($loop->odd) table-primary @else table-info @endif">
                            <td>@if($report->name != $report->LF_name) <b>{{$report->name}}</b> @else {{$report->name}} @endif</td>
                            <td>
                                @if($report->LF_address != $report->address || $report->LF_address2 != $report->address2 || $report->LF_city != $report->city || $report->LF_state != $report->state) 
                                    <b>{{$report->address . ' ' . $report->address2 . ' ' . $report->city . ' ' . $report->state}}</b> 
                                @else 
                                    {{$report->address . ' ' . $report->address2 . ' ' . $report->city . ' ' . $report->state}} 
                                @endif
                            </td>
                            <td>@if($report->phone != $report->LF_phone) <b>{{$report->phone}}</b> @else {{$report->phone}} @endif</td>
                        </tr>
                    @endif
                </tbody>
            @endforeach
        </table>

        <br>
        {{$reports->links()}}

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

    function confirmDelete(formName,name) {
        var result = confirm("Confirm delete " + name + "?");
        if (result) {
            document.getElementById(formName).submit();// Form submission
        } 
    }
</script>
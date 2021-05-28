@extends('layouts.appAdmin')

@section('content')
    <h3 class="text-dark mb-3">{{$title}}</h3>

    <div class="card">
        <div class="card-body">
            <h5>Individual Counts</h5>
            <div class="row text-center mb-2">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <span><i class="bi bi-person" style="font-size: 3em; color: rgb(9, 114, 185);"></i></span> 
                            <h5>Less Fortunate</h5> 
                            <h6>{{$numLessFortunate}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <span><i class="bi bi-person" style="font-size: 3em; color: rgb(9, 114, 185);"></i></span> 
                            <h5>Admin</h5> 
                            <h6>{{$numAdmin}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <span><i class="bi bi-person" style="font-size: 3em; color: rgb(9, 114, 185);"></i></span> 
                            <h5>Volunteer</h5> 
                            <h6>{{$numVolunteer}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-3 ">
        <div class="card-body">
            <h5>Aid Accomplishment Progress</h5>
            <hr>
            {!! Form::open(['action' => 'CampaignController@updateCampaign', 'method' => 'POST', 'id' => 'editForm']) !!}
            {{-- {{Form::hidden('_method', 'PUT')}} --}}
            <div class="row my-0 px-4">
                <div class="col-2"></div>
                <div class="col-4">
                        <div class="form-group">
                            <div class="form-label text-gray">Campaign Start</div> 
                            <input class="form-control" type="date" name="begin" placeholder="dd-mm-yyyy" value="{{$beginCampaign['begin']}}" min="1997-01-01" max="2030-12-31">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-label text-gray">Campaign End</div> 
                            <input class="form-control" type="date" name="end" placeholder="dd-mm-yyyy" value="{{$endCampaign['end']}}" min="1997-01-01" max="2030-12-31">
                        </div>
                    </div>
                <div class="col-2"></div>
            </div>
            {!! Form::close() !!}
            <div class="row">
                <div class="mx-auto">
                    <button type="button" class="btn btn-success" onclick="confirmEdit()">Update Changes</button>
                    <a class="btn btn-danger " href="/admin/dashboard">Cancel</a>
                </div>
            </div>
            <hr>
            <div class="row text-center mb-2">
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <span><i class="bi bi-check2" style="font-size: 3em; color: green;"></i></span> 
                            <h5>Aid Accomplished</h5> 
                            <h6>{{$aidAccomplished}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <span><i class="bi bi-x" style="font-size: 3em; color: red;"></i></span> 
                            <h5>Aid Not Accomplished</h5> 
                            <h6>{{$numLessFortunate-$aidAccomplished}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>

<br>
@endsection

<script>
    function confirmEdit() {
        var result = confirm("Confirm edit?");
        if (result) {
            document.getElementById("editForm").submit();// Form submission
        } 
    }
</script>

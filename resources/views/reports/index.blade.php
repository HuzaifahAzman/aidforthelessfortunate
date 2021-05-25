@extends('layouts.appAdmin')

@section('content')
<h3 class="text-dark mb-3">False Information Reporting</h3>
<div class="card" style="margin-bottom: 12px">
    <div class="card-body">
        <p>Information of Less Fortunates might differ accross time. We encourage all users to submit any update on the information to maintain our operations.</p>
        <p>To report, you can either:</p>
        <div class="row mt-2">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-dark">Insert User ID</h5>
                        {!! Form::open(['action' => 'ReportsController@showPublic', 'method' => 'GET']) !!}
                            <div class="form-group">
                                {{Form::text('id', '', ['class' => 'form-control', 'placeholder' => 'User ID'])}}
                            </div>
                            <div class="form-group mb-0 text-center">
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h3 class="text-dark text-center mt-5" style="margin: 12px 0 12px 0">or</h3>
            </div>
            <div class="col-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="text-dark" style="margin: 12px 0 12px 0">Direct report from Less Fortunate Page</h5>
                        <p class="text-center"><a href="/lessfortunates" type="button" class="btn btn-primary">View Less Fortunate</a></p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection

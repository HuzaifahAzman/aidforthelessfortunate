@extends('layouts.appPublicDashboard')

@section('content')
    <div class="container">
        <br>
        {{-- <h3 class="text-dark mb-3">Bakul Kasih Ramadhan</h3> --}}
    
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                        <img class="mx-auto d-block" src="{{asset('images/bakul-kasih-ramadhan.png')}}" alt="" style="width: 200px">
                        <div class="card-body">
                            {!! Form::open(['action' => 'AuthenticationsController@login', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{Form::label('email', 'Email')}}
                                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('password', 'Password')}}
                                    {{Form::password('password', ['class' => 'form-control'])}} 
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" aria-label="Close" onclick="this.parentElement.style.display='none';">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{-- <button type="button" class="btn-close btn-close-white" onclick="this.parentElement.style.display='none';">&times;</button> --}}
                                        {{session('message')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        <br>
    </div>
@endsection

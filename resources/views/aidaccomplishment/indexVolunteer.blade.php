@extends('layouts.appVolunteer')

@section('content')
    <h3 class="text-dark mb-3">Aid Accomplishments <a class="btn btn-primary" href="/volunteer/">Search for Less Fortunate</a></h3>

    <div class="card m-auto" style="width: 600px">
        <div class="card-body">
            {!! Form::open(['action' => 'AidAccomplishmentController@storeVolunteer', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('lf_id', 'Less Fortunate ID')}}
                    @if (isset($_GET["lf"])) 
                        {{Form::text('lf_id', $_GET["lf"], ['class' => 'form-control', 'placeholder' => 'Less Fortunate ID'])}}
                    @else 
                        {{Form::text('lf_id', '', ['class' => 'form-control', 'placeholder' => 'Less Fortunate ID'])}}
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('volunteer_id', 'Volunteer ID')}}
                    {{Form::text('volunteer_id', session('user_id'), ['class' => 'form-control', 'placeholder' => 'Volunteer ID'])}}
                </div>
                <div class="form-group">
                    {{Form::label('submit_time', 'Time')}}
                    {{-- {{Form::time('submit_time', '', ['class' => 'form-control', 'placeholder' => 'Time', 'min' => '00:00', 'max' => '23:59', 'style' => 'width: 130px'])}} --}}
                    {{-- {{ Form::input('dateTime-local', 'submit_time', '', ['id' => 'submit_time', 'class' => 'form-control', 'style' => 'width: 240px']) }} --}}
                    <input class="form-control" type="date" id="submit_time" name="submit_time" style="width: 180px"/>
                </div>
                <div class="form-group">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        
@endsection
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        // alert(maxDate);
        $('#submit_time').attr('min', maxDate);
    });
</script>
@extends('layouts.appVolunteer')

@section('content')
        <h3 class="text-dark mb-3">{{$title}}</h3>

        <div class="card mt-3 ">
            <div class="card-body">
                <h5>Aid Accomplishment Progress [{{$beginCampaign['begin']}} until {{$endCampaign['end']}}] <h6 class="inline">(Aid Receiver: {{$numLessFortunate}} individuals)</h6></h5>
                
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

@extends('layouts.appPublicDashboard')

@section('content')
    <div class="container">
        <br>
        <h3 class="text-dark mb-3">{{$title}}</h3>
    
        <img class="mx-auto d-block" src="{{asset('images/bakul-kasih-ramadhan.png')}}" alt="" style="width: 400px">
    
        <p>
            Bakul Kasih Ramadhan is one of the annual welfare programs by Yayasan Ikhlas to ease the burden of the poor and needy in the month of Ramadhan. 
            According to Yayasan Ikhlas, Bakul Kasih Ramadhan that was held in 2016 had supplied aid towards 1554 beneficiaries of zakat (‘asnaf’) 
            including poor families, orphans, Muslim converts, and non-muslim families. Whereas in the year 2017, 
            the number increased to 1887 and it continues to increase throughout the year. 
        </p>
        <br>
    </div>

    <div class="container-fluid" style="background-color: #24486a">
        <div class="container">
            <br>
            <div class="card m-2">
                <div class="card-body">
                    <h5>Aid Accomplishment Progress [{{date('d-M-Y', strtotime($beginCampaign['begin']))}} until {{date('d-M-Y', strtotime($endCampaign['end']))}}] <h6 class="inline">(Aid Receiver: {{$numLessFortunate}} individuals)</h6></h5>

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
        </div>
    </div>


@endsection

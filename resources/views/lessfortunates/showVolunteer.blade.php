@extends('layouts.appVolunteer')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            Aid Status: @if ($lessfortunate->status == '1') Done @else Not Done (<a href="/volunteer/aidaccomplishments?lf={{$lessfortunate->id}}" class="">Update</a>) @endif 
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Display QR
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-auto">
                    {{QrCode::size(200)->generate("http://127.0.0.1:8000/volunteer/aidaccomplishments?lf=$lessfortunate->id")}}
                    {{-- {{QrCode::format('png')->('http://127.0.0.1:8000/volunteer/aidaccomplishments?lf=$lessfortunate->id')}} --}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <h3 class="text-dark mb-3">{{$lessfortunate->name}} [ID: {{$lessfortunate->id}}] <a href="/volunteer/reports/form?id={{$lessfortunate->id}}" type="button" class="btn btn-danger">Report</a> <a href="/volunteer/lessfortunates" type="button" class="btn btn-secondary">Back</a></h3>

    {{-- <p>IC: {{$lessfortunate->ic}}</p> --}}
    <p>Address: {{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->postcode}} {{$lessfortunate->city}} {{$lessfortunate->state}}
        <a href="http://maps.google.com/?q={{$lessfortunate->address}} {{$lessfortunate->address2}} {{$lessfortunate->postcode}} {{$lessfortunate->city}} {{$lessfortunate->state}}">
            <i class="material-icons" style="font-size:30px;color:red">place</i>
        </a>
    </p>
    <p>Phone: {{$lessfortunate->phone}}</p>
    <hr>
    <small>Created on {{date('d-m-Y h:i:s', strtotime($lessfortunate->created_at))}}</small>
    <hr>
@endsection

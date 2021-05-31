@extends('layouts.app')

@section('content')
    <h3 class="text-dark mb-3">Less Fortunate</h3>
    
    @if(count($lessfortunates) > 0)
        @foreach ($lessfortunates as $a)
            <div class="card" style="margin-bottom: 12px">
                <div class="card-body">
                    <h4><a href="/lessfortunates/find/{{$a->id}}">{{$a->name}}</a></h4>
                    <p style="margin-top: 12px">Address: {{$a->address}} {{$a->address2}} {{$a->postcode}} {{$a->city}} {{$a->state}} 
                        <a href="http://maps.google.com/?q={{$a->address}} {{$a->address2}} {{$a->postcode}} {{$a->city}} {{$a->state}}">
                            <i class="material-icons" style="font-size:30px;color:red">place</i>
                        </a>
                    </p>
                    <p>Phone: {{$a->phone}}</p>
                    <small style="margin-bottom: 0">Created on {{$a->created_at}}</small>
                </div>
            </div>
        @endforeach
        {{$lessfortunates->links()}}

    @else
        <p>No Less Fortunate Record Found.</p>
    @endif
@endsection

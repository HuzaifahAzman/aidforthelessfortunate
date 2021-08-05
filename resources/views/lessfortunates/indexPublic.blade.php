@extends('layouts.app')

@section('content')
    <h3 class="text-dark mb-3">Less Fortunate</h3>
    
    @if(count($lessfortunates) > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-light">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Created on</th>
                </tr>
            </thead>

            @foreach ($lessfortunates as $a)
                <tbody>
                    <tr class="@if($loop->odd) table-active @endif">
                        <th scope="row">{{$a->id}}</th>
                        <td><a href="/lessfortunates/find/{{$a->id}}">{{$a->name}}</a></a></td>
                        <td>
                            {{$a->address}} {{$a->address2}} {{$a->postcode}} {{$a->city}} {{$a->state}} 
                            <a href="http://maps.google.com/?q={{$a->address}} {{$a->address2}} {{$a->postcode}} {{$a->city}} {{$a->state}}">
                                <i class="material-icons" style="font-size:30px;color:red">place</i>
                            </a>
                        </td>
                        <td>{{$a->phone}}</td>
                        <td>{{date('d-m-Y h:i:s', strtotime($a->created_at))}}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{$lessfortunates->links()}}
    @else
        <p>No Less Fortunate Record Found.</p>
    @endif
@endsection

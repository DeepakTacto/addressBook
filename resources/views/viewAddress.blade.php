@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if(!empty($data))
                    <div class="panel panel-default">
                        @foreach($data as $k => $addr)
                            <table class="table">
                                <thead>
                                <input type="hidden" value="{{ $addr['id'] }}" id="deleteId"/>
                                <tr>
                                    <th>Address {{ ($k == 0) ? 'Default 1' : 'Default 2' }}</th>
                                    <th><button class="alert-danger" onclick="deleteAddress({{$addr['id']}})">Delete</button>
                                        <a href="{{ url("home/updateAddress/".$addr['id'] ) }}" class="btn-link">Update</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $addr['title'] }}</td>
                                </tr>
                                <tr>
                                    <td>Ccontact Numbar</td>
                                    <td>{{ $addr['contactNumbar'] }}</td>
                                </tr>
                                <tr>
                                    <td>Address Line 1</td>
                                    <td>{{ $addr['addressLine1'] }}</td>
                                </tr>
                                <tr>
                                    <td>Address Line 2</td>
                                    <td>{{ $addr['addressLine2'] }}</td>
                                </tr>
                                <tr>
                                    <td>Address Line 3</td>
                                    <td>{{ $addr['addressLine3'] }}</td>
                                </tr>
                                <tr>
                                    <td>Pincode</td>
                                    <td>{{ $addr['pincode'] }}</td>
                                </tr>
                                <tr>
                                    <td>Street</td>
                                    <td>{{ $addr['street'] }}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{ $addr['state'] }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $addr['city'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <br/>
                        @endforeach
                        </div>
                    @else
                        <p> No address is saved Please <a class="btn-link" href="{{ url('home/manageAddress') }}">Add </a>address</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.login')

@section('content')
<div id="app">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <login-component :post-route="{{ json_encode(route('toRegister')) }}"></login-component>
                 
            </div>
        </div>
    </div>
@endsection
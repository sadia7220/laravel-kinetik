@extends('layouts.app')

@section('content')
<div id="app">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>
                <router-link to="/list" tag="button">Customer List</router-link>
                <router-link to="/create" tag="button">Add Customer</router-link>
            </p>
           
            
                 <login-component></login-component>

                 <router-view></router-view>
            </div>
        </div>
    </div>
@endsection
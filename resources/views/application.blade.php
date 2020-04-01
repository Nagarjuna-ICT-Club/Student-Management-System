@extends('layouts.app')
@section('title','Application')
@section('content')
<div class="container">
    <router-link to="/application/add_app" class="add_app" id=""><i class="fas fa-plus-circle"></i></router-link>
    <!-- page title starts -->
    <div class="pageTitle">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <i class="fas fa-book"></i> Applications

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                Today: <span class="date">Mar 24</span>
            </div>
        </div>
    </div>
    <!-- page title ends -->
    <hr />
    <div id="application"></div>
@endsection

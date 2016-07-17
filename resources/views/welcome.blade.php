@extends('layouts.master')

@section('description')
    <meta name = "description" content = "Welcome to iPub. iPub is an internet publicity platform, that helps individuals, organisations, businesses, organisations, ngos and other associations to be able to publicize their their products and services which they offer, get contact with customers and analyse customer opinions about their products or services." >
@endsection

@section('author')
    <meta name="author" content="kerick-jeff">
@endsection

@section('content')
<div class="container-fluid" style="margin-left: -70px; margin-right: -15px">
    <div class="row">
        <img src="{{ asset('images/land1.jpg') }}" alt="landing_page" style="max-width: 100%; height: auto" />
    </div>
</div>
@endsection

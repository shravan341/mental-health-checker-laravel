@extends('layouts.app')

@section('content')
<div class="about-us">
    <div class="about-us-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center mb-4">About Us</h1>
                    
                    <div class="about-us-section">
                        <h2>Our Mission</h2>
                        <p class="lead">{{ $mission }}</p>
                    </div>

                    <div class="about-us-section">
                        <h2>Our Vision</h2>
                        <p class="lead">{{ $vision }}</p>
                    </div>

                    <div class="about-us-section">
                        <h2>About MHS</h2>
                        <p class="lead">{{ $about }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Mental Health Assessments</h2>
                    <p class="text-center text-muted mb-5">Choose an assessment type to begin your mental health evaluation. Each test is designed to help you better understand specific aspects of your mental well-being.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        @foreach($assessmentTypes as $type => $details)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-{{ $details['color'] }} bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="bi {{ $details['icon'] }} text-{{ $details['color'] }} fs-4"></i>
                            </div>
                            <h3 class="card-title mb-0">{{ $details['title'] }}</h3>
                        </div>
                        <p class="card-text text-muted mb-4">{{ $details['description'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">
                                <i class="bi bi-clock me-1"></i>
                                Duration: {{ $details['duration'] }}
                            </span>
                            <a href="{{ route('assessment.index', $type) }}" class="btn btn-{{ $details['color'] }}">
                                Start Test
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h4 class="card-title mb-4">Important Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="bi bi-shield-check text-success me-2"></i>Privacy & Confidentiality</h5>
                            <p class="text-muted">Your responses are completely confidential and protected. We follow strict privacy guidelines to ensure your information is secure.</p>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="bi bi-info-circle text-primary me-2"></i>Disclaimer</h5>
                            <p class="text-muted">These assessments are for screening purposes only and should not be considered as a substitute for professional medical advice, diagnosis, or treatment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
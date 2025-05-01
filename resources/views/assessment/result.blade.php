@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Assessment Result') }} 
                    <span class="text-muted">({{ $assessment->created_at->format('M d, Y') }})</span>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4>Your Mental Health Status:</h4>
                        
                        @if($assessment->result == 'Minimal')
                            <div class="display-4 text-success">Minimal</div>
                            <div class="progress mt-3 mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                            </div>
                        @elseif($assessment->result == 'Mild')
                            <div class="display-4 text-info">Mild</div>
                            <div class="progress mt-3 mb-3">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 40%"></div>
                            </div>
                        @elseif($assessment->result == 'Moderate')
                            <div class="display-4 text-warning">Moderate</div>
                            <div class="progress mt-3 mb-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"></div>
                            </div>
                        @elseif($assessment->result == 'Moderately Severe')
                            <div class="display-4 text-orange">Moderately Severe</div>
                            <div class="progress mt-3 mb-3">
                                <div class="progress-bar bg-orange" role="progressbar" style="width: 80%"></div>
                            </div>
                        @else
                            <div class="display-4 text-danger">Severe</div>
                            <div class="progress mt-3 mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
                            </div>
                        @endif
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Personalized Advice</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $assessment->advice }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Next Steps</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="bi bi-calendar-check"></i> 
                                    Schedule regular assessments to track your progress
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-heart"></i> 
                                    <a href="{{ route('support.index') }}">Check out support resources</a>
                                </li>
                                @if($assessment->result == 'Moderately Severe' || $assessment->result == 'Severe')
                                    <li class="list-group-item">
                                        <i class="bi bi-person-plus"></i> 
                                        Consider speaking with a mental health professional
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('assessment.history') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> View Assessment History
                        </a>
                        <a href="{{ route('assessment.types') }}" class="btn btn-primary">
                            Take Another Assessment <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.text-orange {
    color: #fd7e14;
}
.bg-orange {
    background-color: #fd7e14;
}
</style>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Assessment History') }}</span>
                    <a href="{{ route('assessment.types') }}" class="btn btn-primary btn-sm">Start New Assessment</a>
                </div>

                <div class="card-body">
                    @if($assessments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Result</th>
                                        <th>Advice</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assessments as $assessment)
                                        <tr>
                                            <td>{{ $assessment->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <span class="text-capitalize">{{ $assessment->type }}</span>
                                            </td>
                                            <td>
                                                @if($assessment->result == 'Minimal')
                                                    <span class="badge bg-success">Minimal</span>
                                                @elseif($assessment->result == 'Mild')
                                                    <span class="badge bg-info">Mild</span>
                                                @elseif($assessment->result == 'Moderate')
                                                    <span class="badge bg-warning">Moderate</span>
                                                @elseif($assessment->result == 'Moderately Severe')
                                                    <span class="badge bg-orange">Moderately Severe</span>
                                                @else
                                                    <span class="badge bg-danger">Severe</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($assessment->advice, 50) }}</td>
                                            <td>
                                                <a href="{{ route('assessment.result', $assessment->id) }}" 
                                                   class="btn btn-sm view-details-btn">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            You haven't taken any assessments yet. 
                            <a href="{{ route('assessment.types') }}" class="alert-link">Take your first assessment now</a>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge.bg-orange {
    background-color: #fd7e14;
}

.view-details-btn {
    background-color: var(--secondary);
    color: var(--text-primary);
    border: none;
    padding: 0.375rem 1rem;
    border-radius: 6px;
    font-weight: 500;
}

.view-details-btn:hover {
    background-color: var(--secondary-dark);
    color: var(--text-primary);
}
</style>
@endsection 
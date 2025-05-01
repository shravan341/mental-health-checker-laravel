@props(['assessments'])

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold text-dark">Recent Assessments</h5>
        <a href="{{ route('assessment.history') }}" class="btn btn-link text-primary text-decoration-none">View All</a>
    </div>

    <div class="card-body p-0">
        @if($assessments->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4">Date</th>
                            <th>Type</th>
                            <th>Result</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assessments as $assessment)
                            <tr>
                                <td class="px-4">{{ $assessment->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="text-capitalize">{{ $assessment->type }}</span>
                                </td>
                                <td>
                                    @if($assessment->result == 'Minimal')
                                        <span class="badge bg-success">Minimal</span>
                                    @elseif($assessment->result == 'Mild')
                                        <span class="badge bg-info">Mild</span>
                                    @elseif($assessment->result == 'Moderate')
                                        <span class="badge bg-warning text-dark">Moderate</span>
                                    @elseif($assessment->result == 'Moderately Severe')
                                        <span class="badge" style="background-color: #fd7e14">Moderately Severe</span>
                                    @elseif($assessment->result == 'Needs Attention')
                                        <span class="badge bg-danger">Needs Attention</span>
                                    @else
                                        <span class="badge bg-danger">Severe</span>
                                    @endif
                                </td>
                                <td class="text-end px-4">
                                    <a href="{{ route('assessment.result', $assessment->id) }}" 
                                       class="btn btn-sm btn-primary px-3">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4 text-center text-muted">
                <p class="mb-0">No assessments taken yet.</p>
            </div>
        @endif
    </div>

    <style>
        .table > :not(caption) > * > * {
            padding: 1rem 0.75rem;
        }
        .badge {
            font-weight: 500;
            padding: 0.5em 0.75em;
        }
        .btn-sm {
            font-weight: 500;
        }
    </style>
</div> 
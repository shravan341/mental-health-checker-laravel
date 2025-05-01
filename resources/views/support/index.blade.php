@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Mental Health Support Resources in India') }}</h4>
                </div>

                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <h5 class="alert-heading">🇮🇳 Government of India Mental Health Support</h5>
                        <p class="mb-0">
                            Access to mental healthcare is your right under the Mental Healthcare Act, 2017. 
                            These resources are provided by the Government of India and the World Health Organization 
                            to support your mental well-being.
                        </p>
                    </div>

                    @foreach($resources as $category)
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">{{ $category['title'] }}</h5>
                                <p class="text-muted small mb-0">{{ $category['description'] }}</p>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    @foreach($category['items'] as $item)
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1">{{ $item['name'] }}</h6>
                                                    <p class="mb-1 text-muted">{{ $item['description'] }}</p>
                                                </div>
                                                <span class="badge bg-primary">{{ $item['contact'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="alert alert-warning mt-4">
                        <h5 class="alert-heading">Emergency Support</h5>
                        <p class="mb-0">
                            If you're experiencing a mental health emergency, please call Tele-MANAS at 14416 
                            or visit your nearest emergency room immediately. Help is available 24/7 in multiple Indian languages.
                        </p>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Additional Resources</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="bi bi-globe"></i>
                                    <strong>Tele-MANAS Website:</strong>
                                    <a href="https://telemanas.mohfw.gov.in" target="_blank">telemanas.mohfw.gov.in</a>
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-file-text"></i>
                                    <strong>Mental Healthcare Act, 2017:</strong>
                                    Learn about your rights and protections
                                </li>
                                <li>
                                    <i class="bi bi-hospital"></i>
                                    <strong>Find a DMHP Center:</strong>
                                    Contact your district hospital for information
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge.bg-primary {
    font-size: 0.9em;
    padding: 8px 12px;
    white-space: normal;
    text-align: right;
    max-width: 200px;
}
.card-header.bg-light {
    background-color: #f8f9fa;
}
</style>
@endsection 
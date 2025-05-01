@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Depression Assessment') }}</div>

                <div class="card-body">
                    <p class="mb-4">
                        Over the past week, how often have you been bothered by the following problems? 
                        Please answer each question honestly.
                    </p>

                    <form method="POST" action="{{ route('assessment.store', ['type' => $type]) }}">
                        @csrf
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @foreach($questions as $index => $question)
                            <div class="mb-4">
                                <label class="form-label fw-bold">{{ $index + 1 }}. {{ $question->question }}</label>
                                
                                <div class="btn-group w-100" role="group">
                                    @foreach($question->options as $optionIndex => $option)
                                        <input type="radio" class="btn-check" 
                                               name="answers[{{ $question->order }}]" 
                                               id="q{{ $question->order }}_{{ $optionIndex }}" 
                                               value="{{ $optionIndex }}" 
                                               required>
                                        <label class="btn btn-outline-primary" 
                                               for="q{{ $question->order }}_{{ $optionIndex }}">
                                            {{ $option }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit Assessment') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
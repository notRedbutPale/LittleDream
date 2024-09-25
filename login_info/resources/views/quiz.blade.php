@extends('layout')

@section('content')

    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8">

            {{-- Quiz Box --}}
            <div class="card">
                <div class="card-header text-center">
                    <h3>
                        {{ $quiz->category ? $quiz->category->name . ' Quiz' : 'Quiz' }} {{-- Check if category exists --}}
                    </h3>
                </div>
                <div class="card-body">

                    {{-- Display the quiz question --}}
                    <form action="{{ route('storeScore') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <h5>{{ $quiz->question }}</h5>
                        </div>

                        {{-- Display the options --}}
                        @foreach (json_decode($quiz->options) as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="{{ $option }}" id="option{{ $loop->index }}">
                                <label class="form-check-label" for="option{{ $loop->index }}" style="display: block;">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach

                        {{-- Hidden input for quiz_id --}}
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                        {{-- Submit button --}}
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Submit Answer</button>
                        </div>
                    </form>

                    {{-- Feedback section --}}
                    @if (session()->has('quiz_feedback_' . $quiz->id))
                        @php
                            $feedback = session()->get('quiz_feedback_' . $quiz->id);
                        @endphp

                        <div class="mt-3">
                            @if ($feedback['is_correct'])
                                <div class="alert alert-success">
                                    Correct! ✅
                                </div>
                                @if (session('is_last_quiz'))
                                    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            var congratsModal = new bootstrap.Modal(document.getElementById('congratsModal'));
                                            congratsModal.show();
                                        });
                                    </script>
                                @endif
                            @else
                                <div class="alert alert-danger">
                                    Incorrect ❌
                                </div>
                                <div>
                                    <strong>Correct Answer:</strong> {{ $feedback['correct_option'] }}
                                </div>
                                <div>
                                    <strong>Explanation:</strong> {{ $feedback['explanation'] }}
                                </div>

                              
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var tryAgainModal = new bootstrap.Modal(document.getElementById('tryAgainModal'));
                                        tryAgainModal.show();
                                    });
                                </script>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Congrats Modal -->
    <div class="modal fade" id="congratsModal" tabindex="-1" aria-labelledby="congratsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="congratsModalLabel">Congratulations!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Congrats, you have finished all the quizzes! Do you want to play other categories?
                </div>
                <div class="modal-footer">
                    <a href="{{ route('homepage') }}" class="btn btn-secondary">Home</a>
                    <a href="{{ route('categories') }}" class="btn btn-primary">Play More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Try Again Modal -->
    <div class="modal fade" id="tryAgainModal" tabindex="-1" aria-labelledby="tryAgainModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tryAgainModalLabel">Oops!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You got one wrong! Do you want to play other categories?
                </div>
                <div class="modal-footer">
                    <a href="{{ route('profile') }}" class="btn btn-secondary">Home</a>
                    <a href="{{ route('categories') }}" class="btn btn-primary">Play More</a>
                </div>
            </div>
        </div>
    </div>

@endsection

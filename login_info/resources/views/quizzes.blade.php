@if ($quizzes && count($quizzes) > 0)
    @foreach ($quizzes as $quiz)
        <form action="{{ route('storeScore') }}" method="POST">
            @csrf
            <div>{{ $quiz->question }}</div>

            {{-- Ensure options are properly decoded before looping --}}
            @if (!empty($quiz->options) && is_array(json_decode($quiz->options)))
                @foreach (json_decode($quiz->options) as $option)
                    <label>
                        <input type="radio" name="answer" value="{{ $option }}">{{ $option }}
                    </label>
                @endforeach
            @else
                <p>No options available for this quiz.</p>
            @endif

            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <button type="submit">Submit</button>
        </form>

        {{-- Display feedback if available --}}
        @if (isset($feedback[$quiz->id]))
            @if ($feedback[$quiz->id]['is_correct'] === true)
                <div style="color: green;">&#x2714; Correct!</div>
            @elseif ($feedback[$quiz->id]['is_correct'] === false)
                <div style="color: red;">&#x274C; Incorrect. The correct answer is "{{ $feedback[$quiz->id]['correct_option'] }}". {{ $feedback[$quiz->id]['explanation'] }}</div>
            @endif
        @endif
    @endforeach
@else
    <p>No quizzes available.</p>
@endif

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Score;

class QuizController extends Controller
{
    public function showCategories() {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    public function showQuiz($categoryId, $quizId = null) {
        // If $quizId is null, fetch the first quiz for the category
        if (is_null($quizId)) {
            $firstQuiz = Quiz::where('category_id', $categoryId)->first();
            if (!$firstQuiz) {
                abort(404, 'No quizzes found for this category.');
            }
            $quizId = $firstQuiz->id;
        }
    
        // Fetch the quiz
        $quiz = Quiz::findOrFail($quizId);
    
        // Determine if this is the last quiz
        $quizzes = Quiz::where('category_id', $categoryId)->get();
        $totalQuizzes = $quizzes->count();
        $answeredQuizzes = session()->get('answered_quizzes_' . $categoryId, 0);
        $is_last_quiz = ($answeredQuizzes >= $totalQuizzes);
    
        return view('quiz', compact('quiz', 'is_last_quiz'));
    }
    

    public function storeScore(Request $request) {
        // Validate input
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'answer' => 'required',
        ]);

        // Find the current quiz
        $quiz = Quiz::find($validated['quiz_id']);
        $categoryId = $quiz->category_id;

        // Check if the answer is correct
        $isCorrect = $validated['answer'] === $quiz->correct_option;

        // Store feedback in the session
        session()->flash('quiz_feedback_' . $quiz->id, [
            'is_correct' => $isCorrect,
            'correct_option' => $quiz->correct_option,
            'explanation' => $quiz->explanation,
        ]);

        // Get all quizzes in the current category
        $quizzes = Quiz::where('category_id', $categoryId)->get();
        $totalQuizzes = $quizzes->count();

        // Get or initialize the correct answers count
        $answeredQuizzes = session()->get('answered_quizzes_' . $categoryId, 0);

        // If the answer is correct, increase the count of answered quizzes
        if ($isCorrect) {
            $answeredQuizzes++;
            session()->put('answered_quizzes_' . $categoryId, $answeredQuizzes);
        }

        // Check if the user has answered all the quizzes in the category
        $is_last_quiz = ($answeredQuizzes >= $totalQuizzes);

        // Find the next quiz
        $nextQuiz = null;
        foreach ($quizzes as $key => $q) {
            if ($q->id == $quiz->id && isset($quizzes[$key + 1])) {
                $nextQuiz = $quizzes[$key + 1];
                break;
            }
        }

        // Redirect based on the user's progress
        if ($isCorrect) {
            if ($is_last_quiz) {
                // Reset session progress for this category after the last quiz
                session()->forget('answered_quizzes_' . $categoryId);

                // Show the "Congrats" modal when all quizzes are answered
                return redirect()->route('showQuiz', ['categoryId' => $categoryId, 'quizId' => $quiz->id])
                                 ->with('is_last_quiz', true);
            } elseif ($nextQuiz) {
                // Redirect to the next quiz
                return redirect()->route('showQuiz', ['categoryId' => $categoryId, 'quizId' => $nextQuiz->id]);
            }
        }

        // If the answer is incorrect or no next quiz, stay on the current quiz
        return redirect()->back()->with('is_last_quiz', false);
    }
}

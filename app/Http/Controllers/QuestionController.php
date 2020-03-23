<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;

class QuestionController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function create(Questionnaire $questionnaire)
	{
		return view('question.create', compact('questionnaire'));
	}

	public function store(Questionnaire $questionnaire)
	{
		$data = request()->validate([
			'question.question' => 'required',
			'answer.*.answer'   => 'required'
		]);

		$question = $questionnaire->questions()->create($data['question']);

		$question->answers()->createMany($data['answer']);

		return redirect('/questionnaires/' . $questionnaire->id);
	}

	public function destroy(Questionnaire $questionnaire, Question $question)
	{
		$question->answers()->delete();
		$question->delete();

		return redirect('/questionnaires/' . $questionnaire->id);
	}
}

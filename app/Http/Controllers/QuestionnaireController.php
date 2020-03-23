<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionnaireController extends Controller
{
	//
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function create()
	{
		return view('questionnaire.create');
	}

	public function store()
	{
		$data = request()->validate([
			'title' => 'required',
			'purpose' => 'required'
		]);

		/*$data['user_id'] = auth()->user()->id;

    	$questionnaire = Questionnaire::create($data);*/

		$questionnaire = auth()->user()->questionnaire()->create($data);

		return redirect('/questionnaires/' . $questionnaire->id);

		/*$questionnaire = new Questionnaire;
    	$questionnaire->title = request('title');
    	$questionnaire->purpose = request('purpose');
    	$questionnaire->save();

    	return view('questionnaire.show');*/
	}

	public function show(Questionnaire $questionnaire)
	{
		$questionnaire->load('questions.answers');
		return view('questionnaire.show', compact('questionnaire'));
	}
}

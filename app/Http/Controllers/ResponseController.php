<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResponseController extends Controller
{
    public function show($uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();
        return view('surveys.respond', compact('survey'));
    }

    public function store(Request $request, $uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        Response::create([
            'survey_id' => $survey->id,
            'user_id' => Auth::id(),
            'answers' => json_encode($request->answers),
        ]);

        return  view('surveys.thankyou');
    }
}

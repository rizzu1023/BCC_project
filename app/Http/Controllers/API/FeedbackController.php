<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
//        return response()->json(['data' => $request['feedback']]);

        $feedback = Feedback::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'feedback' => $request['feedback'],
        ]);
        if($feedback){
            return response()->json(['data' => 'success']);
        }
        else{
            return response()->json(['data' => 'failed']);
        }
    }
}

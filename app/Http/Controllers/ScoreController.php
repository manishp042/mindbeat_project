<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScoreController extends Controller
{
    public function calculateScore(Request $request){
        $request->validate([
            'username' => 'required'
        ]);
        $username =  $request->input('username');
        $url = "https://api.github.com/users/".$username."/events/public";
        $response = Http::get($url);
        if($response->status() == 404){
            return back()->withErrors(['Please enter a valid username']);
        }else{
            $score = 0;
            $user_activity = json_decode($response);
            foreach($user_activity as $activity){
                if($activity->type =="PushEvent"){
                    $score = $score+10;
                }elseif($activity->type =="PullRequestEvent"){
                    $score = $score+5;
                }elseif($activity->type =="IssueCommentEvent"){
                    $score = $score+4;
                }else{
                    $score = $score+1;
                }
            }
            return redirect()->back()->with('success', $score);
        }
        

    }
}

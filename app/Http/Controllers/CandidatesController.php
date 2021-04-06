<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CandidatesController extends Controller
{
   


    public function home(){

        $candidates = DB::table('candidates')->get();
        return view('home', ['candidates'=> $candidates]);

    }


    

    public function createCandidate(Request $request){

        $candidateName = $request -> input('candidateName');

        DB::table('candidates')->insert(
            ['name'=>$candidateName, 'votes'=>0]
        );
        return view('createCandidateForm');


    }

    public function votingPage(){

//if user is not logged in then send them to register

        if(!Auth::check()){

            return redirect('/register');

        }
        //Check if user has already voted or not
        

       else if(!Auth::user()->has_votes){
            $candidates = DB::table('candidates')->get();
            return view('voting', ['candidates'=> $candidates]);

        }else if(now() > date('2020-3-2 00:00:00))')) {

            return redirect('/')->with('flashMessageProblem', 'You can no longer vote. Polls closed on');
        }
        
        else{
            //user has already voted
                
            return redirect('/')->with('flashMessageProblem', 'You have already voted');
        }
      

        
        }
      
    
        public function createCandidateForm(){

        if(Auth::check() && Auth::user()->is_admin){
            return view("createCandidateForm");

        }
else{
    return redirect('/')->with('flashMessageProblem','You are not authorized to enter this page');
}
            
    
        }

    public function castYourVote(Request $request){

        $candidateId = $request ->input('candidateId');

                //increase number of votes
            
            DB:: table('candidates')->where('id', $candidateId)
                ->update([
                    'votes'=> DB::raw("votes + 1")
                ]);

            
            //change the has_voted value from 0 to 1
            DB::table('users')->where('id', Auth::user()->id)
            ->update([
                'has_votes'=> 1
            ]);
            
        // store which candidate user has voted for

        DB:: table('users')->where('id', Auth::user()->id)
                        ->update([
                            'candidate_voted_for'=>$candidateId
                        ]);



        //return message
        //return view('home');

        return  redirect('/')-> with('flashMessage','You voted successfully. Results will be available on Sunday');


}}

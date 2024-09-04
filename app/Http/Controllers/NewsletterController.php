<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Newsletter;
use Validator;
use Session;
use Auth;

class NewsletterController extends Controller
{
    //
     public function __construct()
    {
       //
    }


   public function store(Request $request){
       // $this->validate($request, [
       //  'email' => 'required', 'string', 'email', 'max:255', 'unique:newsletter',
       //  ]);

 $input = $request->only(['email']);

        $request_data = [
            'email' => 'required|email|unique:newsletter,email',
        ];

        $validator = Validator::make($input, $request_data);

        if ($validator->fails()) {
            $errors = json_decode(json_encode($validator->errors()), 1);
            // return response()->json([
            //     'success' => false,
            //     'message' => array_reduce($errors, 'array_merge', array()),
            // ]);
            return redirect()->back()->with('error', 'Invalid');
        }
        else{
            $request_data = $request->input('email');
            
            $news = new Newsletter();
            $news->email = $request_data;
            $news->save();
        }
       
        return redirect()->back()->with('status', 'You have successfully subscribed to our newsletter!');
  }


    public function subscribers(Request $request){
         if( Auth::user()->role_name  == 'superadmin'){
              $news = Newsletter::orderBy('date', 'desc')
            ->paginate( $request->get('per_page', 10));
            \LogActivity::addToLog('subscribers');
              return view('company.subscribers', compact('news'));
         }
          else { return Redirect::to('/login');}

    }



}//class

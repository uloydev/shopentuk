<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeedbackCustomer;
use App\Rules\AlphaSpace;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback.contact-us', ['title' => 'contact us']);
    }

    public function manage()
    {
        $feedbackCustomer = FeedbackCustomer::all();
        return view('feedback.manage', [
            'title' => 'manage contact us',
            'feedbackCustomer' => $feedbackCustomer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100', 'min:3', new AlphaSpace],
            'telephone' => ['required', 'digits:12'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'min:10']
        ]);

        FeedbackCustomer::create($request->except('_token'));
        return redirect()->back()->with('success', 'Successfully send message to admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackCustomer $feedbackCustomer)
    {
        $feedbackCustomer->delete();
        return redirect()->back()->with('success', 'Successfully delete feedback');
    }
}

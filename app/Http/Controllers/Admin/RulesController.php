<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RulesController extends Controller
{

    /**
     * Display rules
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('game.rule.manage')->with([
            'title' => 'Management Game Rules',
            'rules' => Rules::all()
        ]);
    }

    /**
     * Store a newly rule
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rules::updateOrCreate(
            ['content' => $request->content]
        );

        return redirect()->route('admin.rules.index')->with('berhasil merubah rule');
    }

    /**
     * Remove the rule
     *
     * @param  \App\Models\Rules  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rules $rule)
    {
        // dd($rule);
        $rule->delete();
        return redirect()->back()->with('berhasil menghapus rule');
    }
}

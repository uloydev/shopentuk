<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RulesController extends Controller
{

    /**
     * Display a rule
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rules $rules)
    {
        $rules->delete();
        return redirect()->back()->with('berhasil menghapus rule');
    }
}

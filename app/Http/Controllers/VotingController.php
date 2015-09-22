<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Code;
use App\Position;
use App\Vote;

use Session;

class VotingController extends Controller
{

    public function vote($school, $code) {
        if(!isset($code)){
            return redirect('/');
        } else if(!Code::validate($code)) {
            return redirect('/')
                ->withErrors(['Code Invalid']);
        }
        $categories = Position::school($school);
        return view('voting.vote')
                ->with('categories', $categories)
                ->with('school', $school)
                ->with('code', $code);
    }

    public function postCode(Request $request) {
        $this->validate($request, [
            'code' => 'required',
            'school' => 'required|in:LASA,LBJ'
        ]);

        $code = $request->get('code');
        $school = $request->get('school');

        if(!Code::validate($code)) {
            return view('home')
                    ->withErrors(['Code Invalid']);
        }

        return redirect()->route('vote', [$school, $code]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'school' => 'required|in:LASA,LBJ',
            'vote' => 'required',
            'code' => 'required'
        ]);
        $code = $request->get('code');
        $school = $request->get('school');

        foreach($request->get('vote') as $category => $name) {
            Vote::createOrUpdate($code, $school, $category, $name);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function stats() {
        return "<pre>".json_encode(Vote::stats(), $options=JSON_PRETTY_PRINT)."</pre>";
    }
}

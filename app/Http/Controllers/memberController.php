<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $member = Member::all();
        // return view('member.update',compact(member));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'email' => 'required|email',
            'lending_books' => 'required|numeric'
        ]);

        $member = new Member([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'lending_books' => $request->get('lending_books'),
        ]);

        $member->save();
        return redirect()->back()->with('message','Member Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'lending_books' => 'required'
        ]);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->lending_books = $request->lending_books;

        $member->save();
        return redirect()->route('dashboard')->with('msg','Data Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::find($id);
        $data->delete();
        return redirect()->route('dashboard')->with('msg1','Data Deleted Successful');
        
    }
}

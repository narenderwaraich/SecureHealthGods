<?php

namespace App\Http\Controllers;

use App\Joiner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Toastr;
use Auth;
use Response;

class JoinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $member = Joiner::orderBy('created_at','desc')->paginate(10);
            return view('Admin.User.Joiner',['member' =>$member]);
          }
        }else{
              return redirect()->to('/login');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Joiner  $joiner
     * @return \Illuminate\Http\Response
     */
    public function show(Joiner $joiner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Joiner  $joiner
     * @return \Illuminate\Http\Response
     */
    public function edit(Joiner $joiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Joiner  $joiner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joiner $joiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Joiner  $joiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joiner $joiner)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\SubscriberPlan;
use Illuminate\Http\Request;
use Toastr;
use Auth;
use Redirect;
use Validator;
use Carbon\Carbon;

class SubscriberPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriberPlan = SubscriberPlan::orderBy('created_at','desc')->paginate(10);
        return view('Admin.SubscriberPlan.Show',['subscriberPlan' =>$subscriberPlan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.SubscriberPlan.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required',
        ]);
        if(!$validate){
                            Redirect::back()->withInput();
                          }
        $subscriberPlan = SubscriberPlan::create($request->all());
        Toastr::success('subscriberPlan Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/subscriber-plan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubscriberPlan  $subscriberPlan
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriberPlan $subscriberPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubscriberPlan  $subscriberPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriberPlan = SubscriberPlan::find($id);
        return view('Admin.SubscriberPlan.Edit',['subscriberPlan' =>$subscriberPlan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubscriberPlan  $subscriberPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriberPlan = SubscriberPlan::find($id);

        $subscriberPlan->update($request->all());
        Toastr::success('subscriberPlan updated', 'Success', ["positionClass" => "toast-bottom-right"]);

      return redirect()->to('/subscriber-plan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubscriberPlan  $subscriberPlan
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $subscriberPlan = SubscriberPlan::find($id);
        $subscriberPlan->delete();
        Toastr::success('subscriberPlan deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/subscriber-plan');
    }
}

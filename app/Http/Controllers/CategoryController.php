<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Toastr;
use Redirect;
use Validator;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('created_at','desc')->paginate(5);
        return view('Admin.Category.Show',['category' =>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.Add');
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
        $category = Category::create($request->all());
        Toastr::success('category Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/category/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Admin.Category.Edit',['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update($request->all());
        Toastr::success('category updated', 'Success', ["positionClass" => "toast-bottom-right"]);

      return redirect()->to('/admin/category/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/category/show');
    }
}

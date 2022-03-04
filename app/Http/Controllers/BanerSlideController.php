<?php

namespace App\Http\Controllers;

use App\BanerSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Toastr;
use Redirect;
use Validator;
use Carbon\Carbon;
use App\Page;

class BanerSlideController extends Controller
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
        $pages = Page::All();
        $banner = BanerSlide::orderBy('created_at','desc')->paginate(5);
        return view('Admin.Banner.Show',['banner' =>$banner,'pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Banner.Add');
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
            'page_name' => 'required',
        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        $data = request(['title','description','heading','sub_heading','button_text','button_link','page_name']);
        $pageNameCheck = BanerSlide::where('page_name', '=', $request->page_name)->first();
        if($pageNameCheck){
            Toastr::error('Page Banner Already Make', 'Sorry', ["positionClass" => "toast-bottom-right"]);
           return redirect()->back(); 
         }else{
            if($request->file('uploadFile')){
                foreach ($request->file('uploadFile') as $key => $value) {

                    $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                    $value->move(public_path('images/banner'), $imageName);
                    $data['image'] =$imageName;
                }
            }
           $banner = BanerSlide::create($data);
            Toastr::success('Banner Add', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/admin/banner/show'); 
       }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BanerSlide  $banerSlide
     * @return \Illuminate\Http\Response
     */
    public function show(BanerSlide $banerSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BanerSlide  $banerSlide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = BanerSlide::find($id);
        $pages = Page::All();
        return view('Admin.Banner.Edit',['banner' =>$banner,'pages' => $pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BanerSlide  $banerSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'page_name' => 'required',

        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        $banner = BanerSlide::find($id);
        $data = request(['title','description','heading','sub_heading','button_text','button_link','page_name']);
        if($request->file('uploadFile')){
            foreach ($request->file('uploadFile') as $key => $value) {

                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('images/banner'), $imageName);
                $data['image'] = $imageName;
            }
            $banner->update($data);
            Toastr::success('Banner updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/admin/banner/show');
        }else{
            $banner->update($request->all());
            Toastr::success('Banner updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/admin/banner/show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BanerSlide  $banerSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = BanerSlide::find($id);
        $banner->delete();
        Toastr::success('Banner Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/banner/show');
    }
}

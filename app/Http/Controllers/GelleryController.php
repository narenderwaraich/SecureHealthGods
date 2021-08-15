<?php

namespace App\Http\Controllers;

use App\Gellery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;
use Toastr;
use Auth;
use Response;
use App\BanerSlide;
use Image;
use Illuminate\Support\Facades\File;

class GelleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gellery::orderBy('created_at','desc')->paginate(10);
        return view('Admin.Gellery.Show',['gallery' =>$gallery]);
    }
    
    public function galleryPage(){
        $banner = BanerSlide::where('page_name','=','gallery')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }
        $gallery = Gellery::orderBy('created_at','desc')->paginate(5);
        return view('gallery',compact('title','description'),['banner' =>$banner, 'gallery' =>$gallery]);
        
    }

    public function getData()
    {
        $data = Gellery::orderBy('created_at','desc')->get();
      return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Gellery.Add');
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
            'title' => 'required',
        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        if($request->image){
                $image = $request->file('image'); //dd($image);
                $data['image'] = time().'.'.$image->getClientOriginalExtension();
             
                $filePath = public_path('/images/gallery');

                $img = Image::make($image->path()); //dd($img);
                $img->resize(300, 250, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$data['image']);
           
                $filePath = public_path('/images/oriznal');
                $image->move($filePath, $data['image']);
        }
        $data['title'] = $request->title;
        $data['auth'] = $request->auth;
        $data['url'] = $request->url;
        $data['description'] = $request->description;
        $gellery = Gellery::create($data);

        Toastr::success('Image Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/gallery/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gellery  $Gellery
     * @return \Illuminate\Http\Response
     */
    public function show(Gellery $Gellery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gellery  $Gellery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gellery::find($id);
        return view('Admin.Gellery.Edit',['gallery' =>$gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gellery  $Gellery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'title' => 'required',

        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        $gallery = Gellery::find($id);
        if($request->image){
                // remove image from directory file path
                $gallery_image_path = public_path('/images/gallery/'.$gallery->image);
                if(File::exists($gallery_image_path)) {
                    File::delete($gallery_image_path);
                }
                /// oriznal image remove
                $oriznal_image_path = public_path('/images/oriznal/'.$gallery->image);
                if(File::exists($oriznal_image_path)) {
                    File::delete($oriznal_image_path);
                }

                $image = $request->file('image'); //dd($image);
                $data['image'] = time().'.'.$image->getClientOriginalExtension();
             
                $filePath = public_path('/images/gallery');

                $img = Image::make($image->path()); //dd($img);
                $img->resize(300, 250, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$data['image']);
           
                $filePath = public_path('/images/oriznal');
                $image->move($filePath, $data['image']);

            $data['title'] = $request->title;
            $data['auth'] = $request->auth;
            $data['url'] = $request->url;
            $data['description'] = $request->description;
            $gallery->update($data);
            Toastr::success('Image updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/gallery/show');
        }else{
            $gallery->update($request->all());
            Toastr::success('Image updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/gallery/show');
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gellery  $Gellery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gellery::find($id);
            // remove image from directory file path
            $gallery_image_path = public_path('/images/gallery/'.$gallery->image);
            if(File::exists($gallery_image_path)) {
                File::delete($gallery_image_path);
            }
            /// oriznal image remove
            $oriznal_image_path = public_path('/images/oriznal/'.$gallery->image);
            if(File::exists($oriznal_image_path)) {
                File::delete($oriznal_image_path);
            }
        $gallery->delete();
        Toastr::success('Image Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/gallery/show');
    }
}

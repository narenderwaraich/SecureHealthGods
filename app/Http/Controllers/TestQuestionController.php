<?php

namespace App\Http\Controllers;

use App\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Toastr;
use Redirect;
use Validator;
use Carbon\Carbon;
use App\Category;

class TestQuestionController extends Controller
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
    public function pageList(){
        $category = Category::orderBy('created_at','desc')->paginate(10);
        return view('Admin.TestQuestion.List',['category' =>$category]);
    }
    
    public function phpPage()
    {
        $name = "Php";
        $categoryId = Category::where('name',$name)->first()->id;
        $questions = TestQuestion::where('category_id',$categoryId)->orderBy('created_at','desc')->paginate(10);
        foreach ($questions as $question) {
            $question->category = Category::where('id',$question->category_id)->first()->name;
        }
        return view('Admin.TestQuestion.Show',['questions' =>$questions]);
    }

    public function laravelPage()
    {
        $name = "Laravel";
        $categoryId = Category::where('name',$name)->first()->id;
        $questions = TestQuestion::where('category_id',$categoryId)->orderBy('created_at','desc')->paginate(10);
        foreach ($questions as $question) {
            $question->category = Category::where('id',$question->category_id)->first()->name;
        }
        return view('Admin.TestQuestion.Show',['questions' =>$questions]);
    }

    public function wordpressPage()
    {
        $name = "Wordpress";
        $categoryId = Category::where('name',$name)->first()->id;
        $questions = TestQuestion::where('category_id',$categoryId)->orderBy('created_at','desc')->paginate(10);
        foreach ($questions as $question) {
            $question->category = Category::where('id',$question->category_id)->first()->name;
        }
        return view('Admin.TestQuestion.Show',['questions' =>$questions]);
    }

    public function gkPage()
    {
        $name = "GK";
        $categoryId = Category::where('name',$name)->first()->id;
        $questions = TestQuestion::where('category_id',$categoryId)->orderBy('created_at','desc')->paginate(10);
        foreach ($questions as $question) {
            $question->category = Category::where('id',$question->category_id)->first()->name;
        }
        return view('Admin.TestQuestion.Show',['questions' =>$questions]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.TestQuestion.Add',['categories' =>$categories]);
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
            'type' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
        if(!$validate){
                Redirect::back()->withInput();
            }
            $data = request(['question','answer','type','code','category_id','A','B','C','D']);
            $categoryID = $request->category_id;
            $categoryName = Category::find($categoryID)->name;
            $lastQuestionNumber = TestQuestion::where('category_id',$categoryID)->latest()->orderBy('id', 'DESC')->pluck('question_number')->first(); 
                //dd($lastQuestionNumber);
                if($lastQuestionNumber){
                  $getNumber = explode('Q.', $lastQuestionNumber)[1]; 
                $newQuestionNum = 'Q.'.str_pad($getNumber + 1, 2, "0", STR_PAD_LEFT);  //dd($newQuestionNum);
                
                }else{
                  $newQuestionNum = "Q.01";
                } 
                //dd($newQuestionNum);
            $data['question_number'] = $newQuestionNum;
             
             TestQuestion::create($data);
             //dd($categoryName);
        Toastr::success('Test Question Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/test/question/show/'.$categoryName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestQuestion  $TestQuestion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestQuestion  $TestQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $question = TestQuestion::find($id);
        return view('Admin.TestQuestion.Edit',['categories' =>$categories, 'question' =>$question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestQuestion  $TestQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'type' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
        if(!$validate){
                Redirect::back()->withInput();
            }

        $categoryID = $request->category_id;
        $categoryName = Category::find($categoryID)->name;
        $question = TestQuestion::find($id);

        $question->update($request->all());

        Toastr::success('Test Question updated', 'Success', ["positionClass" => "toast-bottom-right"]);

      return redirect()->to('/admin/test/question/show/'.$categoryName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestQuestion  $TestQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = TestQuestion::find($id);
        $question->delete();
        Toastr::success('TestQuestion deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/test/question/show');
    }
}
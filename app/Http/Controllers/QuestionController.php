<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Toastr;
use Redirect;
use Validator;
use Carbon\Carbon;
use App\AnswerPoint;
use App\Category;

class QuestionController extends Controller
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
        return view('Admin.Question.List',['category' =>$category]);
    }

    public function questionList($category)
    {
        $categoryId = Category::where('name',$category)->first()->id;
        $questions = Question::where('category_id',$categoryId)->orderBy('created_at','desc')->paginate(10);
        foreach ($questions as $question) {
            $question->category = Category::where('id',$question->category_id)->first()->name;
        }
        return view('Admin.Question.Show',['questions' =>$questions]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.Question.Add',['categories' =>$categories]);
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
            'question' => 'required',
            'answer' => 'required',
        ]);
        if(!$validate){
                Redirect::back()->withInput();
            }
            $data = request(['question','answer','type','code','category_id']);

            $categoryID = $request->category_id;
            $categoryName = Category::find($categoryID)->name;
            $lastQuestionNumber = Question::where('category_id',$categoryID)->latest()->orderBy('id', 'DESC')->pluck('question_number')->first(); 
                //dd($lastQuestionNumber);
                if($lastQuestionNumber){
                  $getNumber = explode('Q.', $lastQuestionNumber)[1]; 
                $newQuestionNum = 'Q.'.str_pad($getNumber + 1, 2, "0", STR_PAD_LEFT);  //dd($newQuestionNum);
                
                }else{
                  $newQuestionNum = "Q.01";
                } 
                //dd($newQuestionNum);
            $data['question_number'] = $newQuestionNum;
             
            $question_id = DB::table('questions')->insertGetId($data);

            $time = now();
           if($request->title){
                foreach ($request->title as $key => $itm){

                $point = array('question_id'=>$question_id,
                            // 'title'=>$itm,
                            'title'=>$request->title [$key],
                            'created_at'=>$time,
                            'updated_at'=>$time
                );
                    AnswerPoint::insert($point);
                }
           }                      

        Toastr::success('Question Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/question/show/'.$categoryName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $question = Question::find($id);
        $points = AnswerPoint::where('question_id','=',$id)->get();
        return view('Admin.Question.Edit',['categories' =>$categories, 'question' =>$question, 'points' => $points]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);
        if(!$validate){
                Redirect::back()->withInput();
            }

        $categoryID = $request->category_id;
        $categoryName = Category::find($categoryID)->name;
        $question = Question::find($id);

        $question->update($request->all());

        $time = now();
           if($request->title){
                foreach ($request->title as $key => $itm){

                $point = array('question_id'=>$id,
                            // 'title'=>$itm,
                            'title'=>$request->title [$key],
                            'created_at'=>$time,
                            'updated_at'=>$time
                );
                    AnswerPoint::insert($point);
                }
           }         

        if($request->delete_id){
              $ids = $request->delete_id;
              $itemIds = explode(",",$ids);
              DB::table("answer_points")->whereIn('id',$itemIds)->where('question_id', $id)->delete();
            }


        Toastr::success('Question updated', 'Success', ["positionClass" => "toast-bottom-right"]);

      return redirect()->to('/admin/question/show/'.$categoryName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        Toastr::success('Question deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/question/show');
    }
}

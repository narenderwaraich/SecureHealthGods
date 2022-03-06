<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Carbon\Carbon;
use App\BanerSlide;
use App\Category;
use App\Post;
use App\Question;
use App\AnswerPoint;
use App\TestQuestion;

class PageController extends Controller
{
    public function phpPage(){ 
        $banner = BanerSlide::where('page_name','=','php')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Php')->first();
        $id = $category->id;
        $questions = Question::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
            $question->points = AnswerPoint::where('question_id',$question->id)->get();
        }
        
            return view('php',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function phpTestPage(){
        $banner = BanerSlide::where('page_name','=','php-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Php')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
            return view('php-test',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function laravelPage(){
        $banner = BanerSlide::where('page_name','=','laravel')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Laravel')->first();
        $id = $category->id;
        $questions = Question::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
            $question->points = AnswerPoint::where('question_id',$question->id)->get();
        }
            return view('laravel',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }


    public function laravelTestPage(){
        $banner = BanerSlide::where('page_name','=','laravel-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Laravel')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
            return view('laravel-test',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function wordpressPage(){
        $banner = BanerSlide::where('page_name','=','wordpress')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Wordpress')->first();
        $id = $category->id;
        $questions = Question::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
            $question->points = AnswerPoint::where('question_id',$question->id)->get();
        }
            return view('wordpress',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function wordpressTestPage(){
        $banner = BanerSlide::where('page_name','=','wordpress-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Wordpress')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
            return view('wordpress-test',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }


    public function gkPage(){
        $banner = BanerSlide::where('page_name','=','gk')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','GK')->first();
        $id = $category->id;
        $questions = Question::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
            $question->points = AnswerPoint::where('question_id',$question->id)->get();
        }
            return view('gk',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function gkTestPage(){
        $banner = BanerSlide::where('page_name','=','gk')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','GK')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
            return view('gk-test',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function awsPage(){
        $banner = BanerSlide::where('page_name','=','aws')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','AWS')->first();
        $id = $category->id;
        $questions = Question::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
            $question->points = AnswerPoint::where('question_id',$question->id)->get();
        }
            return view('aws',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function awsTestPage(){
        $banner = BanerSlide::where('page_name','=','aws')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','AWS')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
            return view('aws-test',compact('title','description'),['banner' =>$banner,'questions' =>$questions]); 
    }

    public function postPage(){
        $banner = BanerSlide::where('page_name','=','post')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $post = Post::orderBy('created_at','desc')->paginate(10);
            return view('post',compact('title','description'),['banner' =>$banner,'post' =>$post]); 
    }

    public function aboutPage(){
        $banner = BanerSlide::where('page_name','=','about-us')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
            return view('about-us',compact('title','description'),['banner' =>$banner]); 
    }

    public function privacyPolicy(){
        $banner = BanerSlide::where('page_name','=','privacy-policy')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
            return view('privacy-policy',compact('title','description'),['banner' =>$banner]); 
    }

    public function phpTest(Request $request){
        $requestAnswer = $request; //dd($requestAnswer);
        $banner = BanerSlide::where('page_name','=','php-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Php')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
             if ($question->answer == "A") {
                $question->shoAnswer = TestQuestion::find($question->id)->A;
            }
            if ($question->answer == "B") {
                $question->shoAnswer = TestQuestion::find($question->id)->B;
            }
            if ($question->answer == "C") {
                $question->shoAnswer = TestQuestion::find($question->id)->C;
            }
            if ($question->answer == "D") {
                $question->shoAnswer = TestQuestion::find($question->id)->D;
            }
        }
        return view('php-test-answer',compact('title','description'),['banner' =>$banner,'questions' =>$questions, 'requestAnswer' =>$requestAnswer]);
    }

    public function laravelTest(Request $request){
        $requestAnswer = $request; //dd($requestAnswer);
        $banner = BanerSlide::where('page_name','=','laravel-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Laravel')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
             if ($question->answer == "A") {
                $question->shoAnswer = TestQuestion::find($question->id)->A;
            }
            if ($question->answer == "B") {
                $question->shoAnswer = TestQuestion::find($question->id)->B;
            }
            if ($question->answer == "C") {
                $question->shoAnswer = TestQuestion::find($question->id)->C;
            }
            if ($question->answer == "D") {
                $question->shoAnswer = TestQuestion::find($question->id)->D;
            }
        }
        return view('laravel-test-answer',compact('title','description'),['banner' =>$banner,'questions' =>$questions, 'requestAnswer' =>$requestAnswer]);
    }

    public function wordpressTest(Request $request){
        $requestAnswer = $request; //dd($requestAnswer);
        $banner = BanerSlide::where('page_name','=','wordpress-test')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Php')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
             if ($question->answer == "A") {
                $question->shoAnswer = TestQuestion::find($question->id)->A;
            }
            if ($question->answer == "B") {
                $question->shoAnswer = TestQuestion::find($question->id)->B;
            }
            if ($question->answer == "C") {
                $question->shoAnswer = TestQuestion::find($question->id)->C;
            }
            if ($question->answer == "D") {
                $question->shoAnswer = TestQuestion::find($question->id)->D;
            }
        }
        return view('wordpress-test-answer',compact('title','description'),['banner' =>$banner,'questions' =>$questions, 'requestAnswer' =>$requestAnswer]);
    }

    public function gkTest(Request $request){
        $requestAnswer = $request; //dd($requestAnswer);
        $banner = BanerSlide::where('page_name','=','gk')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','Php')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
             if ($question->answer == "A") {
                $question->shoAnswer = TestQuestion::find($question->id)->A;
            }
            if ($question->answer == "B") {
                $question->shoAnswer = TestQuestion::find($question->id)->B;
            }
            if ($question->answer == "C") {
                $question->shoAnswer = TestQuestion::find($question->id)->C;
            }
            if ($question->answer == "D") {
                $question->shoAnswer = TestQuestion::find($question->id)->D;
            }
        }
        return view('gk-test-answer',compact('title','description'),['banner' =>$banner,'questions' =>$questions, 'requestAnswer' =>$requestAnswer]);
    }

    public function awsTest(Request $request){
        $requestAnswer = $request; //dd($requestAnswer);
        $banner = BanerSlide::where('page_name','=','aws')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        $category = Category::where('name','=','AWS')->first();
        $id = $category->id;
        $questions = TestQuestion::where('category_id',$id)->paginate(10); //dd($questions);
        foreach ($questions as $question) {
             if ($question->answer == "A") {
                $question->shoAnswer = TestQuestion::find($question->id)->A;
            }
            if ($question->answer == "B") {
                $question->shoAnswer = TestQuestion::find($question->id)->B;
            }
            if ($question->answer == "C") {
                $question->shoAnswer = TestQuestion::find($question->id)->C;
            }
            if ($question->answer == "D") {
                $question->shoAnswer = TestQuestion::find($question->id)->D;
            }
        }
        return view('aws-test-answer',compact('title','description'),['banner' =>$banner,'questions' =>$questions, 'requestAnswer' =>$requestAnswer]);
    }

}

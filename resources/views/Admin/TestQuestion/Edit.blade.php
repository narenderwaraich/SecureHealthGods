@extends('layouts.master')
@section('content')

<section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
        <h1>Test Question</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/test/question/update/{{$question->id}}" method="post">
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create <span style="float: right;">
                                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a></span>
                            </h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="page">Type</label>
                                  <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"  name="type">
                                    <option value="all" {{ $question->type == 'all' ? "selected":"" }}>All</option>
                                    <option value="fresher" {{ $question->type == 'fresher' ? "selected":"" }}>Fresher</option>
                                    <option value="experince" {{ $question->type == 'experince' ? "selected":"" }}>Experince</option>
                                  </select>
                                   @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                             </div>
                              <div class="form-group">
                                    <label for="title">Category</label>
                                      <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                                        <option value="">Select Category</option>
                              @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ $question->category_id == $category->id ? "selected":"" }}>{{ $category->name}}</option>
                              @endforeach
                                      </select>
                                 </div>
                            <div class="form-group">
                                <label for="question">Question</label>
                                <textarea name="question" id="question"  rows="2" placeholder="Question" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" required>{{ $question->question }}</textarea>
                                 @if ($errors->has('question'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="page">Answer Type</label>
                                  <select class="form-control{{ $errors->has('ans_type') ? ' is-invalid' : '' }}"  name="ans_type" id="select-ans-type">
                                    <option value="">--Answer Type--</option>
                                    <option value="option" {{ $question->ans_type == "option" ? "selected":"" }}>Option</option>
                                    <option value="choice" {{ $question->ans_type == "choice" ? "selected":"" }}>Choice</option>
                                    <option value="true_false" {{ $question->ans_type == "true_false" ? "selected":"" }}>True/False</option>
                                    <option value="write" {{ $question->ans_type == "write" ? "selected":"" }}>Text Write</option>
                                  </select>
                                   @if ($errors->has('ans_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ans_type') }}</strong>
                                    </span>
                                    @endif
                             </div>
                            <div id="option" @if($question->ans_type != "option") style="display:none;" @endif>
                                <div class="form-group">
                                    <label for="a">Option A</label>
                                    <input type="text" name="A" id="a" placeholder="Option A" value="{{ $question->A }}" class="form-control{{ $errors->has('A') ? ' is-invalid' : '' }}">
                                     @if ($errors->has('A'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('A') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="b">Option B</label>
                                    <input type="text" name="B" id="b" value="{{ $question->B }}" placeholder="Option B" class="form-control{{ $errors->has('B') ? ' is-invalid' : '' }}">
                                     @if ($errors->has('B'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('B') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="c">Option C</label>
                                    <input type="text" name="C" id="c" value="{{ $question->C }}" placeholder="Option C" class="form-control{{ $errors->has('C') ? ' is-invalid' : '' }}">
                                     @if ($errors->has('C'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('C') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="d">Option D</label>
                                    <input type="text" name="D" id="d" value="{{ $question->D }}" placeholder="Option D" class="form-control{{ $errors->has('D') ? ' is-invalid' : '' }}">
                                     @if ($errors->has('D'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('D') }}</strong>
                                        </span>
                                        @endif
                                </div>

                            <div class="answr-txt-lbl">Answer</div>
                             <div class="answr-form-grup">
                               <div class="form-check-inline">
                                  <label class="form-check-label" for="checkA">
                                    <input type="radio" class="form-check-input" id="checkA" name="answer" value="A" {{ $question->answer == 'A' ? "checked":"" }}>Option A
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="checkB">
                                    <input type="radio" class="form-check-input" id="checkB" name="answer" value="B" {{ $question->answer == 'B' ? "checked":"" }}>Option B
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="checkC">
                                    <input type="radio" class="form-check-input" id="checkC" name="answer" value="C" {{ $question->answer == 'C' ? "checked":"" }}>Option C
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="checkD">
                                    <input type="radio" class="form-check-input" id="checkD" name="answer" value="D" {{ $question->answer == 'D' ? "checked":"" }}>Option D
                                  </label>
                                </div>
                              </div>
                            </div>

                            <div id="choice" @if($question->ans_type != "choice") style="display:none;" @endif>

                                @if($question->ans_type == "choice")
                                    <div class="form-check">
                                                @if($question->checkbox_1)
                                      <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                          <input type="checkbox" id="checkbox1" name="checkbox_ans_1" value="{{$question->checkbox_1}}" class="form-check-input" @if($question->checkbox_ans_1) checked @endif> {{$question->checkbox_1}}
                                        </label>
                                      </div>
                                    @endif
                                    @if($question->checkbox_2)
                                      <div class="checkbox">
                                        <label for="checkbox2" class="form-check-label ">
                                          <input type="checkbox" id="checkbox2" name="checkbox_ans_2" value="{{$question->checkbox_2}}" class="form-check-input" @if($question->checkbox_ans_2) checked @endif> {{$question->checkbox_2}}
                                        </label>
                                      </div>
                                    @endif
                                    @if($question->checkbox_3)
                                      <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                          <input type="checkbox" id="checkbox3" name="checkbox_ans_3" value="{{$question->checkbox_3}}" class="form-check-input" @if($question->checkbox_ans_3) checked @endif> {{$question->checkbox_3}}
                                        </label>
                                      </div>
                                    @endif
                                    @if($question->checkbox_4)
                                      <div class="checkbox">
                                        <label for="checkbox4" class="form-check-label ">
                                          <input type="checkbox" id="checkbox4" name="checkbox_ans_4" value="{{$question->checkbox_4}}" class="form-check-input" @if($question->checkbox_ans_4) checked @endif> {{$question->checkbox_4}}
                                        </label>
                                      </div>
                                    @endif
                                    @if($question->checkbox_5)
                                      <div class="checkbox">
                                        <label for="checkbox5" class="form-check-label ">
                                          <input type="checkbox" id="checkbox5" name="checkbox_ans_5" value="{{$question->checkbox_5}}" class="form-check-input" @if($question->checkbox_ans_5) checked @endif > {{$question->checkbox_5}}
                                        </label>
                                      </div>
                                    @endif
                                    @if($question->checkbox_6)
                                      <div class="checkbox">
                                        <label for="checkbox6" class="form-check-label ">
                                          <input type="checkbox" id="checkbox6" name="checkbox_ans_6" value="{{$question->checkbox_6}}" class="form-check-input" @if($question->checkbox_ans_6) checked @endif> {{$question->checkbox_6}}
                                        </label>
                                      </div>
                                    @endif
                                    </div>
                                    
                                    @endif

                                <div class="input-group">
                                    <input type="text" id="checkBoxVal" name="" placeholder="Check Box Value" class="form-control">
                                    <div class="input-group-btn"><button type="button" class="btn btn-primary" id="addCheckBox">Add</button></div>
                                </div>
                                <div class="form-group" style="margin: 10px 10px;">
                                      <div class="form-check" id="check_box_field">

                                      </div>
                                </div>

                                @if($question->checkbox_1)
                                <input type="text" name="checkbox_1" value="{{$question->checkbox_1}}" class="form-control m-t-5">
                                @endif
                                @if($question->checkbox_2)
                                <input type="text" name="checkbox_2" value="{{$question->checkbox_2}}" class="form-control m-t-5">
                                @endif
                                @if($question->checkbox_3)
                                <input type="text" name="checkbox_3" value="{{$question->checkbox_3}}" class="form-control m-t-5">
                                @endif
                                @if($question->checkbox_4)
                                <input type="text" name="checkbox_4" value="{{$question->checkbox_4}}" class="form-control m-t-5">
                                @endif
                                @if($question->checkbox_5)
                                <input type="text" name="checkbox_5" value="{{$question->checkbox_5}}" class="form-control m-t-5">
                                @endif
                                @if($question->checkbox_6)
                                <input type="text" name="checkbox_6" value="{{$question->checkbox_6}}" class="form-control m-t-5">
                                @endif

                                </div>

                            <div id="true_false" @if($question->ans_type != "true_false") style="display:none;" @endif>
                              <div class="answr-form-grup">
                               <div class="form-check-inline">
                                  <label class="form-check-label" for="checkA">
                                    <input type="radio" class="form-check-input" id="true-false-checkA" name="true_false_answer" value="1">True
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="checkB">
                                    <input type="radio" class="form-check-input" id="true-false-checkB" name="true_false_answer" value="0">False
                                  </label>
                                </div>
                                </div>  
                            </div>

                            <div id="write" @if($question->ans_type != "write") style="display:none;" @endif>
                                <textarea name="write_ans" class="form-control" placeholder="Write Answer"></textarea>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

<script>
    $('#select-ans-type').on('change',function(){
        showAnswerType($(this).val());
    });

    function showAnswerType(id){
        console.log(id);
        if(id === "option"){
            $('#option').show();
            $('#choice').hide();
            $('#true_false').hide();
            $('#write').hide();
        }

        if(id === "choice"){
            $('#choice').show();
            $('#option').hide();
            $('#true_false').hide();
            $('#write').hide();
        }

        if(id === "true_false"){
            $('#true_false').show();
            $('#choice').hide();
            $('#option').hide();
            $('#write').hide();
        }

        if(id === "write"){
            $('#write').show();
            $('#choice').hide();
            $('#true_false').hide();
            $('#option').hide();
        }
    }

var i=0;
var v=1;   

  $('#addCheckBox').click(function(){    
  var checkBoxValue = $('#checkBoxVal').val();
  if(v > 6){ 
    alert('add only 6 checkbox!') 
  }else{
    $('#check_box_field').append('<div class="checkbox" id="frm'+i+'">'+v+'.  <label for="checkbox'+v+'" class="form-check-label "><input type="checkbox" id="checkbox'+v+'" name="checkbox_ans_'+v+'" value="'+checkBoxValue+'" class="form-check-input"> '+checkBoxValue+'</label></div><input type="hidden" name="checkbox_'+v+'" value="'+checkBoxValue+'">');
       i++;
       v++;
  }
  
    $('#checkBoxVal').val('');

  });  

  $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#frm'+button_id+'').remove();
  });
</script>
@endsection
@extends('layouts.master')
@section('content')

<section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
        <h1>Question</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/question/add" method="post">
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
                                  <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"  name="type" >
                                    <option value="">--Select Type--</option>
                                    <option value="fresher">Fresher</option>
                                    <option value="experince">Experince</option>
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
                          <option value="{{ $category->id }}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{ $category->name}}</option>
                              @endforeach
                                      </select>
                                 </div>
                            <div class="form-group">
                                <label for="question">Question</label>
                                <textarea name="question" id="question"  rows="2" placeholder="Question" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" required></textarea>
                                 @if ($errors->has('question'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea name="answer" id="answer"  rows="5" placeholder="Answer" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" required></textarea>
                                 @if ($errors->has('answer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="dynamic_field"></div>
                              </div>
                                
                              <div class="row">
                                <button type="button" name="add" id="addForm" class="btn add-btn focus-border"><i class="fa fa-plus-square"></i> Add Point</button>
                              </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <textarea name="code" id="code"  rows="6" placeholder="Code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"></textarea>
                                 @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  

      $('#addForm').click(function(){    
      $('#dynamic_field').append('<div id="frm'+i+'" class="form-group"><input type="text" class="form-control" name="title[]" placeholder="Enter Point"><span class="btn_remove" style="font-size: 14px; color: red;cursor: pointer;" name="remove" id="'+i+'">Remove</span></div>');
           i++;
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#frm'+button_id+'').remove();  
      });  
    });  
</script>
@endsection
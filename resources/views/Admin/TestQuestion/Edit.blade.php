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
                                    <option value="">--Select Type--</option>
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
                                <label for="a">Option A</label>
                                <input type="text" name="A" id="a" value="{{ $question->A }}" placeholder="Option A" class="form-control{{ $errors->has('A') ? ' is-invalid' : '' }}" required>
                                 @if ($errors->has('A'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('A') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="b">Option B</label>
                                <input type="text" name="B" id="b" value="{{ $question->B }}" placeholder="Option B" class="form-control{{ $errors->has('B') ? ' is-invalid' : '' }}" required>
                                 @if ($errors->has('B'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('B') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="c">Option C</label>
                                <input type="text" name="C" id="c" value="{{ $question->C }}" placeholder="Option C" class="form-control{{ $errors->has('C') ? ' is-invalid' : '' }}" required>
                                 @if ($errors->has('C'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('C') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="d">Option D</label>
                                <input type="text" name="D" id="d" value="{{ $question->D }}" placeholder="Option D" class="form-control{{ $errors->has('D') ? ' is-invalid' : '' }}" required>
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

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
@endsection
@extends('layouts.master')
@section('content')

  <section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
            <h1>video</h1>
        </section>
      <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="/video/update/{{ $video->id }}" method="post">
                    {{ csrf_field() }}
                      <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit <span style="float: right;"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
<span class="fa fa-chevron-left"></span> Back</button></a></span></h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Title" value="{{ $video->title }}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Author</label>
                                    <select class="form-control" name="type">
                                    <option value="">--Select Type--</option>
                                    <option value="html" {{ $video->type == 'html' ? "selected":"" }}>Html</option>
                                    <option value="php" {{ $video->type == 'php' ? "selected":"" }}>Php</option>
                                    <option value="laravel" {{ $video->type == 'laravel' ? "selected":"" }}>Laravel</option>
                                    <option value="wordpress" {{ $video->type == 'wordpress' ? "selected":"" }}>Wordpress</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Video Id</label>
                                    <input type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" placeholder="Enter Video Id" value="{{ $video->url }}">
                                @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                                @endif
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
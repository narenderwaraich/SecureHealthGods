@extends('layouts.master')
@section('content')

  <section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
            <h1>Page Setup</h1>
        </section>
      <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/banner/update/{{ $banner->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit<span style="float: right;"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
<span class="fa fa-chevron-left"></span> Back</button></a></span></h3>
                            </div>

                           <!--  <bootstrap-alert /> -->

                            <div class="box-body">

                              <div class="form-group">
                                    <label for="page">Page</label>
                                      <select class="form-control{{ $errors->has('page_name') ? ' is-invalid' : '' }}"  name="page_name" >
                                        <option value="">--Select Page--</option>
                                        @foreach($pages as $page)
                                        <option value="{{$page->slug}}" {{ $banner->page_name == $page->slug ? "selected":"" }}>{{$page->text}}</option>
                                        @endforeach
                                      </select>
                                       @if ($errors->has('page_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('page_name') }}</strong>
                                        </span>
                                        @endif
                                 </div>
                                 <div class="form-group">
                                    <label for="page-title">Page Title</label>
                                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="page-title" placeholder="Enter Page Title" value="{{ $banner->title }}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                                </div>
                                <div class="form-group">
                                <label for="page-description">Page Description</label>
                                <textarea name="description" id="page-description"  rows="2" placeholder="Page Description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $banner->description }}</textarea>
                                 @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control{{ $errors->has('heading') ? ' is-invalid' : '' }}" name="heading" id="heading" placeholder="Enter Heading" value="{{ $banner->heading }}">
                                @if ($errors->has('heading'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('heading') }}</strong>
                                </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="sub_heading">Sub Heading</label>
                                    <input type="text" class="form-control{{ $errors->has('sub_heading') ? ' is-invalid' : '' }}" name="sub_heading" placeholder="Enter Sub Heading" value="{{  $banner->sub_heading }}">
                                @if ($errors->has('sub_heading'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sub_heading') }}</strong>
                                </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="btn-txt">Button Text</label>
                                    <input type="text" id="btn-txt" class="form-control{{ $errors->has('button_text') ? ' is-invalid' : '' }}" name="button_text" placeholder="Enter Button Text" value="{{ $banner->button_text }}">
                                @if ($errors->has('button_text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('button_text') }}</strong>
                                </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="btn-link">Button Link</label>
                                    <input type="text" id="btn-link" class="form-control{{ $errors->has('button_link') ? ' is-invalid' : '' }}" name="button_link" placeholder="Enter Button Link" value="{{ $banner->button_link }}">
                                @if ($errors->has('button_link'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('button_link') }}</strong>
                                </span>
                                @endif
                                </div>
                                <label for="title">Drop only 1 Blog Image</label>
                                  <div class="large-12 medium-12 small-12 filezone  gallery">
                                      <input type="file" class="multi-img" id="files" name="uploadFile[]"  multiple/>
                                      <p>
                                          Drop your files here <br>or click to search (Maxsize 5mb)
                                      </p>
                                  </div>
                                  @if($banner->image)
                                  <div class="img-show-box pip">
                                    <img class="imageThumb" src="/public/images/banner/{{ $banner->image }}"> 
                                    <div class="remove">Remove</div>
                                  </div>
                                  @endif

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
<script src="/public/jquery/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.remove').on('click', function() {
            $(this).parents(".pip").remove();
              });

         /// multi image 
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
        if(filesLength > 1){
          alert('plz drop only 1 image');
        }else{
                for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"img-show-box pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + 
            "<div class=\"remove\">Remove</div>" +
            "</div>").insertAfter(".gallery");
          // $(".remove").click(function(){
          //   $(this).parent(".pip").remove();
          // });
          
        });
        fileReader.readAsDataURL(f);
      }
        }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
<style scoped>
    .multi-img{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    .img-show-box{
         display: inline-block;
    width: auto;
    }
    .imageThumb{
        margin-bottom: 20px;
        margin-top: 20px;
        width:  auto;
      height:300px;
      padding: 10px;
    }
    .remove {
      color: red;
      text-align: center;
      cursor: pointer;
      display: block;
      width: auto;
      height: auto;
    }
    .remove:hover {
      color: green;
    }
</style>
@endsection
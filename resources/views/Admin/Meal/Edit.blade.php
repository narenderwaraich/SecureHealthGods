@extends('layouts.app')
@section('content')
  <section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
            <h1>Meal</h1>
        </section>
      <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/meal/update/{{$meal->id}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit <span style="float: right;"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a></span></h3>
                            </div>


                           <!--  <bootstrap-alert /> -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Meal Combo</label>
                                    <select data-placeholder="Choose a menu" name="meal_menu[]" multiple="" class="standardSelect" style="display: none;">
                                        <option value=""></option>
                                        @foreach($menus as $menu)
                                        <option value="{{$menu->id}}" {{ (in_array($menu->id, $mealItemValue) ? "selected":"") }}>{{$menu->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Food Type</label>
                                      <select class="form-control" name="food_type_id">
                                        @foreach($foodTypes as $foodType)
                                        <option value="{{$foodType->id}}" @if($meal->food_type_id == $foodType->id) selected @endif>{{$foodType->name}}</option>
                                        @endforeach
                                      </select>
                                 </div>

                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="item_name" value="{{$meal->item_name}}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="title">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{$meal->price}}" placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="title">Sale Price</label>
                                    <input type="text" class="form-control" name="sale" value="{{$meal->sale}}" placeholder="Enter Sale Price">
                                </div>
                                
                                  <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="item_description" id="proDesc"  rows="5" placeholder="Description" class="form-control">{{$meal->item_description}}</textarea>
                                  </div>

                                  <label for="title">Drop only 1 Meal Image</label>
                                  <div class="large-12 medium-12 small-12 filezone  gallery">
                                      <input type="file" class="multi-img" id="files" name="image">
                                      <p>
                                          Drop your files here <br>or click to search (Maxsize 5mb)
                                      </p>
                                  </div>

                                  @if($meal->image)
                                  <div class="img-show-box pip">
                                    <img class="imageThumb" src="/images/meals/{{ $meal->image }}"> 
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
</div> <!-- right panel div close -->
<link rel="stylesheet" href="/jquery/chosen.css">
<script src="/jquery/jquery-3.2.1.min.js"></script>
<script src="/jquery/chosen.jquery.js"></script>
<script>
        $(document).ready(function() {
            $(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });

    /// multi image 
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
      width: 300px;
      height: auto;
    }
    .remove:hover {
      color: green;
    }
</style>
@endsection

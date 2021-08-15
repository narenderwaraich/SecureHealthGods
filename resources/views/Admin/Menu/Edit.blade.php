@extends('layouts.app')
@section('content')
  <section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
            <h1>Menu</h1>
        </section>
      <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/menu/update/{{$menu->id}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit <span style="float: right;"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a></span></h3>
                            </div>
                            <div class="box-body">
                                 <div class="form-group">
                                    <label for="title">Food Type</label>
                                      <select class="form-control" name="food_type_id">
                                        @foreach($foodTypes as $foodType)
                                        <option value="{{$foodType->id}}" @if($menu->food_type_id == $foodType->id) selected @endif>{{$foodType->name}}</option>
                                        @endforeach
                                      </select>
                                 </div>
                                <div class="form-group">
                                    <label for="title">Category</label>
                                      <select class="form-control" name="food_category_id">
                                        @foreach($foodCategory as $category)
                                        <option value="{{$category->id}}" @if($menu->food_category_id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                      </select>
                                 </div>
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="item_name" placeholder="Enter Name" value="{{$menu->item_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{$menu->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Sale Price</label>
                                    <input type="text" class="form-control" name="sale" placeholder="Enter Sale Price" value="{{$menu->sale}}">
                                </div>
                                <div class="form-group">
                                    <div class="label-title">Size <!-- <span style="font-size: 10px;">(On/Off)</span> --></div>
                                    <input type="checkbox" name="size" id="size" onchange="sizeEnable()" @if($menu->size ==1) checked @endif data-toggle="toggle" data-onstyle="success">
                                  </div>
                             <div id="product_size">
                                <div class="form-group">
                                    <label for="title">Small Price</label>
                                    <input type="text" class="form-control" name="small_price" placeholder="Enter Small Price" value="{{$menu->small_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Medium Price</label>
                                    <input type="text" class="form-control" name="medium_price" placeholder="Enter Medium Price" value="{{$menu->medium_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Large Price</label>
                                    <input type="text" class="form-control" name="large_price" placeholder="Enter Large Price" value="{{$menu->large_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Extra Large Price</label>
                                    <input type="text" class="form-control" name="extra_large_price" placeholder="Enter Extra Large Price" value="{{$menu->extra_large_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Half Price</label>
                                    <input type="text" class="form-control" name="half_price" placeholder="Enter Half Price" value="{{$menu->half_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Full Price</label>
                                    <input type="text" class="form-control" name="full_price" placeholder="Enter Full Price" value="{{$menu->full_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Reguler Price</label>
                                    <input type="text" class="form-control" name="reguler_price" placeholder="Enter Reguler Price" value="{{$menu->reguler_price}}">
                                </div>
                            </div>
                                <!-- <div class="form-group">
                                    <label for="title">Quantity</label>
                                    <input type="text" class="form-control" name="qty" placeholder="Enter Quantity" value="{{$menu->qty}}">
                                </div> -->
                                  <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="item_description" id="proDesc" rows="5" placeholder="Description" class="form-control">{{$menu->item_description}}</textarea>
                                  </div>

                                  <label for="title">Drop only 1 Menu Image</label>
                                  <div class="large-12 medium-12 small-12 filezone  gallery">
                                      <input type="file" class="multi-img" id="files" name="image">
                                      <p>
                                          Drop your files here <br>or click to search (Maxsize 5mb)
                                      </p>
                                  </div>
                                  @if($menu->image)
                                  <div class="img-show-box pip">
                                    <img class="imageThumb" src="/images/menus/{{ $menu->image }}"> 
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

<script src="/jquery/jquery-3.2.1.min.js"></script>
<script>
function sizeEnable(){
    var sizeFiled  = document.getElementById("product_size");
    if (sizeFiled.style.display === 'block') {
        sizeFiled.style.display = 'none';        
    }else{
        sizeFiled.style.display = 'block';        
    }
 }
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

  if($('#size').prop('checked', true)){
    sizeEnable();
  }
});
</script>
<style>
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
    #product_size{
        display: none;
    }
</style>
@endsection
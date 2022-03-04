@extends('layouts.app')
@section('content')
@if(isset($banner))
<div class="banner">
  <img src="{{asset('/public/images/banner/'.$banner->image)}}" alt="{{$banner->heading}}"/>
  <div class="slider-imge-overlay"></div>
  <div class="caption text-center">
    <div class="container">
      @if($banner->heading)
      <div class="caption-in">
        <div class="caption-ins">
          <h1 class="text-up">{{$banner->heading}}<span>{{$banner->sub_heading}}</span></h1>
          @if($banner->button_text)
          <div class="links"> 
            <a href="{{$banner->button_link}}" class="btns slider-btn"><span>{{$banner->button_text}}</span></a> 
          </div>
          @endif
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@else
<div class="m-t-70"></div>
@endif

<!-- Content -->
<div class="container singn-up">
    <div class="windows-firm-Box">
        <div class="top-tile">
            Subscribe Channel Approve
        </div>
        <div class="windows-form">
            <form method="POST" action="/aprovel/channel/{{$channel->id}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col form-group">
                        <label for="channel_name">Channel Name</label>
                        <input id="channel_name" type="text" class="windows-form-input form-control" name="channel_name" value="{{ $channel->channel_name }}" readonly>
                    </div>
                  </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="channel_id">Channel ID</label>
                        <input id="channel_id" type="text" class="windows-form-input form-control" name="channel_id" value="{{ $channel->channel_id }}" readonly>
                    </div>
                  </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="">Screen Shoot</label>
                        <input type="file" name="screen_shot" class="windows-form-input form-control"> 
                    </div>
                </div>
                <button type="submit" class="btn btn-style btn-top" >Submit</button>
            </form>
        </div>
    </div>
</div> <!-- Content End -->

<script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>        
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
        }
        $("#getFile").change(function(){
        readURL(this);
        $('#userImage').hide();
        $('.newdp').show();
        });
     
</script>       
@endsection
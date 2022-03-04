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
<div class="container m-t-100 m-b-70">
    <div class="home-heading-txt" style="text-align: center;font-size: 26px;font-weight: 800;margin-bottom: 25px;">Yotube Channel List</div>
    <table style="width:100%">
      <tr>
        <th>Channel Name</th>
        <th>Action</th>
      </tr>
      @foreach($youtubeGet as $youtube)
      <tr>
        <td><span class="channel-name">{{ $youtube->channel_name }}</span></td>
        <td>
          @if($youtube->statusApprove == "")
          <a href="https://www.youtube.com/channel/{{ $youtube->channel_id }}">
            <button type="button" class="btn btn-danger">Subscribe</button>
          </a>
          @endif
          @if($youtube->statusApprove == "")
          <a href="/aprovel/channel/{{ $youtube->channel_id }}">
            <button type="button" class="btn btn-success">Aprovel</button>
          </a>
          @elseif($youtube->statusApprove == "Confirm")
          Complete
          @else
          Proceess
          @endif
        </td>
      </tr>
      @endforeach
    </table>
{!! $youtubeGet->links() !!}  
</div>  <!-- Content End -->

<script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>        
@endsection
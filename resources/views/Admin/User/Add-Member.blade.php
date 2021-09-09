@extends('layouts.admin')
@section('content')

<section class="content-wrapper">
    <section class="content-header">
        <h1>Member</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/member/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New 
                                <span style="float: right;"> 
                                    <a href="{{ URL::previous() }}">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <span class="fa fa-chevron-left"></span> Back
                                        </button>
                                    </a>
                                </span>
                            </h3>
                        </div>
                        <div class="box-body">

                            
                            <input type="hidden" name="live_image" class="image-tag">

                            <div id="my_camera" style="display:none;"></div>
                            <div id="results" class="image-capture" style="display:none;">Your captured image will appear here...</div>

                            <img src="{{config('app.file_path')}}/images/icon/admin.jpg" id="showUpLog" class="avatar profile-img-tag">
                            <button type="button" class="btn btn-dark btn-sm" id="selectImage"><i class="fa fa-camera img-change-btn-icon"></i>  Upload Logo</button>
                            <button type="button" class="btn btn-dark btn-sm" id="openCemrea" onClick="takeLiveImg()"><i class="fa fa-video-camera" aria-hidden="true"></i> Click Image</button>
                            <button type="button" class="btn btn-success btn-sm" onClick="take_snapshot()" id="click_img_btn" style="display:none;"><i class="fa fa-camera" aria-hidden="true"></i> Take Snapshot 
                            </button>

                            <input type="file" name="logo" id="getFile" accept="image/*" class="form-control input-border" style="display: none;">
                            <br>
                            <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Refer Code</label>
                            <input type="text" value="{{old('refer_code')}}" name="refer_code" placeholder="Refer Code" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pendant No.<span style="color: #dc3545;">*</span></label>
                            <input type="text" value="{{old('pendant_no')}}" name="pendant_no" placeholder="SEC078348" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Your Name <span style="color: #dc3545;">*</span></label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" required>
                            @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Mobile <span style="color: #dc3545;">*</span></label>
                            <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Mobile" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" required>
                            @if ($errors->has('phone'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>


                       <div class="row">
                            <div class="col-6 form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" required class="form-control ">
                                    <option value="">-- Select Gender--</option>    
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label for="db">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" value="" id="db" placeholder="Date of birth">
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Adhar Card No. <span style="color: #dc3545;">*</span></label>
                            <input name="adhar_card_number" id="adhar_number" type="tel" value="{{ old('adhar_card_number') }}" placeholder="1111-2222-3333" class="form-control" type="tel" maxlength="14" minlength="14" onkeyup="ccNumber()">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Country <span style="color: #dc3545;">*</span></label>
                            <select  name="country" id="country" class="form-control" required>
                              <option value="">Select Country</option>
                             @foreach($country_data as $country)
                              <option value="{{ $country->name }}" {{ (old('country') == $country->name ? "selected":"") }}>{{$country->name}}</option>
                             @endforeach
                           </select>
                            
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>State <span style="color: #dc3545;">*</span></label>
                            <select name="state" id="state" class="form-control" required>
                              <option value="">Select State</option>
                              @foreach($state_data as $state)
                                <option value="{{$state->name}}" {{ (old('state') == $state->name ? "selected":"") }}>{{$state->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>City <span style="color: #dc3545;">*</span></label>
                            <select name="city" id="city" class="form-control" required>
                              <option value="">Select City</option>
                              @foreach($city_data as $city)
                                <option value="{{$city->name}}" {{ (old('city') == $city->name ? "selected":"") }}>{{$city->name}}</option>
                              @endforeach
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Postal Code <span style="color: #dc3545;">*</span></label>
                            <input type="number" name="zipcode" value="{{old('zipcode')}}" placeholder="Postal Code" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Address <span style="color: #dc3545;">*</span></label>
                            <textarea name="address" id="address" rows="4" cols="80" class="form-control" placeholder="Address" required>{{ old('address') }}</textarea>
                          </div>
                        </div>
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
<style>
   .profile-img-tag{
    width: 150px;
    height: 150px;
    border-radius: 100%;
    display: block;
    margin: auto;
}
#selectImage, #openCemrea, #click_img_btn{
    margin: 20px auto 10px auto;
    text-align: center;
    display: block;
}
#my_camera{
    margin: auto;
}
.image-capture{
    margin: auto;
    display: block;
    text-align: center;
}
</style>
<script src="{{config('app.file_path')}}/jquery/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 450,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90,
        flip_horiz: true,
        constraints: {
            video: true,
            facingMode: "environment"
        }
    });
  
  function takeLiveImg(){
    $('#showUpLog').hide();
    $('#selectImage').hide();
    $('#my_camera').show();
    $('#click_img_btn').show();
    Webcam.attach('#my_camera');
  }
    
function take_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
    $('#my_camera').hide();
    $('#results').show();
}
</script>
<script>

    $(document).ready(function(){
    $('#selectImage').on('click', function() {
      $("#getFile").click();
    });
  
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#getFile").change(function(){
        readURL(this);
    });
    });


    $('#country').change(function(){
    var countryName = $(this).val();    
    if(countryName){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryName,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select State</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        //$("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateName = $(this).val();    
    if(stateName){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateName,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+value+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });

function ccNumber() {
      $('#adhar_number').on('keyup', function(e){
          var val = $(this).val();
          var newval = '';
          val = val.replace(/\s/g, '');
          for(var i=0; i < val.length; i++) {
              if(i%4 == 0 && i > 0) newval = newval.concat(' ');
              newval = newval.concat(val[i]);
          }
          $(this).val(newval);
      });
    }
   </script>
@endsection
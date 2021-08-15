@extends('layouts.app')
@section('content')
@if(isset($banner->image))
<div class="banner">
  <img src="{{asset('/images/banner/'.$banner->image)}}" alt="{{$banner->heading}}"/>
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
<div class="m-t-150"></div>
@endif

<!-- Content -->
<div class="container m-t-70 m-b-70">
    <div class="user-pro-section">
         <div class="row">
            <div class="col-sm-12">
              <h1>{{ Auth::user()->name }}
              </h1>
            </div>
          </div>

          <div class="row m-t-30">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center" style="position: relative;">
                  <form method="POST" id="logoUpdateForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="logo" value="{{$userProfile ? $userProfile->logo : ''}}" style="visibility: hidden;" id="getFile">
                    @if(empty($userProfile->logo))
                    <img src="" class="dp-show newdp" id="profile-img-tag" alt="avatar" style="display: none;">
                    <div id="userImage"></div>
                    @else
                    <img src="{{asset('/images/user-logo/'.$userProfile->logo)}}" alt="{{ Auth::user()->name }}" class="dp-show" id="profile-img-tag">
                    @endif
                    <div id="loader_display" style="display: none;"></div>
                    <button type="button" class="btn img-upload btn-style" onclick="document.getElementById('getFile').click()">Upload</button>
                  </form>
                </div>
            </hr><br>
            <ul class="list-group">
              <li class="list-group-item text-muted">Orders <i class="fa fa-dashboard fa-1x"></i></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Order</strong></span>{{$orders ? $orders : 0}}</li>
            </ul> 
            </div><!--/col-md-3-->

            <div class="col-sm-9 on-mob-top-35">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password-tab">Password</a>
                  </li>
                </ul>
            <!-- Tab panes -->
                <div class="tab-content">
                    <div id="profile" class="container tab-pane active"><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Your Profile</h4>
                                    <hr>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <form method="POST" id="userUpdateForm" class="profile-form">
                                      {{ csrf_field() }}
                                      <div class="form-group row">
                                        <label for="username" class="col-md-3 col-form-label">Name</label> 
                                        <div class="col-md-9">
                                          <input id="username" name="name" placeholder="Name" class="form-control input-style here" value="{{ Auth::user()->name }}" required="required" type="text">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Email</label> 
                                        <div class="col-md-9">
                                          <small id="new-email">{{ Auth::user()->email }}</small>
                                          <input type="email" id="email" name="email" placeholder="Enter New Email" class="form-control input-style here">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="mobile" class="col-md-3 col-form-label">Mobile</label>
                                        <div class="col-md-9">
                                          <small id="new-mobile">{{ Auth::user()->phone }}</small>
                                          <input type="tel" class="form-control input-style here" minlength="10" maxlength="10" name="phone" id="mobile" placeholder="New Mobile number" title="enter new mobile number if any.">
                                        </div>
                                      </div>

                                      <div class="form-group row" style="margin-top: -20px;margin-bottom: 20px;">
                                        <div class="col-12">
                                          <button type="submit" class="btn btn-style">Update</button>
                                        </div>
                                      </div>
                                    </form>
                                   </div>
                               </div>

                            </div>
                        </div>
                    </div>

                    <div id="address" class="container tab-pane fade"><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Update Address</h4>
                                    <hr>
                                  </div>
                                </div>
                            <form id="userAddressUpdateForm" method="post"  class="profile-form">
                                @csrf
                                <div class="form-group row">
                                  <label for="country" class="col-md-3 col-form-label">Country</label> 
                                  <div class="col-md-9">
                                    <select name="country"  class="input-style form-control " id="country">
                                        <option value="">-- Select Country--</option>    
                                        @foreach($country_data as $country)
                                            <option value="{{$country->name}}" @if(isset($userProfile)){{$country->name == $userProfile->country  ? 'selected' : ''}}@endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>  
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="state" class="col-md-3 col-form-label">State</label> 
                                  <div class="col-md-9">
                                <select name="state"  class="input-style form-control " id="state">
                                    <option value="">-- Select State--</option>    
                                    @foreach($state_data as $state)
                                          <option value="{{$state->name}}" @if(isset($userProfile)){{$state->name == $userProfile->state  ? 'selected' : ''}}@endif>{{$state->name}}</option>
                                    @endforeach
                                </select>

                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="city" class="col-md-3 col-form-label">City</label> 
                                  <div class="col-md-9">
                                <select name="city"  class="input-style form-control " id="city">
                                    <option value="">-- Select City--</option>    
                                      @foreach($city_data as $city)
                                          <option value="{{$city->name}}" @if(isset($userProfile)){{$city->name == $userProfile->city  ? 'selected' : ''}}@endif>{{$city->name}}</option>
                                      @endforeach
                                </select>  

                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="address" class="col-md-3 col-form-label">Address</label> 
                                  <div class="col-md-9">
                                <textarea class="form-control input-style" name="address" id="address"  rows="2" placeholder="Address">{{$userProfile ? $userProfile->address : ''}}</textarea>

                                  </div>
                                </div>
                                  <div class="form-group row" style="margin-bottom: 13px;">
                                    <div class="col-12">
                                      <button name="submit" type="submit" class="btn btn-style">{{$userProfile ? 'Update' : 'Submit'}}</button>
                                    </div>
                                  </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div id="password-tab" class="container tab-pane fade"><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Change Password</h4>
                                    <hr>
                                  </div>
                                </div>

                            <form id="userPassUpdateForm" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                      <label for="old_password" class="col-md-3 col-form-label">Old Password</label> 
                                      <div class="col-md-9">
                                    <input type="password" name="old_password" id="old_password" class="form-control pass-filed input-style" placeholder="Enter Old Password" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="password" class="col-md-3 col-form-label">New Password</label> 
                                      <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control pass-filed input-style" placeholder="Enter New Password" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="password_confirmation" class="col-md-3 col-form-label">Confirm Password</label> 
                                      <div class="col-md-9">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control pass-filed input-style" placeholder="Confirm Password" required>
                                      </div>
                                    </div>

                                    <input type="checkbox" onclick="myFunction()" class="chk-box"> &nbsp; <b>Show Password</b>
                                                <br>
                                    <div class="form-group row" style="margin-bottom: 15px;">
                                        <div class="col-12">
                                          <button type="submit" class="btn btn-style">Submit</button>
                                        </div>
                                    </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Tab panes -->
            </div><!--/col-md-9-->
          </div> <!-- row end -->
        
    </div>  <!-- end bootstrap -->
</div>  <!-- Content End -->

<span id="user_full_name" style="display: none;">{{Auth::user()->name}}</span>
<style>
  small{
    width: 90%;
      text-align: left;
      margin-left: auto;
      margin-right: auto;
      display: block;
  }
  .loder-spinner{
    color: #E65100;
    font-size: 100px;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    z-index: 1;
    display: block;
    width: 100%;
    top: 22%;
  }
</style>
<script type="text/javascript" src="/jquery/jquery-3.2.1.min.js"></script>        
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
        $('#logoUpdateForm').submit();
        $('#userImage').hide();
        $('.newdp').show();
    });

    $(document).ready(function(){
         var userName = $('#user_full_name').text();
         var intials = userName.charAt(0);
         var profileImage = $('#userImage').text(intials);
         });

    // get World

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

        /// Change Password
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("password_confirmation");
            var z = document.getElementById("old_password");    
            if (x.type === "password",y.type === "password",z.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
            }
        }

/// ajax submit form
/// user profile logo update
$("#logoUpdateForm").on("submit", function(ev) {
  ev.preventDefault(); // Prevent browser default submit.

  var formData = new FormData(this);
    
  $.ajax({
    url: "/user-profile-logo-update",
    type: "POST",
    data: formData,
    beforeSend: function() {
        $("#loader_display").show();
        $('#loader_display').fadeIn(400).html('<i class="fa fa-spinner fa-spin loder-spinner" aria-hidden="true"></i>').fadeIn("slow");
    },
    success: function (data) {
        if (data['success']) {
            $("#loader_display").hide();
           toastr.success(data['success'],"Successfuly");
        } else if (data['error']) {
           toastr.error(data['error']);
           //window.location.href = '/login';
           if (data['error'].indexOf('Login') != -1) {
            window.location.href = '/login';
           }
        } else {
            alert('Whoops Something went wrong!!');
        }
        
    },
    error: function (data) {
        toastr.error(data.responseText,"error");
    },
    cache: false,
    contentType: false,
    processData: false
  });
    
});

///user data update
$("#userUpdateForm").on("submit", function(ev) {
  ev.preventDefault(); // Prevent browser default submit.

  var userFormData = new FormData(this);    
  $.ajax({
    url: "/user-profile-update",
    type: "POST",
    data: userFormData,
    success: function (data) {
        if (data['success']) {
           $('#new-email').html(data['data'].email);
           $('#new-mobile').html(data['data'].phone);
           $('#email').val('');
           $('#mobile').val('');
           toastr.success(data['success'],"Successfuly");
        } else if (data['error']) {
           toastr.error(data['error']);
           //window.location.href = '/login';
           if (data['error'].indexOf('Login') != -1) {
            window.location.href = '/login';
           }
        } else {
            alert('Whoops Something went wrong!!');
        }
        
    },
    error: function (data) {
        toastr.error(data.responseText,"error");
    },
    cache: false,
    contentType: false,
    processData: false
  });
    
});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

///user address update
$("#userAddressUpdateForm").on("submit", function(ev) {
  ev.preventDefault(); // Prevent browser default submit.

  var formData = new FormData(this);
    
  $.ajax({
    url: "/update-user-address",
    type: "POST",
    data: formData,
    success: function (data) {
        if (data['success']) {
           toastr.success(data['success'],"Successfuly");
        } else if (data['error']) {
           toastr.error(data['error']);
           //window.location.href = '/login';
           if (data['error'].indexOf('Login') != -1) {
            window.location.href = '/login';
           }
        } else {
            alert('Whoops Something went wrong!!');
        }
        
    },
    error: function (data) {
        toastr.error(data.responseText,"error");
    },
    cache: false,
    contentType: false,
    processData: false
  });
    
});

///user password update
$("#userPassUpdateForm").on("submit", function(ev) {
  ev.preventDefault(); // Prevent browser default submit.

  var formData = new FormData(this);
    
  $.ajax({
    url: "/user/change-password",
    type: "POST",
    data: formData,
    success: function (data) {
        if (data['success']) {
           toastr.success(data['success'],"Successfuly");
        } else if (data['error']) {
           toastr.error(data['error']);
           //window.location.href = '/login';
           if (data['error'].indexOf('Login') != -1) {
            window.location.href = '/login';
           }
        } else {
            alert('Whoops Something went wrong!!');
        }
        
    },
    error: function (data) {
        toastr.error(data.responseText,"error");
    },
    cache: false,
    contentType: false,
    processData: false
  });
    
});
</script>
@endsection
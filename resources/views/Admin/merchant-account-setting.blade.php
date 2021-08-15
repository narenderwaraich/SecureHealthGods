@extends('layouts.app')
@section('content')
  <section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
            <h1>Setting</h1>
        </section>
      <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/merchant/update/setting" method="post">
                        {{ csrf_field() }}
                      <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Update<span style="float: right;"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a></span></h3>
                            </div>

                            <div class="box-body">
                              <img src="/images/icon/admin.jpg" id="showUpLog" class="avatar profile-img-tag">
                              <button type="button" class="btn btn-dark btn-sm" id="selectImage"><i class="fa fa-camera img-change-btn-icon"></i>  Upload Logo</button>
                               <input type="file" name="logo" id="getFile" accept="image/*" class="form-control input-border" style="display: none;">

                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="label-title">Order <span style="font-size: 10px;">(On/Off)</span></div>
                                    <input type="checkbox" onchange="orderEnable()" @if($merchant->enable_order ==1) checked @endif data-toggle="toggle" data-onstyle="success">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="label-title">Resturent <span style="font-size: 10px;">(Online/Offline)</span></div>
                                    <input type="checkbox" name="is_online" @if($merchant->is_online ==1) checked @endif data-toggle="toggle" data-onstyle="info" data-width="85" data-on="Online" data-off="Offline">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="label-title">Payment <span style="font-size: 10px;">(Online/Cash)</span></div>
                                    <input type="checkbox" name="cash_only" @if($merchant->cash_only ==1) checked @endif data-toggle="toggle" data-onstyle="dark" data-width="85" data-on="Online" data-off="Cash">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Resturent Name</label>
                                    <input type="text" value="{{$merchant->listing_name}}" name="listing_name" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{$merchant->email}}" class="form-control">
                                    @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Mobile</label>
                                    <input name="phone_no" type="text" value="{{$merchant->phone_no}}" class="form-control" required>
                                    @if($errors->has('phone_no'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('phone_no') }}</strong>
                                      </span>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Display Menu Category</label>
                                    <select  name="display_menu_id" class="form-control">
                                        <option value="">--Select Menu--</option>
                                       @foreach($foodCategory as $category)
                                        <option value="{{ $category->id }}" @if(isset($merchant)){{$merchant->display_menu_id == $category->id ? "selected":"" }}@endif>{{$category->name}}</option>
                                       @endforeach
                                     </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Manager Id @if($merchant)<small>({{$merchant->manager_id ? 'alredy added if change enter new' : 'set your id'}})</small>@endif</label>
                                    <input type="text" name="manager_id" class="form-control">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>GST Number</label>
                                    <input type="text" value="{{$merchant ? $merchant->gstin_number : ''}}" name="gstin_number" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Tax Rate <small>(in Percentage)</small></label>
                                    <input name="tax_rate" type="text" value="{{$merchant ? $merchant->tax_rate : 0}}" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Ship Charge <small>(for order delivery)</small></label>
                                    <input name="ship_charge" type="number" value="{{$merchant ? $merchant->ship_charge : 0}}" class="form-control">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Country</label>
                                    <select  name="country" id="country" class="form-control" required>
                                      <option value="">Select Country</option>
                                     @foreach($country_data as $country)
                                      <option value="{{ $country->name }}" {{$merchant->country == $country->name ? "selected":"" }}>{{$country->name}}</option>
                                     @endforeach
                                   </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>State</label>
                                    <select name="state" id="state" class="form-control" required>
                                      <option value="">Select State</option>
                                      @foreach($state_data as $state)
                                        <option value="{{$state->name}}" {{$merchant->state == $state->name ? "selected":"" }}>{{$state->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>City</label>
                                    <select name="city" id="city" class="form-control" required>
                                      <option value="">Select City</option>
                                      @foreach($city_data as $city)
                                        <option value="{{$city->name}}" {{$merchant->city == $city->name ? "selected":"" }}>{{$city->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="number" name="zipcode" value="{{$merchant->zipcode}}" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" rows="4" cols="80" class="form-control" placeholder="Address" required>{{$merchant->address}}</textarea>
                                    
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" cols="80" class="form-control" placeholder="Description">{{$merchant->description}}</textarea>
                                    
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Invoice Terms</label>
                                    <textarea name="invoice_terms" rows="4" cols="80" class="form-control" placeholder="Invoice Terms">{{$merchant ? $merchant->invoice_terms : ''}}</textarea>
                                    
                                  </div>
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
</div> <!-- right panel div close -->

<style>
.label-title {
    padding: 3px 0px;
    font-size: 16px;
}
.card .toggle-group label {
    position: absolute;
    top: 0;
    left: 0;
    padding-right: unset;
    padding-left: unset;
    font-weight: unset;
    background: unset;
    -webkit-transform: unset;
    transform: unset;
    color: unset;
    cursor: unset;
    -webkit-transition: unset;
    transition: unset;
    transition: unset;
    transition: unset;
    -webkit-transform-origin: unset;
    transform-origin: unset;
    max-width: unset;
    white-space: unset;
    overflow: unset;
    text-overflow: unset;
    margin-bottom: unset;
}
.card .toggle-group .toggle-on {
    position: absolute !important;
    top: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
    right: 50% !important;
    margin: 0 !important;
    border: 0 !important;
    border-radius: 0 !important;
}
.card .toggle-group .toggle-off {
    position: absolute !important;
    top: 0 !important;
    bottom: 0 !important;
    left: 50% !important;
    right: 0 !important;
    margin: 0 !important;
    border: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
}

/*.toggle-group .btn-light {
    color: #fff;
    background-color: #dc3545;
}*/
.profile-img-tag{
    width: 150px;
    height: 150px;
    border-radius: 100%;
    display: block;
    margin: auto;
}
#selectImage{
    margin: 25px auto;
    text-align: center;
    display: block;
}
</style>

<script src="/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
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
                $("#state").append('<option value="">Select State</option>');
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

  function orderEnable(){
        $.ajax({
          type: "GET",
          url: '/admin/merchant/order/enable',
          dataType: 'json',
          success: function (data) {
              if (data['success']) {
                 toastr.success(data['success'],"Successfuly");
              } else if (data['error']) {
                 toastr.error(data['error']);
              } else {
                  alert('Whoops Something went wrong!!');
              }
          },
          error: function (data) {
              toastr.error(data.responseText,"error");
          }
          });
  }
</script>
@endsection
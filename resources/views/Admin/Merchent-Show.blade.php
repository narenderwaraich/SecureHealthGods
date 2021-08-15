@extends('layouts.app')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Merchents</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">List</h3>
                        </div>

                        <div class="box-body">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
                                  <i class="fa fa-refresh"></i> Refresh
                              </button>
                              <a href="/admin/merchant/1">
                                  <button type="button" class="btn btn-success btn-sm">Approved</button>
                              </a>
                              <a href="/admin/merchant/0">
                                  <button type="button" class="btn btn-danger btn-sm">Unapproved</button>
                              </a>
                              <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="sendButton">
                                  <i class="fa fa fa-envelope"></i> Send Mail
                              </a> -->
                              <a href="/admin/merchants" id="clearBtn" style="display: none;">
                                  <button type="button" class="btn btn-secondary btn-sm">Clear</button>
                              </a>
                          </div>
                        </div>

                        <div class="box-body">
                          <form action="/merchant/search" method="GET" id="SearchData" role="search"> 
                              <div class="input-group">
                                <input type="text" name="q" value="{{request('q')}}" id="search" class="form-control" placeholder="Search User by name, email, phone">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="submit" style="width: 80px;">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                              </div>
                          </form>
                          <div class="col-md-12 col-sm-12 result-status">
                            @if(isset($message))
                                 <p>{{ $message }}</p>
                            @endif
                          </div>


                            <table class="table table-hover on-mob-scroll-table-full">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><input type="checkbox" id="master"> Name</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merchant as $merchantData)
                                    <tr class="clickable-row" data-href='/user/{{$merchantData->id}}/view' style="cursor: pointer;">
                                        <td>{{ $merchantData->id }}</td>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$merchantData->id}}" email-id="{{ $merchantData->email }}">
                                          {{ $merchantData->listing_name }}</td>
                                        <td>{{ $merchantData->email }}</td>
                                        <td>{{ $merchantData->city }}</td>
                                        <td>@if($merchantData->is_approved == 1)
                                            <span class="user-active">Approved</span>
                                            @else
                                            <span class="user-deactive">Unapproved</span>
                                            @endif
                                            </td>
                                        <td>
                                        @if(!$merchantData->is_approved)
                                            <a href="/admin/merchant/approve/{{$merchantData->id}}" class="btn btn-success on-mob-table-btn">Approved</a>
                                        @else
                                            <a href="/admin/merchant/approve/{{$merchantData->id}}" class="btn btn-warning on-mob-table-btn">Unapproved</a>
                                        @endif
                                        <a onclick="return removeAlert();" href="/admin/merchant/delete/{{ $merchantData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $merchant->links() !!}

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

 <script type="text/javascript" src="/jquery/jquery-3.2.1.min.js"></script>
<script>

  jQuery(document).ready(function($) {
      $(".clickable-row").click(function(e) {
        
          window.location = $(this).data("href");
        
      });
  });

  /// hide search button
      if($('#search').val()!=""){
        $('#clearBtn').show();
      }

    $(document).ready(function () {

          // select all 
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);
         } else {  
            $(".sub_chk").prop('checked',false); 
         }  
        });
    });
</script>


@endsection
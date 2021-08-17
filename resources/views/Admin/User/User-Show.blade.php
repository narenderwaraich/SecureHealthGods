@extends('layouts.admin')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Users</h1>
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
                              <a href="/admin/user/1">
                                  <button type="button" class="btn btn-success btn-sm">Active</button>
                              </a>
                              <a href="/admin/user/0">
                                  <button type="button" class="btn btn-danger btn-sm">Deactive</button>
                              </a>
                              <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="sendButton">
                                  <i class="fa fa fa-envelope"></i> Send Mail
                              </a> -->
                              <a href="/admin/users" id="clearBtn" style="display: none;">
                                  <button type="button" class="btn btn-secondary btn-sm">Clear</button>
                              </a>
                          </div>
                        </div>

                        <div class="box-body">
                          <form action="/user/search" method="GET" id="SearchData" role="search"> 
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
                                    <th>Gender</th>
                                    <!-- <th>Google</th> -->
                                    <th>Profile</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $userData)
                                    <tr class="clickable-row" data-href='/user/{{$userData->id}}/view' style="cursor: pointer;">
                                        <td>{{ $userData->id }}</td>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$userData->id}}" email-id="{{ $userData->email }}">
                                          {{ $userData->name }}</td>
                                        <td>{{ $userData->email }}</td>
                                        <td>{{ $userData->gender }}</td>
                                        <!-- <td>{{ $userData->google_id }}</td> -->
                                        <td>
                                          @if($userData->avatar)
                                          <img src="{{asset('/images/user/'.$userData->avatar)}}" style="width: 100px;height: 100px;border-radius: 100%;border:2px solid #dc3545;">
                                          @endif
                                        </td>
                                        <td>@if($userData->is_activated == 1)
                                            <span class="user-active">Verified</span>
                                            @else
                                            <span class="user-deactive">Unverified</span>
                                            @endif
                                            </td>
                                        <td>{{ $userData->role }}</td>
                                        <td><!-- <a href="/admin/user/edit/{{ $userData->id }}" class="btn btn-secondary">Edit</a> -->
                                        @if($userData->is_activated == 0)
                                        <a href="/admin/user/verified/{{ $userData->id }}" class="btn btn-success  on-mob-table-btn">Verify</a>
                                        @endif
                                        @if($userData->suspend)
                                            <a href="/admin/user/suspend-user/{{$userData->id}}" class="btn btn-success on-mob-table-btn">Enable</a>
                                        @else
                                            <a href="/admin/user/suspend-user/{{$userData->id}}" class="btn btn-warning on-mob-table-btn">Disable</a>
                                        @endif
                                        <a onclick="return removeAlert();" href="/admin/user/delete/{{ $userData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $user->links() !!}

                            
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
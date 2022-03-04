@extends('layouts.master')
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
                                <a href="/user/create" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </a>
                               <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
<i class="fa fa-refresh"></i> Refresh</button>
<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="sendButton">
                                    <i class="fa fa fa-envelope"></i> Send Mail
                                </a>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row" v-if="loading">
                                <div class="col-xs-4 col-xs-offset-4">
                                    <div class="alert text-center">
                                        <i class="fa fa-spin fa-refresh"></i> Loading
                                    </div>
                                </div>
                            </div>


                            <table class="table table-hover on-mob-scroll-table-full">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><input type="checkbox" id="master"> Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $userData)
                                    <tr>
                                        <td>{{ $userData->id }}</td>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$userData->id}}" email-id="{{ $userData->email }}"> {{ $userData->name }}</td>
                                        <td>{{ $userData->email }}</td>
                                        <td>@if($userData->verified == 1)
                                            <span class="user-active">Verified</span>
                                            @else
                                            <span class="user-deactive">Unverified</span>
                                            @endif
                                            </td>
                                        <td>{{ $userData->role }}</td>
                                        <td><!-- <a href="/user/edit/{{ $userData->id }}" class="btn btn-secondary">Edit</a> -->
                                        @if($userData->verified == 0)
                                        <a href="/user/verified/{{ $userData->id }}" class="btn btn-success  on-mob-table-btn">Verify</a>
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


<!--Send Mail Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <div class="modal-title-text">
                                              Send Invoice
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- <img src="/images/loader.gif" id="loading" style="height: 65px;"> -->
                                            <form  id="MailData" method="post">
                                                {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="title">Subject</label>
                                                <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Message</label>
                                                <textarea name="message" rows="5" placeholder="Message" class="form-control" required></textarea>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            
                                            <center><button type="submit" id="send-mail-btn" class="btn modal-btn">
                                              <span id="send-btn">Send</span>
                                              <span id="mail-button-sending" style="display:none;">Sending…</span>
                                              </button></center>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

 <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>
<script>
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


                    /// mail send model
                            $("form#MailData").submit(function(e) {
                              e.preventDefault();    
                              var formData = new FormData(this);
                              $.ajax({
                                  url: '/send-notificaton-mail',
                                  type: 'POST',
                                  data: formData,
                                  beforeSend: function() {
                                      $('#send-btn').hide();
                                      $('#mail-button-sending').show();
                                      $("#send-mail-btn").attr("disabled", "disabled");
                                  },
                                  success: function (data) {
                                     if (data['success']) {
                                      $('#loading').hide();
                                      toastr.success("Mail Sent successfully","Mail");
                                      $('#myModal').hide();
                                      $(".modal .close").click();
                                          location.reload();
                                          //$('.msgMail').append(data .msg);
                                          // $('#hidediv').show();
                            } else if (data['error']) {
                                toastr.error("Sorry","Mail");
                                $('#myModal').hide();
                                $(".modal .close").click();
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        },
                                  cache: false,
                                  contentType: false,
                                  processData: false
                              });
                          });

</script>


@endsection
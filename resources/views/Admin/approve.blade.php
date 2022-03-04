@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Youtube Subscriber</h1>
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
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Channel Name</th>
                                    <th>Channel Id</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvel as $approvelData)
                                    <tr>
                                        <td>{{ $approvelData->id }}</td>
                                        <td>{{ $approvelData->channelName }}</td>
                                        <td>{{ $approvelData->channelId }}</td>
                                        <td><img src="{{asset('/public/images/screen_shot/'.$approvelData->screen_shot)}}" alt="{{ Auth::user()->name }}" class="dp-show"></td>
                                        <td>{{ $approvelData->status }}</td>
                                        <td>
                                        @if($approvelData->status == "Pending")
                                            <a href="/admin/subscribe/approve/{{ $approvelData->channelId }}/{{ $approvelData->id }}" class="btn btn-success">Confirm</a>
                                        @endif
                                        <a onclick="return removeAlert();" href="/admin/subscriber-plan/delete/{{ $approvelData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $approvel->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
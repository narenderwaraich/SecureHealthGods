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
                            <table class="table table-hover scroll-table-full">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name/Email</th>
                                    <th>Phone</th>
                                    <th>Channel</th>
                                    <th>Channel Id</th>
                                    <th>Subscriber</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($youtubes as $youtubesData)
                                    <tr>
                                        <td>{{ $youtubesData->id }}</td>
                                        <td>{{ $youtubesData->name }}
                                            <br>
                                            {{ $youtubesData->email }}
                                        </td>
                                        <td>{{ $youtubesData->phone_no }}</td>
                                        <td>{{ $youtubesData->channel_name }}</td>
                                        <td>{{ $youtubesData->channel_id }}</td>
                                        <td>{{ $youtubesData->subscribers }}</td>
                                        <td>{{ $youtubesData->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/admin/subscriber-plan/edit/{{ $youtubesData->id }}" class="btn btn-primary">Edit</a>
                                                @if($youtubesData->status == 'Deactivate')
                                                <a href="/admin/subscriber-plan/activate/{{ $youtubesData->id }}" class="btn btn-success">Activate</a>
                                                @else
                                                <a href="/admin/subscriber-plan/deactivate/{{ $youtubesData->id }}" class="btn btn-warning">Deactivate</a>
                                                @endif
                                                <a onclick="return removeAlert();" href="/admin/subscriber-plan/delete/{{ $youtubesData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $youtubes->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
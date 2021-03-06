@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Page Setup</h1>
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
                               <a href="/admin/banner/add" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </a>
                                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
<i class="fa fa-refresh"></i> Refresh</button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Page</th>
                                    <th>Heading</th>
                                    <th>Banner</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach ($banner as $bannerData)
                                    <tr>
                                        <td>{{ $bannerData->id }}</td>
                                        <td>{{ $bannerData->page_name }}</td>
                                        <td>{{ $bannerData->heading }}</td>
                                        <td><img src="/public/images/banner/{{ $bannerData->image }}" class="bannerShowImg"></td>
                                       <td><a href="/admin/banner/edit/{{ $bannerData->id }}" class="btn btn-secondary">Edit</a>
                                        <a onclick="return removeAlert();" href="/admin/banner/delete/{{ $bannerData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $banner->links() !!}

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
<style scoped>
    .bannerShowImg{
        height: 100px;
        width:  auto;
    }
</style>
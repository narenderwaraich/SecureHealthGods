@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Question</h1>
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
                                <a href="/admin/question/add" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </a>
                                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
                                    <i class="fa fa-refresh"></i> Refresh
                                </button>
                            </div>
                            <span style="float: right;">
                                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a>
                            </span>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $questionData)
                                    <tr>
                                        <td>{{ $questionData->question_number }}</td>
                                        <td>{{ $questionData->category }}</td>
                                        <td>{{ $questionData->type }}</td>
                                        <td><a href="/admin/question/edit/{{ $questionData->id }}" class="btn btn-secondary">Edit</a>
                                        <a onclick="return removeAlert();" href="/admin/question/delete/{{ $questionData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $questions->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
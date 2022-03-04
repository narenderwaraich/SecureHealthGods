@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Subscriber Plans</h1>
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
                                <a href="/admin/subscriber-plan/add" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </a>
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
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Subscriber</th>
                                    <th>Day</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriberPlan as $subscriberPlanData)
                                    <tr>
                                        <td>{{ $subscriberPlanData->id }}</td>
                                        <td>{{ $subscriberPlanData->name }}</td>
                                        <td>{{ $subscriberPlanData->price }}</td>
                                        <td>{{ $subscriberPlanData->subscriber }}</td>
                                        <td>{{ $subscriberPlanData->day }}</td>
                                        <td><a href="/admin/subscriber-plan/edit/{{ $subscriberPlanData->id }}" class="btn btn-secondary">Edit</a>
                                        <a onclick="return removeAlert();" href="/admin/subscriber-plan/delete/{{ $subscriberPlanData->id }}" class="btn btn-danger on-mob-table-btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $subscriberPlan->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@extends('layouts.app')
@section('content')
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Food Type</h1>
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
                                <a href="/admin/food-type/create" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </a>
                                <button type="button" class="btn btn-default btn-sm">
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
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($foodTypes as $foodType)
                                    <tr>
                                        <td>{{ $foodType->id }}</td>
                                        <td>{{ $foodType->name }}</td>
                                        <td><a href="/admin/food-type/edit/{{$foodType->id}}" class="btn btn-secondary">Edit</a>
                                        <a href="/admin/food-type/delete/{{$foodType->id}}"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $foodTypes->links() !!}

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div> <!-- right panel div close -->
@endsection
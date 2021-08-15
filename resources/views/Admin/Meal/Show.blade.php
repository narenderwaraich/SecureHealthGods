@extends('layouts.app')
@section('content')
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Meals</h1>
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
                                <a href="/admin/meal/create" class="btn btn-success btn-sm">
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Food Type</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th class="desc-column">Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($meals as $meal)
                                    <tr>
                                        <td>{{ $meal->id }}</td>
                                        <td><img src="{{asset('/images/meals/'.$meal->image)}}" style="width: 100px;height: 100px;border:2px solid #dc3545;"></td>
                                        <td>{{ $meal->item_name }}</td>
                                        <td>{{ $meal->food_type }}</td>
                                        <td>{{ $meal->price }}</td>
                                        <td>{{ $meal->sale }}</td>
                                        <td class="desc-column">{{ $meal->item_description }}</td>
                                        <td><a href="/admin/meal/edit/{{ $meal->id }}" class="btn btn-secondary">Edit</a>
                                        @if($meal->enable_order)
                                            <a href="/admin/meal/enable-order/{{$meal->id}}" class="btn btn-warning on-mob-table-btn">Disable</a>
                                        @else
                                            <a href="/admin/meal/enable-order/{{$meal->id}}" class="btn btn-success on-mob-table-btn">Enable</a>
                                        @endif   
                                        <a href="/admin/meal/delete/{{ $meal->id }}"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $meals->links() !!}
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div> <!-- right panel div close -->
@endsection
<style>
.desc-column{
    width: 200px;
}
</style>
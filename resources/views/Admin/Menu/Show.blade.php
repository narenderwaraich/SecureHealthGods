@extends('layouts.app')
@section('content')
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>menus</h1>
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
                                <a href="/admin/menu/create" class="btn btn-success btn-sm">
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
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th class="desc-column">Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->id }}</td>
                                        <td>{{ $menu->item_name }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>{{ $menu->sale }}</td>
                                        <td>{{ $menu->food_type }}</td>
                                        <td>{{ $menu->food_category }}</td>
                                        <td class="desc-column">{{ $menu->item_description }}</td>
                                        <td><a href="/admin/menu/edit/{{ $menu->id }}" class="btn btn-secondary">Edit</a>
                                        @if($menu->enable_order)
                                            <a href="/admin/menu/enable-order/{{$menu->id}}" class="btn btn-warning on-mob-table-btn">Disable</a>
                                        @else
                                            <a href="/admin/menu/enable-order/{{$menu->id}}" class="btn btn-success on-mob-table-btn">Enable</a>
                                        @endif   
                                        <a href="/admin/menu/delete/{{ $menu->id }}"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $menus->links() !!}
                            
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
@extends('layouts.master')
@section('content')

<section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
        <h1>Subscriber Plan</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/subscriber-plan/add" method="post">
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create <span style="float: right;">
                                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
                                    <span class="fa fa-chevron-left"></span> Back
                                </button></a></span>
                            </h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Price</label>
                                <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Enter Price" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Subscriber</label>
                                <input type="text" class="form-control{{ $errors->has('subscriber') ? ' is-invalid' : '' }}" name="subscriber" placeholder="Enter Subscriber" value="{{ old('subscriber') }}">
                                @if ($errors->has('subscriber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subscriber') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Day</label>
                                <input type="text" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day" placeholder="Enter Day" value="{{ old('day') }}">
                                @if ($errors->has('day'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('day') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
@endsection
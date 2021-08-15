@extends('layouts.app')
@section('content')

<section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
        <h1>Plan</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="/resturent/plan/create" method="post">
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('plan_name') ? ' is-invalid' : '' }}" id="name" name="plan_name" placeholder="Enter Name" value="{{ old('plan_name') }}">
                                @if ($errors->has('plan_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('plan_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" placeholder="Enter Amount" id="amount" value="{{ old('amount') }}">
                                @if ($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="time_session">Session</label>
                                <select class="form-control" name="time_session"  id="time_session">
                                    <option value="Order">Order</option>
                                    <option value="Time">Time</option>
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="valid_time">Valid Time</label>
                                <input type="number" class="form-control{{ $errors->has('valid_time') ? ' is-invalid' : '' }}" name="valid_time" placeholder="Enter Valid Day" id="valid_time" value="{{ old('valid_time') }}">
                                @if ($errors->has('valid_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('valid_time') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" id="title"  rows="5" placeholder="Description" class="form-control"></textarea>
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
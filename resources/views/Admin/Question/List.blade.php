@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Choose View</h1>
        </section>

        <section class="content" style="margin-top: 30px;">
            <div class="row">
                @foreach ($category as $link)
                <div class="col-md-4">
                    <a href="/admin/question/show/{{$link->name}}" class="list-view-link">
                        <div class="view-box">
                            {{$link->name}}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
@endsection
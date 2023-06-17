@extends('components.admin.admin')

@section('title')
    Dashboard
@endsection

@section('page')
    Kesehatan Apps | Dashboard
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.card')
                @slot('header')
                    Dashboard
                @endslot

                @slot('body')
                Hi, Selamat Datang!
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

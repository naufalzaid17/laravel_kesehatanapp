@extends('components.admin.admin')

@section('title')
    Article Management
@endsection

@section('title_card')
    Data Article
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items">Article</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            @component('components.card')
                @slot('header')
                    Article Data
                @endslot

                @slot('body')
                    <div class="col">
                        <div class="table">
                            <table id="example2" class="table table-bordered table-hover">
                                @if (session('success'))
                                    @component('components.alert')
                                        @slot('type')
                                            success
                                        @endslot
                                        @slot('slot')
                                            {!! session('success') !!}
                                        @endslot
                                    @endcomponent
                                @endif
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($article as $item)
                                        <tr>
                                            <td>
                                                @if (!empty($item->photo))
                                                <img src="{{ asset('images/' . $item->photo)}}" alt="{{$item->title}}" width="120px" height="80px">
                                                @else
                                                <img src="https://via.placeholder.com/120x80" alt="{{$item->title}}">
                                                @endif
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! $item->content !!}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('article.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('article.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"> Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-2">
            <div class="card">

                <div class="card-header">
                    <div class="card-title">Create Article</div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <a href="{{ route('article.create')}}" class="btn btn-primary">Create Article</a>
                </div>
            </div>
        </div>
    </div>
@endsection

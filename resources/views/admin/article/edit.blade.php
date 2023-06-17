@extends('components.admin.admin')

@section('title')
    Article Management
@endsection

@section('page')
    Kesehatan Apps | Article | Edit
@endsection


@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('article.index') }}">Article</a>/</li>
    <li class="breadcrumb-items active">Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Data Article</div>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Title Article</label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Title Article" value="{{ $article->title }}">
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Photo Article</label>
                            <input type="file" name="photo"
                                class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Photo Article">
                                <p class="text-dark">pilih foto baru untuk diganti, <b>*kosongkan jika tidak ingin ubah</b></p>
                            @if (!empty($article->photo))
                                <img src="{{ asset('images/' . $article->photo) }}" alt="{{ $article->title }}"
                                    class="rounded mx-auto d-block" width="400px" height="200px">
                                <hr>
                            @endif
                            <p class="text-danger">{{ $errors->first('photo') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Content Article</label>
                            <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="summernote">{{$article->content}}</textarea>
                            <p class="text-danger">{{ $errors->first('content') }}</p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

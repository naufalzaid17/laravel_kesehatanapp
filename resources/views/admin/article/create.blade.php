@extends('components.admin.admin')

@section('title')
    Article Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('article.index') }}">Article</a>/</li>
    <li class="breadcrumb-items active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('article.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if (session('error'))
                @component('components.alert')
                    @slot('type')
                        danger
                    @endslot
                    @slot('slot')
                        {!! session('error') !!}
                    @endslot
                @endcomponent
            @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Data Article</div>

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
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Title Article">
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Photo Article</label>
                            <input type="file" name="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Photo Article">
                            <p class="text-danger">{{ $errors->first('photo') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Content Article</label>
                            <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="summernote"></textarea>
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

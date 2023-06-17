@extends('components.admin.admin')

@section('title')
    Apotek Management
@endsection

@section('page')
    Kesehatan Apps | Apotek | Edit
@endsection


@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('apotek.index') }}">Apotek</a>/</li>
    <li class="breadcrumb-items active">Edit</li>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">

            @component('components.card')
                @slot('header')
                    Edit Data Apotek
                @endslot

                @slot('body')
                    <form action="{{ route('apotek.update', $apotek->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Apotek</label>
                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                value="{{ $apotek->nama }}" placeholder="Masukan Nama Apotek">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Apotek</label>
                            <textarea name="alamat" id="" cols="5" rows="5"
                                class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Masukan Alamat">{{ $apotek->alamat }}</textarea>
                            <p class="text-danger">{{ $errors->first('alamat') }}</p>
                        </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </form>
            @endslot
        @endcomponent
    </div>
    </div>
@endsection

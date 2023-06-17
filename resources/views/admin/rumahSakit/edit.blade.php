@extends('components.admin.admin')

@section('title')
    Rumah Sakit Management
@endsection

@section('page')
    Kesehatan Apps | Rumah Sakit | Edit
@endsection


@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('rumahsakit.index') }}">Rumah Sakit</a>/</li>
    <li class="breadcrumb-items active">Edit</li>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">

            @component('components.card')
                @slot('header')
                    Edit Data Rumah Sakit
                @endslot

                @slot('body')
                    <form action="{{ route('rumahsakit.update', $rumahSakit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Rumah Sakit</label>
                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                value="{{ $rumahSakit->nama }}" placeholder="Masukan Nama Rumah Sakit">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Rumah Sakit</label>
                            <textarea name="alamat" id="" cols="5" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"  placeholder="Masukan Alamat">{{ $rumahSakit->alamat}}</textarea>
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

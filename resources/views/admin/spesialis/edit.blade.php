@extends('components.admin.admin')

@section('title')
    Spesialis Management
@endsection

@section('page')
    Kesehatan Apps | Spesialis | Edit
@endsection


@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('spesialis.index') }}">Spesialis</a>/</li>
    <li class="breadcrumb-items active">Edit</li>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">

            @component('components.card')
                @slot('header')
                    Edit Data Spesialis
                @endslot

                @slot('body')
                    <form action="{{ route('spesialis.update', $spesialis->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Spesialis</label>
                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                value="{{ $spesialis->nama }}" placeholder="Masukan Nama Spesialis">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </form>
            @endslot
            @slot('footer')
            @endslot
        @endcomponent
    </div>
    </div>
@endsection

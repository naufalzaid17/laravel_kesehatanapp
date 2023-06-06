@extends('components.admin.admin')

@section('title')
    Rumah Sakit Management
@endsection

@section('title_card')
    Data Rumah Sakit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items">Rumah Sakit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            @component('components.card')
                @slot('header')
                    Rumah Sakit Data
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
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($rumahSakit as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('rumahsakit.edit', $item->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('rumahsakit.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center"> Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-4">

            <form action="{{ route('rumahsakit.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Data Rumah Sakit</div>

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
                            <label for="">Nama Rumah Sakit</label>
                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Nama Rumah Sakit">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Rumah Sakit</label>
                            <textarea name="alamat" id="" cols="5" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Masukan Alamat"></textarea>
                            <p class="text-danger">{{ $errors->first('alamat') }}</p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

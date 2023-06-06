@extends('components.admin.admin')

@section('title')
    Spesialis Management
@endsection

@section('title_card')
    Data Spesialis
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items">Spesialis</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Spesialis Management</h3>

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
                    <div class="col">
                        <div class="table">
                            <table id="example2" class="table table-bordered table-hover">
                                @if(session('success'))
                                    @component('components.alert')
                                        @slot('type') success  @endslot
                                            @slot('slot')
                                            {!! session('success') !!}
                                            @endslot
                                    @endcomponent
                                @endif
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse ($spesialis as $item)
                                    <tr>
                                        <td>{{ $item->nama}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('spesialis.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                                <form action="{{route('spesialis.destroy', $item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data.</td>
                                </tr>
                                @endforelse


                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-4">

            <form action="{{ route('spesialis.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Data Spesialis</div>

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
                            <label for="">Spesialis</label>
                            <input type="text" name="nama" class="form-control {{$errors->has('nama') ? 'is-invalid':''}}" placeholder="Masukan Nama Spesialis">
                            <p class="text-danger">{{ $errors->first('nama')}}</p>
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

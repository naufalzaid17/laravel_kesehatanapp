@extends('components.admin.admin')

@section('title')
    User Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('users.index') }}">User</a>/</li>
    <li class="breadcrumb-items active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.store') }}" method="post">
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
                        <div class="card-title">Create Data User</div>

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
                            <label for="">Nama User</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                placeholder="Masukan name User">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email User</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Masukan email User">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password User</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Masukan password User">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Role User</label>
                            <select name="role" id="selectRole"
                                class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" required>
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($role as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('role') }}</p>
                        </div>
                        <div class="form-group" id="no_telepon">
                            <label for="">Nomor Telepon</label>
                            <input type="number" name="no_telepon"
                                class="form-control {{ $errors->has('no_telepon') ? 'is-invalid' : '' }}"
                                placeholder="Masukan Nomor Telepon Dokter">
                            <p class="text-danger">{{ $errors->first('no_telepon') }}</p>
                        </div>
                        <div class="form-group" id="spesialis">
                            <label for="">Pilih Spesialis</label>
                            <select name="spesialis_id"
                                class="form-control {{ $errors->has('spesialis_id') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($spesialis as $item)
                                    <option value="{{ $item->id }}">{{ ucfirst($item->nama) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('spesialis_id') }}</p>
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

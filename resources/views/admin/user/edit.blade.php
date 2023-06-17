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

            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
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
                                placeholder="Masukan name User" value="{{ $user->name}}">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email User</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Masukan email User" value="{{ $user->email}}">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password User</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Masukan password User">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            <p class="text-dark"><b>*</b>biarkan kosong, jika password tidak ingin diubah.</p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

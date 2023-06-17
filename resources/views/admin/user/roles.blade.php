@extends('components.admin.admin')

@section('title')
    User Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items"><a href="{{ route('users.index') }}">User</a>/</li>
    <li class="breadcrumb-items active">Set Role</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.set_role', $user->id) }}" method="post">
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
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center justify-content-center">Nama</th>
                                    <td class="text-center justify-content-center">:</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th class="text-center justify-content-center">Email</th>
                                    <td class="text-center justify-content-center">:</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th class="text-center justify-content-center">Role</th>
                                    <td class="text-center justify-content-center">:</td>
                                    <td>
                                            <select name="role" id="selectRole"
                                                class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" required>
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach ($roles as $row)
                                                    <option value="{{ $row }}">{{ $row }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('role') }}</p>
                                    </td>
                                </tr>
                            </thead>
                        </table>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

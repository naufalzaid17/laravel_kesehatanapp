@extends('components.admin.admin')

@section('title')
    User Management
@endsection

@section('title_card')
    Data User
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items">User</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            @component('components.card')
                @slot('header')
                    User Data
                @endslot

                @slot('body')
                    <div class="col">
                        <div class="table">
                            <table id="tables" class="table table-bordered table-hover">
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
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($user as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @foreach ($item->getRoleNames() as $role)
                                                    <label for="" class="badge badge-info">{{ $role}}</label>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($item->status)
                                                    <label for="" class="badge badge-success">Active</label>
                                                @else
                                                    <label for="" class="badge badge-default"></label>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('users.roles', $item->id) }}" class="btn btn-info">Set Roles</a>
                                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"> Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-2">
            <div class="card">

                <div class="card-header">
                    <div class="card-title">Create User</div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <a href="{{ route('users.create')}}" class="btn btn-primary">Create User</a>
                </div>
            </div>
        </div>
    </div>
@endsection

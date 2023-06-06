@extends('components.admin.admin')

@section('title')
    Role Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-items">Role</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">role Management</h3>

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
                                        <th>Role</th>
                                        <th>Guard</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse ($role as $item)
                                    <tr>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $item->guard_name}}</td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>
                                            <form action="{{route('role.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
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

            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Data role</div>

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
                            <label for="">role</label>
                            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid':''}}" placeholder="Masukan name role">
                            <p class="text-danger">{{ $errors->first('name')}}</p>
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

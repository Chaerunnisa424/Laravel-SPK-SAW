@extends('layouts.main')

@section('title', 'Data User ')

@section('content')
    @if (Session::has('status'))
        <script>
            toastr.success("{{ Session::get('status') }}");
        </script>
    @endif
    @if (Session::has('delete'))
        <script>
            toastr.success("{{ Session::get('delete') }}");
        </script>
    @endif
    {{-- header tabel --}}
    <div class="animated fadeIn">
        <di class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong> Daftar User</strong>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('user/create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                {{-- isi tabel --}}
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td> {{ $item->role }} </td>
                                    <td>
                                        <a href="{{ url('user/' . $item->id) }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ url('user/' . $item->id) }}" method="post" value="delete"
                                            class="d-lg-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm confirm_delete">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

@extends('layouts.main')

@section('title', 'Data Sub ')

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
                        <strong> Daftar Sub</strong>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('sub/create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                        <a href="{{ url('kriteria') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-undo"></i> back
                        </a>
                    </div>
                </div>
                {{-- isi tabel --}}
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode kriteria</th>
                                <th>Penjelasan</th>
                                <th>Nilai Awal</th>
                                <th>Nilai Akhir</th>
                                <th>bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showsub as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_id }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>{{ $item->nilaiawal }}</td>
                                    <td>{{ $item->nilaiakhir }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <a href="{{ url('sub/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ url('sub/' . $item->id) }}" method="post" value="delete"
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

@extends('layouts.main')

@section('title', 'Data Kriteria ')

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
                        <strong> Daftar Kriteria</strong>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('kriteria/create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                {{-- isi tabel --}}
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Kriteria</th>
                                <th>Atribut</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->namakriteria }}</td>
                                    <td>{{ $item->atribut }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <a href="{{ url('sub/' . $item->kode) }}" class="btn btn-success btn-sm">
                                            Sub
                                        </a>
                                        <a href="{{ url('kriteria/' . $item->kode) }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ url('kriteria/' . $item->kode) }}" method="post" value="delete"
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

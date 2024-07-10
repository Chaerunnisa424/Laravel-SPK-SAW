@extends('layouts.main')

@section('title', 'Proses SPK ')

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
                        <strong> RATING KECOCOKAN</strong>
                    </div>
                </div>
                {{-- isi tabel --}}
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kost</th>
                                <th>Jarak</th>
                                <th>Transportasi</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Rasio</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($header as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach ($detail as $data)
                                        @if ($item->id_alternatif == $data->id_alternatif)
                                            <td>{{ $data->nama }}</td>
                                        @break;
                                    @endif
                                @endforeach
                                @foreach ($detail as $data)
                                    @if ($item->id_alternatif == $data->id_alternatif)
                                        <td>{{ $data->bobot }}</td>
                                    @endif
                                @endforeach

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="animated fadeIn">
    <di class="content mt-3">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong> NORMALISASI MATRIK</strong>
                </div>
            </div>
            {{-- isi tabel --}}
            <div class="card-body table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kost</th>
                            <th>Jarak</th>
                            <th>Transportasi</th>
                            <th>Fasilitas</th>
                            <th>Harga</th>
                            <th>Rasio</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($headermatrik as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach ($detailmatrik as $data)
                                    @if ($item->id_alternatif == $data->id_alternatif)
                                        <td>{{ $data->nama }}</td>
                                    @break;
                                @endif
                            @endforeach
                            @foreach ($detailmatrik as $data)
                                @if ($item->id_alternatif == $data->id_alternatif)
                                    <td>{{ $data->bobot }}</td>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="animated fadeIn">
<di class="content mt-3">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong> NILAI PREFERENSI #1</strong>
            </div>
        </div>
        {{-- isi tabel --}}
        <div class="card-body table-responsive">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                            <th>Kost</th>
                            <th>Jarak</th>
                            <th>Transportasi</th>
                            <th>Fasilitas</th>
                            <th>Harga</th>
                            <th>Rasio</th>
                            <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headerreferensi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($detailreferensi as $data)
                                @if ($item->id_alternatif == $data->id_alternatif)
                                    <td>{{ $data->nama }}</td>
                                @break;
                            @endif
                        @endforeach
                        @foreach ($detailreferensi as $data)
                            @if ($item->id_alternatif == $data->id_alternatif)
                                <td>{{ $data->bobot }}</td>
                            @endif
                        @endforeach

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="animated fadeIn">
<di class="content mt-3">
<div class="card">
    <div class="card-header">
        <div class="pull-left">
            <strong> NILAI PREFERENSI #2</strong>
        </div>
    </div>
    {{-- isi tabel --}}
    <div class="card-body table-responsive">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($headerreferensi2 as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->bobot }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="animated fadeIn">
    <di class="content mt-3">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong> PRANKINGAN</strong>
            </div>
        </div>
        {{-- isi tabel --}}
        <div class="card-body table-responsive">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Total</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headerranking as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->bobot }}</td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

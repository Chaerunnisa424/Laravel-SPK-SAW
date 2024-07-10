@extends('layouts.main')

@section('title', 'Edit Penilaian')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Edit Penilaian</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('penilaian') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <form action="{{ url('penilaian') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="idnilai" id="idnilai">
                                        <label for="select" class="form-control-label">Nama Kost</label>
                                        <select name="id_alternatif" id="name" class="form-control" autofocus>
                                            <option value="">---Pilih---</option>
                                            @foreach ($alternatif as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                @foreach ($kriteria as $item)
                                                    <th>{{ $item->kode }}-{{ $item->namakriteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($kriteria as $item)
                                                    @foreach ($sub as $itemx)
                                                        @if ($item->kode == $itemx->kode_id)
                                                            @if (is_numeric($itemx->nilaiawal))
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="sub[]" id="{{ $itemx->kode_id }}">
                                                                    <input type="hidden" class="form-control"
                                                                        name="idkriteria[]" value="{{ $itemx->kode_id }}">
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <select name="sub[]" id="{{ $itemx->kode_id }}"
                                                                        class="form-control">
                                                                        @foreach ($sub as $itemv)
                                                                            @if ($item->kode == $itemv->kode_id)
                                                                                <option value="{{ $itemv->nilaiawal }}">
                                                                                    {{ $itemv->nilaiawal }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="hidden" class="form-control"
                                                                        name="idkriteria[]" value="{{ $itemx->kode_id }}">
                                                                </td>
                                                            @endif
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var data = <?php echo json_encode($data); ?>;
        if (data.length > 0) {
            data.forEach(element => {
                $("#" + element.id_kriteria).val(element.nilai);
                $("#idnilai").val(element.id);
                $("#name").val(element.id_alternatif);
            });
        }
    </script>
@endsection

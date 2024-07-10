@extends('layouts.main')

@section('title', 'Edit Kriteria ')


@section('content')
    <di class="content mt-3">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Edit Kriteria</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('kriteria') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-undo"></i> back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class"col-md-4 offset-md-4">
                                <form action="{{ url('kriteria/' . $ubahkriteria->kode) }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label>Kode Kriteria</label>
                                        <input type="text" name="kode"
                                            class="form-control @error('kode') is-invalid @enderror"
                                            value="{{ old('kode ', $ubahkriteria->kode) }}" autofocus>
                                        @error('kode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label>Nama Kriteria</label>
                                        <input type="text" name="namakriteria"
                                            class="form-control @error('namakriteria') is-invalid @enderror"
                                            value="{{ old('namakriteria', $ubahkriteria->namakriteria) }}" autofocus>
                                        @error('namakriteria')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div>
                                                    <label for="select" class=" form-control-label ">Atribut</label>
                                                    <select name="atribut" class="form-control" autofocus>
                                                        <option selected>{{ $ubahkriteria->atribut }}</option>
                                                        <option value="Benefit">Benefit</option>
                                                        <option value="Cost">Cost</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class=" form-control-label">Bobot</label>
                                            <input type="text" name="bobot"
                                                class="form-control @error('bobot') is-invalid @enderror"
                                                value="{{ old('bobot', $ubahkriteria->bobot) }}" autofocus>
                                            @error('bobot')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-success"> Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    @endsection

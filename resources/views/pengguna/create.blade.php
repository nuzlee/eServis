@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | create')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form role="form" method="POST" action="{{ route('.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputNama" name="Nama" type="text" placeholder="Nama" />
                        <label for="inputNama">Nama Penuh</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputIC" name="IC" type="text" placeholder="IC" />
                        <label for="inputIC">Nombor Kad Pengenalan</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select"id="floatingSelectGrid" name="Kenderaan">
                            {{-- name mesti = store controller --}}
                            <option selected>Sila Pilih Kenderaan</option>
                            @foreach ($kenderaan as $data)
                                <option value="{{ $data->id }}">
                                    {{-- view pada form --}}
                                    {{ $data->jenis }} > {{ $data->jenama }} {{ $data->model }}
                                </option>
                            @endforeach
                        </select>
                        <label for="inputKenderaan">Kenderaan</label>
                    </div>
                </div>
            </div>



            <!-- ------Butang Submit------ -->

            <div class="card-footer">
                <a class="btn btn-sm btn-secondary" type="button" href="{{ route('pemandu.index') }}">Batal</a>
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>

        </form>
    </div>

@endsection

@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | create')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Kenderaan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> </li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>

        @endif

        <form role="form" method="POST" action="{{ route('kenderaan.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="input
                        Jenis" name="Jenis" type="text"
                            placeholder="Jenis" />
                        <label for="inputJenis">Jenis Kenderaan</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputJenama" name="Jenama" type="text" placeholder="Jenama" />
                        <label for="inputJenama">Jenama Kenderaan</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputModel" name="Model" type="text" placeholder="Model" />
                        <label for="inputModel">Model Kenderaan</label>
                    </div>
                </div>
            </div>



            <!-- Butang Submit -->

            <div class="card-footer">
                <a class="btn btn-sm btn-secondary" type="button" href="{{ route('kenderaan.index') }}">Batal</a>

                <button class="btn" type="submit"
                    onclick="return confirm('{{ __('Anda Pasti Untuk Padam Rekod Ini?') }}')">
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>

        </form>

    </div>


@endsection

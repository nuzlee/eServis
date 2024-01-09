@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | edit')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kenderaan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>

        @endif

        <form role="form" method="POST" action="{{ route('kenderaan.update', $kenderaan->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="input
                        Jenis" name="Jenis" type="text"
                            placeholder="Jenis" value="{{ $kenderaan->jenis }}" />
                        <label for="inputJenis">Jenis Kenderaan</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputJenama" name="Jenama" type="text" placeholder="Jenama"
                            value="{{ $kenderaan->jenama }}" />
                        <label for="inputJenama">Jenama Kenderaan</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputModel" name="Model" type="text" placeholder="Model"
                            value="{{ $kenderaan->model }}" />
                        <label for="inputModel">Model Kenderaan</label>
                    </div>
                </div>
            </div>

            <!--Button Submit-->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>


@endsection

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

        <form id="kenderaanForm" role="form" method="POST" action="{{ route('kenderaan.store') }}"
            enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputJenis" name="Jenis" type="text" placeholder="Jenis" />
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
                <button class="btn btn-sm btn-primary" type="button" id="submitBtn">Simpan</button>
            </div>

        </form>

    </div>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            Swal.fire({
                text: "Anda pasti untuk simpan rekod ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form using JavaScript
                    document.getElementById('kenderaanForm').submit();
                }
            });
        });
    </script>
@endsection

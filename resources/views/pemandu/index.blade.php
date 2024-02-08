@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | index')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Senarai Pemandu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> </li>
        </ol>

        <div class="container-fluid px-0">
            {{-- creating a container that spans the full width of the viewport.
        The px-4 class adds horizontal padding to the container, maintaining a consistent spacing from the edges of the viewport. --}}


            {{-- mb = margin bottom, mt = margin top --}}
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <i class="fa-solid fa-user fa-fade"></i>
                        <!--This class is used to display a table icon from the Font Awesome icon library with some spacing applied
                                        using the "me-1" class -->

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-primary me-md-2" type="button" href="{{ route('pemandu.create') }}">Daftar
                                Baru</a>
                            {{-- <a class="btn btn-primary" href="{{ route('pemandu.create') }}">Daftar Baru</a> --}}
                        </div>
                    </div>

                    {{-- <div class="row"> --}}
                    <div class="card-body">
                        <div class="table-responsive">{{-- ikut saiz browser --}}
                            <table class="table table-bordered">

                                <tr class="text-uppercase">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Nombor K/P</th>
                                    <th class="text-center">Kenderaan</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>

                                <tbody>
                                    @foreach ($dataPemandu as $data)
                                        <tr class="align-middle">

                                            <td class="text-center">{{ $data->id }}</td>
                                            <td class="text-start">{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->ic }}</td>
                                            <td class="text-center">
                                                {{ $data->getKenderaan->jenis ?? 'tiada jenis' }} >
                                                {{ $data->getKenderaan->jenama ?? 'tiada jenama' }}
                                                | {{ $data->getKenderaan->model ?? 'tiada model' }}
                                            </td>


                                            <!-- Tindakan Column with Edit and Delete Buttons -->
                                            <td class="text-center" style="width: 10%;">
                                                <div class="d-flex justify-content-between">
                                                    <a class="btn" href="{{ route('pemandu.edit', $data->id) }}">
                                                        <lord-icon src="https://cdn.lordicon.com/xpgofwru.json"
                                                            trigger="hover" colors="primary:#3080e8"
                                                            style="width:28px;height:28px">
                                                        </lord-icon>
                                                    </a>
                                                    <form action="{{ route('pemandu.destroy', $data->id) }}" method="POST"
                                                        id="deleteForm_{{ $data->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn" type="button"
                                                            onclick="confirmDelete('{{ $data->id }}', event)">
                                                            <lord-icon src="https://cdn.lordicon.com/skkahier.json"
                                                                trigger="hover" colors="primary:#e83a30"
                                                                style="width:28px;height:28px"></lord-icon>
                                                        </button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->
                            {{ $dataPemandu->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Include SweetAlert library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            // Define the confirmDelete function
            function confirmDelete(id, event) {
                // Prevent default form submission behavior
                event.preventDefault();
                // Display SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Anda Pasti Untuk Padam Rekod Ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Padam',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        document.getElementById('deleteForm_' + id).submit();
                        // Show success message after deletion
                        Swal.fire({
                            title: 'Berjaya!',
                            text: 'Rekod berjaya dipadam.',
                            icon: 'success',
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                });
            }
        </script>
    @endsection

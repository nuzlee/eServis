@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | index')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekod Servis</h1>
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
                        <i class="fa-solid fa-screwdriver-wrench fa-fade"></i>
                        {{-- This class is used to display a table icon from the Font Awesome icon library with some spacing appliednusing the "me-1" class --}}
                        <a class="btn btn-primary" href="{{ route('servis.create') }}">Daftar Baru</a>
                    </div>
                </div>

                {{-- <div class="row"> --}}
                <div class="card-body">
                    <div class="table-responsive">{{-- ikut saiz browser --}}
                        <table class="table table-bordered">

                            <tr class="text-uppercase">
                                <th class="text-center">ID</th>
                                <th class="text-center">Kenderaan</th>
                                <th class="text-center">Jarak Perbatuan</th>
                                <th class="text-center">Tarikh</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Tindakan</th>
                            </tr>

                            <tbody>
                                @foreach ($dataServis as $data)
                                    <tr class="align-middle">

                                        <td class="text-center">{{ $data->id }}</td>
                                        <td class="text-nowrap">
                                            {{ $data->getKenderaan->jenis ?? 'tiada jenis' }} >
                                            {{ $data->getKenderaan->jenama ?? 'tiada jenama' }}
                                            | {{ $data->getKenderaan->model ?? 'tiada model' }}
                                        </td>
                                        <td class="text-center">{{ $data->odometer }} KM</td>
                                        <td class="text-center">
                                            {{ Carbon::parse($data->tarikh ?? '')->format('d/m/Y') }}
                                        </td>
                                        <td class="text-center">RM {{ $data->harga }}</td>

                                        <!-- Button EDIT & DELETE -->
                                        <td class="text-nowrap" style="width: 8rem;">

                                            <form action="{{ route('servis.destroy', $data->id) }}" method="POST">
                                                <a class="btn" href="{{ route('servis.edit', $data->id) }}">

                                                    <lord-icon src="https://cdn.lordicon.com/xpgofwru.json" trigger="hover"
                                                        colors="primary:#3080e8" style="width:28px;height:28px">
                                                    </lord-icon></a>

                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit"
                                                    onclick="return confirm('{{ __('Anda Pasti Untuk Padam Rekod Ini?') }}')">
                                                    {{-- delete confirmation with Javascript Window.confirm() --}}

                                                    <lord-icon src="https://cdn.lordicon.com/skkahier.json" trigger="hover"
                                                        colors="primary:#e83a30" style="width:28px;height:28px">
                                                    </lord-icon>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--PAGINATION-->
                        {{ $dataServis->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

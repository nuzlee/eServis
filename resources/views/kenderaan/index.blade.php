@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | index')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Senarai Kenderaan</h1>
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
                        <i class="fa-solid fa-car-side fa-fade"></i>
                        <!-- display a table icon from the Font Awesome icon library with some spacing using the "me-1" class -->

                        <a class="btn btn-primary" href="{{ route('kenderaan.create') }}">Daftar Baru</a>
                    </div>
                </div>

                {{-- <div class="row"> --}}
                <div class="card-body">
                    <div class="table-responsive"><!-- auto ikut saiz browser -->
                        <table class="table table-bordered">

                            <tr class="text-uppercase">
                                <th class="text-center">ID</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Jenama</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Tindakan</th>
                            </tr>

                            <tbody>
                                @foreach ($dataKenderaan as $data)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $data->id }}</td>
                                        <td class="text-center">{{ $data->jenis }}</td>
                                        <td class="text-center">{{ $data->jenama }}</td>
                                        <td class="text-center">{{ $data->model }}</td>


                                        <!-- Button EDIT & DELETE -->
                                        <td class="text-nowrap" style="width: 8rem;">
                                            {{-- <td class="text-center"> --}}
                                            @if (Auth::user()->peranan == 1)
                                                <form action="{{ route('kenderaan.destroy', $data->id) }}" method="POST">

                                                    <a class="btn" href="{{ route('kenderaan.edit', $data->id) }}">

                                                        {{-- <td class="text-center"> --}}
                                                        {{-- <button class="btn btn-warning" href=" "><i
                                                    class="fas fa-edit"></i></button> --}}

                                                        <lord-icon src="https://cdn.lordicon.com/xpgofwru.json"
                                                            trigger="hover" colors="primary:#3080e8"
                                                            style="width:28px;height:28px">
                                                        </lord-icon>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn" type="submit"
                                                        onclick="return confirm('{{ __('Anda Pasti Untuk Padam Rekod Ini?') }}')">
                                                        {{-- delete confirmation with Javascript Window.confirm() --}}


                                                        {{-- <button class="btn btn-danger" href=" "><i
                                                    class="fas fa-trash"></i></button> --}}

                                                        <lord-icon src="https://cdn.lordicon.com/skkahier.json"
                                                            trigger="hover" colors="primary:#e83a30"
                                                            style="width:28px;height:28px">
                                                        </lord-icon>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
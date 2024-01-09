@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | index')


@section('content')



    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekod Minyak</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> </li>
        </ol>

        <div class="container-fluid px-0">
            <!-- creating a container that spans the full width of the viewport. The px-4 class adds horizontal padding to the container, maintaining a consistent spacing from the edges of the viewport. -->


            <!-- mb = margin bottom, mt = margin top -->
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <i class="fa-solid fa-gas-pump fa-fade"></i>
                        <!--https://fontawesome.com/icons/gas-pump?f=classic&s=regular&an=bounce -->
                        <!-- This class is used to display a table icon from the Font Awesome icon library with -->
                        <a class="btn btn-primary" href="{{ route('minyak.create') }}">Daftar Baru</a>
                    </div>
                </div>

                <!-- Error alert -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Success alert -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                    </div>
                @endif

                {{-- <div class="row"> --}}
                <div class="card-body">
                    <div class="table-responsive"><!-- auto resize -->
                        <table class="table table-bordered">

                            <tr class="text-uppercase">
                                <th class="text-center">ID</th>
                                <th class="text-center">Kenderaan</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Kuantiti</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Tarikh</th>
                                <th class="text-center">Tindakan</th>
                            </tr>

                            <tbody>
                                @foreach ($dataMinyak as $data)
                                    <tr class="align-middle">

                                        <td class="text-center">{{ $data->id }}</td>
                                        <td class="text-start">
                                            {{-- style="width: 8rem;"> --}}
                                            {{ $data->getKenderaan->jenis ?? 'tiada jenis' }} >
                                            {{ $data->getKenderaan->jenama ?? 'tiada jenama' }}
                                            | {{ $data->getKenderaan->model ?? 'tiada model' }}
                                        </td>
                                        <td class="text-center">{{ $data->jenis }}</td>
                                        <td class="text-center">{{ $data->kuantiti }} liter</td>
                                        <td class="text-center">RM {{ $data->harga }}</td>
                                        <td class="text-center">
                                            {{ Carbon::parse($data->tarikh ?? '')->format('d/m/Y') }}
                                        </td>

                                        <!-- Button edit & delete -->
                                        <td class="text-nowrap" style="width: 8rem;">
                                            {{-- <td class="text-center"> --}}

                                            <form action="{{ route('minyak.destroy', $data->id) }}" method="POST">
                                                <a class="btn" href="{{ route('minyak.edit', $data->id) }}">

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
                        <!-- pagination -->
                        {{ $dataMinyak->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

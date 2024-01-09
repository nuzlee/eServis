@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | create')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekod Isi Minyak</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Baru</li>
        </ol>

        <div class="row">
            {{-- @if (Auth::user()->peranan == 1 or Auth::user()->peranan == 2) --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">RON 95 <br>PETRONAS Primax 95 with Pro-Drive </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="https://imotorbike.my/en/petrol-prices">RM 2.05
                            per liter</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- @endif
            @if (Auth::user()->peranan == 1) --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">RON 97 <br>PETRONAS Primax 97 with Pro-Race </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="https://imotorbike.my/en/petrol-prices">RM 3.47
                            per liter</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">B10 / B20 <br>PETRONAS Dynamic Diesel Euro 5 with Pro-Drive </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="https://imotorbike.my/en/petrol-prices">RM 2.15
                            per liter</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">B7 <br>PETRONAS Dynamic Diesel Euro 5 with Pro-Drive </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="https://imotorbike.my/en/petrol-prices">RM 2.35
                            per liter</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
        </div>


        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form role="form" method="POST" action="{{ route('minyak.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- --------Data dari Kenderaan------ --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select"id="floatingSelectGrid" name="Kenderaan">
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


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputJenis" name="Jenis" type="text" placeholder="Jenis" />
                        <label for="inputJenis">Jenis Minyak</label>
                    </div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputKuantiti" name="Kuantiti" type="text"
                            placeholder="Kuantiti" />
                        <label for="inputKuantiti">Kuantiti Minyak (liter)</label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputHarga" name="Harga" type="text" placeholder="Harga" />
                        <label for="inputHarga">Harga Minyak (RM)</label>
                    </div>
                </div>
            </div>


            {{-- --------Tarikh------ --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <label class="form-label h4" for="Tarikh">Tarikh Isi</label>
                        <div class="input-group" id="Tarikh">

                            <input name="Tarikh" value="{{ old('tarikh') }}" type="date"
                                max="{{ Carbon::now()->format('Y-m-d') }}" class="form-control required">
                        </div>
                    </div>
                </div>


                <!-- ------Butang Submit------ -->

                <div class="card-footer">
                    <a class="btn btn-sm btn-secondary" type="button" href="{{ route('minyak.index') }}">Batal</a>
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>

        </form>
    </div>

@endsection


@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush


@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('.tarikh-picker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            "timePicker24Hour": false,
            "autoApply": true,
            "locale": {
                "direction": "ltr",
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            },
            "showCustomRangeLabel": false,
            "alwaysShowCalendars": true
        });
    </script>
@endpush

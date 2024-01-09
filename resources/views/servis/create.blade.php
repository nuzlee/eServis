@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | create')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekod Servis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Baru</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form role="form" method="POST" action="{{ route('minyak.store') }}" enctype="multipart/form-data">
            @csrf


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
                        <input class="form-control" id="inputOdometer" name="Odometer" type="text"
                            placeholder="Odometer" />
                        <label for="inputOdometer">Mileage Kenderaan (KM)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <div class="input-group" id="Tarikh">
                            {{-- <input class="form-control tarikh-picker" name="Tarikh" type="date"
                                aria-describedby="tarikhHelp" /> --}}

                            <input name="Tarikh" value="{{ old('tarikh') }}" type="date"
                                max="{{ Carbon::now()->format('Y-m-d') }}" class="form-control required">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputHarga" name="Harga" type="text" placeholder="Harga" />
                        <label for="inputHarga">Harga Servis (RM)</label>
                    </div>
                </div>
            </div>


            <!-- Butang Submit -->

            <div class="card-footer">
                <a class="btn btn-sm btn-secondary" type="button" href="{{ route('servis.index') }}">Batal</a>
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

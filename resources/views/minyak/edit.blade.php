@extends('layouts.sbadmin.app')
@section('title', 'Sistem Kenderaan | edit')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Minyak</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form role="form" method="POST" action="{{ route('minyak.update', $minyak->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- ---Data Borang Kenderaan--- -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select"id="floatingSelectGrid" name="Kenderaan">
                            <option selected disabled>Sila Pilih Kenderaan</option>
                            @foreach ($kenderaan as $data)
                                <option value="{{ $data->id }}" @selected($data->id == $minyak->kenderaan)>
                                    {{ $data->jenis }} > {{ $data->jenama }} {{ $data->model }}
                                    <!-- view pada form -->
                                </option>
                            @endforeach
                        </select>
                        <label for="inputKenderaan">Kenderaan</label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputJenis" name="Jenis" type="text" placeholder="Jenis"
                            value="{{ $minyak->jenis }}" />
                        <label for="inputJenis">Jenis Minyak</label>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputKuantiti" name="Kuantiti" type="text" placeholder="Kuantiti"
                            value="{{ $minyak->kuantiti }}" />
                        <label for="inputKuantiti">Kuantiti Minyak (liter)</label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputHarga" name="Harga" type="text" placeholder="Harga"
                            value="{{ $minyak->harga }}" />
                        <label for="inputHarga">Harga Minyak (RM)</label>
                    </div>
                </div>
            </div>


            <!-- ----Tarikh---- -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3" id="Tarikh">
                        <input name="Tarikh" value="{{ Carbon::parse($minyak->tarikh)->format('Y-m-d') }}" type="date"
                            max="{{ Carbon::now()->format('Y-m-d') }}" class="form-control required">
                        <label class="form-label" for="Tarikh">Tarikh</label>

                    </div>
                </div>
            </div>


            <!-- ------Butang Submit------ -->

            <div class="card-footer">
                <a class="btn btn-sm btn-secondary" type="button" href="{{ route('minyak.index') }}">Batal</a>
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
            {{-- <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div> --}}

        </form>
    </div>

@endsection


<!--DATETIMEPICKER-->

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

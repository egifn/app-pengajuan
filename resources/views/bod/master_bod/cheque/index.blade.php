@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(document).ready(function () {
        //INISIASI DATERANGEPICKER
        $('#tanggal').daterangepicker({

        })
    })

</script>


<script type="text/javascript">
    fetchAllDataCheque();

    function fetchAllDataCheque() {
        $.ajax({
            type: "GET",
            url: "{{ route('bod_cheque/getDataCheque.getDataCheque') }}",
            dataType: "json",
            success: function (response) {
                let tabledata;
                let no = 1;
                response.data.forEach(chq => {
                    tabledata += `<tr>`;
                    tabledata += `<td style="padding-left: 13px;">${no++}</td>`;
                    tabledata += `<td>${chq.nama_perusahaan}</td>`;
                    tabledata += `<td>${chq.nama_bank}</td>`;
                    tabledata += `<td>${chq.no_rekening}</td>`;
                    tabledata += `<td></td>`;
                    tabledata += `<td></td>`;
                    tabledata += `<td></td>`;
                    tabledata += `<td></td>`;
                    tabledata += `<td></td>`;
                    tabledata += `<td></td>`;
                    tabledata += `</tr>`;
                });
                $("#tabledata").html(tabledata);
            }
        });
    }

</script>
@stop


    @extends('layouts.admin')

    @section('title')
    <title>Cheque</title>
    @endsection

    @section('content')

    <main class="main">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Master TUA Group</li>
            <li class="breadcrumb-item active">Cheque</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Cheque
                                </h4>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="table-responsive">
                                    <table id="datatabel-v1" class="table table-bordered table-sm"
                                        style="white-space: nowrap; width:100%; margin-bottom: 0;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Perusahaan</th>
                                                <th>Bank</th>
                                                <th>No Rekening</th>
                                                <th>Jenis Rekening</th>
                                                <th>Yang Mengajukan</th>
                                                <th>Yang Menerima</th>
                                                <th>Spesimen TTD</th>
                                                <th>Penyimpan Cheque</th>
                                                <th>Yang Menyerahkan Cheque Ke vendor</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tabledata">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection

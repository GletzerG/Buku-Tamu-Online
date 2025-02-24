@extends('app')
@section('content')

        <div class="d-flex justify-content-center">
            <div class="card text-center">
                <div class="card-header">
                    ✨ Edit Data ✨
                </div>
                <div class="card-body">
                    <form id="dataForm" action="{{ url('admin/update-data/' . $data->id) }}" data="id" method="post" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group">
                            <label for="nama">📝 Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="instansi_kantor">🏢 Instansi/Kantor</label>
                            <input type="text" class="form-control" name="instansi_kantor" id="instansi_kantor"
                                aria-describedby="instansi_kantor" value="{{ $data->instansi_kantor }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_hadir">📅 Tanggal Hadir</label>
                            <input type="date" class="form-control" name="tanggal_hadir" id="tanggal_hadir"
                                aria-describedby="tanggal_hadir" value="{{ $data->tanggal_hadir }}">
                        </div>
                        <div class="form-group">
                            <label for="ingin_bertemu">🤝 Ingin bertemu</label>
                            <input type="text" class="form-control" name="ingin_bertemu" id="ingin_bertemu"
                                aria-describedby="ingin_bertemu" value="{{ $data->ingin_bertemu }}">
                        </div>
                        <div class="form-group">
                            <label for="keperluan">📌 Keperluan</label>
                            <input type="text" class="form-control" name="keperluan" id="keperluan"
                                aria-describedby="keperluan" value="{{ $data->keperluan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">🚀 Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    <input type="hidden" value="{{ $data->id }}">

        <script>
            function validateForm() {
                let nama = document.getElementById("nama").value.trim();
                let instansi = document.getElementById("instansi_kantor").value.trim();
                let tanggal = document.getElementById("tanggal_hadir").value.trim();
                let bertemu = document.getElementById("ingin_bertemu").value.trim();
                let keperluan = document.getElementById("keperluan").value.trim();

                if (!nama || !instansi || !tanggal || !bertemu || !keperluan) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua kolom sebelum mengirim!'
                    });
                    return false;
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dikirim!'
                });
                return true;
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
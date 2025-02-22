@extends('app')
@section('content')

    <div class="card">
        <div class="card-header">
            Data Tamu <a href="" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi/Kantor</th>
                        <th scope="col">Tanggal Hadir</th>
                        <th scope="col">Ingin Bertemu</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($data as $ite) 
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->instansi_kantor }}</td>
                        <td>{{ $item->tanggal_hadir }}</td>
                        <td>{{ $item->ingin_bertemu }}</td>
                        <td>{{ $item->keperluan }}</td>
                        <td>
                            <a href="{{ url ('admin/form-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
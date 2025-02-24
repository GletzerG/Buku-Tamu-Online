@extends('app')
@section('content')

    <div class="card">
        <div class="card-header">
            Data Tamu <a href="{{ url('admin/form-tambah') }}" class="btn btn-success">Tambah Data</a>
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
                        <th scope="col" style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item) 
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->instansi_kantor }}</td>
                            <td>{{ $item->tanggal_hadir }}</td>
                            <td>{{ $item->ingin_bertemu }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-4"><a href="{{ url('admin/form-edit', $item->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{ url('admin/hapus-data', $item->id) }}" method="post"
                                            class="delete-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="button" class="btn btn-danger delete-button"
                                                data-id="{{ $item->id }}">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

            $('.delete-button').click(function () {
                let form = $(this).closest('form');
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: 'Data ini tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>
@endsection
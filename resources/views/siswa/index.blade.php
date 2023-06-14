@extends('layout/aplikasi')

@section('konten')
    <a href="/siswa/create" class="btn btn-primary">Tambah Data Aplikasi</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Aplikasi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    {{-- <td>
                        @if ($item->foto)
                            <img style="max-width:50px;max-height:50px" src="{{ url('foto').'/'.$item->foto }}"/>
                        @endif
                    </td> --}}
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_apk }}</td>
                    {{-- <td>{{ $item->nama_apk }}</td> --}}
                    {{-- <td>{{ $item->nomor_wa }}</td> --}}
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/siswa/'.$item->nama_opd) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/siswa/'.$item->nama_opd.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" class='d-inline' action="{{ '/siswa/'.$item->nama_opd }}" method='post'>
                            
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
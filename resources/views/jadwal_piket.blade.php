@extends('layout.navbar')
{{-- @extends('layout.button') --}}
@section('title','jadwal_piket')
@section('jadwal_piket','active')
@section('content')



            <div class="main-content">
                <div class="container mt-7">
                    <!-- Table -->
                    <div class="row">
                        <div class="col">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-error" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="card-header border-0">
                                <nav aria-label="...">
                                    <ul class="pagination mb-0">
                                        {{-- tambah --}}
                                        <li class="page-item"><a class="page-link" href="#" data-toggle="modal"
                                                data-target="#formModal"><i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        {{-- end tambah --}}
                                    </ul>
                                </nav>
                            </div>
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <h3 class="mb-0">jadwal_piket</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col" class="text-left">Hari</th>
                                                <th scope="col" class="text-left">Nama</th>

        
                                                <th scope="col" class="text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal_piket as $item)
                                                <tr>
                                                    <td scope="row">
                                                        <div class="media align-items-left">
                                                            <div class="media-body">
                                                                <span class="mb-0 text-sm">{{ $loop->iteration }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">

                                                        {{ $item->hari }}
                                                    </td>
                                                   
                                                    <td class="text-left">

                                                       {{ $item->nama->nama }}
                                                    </td>
                                                    
                                                    <td class="text-left">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown"  style="background-color: #5E72E4" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                                    data-target="#formModalEdit{{ $item->id }}">
                                                                    Edit
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    href="{{ asset('delete-jadwal_piket/' . $item->id) }}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer py-4">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <i class="fa fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="fa fa-angle-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>


                    {{-- Modal Tambah Data --}}
                    <form action="/add-jadwal_piket" method="POST">
                        @csrf
                        <div class="modal fade" id="formModal" tabindex="-1" role="dialog"
                            aria-labelledby="formModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="hari">hari</label>
                                            <input type="text" class="form-control" id="hari" name="hari">

                                        
                                            <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <select class="form-control" id="nama" name="id_nama">
                                            <option value="">Pilih Nama</option>
                                                    @foreach ($jadwal_piket as $items)
                                                        <option value="{{ $items->id }}">{{ $items->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    {{-- End Modal Tambah Data --}}

                    {{-- Modal Edit Data --}}
                    @foreach ($jadwal_piket as $item)
                        <form action="/edit-jadwal_piket" method="POST">
                            @csrf
                            <div class="modal fade" id="formModalEdit{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="formModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModalLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                         
                                             
                                                     
                                           
                                                
                                                <div class="modal-body">
                                               <form>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ $item->id }}">
                                                <label for="hari">hari</label>
                                                <input type="text" class="form-control" id="hari" name="hari"
                                                    value="{{ $item->hari }}">
                                            </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id" name="id"
                                                value="{{ $item->id }}">
                                            <label for="nama">Nama</label>
                                            <select class="form-control" id="nama" name="id_nama">
                                                <option value="{{ $item->id_nama }}">
                                                    {{ $item->nama->nama }}
                                                </option>
                                                @foreach ($kota as $items)
                                                    <option value="{{ $items->id_nama }}">{{ $items->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach

                    {{-- End Modal Edit Data --}}

        </body>

    </body>

    </html>
@endsection

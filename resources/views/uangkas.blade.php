@extends('layout.navbar')
{{-- @extends('layout.button') --}}
@section('title','Uangkas')
@section('uangkas','active')
@section('content')


<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <div class="main-content">
                <div class="container mt-7">
                    <!-- Table -->
                    <div class="row">
                        <div class="col">

                            <div class="card-header border-0">
                                <nav aria-label="...">
                                    <ul class="pagination mb-0">
                                        {{-- tambah --}}
                                        <li class="page-item">
                                            <a  href="#" data-toggle="modal"data-target="#formModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
                                            </a>
                                        </li>
                                        {{-- end tambah --}}
                                    </ul>
                                </nav>
                            </div>
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Uang Kas</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col" class="text-left">Nama</th>
                                                <th scope="col" class="text-left">Hari</th>
                                                <th scope="col" class="text-left">Tgl Bayar</th>
                                                <th scope="col" class="text-left">Jumlah Bayar</th>
                                              
                                                <th scope="col" class="text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($uangkas as $index=>$item)
                                                <tr>
                                                    <td scope="row">{{$index + $uangkas->firstItem ()}} </td>
                                                        <div class="media align-items-left">
                                                            <div class="media-body">
                                                               
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">

                                                        {{ $item->absensi->nama }}
                                                    </td>
                                                   
                                                    <td class="text-left">

                                                       {{ $item->hari }}
                                                    </td>
                                                    <td class="text-left">

                                                      {{ $item->tgl_bayar }}
                
                                                    </td>
                                                    <td class="text-left">

                                                      {{ $item->jml_bayar }}
                
                                                    </td>
                                                  
                                                    <td class="text-left">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown"  style="background-color: #0033ff" aria-haspopup="true"
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
                                                                href="{{ asset('delete-uangkas/' . $item->id) }}" button type="button" class="btn btn-danger" onClick="alert('Yakin akan menghapus data ini!')"></button>Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $uangkas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             {{-- Modal Tambah Data --}}
                    <form action="/add-uangkas" method="POST">
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
                                           
                                        <div class="form-group">
                                                <label for="id_absensi">Nama Siswa</label>
                                                <select class="form-control" id="id_absensi" name="id_absensi">
                                                    <option value="">Pilih Nama Siswa</option>
                                                    @foreach ($absensi as $items)
                                                        <option value="{{ $items->id }}">{{ $items->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="hari">hari</label>
                                            <input type="text" class="form-control" id="hari" name="hari">
                                                   
                                            <label for="tglbayar">tanggal bayar</label>
                                            <input type="date" class="form-control" id="tglbayar" name="tgl_bayar">
                                          
                                            <label for="jmlbayar">jumlah bayar</label>
                                            <input type="number" class="form-control" id="jmlbayar" name="jml_bayar">
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
                    @foreach ($uangkas as $item)
                        <form action="/edit-uangkas" method="POST">
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
                                         
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id" name="id"
                                                value="{{ $item->id }}">
                                            <label for="id_absensi">Nama Siswa</label>
                                            <select class="form-control" id="id_absensi" name="id_absensi">
                                                <option value="{{ $item->id_absensi }}">
                                                    {{ $item->absensi->nama }}
                                                </option>
                                                @foreach ($absensi as $items)
                                                    <option value="{{ $items->id }}">{{ $items->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                                     
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ $item->id }}">
                                                <label for="hari">Hari</label>
                                                <input type="text" class="form-control" id="hari" name="hari"
                                                    value="{{ $item->hari }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ $item->id }}">
                                                <label for="tglbayar">tanggal bayar</label>
                                                <input type="text" class="form-control" id="tglbayar" name="tgl_bayar"
                                                    value="{{ $item->tgl_bayar }}">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ $item->id }}">
                                                <label for="jmlbayar">jumlah bayar</label>
                                                <input type="text" class="form-control" id="jmlbayar" name="jml_bayar"
                                                    value="{{ $item->jml_bayar }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <Script>
       @if (Session::has('success'))
        toastr.success("{{Session::get('success') }}")
  @endif
    </Script>
    </html>
@endsection

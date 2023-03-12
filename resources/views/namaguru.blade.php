@extends('layout.navbar')
{{-- @extends('layout.button') --}}
@section('title','Namaguru')
@section('namaguru','active')
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
                                    <h3 class="mb-0">Guru</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col" class="text-left">Nama</th>
                                                <th scope="col" class="text-left">Nip</th>
                                                <th scope="col" class="text-left">Foto</th>
                                                <th scope="col" class="text-left">Status</th>
                                                <th scope="col" class="text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($namaguru as $index => $item)
                                                <tr>
                                                    <td scope="row">{{$index + $namaguru->firstItem ()}} </td>
                                                        <div class="media align-items-left">
                                                            <div class="media-body">
                                                             
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="text-left">

                                                      {{ $item->namaguru }}
                
                                                    </td>

                                                    <td class="text-left">

                                                     {{ $item->nip }}

                                                      </td>

                                                      <td class="text-left">

                                                   <img src=" {{ asset ('fotoguru/'.$item->foto) }}" alt="">

                                                         </td>

                                                        <td class="text-left">

                                                     {{ $item->status }}
                        
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
                                                                href="{{ asset('delete-namaguru/' . $item->id) }}" button type="button" class="btn btn-danger" onClick="alert('Yakin akan menghapus data ini?')"></button>Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                {{ $namaguru->links() }}
                            </div>
                        </div>
                    </div>
                </div>
             </div>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Modal Tambah Data --}}
                    <form action="/add-namaguru" method="POST" enctype="multipart/form-data">
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
                                            

                                            <label for="namaguru">nama</label>
                                            <input type="text" class="form-control" id="namaguru" name="namaguru">

                                            <label for="nip">nip</label>
                                            <input type="text" class="form-control" id="nip" name="nip">


                                            <div class="form-group">
                                                <label for="foto">foto guru</label>
                                                <input type="file" class="form-control" id="foto"
                                                    name="foto">
                                            </div>

                                            <fieldset class="row-right mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">status</legend>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="{{ $item->status }}" checked>
                            <label class="form-check-label" for="status">
                              Aktif
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="{{ $item->status }}">
                            <label class="form-check-label" for="status">
                              Tidak Aktif
                            </label>
                          </div>
                          
                        </div>
                      </fieldset>
  
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
                    @foreach ($namaguru as $item)
                        <form action="edit-namaguru" method="POST" enctype="multipart/form-data">
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
                                                
                                                <label for="namaguru">Nama</label>
                                                <input type="text" class="form-control" id="namaguru"
                                                    name="namaguru" value="{{ $item->namaguru }}">

                                                    <label for="nip">Nip</label>
                                                <input type="text" class="form-control" id="nip"
                                                    name="nip" value="{{ $item->nip }}">

                                                    


                                                    <div class="form-group">
                                                    <label for="foto">Foto Guru</label>
                                                    <input type="file" class="form-control" id="foto"
                                                        name="foto">
                                                    <input class=" form-control" type="hidden" name="gambarLama"
                                                        value="{{ $item->foto }}">
                                                </div>
                                                    
                                       
                                                
                            
                                                <fieldset class="row-right mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">status</legend>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="aktif" checked>
                            <label class="form-check-label" for="gridRadios1">
                              Aktif
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="tidakaktif">
                            <label class="form-check-label" for="gridRadios2">
                              Tidak Aktif
                            </label>
                          </div>
                          
                        </div>
                      </fieldset>         
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

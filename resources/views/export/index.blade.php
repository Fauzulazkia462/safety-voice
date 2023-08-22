@extends('layout.main')

@section('content')
<section class="section" id="home">
    <div class="container text-center">
        <div class="container">
            <form method="GET" action="{{ route('exportexcel') }}">
                <button type="submit" id="add" class="btn btn-primary mt-3">
                    <span>Export Excel</span>
                </button>
            </form>

            <div class="dataTable">
                <table id="myTable" class="table table-stripeds">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Tgl Input</th>
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Departemen</th>
                            <th>Area Kerja Temuan</th>
                            <th>Lokasi Temuan Spesifik</th>
                            <th>Temuan Aktivitas</th>
                            <th>Temuan Keadaan</th>
                            <th>Saran/Rekomendasi</th>                         
                            <th>File</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            @php
                                $status = $d->status; 
                                $assign = $d->assign;   
                            @endphp

                            @if($status != "Done" && $assign == 0)
                                <td>
                                    
                                    <a href="#modalEdit" data-toggle="modal" class="openModalEdit" data-id="{{$d->id}}"
                                        data-status="{{$d->status}}">
                                        <button class="btn btn-primary mt-3" style="width: 35%;">
                                            <span>Edit</span>
                                        </button>
                                    </a>

                                    {{-- <a href="#modalDone" data-toggle="modal" class="openModalDone"
                                    data-id="{{$d->id}}">
                                        <button class="btn btn-primary mt-3">
                                            <span>Done</span>
                                        </button>
                                    </a> --}}

                                    {{-- <a href="#modalDelete" data-toggle="modal" class="openModalDel" data-id="{{$d->id}}">
                                        <button class="btn btn-primary mt-3">
                                            <span>Hapus</span>
                                        </button>
                                    </a> --}}

                                    <a href="#modalAss" data-toggle="modal" class="openModalAss"
                                    data-status="{{$d->status}}"
                                    data-id="{{$d->id}}">
                                        <button class="btn btn-primary mt-3" style="width: 55%;">
                                            <span>Assign</span>
                                        </button>
                                    </a>
                                </td>
                            @endif

                            @if($status != "Done" && $assign == 1)
                                <td>
                                    
                                    <a href="#modalEdit" data-toggle="modal" class="openModalEdit" data-id="{{$d->id}}"
                                        data-status="{{$d->status}}">
                                        <button class="btn btn-primary mt-3" style="width: 35%;">
                                            <span>Edit</span>
                                        </button>
                                    </a>

                                    <button class="btn btn-primary mt-3" disabled style="width: 55%;">
                                        <span>Assigned</span>
                                    </button>  
                                </td>
                            @endif

                            @if($status == "Done")
                                <td>
                                    <button class="btn btn-primary mt-3" disabled style="width: 90%;">
                                        <span>Done</span>
                                    </button>
                                </td>
                            @endif
                            <td>{{ date('d-m-Y', strtotime($d->created_at)) }}</td>
                            <td>{{$d->status}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->dept}}</td>
                            <td>{{$d->area}}</td>
                            <td>{{$d->spec_area}}</td>
                            <td>{{$d->unsafe_activity}}</td>
                            <td>{{$d->unsafe_envi}}</td>
                            <td>{{$d->recom}}</td>                           
                            <td>
                                {{-- <a href="{{'http://127.0.0.1:8000/uploads/safetyVoice/'. $d->file_name .''}}" target="_blank">View</a> --}}
                                <a href="{{'https://safetyvoice.niramasutama.com/uploads/safetyVoice/'. $d->file_name .''}}" target="_blank">View</a>
                            </td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalDone" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Done</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/done" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idDone" id="idDone" value="">
                        <input type="hidden" name="statusDone" value="Done">
                        <label class="title col-md-10">Are You Sure this is done?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5" id="doneBtn">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/update') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idEdit" id="idEdit" value="">
                    </div>
                    <div class="col md-6">
                        <label class="title">Status</label>
                        <select name="statusEdit" id="statusEdit" class="form-control">
                            <option value="Open">Open</option>
                            <option value="On Progress">On Progress</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route ('deletedata') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idhapus" id="idhapus" value="">
                        <label class="title col-md-10">Are You Sure?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAss" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Assign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <div class="row mb-4">
                        <label class="title col-md-10">Assign to</label>
                    </div>
                    
                    <div class="col-md-6">
                        <form action="/assign-ga" method="post">
                            @csrf
                            <input type="hidden" name="emailGa" value="adityawellyandi@gmail.com">
                            <input type="hidden" name="divGa" value="GA">
                            <input type="hidden" name="statusGa" id="statusGa" value="">
                            <input type="hidden" name="idCompGa" id="idCompGa" value="">
                            <button class="btn btn-primary mt-3 col-md-5">GA</button>
                        </form>
                        <form action="/assign-eng" method="post">
                            @csrf
                            <input type="hidden" name="emailEng" value="adityawellyandi@gmail.com">
                            <input type="hidden" name="divEnd" value="Eng">
                            <input type="hidden" name="statusEng" id="statusEng" value="">
                            <input type="hidden" name="idCompEng" id="idCompEng" value="">
                            <button class="btn btn-primary mt-3 col-md-5">Eng</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    {{-- datatables --}}

    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    });
    </script>
    <script>
        $('#myTable').dataTable({
            order : [[1, 'desc']],
            scrollX: true,
            columnDefs: [

            { width: 140, targets: 0},
            { width: 100, targets: 1},
            { width: 200, targets: 6},
            { width: 200, targets: 7},
            { width: 200, targets: 8},

        ],
        })
    </script>

    <script>
        $(document).on("click", ".openModalDel", function(){
            var id = $(this).data('id');

            $("#modalDelete #idhapus").val(id);
        })
    </script>
    <script>
        $(document).on("click", ".openModalEdit", function(){
            var id = $(this).data('id');
            var status = $(this).data('status');

            $("#modalEdit #idEdit").val(id);
            $("#modalEdit #statusEdit").val(status);
        })
    </script>
    <script>
        $(document).on("click", ".openModalAss", function(){
            var status = $(this).data('status');
            var id = $(this).data('id');

            $("#modalAss #statusGa").val(status);
            $("#modalAss #statusEng").val(status);
            $("#modalAss #idCompGa").val(id);
            $("#modalAss #idCompEng").val(id);
        })
    </script>
    <script>
        $(document).on("click", ".openModalDone", function(){
            var id = $(this).data('id');
           
            $("#modalDone #idDone").val(id);
            
        })
    </script>
    
@endsection
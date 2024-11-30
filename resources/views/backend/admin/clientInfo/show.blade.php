@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    <style>
        .img-thumbnail {
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 4px;
}
    </style>
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Client Info</li>
            </ul>
            <h1 class="page-header mb-0">Client Info</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
            <a href="{{route('admin.clientInfo.edit', $clientInfo->id)}}" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
        </div>
    </div>

    <div class="card">
           
        <div class="card-body">
            <form action="#" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            @if ($clientInfo->photo)
                                <img src="{{ asset('storage/clientImages/' . $clientInfo->photo) }}" alt="Photo" style="max-width: 80px;">
                            @else
                                <img src="{{ asset('blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">First Name:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->first_name}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Last Name:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->last_name}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Mobile number:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->mobile ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Email Address:</label>
                            <input type="email" class="form-control" value="{{$clientInfo->email ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Date of Birth:</label>
                            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($clientInfo->date_of_birth)) }}" disabled />

                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">CF/NID Number:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->nid ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Client Address:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->address ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Notes:</label>
                            <input type="text" class="form-control" value="{{$clientInfo->notes ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                </div>

            </form>


            {{-- client data table --}}
            <div class="table-responsive mt-3">
                <h2>Client Documents</h2>
                <button data-toggle="modal" data-target="#addDocuments" class="btn btn-outline-theme mb-3">
                    <i class="fa fa-plus-circle fa-fw me-1"></i> Add Documents
                </button>
                <table class="table table-separate table-head-custom table-checkable dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="text-center">Preview</th>
                            <th>Document Name</th>
                            <th>Note</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($clientDatas->count() > 0)
                            @php
                                // $i = (($clientDatas->currentPage() - 1) * $clientDatas->perPage() + 1);
                                $i = 1;
                            @endphp
                            @foreach ($clientDatas as $clientData)
                            <tr>
                                <td class="text-center">{{$i}}</td>

                                <td>
                                    @php
                                        $fileExtension = strtolower(pathinfo($clientData->name, PATHINFO_EXTENSION));
                                    @endphp
                                
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <!-- Display Image Preview -->
                                        <img src="{{ asset('storage/clientData/' . $clientData->name) }}" alt="Image Preview" class="img-thumbnail" style="width: 100px; height: auto;">
                                    @elseif ($fileExtension === 'pdf')
                                        <!-- Display PDF Preview -->
                                        <a href="{{ asset('storage/clientData/' . $clientData->name) }}" target="_blank">
                                            <i class="fa fa-file-pdf text-danger" style="font-size: 24px;"></i>
                                            View PDF
                                        </a>
                                    @elseif (in_array($fileExtension, ['doc', 'docx']))
                                        <!-- Display Word Icon -->
                                        <a href="{{ asset('storage/clientData/' . $clientData->name) }}" target="_blank">
                                            <i class="fa fa-file-word text-primary" style="font-size: 24px;"></i>
                                            View Document
                                        </a>
                                    @else
                                        <!-- Default Preview for Unknown Files -->
                                        <i class="fa fa-file text-muted" style="font-size: 24px;"></i>
                                        No Preview
                                    @endif
                                </td>

                                <td>{{ucfirst($clientData->display_name)}}</td>
                                <td>{{ucfirst($clientData->note)}}</td>
                                <td>{{date('d/m/Y', strtotime($clientData->created_at))}}</td>
                                <td>

                                    <a href="{{ asset('storage/clientData/' . $clientData->name) }}" class="btn btn-outline-light" title="Download" download>
                                        <i class="fa fa-download"></i>
                                    </a>

                                    <button data-toggle="modal" data-target="#note{{$clientData->id}}" title="Note" class="btn btn-outline-warning">
                                        <i class="fa-regular fa-clipboard"></i>
                                    </button>

                                    <button data-toggle="modal" data-target="#rename{{$clientData->id}}" title="Rename" class="btn btn-outline-theme">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>

                                    <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $clientData->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp



                                {{-- Add Note Modal --}}

                                <div id="note{{$clientData->id}}" class="modal fade" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h5 class="modal-title">Keep Note
                                                    <span class="d-block text-muted font-size-sm"></span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="fas fa-close"></i>
                                                </button>
                                            </div>
                                            <form class="form" action="{{ route('admin.clientData.note') }}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="client_Data_id" value="{{$clientData->id}}">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="form-label" for="note">Write Note </label>
                                                            <textarea class="form-control" name="note" cols="10" rows="5" placeholder="Write Down Notes for the Document">{{$clientData->note}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Keep</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                {{-- File Rename Modal --}}

                                <div id="rename{{$clientData->id}}" class="modal fade" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h5 class="modal-title">Rename File {{$clientData->id}}
                                                    <span class="d-block text-muted font-size-sm"></span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="fas fa-close"></i>
                                                </button>
                                            </div>
                                            <form class="form" action="{{ route('admin.clientData.rename') }}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="client_Data_id" value="{{$clientData->id}}">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="form-label" for="display_name">Write New Name </label>
                                                            <input class="form-control" type="text" id="display_name" name="display_name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        @else
                            <tr class="odd"><td valign="top" colspan="100%" class="dataTables_empty text-center">No matching records found</td></tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>

        </div>
            
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        
    </div>

        {{-- Add new documents modal --}}

        <div id="addDocuments" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header py-5">
                        <h5 class="modal-title">Add Documents
                            <span class="d-block text-muted font-size-sm"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="fas fa-close"></i>
                        </button>
                    </div>
                    <form class="form" action="{{ route('admin.clientData.store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="client_info_id" value="{{$clientInfo->id}}">
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label class="form-label" for="documents">Attach Documents: </label>
                                    <input class="form-control" type="file" id="documents" name="documents[]" multiple/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    @endsection
    @push('script')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.clientData.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Visitor Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush
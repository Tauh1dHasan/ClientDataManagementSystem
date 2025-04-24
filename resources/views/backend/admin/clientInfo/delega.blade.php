@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">

    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Generate DELEGA</li>
            </ul>
            <h1 class="page-header mb-0">DELEGA</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
            {{-- <a href="{{route('admin.clientInfo.edit', $clientInfo->id)}}" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</a> --}}
        </div>
    </div>

    <div class="card">
           
        <div class="card-body" id="printableArea">
            <h1 class="text-center onPrintBlack"> TITOLO DI DELEGA </h1>
            <form action="#" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">Il/La sottoscritto/a:</label>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->first_name}} {{$clientInfo->last_name}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">nato/a:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->birth_place ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label">il:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($clientInfo->date_of_birth)) }}" disabled />
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">residente:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->address ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label">CAP:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->post_code ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">citta:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->city ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label">Prov:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$clientInfo->province ?? 'N/A'}}" disabled />
                        </div>
                    </div>



                    <h2 class="text-center mt-5"> DELEGA </h2>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">il/la sig./sig.ra: </label>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="org_name" requried/>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">PIVA/CF: </label>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="org_name" requried/>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">residente:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="residente" required />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label">CAP:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="post_code" required />
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label">citta:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="city" required />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label">Prov:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="province" required />
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label class="form-label">a: (indicre il tipo di operazione per cui si effettua la delega)</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" name="aggrement" placeholder="Enter valid data"/>
                        </div>
                    </div>


                    <div style="margin-top: 100px;">
                        <div style="text-align: right; font-weight: bold; margin-right: 10%;">
                            <span style="border-top: 1px solid black; padding-top: 5px">Il delegante</span>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; margin-top: 100px;">
                            <div style="margin-left: 25%">
                                <span style="border-top: 1px solid black; padding-top: 5px">(luogo e data)</span>
                            </div>
                            <div style="margin-right: 25%">
                                <span style="border-top: 1px solid black; padding-top: 5px">(luogo e data)</span>
                            </div>
                        </div>
                        
                    </div>

                </div>

            </form>

        </div>

        <div class="text-end m-3">
            <button type="button" class="btn btn-primary" onclick="printDiv()">Stampa / Print</button>
        </div>
            
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        
    </div>

    @endsection

    @push('style')
        <style>
            @media print {
            * {
                color: #000 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            input::placeholder {
                color: #000 !important;
            }

            .form-control {
                background-color: #fff !important;
                border-color: #000 !important;
            }

            button, .btn, .breadcrumb, .card-arrow, .ms-auto {
                display: none !important;
            }

            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
                font-family: 'Times New Roman', serif !important;
                /* font-size: 1.1em !important; */
                color: #000 !important;
                font-weight: bold;
            }

            #printableArea {
                max-width: 100%;
                width: 180mm; /* slightly less than A4 width after margins */
                margin: 0 auto;
            }

            .text-muted, .text-secondary, .text-body-secondary {
                color: #000 !important;
            }
        }

        </style>
    @endpush
    
    @push('script')
        <script>
            function printDiv() {
                document.querySelectorAll('*').forEach(el => el.style.color = 'black');

                var printContents = document.getElementById("printableArea").innerHTML;
                var originalContents = document.body.innerHTML;
        
                document.body.innerHTML = printContents;
        
                window.print();
        
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>
    @endpush
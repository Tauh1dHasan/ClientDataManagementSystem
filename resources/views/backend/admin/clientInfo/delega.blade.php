@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">

    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3 doNotPrint">
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
                            <label class="form-label" for="org_name">il/la sig./sig.ra: </label>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="org_name" id="org_name" value="{{ old('org_name') }}" requried/>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_piva">PIVA/CF: </label>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="delega_piva" id="delega_piva" value="{{ old('delega_piva') }}" requried/>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_residente">residente:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="delega_residente" id="delega_residente" value="{{ old('delega_residente') }}" required />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_post_code">CAP:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="delega_post_code" id="delega_post_code" value="{{ old('delega_post_code') }}" required />
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_city">citta:</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="delega_city" id="delega_city" value="{{ old('delega_city') }}" required />
                        </div>
                    </div>

                    <div class="col-md-1 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_province">Prov:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter valid data" name="delega_province" id="delega_province" value="{{ old('delega_province') }}" required />
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="delega_aggrement">a: (indicre il tipo di operazione per cui si effettua la delega)</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" name="delega_aggrement" placeholder="Enter valid data" id="delega_aggrement" value="{{ old('delega_aggrement') }}"/>
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
            <button type="button" class="btn btn-primary doNotPrint" onclick="printDiv()">Stampa / Print</button>
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
                    box-sizing: border-box !important;
                }

                .row {
                    display: flex;
                    flex-wrap: wrap;
                }

                [class*="col-"] {
                    padding: 4px;
                    flex: 0 0 auto;
                }

                /* Override Bootstrap column widths for printing */
                .col-md-1  { width: 8.33%; }
                .col-md-2  { width: 16.66%; }
                .col-md-3  { width: 25%; }
                .col-md-4  { width: 33.33%; }
                .col-md-5  { width: 41.66%; }
                .col-md-6  { width: 50%; }
                .col-md-7  { width: 58.33%; }
                .col-md-8  { width: 66.66%; }
                .col-md-9  { width: 75%; }
                .col-md-10 { width: 83.33%; }
                .col-md-11 { width: 91.66%; }
                .col-md-12 { width: 100%; }

                .form-group,
                .form-control {
                    margin: 0 !important;
                    padding: 2px 4px !important;
                }

                .form-control {
                    width: 100%;
                    font-size: 12pt;
                }

                .row {
                    margin: 0 !important;
                }

                body {
                    padding: 0;
                    margin: 0;
                }
                
                input::placeholder {
                                color: #000 !important;
                            }
                .form-control {
                                background-color: #fff !important;
                                border-color: #000 !important;
                            }
                .text-muted, .text-secondary, .text-body-secondary {
                                color: #000 !important;
                            }

                .doNotPrint {
                    display: none !important;
                }
            }



        </style>
    @endpush
    
    @push('script')
        <script>
            function printDiv() {
                document.querySelectorAll('*').forEach(el => el.style.color = 'black');

                 // STEP 1: Store all values into JS variables
                // let org_name = document.getElementById("org_name").value;
                // let delega_piva = document.getElementById("delega_piva").value;
                // let delega_residente = document.getElementById("delega_residente").value;
                // let delega_post_code = document.getElementById("delega_post_code").value;
                // let delega_city = document.getElementById("delega_city").value;
                // let delega_province = document.getElementById("delega_province").value;
                // let delega_aggrement = document.getElementById("delega_aggrement").value;

                // // STEP 2: Just before print, ensure these values are in DOM (you can skip this if already typed)
                // document.getElementById("org_name").value = org_name;
                // document.getElementById("delega_piva").value = delega_piva;
                // document.getElementById("delega_residente").value = delega_residente;
                // document.getElementById("delega_post_code").value = delega_post_code;
                // document.getElementById("delega_city").value = delega_city;
                // document.getElementById("delega_province").value = delega_province;
                // document.getElementById("delega_aggrement").value = delega_aggrement;


                var printContents = document.getElementById("printableArea");
                // var originalContents = document.body.innerHTML;
        
                // document.body.innerHTML = printContents;
        
                window.print();
        
                // document.body.innerHTML = originalContents;
                location.reload();
            }

        </script>
    @endpush
@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="row layout-top-spacing">
                <div id="basic" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Upload Signature contract</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="simple-example" method="post" action="{{route('signature-contract.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signatureContractName">Signature contract name</label>
                                        <input type="text" class="form-control" name="signature_contract_name" id="signatureContractName" placeholder="" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the name
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signature_contract_file">Signature contract file</label>
                                        <input type="file" class="form-control" name="signature_contract_file" id="signature_contract_file" placeholder="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Email
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary submit-fn mt-2" type="submit">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

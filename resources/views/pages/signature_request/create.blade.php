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
                                    <h4>Send  Signature request</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="simple-example" method="post" action="{{route('signature-request.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signatureRequestTitle">Title</label>
                                        <input type="text" class="form-control" name="signature_request_title" id="signatureRequestTitle" placeholder="" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Title
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signatureRequestSubject">Subject</label>
                                        <input type="text" class="form-control" name="signature_request_subject" id="signatureRequestSubject" placeholder="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Subject
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signatureRequestMessage">Message</label>
                                        <textarea type="text" class="form-control" name="signature_request_message" id="signatureRequestMessage" placeholder="" required></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Message
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="addSigner">Add Signer</label>
                                        <select  class="form-control" name="add_signer">
                                            <option selected="true" disabled="disabled">Please choose the Signer</option>
                                            @foreach( $users as $user)
                                                <option value="{{$user->id}}" >{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose the Signer
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="addSigner">Add Signature Contract</label>
                                       <select  class="form-control" name="signature_contract">
                                           <option selected="true" disabled="disabled">Please choose the Signature Contract</option>
                                           @foreach( $signatureContracts as $signatureContract)
                                             <option value="{{$signatureContract->id}}" >{{$signatureContract->signature_contract_name}}</option>
                                           @endforeach
                                       </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose the Signature Contract
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary submit-fn mt-2" type="submit">Send request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

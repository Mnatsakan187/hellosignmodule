@extends('layouts.app')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Signature contracts</h4>
                                <a class="btn btn-info float-lg-right" href="{{route('signature-request.create')}}">
                                    Send signature request
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>Requester email address</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Signer name</th>
                                <th>Signer email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($signatureRequests->toArray() as $signatureRequest)
                                <tr>
                                    <td>{{$signatureRequest['requester_email_address']}}</td>
                                    <td>{{$signatureRequest['title']}}</td>
                                    <td>{{$signatureRequest['subject']}}</td>
                                    <td>{{$signatureRequest['message']}}</td>
                                    <td>{{$signatureRequest['signatures'][0]['signer_name']}}</td>
                                    <td>{{$signatureRequest['signatures'][0]['signer_email_address']}}</td>
                                    <td>{{str_replace('_', ' ', $signatureRequest['signatures'][0]['status_code'])}}</td>
                                    @if($signatureRequest['signatures'][0]['status_code'] === 'signed')
                                        <td>
                                            <a href="{{url('signature-request/'.$signatureRequest['signature_request_id'])}}" class="btn btn-primary">
                                               Download
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="#" class="btn btn-primary" style="padding-right: 35px;">
                                                <span>Waiting</span>
                                            </a>
                                        </td>

                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Signer name</th>
                                <th>Signer email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('styles')
 <style>
     #plugin{
        margin-top: -100px !important;
     }
 </style>
@endsection

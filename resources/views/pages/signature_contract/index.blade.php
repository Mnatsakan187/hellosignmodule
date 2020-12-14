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
                                <a class="btn btn-info float-lg-right" href="{{route('signature-contract.create')}}">
                                    Upload Signature contract
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Signature contract name</th>
                                {{--<th>Signature contract file</th>--}}
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($signatureContracts as $signatureContract)
                                <tr>
                                    <td>{{$signatureContract->id}}</td>
                                    <td>{{$signatureContract->signature_contract_name}}</td>
                                    {{--<td>--}}
                                        {{--<embed  id="embed-content"--}}
                                               {{--src="{{asset('storage/signature_contracts/'.$signatureContract->signature_contract_file)}}" allowfullscreen>--}}


                                    {{--</td>--}}
                                    <td>{{strtoupper($signatureContract->type)}}</td>
                                    <td>
                                        <a href="{{url('signature-contract/'.$signatureContract->id.'/edit')}}" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>
                                        <form class="d-inline-block" action="{{route('signature-contract.destroy', $signatureContract->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>SIGNATURE CONTRACT NAME</th>
                                {{--<th>SIGNATURE CONTRACT FILE</th>--}}
                                <th>TYPE</th>
                                <th>ACTION</th>
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

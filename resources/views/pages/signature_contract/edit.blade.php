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
                                    <h4>Edit</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="simple-example" method="post" action="{{route('signature-contract.update', $signatureContract->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="signatureContractName">Signature contract name</label>
                                        <input type="text" class="form-control" name="signature_contract_name" id="signatureContractName" placeholder=""
                                               value="{{$signatureContract->signature_contract_name}}" required>
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
                                        <input type="file" class="form-control" name="signature_contract_file"
                                               id="signature_contract_file" placeholder="" value="">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Email
                                        </div>


                                            <embed class="mt-3" id="embed-content" width="1100px" height="800px"
                                                src="{{asset('/storage/signature_contracts/'.$signatureContract->signature_contract_file)}}">



                                    </div>
                                    {{--@if($signatureContract->type == 'html')--}}
                                        {{--<textarea class="mt-3"  id="summary-ckeditor" name="summary_ckeditor" >--}}
                                                {{--{!! $signatureContract->signature_contract_file !!}--}}
                                        {{--</textarea>--}}
                                    {{--@endif--}}

                                </div>

                                <input type="hidden" id="htmlUrl" value="{{asset('storage/signature_contracts/'.$signatureContract->signature_contract_file)}}">


                                <button class="btn btn-primary submit-fn mt-2" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'summary-ckeditor', {
            extraAllowedContent: 'style;*[id,rel, class](*){*}',
            width: "1100px",
            height: "500px"
        } );

        CKEDITOR.config.fullPage  = true;
        CKEDITOR.config.allowedContent   = true;

        // let html = $("#htmlUrl").val();

        // $("#summary-ckeditor").lo
        // CKEDITOR.on("instanceReady", function(event)
        // {
        //     $.get(html)
        //         .done(response=>{
        //             console.log(response, 7878)
        //             CKEDITOR.instances['summary-ckeditor'].setData(response);})
        //         .fail();
        // });


    </script>
@endsection

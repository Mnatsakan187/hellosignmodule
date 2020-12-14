<?php

namespace App\Http\Controllers;

use App\SignatureContract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class SignatureContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signatureContracts = SignatureContract::get();

        $data = [
            'category_name' => 'signature-contract',
            'page_name' => 'basic',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'signatureContracts' => $signatureContracts
        ];

        return view('pages.signature_contract.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'signature-contract',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => ''
        ];

        return view('pages.signature_contract.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $file = $request->file('signature_contract_file');

        if ($file->extension() == 'pdf') {

            $filename = $file->hashName();
            if($request->hasfile('signature_contract_file')){
                Storage::disk('public')->put('signature_contracts', $file);
            }

            SignatureContract::create([
                'signature_contract_name' => $data['signature_contract_name'],
                'signature_contract_file' => $filename,
                'type' => $file->extension(),
            ]);

        }else{
            SignatureContract::create([
                'signature_contract_name' => $data['signature_contract_name'],
                'signature_contract_file' => file_get_contents($data['signature_contract_file']),
                'type' => $file->extension(),
            ]);
        }

        return redirect()->route('signature-contract.index')
            ->with('success', 'Signature Contract upload successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signatureContract = SignatureContract::findOrFail($id);

        $data = [
            'category_name' => 'signature-contract',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'signatureContract' => $signatureContract
        ];

        return view('pages.signature_contract.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $signatureContract =  SignatureContract::findOrFail($id);

        $signatureContract ->update([
            'signature_contract_name' => $data['signature_contract_name'],
        ]);

        if(isset($data['summary_ckeditor']) && $data['summary_ckeditor']){
            $signatureContract ->update([
                'signature_contract_name' => $data['signature_contract_name'],
                'signature_contract_file' => $data['summary_ckeditor'],
            ]);
        }

        if($request->hasfile('signature_contract_file')){
            $signatureContract =  SignatureContract::findOrFail($id);
            $file = $request->file('signature_contract_file');
            $filename = $file->hashName();
            Storage::disk('public')->delete('signature_contracts/'.$signatureContract->signature_contract_file);
            Storage::disk('public')->put('signature_contracts', $file);
            $signatureContract ->update([
                'signature_contract_file' => $filename,
                'type' => $file->extension(),
            ]);
        }

        return redirect()->route('signature-contract.index')
            ->with('success', 'Signature Contract updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  SignatureContract::findOrFail($id);
        $user->delete();
        return redirect()->route('signature-contract.index')
            ->with('success', 'Signature Contract deleted successfully.');
    }
}

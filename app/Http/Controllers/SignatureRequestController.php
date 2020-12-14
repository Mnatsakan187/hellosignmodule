<?php

namespace App\Http\Controllers;

use App\SignatureContract;
use App\User;
use Illuminate\Http\Request;

class SignatureRequestController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \HelloSign\BaseException
     */
    public function index()
    {
        $client = new \HelloSign\Client(env('HELLOSIGN_API_KEY'));

        $signatureRequests = $client->getSignatureRequests();

        $data = [
            'category_name' => 'signature-request',
            'page_name' => 'basic',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'signatureRequests' => $signatureRequests
        ];

        return view('pages.signature_request.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $signatureContracts = SignatureContract::get(['id','signature_contract_name']);

        $users = User::get();

        $data = [
            'category_name' => 'signature-request',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'signatureContracts' => $signatureContracts,
            'users' => $users
        ];

        return view('pages.signature_request.create')->with($data);
    }

    /**
     * @param Request $request
     * @param \Industrious\HelloSignLaravel\Classes\SignatureRequest $signature_request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \HelloSign\BaseException
     * @throws \HelloSign\Error
     */
    public function store(Request $request, \Industrious\HelloSignLaravel\Classes\SignatureRequest $signature_request)
    {
        $data = $request->all();

        $user = User::where('id',$data['add_signer'])->first();

        $client = new \HelloSign\Client(env('HELLOSIGN_API_KEY'));

        $request = new \HelloSign\SignatureRequest;
        $request->enableTestMode();
        $request->setTitle($data['signature_request_title']);
        $request->setSubject($data['signature_request_subject']);
        $request->setMessage($data['signature_request_message']);
        $request->addSigner($user['email'],  $user['name']);

        $signatureContract =  SignatureContract::where('id', $data['signature_contract'])->first();

        $request->addFile(storage_path('app\\public\\signature_contracts\\'.$signatureContract->signature_contract_file));

        $response = $client->sendSignatureRequest($request);

        return redirect()->route('signature-request.index')
            ->with('success', 'Signature Contract upload successfully.');
    }


    /**
     * @param $id
     * @return mixed
     * @throws \HelloSign\BaseException
     */
    public function show($id)
    {
        $client = new \HelloSign\Client(env('HELLOSIGN_API_KEY'));

        $signatureRequests = $client->getFiles($id);

        return \Redirect::to($signatureRequests->toArray()['file_url']);

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
            'category_name' => 'signature-request',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'signatureContract' => $signatureContract
        ];

        return view('pages.signature_request.edit')->with($data);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ContactRepository;
use App\Http\Controllers\Controller;
use Response;

class ContactController extends Controller
{
    protected $contact;

    /**
     * Pham Viet Toan
     * 09/24/2017
     *
     * Construct function
     */
    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Pham Viet Toan
     * 09/24/2017
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.contacts.index');
    }

    /**
     * Pham Viet Toan
     * 10/03/2017
     * Display a listing of the resource with ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $contacts = $this->contact->getAll([]);
        
        return Response::json($contacts, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Pham Viet Toan
     * 09/24/2017
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->find($id, []);

        return Response::json($contact, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.contacts.edit');
    }

    /**
     * Pham Viet Toan
     * 09/24/2017 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = $this->contact->find($id, []);
        $data = [
            'status' => config('custom.contact.accept')
        ];

        try {
            $contact->update($data);
            return Response('Contact Accepted!', 200);
        } catch (Exception $e) {
            return Response("Contact can't not accept!", 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

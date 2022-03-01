<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Client\Entities\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data=Client::fetch($request);
        return view('client::index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d= new Client();
        return view('client::form',compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Client::create($request->only( 'label', 'descp','status'));
        if ($request->file('images')) {
            // menyimpan data file yang diupload ke variabel $file
            $image = $request->file('images');
            // nama file
            $image->getClientOriginalName();

            // ekstensi file
            $image->getClientOriginalExtension();

            // real path
            $image->getRealPath();

            // ukuran file
            $image->getSize();

            // tipe mime
            $image->getMimeType();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/client';

            $id = Client::FindByLabel($request->label)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Client::find($id)->update(['image' => $imageDir]);
        }

        return redirect('client')->with(['success' => '`' . $request->label . '` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Client $client)
    {
        $d=$client;
        return view('client::form',compact('d'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Client $client)
    {
        if ($request->file('images')) {
            // $validator = Validator::make($request->all(), [
            //     'file' => 'max:500000',
            // ]);
            $request->validate([
                'images' => 'max:1024',
            ]);

            $image_old = $client->image;  // Value is not URL but directory file path
            if ($image_old != null) {
                if (File::exists($image_old)) {
                    File::delete($image_old);
                }
            }
            // menyimpan data file yang diupload ke variabel $file
            $image = $request->file('images');
            // nama file
            $image->getClientOriginalName();

            // ekstensi file
            $image->getClientOriginalExtension();

            // real path
            $image->getRealPath();

            // ukuran file
            $image->getSize();

            // tipe mime
            // $image->getMimeType();    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/client';


            $nameFile = $client->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $client->update($request->only( 'label','image', 'descp','status'));
        } else {
            $client->update($request->only( 'label', 'descp','status'));
        }
        return redirect('client')->with(['success' => '`' . $request->label . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Client $client)
    {
        $name = $client->label;
        $image_old = $client->image;  // Value is not URL but directory file path
        if (File::exists($image_old)) {
            File::delete($image_old);
        }
        
        $client->delete();

        return redirect('client')->with(['success' => '`' . $name . '` Berhasil dihapus']);
    }
}

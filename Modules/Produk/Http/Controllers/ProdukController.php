<?php

namespace Modules\Produk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Modules\Produk\Entities\Produk;
use Modules\Services\Entities\Services;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Produk::fetch($request);
        return view('produk::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new Produk;

        $member = to_dropdown(Member::Landing(), 'id', 'name');
        $services = to_dropdown(Services::Landing(), 'id', 'label');
        return view('produk::form', compact('d', 'member', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Produk::create($request->only('url', 'label', 'descp', 'member', 'services', 'tipe_produk', 'status'));
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
            $tujuan_upload = 'images/produk';

            $id = Produk::FindByLabel($request->label)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Produk::find($id)->update(['image' => $imageDir]);
        }

        return redirect('produk')->with(['success' => '`' . $request->label . '` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('produk::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Produk $produk)
    {
        $d = $produk;
        $member = to_dropdown(Member::Landing(), 'id', 'name');
        $services = to_dropdown(Services::Landing(), 'id', 'label');

        return view('produk::form', compact('d', 'member', 'services'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->file('images')) {
            // $validator = Validator::make($request->all(), [
            //     'file' => 'max:500000',
            // ]);
            $request->validate([
                'images' => 'max:1024',
            ]);

            $image_old = $produk->image;  // Value is not URL but directory file path
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
            $tujuan_upload = 'images/produk';


            $nameFile = $produk->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $produk->update($request->only('image', 'url', 'label', 'descp', 'member', 'services', 'tipe_produk', 'status'));
        } else {
            $produk->update($request->only('url', 'label', 'descp', 'member', 'services', 'tipe_produk', 'status'));
        }
        return redirect('produk')->with(['success' => '`' . $request->label . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('produk');
    }
}

<?php

namespace Modules\Produkdetail\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Produk\Entities\Produk;
use Modules\ProdukDetail\Entities\ProdukDetail;
use Illuminate\Support\Facades\File;

class ProdukdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = ProdukDetail::fetch($request);

        $produk = to_dropdown(Produk::LandingHome(), 'id', 'label');
        return view('produkdetail::index',compact('data','produk'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d=new ProdukDetail;

        $produk = to_dropdown(Produk::LandingHome(), 'id', 'label');
        return view('produkdetail::form',compact('d','produk'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        ProdukDetail::create($request->only('url', 'label', 'descp', 'id_produk', 'status'));
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
            $tujuan_upload = 'images/produkdetail';

            $id = ProdukDetail::FindByLabel($request->label)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            ProdukDetail::find($id)->update(['image' => $imageDir]);
        }

        return redirect('produkdetail')->with(['success' => '`' . $request->label . '` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('produkdetail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(ProdukDetail $produkdetail)
    {
        $d=$produkdetail;

        $produk = to_dropdown(Produk::LandingHome(), 'id', 'label');

        return view('produkdetail::form',compact('d','produk'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,ProdukDetail $produkdetail)
    {
        if ($request->file('images')) {
            // $validator = Validator::make($request->all(), [
            //     'file' => 'max:500000',
            // ]);
            $request->validate([
                'images' => 'max:1024',
            ]);

            $image_old = $produkdetail->image;  // Value is not URL but directory file path
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
            $tujuan_upload = 'images/produkdetail';


            $nameFile = $produkdetail->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $produkdetail->update($request->only('image','url', 'label', 'descp', 'id_produk', 'status'));
        } else {
            $produkdetail->update($request->only('url', 'label', 'descp', 'id_produk', 'status'));
        }
        return redirect('produkdetail')->with(['success' => '`' . $request->label . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ProdukDetail $produkdetail)
    {
        $name = $produkdetail->label;
        $image_old = $produkdetail->image;  // Value is not URL but directory file path
        if (File::exists($image_old)) {
            File::delete($image_old);
        }
        
        $produkdetail->delete();

        return redirect('produk')->with(['success' => '`' . $name . '` Berhasil dihapus']);
    }
}

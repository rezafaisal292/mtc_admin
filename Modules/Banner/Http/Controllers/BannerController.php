<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banner\Entities\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data=Banner::fetch($request);
        return view('banner::index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d=new Banner;
        return view('banner::form',compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Banner::create($request->only( 'label', 'descp','urutan','status'));
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

            $id = Banner::FindByLabel($request->label)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Banner::find($id)->update(['image' => $imageDir]);
        }

        return redirect('banner')->with(['success' => '`' . $request->label . '` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('banner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('banner::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        return redirect('banner');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('banner');
    }
}

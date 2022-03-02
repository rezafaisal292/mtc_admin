<?php

namespace Modules\Sosmed\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Sosmed\Entities\Sosmed;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data= Sosmed::fetch($request);
        return view('sosmed::index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d=new Sosmed;
        return view('sosmed::form',compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Sosmed::create($request->only( 'name'));
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
            $tujuan_upload = 'images/sosmed';

            $id = Sosmed::FindByLabel($request->label)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Sosmed::find($id)->update(['image' => $imageDir]);
        }

        return redirect('sosmed')->with(['success' => '`' . $request->name . '` Berhasil disimpan']);
    
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sosmed::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Sosmed $sosmed)
    {
        $d=$sosmed;
        return view('sosmed::form',compact('d'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Sosmed $sosmed)
    {
        if ($request->file('images')) {
            // $validator = Validator::make($request->all(), [
            //     'file' => 'max:500000',
            // ]);
            $request->validate([
                'images' => 'max:1024',
            ]);

            $image_old = $sosmed->image;  // Value is not URL but directory file path
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
            $tujuan_upload = 'images/sosmed';


            $nameFile = $sosmed->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $sosmed->update($request->only( 'name','image'));
        } else {
            $sosmed->update($request->only( 'name'));
        }
        return redirect('sosmed')->with(['success' => '`' . $request->name . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Sosmed $sosmed)
    {
        $name = $sosmed->label;
        $image_old = $sosmed->image;  // Value is not URL but directory file path
        if (File::exists($image_old)) {
            File::delete($image_old);
        }
        
        $sosmed->delete();

        return redirect('sosmed')->with(['success' => '`' . $name . '` Berhasil dihapus']);
    }
}

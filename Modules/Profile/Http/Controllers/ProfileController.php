<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;
use Illuminate\Support\Facades\File;
use Modules\Profile\Entities\ProfileKontak;
use Modules\Sosmed\Entities\Sosmed;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $d = Profile::first();
        $sosmed = to_dropdown(Sosmed::All(), 'id', 'name');
        return view('profile::index', compact('d', 'sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('profile::form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        return redirect('profile');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('profile::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('profile::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Profile $profile)
    {

        $request->validate([
            'images' => 'max:1024',
        ]);
        if ($request->file('images')) {
            $image_old = $profile->image;  // Value is not URL but directory file path
            if (File::exists($image_old)) {
                File::delete($image_old);
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
            $image->getMimeType();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images';


            $nameFile = $profile->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $d = $request->only('name', 'descp', 'image');
            $profile->update($d);
        } else {
            $d = $request->only('name', 'descp');
            $profile->update($d);
        }


        if (count($request->id_sosmed) > 0) {
            ProfileKontak::truncate();
            for ($i = 0; $i < count($request->id_sosmed); $i++) {
                ProfileKontak::create(
                    [
                        'id_profile' => $profile->id, 
                        'id_sosmed' => $request->id_sosmed[$i], 
                        'data' => $request->data[$i]
                    ]
                );
            }
        }


        return redirect('profile')->with(['success' => '`' . $request->name . '` Berhasil disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('profile');
    }

    public function updateSosmed(Request $request)
    {
        //
        return redirect('profile');
    }
}

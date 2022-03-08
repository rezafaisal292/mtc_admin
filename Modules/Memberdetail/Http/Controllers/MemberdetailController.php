<?php

namespace Modules\Memberdetail\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Member\Entities\Member;
use Modules\Memberdetail\Entities\MemberDetail;
use Illuminate\Support\Str;

class MemberdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = MemberDetail::fetch($request);
        $member = to_dropdown(Member::All(), 'id', 'name');
        return view('memberdetail::index', compact('data', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new MemberDetail;
        $member = to_dropdown(Member::All(), 'id', 'name');
        return view('memberdetail::form', compact('d', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'max:1024',
            'id_member' => 'string',
        ]);

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
            $tujuan_upload = 'images/memberdetail';


            $nameFile =  Str::uuid(). '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            MemberDetail::create($request->only('url', 'image','descp', 'id_member', 'status'));
        }
        else
        {
            MemberDetail::create($request->only('url', 'descp', 'id_member', 'status'));
        }
        return redirect('memberdetail');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('memberdetail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(MemberDetail $memberdetail)
    {
        $d = $memberdetail;
        $member = to_dropdown(Member::All(), 'id', 'name');
        return view('memberdetail::form', compact('d','member'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, MemberDetail $memberdetail)
    {
        $request->validate([
            'images' => 'max:1024',
            'id_member' => 'string',
        ]);
        if ($request->file('images')) {
            $image_old = $memberdetail->image;  // Value is not URL but directory file path
            if (File::exists($image_old)) {
                File::delete($image_old);

                $memberdetail->update(['image'=> null]);
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
            $tujuan_upload = 'images/memberdetail';
            $nameFile = $memberdetail->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $memberdetail->update($request->only('image','url', 'descp', 'id_member', 'status'));
        }
        else
        {
            $memberdetail->update(['image'=> null]);
        }

        $memberdetail->update($request->only('url', 'descp', 'id_member', 'status'));
        return redirect('memberdetail');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(MemberDetail $memberdetail)
    {
        $name = $memberdetail->name;
        $image_old = $memberdetail->image;  // Value is not URL but directory file path
        if (File::exists($image_old)) {
            File::delete($image_old);
        }
        $memberdetail->delete();

        return redirect('memberdetail')->with(['success' => '`' . $name . '` Berhasil dihapus']);
    }
}

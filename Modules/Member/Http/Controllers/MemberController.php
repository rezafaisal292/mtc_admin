<?php

namespace Modules\Member\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Illuminate\Support\Facades\File;
use Modules\Memberdetail\Entities\MemberDetail;
use Modules\Membersosmed\Entities\MemberSosmed;
use Modules\Produk\Entities\Produk;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Member::fetch($request);
        return view('member::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new Member;
        return view('member::form', compact('d'));
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
            'imagesbanner' => 'max:1024',
        ]);

        Member::create($request->only('name', 'descp','status'));
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
            $tujuan_upload = 'images/member';

            $id = Member::FindByName($request->name)->id;

            $nameFile = $id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Member::find($id)->update(['image' => $imageDir]);
        }
        if ($request->file('imagesbanner')) {
            // menyimpan data file yang diupload ke variabel $file
            $image = $request->file('imagesbanner');
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
            $tujuan_upload = 'images/member';

            $id = Member::FindByName($request->name)->id;

            $nameFile = $id . '_banner.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $imageDir =  $tujuan_upload . '/' . $nameFile;
            Member::find($id)->update(['imagebanner' => $imageDir]);
        }

        return redirect('member')->with(['success' => '`' . $request->name . '` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('member::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Member $member)
    {
        $d = $member;

        return view('member::form', compact('d'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'images' => 'max:1024',
            'imagesbanner' => 'max:1024',
        ]);
        if ($request->file('images')) {
           
            $image_old = $member->image;  // Value is not URL but directory file path
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
            $tujuan_upload = 'images/member';


            $nameFile = $member->id . '.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['image'] =  $tujuan_upload . '/' . $nameFile;

            $member->update($request->only('image'));
        }
         if ($request->file('imagesbanner')) {
          
            $image_old = $member->imagebanner;  // Value is not URL but directory file path
            if (File::exists($image_old)) {
                File::delete($image_old);
            }
            // menyimpan data file yang diupload ke variabel $file
            $image = $request->file('imagesbanner');
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
            $tujuan_upload = 'images/member';


            $nameFile = $member->id . '_banner.' . $image->getClientOriginalExtension();
            $image->move($tujuan_upload, $nameFile);

            $request['imagebanner'] =  $tujuan_upload . '/' . $nameFile;

            $member->update($request->only('imagebanner'));
        }
       
            $member->update($request->only( 'name', 'descp','status'));
            if($request->status == '2')
            {
                Produk::where('member',$member->id)->update(['member'=>null]);
            }
        
        return redirect('member')->with(['success' => '`' . $request->name . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Member $member)
    {
        $name = $member->name;
        $image_old = $member->image;  // Value is not URL but directory file path
        if (File::exists($image_old)) {
            File::delete($image_old);
        }

        Produk::where('member',$member->id)->update(['member'=>null]);
        MemberDetail::where('id_member',$member->id)->delete();
        MemberSosmed::where('member',$member->id)->delete();
        $member->delete();


        return redirect('member')->with(['success' => '`' . $name . '` Berhasil dihapus']);
    }
}

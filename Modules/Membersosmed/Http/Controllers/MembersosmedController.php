<?php

namespace Modules\Membersosmed\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Modules\Membersosmed\Entities\MemberSosmed;
use Modules\Sosmed\Entities\Sosmed;

class MembersosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data=MemberSosmed::fetch($request);
        $member=to_dropdown(Member::Landing(),'id','name');
        $sosmed=to_dropdown(Sosmed::All(),'id','name');
        return view('membersosmed::index',compact('data','member','sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new MemberSosmed();
        $member=to_dropdown(Member::Landing(),'id','name');
        $sosmed=to_dropdown(Sosmed::All(),'id','name');
        return view('membersosmed::form',compact('d','member','sosmed'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
    MemberSosmed::create($request->only( 'url', 'member','sosmed'));
    $name = Member::find($request->member)->name;
    $name_sosmed = Sosmed::find($request->sosmed)->name;
        return redirect('membersosmed')->with(['success' => '`' . $name  . '-'.$name_sosmed.'` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('membersosmed::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(MemberSosmed $membersosmed)
    {
        $d=$membersosmed;
        $member=to_dropdown(Member::Landing(),'id','name');
        $sosmed=to_dropdown(Sosmed::All(),'id','name');
        return view('membersosmed::form',compact('d','member','sosmed'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,MemberSosmed $membersosmed)
    {
        $membersosmed->update($request->only( 'url','sosmed'));
        $name = Member::find($membersosmed->member)->name;
        $name_sosmed = Sosmed::find($membersosmed->sosmed)->name;
        return redirect('membersosmed')->with(['success' => '`' . $name .  '-'.$name_sosmed.' ` Berhasil disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(MemberSosmed $membersosmed)
    {
        $name = Member::find($membersosmed->member)->name;
        $name_sosmed = Sosmed::find($membersosmed->sosmed)->name;
        $membersosmed ->delete();

        return redirect('membersosmed')->with(['success' => '`' . $name . '-'.$name_sosmed.'` Berhasil dihapus']);
    }
}

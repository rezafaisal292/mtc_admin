<?php

namespace Modules\Memberdetail\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Member\Entities\Member;
use Modules\Membersosmed\Entities\MemberSosmed;

class MemberDetail extends Model
{
	use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'url',
        'image',
        'label',
        'descp',
        'id_member',
        'status',
    ];
    protected $table = 'app_member_detail';

	protected 	$primaryKey = 'id';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
    public $incrementing = false;

    public function scopefetch($query, $request, $export = false)
    {
        if($request->status)
        $query->where('status',$request->status);

        if($request->id_member)
        $query->where('id_member',$request->id_member);

        $q = $query->select();
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->orderby('name','asc')->get();
    }

    public function member()
    {
        return $this->hasOne(Member::class,'id','id_member');
    }

}

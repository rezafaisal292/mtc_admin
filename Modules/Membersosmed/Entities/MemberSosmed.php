<?php

namespace Modules\Membersosmed\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Member\Entities\Member;
use Modules\Sosmed\Entities\Sosmed;

class MemberSosmed extends Model
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
        'sosmed',
        'member',
        
    ];
    protected $table = 'app_member_sosmed';

	protected 	$primaryKey = 'id';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
    public $incrementing = false;

    public function scopefetch($query, $request, $export = false)
    {
        if($request->member)
            $query->where('member',$request->member);

        if($request->member)
        $query->where('sosmed',$request->member);

        $q = $query->select()->orderby('member');
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->orderby('member')->get();
    }

    public function scopeLandingHome($query)
    {

        $q = $query->select()->where('status','1')->orderby('updated_at','desc')->paginate(4);
          
        return $q;
    }

    public function scopeFindByLabel($query, string $value)
    {
        return $query->where('label', $value)->first();
    }

    public function members()
    {
        return $this->hasOne(Member::class,'id','member');
    }
    public function sosmeds()
    {
        return $this->hasOne(Sosmed::class,'id','sosmed');
    }


}

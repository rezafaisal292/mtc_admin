<?php

namespace Modules\Memberdetail\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        if($request->name)
        $query->where('name','ilike','%'.$request->name.'%');

        $q = $query->select();
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->orderby('name','asc')->get();
    }


}

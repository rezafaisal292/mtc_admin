<?php

namespace Modules\Member\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Membersosmed\Entities\MemberSosmed;

class Member extends Model
{
	use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'image',
        'imagebanner',
        'name',
        'descp',
        'status',
    ];
    protected $table = 'app_member';

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


    public function scopeAll($query)
    {

        $q = $query->select()->orderby('name','asc')->get();
          
        return $q;
    }
    public function scopeLanding($query)
    {
        $q = $query->select()->orderby('name','asc')->paginate(10);
          
        return $q;
    }
    public function scopeFindByName($query, string $value)
    {
        return $query->where('name', $value)->first();
    }

    public function membersosmed()
    {
        return $this->hasMany(MemberSosmed::class,'member','id');
    }

}

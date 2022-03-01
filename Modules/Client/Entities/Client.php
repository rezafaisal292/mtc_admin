<?php

namespace Modules\Client\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
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
        'label',
        'descp',
        'status',
        
    ];
    protected $table = 'app_client';

	protected 	$primaryKey = 'id';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
    public $incrementing = false;

    public function scopefetch($query, $request, $export = false)
    {
        if($request->label)
            $query->where('label','like','%'.$request->label.'%');

        if($request->member)
            $query->where('member',$request->member);

        if($request->services)
            $query->where('services',$request->services);


        if($request->tipe_produk)
        $query->where('tipe_produk',$request->tipe_produk);

        if($request->status)
        $query->where('status',$request->status);


        $q = $query->select();
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->get();
    }

    public function scopeLandingHome($query)
    {

        $q = $query->select()->where('status','1')->orderby('urutan','desc')->get();
          
        return $q;
    }

    public function scopeFindByLabel($query, string $value)
    {
        return $query->where('label', $value)->first();
    }

}

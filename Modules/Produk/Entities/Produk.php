<?php

namespace Modules\Produk\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Member\Entities\Member;
use Modules\Services\Entities\Services;

class Produk extends Model
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
        'member',
        'services',
        'tipe_produk',
        'status'
        
    ];
    protected $table = 'app_produk';

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

        $q = $query->select()->where('status','1')->where('tipe_produk','1')->orderby('updated_at','desc')->paginate(4);
          
        return $q;
    }

    public function scopeLandingProduk($query)
    {
        $q = $query->select()->where('status','1')->where('tipe_produk','1')->orderby('updated_at','desc')->paginate(10);  
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
    public function service()
    {
        return $this->hasOne(Services::class,'id','services');
    }


}

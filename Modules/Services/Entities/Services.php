<?php

namespace Modules\Services\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Produk\Entities\Produk;

class Services extends Model
{
	use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id',
        'icon',
        'label',
        'descp',
        'status',
    ];
    protected $table = 'app_services';

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
            $query->where('label','ilike','%'.$request->label.'%');

        $q = $query->select();
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->get();
    }

    public function scopeLanding($query)
    {

        $q = $query->select()->where('status','1')->orderby('label','asc')->get();
          
        return $q;
    }

    public function scopeFindByName($query, string $value)
    {
        return $query->where('label', $value)->first();
    }

     public function produks()
    {
        return $this->hasMany(Produk::class,'services','id')->where('status','1')->where('tipe_produk','1')->orderBy('label');
    }

}

<?php

namespace Modules\Produk\Entities;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

        $q = $query->select()->where('status','1')->orderby('updated_at','desc')->paginate(4);
          
        return $q;
    }

    public function scopeFindByLabel($query, string $value)
    {
        return $query->where('label', $value)->first();
    }

}

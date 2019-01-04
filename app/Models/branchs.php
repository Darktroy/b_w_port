<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class branchs extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'branchs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'branch_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'company_id',
                  'name',
                  'address'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the company for this model.
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id','company_id');
    }


    public function showAll($userId) {
        $companyId = userToCompany::where('user_id',$userId)->first();
        return self::where('company_id', $companyId->company_id)->get();
    }
    
}

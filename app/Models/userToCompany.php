<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userToCompany extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_to_companies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'userToCompany_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'company_id',
                  'user_id','role_id','departement_id'
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
    public function theCompany()
    {
        return $this->belongsTo('App\Models\company','company_id');
    }

    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }



}

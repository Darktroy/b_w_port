<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interestes extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'interestes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'interest_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name'
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
    



}

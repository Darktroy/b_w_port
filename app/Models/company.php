<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'company_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'company_card_template',
                  'company_name',
                  'company_logo',
                  'company_landline',
                  'company_fax',
                  'company_address',
                  'company_website',
                  'company_about',
                  'company_facebook',
                  'company_twitter',
                  'company_instagram',
                  'company_youtube',
                  'company_field',
                  'company_industry',
                  'company_speciality',
                  'company_countary',
                  'company_city',
                  'company_district',
                'company_tax_card','company_registery','user_id'
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

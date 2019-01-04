<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departements';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'departement_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
//                  'departement_id',
                  'branch_id',
                  'company_id',
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
    
    /**
     * Get the branch for this model.
     */
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }

    /**
     * Get the company for this model.
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id');
    }

    public function showBelongToBranch($branchId,$userId) {
        
        $companyId = userToCompany::where('user_id',$userId)->first();
        $data = self::where('branch_id',$branchId)->where('company_id', $companyId->company_id)->get();
        return $data;
    }
    public function showWithoutBranch($userId) {
        
        $companyId = userToCompany::where('user_id',$userId)->first();
        $data = self::where('company_id', $companyId->company_id)->get();
        return $data;
    }
    public function showDepartementsOfCompany($userId) {
        
        $companyId = userToCompany::where('user_id',$userId)->first();
        $data = self::where('company_id', $companyId->company_id)->get();
        return $data;
    }
    public function showEmployeeListOfDepartements($userId,$depId) {
        $employeesids = null;
        $companyId = userToCompany::where('user_id',$userId)->first();
//        $data = self::where('company_id', $companyId->company_id)->get();
        if($depId = 0){
            $employeesids = userToCompany::select('user_id as id')->where('company_id', $companyId->company_id)->get()->toArray();
        } else {
            $employeesids = userToCompany::select('user_id as id')->where('company_id', $companyId->company_id)->where('departement_id', $depId)->get()->toArray();
        }
        $data = \App\User::whereIn('id',$employeesids)->get();
        return $data;
    }
}

<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\company;
use App\Models\cards;
use App\Models\branchs;
use App\Models\departement;
use App\Models\userToCompany;

class User extends Authenticatable
{    
    use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','first_name',
        ''
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getIOneEmployeeData($email) {
        $data = self::where('email',$email)->with('userCard','userToCompany')->first();
        /*
        dd($data['userToCompany']);
          "userToCompany_id" => 1
    "created_at" => "2018-12-30 13:47:43"
    "updated_at" => "2018-12-30 13:47:43"
    "company_id" => 8
    "user_id" => 28
    "role_id" => 1
    "departement_id" => 2*/
        return $data;
    }
    
    public function getAllEmployeeData($id) {
        
        $data = self::where('id',$id)->with('userCard','userToCompany')->first();
        $companyId = $data['userToCompany']->company_id;
        $userIDs = userToCompany::where('company_id',$companyId)->select('user_id AS id')->get()->toArray();
        $users = self::whereIn('id',$userIDs)->with('userCard','userToCompany')->get();
        $users = self::whereIn('id',$userIDs)->get()->toArray();
//        dd($users);
        /*
        dd($data['userToCompany']);
          "userToCompany_id" => 1
    "created_at" => "2018-12-30 13:47:43"
    "updated_at" => "2018-12-30 13:47:43"
    "company_id" => 8
    "user_id" => 28
    "role_id" => 1
    "departement_id" => 2*/
        return $users;
    }
    public function userCard() {
        return $this->hasOne('App\Models\cards', 'user_id','id');
    }
    public function userToCompany() {
        return $this->hasOne('App\Models\userToCompany', 'user_id','id');
    }
    
    public function updateEmail($email,$data) {
        $user = self::where('email',$email)->first();
                
        $dataUpdated = self::where('email',$email)->update(array('first_name' => $data['first_name'],'last_name' => $data['last_name']
                ,'name' => $data['first_name'].' '.$data['last_name']));
        $cardDataUpdated = cards::where('user_id',$user['id'])->update(array('first_name' => $data['first_name'],'last_name' => $data['last_name']
                ,'position'=>$data['position']
                ,'cell_phone_number'=>$data['phone'],'landline'=>$data['landline'],'fax'=>$data['fax']
                ,'gender'=>$data['gender'],'alias'=>$data['alias']));
        
    }
}

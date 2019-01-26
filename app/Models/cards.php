<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
    use Validator;
use Exception;


class cards extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cards';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'card_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'user_id','last_name','first_name',
                    'create_by',
                    'privacy',
                    'company_name',
                    'position',
                    'cell_phone_number',
                    'landline',
                    'fax',
                    'website_url',
                    'about_me',
                    'template_layout_id',
                    'picture',
                    'personal',
                    'card_holder_id',
                    'logo',
                    'alias','email',
                    'facebook_url',
                    'twitter_url',
                    'instagram_url',    
                    'youtube_url',
                    'company_id',
                    'gender'
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
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function interests()
    {
        return $this->hasMany('App\Models\card_to_interests','card_id');
    }

    public function advancedSearching(Request $request) {
       /*
        $rules = [
            'city' => 'required|nullable',
            'country' => 'required|string|nullable',
            'district' => 'required|string|nullable',
            'field' => 'required|string|min:0|nullable',
            'specialty' => 'required|string|min:0|nullable',
            'industry' => 'required|string|min:0|nullable',
            'last_name' => 'required|string|min:0|nullable',
            'first_name' => 'required|string|min:0|nullable',
            'alias' => 'required|string|min:0|nullable',
            'landline' => 'required|string|min:0|nullable',
            'fax' => 'required|string|min:0|nullable',
            'cell_phone_number' => 'required|string|min:0|nullable',
            'position' => 'required|string|min:0|nullable',
            'website_url' => 'required|string|min:0|nullable',
            'company_name' => 'required|string|min:0|nullable',
        ];
        $messages =[
            'city.required' => 'Please Enter valid city',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        if ($data->fails()) { 
            return response()->json([ 'status' => 'error','error'=>$data->errors(),'status-code'=>401,'code'=>100],200);
        } */
        $data = $request->all();
        $profile_object = profile::select('user_id');
        if(!empty($data['industry'])){  $profile_object->where('industry', 'LIKE', '%' . $data['industry'] . '%');}
        if(!empty($data['specialty'])){ $profile_object->where('specialty', 'LIKE', '%' . $data['specialty'] . '%');}
        if(!empty($data['field'])){ $profile_object->where('field', 'LIKE', '%' . $data['field'] . '%'); }
        if(!empty($data['district'])){ $profile_object->where('district', 'LIKE', '%' . $data['district'] . '%'); }
        if(!empty($data['country'])){ $profile_object->where('country', 'LIKE', '%' . $data['country'] . '%'); }
        if(!empty($data['city'])){ $profile_object->where('city', 'LIKE', '%' . $data['city'] . '%'); }
        $profiles_rows = $profile_object->get()->toArray();
        $ids = [];
        foreach ($profiles_rows as $key => $value) {
            $ids[]=$value['user_id'];
        }
        $cards_object = new self();
//        if(!empty($ids)){
        $searchingCARDSresult_row = $cards_object::where('personal', 1)
               
                ->where(function($query)use($data,$ids) {
                    (!empty($data['first_name']) ? $query->where('first_name', 'LIKE', '%' . $data['first_name'] . '%'): '');
                    (!empty($ids) ? $query->orWhereIn('user_id', $ids):"");
                    (!empty($data['last_name']) ? $query->orWhere('last_name', 'LIKE', '%' . $data['last_name'] . '%') :"");
                    (!empty($data['alias']) ? $query->orWhere('alias', 'LIKE', '%' . $data['alias'] . '%') :"");
                    (!empty($data['landline']) ? $query->orWhere('landline', 'LIKE', '%' . $data['landline']  . '%'):"");
                    (!empty($data['fax']) ? $query->orWhere('fax', 'LIKE', '%' . $data['fax']  . '%'):"");
                    (!empty($data['cell_phone_number']) ? $query->orWhere('cell_phone_number', 'LIKE', '%' . $data['cell_phone_number']  . '%'):"");
                    (!empty($data['position']) ? $query->orWhere('position', 'LIKE', '%' . $data['position']  . '%'):"");
                    (!empty($data['website_url']) ? $query->orWhere('website_url', 'LIKE', '%' . $data['website_url']  . '%'):"");
                    (!empty($data['company_name']) ? $query->orWhere('company_name', 'LIKE', '%' . $data['company_name']  . '%'):"");
                    return $query;
                 })
               /* */
                        ->select('card_id','first_name','last_name','company_name','position','template_layout_id','logo','picture')
//                        ->toSql();
                        ->get()->toArray();
//        dd($searchingCARDSresult_row);
            return $searchingCARDSresult_row;
       
            
//        } else {
//            $searchingCARDSresult_row = $cards_object::where('personal', 1)
//                ->where(function($query)use($data,$ids) {
//                        return $query->where('first_name', 'LIKE', '%' . $term . '%')
//                        ->orWhere('last_name', 'LIKE', '%' . $term . '%')
//                        ->orWhere('alias', 'LIKE', '%' . $term . '%')
//                        ->orWhere('landline', 'LIKE', '%' . $term . '%')
//                        ->orWhere('fax', 'LIKE', '%' . $term . '%')
//                        ->orWhere('cell_phone_number', 'LIKE', '%' . $term . '%')
//                        ->orWhere('position', 'LIKE', '%' . $term . '%')
//                        ->orWhere('website_url', 'LIKE', '%' . $term . '%')
//                        ->orWhere('company_name', 'LIKE', '%' . $term . '%');
//                })->select('card_id','first_name','last_name','company_name','position','template_layout_id','logo','picture')->get()->toArray();
//       
//            
//    
//        } 
    }
    
    public function searching($term) {
        
        $profiles_rows = profile::where('industry', 'LIKE', '%' . $term . '%')
                ->orWhere('specialty', 'LIKE', '%' . $term . '%')
                ->orWhere('field', 'LIKE', '%' . $term . '%')
                ->orWhere('district', 'LIKE', '%' . $term . '%')
                ->orWhere('country', 'LIKE', '%' . $term . '%')
                ->orWhere('city', 'LIKE', '%' . $term . '%')->select('user_id')->get()->toArray();
        $ids = [];
        foreach ($profiles_rows as $key => $value) {
            $ids[]=$value['user_id'];
        }
        $cards_object = new self();
        $searchingCARDSresult_row=null;
         if(!empty($ids)){
        $searchingCARDSresult_row = $cards_object::where('personal', 1)
                ->where(function($query)use($term,$ids) {
                        return $query->where('first_name', 'LIKE', '%' . $term . '%')
                        ->orWhereIn('user_id', $ids)
                        ->orWhere('last_name', 'LIKE', '%' . $term . '%')
                        ->orWhere('alias', 'LIKE', '%' . $term . '%')
                        ->orWhere('landline', 'LIKE', '%' . $term . '%')
                        ->orWhere('fax', 'LIKE', '%' . $term . '%')
                        ->orWhere('cell_phone_number', 'LIKE', '%' . $term . '%')
                        ->orWhere('position', 'LIKE', '%' . $term . '%')
                        ->orWhere('website_url', 'LIKE', '%' . $term . '%')
                        ->orWhere('company_name', 'LIKE', '%' . $term . '%');
                })->select('card_id','first_name','last_name','company_name','position','template_layout_id','logo','picture')->get()->toArray();
       
            
        } else {
            $searchingCARDSresult_row = $cards_object::where('personal', 1)
                ->where(function($query)use($term,$ids) {
                        return $query->where('first_name', 'LIKE', '%' . $term . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $term . '%')
                        ->orWhere('alias', 'LIKE', '%' . $term . '%')
                        ->orWhere('landline', 'LIKE', '%' . $term . '%')
                        ->orWhere('fax', 'LIKE', '%' . $term . '%')
                        ->orWhere('cell_phone_number', 'LIKE', '%' . $term . '%')
                        ->orWhere('position', 'LIKE', '%' . $term . '%')
                        ->orWhere('website_url', 'LIKE', '%' . $term . '%')
                        ->orWhere('company_name', 'LIKE', '%' . $term . '%');
                })->select('card_id','first_name','last_name','company_name','position','template_layout_id','logo','picture')->get()->toArray();
       
            
    
        }
        return $searchingCARDSresult_row;
    }
    
//    
//    private function functionName($param) {
//        
//    }
}

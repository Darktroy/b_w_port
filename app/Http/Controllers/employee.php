<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\company;
use App\Models\cards;
use App\Models\branchs;
use App\Models\departement;
use App\Models\userToCompany;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth; 
    use Validator;
use Exception;


class employee extends Controller
{
    public function show($userEmail)
    {
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $data = new User();
        $data = $data->getIOneEmployeeData($userEmail);
        if($data != NULL){
//                $companyObj = new company();
                $branchObject = new branchs();
                $departmentObj = new departement();
                $branches = $branchObject->showAll($user->id);//28
                $departements = $departmentObj->showDepartementsOfCompany($user->id);
            return view('companyadminpanel.showEditEmployee', compact('data','branches','departements'));
        }else{
            // noDataFound
            return view('companyadminpanel.noDataFound');
        }
    }
    public function showAll() {
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $data = new User();
        $employeeList = $data->getAllEmployeeData($user->id);
        if($data != NULL){
            return view('companyadminpanel.employeeListIndex', compact('employeeList'));
        }else{
            // noDataFound
            return view('companyadminpanel.noDataFound');
        }
    }
    
    public function update($userEmail, Request $request ) {
            try {
                DB::beginTransaction();
                $user = Auth::user();
                if($user == Null ){
                    redirect(url('/'));
                }
                $data = $request->all();
                $data = $this->getData($request);
                if ($data->fails()) { 
                    throw new Exception();
                }
                
                $dataUpdate = new User();
                $data = $dataUpdate->updateEmail($userEmail,$request->all());
        
                DB::commit();
                
                $companyObj = new company();
                $branchObject = new branchs();
                $departmentObj = new departement();
                $branches = $branchObject->showAll($user->id);//28
                $departements = $departmentObj->showDepartementsOfCompany($user->id);
                
                return view('companyadminpanel.createEmployee', compact('branches','departements'));
                
            } catch (Exception $exc) {
                DB::rollBack();
                return back()->withInput()->withErrors(['unexpected_error' => $exc->getMessage()]);
            }
        }
        
        
    protected function getData(Request $request)
    {
      
        $rules = [ 
            'departement_id' => 'required|int|min:1|exists:departements,departement_id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'position' => 'required|string|min:1',
            'phone' => 'required|string|min:1',
            'landline' => 'required|string|min:1',
            'fax' => 'required|string|min:1',
            'alias' => 'required|string|min:1',
            'gender' => 'required|string|min:1',
        ];
        
//        $data = $request->validate($rules);
       
        $messages =[
            'departement_id.required' => 'Please Enter valid picture',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;
//        return $data;
    }   
}

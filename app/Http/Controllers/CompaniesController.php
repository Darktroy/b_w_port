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

class CompaniesController extends Controller
{

    /**
     * Display a listing of the companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $companies = company::paginate(25);

        return view('companyadminpanel.masterLayout', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('companies.registerComapny');
    }
//          createEmployee
    public function createEmployee()
    {
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $companyObj = new company();
        $branchObject = new branchs();
        $departmentObj = new departement();
        $branches = $branchObject->showAll($user->id);//28
        $departements = $departmentObj->showDepartementsOfCompany($user->id);
        return view('companyadminpanel.createEmployee', compact('branches','departements'));
    }
    
    public function storeEmployee(Request $request) {
        try {
            
            DB::beginTransaction();
            $user = Auth::user();
                if($user == Null ){
                    redirect(url('/'));
                }
                $companyId = userToCompany::with('theCompany')->where('user_id',$user->id)->first();
                $userAdminId = $user->id;
                 $validator = Validator::make($request->all(), [ 
                              'first_name' => 'required', 
                              'last_name' => 'required', 
                              'landline' => 'required', 
                              'fax' => 'required', 
                              'alias' => 'required', 
                              'gender' => 'required', 
                              'phone' => 'required', 
                              'email' => 'required|email|unique:users,email', 
                              'password' => 'required', 
                              'c_password' => 'required|same:password', 
                            ]);
                            if ($validator->fails()) { 
        //                      return response()->json(['data'=>$validator->errors(),'status'=>'erroe','status-code'=>'403','code'=>100],200);
                                return back()->withInput()->withErrors(['unexpected_error' =>$validator->errors()]);
                            }
                            $postArray = $request->all(); 
                            $postArray['name'] = $postArray['first_name'].' '.$postArray['last_name'];
                            $postArray['first_name'] = $postArray['first_name'];
                            $postArray['last_name'] = $postArray['last_name'];
                            $postArray['email'] = $postArray['email'];
        //                    $postArray['password'] = bcrypt($postArray['password']); 
                            $postArray['password'] = Hash::make($postArray['password']); 
                            $user = User::create($postArray); 
                            $usertocompany = userToCompany::create(array('user_id'=>$user->id,'departement_id'=>$postArray['departement_id'],'role_id'=>2,'company_id'=>$companyId->company_id));
                            $userDataCard = cards::create(array('first_name'=>$postArray['first_name'],'last_name'=>$postArray['last_name'],
                                'company_id'=>$companyId->company_id,'user_id'=>$user->id,
                                'create_by'=>$userAdminId,'privacy'=>0,'company_name'=>$companyId['theCompany']->company_name,'cell_phone_number'=>$postArray['phone'],'landline'=>$postArray['landline'],'fax'=>$postArray['fax'],'position'=>$postArray['position'],'website_url'=>$companyId['theCompany']->company_website,'personal'=>0,'card_holder_id'=>0,'alias'=>$postArray['alias'],'template_layout_id'=>0,'gender'=>$postArray['gender'],));
                    
                DB::commit();
                $companyObj = new company();
                $branchObject = new branchs();
                $departmentObj = new departement();
                $branches = $branchObject->showAll($user->id);//28
                $departements = $departmentObj->showDepartementsOfCompany($user->id);
                
                return view('companyadminpanel.createEmployee', compact('branches','departements'));
        } catch (Exception $exc) {
            DB::rollBack();
//            echo $exc->getTraceAsString();
            return back()->withInput()->withErrors(['unexpected_error' =>$exc->getMessage()]);
        }

        
    }
    /**
     * Store a new company in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $companyObj = new self();
        try {
        DB::beginTransaction();

        $userdetails = $companyObj->createUser($request);
       $data = $request->all();
        $data = $this->getData($request);
        if ($data->fails()) { 
            throw new Exception();
        }
       $data = $request->all();  
       if($request->hasFile("company_registry_paper")){
                if (isset($data['company_registry_paper']) &&!empty($data['company_registry_paper'])){ 
                    $imageName = 'RP'.time().'.'.$data['company_registry_paper']->getClientOriginalExtension();
                    $data['company_registry_paper']->move(public_path('/companyregistrypaper'), $imageName);
                    $data['company_registery']=$imageName;    
                } 
            }
       if($request->hasFile("company_tax_card")){
                if (isset($data['company_tax_card']) &&!empty($data['company_tax_card'])){ 
                     
                    $imageName = 'TC'.time().'.'.$data['company_tax_card']->getClientOriginalExtension();
                    $data['company_tax_card']->move(public_path('/companytaxcard'), $imageName);
                    $data['company_tax_card']=$imageName;   
                } 
            }
            $data['user_id']= $userdetails['id'];
            $compayDetails = company::create($data);
            \App\Models\userToCompany::create(array("company_id"=>$compayDetails['company_id'] ,
                "user_id"=>$data['user_id'],"role_id"=>1));
            DB::commit();
            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully added!');

        } catch (Exception $exception) { 
              DB::rollBack();
            return back()->withInput()
                         ->withErrors(['unexpected_error' => $exception->getMessage()]);
//                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
    
    private function createUser(Request $request) {
        
         $validator = Validator::make($request->all(), [ 
                      'admin_first_name' => 'required', 
                      'admin_last_name' => 'required', 
                      'admin_phone' => 'required', 
                      'admin_email' => 'required|email|unique:users,email', 
                      'password' => 'required', 
                      'c_password' => 'required|same:password', 
//                      'lang' => 'required|string|min:2|max:2', 
                      'accept_terms' => 'required|int|size:1', 
                    ]);
                    if ($validator->fails()) { 
//                      return response()->json(['data'=>$validator->errors(),'status'=>'erroe','status-code'=>'403','code'=>100],200);
                        throw Exception();
                    }
                    $postArray = $request->all(); 
                    $postArray['name'] = $postArray['admin_first_name'].' '.$postArray['admin_last_name'];
                    $postArray['first_name'] = $postArray['admin_first_name'];
                    $postArray['last_name'] = $postArray['admin_last_name'];
                    $postArray['email'] = $postArray['admin_email'];
//                    $postArray['password'] = bcrypt($postArray['password']); 
                    $postArray['password'] = Hash::make($postArray['password']); 
                    $user = User::create($postArray); 
                    return $user;
//                    $success['token'] =  $user->createToken('LaraPassport x')->accessToken; 
                    
                    }
    
    /**
     * Display the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $company = company::findOrFail($id);

        return view('companies.show', compact('company'));
    }
    public function showDetails()
    {
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $companyId = userToCompany::with('theCompany')->where('user_id',$user->id)->first();
        
        $company = company::findOrFail($companyId->company_id);

        return view('companyadminpanel.showEditCompanyProfile', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $company = company::findOrFail($id);
        

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $company = company::findOrFail($id);
            $company->update($data);

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

     public function companyUpdate( Request $request)
    {
        try {
             $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $companyId = userToCompany::with('theCompany')->where('user_id',$user->id)->first();
        
            $data = $this->getDataUpdating($request);
            if($data->fails()){
                throw new Exception($data->errors());
            }
            $data = $request->all();
            $company = company::findOrFail($companyId->company_id);
            $company->update($data);
            
            return redirect()->route('companies.company.index');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }        
    }
    
    /**
     * Remove the specified company from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $company = company::findOrFail($id);
            $company->delete();

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
      
        $rules = [
//           'company_card_template' => 'file|min:1',
            'company_name' => 'required|string|min:1',
            'company_registry_paper' => 'required|file',
            'company_tax_card' => 'required|file',
            'company_landline' => 'required|string|min:1',
            'company_fax' => 'required|string|min:1|nullable',
            'company_address' => 'required|string|min:1',
            'company_website' => 'string|min:1',
//            'company_about' => 'string|min:1',
//            'company_facebook' => 'string|min:1|nullable',
//            'company_twitter' => 'string|min:1|nullable',
//            'company_instagram' => 'string|min:1|nullable',
//            'company_youtube' => 'string|min:1|nullable',
//            'company_field' => 'string|min:1',
//            'company_industry' => 'string|min:1',
//            'company_speciality' => 'string|min:1',
//            'company_countary' => 'string',
//            'company_city' => 'string|min:1',
//            'company_district' => 'string|min:1', 
     
        ];
        
//        $data = $request->validate($rules);
       
        $messages =[
            'picture.required' => 'Please Enter valid picture',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;
//        return $data;
    }

    protected function getDataUpdating(Request $request) {
        
        $rules = [
//           'company_card_template' => 'file|min:1',
            'company_landline' => 'required|string|min:1',
            'company_fax' => 'required|string|min:1|nullable',
            'company_address' => 'required|string|min:1',
            'company_website' => 'string|min:1',
        ];
        
//        $data = $request->validate($rules);
       
        $messages =[
            'picture.required' => 'Please Enter valid picture',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;
    }
}

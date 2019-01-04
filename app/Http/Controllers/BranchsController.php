<?php

namespace App\Http\Controllers;

use App\Models\branchs;
use App\Models\Company;
use App\Models\departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth; 
    use Validator;

class BranchsController extends Controller
{
    private $userId = null;
    private $banchObject = null;
    private $departementObject = null;
    
     function __construct() {
//        parent::__construct();
//        $this->userId = Auth::user();
//        dd($this->userId);
//        $this->userId = $user->id;
        $this->banchObject = new branchs();
        $this->departementObject = new departement();
        
    }
    
    public function index()
    {
        
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $branchsObjects = $this->banchObject->showAll($user->id);

        return view('companyadminpanel.brancheIndex', compact('branchsObjects',$branchsObjects));
    }

    /**
     * Show the form for creating a new branchs.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
//        $companies = Company::pluck('id','id')->all();
        
//        return view('branchs.create', compact('companies'));
        
        return view('companyadminpanel.addbranche');
    }

    /**
     * Store a new branchs in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        try {
            
            $data = $this->getData($request);
            if ($data->fails()) { 
                throw new Exception();
            }
            $data = $request->all();
            $companyDetails = \App\Models\company::where('user_id',$user->id)->get();
            $data['company_id'] = $companyDetails[0]['company_id'];
            branchs::create($data);

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Branchs was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified branchs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    { 
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $branchsObjects = branchs::findOrFail($id);
        $departements = $this->departementObject->showBelongToBranch($id,$user->id);
        return view('companyadminpanel.departemenetsIndex', compact('branchsObjects','departements'));
    }

    public function showAllDepartements()
    { 
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        $branchsObjects=[]; 
        $branchsObjects['name'] = ' All branches departments ';
        $departements = $this->departementObject->showWithoutBranch($user->id);
        return view('companyadminpanel.departemenetsIndex', compact('branchsObjects','departements'));
    }

    /**
     * Show the form for editing the specified branchs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $branchs = branchs::findOrFail($id);
        $companies = Company::pluck('id','id')->all();

        return view('branchs.edit', compact('branchs','companies'));
    }

    /**
     * Update the specified branchs in the storage.
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
            
            $branchs = branchs::findOrFail($id);
            $branchs->update($data);

            return redirect()->route('branchs.branchs.index')
                             ->with('success_message', 'Branchs was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified branchs from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $branchs = branchs::findOrFail($id);
            $branchs->delete();

            return redirect()->route('branchs.branchs.index')
                             ->with('success_message', 'Branchs was successfully deleted!');

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
            'name' => 'required|string|min:1|max:255',
            'address' => 'required|string|min:1',
     
        ];
        
        $messages =[
            'picture.required' => 'Please Enter valid picture',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;


        return $data;
    }

}

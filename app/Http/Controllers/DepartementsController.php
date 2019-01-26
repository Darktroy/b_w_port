<?php

namespace App\Http\Controllers;

use App\Models\branchs;
use App\Models\Company;
use App\Models\departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth; 
    use Validator;
use Exception;

class DepartementsController extends Controller
{

    /**
     * Display a listing of the departements.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $departements = departement::with('branch','company')->paginate(25);

        return view('departements.adddepartment', compact('departements'));
    }

    /**
     * Show the form for creating a new departement.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        $user = Auth::user();
//        dd($user->id);
        $company = \App\Models\company::where('user_id',$user->id)->first();
        $data['company_id'] = $company->company_id;
        
        $branches = branchs::where('company_id',$data['company_id'])->get();
        
        return view('companyadminpanel.adddepartment', compact('branches'));
    }

    /**
     * Store a new departement in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        try {
//            dd($request->all());
            $data = $this->getData($request);
            if ($data->fails()) { 
                throw new Exception();
            }   
            $data =$request->all();
            $data['user_id'] = $user->id;
            $company = \App\Models\company::where('user_id',$user->id)->first();
            $data['company_id'] = $company->company_id;
            departement::create($data);

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Departement was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified departement.
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
        // showEmployeeListOfDepartements
        $dep_obj = new departement();
        $employeeList = $dep_obj->showEmployeeListOfDepartements($user->id, $id);
        return view('companyadminpanel.employeeListIndex', compact('employeeList'));
    }
     
    public function showAllDepartements()
    {
        $user = Auth::user();
        if($user == Null ){
            redirect(url('/'));
        }
        // showEmployeeListOfDepartements
        $dep_obj = new departement();
        $employeeList = $dep_obj->showEmployeeListOfDepartements($user->id, 0);

        return view('companyadminpanel.employeeListIndex', compact('employeeList'));
    }

    /**
     * Show the form for editing the specified departement.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $departement = departement::findOrFail($id);
        $branches = Branch::pluck('branch_id','id')->all();
$companies = Company::pluck('id','id')->all();

        return view('departements.edit', compact('departement','branches','companies'));
    }

    /**
     * Update the specified departement in the storage.
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
            
            $departement = departement::findOrFail($id);
            $departement->update($data);

            return redirect()->route('departements.departement.index')
                             ->with('success_message', 'Departement was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified departement from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $departement = departement::findOrFail($id);
            $departement->delete();

            return redirect()->route('departements.departement.index')
                             ->with('success_message', 'Departement was successfully deleted!');

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
            'name' => 'string|min:1|max:255',
            'branch_id' => 'string|min:1|max:255',
     
        ];
        
        
        $messages =[
            'picture.required' => 'Please Enter valid picture',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;
    }

}

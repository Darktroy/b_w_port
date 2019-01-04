<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\userToCompany;
use App\Http\Controllers\Controller;
use Exception;

class UserToCompaniesController extends Controller
{

    /**
     * Display a listing of the user to companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $userToCompanies = userToCompany::with('company','user')->paginate(25);

        return view('user_to_companies.index', compact('userToCompanies'));
    }

    /**
     * Show the form for creating a new user to company.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $companies = Company::pluck('id','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('user_to_companies.create', compact('companies','users'));
    }

    /**
     * Store a new user to company in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            userToCompany::create($data);

            return redirect()->route('user_to_companies.user_to_company.index')
                             ->with('success_message', 'User To Company was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified user to company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $userToCompany = userToCompany::with('company','user')->findOrFail($id);

        return view('user_to_companies.show', compact('userToCompany'));
    }

    /**
     * Show the form for editing the specified user to company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $userToCompany = userToCompany::findOrFail($id);
        $companies = Company::pluck('id','id')->all();
$users = User::pluck('id','id')->all();

        return view('user_to_companies.edit', compact('userToCompany','companies','users'));
    }

    /**
     * Update the specified user to company in the storage.
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
            
            $userToCompany = userToCompany::findOrFail($id);
            $userToCompany->update($data);

            return redirect()->route('user_to_companies.user_to_company.index')
                             ->with('success_message', 'User To Company was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified user to company from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $userToCompany = userToCompany::findOrFail($id);
            $userToCompany->delete();

            return redirect()->route('user_to_companies.user_to_company.index')
                             ->with('success_message', 'User To Company was successfully deleted!');

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
            'userToCompany_id' => 'nullable',
            'company_id' => 'nullable',
            'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

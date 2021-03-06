<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\staging;
use Illuminate\Http\Request;
use App\Models\ActivationProcess;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth; 
    use Illuminate\Support\Facades\DB;
    use Validator;
use Exception;

class ActivationProcessesController extends Controller
{

    /**
     * Display a listing of the activation processes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $activationProcesses = ActivationProcess::with('user')->paginate(25);

        return view('activation_processes.index', compact('activationProcesses'));
    }

    /**
     * Show the form for creating a new activation process.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('activation_processes.create', compact('users'));
    }

    /**
     * Store a new activation process in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
    }

    public function processActivation($userId) {
        $generatedKey = sha1(mt_rand(10000,99999).time().$userId);
                DB::rollBack();
        dd($generatedKey);
    }
    
    /**
     * Display the specified activation process.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $activationProcess = ActivationProcess::with('user')->findOrFail($id);

        return view('activation_processes.show', compact('activationProcess'));
    }

    /**
     * Show the form for editing the specified activation process.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $activationProcess = ActivationProcess::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('activation_processes.edit', compact('activationProcess','users'));
    }

    /**
     * Update the specified activation process in the storage.
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
            
            $activationProcess = ActivationProcess::findOrFail($id);
            $activationProcess->update($data);

            return redirect()->route('activation_processes.activation_process.index')
                             ->with('success_message', 'Activation Process was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified activation process from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       
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
            'activationcode' => 'string|min:1|nullable',
            'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function activationCode($id) {
        $string = md5( microtime() );
        $no = random_int(2, strlen($string));
        $code = substr($string,(strlen($string)/$no),4);
        $code = 'a111';
        $isHas = ActivationProcess::where('activationcode',$code)->
                where('user_id',$id)->get();
        if(count($isHas)==0){
            ActivationProcess::create(array('activationcode'=>$code,'user_id'=>$id));
        } else {
            $isHas[0]->update(array('activationcode'=>$code,'user_id'=>$id));
        }
        //send email here 
    }
    
    public function activeAccount(Request $request) {
        $user = Auth::user();
        $id = $user->id;
        $data = $request->all();
        $isHas = ActivationProcess::where('activationcode',$data['activation_code'])->
                where('user_id',$user->id)->get();
        try {
            DB::beginTransaction();
            if(count($isHas)==0){
                    return response()->json([
                                'message' =>  'your creditional is bad',
                                'status' => 'error','status-code'=>403,
                                'data' => '',
                            ],200);
            } else {
                $isHas[0]->delete();
                $user = \App\User::where('id',$user->id)->update(['active' => 1]);
            }
            staging::updateOrCreate(array('user_id' => $id), array('active_account' => 1));
            DB::commit();
                    return response()->json([
//                        'UserDetails' =>  $user,
                        'message' =>  'your account is Activated',
                        'status' => 'success','status-code'=>200,
                        'data' => 'success',
                    ],200);
        } catch (Exception $exc) {
            DB::rollBack();
              return response()->json([
                        'status' => 'error',
                        'data' =>$exc->getLine().' '.$exc->getFile().' '. $exc->getMessage(),'status-code'=>403,
                        'errorData' => $exc->getMessage()
                    ],200);
        }

        
    }
}

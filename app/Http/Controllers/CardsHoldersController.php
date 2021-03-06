<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CardHolder;
use App\Models\cards_holder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth; 
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\helperVars;
    use Validator;
use Exception;

class CardsHoldersController extends Controller
{

    /**
     * Display a listing of the cards holders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new cards holder.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
    }

    /**
     * Store a new cards holder in the storage.
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
                  return response()->json([
                  'status' => 'error','error'=>$data->errors(),'Appium-status-code'=>401],200);
                }
                
                $data = $request->all();
                $data['user_id'] = $user->id;
                $test_if_exist = cards_holder::where('name',$data['name'])
                        ->where('user_id',$user->id)->get();
                if (count($test_if_exist)>0) { 
                  return response()->json([
                    'data' =>$test_if_exist[0],
                    'status' => 'error',
                    'error-data'=>'Sorry card holder already exist',
                    'Appium-status-code'=>401
                    ],200);
                }
                $createdHolderCard = cards_holder::create($data);
                recent_activity::create(array("user_id"=>$user->id ,"action_by_user_id"=>0,
                    "description"=>"createCardHolder" ,"profile_image_url"=> null));
                DB::commit();
                return response()->json([
                    'data' =>  $createdHolderCard,
                    'status' => 'success','status-code'=>200,
                ],200);
        } catch (Exception $exception) {

            DB::rollBack();
              return response()->json([
                        'status' => 'error',
                        'data' => $exception->getMessage(),
                  'special-data'=>$exception->getLine().' '.$exception->getFile(),'status-code'=>403
                    ],200);
        }
    }

    /**
     * Display the specified cards holder.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $cardsHolder = cards_holder::with('cardholder','user')->findOrFail($id);

        return view('cards_holders.show', compact('cardsHolder'));
    }

    /**
     * Show the form for editing the specified cards holder.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified cards holder in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->getData($request);
            if ($data->fails()) { 
                return response()->json([
                'status' => 'error','error'=>$data->errors(),'Appium-status-code'=>401],200);
            }
            
            $cardsHolder = cards_holder::where('card_holder_id',$id)->get();
            if(count($cardsHolder)==0){
                return response()->json([
                    'status' => 'error',
                    'error'=>'Sorry card holder not exist',
                    'Appium-status-code'=>401
                    ],200);
            }
//            dd($cardsHolder[0]);
            $cardsHolder[0]->update($request->all());
            recent_activity::create(array("user_id"=>$user->id,"action_by_user_id"=>0,
                    "description"=>"updateCardHolder" ,"profile_image_url"=> null));
            DB::commit();
                return response()->json(['status' => 'success','status-code'=>200,],200);
        } catch (Exception $exception) {
                DB::rollBack();
                return response()->json([
                          'status' => 'error',
                          'data' => $exception->getMessage(),
                    'special-data'=>$exception->getLine().' '.$exception->getFile(),'status-code'=>403
                      ],200);
              
        }        
    }

    /**
     * Remove the specified cards holder from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $cardsHolder = cards_holder::findOrFail($id);
            $cardsHolder->delete();

            return redirect()->route('cards_holders.cards_holder.index')
                             ->with('success_message', 'Cards Holder was successfully deleted!');

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
            'name' => 'required|string|min:1',
        ];
        $messages =[
            'name.required' => 'Please Enter valid name',
        ];
        $data = Validator::make($request->all(), $rules, $messages);
        return $data;
    }

}

<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\UserStore;
use App\StoreFeedbackForms;
use App\FeedbackFormElements;
use App\RadiobuttonOptions;
use App\FeedbackCustomers;
use App\FeedbackValues;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use Auth;

class StoreAdminController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getAllStores(){
		
		$id = Auth::id();

		$stores = UserStore::with('FeedBackForms')->where('user_id','=',$id)->get();

        foreach ($stores as $store) {
        	$forms = $store['FeedBackForms'];
        	foreach ($forms as $form) {
        		/*echo $form['id'];*/
        		$formElements[$form['id']]['elements'] = FeedbackFormElements::where('form_id',$form['id'])->orderBy('id', 'asc')->get();

        		$formElements[$form['id']]['values'] = FeedbackCustomers::with('feedbackValues')->where('form_id','=',$form['id'])->orderBy('id', 'asc')->get();
        		/*$values = FeedbackValues::with('customer')
        		->whereHas('customer', function($query) use($form) {
			        $query->where('form_id', '=', $form['id']);
			    })
        		->orderBy('customer_id', 'asc')->get();*/
        	}
        	
        	
        }

       $output = array('stores' => $stores ,'formelements'=>$formElements );
       return view('storeadmin.stores',$output);
	}

	public function getAddstore(){
		return view('storeadmin.addstore');
	}

	public function getEditstore($store_id){
		$id = Auth::id();
		$store['store'] = UserStore::where('id',$store_id)->get();
		if($id == $store['store'][0]['user_id']){
			return view('storeadmin.editstore',$store);
		}
		else{
			return 'ERROR Not Accessible';
		}
		
	}

	public function getAddform($store_id){
		$id = Auth::id();
		$store['store'] = UserStore::where('id',$store_id)->get();
		if($id == $store['store'][0]['user_id']){
			return view('storeadmin.addform',$store);
		}
		else{
			return 'ERROR Not Accessible';
		}

	}

	public function getEditform($form_id){
		$form['form'] = StoreFeedbackForms::where('id',$form_id)->get();
		$id = Auth::id();
		$store = UserStore::where('id',$form['form'][0]['store_id'])->get();
		if($id == $store[0]['user_id']){
			return view('storeadmin.editform',$form);
	    }
	    else{
	    	return 'ERROR Not Accessible';
	    }

	}

     public function getAddElements($form_id){
     	$form['form'] = StoreFeedbackForms::where('id',$form_id)->get();
     	$id = Auth::id();
		$store = UserStore::where('id',$form['form'][0]['store_id'])->get();
		if($id == $store[0]['user_id']){
			return view('storeadmin.addelements',$form);
		}
	    else{
	    	return 'ERROR Not Accessible';
	    }
	}

	

	public function addForm(Request $request){
		$rules = array(
			        'store_id' => 'required',
		            'form_name' => 'required'
		        );
		$validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
        	$response = array('success' =>false ,'errors' => $validator->errors());
            return $response;
        } else {	
        	$forminputs = $request->only('store_id','form_name');
			$form = new StoreFeedbackForms;
			$form->store_id= $forminputs['store_id'];
			$form->form_name = $forminputs['form_name'];
			$form->save();
        	 
        	return redirect()->action('StoreAdminController@getAllStores');
        }
	}

	public function addstore(Request $request){
		$rules = array(
		            'name'       => 'required',
		            'email' => 'required',
		            'password' => 'required',
		            'store_name' => 'required'
		        );
		$validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
        	$response = array('success' =>false ,'errors' => $validator->errors());
            return $response;
        } else {	
        	$userinputs = $request->only('name','email','password');
        	$user = new User;
        	$user->name = $userinputs['name'];
        	$user->email = $userinputs['email'];
        	$user->password = bcrypt($userinputs['password']);
        	$user->save();

        	$storeinputs = $request->only('store_name','city');
        	$store = new UserStore;
        	$store->user_id = $user->id;
        	$store->store_name = $storeinputs['store_name'];
        	$store->city = $storeinputs['city'];
        	$store->save();

        	return redirect()->action('StoreAdminController@getAllStores');
        }
	}

	public function updateStore(Request $request){
		$rules = array(
			        'store_id' => 'required',
		            'store_name' => 'required'
		        );
		$validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
        	$response = array('success' =>false ,'errors' => $validator->errors());
            return $response;
        } else {	
        	$storeinputs = $request->only('store_id','store_name','city');
			$store = UserStore::find($storeinputs['store_id']);
			$store->store_name = $storeinputs['store_name'];
			$store->city= $storeinputs['city'];
			$store->save();
        	 
        	return redirect()->action('StoreAdminController@getAllStores');
        }
	}

	public function saveElement(Request $request){
		$rules = array(
			        'type' => 'required',
		            'form_id' => 'required',
		            'title' => 'required'
		        );
		$validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
        	$response = array('success' =>false ,'errors' => $validator->errors());
            return $response;
        } else {	
        	$elementinput = $request->only('type','form_id','title');
        	if($elementinput['type'] == 'RAD' || $elementinput['type'] == 'CHK'){

        		$element = new FeedbackFormElements;
				$element->form_id = $elementinput['form_id'];
				$element->type= $elementinput['type'];
				$element->title = $elementinput['title'];
				$element->save();

				$elementId = $element->id;

				$optioninput = $request->only('options');
				$optionsarray = explode(',', $optioninput['options']);
				foreach ($optionsarray as $optionelement) {
					$data[] = array('element_id' =>$elementId ,'option'=>$optionelement );
				}
				RadiobuttonOptions::insert($data);

        	}
        	else{
        		$element = new FeedbackFormElements;
				$element->form_id = $elementinput['form_id'];
				$element->type= $elementinput['type'];
				$element->title = $elementinput['title'];
				$element->save();
        	}
        	
        	$output = $request->all();
        	$response['status'] = true;
        	$response['type'] = $output['type'];
        	$response['title'] = $output['title'];
        	$response['options'] = $output['options'];
        	return $response;
        }
	}


	public function editForm(Request $request){
		$rules = array(
			        'form_id' => 'required',
		            'form_name' => 'required'
		        );
		$validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
        	$response = array('success' =>false ,'errors' => $validator->errors());
            return $response;
        } else {	
        	$forminputs = $request->only('form_id','form_name');
			$form = StoreFeedbackForms::find($forminputs['form_id']);
			$form->form_name = $forminputs['form_name'];
			$form->save();
        	 
        	return redirect()->action('StoreAdminController@getAllStores');
        }
	}

	





	public function deleteForm($form_id)
	{
		$form['form'] = StoreFeedbackForms::where('id',$form_id)->get();
     	$id = Auth::id();
		$store = UserStore::where('id',$form['form'][0]['store_id'])->get();
		if($id == $store[0]['user_id']){
			StoreFeedbackForms::destroy($form_id);
			return redirect()->action('StoreAdminController@getAllStores');
		}
	    else{
	    	return 'ERROR Not Accessible';
	    }
	}

}
<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Entrust;
use Session;
use Hash;
use Excel;
use Input;
use DB;
use QrCode;
use App\User;

class MainController extends Controller
{
	public function index(Request $request){
		//if(Auth::check())
		$data['todos'] = "";
		$data['success'] = "";
		$data['error'] = "";
		if($request['todo']){
			$this->validate($request, [
				'todo' => 'required'
			]);

			if(!Auth::check()){
				$data['error'] = "Sorry, you need to create an account!";
			} else {
				if(DB::table('todolist')->insert([
					'userid'		=> Auth::user()->id,
					'todo'			=> trim($request['todo']),
					'status' 		=> 1,
					'timecreated' 	=> date('F j, Y'),
					'timecompleted' => ""
				])){
					$data['success'] = "Todo was added successfully";
				} else {
					$data['error'] = "Something went wrong!";
				}
			}
		}

		if(Auth::check()){
			$data['todos'] = DB::table('todolist')->where('userid', Auth::user()->id)->leftjoin('status', 'todolist.status', '=', 'status.id')->select('todolist.*', 'status.typename')->orderBy('id', 'desc')->get();
		}
		
		return view('welcome', $data);
	}

	public function signup(Request $request){
		$data['error'] 		= "";
		$data['success'] 	= "";
		if(Auth::check()){
			return redirect('/');
		}
		if($request['email']){
			$this->validate($request, [
				'name'		=>  'required|max:255',
				'email'		=>	'required|unique:users|max:255',
				'password'  =>  'required|min:6',
				'rpass'		=>  'required|same:password' 
			]);

			$name = $request['name'];
			$email = $request['email'];
			$password = Hash::make($request['password']);

			$user = new User;
			$user->name = $name;
			$user->email = $email;
			$user->password = $password;
			$user->save();

			if($user->save()){
				$data['success'] = 'You were registered successfully!';
			} else {
				$data['error'] = 'Looks like something went wrong!';
			}
		}

		return view('signup', $data);
	}

	public function signin(Request $request){
		$data['error'] = "";
		$data['success'] = "";
		if(Auth::check()){
			return redirect('/');
		}

		if($request['email']){
			$this->validate($request, [
				'email'		=>	'required|max:255',
				'password'  =>  'required|min:6'
			]);

			$email = $request['email'];
			$password = $request['password'];

			if(Auth::attempt(['email' => $email, 'password' => $password])){
				$data['success'] = 'You were logged in successfully!';
			} else {
				$data['error'] = 'Wrong login credentials';
			}
		}
		return view('signin', $data);
	}

	public function completed($id = ""){
		if($id != ""){
			if(!Auth::check()){
				return redirect('/');
			}
			if(DB::Table('todolist')->where('id', $id)->update([
				'status' 		=> 3,
				'timecompleted' => date('F j, Y') 
			])){
				return redirect('/')->with('success', 'Great work!');
			} else {
				return redirect('/')->with('error', 'Something doesn\'t seen right');
			}
		} else {
			return redirect('/');
		}
	}

	public function cancel($id = ""){
		if($id != ""){
			if(!Auth::check()){
				return redirect('/');
			}
			if(DB::Table('todolist')->where('id', $id)->update([
				'status' 		=> 2
			])){
				return redirect('/')->with('success', 'Cancelled');
			} else {
				return redirect('/')->with('error', 'Something doesn\'t seen right');
			}
		} else {
			return redirect('/');
		}
	}

	public function edit(Request $request, $id = ""){
		$data['success'] = "";
		$data['error'] = "";
		if($id != ""){
			if(!Auth::check()){
				return redirect('/');
			}
			if(!$data['todo'] = DB::Table('todolist')->where('id', $id)->where('userid', Auth::user()->id)->first()->todo){
				return redirect('/')->with('error', 'Not authorised!');
			}

			$data['chosen'] = $id;
			
			if($request['todo']){
				$this->validate($request, [
					'todo'	=> 'required'
				]);

				if($request['todo'] === $data['todo']){
					return redirect('/')->with('error', 'No changes made');
				} else {
					if(DB::table('todolist')->where('id', $request['chosen'])->update([
						'todo'		=> $request['todo']
					])){
						return Redirect('/')->with('success', 'Edited successfully!');
					} else {
						$data['error'] = "Something went wrong!";
					}
				}
			}
			return view('edit', $data);
		} else {
			return redirect('/');
		};
	}

	public function about(){
		$data['error'] = "";
		return view('about', $data);
	}
}

<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository = null;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }


    public function index() {
        $users = $this->repository->getAll();
        return view('user.index', compact('users'));
    }

    public function show($id) {
        $user = $this->repository->getById($id);
        return $user;
    }
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'mobile' => 'required|numeric|min:6',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'activation' => 'boolean',
        ]);
        $id =$request['id'];
        if($id) {
            $user = $this->repository->createOrUpdate($request);
        }
        else {
            $user = $this->repository->createOrUpdate($request);
        }
        return $user;
    }

    public function destroy($id) {
        $user = $this->repository->delete($id);
        return response()->json(['success']);
    }

    /*public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'mobile' => 'required|numeric|min:6',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'activation' => 'boolean',
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->content = $request->get('content');
        $user->save();
        return $user;
    }*/


    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);
        $task =User::find($id);
        $task->name = $request->get('name');
        $task->content = $request->get('content');
        $task->save();
        return $task;
    }
}

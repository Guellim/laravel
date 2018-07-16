<?php

namespace App\Repositories;

use App\User;
use Hash;

class UserRepository
{

    private $model;


    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll($columns)
    {
        $draw = $columns['draw'];
        $start = $columns['start'];
        $length = $columns['length'];
        $page=$start/$length+1;

        $users=$this->model->paginate($length, ['*'], 'pages', $page);

        $response=[
            'draw'=>$draw,
            "recordsTotal"=>$users->total(),
            "recordsFiltered"=>$users->total(),
            "data"=>$users->items(),
        ];

        return $response;
        }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findBy($att, $column)
    {
        return $this->model->where($att, $column);
    }

    public function create($input)
    {
        $user = new $this->model;
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->password = Hash::make($input['password']);
        $user->firstName = $input['firstName'];
        $user->lastName = $input['lastName'];
        $user->mobile = $input['mobile'];
        $user->birthday = $input['birthday'];
        $user->gender = $input['gender'];
        $user->activation = $input['activation'];
        $user->save();
        return $user;
    }

    public function createOrUpdate($input )
    {
        if($input['id'] == null){
            $id = null;
        }else{
            $id = $input['id'];
        }


        if(is_null($id)) {
            // create after validation
            $user = new $this->model;
            $user->email = $input['email'];
            $user->name = $input['name'];
            $user->password = Hash::make($input['password']);
            $user->firstName = $input['firstName'];
            $user->lastName = $input['lastName'];
            $user->mobile = $input['mobile'];
            $user->birthday = $input['birthday'];
            $user->gender = $input['gender'];
            $user->activation = $input['activation'];
            return $user->save();
        }
        else {
            // update after validation
            $user = $this->getById($id);
            $user->email = $input['email'];
            $user->name = $input['name'];
            $user->password = Hash::make($input['password']);
            $user->firstName = $input['firstName'];
            $user->lastName = $input['lastName'];
            $user->mobile = $input['mobile'];
            $user->birthday = $input['birthday'];
            $user->gender = $input['gender'];
            $user->activation = $input['activation'];
            return $user->save();
        }
    }

    public function update($id, array $attributes)
    {
        $user = $this->getById($id);
        $user->update($attributes);
        return $user;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
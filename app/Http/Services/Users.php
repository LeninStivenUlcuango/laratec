<?php
namespace App\Http\Services;
use App\Models\User;


class users {
    public function get(){

        $users = User::where('id','!=','1')->get();
        $data =[];

        foreach($users as $user){
            $data[$user->id]=$user->name.' '.$user->last_name;
        }
        return $data;
    }
}
?>
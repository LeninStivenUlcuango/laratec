<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'id_number',
        'email',
        'addres',
        'phone'];
    
    public function devices(){
        return $this->hasMany('App\Models\Device');
    }

    public static function customerFilter($client_data){
        return Customer::clienteData($client_data)->paginate(10);
    }

    public function scopeClienteData($query, $client_data){
        if(!empty($client_data)){
            return $query->where('id_number', $client_data)
            ->orWhere('name','LIKE',"%$client_data%")
            ->orWhere('last_name','LIKE',"%$client_data%");
        }
    }
}

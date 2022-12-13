<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
   protected $fillable =[  'customer_id','user_id',  'description','status','entry_date']; 
   protected $casts = [
    'entry_date' => 'datetime:Y-m-d',
    'departure_date' => 'datetime:Y-m-d',
];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function maintenances(){
        return $this->belongsToMany('App\Models\Maintenance')->withTimestamps();
    }
    
    public function getEntryDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDepartureDateAttribute($value)
    {
        if(is_null($value)){
            return '';
        }
        return Carbon::parse($value)->format('d/m/Y');
    }

    public static function devicesFilter($status, $entry_date_from,$entry_date_to){

        return Device::status($status)->entryDate($entry_date_from,$entry_date_to)->paginate(9);
    }

    public function scopeStatus($query, $status){
        if(!is_null($status)){
            return $query->where('status',$status);
        }
    }

    public function scopeEntryDate($query, $entry_date_from,$entry_date_to){
        if(!is_null($entry_date_from)&&!is_null($entry_date_to)){
            return $query->whereBetween('entry_date',[$entry_date_from,$entry_date_to]);
        }elseif(!is_null($entry_date_from)&&is_null($entry_date_to)){
            return $query->where('entry_date','>=',$entry_date_from);
        }elseif(is_null($entry_date_from)&&!is_null($entry_date_to)){
            return $query->where('entry_date','<=',$entry_date_to);
        }
    }
}
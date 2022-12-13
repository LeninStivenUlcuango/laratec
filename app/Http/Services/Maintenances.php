<?php
namespace App\Http\Services;

use App\Models\Device;
use App\Models\Maintenance;

    class Maintenances{
        public function get(){

            $maintenances= Maintenance::all();
            $data=[];
            foreach($maintenances as $maintenance){
                $data[$maintenance->id]=$maintenance->name;
            }
            return $data;
        }

        public function get_id($id){

            $device=Device::find($id);
            $data=[];
            foreach($device->maintenances as $maintenance){
                $data[$maintenance->id]=$maintenance->name;
            }
            return $data;
        }
    }

?>
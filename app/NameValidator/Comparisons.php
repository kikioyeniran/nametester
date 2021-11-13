<?php

namespace App\NameValidator;

class Comparisons
{

    protected $record_full_name;
    protected $new_full_name;

    public function setRecordFullName($fullname){
        $this->record_full_name = str_replace(",", "", strtolower($fullname));

    }

    public function setNewFullName($fullname){
        $this->new_full_name = str_replace(",", "", strtolower($fullname));
    }

    public function checkNames(){
        // $name1 = str_replace(",", "", $this->record_full_name);
        $record_name_array = explode(" ", $this->record_full_name);
        $new_name_array = explode(" ", $this->new_full_name);
        if($record_name_array === $new_name_array){
            return true;
        }
        elseif(array_diff($record_name_array, $new_name_array) == null){
            return true;
        }elseif(!empty(array_intersect($record_name_array, $new_name_array))){
            return true;
        }
        else{
            return false;
        }
        // if(count($record_name_array) === count($new_name_array)){
        //     return true;
        // }else{
        //     return false;
        // }
    }
}
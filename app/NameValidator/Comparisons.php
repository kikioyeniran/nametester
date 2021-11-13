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
        $record_name_array = explode(" ", $this->record_full_name);
        $new_name_array = explode(" ", $this->new_full_name);
        $counter = 0;

        if($record_name_array === $new_name_array){
            $counter++;
        }

        if(array_diff($record_name_array, $new_name_array) == null){
            $counter++;
        }
        $array_interesection_value = array_intersect($record_name_array, $new_name_array);
        if(!empty($array_interesection_value) && array_diff($array_interesection_value, $new_name_array) == null){
            $counter+=2;
        }

        $percentage_comparison = ($counter/count($record_name_array)) * 100;

        return $percentage_comparison;

        // $array_interesection_value = array_intersect($record_name_array, $new_name_array);
        // if($record_name_array === $new_name_array){
        //     return true;
        // }
        // elseif(array_diff($record_name_array, $new_name_array) == null){
        //     return true;
        // }elseif(!empty($array_interesection_value) && array_diff($array_interesection_value, $new_name_array) == null){
        //     return true;
        // }
        // else{
        //     return false;
        // }
    }
}
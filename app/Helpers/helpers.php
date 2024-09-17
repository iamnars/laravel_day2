<?php
    function format_fullname($fname, $mname, $lname, $suffix, $is_reversed, $is_capital){
        if($is_reversed == 1){
            $fullname = "$lname $suffix, $fname $mname";
        }else{
            $fullname = "$fname $mname $lname $suffix";
        }

        if($is_capital == 1){
            $fullname = strtoupper($fullname);
        }
        return $fullname;
    }

    function compare_dates($date1, $date2){
        if($date1 == $date2){
            $msg = "Date: $date1";
        } else{
            $msg = "Period covered from $date1 to $date2";
        }
        return $msg;
    }

?>
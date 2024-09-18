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

    function format_report_date($d, $formatType) {
        // Check for the '0000-00-00' 
        if ($d == '0000-00-00') {
            return 'Invalid date';
        }
    
 
        $timestamp = strtotime($d);
    
        if (!$timestamp) {
            return 'Invalid date';
        }
    
        
        switch ($formatType) {
            case 1:
                return date('l, F d, Y', $timestamp); // Monday, June 01, 2023
            case 2:
                return date('d F Y - l', $timestamp); // 01 June 2024 - Monday
            case 3:
                return 'Today is ' . date('l, F d, Y', $timestamp); // Today is Monday, June 01, 2024
            default:
                return 'Invalid format type';
        }
    }

?>
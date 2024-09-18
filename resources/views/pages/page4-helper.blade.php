@extends('layouts.app')

@section('content')
<x-page-header pagetitle="Built In and Customer Helpers" class="bg-white"/> 

<div class="wrapper wrapper-content">
    <div class="">
       
        
        @php
            $salary = 100000.789;
        @endphp
        

    <p>{{Number::format($salary,2)}}</p>
    <p>{{Number::format($salary,precision:2)}}</p>
    <p>{{Number::format($salary,maxPrecision:2)}}</p>
    <p>{{Number::ordinal(21)}} Century</p>
    <p>{{Number::percentage(21)}} remaining</p>
    <p>{{Number::spell(21)}} dollars</p>


        @php
            $fname = "Narene";
            $mname = "M.";
            $lname = "Nagares";
            $suffix = "Jr.";
        @endphp

        <p>Name: {{format_fullname($fname, $mname, $lname, $suffix, 0, 0)}} </p>
        <p>Name: {{format_fullname($fname, $mname, $lname, $suffix, 1, 0)}} </p>
        <p>Name: {{format_fullname($fname, $mname, $lname, $suffix, 0, 1)}} </p>
        <p>Name: {{format_fullname($fname, $mname, $lname, $suffix, 1, 1)}} </p>

        @php
            $d1 = "2024-09-17";
            $d2 = "2024-09-25";
        @endphp

        <p>Result: {{compare_dates($d1, $d2)}}</p>

        @php
            $d = "2023-06-01";
        @endphp
        <p>Format 1: {{format_report_date($d, 1)}}</p>
        <p>Format 2: {{format_report_date($d, 2)}}</p>
        <p>Format 3: {{format_report_date($d, 3)}}</p>
        <p>Format 4: {{format_report_date($d, 4)}}</p>
    </div>
</div>
@endsection
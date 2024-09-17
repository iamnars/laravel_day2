@extends('layouts.app')

@section('content')
<x-page-header pagetitle="Dashboard" class="bg-info" /> 

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-4">
                <x-widget class="red-bg" icon="fa-bell">
                    <x-slot name="value">
                        47
                    </x-slot>
                    <x-slot name="title">
                        Notification
                    </x-slot>
                    <x-slot name="subtitle">
                        We detected an error.
                    </x-slot>
                </x-widget>
            </div>
            <div class="col-4">
                <x-widget class="lazur-bg" icon="fa-thumbs-up">
                    <x-slot name="value">
                        520
                    </x-slot>
                    <x-slot name="title">
                        Likes
                    </x-slot>
                    <x-slot name="subtitle">
                        amount
                    </x-slot>
                </x-widget>
            </div>   
            <div class="col-4">
                <x-widget class="yellow-bg" icon="fa-warning">
 
                    <x-slot name="value">
                        Alarm
                    </x-slot>
                    <x-slot name="title">
                        Do
                    </x-slot>
                    <x-slot name="subtitle">
                        something
                    </x-slot>
                </x-widget>
            </div>  
        </div>
        <div class="col-4">
       <x-box>
            <x-slot name="boxtitle">
                <h5>Report for 2024</h5>
                <small>Company Financial Status</small>
            </x-slot>
            <x-slot name="boxcontent">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </x-slot>
            <x-slot name="boxfooter">
                <button type="button" class="btn btn-primary">
                    Save
                </button>
            </x-slot>
       </x-box>
    </div>
</div>
</div>
@endsection


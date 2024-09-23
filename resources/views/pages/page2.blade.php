@extends('layouts.app')

@section('content')
@if (Session::has('success'))
    <p class="alert alert-primary">{{ Session::get('success') }}</p>
@endif
@if (Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<x-page-header pagetitle="List of Books" class="bg-white"/> 

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <a href="{{url('/add-book-form')}}" class="btn btn-primary">Add Book</a>
        <hr>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>COUNTRY ID</th>
                    <th>STOCKS</th>
                    <th>AMOUNT</th>
                    <th>PHOTO</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->country_id}}</td>
                        <td>{{$item->stocks}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->photo}}</td>
                        <td class="col-2">
                    
                            <a href="{{url('/edit-book-form',$item->id)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-square-o"></i> <!-- Edit Icon -->
                            </a>

                        <a href="{{url('/delete-book',$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                            <i class="fa fa-trash"></i> <!-- Delete Icon -->
                        </a>
                    
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
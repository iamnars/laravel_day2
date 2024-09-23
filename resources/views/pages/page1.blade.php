@extends('layouts.app')

@section('content')
@if (Session::has('success'))
    <p class="alert alert-primary">{{ Session::get('success') }}</p>
@endif
@if (Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<x-page-header pagetitle="List of Movies" class="bg-white"/> 

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <a href="{{url('/add-movie-form')}}">Add Movie</a>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CATEGORY</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>RATING</th>
                    <th>PUBLISHED</th>
                    <th>DIRECTOR</th>
                    <th>THUMBNAIL</th>
                    <th>ACTION </th>
                </tr>
            </thead>

            <tbody>
                {{-- @foreach ($data as $item) --}}
                @forelse ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->star_rating}}</td>
                        <td>{{$item->date_published}}</td>
                        <td>by {{$item->director}}</td>
                        <td><img src="{{asset('_uploads/'.$item->image)}}" width="80"/></td>
                        <td class="col-2">
                    
                                <a href="{{url('/edit-movie-form',$item->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil-square-o"></i> <!-- Edit Icon -->
                                </a>

                            <a href="{{url('/delete-movies',$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                <i class="fa fa-trash"></i> <!-- Delete Icon -->
                            </a>
                        
                        </td>
                    </tr>
                @empty
                    <td colspan="8">.:No records found.</td>
                @endforelse
            </tbody>
        </table>
        <a href="{{url('/print')}}">Print</a>




    </div>
</div>
@endsection
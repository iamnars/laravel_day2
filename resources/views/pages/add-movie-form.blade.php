@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <form action="{{url('/add-movies')}}" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" name="category_id" id="category_id">
                            @foreach ($category as $item)
                                <option value="{{$item->category_id}}">{{$item->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="description"  value="{{old('description')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="text" class="form-control" name="star_rating" id="star_rating"  value="{{old('star_rating')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Director</label>
                        <input type="text" class="form-control" name="director" id="director"  value="{{old('director')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Date Published</label>
                        <input type="date" class="form-control" name="date_published" id="date_published"  value="{{old('date_published')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Upload Photo</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
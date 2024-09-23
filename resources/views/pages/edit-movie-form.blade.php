@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <form action="{{url('/edit-movies')}}" method="post">
            @csrf()
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$data[0]->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$data[0]->description}}">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="text" class="form-control" name="star_rating" id="star_rating" value="{{$data[0]->star_rating}}">
                    </div>
                    <div class="form-group">
                        <label for="">Director</label>
                        <input type="text" class="form-control" name="director" id="director" value="{{$data[0]->director}}">
                    </div>
                    <div class="form-group">
                        <label for="">Date Published</label>
                        <input type="date" class="form-control" name="date_published" id="date_published" value="{{$data[0]->date_published}}">
                    </div>
                    <hr>
                    <input type="hidden" name="id" id="id" value="{{$data[0]->id}}">
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
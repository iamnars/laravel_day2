@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <form action="{{url('/add-movies')}}" method="post">
            @csrf()
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="text" class="form-control" name="star_rating" id="star_rating">
                    </div>
                    <div class="form-group">
                        <label for="">Director</label>
                        <input type="text" class="form-control" name="director" id="director" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date Published</label>
                        <input type="date" class="form-control" name="date_published" id="date_published">
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
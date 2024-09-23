@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <form action="{{url('/edit-book')}}" method="post">
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
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country_id" id="country_id" value="{{$data[0]->country_id}}">
                    </div>
                    <div class="form-group">
                        <label for="">Stocks</label>
                        <input type="text" class="form-control" name="stocks" id="stocks" value="{{$data[0]->stocks}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="{{$data[0]->amount}}">
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail Photo</label>
                        <input type="text" class="form-control" name="photo" id="photo" value="{{$data[0]->photo}}">
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
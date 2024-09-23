@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <form action="{{url('/add-book')}}" method="post">
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
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country_id" id="country_id">
                    </div>
                    <div class="form-group">
                        <label for="">Stocks</label>
                        <input type="text" class="form-control" name="stocks" id="stocks" required>
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount">
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail Photo</label>
                        <input type="text" class="form-control" name="photo" id="photo">
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<x-page-header pagetitle="Page Three" class="bg-white"/> 

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h2>List of all messages.</h2>
                        <div class="ibox-tools">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- add modal--}}
        
        <div class="modal inmodal" id="myAddModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <form id="add-form">
            <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-laptop modal-icon"></i>
                        <h4 class="modal-title">Modal title</h4>
                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="title" id="title" placeholder="Title here..."
                                class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="title" id="title" rows placeholder="Title here..."
                                class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    

    </div>
</div>
@endsection

@section('my-js')
    <script>
        $(document).ready(function(){
            load_data();
            $("#btn-add-modal").click(function(){
                $("myAddModal").modal();
            })

            $("#add-form").submit(function(){

            })

            function load_data(){
                $.ajax({
                method:"get"
                url:"{{ url('/api/post') }}",
                success:function(data){
                    var maxLoop = data.length;
                    html = "";
                    for(var i = 0;i < maxLoop; i++){
                        html += "<tr>";
                            html += "<td>"+data[i].id+"</td>";
                            html += "<td>"+data[i].title+"</td>";
                            html += "<td>"+data[i].story+"</td>";
                        html += "</tr>";
                    }
                    $("#post-table tbody").html(html);
                }
            })
            }
        })
    </script>
@endsection
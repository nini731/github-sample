@extends('Templates.master')

@Section('title')
    Lists
    @stop

@Section('content')
    <div class="container">
        <div class="row">
            <div class="col-12  mt-3"><h3>ToDo List</h3></div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5>Add An Item</h5>
            </div>
        </div>
        @include('todos.addItem')
        <div class="row mt-3">
            <div class="col-12">
                <div>
                    <ul style="list-style-type: none">
                        @foreach($issues as $issue)
                            <li class="border-bottom pb-3 pt-2">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend mr-4">
                                                <div class="input-group">
                                                    <a href="{{route('get.done.not.issue',['id'=>$issue->id, 'done'=> !$issue->done? 1: 0])}}">
                                                        <input type="checkbox" @if($issue->done) checked @endif>
                                                    </a>
                                                </div>
                                            </div>
                                            <span @if($issue->done) style="text-decoration: line-through" @endif>{{$issue->issue}}</span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" data-toggle="modal" data-target="#e{{$issue->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <!-- Edit Issue modal -->
                                        <div class="modal fade" id="e{{$issue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Issue</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('post.update.issue')}}">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{$issue->id}}">
                                                            <div class="form-group">
                                                                <input
                                                                    class="form-control"
                                                                    id="issue"
                                                                    name="issue"
                                                                    value="{{$issue->issue}}"
                                                                    placeholder="Enter An Item Name"
                                                                    type="text"
                                                                    required
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </div>
                                                        {{csrf_field()}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Issue modal -->
                                        <a href="#" data-toggle="modal" data-target="#d{{$issue->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <!-- Delete Issue modal -->
                                        <div class="modal fade" id="d{{$issue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Issue</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Are you sure want to delete <em>{{$issue->issue}}</em> permanently?</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-primary" href="{{route('get.delete.issue',['id'=>$issue->id])}}">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete Issue modal -->
                                    </div>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>

        @if(Session('info'))
            <div class="row">
                <div class="col-10 offset-1 text-center">
                    <div class="alert alert-success" style="position: fixed; bottom: 100px; right: 0; left: 0;" role="alert">
                        <span>{{Session('info')}}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @stop
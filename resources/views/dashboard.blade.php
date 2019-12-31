@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">
                    Announcements
                    @role('Gold')
                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                        data-target="#newAnnouncement">
                        New
                    </button>

                    <div class="modal fade" id="newAnnouncement" role="dialog" aria-labelledby="Create Announcement"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="role-form" method="post" action={{route('admin.create-announcement')}}>
                                    @csrf
                                    @method('POST')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Announcement</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group col-md-12">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Enter the title">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="title">Content</label>
                                            <textarea class="form-control" name="body" rows="10"
                                                placeholder="Enter the content"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">Create</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
                </h2>
                @foreach ($announcements as $announcement)
                <div class="card-body">
                    <h5 class="card-title">{{$announcement->title}}</h5>
                    <p class="card-text">{{$announcement->body}}</p>
                    <footer>Posted By: {{$announcement->user->displayName()}}</footer>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$announcements->links()}}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Stats</h2>
                <div class="card-body">
                    <h5 class="card-title">Patrol Numbers</h5>
                    <p class="card-text">1</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fleet Count</h5>
                    <p class="card-text">50</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Calls</h5>
                    <p class="card-text">50</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Events</h2>
                <div class="card-body">
                    <h5 class="card-title">Daily Patrol</h5>
                    <p class="card-text">19:00 - 22:00</p>
                    <a href="#" class="btn btn-success">Book On</a>
                </div>
            </div>
            <div class="card mt-3 flex-grow-1">
                <h2 class="card-header">CC's Commendation</h2>
                <div class="card-body">
                    <h5 class="card-title">Name: H.Cameron</h5>
                    <p class="card-text">Description: Made ERP such an amazing website</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
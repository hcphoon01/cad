@extends('layouts.base')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session()->get('message')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">
                    Announcements
                    @can('create announcements')
                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                        data-target="#newAnnouncement">
                        New
                    </button>

                    <div class="modal fade" id="newAnnouncement" role="dialog" aria-labelledby="Create Announcement"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="announcementEdit" method="post" action={{route('admin.create-announcement')}}>
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
                    @endcan
                </h2>
                @foreach ($announcements as $announcement)
                <div class="card-body">
                    <div class="row px-3 justify-content-between">
                        <div>
                            <h5 class="card-title">{{$announcement->title}}</h5>
                        </div>
                        <div>
                            @can('create announcements')
                            <form action="{{ route('admin.delete-announcement', ['id' => $announcement->id]) }}"
                                method="post" class="is-hidden">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-right">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            @endcan
                        </div>

                    </div>
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
                    <h5 class="card-title">Total Patrols</h5>
                    <p class="card-text">{{$eventCount}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fleet Count</h5>
                    <p class="card-text">{{$fleetCount}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Calls</h5>
                    <p class="card-text">{{$cadCount}}</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">
                    Events
                    @if ($event)
                    @can('manage events')
                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                        data-target="#editEvent">
                        Edit
                    </button>

                    <div class="modal fade" id="editEvent" role="dialog" aria-labelledby="Edit Event"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="eventEdit" method="post"
                                    action={{route('admin.event', ['id' => $event->id])}}>
                                    @csrf
                                    @method('POST')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Event</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{$event->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" rows="5"
                                                required>{{$event->description}}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="start_time">Start Time</label>
                                                    <input type="datetime-local" name="start_time" id="start_time"
                                                        class="form-control"
                                                        value="{{$event->start_time->format('Y-m-d\TH:i')}}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="end_time">End Time</label>
                                                    <input type="datetime-local" name="end_time" id="end_time"
                                                        class="form-control"
                                                        value="{{$event->end_time->format('Y-m-d\TH:i')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="max_participants">Max Participants</label>
                                            <input type="text" name="max_participants" id="max_participants"
                                                class="form-control" value="{{$event->max_participants}}" required>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">Edit</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @endif
                </h2>
                <div class="card-body">
                    @if ($event)
                    <h5 class="card-title">{{$event->name}}</h5>
                    <h6 class="card-title">{{$event->description}}</h6>
                    <p class="card-text">{{$event->displayDateTime()}}</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookOnModal">Book
                        On</button>
                    <div class="modal fade" id="bookOnModal" tabindex="-1" role="dialog"
                        aria-labelledby="bookOnModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form class="form" action="{{route('book-on')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" value="{{$event->id}}" id="event" name="event">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookOnModalLabel">Book On</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($event->isParticipant(Auth::user()))
                                        <p>You are already booked on for this patrol.</p>
                                        @else
                                        <div class="form-group">
                                            <label for="division">Division</label>
                                            <select id="division" name="division" class="form-control">
                                                <option selected>Choose a Division...</option>
                                                @foreach ($divisions as $division)
                                                <option value="{{$division->id}}">
                                                    {{$division->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        @if (!$event->isParticipant(Auth::user()))
                                        <button type="submit" class="btn btn-success">Book On</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <h5 class="card-title">No event has been created yet</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
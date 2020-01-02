@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row-fluid">
        <div class="card">
            <div class="card-header text-center">
                <h3>HR Panel</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @role('Gold')
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>GC Review</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gcReview as $gc)
                                        <tr>
                                            <td>{{$gc->id}}</td>
                                            <td>{{$gc->user->name}}</td>
                                            <td><a type="button" class="btn btn-primary"
                                                    href="{{ route('hr.view',['id'=>$gc->id])}}"><i class=" fa
                                                    fa-eye"></i>
                                                    View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endrole
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>HR Review</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Harry Cameron</td>
                                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>
                                                    View</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jeff Bezos</td>
                                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>
                                                    View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Awaiting Interview</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Harry Cameron</td>
                                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>
                                                    View</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jeff Bezos</td>
                                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>
                                                    View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
    
        $(document).on('click', '#getUser', function(e){
    
            e.preventDefault();
    
            var url = $(this).data('url');
    
            $('#dynamic-content').html(''); // leave it blank before ajax call
            $('#modal-loader').show();      // load ajax loader
    
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                console.log(data);  
                $('#dynamic-content').html('');    
                $('#dynamic-content').html(data); // load response 
                $('#modal-loader').hide();        // hide ajax loader   
            })
            .fail(function(){
                $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
            });
    
        });
    
    });
    
</script>
@endsection
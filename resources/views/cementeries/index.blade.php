@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Cementeries</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('cementeries.cementery.create') }}" class="btn btn-success" title="Create New Cementery">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($cementeries) == 0)
            <div class="panel-body text-center">
                <h4>No Cementeries Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>Longitute</th>
                            <th>Latitude</th>
                            <th>Status</th>
                            <th>Approved</th>
                            <th>Municipalities</th>
                            <th>Website</th>
                            <th>Image</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cementeries as $cementery)
                        <tr>
                            <td>{{ optional($cementery->user)->first_name }}</td>
                            <td>{{ $cementery->name }}</td>
                            <td>{{ $cementery->city }}</td>
                            <td>{{ $cementery->state }}</td>
                            <td>{{ $cementery->country }}</td>
                            <td>{{ $cementery->address }}</td>
                            <td>{{ $cementery->longitute }}</td>
                            <td>{{ $cementery->latitude }}</td>
                            <td>{{ $cementery->status }}</td>
                            <td>{{ $cementery->approved }}</td>
                            <td>{{ $cementery->municipalities }}</td>
                            <td>{{ $cementery->website }}</td>
                            <td>{{ $cementery->image }}</td>

                            <td>

                                <form method="POST" action="{!! route('cementeries.cementery.destroy', $cementery->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('cementeries.cementery.show', $cementery->id ) }}" class="btn btn-info" title="Show Cementery">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('cementeries.cementery.edit', $cementery->id ) }}" class="btn btn-primary" title="Edit Cementery">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Cementery" onclick="return confirm(&quot;Click Ok to delete Cementery.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $cementeries->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
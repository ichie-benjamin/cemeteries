@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($cementery->name) ? $cementery->name : 'Cementery' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('cementeries.cementery.destroy', $cementery->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cementeries.cementery.index') }}" class="btn btn-primary" title="Show All Cementery">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cementeries.cementery.create') }}" class="btn btn-success" title="Create New Cementery">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cementeries.cementery.edit', $cementery->id ) }}" class="btn btn-primary" title="Edit Cementery">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Cementery" onclick="return confirm(&quot;Click Ok to delete Cementery.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($cementery->user)->first_name }}</dd>
            <dt>Name</dt>
            <dd>{{ $cementery->name }}</dd>
            <dt>City</dt>
            <dd>{{ $cementery->city }}</dd>
            <dt>State</dt>
            <dd>{{ $cementery->state }}</dd>
            <dt>Country</dt>
            <dd>{{ $cementery->country }}</dd>
            <dt>Address</dt>
            <dd>{{ $cementery->address }}</dd>
            <dt>Longitute</dt>
            <dd>{{ $cementery->longitute }}</dd>
            <dt>Latitude</dt>
            <dd>{{ $cementery->latitude }}</dd>
            <dt>Status</dt>
            <dd>{{ $cementery->status }}</dd>
            <dt>Approved</dt>
            <dd>{{ $cementery->approved }}</dd>
            <dt>Municipalities</dt>
            <dd>{{ $cementery->municipalities }}</dd>
            <dt>Website</dt>
            <dd>{{ $cementery->website }}</dd>
            <dt>Image</dt>
            <dd>{{ $cementery->image }}</dd>

        </dl>

    </div>
</div>

@endsection
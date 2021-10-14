@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Memorial' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('memorials.memorial.destroy', $memorial->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('memorials.memorial.index') }}" class="btn btn-primary" title="Show All Memorial">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('memorials.memorial.create') }}" class="btn btn-success" title="Create New Memorial">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('memorials.memorial.edit', $memorial->id ) }}" class="btn btn-primary" title="Edit Memorial">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Memorial" onclick="return confirm(&quot;Click Ok to delete Memorial.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>First Name</dt>
            <dd>{{ $memorial->first_name }}</dd>
            <dt>Last Name</dt>
            <dd>{{ $memorial->last_name }}</dd>
            <dt>Middle Name</dt>
            <dd>{{ $memorial->middle_name }}</dd>
            <dt>Nickname</dt>
            <dd>{{ $memorial->nickname }}</dd>
            <dt>Maiden Name</dt>
            <dd>{{ $memorial->maiden_name }}</dd>
            <dt>Gender</dt>
            <dd>{{ $memorial->gender }}</dd>
            <dt>Birth Day</dt>
            <dd>{{ $memorial->birth_day }}</dd>
            <dt>Birth Month</dt>
            <dd>{{ $memorial->birth_month }}</dd>
            <dt>Birth Year</dt>
            <dd>{{ $memorial->birth_year }}</dd>
            <dt>Death Day</dt>
            <dd>{{ $memorial->death_day }}</dd>
            <dt>Death Month</dt>
            <dd>{{ $memorial->death_month }}</dd>
            <dt>Death Year</dt>
            <dd>{{ $memorial->death_year }}</dd>
            <dt>Birth Location</dt>
            <dd>{{ $memorial->birth_location }}</dd>
            <dt>Death Location</dt>
            <dd>{{ $memorial->death_location }}</dd>
            <dt>Bio</dt>
            <dd>{{ $memorial->bio }}</dd>
            <dt>Prefix</dt>
            <dd>{{ $memorial->prefix }}</dd>
            <dt>Suffix</dt>
            <dd>{{ $memorial->suffix }}</dd>

        </dl>

    </div>
</div>

@endsection
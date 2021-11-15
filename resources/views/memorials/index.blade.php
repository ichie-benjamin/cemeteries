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
                <h4 class="mt-5 mb-5">Memorials</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('memorials.memorial.create') }}" class="btn btn-success" title="Create New Memorial">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($memorials) == 0)
            <div class="panel-body text-center">
                <h4>No Memorials Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name</th>
                            <th>Nickname</th>
                            <th>Maiden Name</th>
                            <th>Gender</th>
                            <th>Birth Day</th>
                            <th>Birth Month</th>
                            <th>Birth Year</th>
                            <th>Death Day</th>
                            <th>Death Month</th>
                            <th>Death Year</th>
                            <th>Birth Location</th>
                            <th>Death Location</th>
                            <th>Bio</th>
                            <th>Prefix</th>
                            <th>Suffix</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($memorials as $memorial)
                        <tr>
                            <td>{{ $memorial->first_name }}</td>
                            <td>{{ $memorial->last_name }}</td>
                            <td>{{ $memorial->middle_name }}</td>
                            <td>{{ $memorial->nickname }}</td>
                            <td>{{ $memorial->maiden_name }}</td>
                            <td>{{ $memorial->gender }}</td>
                            <td>{{ $memorial->birth_day }}</td>
                            <td>{{ $memorial->birth_month }}</td>
                            <td>{{ $memorial->birth_year }}</td>
                            <td>{{ $memorial->death_day }}</td>
                            <td>{{ $memorial->death_month }}</td>
                            <td>{{ $memorial->death_year }}</td>
                            <td>{{ $memorial->birth_location }}</td>
                            <td>{{ $memorial->death_location }}</td>
                            <td>{{ $memorial->bio }}</td>
                            <td>{{ $memorial->prefix }}</td>
                            <td>{{ $memorial->suffix }}</td>

                            <td>

                                <form method="POST" action="{!! route('memorials.memorial.destroy', $memorial->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('memorials.memorial.show', $memorial->id ) }}" class="btn btn-info" title="Show Memorial">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('memorials.memorial.edit', $memorial->id ) }}" class="btn btn-primary" title="Edit Memorial">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Memorial" onclick="return confirm(&quot;Click Ok to delete Memorial.&quot;)">
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
            {!! $memorials->render() !!}
        </div>

        @endif

    </div>
@endsection

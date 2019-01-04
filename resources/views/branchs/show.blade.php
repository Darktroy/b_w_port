@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($branchs->name) ? $branchs->name : 'Branchs' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('branchs.branchs.destroy', $branchs->branch_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('branchs.branchs.index') }}" class="btn btn-primary" title="Show All Branchs">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('branchs.branchs.create') }}" class="btn btn-success" title="Create New Branchs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('branchs.branchs.edit', $branchs->branch_id ) }}" class="btn btn-primary" title="Edit Branchs">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Branchs" onclick="return confirm(&quot;Delete Branchs??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Branch</dt>
            <dd>{{ $branchs->branch_id }}</dd>
            <dt>Company</dt>
            <dd>{{ optional($branchs->company)->id }}</dd>
            <dt>Name</dt>
            <dd>{{ $branchs->name }}</dd>
            <dt>Address</dt>
            <dd>{{ $branchs->address }}</dd>

        </dl>

    </div>
</div>

@endsection
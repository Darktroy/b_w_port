@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($departement->name) ? $departement->name : 'Departement' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('departements.departement.destroy', $departement->departement_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('departements.departement.index') }}" class="btn btn-primary" title="Show All Departement">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('departements.departement.create') }}" class="btn btn-success" title="Create New Departement">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('departements.departement.edit', $departement->departement_id ) }}" class="btn btn-primary" title="Edit Departement">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Departement" onclick="return confirm(&quot;Delete Departement??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Departement</dt>
            <dd>{{ $departement->departement_id }}</dd>
            <dt>Branch</dt>
            <dd>{{ optional($departement->branch)->branch_id }}</dd>
            <dt>Company</dt>
            <dd>{{ optional($departement->company)->id }}</dd>
            <dt>Name</dt>
            <dd>{{ $departement->name }}</dd>

        </dl>

    </div>
</div>

@endsection
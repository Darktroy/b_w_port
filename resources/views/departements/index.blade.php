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
                <h4 class="mt-5 mb-5">Departements</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('departements.departement.create') }}" class="btn btn-success" title="Create New Departement">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($departements) == 0)
            <div class="panel-body text-center">
                <h4>No Departements Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Departement</th>
                            <th>Branch</th>
                            <th>Company</th>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($departements as $departement)
                        <tr>
                            <td>{{ $departement->departement_id }}</td>
                            <td>{{ optional($departement->branch)->branch_id }}</td>
                            <td>{{ optional($departement->company)->id }}</td>
                            <td>{{ $departement->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('departements.departement.destroy', $departement->departement_id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('departements.departement.show', $departement->departement_id ) }}" class="btn btn-info" title="Show Departement">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('departements.departement.edit', $departement->departement_id ) }}" class="btn btn-primary" title="Edit Departement">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Departement" onclick="return confirm(&quot;Delete Departement?&quot;)">
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
            {!! $departements->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
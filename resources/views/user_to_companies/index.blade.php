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
                <h4 class="mt-5 mb-5">User To Companies</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('user_to_companies.user_to_company.create') }}" class="btn btn-success" title="Create New User To Company">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($userToCompanies) == 0)
            <div class="panel-body text-center">
                <h4>No User To Companies Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User To Company</th>
                            <th>Company</th>
                            <th>User</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($userToCompanies as $userToCompany)
                        <tr>
                            <td>{{ $userToCompany->userToCompany_id }}</td>
                            <td>{{ optional($userToCompany->company)->id }}</td>
                            <td>{{ optional($userToCompany->user)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('user_to_companies.user_to_company.destroy', $userToCompany->userToCompany_id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('user_to_companies.user_to_company.show', $userToCompany->userToCompany_id ) }}" class="btn btn-info" title="Show User To Company">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('user_to_companies.user_to_company.edit', $userToCompany->userToCompany_id ) }}" class="btn btn-primary" title="Edit User To Company">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete User To Company" onclick="return confirm(&quot;Delete User To Company?&quot;)">
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
            {!! $userToCompanies->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
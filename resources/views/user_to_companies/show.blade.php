@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'User To Company' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('user_to_companies.user_to_company.destroy', $userToCompany->userToCompany_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('user_to_companies.user_to_company.index') }}" class="btn btn-primary" title="Show All User To Company">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('user_to_companies.user_to_company.create') }}" class="btn btn-success" title="Create New User To Company">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('user_to_companies.user_to_company.edit', $userToCompany->userToCompany_id ) }}" class="btn btn-primary" title="Edit User To Company">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete User To Company" onclick="return confirm(&quot;Delete User To Company??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User To Company</dt>
            <dd>{{ $userToCompany->userToCompany_id }}</dd>
            <dt>Company</dt>
            <dd>{{ optional($userToCompany->company)->id }}</dd>
            <dt>User</dt>
            <dd>{{ optional($userToCompany->user)->id }}</dd>

        </dl>

    </div>
</div>

@endsection
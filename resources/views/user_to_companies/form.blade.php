
<div class="form-group {{ $errors->has('userToCompany_id') ? 'has-error' : '' }}">
    <label for="userToCompany_id" class="col-md-2 control-label">User To Company</label>
    <div class="col-md-10">
        <select class="form-control" id="userToCompany_id" name="userToCompany_id">
        	    <option value="" style="display: none;" {{ old('userToCompany_id', optional($userToCompany)->userToCompany_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user to company</option>
        	@foreach ([] as $key => $text)
			    <option value="{{ $key }}" {{ old('userToCompany_id', optional($userToCompany)->userToCompany_id) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('userToCompany_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
    <label for="company_id" class="col-md-2 control-label">Company</label>
    <div class="col-md-10">
        <select class="form-control" id="company_id" name="company_id">
        	    <option value="" style="display: none;" {{ old('company_id', optional($userToCompany)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
        	@foreach ($companies as $key => $company)
			    <option value="{{ $key }}" {{ old('company_id', optional($userToCompany)->company_id) == $key ? 'selected' : '' }}>
			    	{{ $company }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($userToCompany)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($userToCompany)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


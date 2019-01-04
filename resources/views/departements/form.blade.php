
<div class="form-group {{ $errors->has('departement_id') ? 'has-error' : '' }}">
    <label for="departement_id" class="col-md-2 control-label">Departement</label>
    <div class="col-md-10">
        <select class="form-control" id="departement_id" name="departement_id">
        	    <option value="" style="display: none;" {{ old('departement_id', optional($departement)->departement_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select departement</option>
        	@foreach ([] as $key => $text)
			    <option value="{{ $key }}" {{ old('departement_id', optional($departement)->departement_id) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('departement_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : '' }}">
    <label for="branch_id" class="col-md-2 control-label">Branch</label>
    <div class="col-md-10">
        <select class="form-control" id="branch_id" name="branch_id">
        	    <option value="" style="display: none;" {{ old('branch_id', optional($departement)->branch_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select branch</option>
        	@foreach ($branches as $key => $branch)
			    <option value="{{ $key }}" {{ old('branch_id', optional($departement)->branch_id) == $key ? 'selected' : '' }}>
			    	{{ $branch }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
    <label for="company_id" class="col-md-2 control-label">Company</label>
    <div class="col-md-10">
        <select class="form-control" id="company_id" name="company_id">
        	    <option value="" style="display: none;" {{ old('company_id', optional($departement)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
        	@foreach ($companies as $key => $company)
			    <option value="{{ $key }}" {{ old('company_id', optional($departement)->company_id) == $key ? 'selected' : '' }}>
			    	{{ $company }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($departement)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


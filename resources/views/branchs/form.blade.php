
<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : '' }}">
    <label for="branch_id" class="col-md-2 control-label">Branch</label>
    <div class="col-md-10">
        <select class="form-control" id="branch_id" name="branch_id" required="true">
        	    <option value="" style="display: none;" {{ old('branch_id', optional($branchs)->branch_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select branch</option>
        	@foreach ([] as $key => $text)
			    <option value="{{ $key }}" {{ old('branch_id', optional($branchs)->branch_id) == $key ? 'selected' : '' }}>
			    	{{ $text }}
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
        	    <option value="" style="display: none;" {{ old('company_id', optional($branchs)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
        	@foreach ($companies as $key => $company)
			    <option value="{{ $key }}" {{ old('company_id', optional($branchs)->company_id) == $key ? 'selected' : '' }}>
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
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($branchs)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($branchs)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@extends('companyadminpanel.masterLayout')
@section('content')
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit Employee </div>
        @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        <div class="card-body">
            
      
            <form method="POST" action="{{ url('/companies/Updating') }}" 
                  accept-charset="UTF-8" id="create_company_form" name="create_employee_form"
                  class="contact100-form validate-form">
                

            {{ csrf_field() }}
                <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_landline" name="company_landline" class="form-control" 
                         value="{{ $company->company_landline }}" required="required">
                <label for="company_landline">Company LandLine</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_fax" name="company_fax" class="form-control" 
                         value="{{ $company->company_fax }}" required="required">
                <label for="company_fax">Company Fax</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_address" name="company_address" class="form-control" 
                         value="{{ $company->company_address }}" required="required">
                <label for="company_address">Company Address</label>
              </div>
            </div>
            
            
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_website" name="company_website" class="form-control" 
                         value="{{ $company->company_website }}" required="required">
                <label for="company_website">Company web site Url</label>
              </div>
            </div>
             
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_about" name="company_about" class="form-control" 
                         value="{{ $company->company_about }}" required="required">
                <label for="company_about">Company Description</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_facebook" name="company_facebook" class="form-control" 
                         value="{{ $company->company_facebook }}" required="required">
                <label for="company_facebook">Company Facebook</label>
              </div>
            </div>
               
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_twitter" name="company_twitter" class="form-control" 
                         value="{{ $company->company_twitter }}" required="required">
                <label for="company_twitter">Company Twitter</label>
              </div>
            </div>
              
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_instagram" name="company_instagram" class="form-control" 
                         value="{{ $company->company_instagram }}" required="required">
                <label for="company_instagram">Company Instagram</label>
              </div>
            </div>
              
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="company_youtube" name="company_youtube" class="form-control" 
                         value="{{ $company->company_youtube }}" required="required">
                <label for="company_youtube">Company Youtube</label>
              </div>
            </div>
            
            
                <button class="btn btn-primary btn-block">
                                Update
                        </button>
          </form>
          <div class="text-center">
<!--            <a class="d-block small mt-3" href="login.html">Login Page</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
          </div>
        </div>
      </div>
    </div>
@endsection

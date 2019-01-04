@extends('companyadminpanel.masterLayout')
@section('content')
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Branch</div>
        <div class="card-body">
            
            <form method="POST" action="{{ route('branchs.branchs.store') }}" 
                  accept-charset="UTF-8" id="create_company_form" name="create_company_form"
                  class="contact100-form validate-form">
                

            {{ csrf_field() }}
                
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Branch name" required="required">
                <label for="name">Branch name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="address" name="address" class="form-control" placeholder="Branch address" required="required">
                <label for="address">Branch address</label>
              </div>
            </div>
                <button class="btn btn-primary btn-block">
                                Add
                        </button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.html">Login Page</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
@endsection


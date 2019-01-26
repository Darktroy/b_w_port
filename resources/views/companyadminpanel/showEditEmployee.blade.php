@extends('companyadminpanel.masterLayout')
@section('content')
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit Employee </div>
        <div class="card-body">
            
      
            <form method="POST" action="{{ url('/employeeUpdate/'.$data['email']) }}" 
                  accept-charset="UTF-8" id="create_company_form" name="create_employee_form"
                  class="contact100-form validate-form">
                

            {{ csrf_field() }}
                
            <div class="form-group">
              <div class="form-label-group">
                  <select  name="branch_id" class="form-control">
                      
                        <option value='' >Branch name</option>
                        @foreach ($branches as $branche)
                        <option value="{{$branche->branch_id}}">{{$branche->name}}</option>
                        @endforeach
                    
                    
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <select  name="departement_id" class="form-control">
                      
                        <option value='' >Department name</option>
                        @foreach ($departements as $departement)
                        @if($data['userToCompany']->departement_id == $departement->departement_id)
                            <option value="{{$departement->departement_id}}" selected>{{$departement->name}}</option>
                        @else
                            <option value="{{$departement->departement_id}}" >{{$departement->name}}</option>
                        @endif
                        
                        @endforeach
                    
                    
                  </select>
              </div>
            </div>
            <!--//////////////////////////////////?-->
                
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="first_name" name="first_name" class="form-control" value="{{$data['first_name']}}" required="required">
                <label for="first_name">First name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="last_name" name="last_name" class="form-control" value="{{$data['last_name']}}" required="required">
                <label for="last_name">Last name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="email" name="email" class="form-control" value="{{$data['email']}}" required="required" readonly>
                <label for="email">E-mail</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="position" name="position" class="form-control" value="{{$data['userCard']->position}}" required="required">
                <label for="position">Position</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="phone" name="phone" class="form-control" value="{{$data['userCard']->cell_phone_number}}" required="required">
                <label for="phone">Cell phone</label>
              </div>
            </div>
            <!--Landline-->
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="landline" name="landline" class="form-control" value="{{$data['userCard']->landline}}" required="required">
                <label for="landline">Landline</label>
              </div>
            </div>
            <!--fax-->
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="fax" name="fax" class="form-control" value="{{$data['userCard']->fax}}" required="required">
                <label for="fax">Fax</label>
              </div>
            </div>
            <!--alias-->
            <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="alias" name="alias" class="form-control"  value="{{$data['userCard']->alias}}" required="required">
                <label for="alias">Alias</label>
              </div>
            </div>
            <!--alias-->
            <div class="form-group">
              <div class="form-label-group">
                  <!--<input type="text" id="gender" name="gender" class="form-control" placeholder="Gender ..." required="required">-->
                  <select name="gender" class="form-control">
                        @if($data['userCard']->gender == "male")
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        @else
                            <option value="male" >Male</option>
                            <option value="female" selected>Female</option>
                        @endif
                  </select> 
                <!--<label for="gender">Gender</label>-->
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


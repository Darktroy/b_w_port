
@extends('companyadminpanel.masterLayout')
@section('content')
   
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Employee Name</th>
                      <th>email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($employeeList as $emp)
                        <tr>
<!--                            <td><a href="{{url('/departments/show/')}}">{{$emp['name']}}</a></td>-->
                            <td><a href="{{url('')}}">{{$emp['name']}}</a></td>
                            <td>{{$emp['email']}}</td>
                            <td><a href="{{url('/editEmployee/'.$emp['email'])}}">Edit</a>&nbsp;,&nbsp;<a href="{{url('/blockEmployee/'.$emp['email'])}}">Block</a></td>
                        </tr>
                    @endforeach

                    
                  </tbody>
                </table>
                  <hr />
              </div>
            </div>
            <div class="card-footer small text-muted">Updated </div>
          </div>

@endsection


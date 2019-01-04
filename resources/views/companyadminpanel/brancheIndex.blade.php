@extends('companyadminpanel.masterLayout')
@section('content')
   
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Departments of Branches &nbsp; <a href={{url("branchs/create")}}><input type="submit" value="Add Branch" /></a>
              @if(count($branchsObjects)>0)
              &nbsp; <a href={{url("departments/create")}}><input type="submit" value="Add Department" /></a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  <thead>
                    <tr>
                      <th>Branch Name</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  
<!--                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                    </tr>
                  </tfoot>-->
                  <tbody>

                    @foreach($branchsObjects as $branch)
                        <tr>
                            <td><a href="{{url('/branchs/show/'.$branch['branch_id'])}}">{{$branch['name']}}</a></td>
                         <td>{{$branch['address']}}</td>

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


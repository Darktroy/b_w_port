@extends('companyadminpanel.masterLayout')
@section('content')
   
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>{{$branchsObjects['name']}} Branch</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Department Name</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($departements as $dep)
                        <tr>
                            <td><a href="{{url('/departments/show/'.$dep['departement_id'])}}">{{$dep['name']}}</a></td>
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


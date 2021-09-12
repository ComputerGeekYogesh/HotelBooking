@extends ('layouts.master')

@section('title')
Staff Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Staff
            </h4>
            <div class="py-2">
                {{-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}
        </div>
                <form action="{{url('staff-update/'.$staff->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">First Name</label>
                              <input type ="text" name="f_name"  value="{{$staff->f_name}}" class="form-control" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type ="text" name="l_name"  value="{{$staff->l_name}}"  class="form-control" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="">User Name</label>
                              <input type ="text" name="u_name"  value="{{$staff->user_name}}"  class="form-control" placeholder="Enter User Name">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Password</label>
                              <input type ="text" name="password"  value="{{$staff->password}}"  class="form-control" placeholder="Enter Password">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Email</label>
                              <input type ="email" name="email"  value="{{$staff->email}}"  class="form-control" placeholder="Enter Email Address">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Phone</label>
                              <input type ="number" name="mobile_no"  value="{{$staff->mobile_no}}"  class="form-control" placeholder="Enter Phone Number">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" class="form-control">
                                <option>
                                   @if ($staff->gender == 0)
                                      Male
                                      <option value = "female">Female</option>
                                      <option value = "other">Other</option>

                                   @elseif ($staff->gender == 1)
                                       Female
                                    <option value = "male">Male</option>
                                    <option value = "other">Other</option>

                                    @elseif ($staff->gender == 2)
                                   Other
                                 <option value = "other">Other</option>
                                 <option value = "male">Male</option>
                                 <option value = "female">Female</option>
                                   @endif
                                </option>
                            </select>
                        </div>
                    </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Address</label>
                              <input type ="text" name="address"  value="{{$staff->address}}"  class="form-control" placeholder="Enter Address">
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Image</label>
                          <input type ="file" name="image" class="form-control" >
                          <img src="{{$staff->image}}" width="70px"/>
                        </div>
                    </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Room Status</label>
                                        <select name="status" class="form-control">
                                            <option>
                                               @if ($staff->status == 0)
                                                   Active
                                                <option value = "inactive">Inactive</option>
                                               @elseif ($staff->status == 1)
                                                   Inactive
                                                <option value = "active">Active</option>
                                               @endif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                              </div>

                  </div>
                  <div class="modal-footer">
                    <a href="{{url('staff')}}" class="btn btn-secondary"> BACK</a>
                    <button type="submit" class="btn btn-primary">UPDATE </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        </div>
        @endsection

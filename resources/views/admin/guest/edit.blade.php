@extends ('layouts.master')

@section('title')
Guest Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Guest
            </h4>
            <div class="py-2">
                {{-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}
        </div>
                <form action="{{url('guest-update/'.$guest->id)}}" method="POST" enctype="multipart/form-data">
                    {{-- {{csrf_field()}}
                    {{method_field('PUT')}} --}}

                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">First Name</label>
                              <input type ="text" name="f_name"  value="{{$guest->f_name}}" class="form-control" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type ="text" name="l_name"  value="{{$guest->l_name}}" class="form-control" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type ="email" name="email"  value="{{$guest->email}}" class="form-control" placeholder="Enter Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type ="number" name="mobile_no"  value="{{$guest->mobile_no}}" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option>
                                       @if ($guest->status == 0)
                                           Active
                                        <option value = "inactive">Inactive</option>
                                       @elseif ($guest->status == 1)
                                           Inactive
                                        <option value = "active">Active</option>
                                       @endif
                                    </option>
                                </select>
                            </div>
                        </div>
                                  {{-- <div class="col-md-6 my-2">
                                      <div class="form-group">
                                          <label for="">Show / Hide</label>
                                          <input type ="checkbox" name="status" value="{{$roomtype->}}"  class="" placeholder="Enter Name">
                                      </div>
                                  </div> --}}
                              </div>

                  </div>
                  <div class="modal-footer">
                    <a href="{{url('guest')}}" class="btn btn-secondary"> BACK</a>
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

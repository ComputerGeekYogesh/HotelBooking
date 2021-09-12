@extends ('layouts.master')

@section('title')
Room Type Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Room Type
            </h4>
            <div class="py-2">
                {{-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}
        </div>
                <form action="{{url('roomtype-update/'.$roomtype->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Room title</label>
                                <input type ="text" name="roomtype" value="{{$roomtype->room_type}}"  class="form-control" placeholder="Enter Room Title">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Short code</label>
                                  <input type ="text" name="shortcode" value="{{$roomtype->short_code}}"  class="form-control" placeholder="Enter Short Code">
                              </div>
                          </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="">Room description</label>
                                          <textarea rows="4" name= "description" class="form-control" placeholder="Enter Room Description">{{$roomtype->description}}</textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="">Image</label>
                                        <input type ="file" name="image" class="form-control" >
                                        <img src="{{$roomtype->image}}" width="100px"/>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="">Price</label>
                                          <input type ="number" name="price" value="{{$roomtype->price}}"  class="form-control" placeholder="Enter Price">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total rooms</label>
                                        <input type ="number" name="totalroom" value="{{$roomtype->total_rooms}}"  class="form-control" placeholder="Enter Total Rooms">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Room Status</label>
                                        <select name="status" class="form-control">
                                            <option>
                                               @if ($roomtype->status == 0)
                                                   Active
                                                <option value = "inactive">Inactive</option>
                                               @elseif ($roomtype->status == 1)
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
                    <a href="{{url('roomtype')}}" class="btn btn-secondary"> BACK</a>
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

@extends ('layouts.master')

@section('title')
Floor Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Floor
            </h4>
            <div class="py-2">
                {{-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}
        </div>
                <form action="{{url('floor-update/'.$floor->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Floor Name</label>
                              <input type ="text" name="floorname" value="{{$floor->floor_name }}"  class="form-control" placeholder="Enter Floor Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Floor code</label>
                                <input type ="text" name="floorcode" value="{{$floor->floor_code}}"  class="form-control" placeholder="Enter Floor Code">
                            </div>
                        </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Floor description</label>
                                        <textarea rows="4" name= "floor_description" class="form-control" placeholder="Enter Floor Description">{{$floor->floor_description}}</textarea>
                                    </div>
                                </div>
                              </div>

                  </div>
                  <div class="modal-footer">
                    <a href="{{url('floor')}}" class="btn btn-secondary"> BACK</a>
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

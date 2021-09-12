@extends('layouts.master')

@section('title')
Rooms
@endsection


@section('content')

 {{-- add room Modal code--}}

<div class="modal fade" id="roomtypeModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('room-store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
          <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Room No</label>
                              <input type ="number" name="price" class="form-control" placeholder="Enter Room Number">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Booking No</label>
                            <select name="status" class="form-control">
                                <option value = "" disabled selected hidden>Select Booking </option>
                                <option value = "active">Active</option>
                                <option value = "inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Room Type</label>
                            <select name="status" class="form-control">
                                <option value = "" disabled selected hidden>Select Room Type </option>
                                <option value = "active">Active</option>
                                <option value = "inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Floor</label>
                            <select name="status" class="form-control">
                                <option value = "" disabled selected hidden>Select Floor </option>
                                <option value = "active">Active</option>
                                <option value = "inactive">Inactive</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Room Status</label>
                            <select name="status" class="form-control">
                                <option value = "" disabled selected hidden>Select Status </option>
                                <option value = "active">Active</option>
                                <option value = "inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                      {{-- <div class="col-md-6 my-2">
                          <div class="form-group">
                              <label for="">Show / Hide</label>
                              <input type ="checkbox" name="status" class="" placeholder="Enter Name">
                          </div>
                      </div> --}}
                  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Rooms
          <button type="button" class="btn btn-primary py-2 float-right" data-toggle="modal" data-target="#roomtypeModal">ADD</button>
        </h4>
        <div class="py-2">
</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id = "datatable" class="table" >
              <thead class=" text-primary">
                <th>
                  Id
                </th>
                <th>
                    Room Number
                </th>
                <th>
                    Booking Number
                </th>
                <th>
                    Room Type
                </th>
                <th>
                    Floor
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Edit
                  </th>
                  <th>
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ( $room as $item )
                <tr>
                        <input type="hidden" class="roomtypedelete_val_id" value="{{$item->id}}">
                  <td>
                    {{$item->id}}
                </td>
                  <td>
                    {{$item->room_type}}
                  </td>
                  <td>
                    {{$item->short_code}}
                  </td>
                  <td >
                    {{$item->description}}
                  </td>
                  <td>
                    {{$item->price}}
                  </td>
                  <td>
                    <img src="{{$item->image}}" width="50px"/>
                  </td>
                  <td>
                    {{$item->total_rooms}}
                  </td>
                  <td>
                    @if ($item->status == '0')
                        <button type="button" class="btn btn-pill btn-success">Active</button>
                    @elseif ($item->status == '1')
                        <button type="button" class="btn btn-pill btn-secondary">Inactive</button>
                    @endif
                  </td>
                  <td>
                    <a href = "{{url('room-edit/'.$item->id)}}" class="btn btn-info">EDIT</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger roomtypedeletebtn">DELETE</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('script')

<script>

$(document).ready( function () {
    $('#datatable').DataTable();
});

$(document).ready( function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $('.roomtypedeletebtn').click(function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find('.roomtypedelete_val_id').val();
       //alert(delete_id);
        swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      var data = {
        "_token": $('input[name= _token]').val(),
        "id": delete_id,
      };
    $.ajax({
        type: "DELETE",
        url: '/roomtype-delete/'+delete_id,
        data: "data",
        success: function (response) {
            swal(response.status, {
             icon: "success",
    })
    .then((result) => {
        location.reload();
    });
        }
    });
  }
});

    });
});
</script>
@endsection


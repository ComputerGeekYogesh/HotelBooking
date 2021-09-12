@extends('layouts.master')

@section('title')
Room Types
@endsection


@section('content')

 {{-- add roomtype Modal code--}}

<div class="modal fade" id="roomtypeModal" aria-labelledby="roomtypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Room Type</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('roomtype-store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Room title</label>
                    <input type ="text" name="roomtype" class="form-control" placeholder="Enter Room Title">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Short code</label>
                      <input type ="text" name="shortcode" class="form-control" placeholder="Enter Short Code">
                  </div>
              </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Room description</label>
                              <textarea rows="4" name= "description" class="form-control" placeholder="Enter Room Description"></textarea>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Image</label>
                              <input type ="file" name="image" class="form-control"><br>
                              <button type = button> Choose File</button>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Price</label>
                              <input type ="number" name="price" class="form-control" placeholder="Enter Price">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Total rooms</label>
                            <input type ="number" name="totalroom" class="form-control" placeholder="Enter Total Rooms">
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

<!-- End modal -->

            <!--Delete Modal code -->
  {{-- <div class="modal fade" id="deleteModalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="delete_modal_form" method="POST" >
            {{csrf_field()}}
            {{method_field('DELETE')}}

        <div class="modal-body">
         <input type="text" id="delete_roomtype_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes. Delete it.</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}

  <!-- End modal Delete -->

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Room Types
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
                    Room type
                </th>
                <th>
                    Short code
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Total rooms
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
                @foreach ( $roomtype as $item )
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
                    <a href = "{{url('roomtype-edit/'.$item->id)}}" class="btn btn-info">EDIT</a>
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


//     $('#datatable').on('click','deletebtn', function(){
//         $tr = $(this).closest('tr');

//         var data = $tr.children("td").map(function(){
//             return $(this).text();
//         }).get();

//         $('#delete_roomtype_id').val(data[0]);
//         $('#delete_modal_form').attr('action','/roomtype-delete/'+data[0]);
//         // $('#deleteModalpop').modal('show');
// });


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


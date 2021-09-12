@extends('layouts.master')

@section('title')
Floors
@endsection


@section('content')

 {{-- add roomtype Modal code--}}

<div class="modal fade" id="roomtypeModal" tabindex="-1" aria-labelledby="roomtypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Floor</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('floor-store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Floor Name</label>
                    <input type ="text" name="floorname" class="form-control" placeholder="Enter Floor Name">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Floor code</label>
                      <input type ="text" name="floorcode" class="form-control" placeholder="Enter Floor Code">
                  </div>
              </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Floor description</label>
                              <textarea rows="4" name= "floor_description" class="form-control" placeholder="Enter Floor Description"></textarea>
                          </div>
                      </div>

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
          <h4 class="card-title"> Floors
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
                    Floor Name
                </th>
                <th>
                    Floor code
                </th>
                <th>
                    Description
                </th>
                  <th>
                    Edit
                  </th>
                  <th>
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ( $floor as $item )
                <tr>
                        <input type="hidden" class="roomtypedelete_val_id" value="{{$item->id}}">
                  <td>
                    {{$item->id}}
                </td>
                  <td>
                    {{$item->floor_name}}
                  </td>
                  <td>
                    {{$item->floor_code}}
                  </td>
                  <td >
                    {{$item->floor_description}}
                  </td>
                  <td>
                    <a href = "{{url('floor-edit/'.$item->id)}}" class="btn btn-info">EDIT</a>
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
        url: '/floor-delete/'+delete_id,
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


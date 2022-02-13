@extends('layouts.admin')


@section('title')
    SportingEvents | Sporting Events
@endsection



@section('content')
   



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sporting Events</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/save-SportingEvents" method="POST">
            {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control" id="recipient-name">
            </div>

            {{--<div class="form-group">
              <label for="message-text" class="col-form-label">Sport:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
        --}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sport:</label>
            <input type="text" name="sport" class="form-control" id="recipient-name">
          </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Time Length:</label>
                <input type="text" name="timelength" class="form-control" id="recipient-name">
              </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>




<!-- Modal Delete-->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="delete_modal_Form" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}

      <div class="modal-body">
        <input type="hidden" id="delete_sportingevents_id">
        <h5>Are you sure you want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>

    </form>

    </div>
  </div>
</div>
<!-- End Modal Delete-->







<div class ="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Sporting Events 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
                </h4>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="card-body">
                 <div class="table-responsive">
                   <table id="datatable" class="table">
                        <thead class="text-primary">
                            <th class='w-10p'>Id</th>
                            <th class='w-10p'>Title</th>
                            <th class='w-10p'>Sport</th>
                            <th class='w-10p'>Time Length</th>
                            <th class='w-10p'>EDIT</th>
                            <th class='w-10p'>DELETE</th>
                        </thead>
                        <tbody>                           
                            @foreach ($sportingevents as $data)    
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->sport}}</td>
                                <td>{{$data->timelength}}</td>
                                
                                <td>
                                <a href="{{ url('sporting-events/'.$data->id)}}" class="btn btn-success">EDIT</a>
                            </td>
                            <td>

                              <a href="javascript:void(0)" class="btn btn-danger deletebtn">Delete</a>
                                
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


@endsection



@section('scripts')
    <script>
      $(document).ready( function () {
          $('#datatable').DataTable();


          $('#datatable').on('click', '.deletebtn', function () {

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function () {
                  return $(this).text();
              }).get();
            
              // console.log(data);

              $('#delete_sportingevents_id').val(data[0]);

              $('#delete_modal_Form').attr('action', '/sporting-events-delete/'+data[0]);

              $('#deletemodalpop').modal('show');
          });

      });
    </script>
@endsection
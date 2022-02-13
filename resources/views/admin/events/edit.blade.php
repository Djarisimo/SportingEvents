@extends('layouts.admin')


@section('title')
    SportingEvents Edit
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Sporting Events - Edin Data</h4>

            <form action="{{ url('sportingevents-update/'.$sportingevents->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
        
                <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $sportingevents->title }}">
                    </div>
        
                    {{--<div class="form-group">
                      <label for="message-text" class="col-form-label">Sport:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                --}}
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Sport:</label>
                    <input type="text" name="sport" class="form-control" value="{{ $sportingevents->sport }}">
                  </div>
        
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Time Length:</label>
                        <input type="text" name="timelength" class="form-control" value="{{ $sportingevents->timelength }}">
                      </div>
        
                  
                </div>
                <div class="modal-footer">
                <a href="{{ url('Sporting-Events')}}" class="btn btn-secondary">Back</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
                
            </div>
        </div>
    </div>

</div>



@endsection
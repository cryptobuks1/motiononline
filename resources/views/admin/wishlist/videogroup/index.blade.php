@extends('layouts.admin')
@section('title','All Group')
@section('content')
  <div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
      <a href="{{route('videogroup.create')}}" class="btn btn-danger btn-md"><i class="material-icons left">add</i> Create Group</a>
      <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> Delete Selected</a>   
    
      <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading">Are You Sure ?</h4>
              <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
              {!! Form::open(['method' => 'POST', 'action' => 'WishListUserVideoController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body">
      <table id="movies_table" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
              #
            </th>
           
            <th>Group Title</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if ($videogroup)
          <tbody>
            @php ($no = 1)
            @foreach ($videogroup as $group)
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$group->id}}" id="checkbox{{$group->id}}">
                    <label for="checkbox{{$group->id}}" class="material-checkbox"></label>
                  </div>
                  {{$no}}
                  @php ($no++)
                </td>
               
                <td>{{$group->title}}</td>
               
                <td>
                  <div class="admin-table-action-block"> 
                    <a href="{{url('admin/wishlist/movie/detail', $group->id)}}" data-toggle="tooltip" data-original-title="Group Movies" class="btn-default btn-floating"><i class="material-icons">desktop_mac</i></a>
                     <a href="{{url('admin/wishlist/tvseries/detail', $group->id)}}" data-toggle="tooltip" data-original-title="Group Tv Series" class="btn-primary btn-floating"><i class="material-icons">airplay</i></a>
                    <a href="{{route('videogroup.edit', $group->id)}}" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#{{$group->id}}deleteModal"><i class="material-icons">delete</i> </button>
                  </div>
                </td>
              </tr>
              <!-- Modal -->
                <div id="{{$group->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h4 class="modal-heading">Are You Sure ?</h4>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['method' => 'DELETE', 'action' => ['WishListUserVideoController@destroy', $group->id]]) !!}
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </tbody>
        @endif
      </table>
    </div>
  </div>
@endsection
@section('custom-script')
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
@endsection
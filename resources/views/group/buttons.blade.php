<a href="{{route('groups.show', $row->id)}}"><button class="btn btn-primary">View</button></a>
@can('edit-group')
<!-- <a href="{{route('groups.edit', $row->id)}}"><button class="btn btn-warning">Edit</button></a> -->
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
  Edit
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editing Group Name</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endcan

@can('delete-group')
<button class="btn btn-danger">Delete</button>
@endcan



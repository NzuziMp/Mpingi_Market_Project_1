<div class="modal fade" id="editsubindustriesandmanufacturesModal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <h6><i class="fa fa-edit"></i> Edit Sub Industries and Manufacturers </h6>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="editSubIndustriesandManufacturesForm">
                <div id="create_idusandManufac"></div>
                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleName" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="edit_sub_category_name" value="{{ $row->sub_category_name }}"
                            placeholder="Enter Category Name" autocomplete="off">
                            <span class="text-danger">
                                <strong id="subcatname2-error" style="color:#dc3545"></strong>
                            </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="text" id="edit_subglid" value="{{ $row->id }}" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" id="btn_updatesubindustriesandManufactures"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="subindustriesandmanufacturesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <h6><i class="fa fa-industry"></i> New Sub Industries and Manufacturers</h6>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="SubIndustriesandManufacturesForm">
                <div id="create_idusandManufac"></div>
                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name"
                            placeholder="Enter Category Name" value="{{ $subId->category_name }}" autocomplete="off" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleName" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="sub_category_name" id="sub_category_name"
                            placeholder="Enter Sub Category Name" autocomplete="off">
                            <span class="text-danger">
                                <strong id="subcatname-error" style="color:#dc3545"></strong>
                            </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="text" id="indusandmanufac_id" value="{{ $subId->id }}" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" id="btn_addsubindustriesandManufactures"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

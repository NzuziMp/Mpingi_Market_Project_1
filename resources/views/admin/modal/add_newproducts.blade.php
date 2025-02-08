<div class="modal fade" id="newProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <h6><i class="fa fa-tag"></i> New Product</h6>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="IndustriesandManufacturesForm">
                <div id="create_idusandManufac"></div>
                @csrf
                <div class="modal-body">
                    <form method="POST" id="StudentForm" enctype="multipart/form-data">
                        <div id="create_stud"></div>
                        @csrf

                        <div class="row item active">
                            <div class="mb-1 col-md-4"  style="text-align:center;">
                                <div class="file-uploader">

                                    <label name="upload-label" class="upload-img-btn"
                                        style="border-style: dashed;cursor: pointer;border-color:#666;border-radius:6px">
                                        <input type="file" id="photo" name="photo" class="upload-field-1"
                                            style="display:none;cursor: pointer;" accept="image/*"
                                            title="Upload Foto.." />
                                        <img class="img-responsive preview-1"
                                            src="{{asset('assets/images/pngtree-add-to-cart-product-png-image_6443979.png') }}"
                                            style="width:100%;" title="Upload Photo.." />
                                    </label>
                                </div>
                                <!-- <img alt="..." class="img-thumbnail" alt="..." src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQs8gHxXxlSYqXQficLOI-N0ibkh0XX97-0vYgakpSb3y9zTFpIOg"> -->
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="pull-right">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Product Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="studentid_no" class="form-control"
                                                        id="studentid_no">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <span class="pull-right">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Price</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="rfid_number" class="form-control"
                                                        id="rfid_number">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Original Price</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="first_name" class="form-control"
                                                        id="first_name">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                     </div>
                                    </span>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Quantity</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="middle_name" class="form-control"
                                                        id="middle_name">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                     </div>
                                    </span>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Type</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" class="form-control"
                                                        id="last_name">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                       </div>
                                    </span>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Color</label>
                                                <div class="form-control-wrap">
                                                    <input type="color" name="first_name" class="form-control"
                                                        id="first_name">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                     </div>
                                    </span>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Disponibility</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="middle_name" class="form-control"
                                                        id="middle_name" >
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                     </div>
                                    </span>

                                    <div class="col-md-4">
                                        <span class="pull-right">
                                            <div class="mt-2 form-group">
                                                <label class="form-label" for="full-name">Website</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" class="form-control"
                                                        id="last_name">
                                                </div>
                                                <span class="text-danger">
                                                    <strong id="catname-error" style="color:#dc3545"></strong>
                                                </span>
                                            </div>
                                       </div>
                                    </span>

                                </div>

                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" id="btn_addindustriesandManufactures">
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

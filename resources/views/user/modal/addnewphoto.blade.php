<!-- Modal -->
<div class="modal fade" id="addnewPhotoModal{{ $row1->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666"><i class="fa fa-plus-square" style="font-size:1.2rem;"></i> Add New Picture</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-imguploadnew"  enctype="multipart/form-data">
        <div class="modal-body">
            <span id="uploadmgs2"></span>
       {{--  --}}
       <div class="mt-3 row align-items-center" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
        <div class="col-md-12">
          <input type="file"  class="form-control newimage_name" id="newimage_name" name="newimage_name[]" accept=".png, .jpg, .jpeg, .gif, .svg" aria-describedby="file-upload" multiple>
          <span class="text-danger">
            <strong id="newimguploads-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
            <strong id="newimguploads2-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
          </span>

        </div>
      </div>
       {{--  --}}
        </div>
        <div class="modal-footer">
            <input type="hidden" name="user_id" value="{{ $row1->user_id }}">
            <input type="hidden" name="product_item" value="{{ $row1->product_item }}">
            <input type="hidden" name="sub_product_id" value="{{ $row1->sub_product_id }}">
            <input type="hidden" name="id" value="{{ $row1->id }}">
          <button type="button" class="btn DetailsBtns3_" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline DetailsBtns2_ btn-additionalnewphoto" >Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div>

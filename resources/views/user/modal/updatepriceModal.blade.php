<!-- Modal -->
<div class="modal fade" id="updateprice_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #9f9f9f;font-family: Helvetica, Arial, sans-serif;font-size: 100%;font-size: 86%;">  <i class="far fa-money-bill-alt"></i> Change Price</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-price" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-10">
                        <label for=""><font color="red">*</font> Old Price</label>
                        <input type="text" id="view_oldprice" class="form-control" placeholder="Old Price" readonly>
                      </div>
                      <div class="col-md-2">
                        <label for="" style="color:#fff">0</label>
                         <div id="view_newcurrency"></div>
                      </div>

                </div>

                <div class="row g-2 mt-2">
                    <div class="col-md-10">
                        <label for=""><font color="red">*</font> New Price</label>
                        <input type="text" id="new_price" name="new_price" class="form-control" placeholder="New Price">
                        <span class="text-danger">
                            <strong id="prices-error" style="color:#dc3545"></strong>
                        </span>
                    </div>
                      <div class="col-md-2">
                        <label for="" style="color:#fff">0</label>
                         <div id="view_oldcurrency"></div>
                      </div>

                </div>


        </div>
        <div class="">
            <div class="row mb-4">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <input type="hidden" id="view_uproductid" name="view_uproductid">
                    <input type="hidden" id="view_ususerid">
                    <button type="button"  data-bs-toggle="tooltip" data-bs-placement="top"class="btn-updatesingleprice mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_x">
                        <i class="far fa-edit"></i> Update Price </button>
                </div>
                <div class="col-md-2"></div>
            </div>
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            {{-- <button type="button" class="btn btn-primary">Update Price</button> --}}
        </div>
    </form>
      </div>
    </div>
  </div>

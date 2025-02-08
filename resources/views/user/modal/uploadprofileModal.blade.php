<!-- Modal -->
  <div class="modal fade" id="UploadpicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title h5_xx" id="exampleModalLabel" align="center">Change Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-profile" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            @if(session()->has('mgs'))
            <div class="alert alert-success" role="alert">
               {{ session()->get('mgs') }}
            </div>
            @endif
         {{-- @if (is_array($getuser) || is_object($getuser)) --}}
          @foreach ($getuser as $row)
            <div class="row gx-1">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header picCss" style="background-color: #3b3b3b;">
                            <i class="far fa-image "></i> Change Picture
                        </div>
                        <div class="card-body">
                            <img  src="{{ (!empty($row->profile)) ? url('/storage/assets/uploads/'.$row->profile) :  url('/assets/images/deafault_pic.png')}}" class="img-thumbnail" height="250px" weight="250px">
                        </div>
                     </div>

                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header picCss" style="background-color: #3b3b3b;">
                            <i class="fa fa-upload"></i>  Select Picture
                        </div>
                        <div class="card-body">
                            <img id="showImage" src="{{ asset('assets/images/default_pic.png') }}" class="mb-1 img-thumbnail">
                            <input type="file" id="image" class="image" name="image" accept=".jpg, .png, .jpeg, .gif, .svg" style="border-style: dotted;border-color:#ccc;max-width:200px!important;border-radius:6px">
                            <span class="text-danger">
                                <strong id="image-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                             </span>
                        </div>
                     </div>
               </div>
            </div>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $row->id }}" readonly>
            @endforeach
            {{-- @endif --}}
        </div>
        <div class="modal-footer">
            {{-- <input type="hidden" id="edit_photo" value="{{ $row->profile }}" > --}}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn-updateprofile btn-updateprofile_ btn DetailsBtns2_x">Change</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });
    });
</script>

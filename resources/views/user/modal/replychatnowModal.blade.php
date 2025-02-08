<!-- Modal -->
<div class="modal fade" id="replychat_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #9f9f9f;font-family: Helvetica, Arial, sans-serif;font-size: 100%;font-size: 86%;">  <i class="fa fa-reply"></i> Reply a message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form1-mychat">
        <div class="modal-body">

            @forelse ($getcountbuyer as $row3)

            <img src="" id="edit_photo" width="40" height="40" class="mr-3 rounded-circle">&nbsp;&nbsp;
            <span id="edit_fullname"></span> <font style="font-style:italic;font-size:10px;color:#666">(Buyer name)</font></span>
            @empty

            @endforelse

            <div class="mb-3 mt-2">
                <label for="exampleFormControlTextarea1"  class="form-label"><i class="fa fa-envelope"></i> Reply Message</label>
                <textarea class="form-control edit_reply" oninput="limitChar2(this)" id="tArea" name="reply"  rows="3" placeholder="Enter your message..." autocomplete="off"></textarea>
                <span class="text-danger">
                    <strong id="message2-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                  </span>
            </div>
              <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <p id="charCounter_"> Characters remaining: <span
                            id="charCounter">100</span> / 100</p>
                </div>
            </div>
            </div>
        <div class="modal-footer">
            <input type="hidden" name="seller_id" id="edit_seller_id">
            <input type="hidden" name="edit_id" id="edit_id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary btn-replymessage">Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>

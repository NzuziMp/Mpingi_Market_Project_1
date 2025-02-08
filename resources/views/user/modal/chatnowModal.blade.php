<!-- Modal -->
<div class="modal fade" id="chatnow_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #9f9f9f;font-family: Helvetica, Arial, sans-serif;font-size: 100%;font-size: 86%;">  <i class="fa fa-user"></i> Chat now and Leave a message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-mychat">
        <div class="modal-body">

            @forelse ($getimageid as $row3)

            <img src="{{ (!empty($row3->profile)) ? url('/storage/assets/uploads/'.$row3->profile) :  url('/storage/assets/images/deafault_pic.png')}}" width="40" height="40" class="mr-3 rounded-circle">&nbsp;&nbsp;
            {{ Str::ucfirst($row->last_name) }} {{ Str::ucfirst($row->first_name) }} - <font style="font-style:italic;font-size:10px;color:#666">(Seller & Buyer name)</font></span>
            @empty

            @endforelse

            <div class="mb-3 mt-2">
                <label for="exampleFormControlTextarea1"  class="form-label"><i class="fa fa-envelope"></i> Leave Message</label>
                <textarea class="form-control" oninput="limitChar2(this)" id="tArea" name="message"  rows="3" placeholder="Enter your message..." autocomplete="off"></textarea>
                <span class="text-danger">
                    <strong id="message-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
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
            <input type="hidden" name="seller_id" id="seller_id" value="{{ $row3->uid }}">
            @foreach ($getuser as $buyer)
               <input type="hidden" name="buyer_id" id="buyer_id" value="{{ $buyer->id }}">
               <input type="hidden" name="email" id="email" value="{{ $buyer->email }}">
            @endforeach
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary btn-chatmessage">Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>

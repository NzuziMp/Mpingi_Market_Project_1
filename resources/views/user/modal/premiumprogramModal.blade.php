<div class="modal fade" id="premiumprogramModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: #9f9f9f; font: 12pt/130% Helvetica, Arial, sans-serif;font-weight:bold" class="top4">
                    <i class="fa fa-cogs"></i> services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-1">

                    <div class="col-md-6">

                        <div class="mt-3 card">
                            <h4 class="card-header" align="center" id="free_service"> BUSINESSES<br><font color="#ff7519">x</font></h4>
                            <div class="card-body">
                                <center><i class="mt-2 mb-2 fa fa-briefcase fa-5x"
                                        style="color: #ff7519;font-size: 80px;"></i></center>
                            </div>
                            {{-- <div class="mx-2 mb-2 form-group">
                                <center><button type="submit"
                                        class="py-3 btn btn-outline btn-lg w-100 btn-basiclisting3">
                                        NOT PAID</button></center>
                            </div> --}}
                           <div class="mx-2 mb-2 form-group">
                                <center><button type="submit"
                                        class="py-3 btn btn-outline btn-lg w-100 btn-basiclisting">
                                        GET STARTED </button></center>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="mt-3 card">
                            <h4 class="card-header" align="center" id="free_service2"> INDUSTRIES AND MANUFACTURERS</h4>
                            <div class="card-body">
                                <center><i class="mt-2 mb-2 fa fa-industry fa-5x"
                                        style="color: #5a88ca;font-size: 80px;"></i></center>
                            </div>
                            <form action="{{ route('user.premiumprogramindustries') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ encrypt(1) }}">
                             <div class="mx-2 mb-2 form-group">
                                <center><button type="submit"
                                        class="py-3 btn btn-outline btn-lg w-100 btn-basiclisting2">
                                        GET STARTED </button></center>
                             </div>
                           </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

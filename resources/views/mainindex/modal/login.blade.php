<!--Login Modal -->
<div class="modal fade" id="login_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-out-alt"></i>Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                        {{-- <h4 class="mt-1 mb-4 text-center card-title">Sign in</h4> --}}
                        <form  id="form-id">
                            @csrf
                            <div id="form-login" class="mb-2"></div>
                            <div id="user-login" class="mb-2"></div>
                                <div class="mb-3 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i>&nbsp;<font color='red'>*</font> </span>
                                        <input type="text" class="form-control email" id="email" name="email_" placeholder="Email" aria-label="Email"
                                            aria-describedby="basic-addon1">

                                    </div>
                                  <div class="text-danger">
                                    <strong id="email-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                  </div>
                                </div>
                                <div class="mb-2 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i>&nbsp;<font color='red'>*</font> </span>
                                        <input type="password" class="form-control password upassword" id="password" name="password_" placeholder="Password" aria-label="Password"
                                            aria-describedby="basic-addon1">

                                    </div>
                                  <div class="text-danger">
                                    <strong id="password-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                  </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" onclick="myFunction2()" id="exampleCheck1">
                                    <label class="form-check-label checkpass" for="exampleCheck1">Show Password Characters</label>
                                  </div>

                             <div class="form-group">
                                <button type="button" class="btn btn-outline btn-lg w-100 DetailsBtns2_ btn-loginguest"> Sign In </button>
                            </div>

                            <div class="mt-4 form-group">
                                <div class="row g-2">
                                     <div class="col-6">
                                        <a href="{{ route('forgotpassword') }}" class="DetailsBtnlogin_2"><button type="button"
                                            class="btn btn-outline btn-lg w-100 DetailsBtnlogin_2"><i
                                                class="fa fa-lock"></i> I forgot my password </button></a>
                                        {{-- <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtnlogin_"><i class="fa fa-lock"></i> I forgot my password </button> --}}
                                     </div>
                                     <div class="col-6">
                                        <a href="{{ route('joinlogin') }}" class="DetailsBtnlogin_2"><button type="button"
                                            class="btn btn-outline btn-lg w-100 DetailsBtnlogin_2"><i
                                                class="fa fa-users"></i> Register a new membership
                                        </button></a>
                                        {{-- <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtnlogin_"><i class="fa fa-users"></i> Register a new membership </button> --}}
                                     </div>
                                </div>
                            </div>
                        </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

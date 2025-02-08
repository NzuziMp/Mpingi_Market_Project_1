                            {{-- --}}
                            <div class="row g-2">
                                @foreach ($getuser as $row)
                                   @if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) ||
                                   is_null($row->month) || is_null($row->year)
                                   || is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) ||
                                   is_null($row->address_1))
                                   <div class="col-md-6">
                                       <div class="card" style="background-color:#fcf8e3;height:3rem;">
                                           <div class="card-body">
                                               <p
                                                   style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#8a6d3b;font-weight:bold">
                                                   <i class='fas fa-exclamation-triangle'></i> Please update your Profile
                                                   Account <a href="{{ route("user.profileinfo") }}"
                                                       class="AhrefColor">HERE</a></p>
                                           </div>
                                       </div>

                                   </div>
                                   @else

                                @endif
                                @endforeach

                               @foreach ($getbusinessdata as $row1)
                                @if($row1->business_name == "" || $row1->business_type == "" || $row1->dealers_in == ""
                                   || $row1->i_am_a == "" || $row1->address == "" || $row1->business_icon == "")
                                   <div class="col-md-6">
                                       <div class="card" style="background-color:#fcf8e3;height:3rem;">
                                           <div class="card-body">
                                               <p
                                                   style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#8a6d3b;font-weight:bold">
                                                   <i class='fas fa-exclamation-triangle'></i> Please update your Business
                                                   Account <a href="{{ route("user.business") }}"
                                                       class="AhrefColor">HERE</a></p>
                                           </div>
                                       </div>

                                   </div>
                                   @else

                                   @endif
                                   @endforeach
                               </div>
                               {{-- --}}

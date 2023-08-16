     <!-- approva modal -->
     <div class="modal fade" id="decline" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     {{--  --}}
                     <div class="row">

                         @for ($i = 0; $i < 5; $i++)
                             <div class="col-md-4 mb-4">
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="" name="checkbox1">
                                     <label class="form-check-label" for="checkbox1">
                                         box {{ $i }}
                                     </label>
                                 </div>
                             </div>
                         @endfor
                     </div>

                     {{--  --}}
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Understood</button>
                 </div>
             </div>
         </div>
     </div>
     <!-- decline modal -->
     <div class="modal fade" id="approval" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Approve user</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <select name="role" class="form-select" id="">

                         <option value="" disabled selected>--Select--</option>
                         <option value="">role from db</option>
                         <option value="">role from db</option>
                         <option value="">role from db</option>
                         <option value="">role from db</option>
                         <option value="">role from db</option>

                     </select>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Understood</button>
                 </div>
             </div>
         </div>
     </div>
     {{-- delete modal --}}
     <div class="modal fade" id="staticBackdrop{{ $test->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     Are you sure you want to Delete?
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>

                     <form action="{{ route('DelEmp', $test->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button class="btn btn-danger" type="submit">Delete</button>
                     </form>

                 </div>
             </div>
         </div>
     </div>

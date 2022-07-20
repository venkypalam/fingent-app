<!-- Modal -->
<div class="modal fade login-modal" id="addmark" tabindex="-1" role="dialog" aria-labelledby="addmarkLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header" id="addmarkLabel">
                <h4 class="modal-title">Add Mark</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
                <div class="modal-body">
                <form class="mt-0 needs-validation" novalidate method="post" action="{{ route('mark') }}" enctype="multipart/form-data">  
                    @csrf
                    <div class="form-group">
                        <label>Student *</label>
                        <select class="js-states form-control" id="student_id" name="student_id" required>
                         <option value="" selected disabled>Select Student ...</option>
                         @foreach($students as $student)
                         <option value="{{ $student->id }}">{{ $student->name }}</option>
                         @endforeach                         
                      </select>                        
                    </div>                     
                    <div class="form-group">
                        <label>Maths</label>
                        <input type="number" class="form-control mb-2 change maths" id="maths"  name="maths" required>
                    </div>   
                    <div class="form-group">
                        <label>Science</label>
                        <input type="number" class="form-control mb-2 change science" id = "science" name="science" required>
                    </div>  
                    <div class="form-group">
                        <label>History</label>
                        <input type="number" class="form-control mb-2 change history" id="history" name="history" required>
                    </div>                                                                             
                    <div class="form-group">
                        <label>Term</label>
                        <select name="term" id="term" class="form-control mb-2">
                            <option value="" selected disabled hidden>Select Term</option>
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                            <option value="Three">Three</option>
                        </select>                                           
                    </div>                    
                    <div class="form-group">
                        <label>Total Marks</label>
                        <input type="text" class="form-control mb-2 total_marks" id="total_marks" name="total_marks" required readonly>                                             
                    </div>                    
                    <button type="submit" id="submitBtn" class="btn btn-primary mt-2 mb-2 btn-block">Submit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    <!-- Modal End-->

    <!-- Edit  Modal -->
    <div class="modal fade login-modal" id="editmark" tabindex="-1" role="dialog" aria-labelledby="editmarkLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header" id="editmarkLabel">
                <h4 class="modal-title">Edit Mark</h4>
                </div>
                <div class="modal-body">
                <form class="mt-0 needs-validation" novalidate method="post" action="{{ route('markEdit') }}">
                    @csrf
                    <input type="hidden" class="form-control mb-2" id="id" name="id">
                    <div class="form-group">
                        <label>Student *</label>
                        <select class="js-states form-control" id="editStudentId" name="student_id" required>
                         <option value="" selected disabled>Select Student ...</option>
                         @foreach($students as $student)
                         <option value="{{ $student->id }}">{{ $student->name }}</option>
                         @endforeach                         
                      </select>                        
                    </div>                     
                    <div class="form-group">
                        <label>Maths</label>
                        <input type="number" class="form-control mb-2 changes maths" id="editMaths"  name="maths" required>
                    </div>
                    <div class="form-group">
                        <label>Science</label>
                        <input type="number" class="form-control mb-2 changes science" id="editScience"  name="science" required>
                    </div>                     
                    <div class="form-group">
                        <label>History</label>
                        <input type="number" class="form-control mb-2 changes history" id="editHistory"  name="history" required>
                    </div>                                      
                    <div class="form-group">
                        <label>Term</label>
                    <select name="term" id="editTerm" class="form-control mb-2">
                            <option value="" selected disabled hidden>Select Term</option>
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                            <option value="Three">Three</option>
                        </select>  
                    </div> 
                    <div class="form-group">
                        <label>Total Marks</label>
                        <input type="number" class="form-control mb-2 total_marks" id="editTotalMarks"  name="total_marks" required readonly>
                    </div>                                                      
                    <button type="submit" id="editsubmitBtn" class="btn btn-primary mt-2 mb-2 btn-block">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->

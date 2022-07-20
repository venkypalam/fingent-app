<!-- Modal -->
<div class="modal fade login-modal" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="addstudentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header" id="addstudentLabel">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
                <div class="modal-body">
                <form class="mt-0 needs-validation" novalidate method="post" action="{{ route('student') }}" enctype="multipart/form-data">  
                    @csrf
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" class="form-control mb-2" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter Name
                        </div>
                    </div>                 
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" class="form-control mb-2" id="age" name="age">                                             
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control mb-2">
                            <option value="" selected disabled hidden>Select Gender</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>                                                                   
                    </div>        
                    <div class="form-group">
                        <label>Reporting Teacher</label>                                           
                        <select name="reporting_teacher" class="form-control mb-2">
                            <option value="" selected disabled hidden>Select Reporting Teacher</option>
                            <option value="Ram">Ram</option>
                            <option value="Lakshmi">Lakshmi</option>
                            <option value="Raju">Raju</option>
                            <option value="Jai">Jai</option>
                        </select>                          
                    </div>                                                   
                    <button type="submit" id="submitBtn" class="btn btn-primary mt-2 mb-2 btn-block">Submit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    <!-- Modal End-->
    <!-- Edit  Modal -->
    <div class="modal fade login-modal" id="editstudent" tabindex="-1" role="dialog" aria-labelledby="editstudentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header" id="editstudentLabel">
                <h4 class="modal-title">Edit Student</h4>
                </div>
                <div class="modal-body">
                <form class="mt-0 needs-validation" novalidate method="post" action="{{ route('studentEdit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control mb-2" id="id" name="id">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" class="form-control mb-2" id="editName" name="name" required>
                        <div class="invalid-feedback">
                            Please enter Name
                        </div>
                    </div>                  
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" class="form-control mb-2" id="editAge" name="age" >
                    </div>  
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="editGender" class="form-control mb-2">
                            <option value="" selected disabled hidden>Select Gender</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>                         
                    </div>     
                    <div class="form-group">
                        <label>Reporting Teacher</label>                        
                        <select name="reporting_teacher" class="form-control mb-2" id="editReportingTeacher" >
                            <option value="" selected disabled hidden>Select Reporting Teacher</option>
                            <option value="Ram">Ram</option>
                            <option value="Lakshmi">Lakshmi</option>
                            <option value="Raju">Raju</option>
                            <option value="Jai">Jai</option>
                        </select>                          
                    </div>                                                                        
                    <button type="submit" id="editsubmitBtn" class="btn btn-primary mt-2 mb-2 btn-block">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->

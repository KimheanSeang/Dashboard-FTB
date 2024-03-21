@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        About Password
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>When changing, creating, or resetting a password, it should
                            meet
                            the following
                            criteria:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. The password must be at least 8 characters long.</p>
                            <p>2. The password must contain at least 1 symbol.</p>
                            <p>3. The password must contain at least 1 number.</p>
                            <p>4. The password must contain at least 2 uppercase letters.</p>
                            <p>5. The password must have lowercase letters.</p>
                            <p style="margin-top: 20px; color: red; margin-bottom: 10px">Example Passwords :</p>
                            <p style="margin-left: 20px; color: rgb(196, 162, 6)">1. FTB@ftb2023</p>
                            <p style="margin-left: 20px; color: rgb(196, 162, 6)">2. FTB@bank2023</p>
                            <p style="margin-left: 20px; color: rgb(196, 162, 6)">3. FTBbank@2023</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        About Chatbot
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Users can use the chatbot here:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. ChatBot: Users can start the chatbot, and the chatbot will respond to inquiries about
                                issues
                                with the card.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Chat_knowledge
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>There are 3 functions here:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. Add Knowledge: This function is for adding new knowledge to the chatbot.</p>
                            <p>2. All Knowledge: This option shows all knowledge that the chatbot has in memory.</p>
                            <p>3. Check Knowledge: This function allows the checker to review knowledge before approving it
                                for the chatbot.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        About Documents
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Documents serve as a repository for user and admin uploads,
                            accessible for viewing. It
                            comprises 4 functions:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. Upload Docs: Users can upload files here.</p>
                            <p>2. All Documents: Displays all documents for users.</p>
                            <p>3. Check Document: Admins can approve uploaded documents for user viewing. Files uploaded by
                                users require admin approval before becoming accessible.</p>
                            <p>4. Report: Admins can recover or permanently delete files. Deleted files are stored here.</p>
                            <p>5. Note: Focus on uploading PDF files for clarity; Word files may appear messy.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        About Read Error
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Read Error is a feature for detecting errors in log files. It
                            involves 2 steps:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. User uploads the log file and specifies reference_no, Trax_no, or card number type, then
                                clicks "Show."</p>
                            <p>2. After clicking "Show," the system displays the key number. By replacing ref_no with the
                                key
                                number and clicking "Show Detail," the error in the log file is revealed.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        About User Management: Role and Permission to User
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Role and Permission allow the creation of roles and
                            permissions to control dashboard access.
                            It consists of 4 functions:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. Permission Management: Developers can upload, edit, or delete permissions here.</p>
                            <p>2. Role Management: Admins can create, edit, or delete roles here.</p>
                            <p>3. Add Permission to Role: After creating a role, admins can assign permissions. Permissions
                                can
                                be added only once to a role.</p>
                            <p>4. All Roles and Permissions: Admins can edit permissions within roles and delete roles here.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        About User Management
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>User Management enables admins to create users and assign
                            roles. It involves 3
                            steps:</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. All Users: Displays all users. Admins can delete, edit, or reset passwords for users.</p>
                            <p>2. Create User: Admins can add new users here.</p>
                            <p>3. Check User: This function is for checking users before they are added to the dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        To-do List
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>To-do List Functionality</strong>
                        <div style="margin-left: 20px;margin-top: 10px;">
                            <p>1. Users can view their tasks in notifications and on the dashboard. Note: Tasks are only
                                visible to the user logged into the dashboard.</p>
                            <p>2. Admins can view all tasks of users.</p>
                            <p>3. Admins can create tasks.</p>
                            <p>4. Admins can sort tasks by priority (done, important, low, medium, and high).</p>
                            <p>5. Trash Task: Admins can view and recover tasks from the trash.</p>
                            <p>6. Check Task: This function allows checkers to verify tasks. If a task is checked, it may
                                trigger an alert to the user.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading8">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        About User Profile
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>User Profile Has 2 Functions</strong>
                        <div style="margin-left: 20px; margin-top: 10px;">
                            <p>1. Click on the profile in the header and then click on the profile user can change user
                                information here.</p>
                            <p>2. Function 2 is to change password. Users can change their password here by entering the old
                                password, new password, and confirming the new password.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

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
                        <strong>When changing, creating, or resetting a password, it should meet the following
                            criteria:</strong>
                        <div style="margin-left: 20px;">
                            <p>The password must be at least 8 characters long.</p>
                            <p>The password must contain at least 1 symbol.</p>
                            <p>The password must contain at least 1 number.</p>
                            <p>The password must contain at least 2 uppercase letters.</p>
                            <p style="margin-top: 20px">Example Password</p>
                            <p style="margin-left: 20px">1.FTB@ftb2023</p>
                            <p style="margin-left: 20px">2.FTB@bank2023</p>
                            <p style="margin-left: 20px">2.FTBbank@2023</p>
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
                        <strong>Chatbot can respond to error codes and messages. It has 3 functions:</strong>
                        <div style="margin-left: 20px;">
                            <p>Chatbot: All users can initiate a chatbot session here.</p>
                            <p>All Knowledge: Admins can edit and delete chatbot knowledge here.</p>
                            <p>Add Knowledge: Admins can enhance chatbot intelligence by adding knowledge. If admin doesn't
                                click here, they can access it from "All Knowledge."</p>
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
                        <strong>Documents serve as a repository for user and admin uploads, accessible for viewing. It
                            comprises 4 functions:
                        </strong>
                        <div style="margin-left: 20px;">
                            <p>Upload Docs: Users can upload files here.</p>
                            <p>All Document: Displays all documents for users.</p>
                            <p>Document Approval: Admins can approve uploaded documents for user viewing. Files uploaded by
                                users require admin approval before becoming accessible.</p>
                            <p>Report: Admins can recover or permanently delete files. Deleted files are stored here.</p>
                            <p> Note:* Focus on uploading PDF files for clarity; Word files may appear messy.</p>
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
                        <strong>Read Error is a feature for detecting errors in log files. It involves 2 steps:</strong>
                        <div style="margin-left: 20px;">
                            <p>User uploads the log file and specifies reference_no, Trax_no, or card number type, then
                                clicks "Show."</p>
                            <p>After clicking "Show," the system displays the key number. By replacing ref_no with the key
                                number and clicking "Show Detail," the error in the log file is revealed.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        About User Management 1. Role and Permission to User
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Role and Permission allow the creation of roles and permissions to control dashboard access.
                            It consists of 4 functions:</strong>
                        <div style="margin-left: 20px;">
                            <p>Permission Mgt: Developers can upload, edit, or delete permissions here..</p>
                            <p>Role Mgt: Admins can create, edit, or delete roles here.</p>
                            <p>Add Permission to Role: After creating a role, admins can assign permissions. Permissions can
                                be added only once to a role.</p>
                            <p>All Role and Permission: Admins can edit permissions within roles and delete roles here.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSIx">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        About User Management 2. User Management
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>User Management enables admins to create users and assign roles. It involves 2
                            steps:</strong>
                        <div style="margin-left: 20px;">
                            <p>All User: Displays all users. Admins can delete, edit, or reset passwords for users.</p>
                            <p>Add User: Admins can add new users here.</p>
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
                        <strong>To-do list is function for task management to user</strong>
                        <div style="margin-left: 20px;">
                            <p>1. User can see task in notification and in all task. Not* task is can show only task for
                                that user login to dashboad.</p>
                            <p>2. Admin can see all task of user </p>
                            <p>3. Admin can create task.</p>
                            <p>4. Admin can short task by done important low hight meduim and hight</p>
                            <p>5. Admin can see trash task and can recover task back</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

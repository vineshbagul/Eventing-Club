<?php include('../../../header.php');


if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $statement = $db_con->prepare("INSERT INTO `users`(`firstname`, `lastname`, `email`, `mobile`, `username`, `password`, `type`) 
    VALUES ('".$firstname."','".$lastname."','".$email."','".$mobile."','".$username."','".$password."','".$type."')");
    $statement->execute();
    if($statement==true)
    {
          ?>
          <script>
          alert('User details saved successfully into the Database!!')
          window.location.href ="http://localhost/Event/demo1/custom/apps/user/list-data.php";
          </script>
          <?php
          
    }else {
          ?>
          <script>
          alert('Wrong Information!!')
          window.open("http://localhost/Event/demo1/custom/apps/user/adduser.php,"_self");
          </script>
          <?php
    }
}
   
    //var_dump($records);



        ?>
<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Add New User
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                </span>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="http://localhost/Event/demo1/custom/apps/user/list-data.php" class="btn btn-default btn-bold">
                Back </a>
            <div class="btn-group">
                <input type="button" onclick="myFunction()" value="Save User"  action="adduser.php" class="btn btn-brand btn-bold">
                </button>

            </div>
        </div>
    </div>
</div>

<!-- end:: Content Head -->

<!-- form -->
<div class="kt-portlet__body">
    <form id="myForm" action="" method="POST">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                <div class="kt-form kt-form--label-right">
                    <div class="kt-form__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                <div class="col-lg-6 col-xl-6">
                                    <input class="form-control" type="text" name="firstname" placeholder="Enter First name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                <div class="col-lg-6 col-xl-6">
                                    <input class="form-control" type="text" name="lastname" placeholder="Enter Last name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                        <input type="text" class="form-control" name="mobile"  placeholder="Enter Mobile/Phone number" aria-describedby="basic-addon1">
                                    </div>
                                    <span class="form-text text-muted">We'll never share your contact and email with anyone else.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                        <input type="text" class="form-control" name="email" placeholder=" Enter your Email" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
            <div class="kt-form kt-form--label-right">
                <div class="kt-form__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="">
                                        <input class="form-control" type="text" name="username"placeholder="Enter Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="">
                                        <input class="form-control" type="text" name="password"  placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Type</label>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="">
                                        <input class="form-control" type="text" name="type" placeholder="Enter type of user">
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</div>
</form>
</div>

<?php

?>



<script>
    function myFunction() {
        document.getElementById("myForm").submit();
    }
</script>






<?php



?>
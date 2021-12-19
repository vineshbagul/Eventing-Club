<?php
    include('../../../header.php');
    ?>


 <!-- begin:: Content Head -->
 <div class="kt-subheader   kt-grid__item" id="kt_subheader">
     <div class="kt-container  kt-container--fluid ">
         <div class="kt-subheader__main">
             <h3 class="kt-subheader__title">
                 All Users
             </h3>
             <span class="kt-subheader__separator kt-subheader__separator--v"></span>

         </div>

         <div class="kt-subheader__toolbar">
             <a href="http://localhost/Event/demo1/custom/apps/user/list-data.php" class="btn btn-default btn-bold">
                 Back </a>
             <div class="btn-group">
                 <!-- <a href="http://localhost/Event/demo1/custom/apps/user/adduser.php">
                     <button type="button" value="Add User" class="btn btn-brand btn-bold" >
                         Add User
                     </button>
                 </a> -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                     Add User </button>

             </div>
         </div>

         <!-- end:: Content Head -->



     </div>
 </div>

 <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

     <!--Begin::Dashboard 1-->

     <!--Begin::Row-->
     <div class="row">
         <div class="col- lg-12 col-xl-12 order-lg-1 order-xl-1">

             <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                 <!-- Table -->
                 <table id='user' class='display dataTable'>

                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Firstname</th>
                             <th>Lastname</th>
                             <th>Email</th>
                             <th>Mobile Number</th>
                             <th>Username</th>
                             <th>Password</th>
                             <th>Type</th>
                             <th>Created on</th>
                             <th>Action</th>
                         </tr>
                     </thead>

                 </table>
             </div>
         </div>
     </div>

 </div>

 <?php include('../../../footer.php'); ?>

 <link href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

 <!-- jQuery Library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- Datatable JS -->
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <!-- temparary files -->


 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
 </script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <!-- add -->

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Add user</h4>
                 <button type="button" class="close" data-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">

                 <div class="form-group">
                     <label> User Name: </label>
                     <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Last Name </label>
                     <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Email Id </label>
                     <input type="text" name="email" id="email" placeholder="Email Id" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Mobile No. </label>
                     <input type="text" name="mobile" id="mobile" placeholder="Mobile No." class="form-control">
                 </div>
                 <div class="form-group">
                     <label> password </label>
                     <input type="text" name="mobile" id="password" placeholder="Enter password." class="form-control">
                 </div>
                 <div class="form-group">
                     <label>username </label>
                     <input type="text" name="mobile" id="username" placeholder="Enter username." class="form-control">
                 </div>
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>

                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>








 <!-- update -->

 <!-- The Modal -->
 <div class="modal fade" id="update_user_modal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Update User</h4>
                 <button type="button" class="close" data-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">

                 <div class="form-group">
                     <label> User Name </label>
                     <input type="text" name="firstname" id="update_firstname" placeholder="First Name" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Last Name </label>
                     <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Email Id </label>
                     <input type="text" name="email" id="update_email" placeholder="Email Id" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> Mobile No. </label>
                     <input type="text" name="mobile" id="update_mobile" placeholder="Mobile No." class="form-control">
                 </div>

                 <div class="form-group">
                     <label> username. </label>
                     <input type="text" name="mobile" id="update_username" placeholder="" class="form-control">
                 </div>

                 <div class="form-group">
                     <label> password. </label>
                     <input type="text" name="mobile" id="update_password" placeholder="" class="form-control">
                 </div>
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" onclick="UpdateUserDetails()">Update</button>
                 <input type="hidden" id="update_id">
             </div>

         </div>
     </div>
 </div>





 <script>
     //   function readrecords() {
     //       var readrecord = "readrecord";
     //       $.ajax({
     //           url: "user/backend.php",
     //           type: "post",
     //           data: {
     //               readrecord: readrecord
     //           },
     //           success: function(data, status) {
     //               $(#records_content).html(data);
     //           },
     //       });
     //   } 

     jQuery(document).ready(function() {
         jQuery('#user').DataTable({
             'processing': true,
             'serverSide': true,
             'serverMethod': 'post',
             'ajax': {
                 'url': 'user/ajaxfile.php'
             },
             'columns': [{
                     data: 'id'
                 },
                 {
                     data: 'firstname'
                 }, {
                     data: 'lastname'
                 }, {
                     data: 'email'
                 }, {
                     data: 'mobile'
                 }, {
                     data: 'username'
                 }, {
                     data: 'password'
                 }, {
                     data: 'type'
                 }, {
                     data: 'created_on'
                 },
             ],


             'columnDefs': [{
                     'targets': 9,
                     'render': function(data, type, full, meta) {

                         data = '<div class="links">' +
                             //  '<a href="http://localhost/Event/demo1/custom/apps/user/edituser.php?id=' + full.id + '">Edit</a> ' +

                             '	<i class="flaticon-edit update"  data-id="' + full.id + '" onclick="GetUserDetails(' + full.id + ')" ></i>' +

                             '<i class="flaticon-delete trash"  data-id="' + full.id + '" ></i>' +

                             '</div>';


                         return data;
                     }
                 },
                 {
                     "targets": 0,
                     "visible": false,
                     "searchable": false
                 },
             ],
         });

     });


     function addRecord() {
         var firstname = $('#firstname').val();
         var lastname = $('#lastname').val();
         var email = $('#email').val();
         var mobile = $('#mobile').val();
         var username = $('#username').val();
         var password = $('#password').val();
         $.ajax({
             url: "user/backend.php",
             type: 'post',
             data: {
                 firstname: firstname,
                 lastname: lastname,
                 email: email,
                 mobile: mobile,
                 username: username,
                 password: password
             },
             success: function(data, status) {

                 $('#user').DataTable().ajax.reload();
                 swal.fire({
                     position: 'top',
                     type: 'success',
                     title: 'User details has been added',
                     showConfirmButton: false,
                     timer: 1800
                 });
             }
         });

     }

     function GetUserDetails(id) {
         $.post("user/backend.php", {
                 id: id,
                 action: 'getdetails'
             },
             function(data, status) {
                 //  alert(data);
                 //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
                 var user = JSON.parse(data);
                 //  alert(user);

                 $("#update_firstname").val(user.firstname);
                 $("#update_lastname").val(user.lastname);
                 $("#update_email").val(user.email);
                 $("#update_mobile").val(user.mobile);
                 $("#update_username").val(user.username);
                 $("#update_password").val(user.password);
                 $("#update_id").val(user.id);
             }
         );
         $("#update_user_modal").modal("show");
     }


     function UpdateUserDetails() {
         var firstname = $("#update_firstname").val();
         var lastname = $("#update_lastname").val();
         var email = $("#update_email").val();
         var mobile = $("#update_mobile").val();
         var username = $("#update_username").val();
         var password = $("#update_password").val();
         var id = $("#update_id").val();
         $.post("user/backend.php", {
                 id: id,
                 action: 'updatedetail',
                 firstname: firstname,
                 lastname: lastname,
                 email: email,
                 mobile: mobile,
                 username: username,
                 password: password

             },
             function(data, status) {
                 $("#update_user_modal").modal("hide");
                 $('#user').DataTable().ajax.reload();

                 swal.fire({
                     position: 'top',
                     type: 'success',
                     title: 'User details has been updated',
                     showConfirmButton: false,
                     timer: 1800
                 });


             }
         );

     }






     $('#user').on("click", ".trash", function() {
         //get data-id of this trash button
         //send the ID to ajax file
         //ajax file should contain PHP code to delete that user

         //  if (confirm('Are you sure you want to delete this record!!')) {

         var id = $(this).attr('data-id');
         var ele = $(this).parent().parent().parent();
         //  $.ajax({
         //      type: 'POST',
         //      url: 'user/delete_ajax.php',
         //      data: {
         //          'id': id,

         //      },
         //      success: function(res) {
         //          console.log(res);
         //          $('#user').DataTable().ajax.reload();

         //  if (res == "Yes") {
         //      alert("Deleted from database");
         //  } else {
         //      alert("can't delete the row");
         //  }
         swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: 'Yes, delete it!'
         }).then(function(result) {
            if(result.value) {
                $.ajax({
                     type: 'POST',
                     url: 'user/backend.php',
                     data: {
                         'id': id,
                         'action': 'deletedetails'

                     },
                     success: function(res) {
                         //console.log(res);
                         //   if (res == "Yes")

                         if (res == "Yes") {
                             swal.fire(
                                 'Deleted!',
                                 'User has been deleted.',
                                 'success'
                             );
                             
                            $('#user').DataTable().ajax.reload();
                         }

                     }

                 });
            }
           
        });

    });
 </script>
 <style>

.flaticon-edit  {
    cursor: pointer;
  background-color: blue;
  border: none;
  color: white;
  padding: 5px 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  border-radius: 8px;
  
  
}

.flaticon-delete {
    cursor: pointer;
  background-color: red; 
  border: none;
  color: white;
  padding: 5px 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  border-radius: 8px;
}
 
 </style>
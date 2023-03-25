<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?=$headerContent?>
    <link href="<?=asset_url()?>libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?=$header?>
        <?=$leftmenu?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Account Settings</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal" id="passwordForm">
                                <div class="card-body">
                                    <h4 class="card-title">Change Password</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="password" class="col-3 text-right control-label col-form-label">New Password</label>
                                                <div class="col-6">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="cpassword" class="col-3 text-right control-label col-form-label">Confirm Password</label>
                                                <div class="col-6">
                                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                                    <label><input type="checkbox" class="showPassword" value=''/> Show Password</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <hr>
                                            <div class="form-group mb-0 text-right">
                                                <button type="button" onclick="savePassword();" class="btn btn-info waves-effect waves-light">Save Password</button>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?=$footer?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?=$script?>
    <script>
        $(document).ready(function(){
            $("#passwordForm").on("submit", function(event) {
                event.preventDefault();
            });

            $('.showPassword').change(function () {
                if( $(this).is(":checked") == true ){
                    $('#password').attr('type','text');
                    $('#cpassword').attr('type','text');
                }else{
                    $('#password').attr('type','password');
                    $('#cpassword').attr('type','password');
                }
            });

        });

        function savePassword(){

            if( $.trim($('#passwordForm #password').val()) == '' ){
                Swal.fire('Enter new password');return false;
            }else if( $.trim($('#passwordForm #cpassword').val()) == '' ){
                Swal.fire('Enter confirm password');return false;
            }else if( $.trim($('#passwordForm #password').val()) != $.trim($('#passwordForm #cpassword').val()) ){
                Swal.fire('Password mismatch');return false;
            }else{
                var payload = {
                    password:$.trim($('#passwordForm #password').val()),
                    cpassword:$.trim($('#passwordForm #cpassword').val()),
                }

                Swal.fire({
                    title: 'Are you sure want to proceed?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        console.log(payload);
                        $.ajax({
                            url: "<?=api_url()?>account/password",
                            type: 'POST',
                            headers:{'Authorization':token},
                            data:payload,
                            dataType:'json',
                            success: function (response) {
                                //console.log(response);
                                alert('Password changed successfully please login with new password');
                                forceLogout();
                            },
                            error: function (xhr, error, code) {
                                //console.log("error : ",xhr,code);
                                if( xhr.status == 401 ){
                                    localStorage.clear();
                                    Swal.fire('Token expired please login!!!')
                                    window.location.reload()
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        'Something went wrong!!!',
                                        'warning'
                                    )
                                }
                            }
                        });
                        
                    }
                })

            }

        }

    </script>
</body>

</html>
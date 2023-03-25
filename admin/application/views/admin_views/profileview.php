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
                    <h3 class="text-themecolor mb-0">Profile Details</h3>
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
                                    <h4 class="card-title">Profile Details</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="first_name" class="col-3 text-right control-label col-form-label">First Name</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="last_name" class="col-3 text-right control-label col-form-label">Last Name</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="email" class="col-3 text-right control-label col-form-label">Email</label>
                                                <div class="col-6">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="phone_no" class="col-3 text-right control-label col-form-label">Phone Number</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control numbersonly" maxlength="10" id="phone_no" name="phone_no" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <hr>
                                            <div class="form-group mb-0 text-right">
                                                <button type="button" onclick="savePassword();" class="btn btn-info waves-effect waves-light">Save Changes</button>
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
            loadProfile();
        });

        function loadProfile(){

            $.ajax({
                url: "<?=api_url()?>account/details",
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    console.log(response);
                    $('#passwordForm #first_name').val(response.data.first_name)
                    $('#passwordForm #last_name').val(response.data.last_name)
                    $('#passwordForm #email').val(response.data.email)
                    $('#passwordForm #phone_no').val(response.data.phone_no)
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

        function savePassword(){

            if( $.trim($('#passwordForm #first_name').val()) == '' ){
                Swal.fire('Enter first name');return false;
            }else if( $.trim($('#passwordForm #last_name').val()) == '' ){
                Swal.fire('Enter last name');return false;
            }else if( $.trim($('#passwordForm #email').val()) == '' ){
                Swal.fire('Enter email');return false;
            }else if( $.trim($('#passwordForm #phone_no').val()) == '' ){
                Swal.fire('Enter phone number');return false;
            }else{
                var payload = {
                    first_name:$.trim($('#passwordForm #first_name').val()),
                    last_name:$.trim($('#passwordForm #last_name').val()),
                    email:$.trim($('#passwordForm #email').val()),
                    phone_no:$.trim($('#passwordForm #phone_no').val()),
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
                            url: "<?=api_url()?>account/details",
                            type: 'POST',
                            headers:{'Authorization':token},
                            data:payload,
                            dataType:'json',
                            success: function (response) {
                                //console.log(response);
                                Swal.fire(
                                    'Success',
                                    response.message,
                                    'warning'
                                )
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
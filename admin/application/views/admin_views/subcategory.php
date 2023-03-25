<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?=$headerContent?>
    <link href="<?=asset_url()?>libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?=asset_url()?>libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=asset_url()?>libs/select2/dist/css/select2.min.css">
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
                    <h3 class="text-themecolor mb-0">Subcategory</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Masters</li>
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
                            <div class="card-body">
                                <h4 class="card-title">Subcategory</h4>
                                <button class="btn btn-primary mb-2 float-right" onclick="savesubCategory(1,0)"><i class="fas fa-plus"></i> Add</button>
                                <div class="table-responsive">
                                    <table id="pageTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Subcategory</th>
                                                <th>Order No</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Subcategory</th>
                                                <th>Order No</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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

    <!--This page plugins -->
    <script src="<?=asset_url()?>libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=asset_url()?>dist/js/pages/datatable/custom-datatable.js"></script>

    <script src="<?=asset_url()?>libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=asset_url()?>libs/select2/dist/js/select2.min.js"></script>
    <script src="<?=asset_url()?>dist/js/pages/forms/select2/select2.init.js"></script>

    <script>
        var dataTable;
        $(document).ready(function(){
            intializeTable();

            $("#subcategoryForm").on("submit", function(event) {
                event.preventDefault();
                updateCategory();
            });

            loadCategories();

        });

        function intializeTable(){
            $("#pageTable").dataTable().fnDestroy();
		    dataTable = $('#pageTable').DataTable( {
                "processing":true,  
                "serverSide":true,  
                "searching": true, 
                "ajax":{  
                    url:"<?php echo api_url().'subcategoryList';?>",  
                    type:"POST",
                    headers:{'Authorization':token},
                    data: function(d){
                        //d.for_post = 1;				  
                    },
                    error: function(xhr, error, code){
                        console.log("status : ",xhr.status)
                        if( xhr.status == 401 ){
                            tokenExpired();
                        }else{
                            //console.log(xhr, code);
                            $('#pageTable_processing').html('');
                            $("#pageTable tbody").html('<tr class="row"><th colspan=>No data found in the server</th></tr></tbody>');
                        }
                    }
                },			 
                columnDefs:[  
                    {  
                        "targets":[4],  
                        "orderable":false,  
                    }
                ]
            });
        }

        function deleteItem(id){
            //console.log(id);
            
            Swal.fire({
                title: 'Are you sure want to delete?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "<?=api_url()?>subcategory?subcat_id="+id,
                        type: 'DELETE',
                        headers:{'Authorization':token},
                        dataType:'json',
                        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            //alert(response);
                            Swal.fire(
                                'Success!',
                                response.message,
                                'success'
                            )
                            dataTable.ajax.reload();
                        },
                        error: function (xhr, error, code) {
                            //console.log("error : ",xhr,code);
                            if( xhr.status == 401 ){
                                localStorage.clear();
                                alert('Token expired please login!!!')
                                window.location.reload()
                            }else{
                                Swal.fire(
                                    'Failed!',
                                    error,
                                    'warning'
                                )
                            }
                        }
                    }); 
                }
            })
        }

        function itemStatus(id,status){
            console.log(id);
            
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

                    $.ajax({
                        url: "<?=api_url()?>subcategory?subcat_id="+id+"&status="+status,
                        type: 'PUT',
                        headers:{'Authorization':token},
                        dataType:'json',
                        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            //alert(response);
                            Swal.fire(
                                'Success!',
                                response.message,
                                'success'
                            )
                            dataTable.ajax.reload();
                        },
                        error: function (xhr, error, code) {
                            //console.log("error : ",xhr,code);
                            if( xhr.status == 401 ){
                                localStorage.clear();
                                alert('Token expired please login!!!')
                                window.location.reload()
                            }else{
                                Swal.fire(
                                    'Failed!',
                                    error,
                                    'warning'
                                )
                            }
                        }
                    }); 
                }
            })
        }

        function savesubCategory(type,id = 0){
            if( id != 0 ){
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

                        $.ajax({
                            url: "<?=api_url()?>subcategory?subcatId="+id,
                            type: 'GET',
                            headers:{'Authorization':token},
                            dataType:'json',
                            //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            success: function (response) {
                                //console.log(response);
                                if( response.data && response.data.length ){
                                    $('#subcategoryForm #subcat_id').val(response.data[0].id)
                                    $('#subcategoryForm #subcatName').val(response.data[0].subcatName)
                                    $('#subcategoryForm #orderNo').val(response.data[0].order_no)
                                    $('#subcategoryForm #cat_id').val(response.data[0].cat_id)
                                    $('#subcategoryForm #cat_id').select2();
                                    $('#category-modal').modal('show');
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        'Subcategory not found',
                                        'warning'
                                    )
                                }
                                
                            },
                            error: function (xhr, error, code) {
                                console.log("error : ",xhr,error,code);
                                if( xhr.status == 401 ){
                                    localStorage.clear();
                                    alert('Token expired please login!!!')
                                    window.location.reload()
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        xhr.responseJSON.message,
                                        'warning'
                                    )
                                }
                            }
                        }); 
                    }
                })
            }else{
                $('#subcat_id').val('');
                $('#subcategoryForm').trigger('reset');
                $('#category-modal').modal('show');
            }
        }

        function updateCategory(){
            //console.log($('#categoryForm').serialize())
            if( $.trim($('#subcategoryForm #cat_id').val()) == '' ){
                Swal.fire("Select category");return false;
            }else if( $.trim($('#subcategoryForm #subcatName').val()) == '' ){
                Swal.fire("Enter name");return false;
            }else if( $.trim($('#subcategoryForm #orderNo').val()) == '' ){
                Swal.fire("Enter order number");return false;
            }
            
            var type = "POST";
            if( $.trim($('#subcategoryForm #subcat_id').val()) != '' ){
                type="PATCH";
                var payload = "?subcatName="+$.trim($('#subcategoryForm #subcatName').val());
                payload += "&orderNo="+$.trim($('#subcategoryForm #orderNo').val());
                payload += "&cat_id="+$.trim($('#subcategoryForm #cat_id').val());
                payload += "&subcat_id="+$.trim($('#subcategoryForm #subcat_id').val());
                
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

                        $.ajax({
                            url: "<?=api_url()?>subcategory"+payload,
                            type: 'PATCH',
                            headers:{'Authorization':token},
                            dataType:'json',
                            //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            success: function (response) {
                                //alert(response);
                                Swal.fire(
                                    'Success!',
                                    response.message,
                                    'success'
                                )
                                dataTable.ajax.reload();
                                $('#subcat_id').val('');
                                $('#subcategoryForm').trigger('reset');
                                $('#category-modal').modal('hide');
                            },
                            error: function (xhr, error, code) {
                                //console.log("error : ",xhr,code);
                                if( xhr.status == 401 ){
                                    localStorage.clear();
                                    alert('Token expired please login!!!')
                                    window.location.reload()
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        xhr.responseJSON.message,
                                        'warning'
                                    )
                                }
                            }
                        }); 
                    }
                })
                
            }else{
                var payload = {
                    cat_id:$.trim($('#subcategoryForm #cat_id').val()),
                    subcatName:$.trim($('#subcategoryForm #subcatName').val()),
                    orderNo:$.trim($('#subcategoryForm #orderNo').val())
                };
                
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

                        $.ajax({
                            url: "<?=api_url()?>subcategory",
                            type: 'POST',
                            headers:{'Authorization':token},
                            data:payload,
                            dataType:'json',
                            //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            success: function (response) {
                                //alert(response);
                                Swal.fire(
                                    'Success!',
                                    response.message,
                                    'success'
                                )
                                dataTable.ajax.reload();
                                $('#subcategoryForm').trigger('reset');
                                $('#cat_id').val('');
                                $('#cat_id').select2('');
                                $('#category-modal').modal('hide');
                            },
                            error: function (xhr, error, code) {
                                console.log("error : ",xhr,error,code);
                                if( xhr.status == 401 ){
                                    localStorage.clear();
                                    alert('Token expired please login!!!')
                                    window.location.reload()
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        xhr.responseJSON.message,
                                        'warning'
                                    )
                                }
                            }
                        }); 
                    }
                })

            }
            console.log("Payload : ",payload);
        }

        function loadCategories(){
            $.ajax({
                url: "<?=api_url()?>category",
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    //console.log(response);
                    var output = "<option value=''>Select Category</option>";
                    $(response.data).each(function(i,item){
                        //console.log(item)
                        output += "<option value='"+item.id+"'>"+item.catName+"</option>";
                    });           
                    $('#cat_id').html(output); 
                    $('#cat_id').select2();     
                },
                error: function (xhr, error, code) {
                    //console.log("error : ",xhr,code);
                    if( xhr.status == 401 ){
                        localStorage.clear();
                        alert('Token expired please login!!!')
                        window.location.reload()
                    }else{
                        Swal.fire(
                            'Failed!',
                            error,
                            'warning'
                        )
                    }
                }
            }); 
        }
    </script>

    <!-- category modal content -->
    <div id="category-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <h4><b>Subcategory Form</b></h4>
                    </div>

                    <form class="pl-3 pr-3" action="#" id="subcategoryForm">
                        <input type="hidden" name="subcat_id" id="subcat_id" value="" />
                        
                        <div class="form-group">
                            <label for="subcatName">Category</label>
                            <select class="form-control select2" id="cat_id" name="cat_id" placeholder="Category" style="width:100%">
                                <option>Select Category</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcatName">Name</label>
                            <input class="form-control" type="text" maxlength="50" id="subcatName" name="subcatName" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="orderNo">Order Number</label>
                            <input class="form-control numbersonly" type="text" maxlength="2" id="orderNo" name="orderNo" placeholder="Order Number">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Close</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</body>

</html>
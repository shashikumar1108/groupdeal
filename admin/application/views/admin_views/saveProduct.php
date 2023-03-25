<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?=$headerContent?>
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
        <!-- This Page CSS -->
        <link rel="stylesheet" type="text/css" href="<?=asset_url()?>libs/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" type="text/css" href="<?=asset_url()?>libs/select2/dist/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="<?=asset_url()?>libs/quill/dist/quill.snow.css">
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0"><?=$title?></h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Masters</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid note-has-grid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-3"><?=$title?></h4>

                                <ul class="nav nav-tabs nav-justified nav-bordered mb-3 customtab">
                                    <li class="nav-item">
                                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">GENERAL INFORMATION</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">DETAILS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">SPECIFICATIONS</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-b2">

                                        <div class="alert alert-primary bg-white text-primary" role="alert">
                                            <i class="fas fa-exclamation-circle"></i> All the fields are required, please fill all of them up
                                        </div>

                                        <label for="file">Media Files(up to 5 photos & 1 video)</label>
                                        <!--action="<?=base_url().'api/v1/uploadFile'?>"-->
                                        <form class="dropzone" id="fileUpload" name="fileUpload">                                            
                                            <div class="fallback">
                                                <input name="file" type="file" name="file[]" id="file" multiple />
                                            </div>                                            
                                        </form>

                                        <form id="productForm" class="mt-3">
                                            <input type="hidden" name="product_id" id="product_id" value="" />
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="name">Product Name</label>
                                                        <input class="form-control" type="text" maxlength="50" id="name" name="name" placeholder="This name will be displayed to all customers">
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="brand_id">Brand</label><br>
                                                        <select class="form-control select2" id="brand_id" name="brand_id" placeholder="Brand" style="width:100%;">
                                                            <option value=''>Select the brand of the product</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="cat_id">Category</label>
                                                        <select class="form-control select2" id="cat_id" name="cat_id" placeholder="Category" style="width:100%;">
                                                            <option value=''>Select the category of the product</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="subcat_id">Subcategory</label>
                                                        <select class="form-control select2" id="subcat_id" name="subcat_id" placeholder="Subcategory" style="width:100%;">
                                                            <option value=''>Select the subcategory of the product</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="color_id">Color</label>
                                                        <select class="form-control select2" id="color_id" name="color_id" placeholder="Color" style="width:100%;" multiple>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="code">Product Identifier</label>
                                                        <input class="form-control" type="text" maxlength="50" id="code" name="code" placeholder="Enter unique identification code">
                                                        <label for="code">Most products have a unique identification code,<br>such as UPC, EAN, JAN, or ISBN</label>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="payment_type">Product Payment Type</label>
                                                        <select name="payment_type" id="payment_type" class="form-control select2" style="width:100%;">
                                                            <option value=''>Select type</option>
                                                            <option value='1'>Full Payment</option>
                                                            <option value='2'>Token Payment</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3">
                                                    <a href="<?=base_url().'masters/product'?>" class="btn waves-effect waves-light btn-lg btn-danger">Close</a>
                                                </div>
                                                <div class="col-9">
                                                    <?php 
                                                    if( $action ){
                                                        ?>
                                                        <div class="btn-group float-right">
                                                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Save
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="saveProduct(1)" >Save Changes</a>
                                                                <!--<a class="dropdown-item" href="javascript:void(0)" onclick="saveProduct(2)" >Save & Publish</a>-->
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            

                                        </form>
                                        
                                        
                                    </div>
                                    <div class="tab-pane show" id="profile-b2">

                                        <form id="productDetailForm" class="mt-3">
                                            <input type="hidden" name="product_id" id="product_id" value="" />
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div id="editor" style="height: 400px;"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3">
                                                    <a href="<?=base_url().'masters/product'?>" class="btn waves-effect waves-light btn-lg btn-danger">Close</a>
                                                </div>
                                                <div class="col-9">

                                                    <?php 
                                                    if( $action ){
                                                        ?>
                                                        <div class="btn-group float-right">
                                                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Save
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="saveProductDetail(1)" >Save Changes</a>
                                                                <!--<a class="dropdown-item" href="javascript:void(0)" onclick="saveProductDetail(2)" >Save & Publish</a>-->
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            

                                        </form>

                                    </div>
                                    <div class="tab-pane" id="settings-b2">
                                        <div class="alert alert-primary bg-white text-primary" role="alert">
                                            <i class="fas fa-exclamation-circle"></i> You can add as many specifications and categories as needed.Please, select the main 4 specifications that will be visible in the top of the product page among them.
                                        </div>

                                        <form id="productCategoryForm" class="mt-3">
                                            <input type="hidden" name="product_id" id="product_id" value="" />
                                            <div class="categoryContent"></div>

                                            <?php 
                                            if( $action ){
                                            ?>
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <hr>
                                                    <button type="button" onclick="addCategory()" class="btn waves-effect waves-light btn-outline-warning btn-lg"><i class="fa fa-plus-circle"></i> Add New Category</button>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <div class="row mt-5 pt-5">
                                                <div class="col-3">
                                                    <a href="<?=base_url().'masters/product'?>" class="btn waves-effect waves-light btn-lg btn-danger">Close</a>
                                                </div>
                                                <div class="col-9">

                                                    <?php 
                                                    if( $action ){
                                                        ?>
                                                        <div class="btn-group float-right">
                                                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Save
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="saveProductCategory(1)" >Save Changes</a>
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="saveProductCategory(2)" >Save & Publish</a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </form>

                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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
    <script src="<?=asset_url()?>dist/js/pages/notes/notes.js"></script>
    <!-- This Page JS -->
    <script src="<?=asset_url()?>libs/dropzone/dist/min/dropzone.min.js"></script>

    <script src="<?=asset_url()?>libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=asset_url()?>libs/select2/dist/js/select2.min.js"></script>
    <script src="<?=asset_url()?>dist/js/pages/forms/select2/select2.init.js"></script>

    <!-- This Page JS -->
    <script src="<?=asset_url()?>libs/quill/dist/quill.min.js"></script>

    <script>

        var product_id = "<?=$product_id?>";
        //console.log("Product Id : ",product_id)

        Dropzone.autoDiscover = false;
        var myDropzone;

        var images = 0;
        var videos = 0;
        var allowedImages = ['image/png','image/jpeg','image/jpg'];
        var allowedVideos = ['video/mp4'];
        var deletedFiles = [];

        $(function() {
            //Dropzone class
            myDropzone = new Dropzone(".dropzone", {
                url: "<?=api_url()?>uploadFile",
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 6,
                acceptedFiles: "image/*,video/mp4",
                autoProcessQueue: false,
                headers:{'Authorization':token},
                addRemoveLinks:true,
            });

            myDropzone.on("addedfile", function(file) {
                if( allowedImages.indexOf(file.type) == -1 && allowedVideos.indexOf(file.type) == -1 ){
                    Swal.fire("Only images and videos are allowed to upload");
                    myDropzone.removeFile(file);
                }else{
                    if( allowedImages.indexOf(file.type) >= 0 ){
                        if( images >= 5 ){
                            Swal.fire("Only 5 images is allowed to upload");
                            myDropzone.removeFile(file);
                        }else{
                            images++;    
                        }   
                    }
                    
                    if( allowedVideos.indexOf(file.type) >= 0 ){
                        if( videos >= 5 ){
                            Swal.fire("Only 1 video is allowed to upload");
                            myDropzone.removeFile(file);
                        }else{
                            videos++;    
                        }
                    } 
                }
                // console.log("Images : ",images," Videos : ",videos)
                // console.log(file);
                // console.log("File Added")
            });

            myDropzone.on("removedfile", function(file) {
                console.log(file);
                console.log("File Removed")

                if( file.dbId != undefined ){
                    deletedFiles.push(file.dbId);
                }
                console.log("deletedFiles : ",deletedFiles);

                if( allowedImages.indexOf(file.type) >= 0 ){
                    //myDropzone.removeFile(file);
                    images--;
                }

                if( allowedVideos.indexOf(file.type) >= 0 ){
                    //myDropzone.removeFile(file);
                    videos--;
                }
            });

            // Add mmore data to send along with the file as POST data. (optional)
            myDropzone.on("sending", function(file, xhr, formData) {
                formData.append("dropzone", "1"); // $_POST["dropzone"]
            });

            myDropzone.on("error", function(file, response) {
                console.log(response);
            });

            // on success
            myDropzone.on("successmultiple", function(file, response) {
                // get response from successful ajax request
                console.log(response);
                // submit the form after images upload
                // (if u want yo submit rest of the inputs in the form)
                document.getElementById("dropzone-form").submit();
            });

            // myDropzone.options.myform={
            //     success: function(file, response){
            //         //Here you can get your response.
            //         console.log(response);
            //     }
            // }
        });

        $(document).ready(function(){
            $('#all-active').click();

            $(".dropzone").on("submit", function(event) {
                event.preventDefault();
            });

            $("#productForm").on("submit", function(event) {
                event.preventDefault();
                saveProduct();
            });

            $("#productDetailForm").on("submit", function(event) {
                event.preventDefault();
                saveProductDetail();
            });

            $('#cat_id').change(function(){
                loadSubcategories();
            });

            loadCategories();
            loadBrands();
            loadColors();

            if( $('.categoryItem').length == 0 ){
                addCategory();
            }

            if( product_id != '' ){
                loadProductData(product_id,0);
            }
        })

        var deletedCategory = [];
        var deletedSpec = [];

        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        function saveProduct(type = 1){

            if( images > 5 && videos > 1 ){
                swal.fire("Please upload all the image & video of product to proceed");return false;
            }else if( $.trim($('#productForm #name').val()) == '' ){
                Swal.fire("Enter name");return false;
            }else if( $.trim($('#productForm #brand_id').val()) == '' ){
                Swal.fire("Select Brand");return false;
            }else if( $.trim($('#productForm #cat_id').val()) == '' ){
                Swal.fire("Select Category");return false;
            }else if( $.trim($('#productForm #subcat_id').val()) == '' ){
                Swal.fire("Select Subcategory");return false;
            }else if( $.trim($('#productForm #code').val()) == '' ){
                Swal.fire("Enter identifier");return false;
            }else if( $.trim($('#productForm #payment_type').val()) == '' ){
                Swal.fire("Select payment type");return false;
            }

            var formData = new FormData();
            $.each(myDropzone.getAcceptedFiles(), function(a,b){
                //console.log(myDropzone.getAcceptedFiles()[a])
                formData.append('files[]', myDropzone.getAcceptedFiles()[a]);
            });

            formData.append('productId',$.trim($('#productForm #product_id').val()));
            formData.append('productName',$.trim($('#productForm #name').val()));
            formData.append('brandId',$.trim($('#productForm #brand_id').val()));
            formData.append('colourId',$.trim($('#productForm #color_id').val()));
            formData.append('catId',$.trim($('#productForm #cat_id').val()));
            formData.append('subcatId',$.trim($('#productForm #subcat_id').val()));
            formData.append('productCode',$.trim($('#productForm #code').val()));
            formData.append('paymentType',$.trim($('#productForm #payment_type').val()));
            formData.append('deletedFiles',deletedFiles);

            //console.log("formData : ",formData)

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
                        url: "<?=api_url()?>product_general",
                        type: 'POST',
                        headers:{'Authorization':token},
                        data:formData,
                        dataType:'json',
                        processData: false,
                        contentType: false,
                        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            //alert(response);
                            Swal.fire(
                                'Success!',
                                response.message,
                                'success'
                            )
                            $('#productForm #product_id').val(response.product_id);
                            $('#productDetailForm #product_id').val(response.product_id);
                            $('#productCategoryForm #product_id').val(response.product_id);
                            
                            // myDropzone.removeAllFiles(true); 
                            // loadProductData(response.product_id);

                            window.location.href = "<?=base_url().'masters/product/edit?productId='?>"+response.product_id;
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

        function saveProductDetail(type = 1){

            var productId = $.trim($('#productDetailForm #product_id').val());
            var content = $('#editor .ql-editor').html();

            if( productId == '' ){
                return false;
            }else if( content == '<p><br></p>' ){
                Swal.fire("Enter product details");return false;
            }


            var payload = { productId : productId, details : content }

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
                        url: "<?=api_url()?>product_detail",
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

        function saveProductCategory(type = 1){

            var productId = $.trim($('#productCategoryForm #product_id').val());
            if( $('.categoryItem').length == 0 ){
                Swal.fire("Please add category to proceed");return false;
            }

            var payload = {};
            var categoryData = [];
            $('.categoryItem').each(function(){
                var categoryItem = $(this).attr('count');
                if( $.trim($('#categoryName'+categoryItem).val()) == '' ){
                    Swal.fire("Please enter category name to proceed");return false;
                }else{

                    var catName = $.trim($('#categoryName'+categoryItem).val());
                    if( $('#categoryItem'+categoryItem+' .specItem').length == 0 ){
                        Swal.fire("Please add specification to proceed");return false;
                    }else{
                        var specData = [];
                        $('#categoryItem'+categoryItem+' .specItem').each(function(s,spec){
                            var specItem = $(spec).attr('speccounter');
                            if( $.trim($('#specName'+specItem).val()) == '' ){
                                Swal.fire("Please enter specification name to proceed");return false;
                            }else if( $.trim($('#specDesc'+specItem).val()) == '' ){
                                Swal.fire("Please enter specification description to proceed");return false;
                            }
                            specData.push({
                                specId:$.trim($('#specId'+specItem).val()),
                                //specStatus:$.trim($('#specStatus'+specItem).val()),
                                specName:$.trim($('#specName'+specItem).val()),
                                specDesc:$.trim($('#specDesc'+specItem).val()),
                                specStatus:($('#specStatus'+specItem).is(':checked') == true)?1:2,
                            });
                            //console.log("specItem : ",specItem)
                        });
                        categoryData.push({
                            categoryId : $.trim($('#categoryId'+categoryItem).val()),
                            categoryName : catName,
                            specData : specData,
                        });


                    }
                }
                //console.log($(this).attr('count'));
            });

            if( categoryData.length == 0 ){
                Swal.fire("Something went wrong!!!!");return false;
            }

            var payload = { 
                productId : productId, 
                categoryData : categoryData, 
                deletedCategory : deletedCategory, 
                deletedSpec : deletedSpec,
                productStage : type,
            }

            // console.log("Payload : ",payload);
            // console.log("Success");
            // return false;

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
                        url: "<?=api_url()?>product_specs",
                        type: 'POST',
                        headers:{'Authorization':token},
                        data:payload,
                        dataType:'json',
                        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            //console.log(response);
                            Swal.fire(
                                'Success!',
                                response.message,
                                'success'
                            )
                            loadProductData(productId,3);
                        },
                        error: function (xhr, error, code) {
                            //console.log("error : ",xhr,error,code);
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

        var categoryItemCount = 1;
        var specItemCount = 1;

        function addCategory(){
            
            var itemContent = "";
            itemContent += "<div class='categoryItem mt-2' id='categoryItem"+categoryItemCount+"' count="+categoryItemCount+"><hr>";
            itemContent += "<div class='row'>";
            itemContent += "<div class='col-11'>";
            itemContent += "<div class='form-group'>";
            itemContent += '<input type="hidden" name="categoryId[]" id="categoryId'+categoryItemCount+'" value="0" /><input type="text" class="form-control form-control-line categoryName font-weight-bold" maxlength="50" name="categoryName[]" id="categoryName'+categoryItemCount+'" placeholder="Name of the category" style="font-size: 40px;">';
            itemContent += "</div></div>";
            itemContent += '<div class="col-1"><button type="button" class="btn btn-danger btn-circle-lg" onclick="removeCategory('+categoryItemCount+')"><i class="fa fa-trash"></i> </button></div></div>';
            itemContent += '<div class="specContent"><div id="specContent'+specItemCount+'" class="specItem" specCounter='+specItemCount+'><div class="row">';
            itemContent += '<input type="hidden" name="specId[]" id="specId'+specItemCount+'" value="0" />';

            //itemContent += '<input type="checkbox" id="specStatus'+row.id+'" class="mr-2"  />';

            itemContent += '<div class="col-5 d-flex"><input type="checkbox" id="specStatus'+specItemCount+'" class="mr-2"  /><input type="text" class="form-control form-control-line specName font-weight-bold" maxlength="50" name="specName[]" id="specName'+specItemCount+'" placeholder="Name of the specification"></div>';
            itemContent += '<div class="col-6"><input type="text" class="form-control form-control-line specDesc font-weight-bold" maxlength="50" name="specDesc[]" id="specDesc'+specItemCount+'" placeholder="Description of the specification"></div>';
            itemContent += '<div class="col-1"><button type="button" class="btn btn-danger btn-circle-lg" onclick="removeSpec('+categoryItemCount+','+specItemCount+')"><i class="fa fa-trash"></i> </button></div>';
            itemContent += "</div></div></div>";
            itemContent += '<div class="row mt-2">';
            itemContent += '<div class="col-12"><button type="button" class="btn waves-effect waves-light btn-light btn-lg" onclick="addSpec('+categoryItemCount+')"><i class="fas fa-plus"></i></button></div>';
            itemContent += "</div>";
            itemContent += "";
            
            $('.categoryContent').append(itemContent);
            categoryItemCount++;
            specItemCount++;
            
        }

        function removeCategory(id){
            if( $('#categoryItem'+id).length ){
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
                        if( $('#categoryItem'+id+' #categoryDb'+id).length ){
                            deletedCategory.push(id);
                            $('#categoryItem'+id).remove();
                        }else{
                            $('#categoryItem'+id).remove();
                        }
                    }                    
                })
            }
        }

        function addSpec(id){
            var specContent = '<div id="specContent'+specItemCount+'" class="specItem" specCounter='+specItemCount+'><div class="row mt-2">';
            specContent += '<input type="hidden" name="specId[]" id="specId'+specItemCount+'" value="0" />';

            //itemContent += '<input type="checkbox" id="specStatus'+row.id+'" class="mr-2"  />';

            specContent += '<div class="col-5 d-flex"><input type="checkbox" id="specStatus'+specItemCount+'" class="mr-2"  /><input type="text" class="form-control form-control-line specName font-weight-bold" maxlength="50" name="specName[]" id="specName'+specItemCount+'" placeholder="Name of the specification"></div><div class="col-6"><input type="text" class="form-control form-control-line specDesc font-weight-bold" maxlength="50" name="specDesc[]" id="specDesc'+specItemCount+'" placeholder="Description of the specification"></div><div class="col-1"><button type="button" class="btn btn-danger btn-circle-lg" onclick="removeSpec('+id+','+specItemCount+')"><i class="fa fa-trash"></i> </button></div></div></div>';
            $('#categoryItem'+id+' .specContent').append(specContent);
            specItemCount = specItemCount + 1;
            // console.log('specItemCount : ',specItemCount)
            // console.log('specContent : ',specContent)
        }

        function removeSpec(itemId,specId){
            if( $('#categoryItem'+itemId+' .specContent #specContent'+specId).length ){
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
                        //$('#categoryItem'+itemId+' .specContent #specContent'+specId).remove(); 
                        if(  $('#categoryItem'+itemId+' .specContent #specContent'+specId+' #specDb'+specId).length ){
                            deletedSpec.push(specId);
                            $('#categoryItem'+itemId+' .specContent #specContent'+specId).remove(); 
                        }else{
                            $('#categoryItem'+itemId+' .specContent #specContent'+specId).remove(); 
                        }
                    }
                })
            }
        }

        function loadCategories(){
            $.ajax({
                url: "<?=api_url()?>category",
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    //console.log(response);
                    var output = "<option value=''>Select the category of the product</option>";
                    $(response.data).each(function(i,item){
                        //console.log(item)
                        output += "<option value='"+item.id+"'>"+item.catName+"</option>";
                    });           
                    $('#cat_id').html(output);      
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

        function loadBrands(){
            $.ajax({
                url: "<?=api_url()?>brands",
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    //console.log(response);
                    var output = "<option value=''>Select the brand of the product</option>";
                    $(response.data).each(function(i,item){
                        //console.log(item)
                        output += "<option value='"+item.id+"'>"+item.brandName+"</option>";
                    });           
                    $('#brand_id').html(output);      
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

        function loadColors(){
            $.ajax({
                url: "<?=api_url()?>colours",
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    //console.log(response);
                    var output = "";
                    $(response.data).each(function(i,item){
                        //console.log(item)
                        output += "<option value='"+item.id+"'>"+item.name+"</option>";
                    });           
                    $('#color_id').html(output);      
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

        function loadSubcategories(subcat_id = ''){
            var cat_id = $.trim($('#productForm #cat_id').val());
            if( cat_id != '' ){
                $.ajax({
                    url: "<?=api_url()?>subcategory?catId="+cat_id,
                    type: 'GET',
                    headers:{'Authorization':token},
                    dataType:'json',
                    success: function (response) {
                        //console.log(response);
                        var output = "<option value=''>Select the subcategory of the product</option>";
                        $(response.data).each(function(i,item){
                            //console.log(item)
                            output += "<option value='"+item.id+"'>"+item.subcatName+"</option>";
                        });           
                        $('#subcat_id').html(output);  
                        
                        if( subcat_id != '' ){ $('#productForm #subcat_id').val(subcat_id); }
                        $('#subcat_id').select2();
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
        }

        function loadProductData(product_id = 0,dataSet = 0){
            //console.log("Product Id : ",product_id)

            if( product_id != 0 ){
                $.ajax({
                    url: "<?=api_url()?>product?productId="+product_id,
                    type: 'GET',
                    headers:{'Authorization':token},
                    dataType:'json',
                    success: function (response) {
                        console.log(response);

                        $('#productForm #product_id').val(product_id);
                        $('#productDetailForm #product_id').val(product_id);
                        $('#productCategoryForm #product_id').val(product_id);
                        
                        if( dataSet == 0 ){

                            if( response.data != undefined && response.data.general != undefined && response.data.general.length ){
                                $('#productForm #name').val(response.data.general[0].product_name);
                                $('#productForm #brand_id').val(response.data.general[0].brand_id);
                                $('#productForm #brand_id').select2();
                                $('#productForm #cat_id').val(response.data.general[0].cat_id);
                                $('#productForm #cat_id').select2();
                                $('#productForm #payment_type').val(response.data.general[0].payment_type);
                                $('#productForm #payment_type').select2();

                                if( response.data.general[0].color_id != '' ){
                                    $('#productForm #color_id').val(response.data.general[0].color_id.split(','));
                                    $('#productForm #color_id').select2();
                                }
                                

                                loadSubcategories(response.data.general[0].subcat_id);
                                //$('#productForm #subcat_id').val(response.data.general[0].subcat_id);
                                $('#productForm #code').val(response.data.general[0].product_code);

                                $('#editor .ql-editor').html(response.data.general[0].details);                            
                            }

                            //loading images from db
                            if( response.data != undefined && response.data.images != undefined && response.data.images.length ){
                                $.each(response.data.images,function(i,img){
                                    //console.log(img)
                                    if( img.type == 2 ){
                                        var videoImg = "<?=asset_url()?>images/video_icon.png";
                                        var mockFile = { dbId: img.id, name: img.id, url: videoImg, size : img.size, type : img.mime_type };
                                        myDropzone.emit("addedfile", mockFile);
                                        myDropzone.emit("thumbnail", mockFile, videoImg);
                                        myDropzone.emit("complete", mockFile);
                                    }else if( img.type == 1 ){
                                        var mockFile = { dbId: img.id, name: img.id, url: img.path, size : img.size, type : img.mime_type };
                                        myDropzone.emit("addedfile", mockFile);
                                        myDropzone.emit("thumbnail", mockFile, img.path);
                                        myDropzone.emit("complete", mockFile);
                                    }   
                                });
                            }

                            if( response.data != undefined && response.data.specs != undefined && response.data.specs.length ){
                                $('.categoryContent').html('');
                                $.each(response.data.specs,function(key,row){
                                    //console.log("Spec : ",row);
                                    addCategoryWithData(row);
                                })
                            }

                        }

                        if( dataSet == 3 ){
                            if( response.data != undefined && response.data.specs != undefined && response.data.specs.length ){
                                $('.categoryContent').html('');
                                $.each(response.data.specs,function(key,row){
                                    //console.log("Spec : ",row);
                                    addCategoryWithData(row);
                                })
                            }
                        }

                    },
                    error: function (xhr, error, code) {
                        //console.log("error : ",xhr,code);
                        if( xhr.status == 401 ){
                            localStorage.clear();
                            Swal.fire('Token expired please login!!!')
                            window.location.reload()
                        }else{
                            
                            Swal.fire({
                                title: 'Failed!',
                                text: xhr.responseJSON.message,
                                type: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok',
                                allowOutsideClick:false,
                            }).then((result) => {
                                if (result.value) { window.location.href = "<?=base_url().'masters/product'?>"; }
                            })
                            // Swal.fire(
                            //     'Failed!',
                            //     xhr.responseJSON.message,
                            //     'warning'
                            // )
                            // window.location.href = "<?=base_url().'masters/product'?>";
                        }
                    }
                });
            }
        }

        function addCategoryWithData(data=''){

            //console.log("Spec : ",data);
            if( data != '' ){

                var itemContent = '';
                itemContent += "<div class='categoryItem mt-2' id='categoryItem"+data.cat_id+"' count="+data.cat_id+"><hr>";
                itemContent += "<div class='row'>";
                itemContent += "<div class='col-11'>";
                itemContent += "<div class='form-group'>";
                itemContent += '<input type="hidden" id="categoryDb'+data.cat_id+'" value="'+data.cat_id+'" />';
                itemContent += '<input type="hidden" name="categoryId[]" id="categoryId'+data.cat_id+'" value="'+data.cat_id+'" /><input type="text" class="form-control form-control-line categoryName font-weight-bold" maxlength="50" name="categoryName[]" id="categoryName'+data.cat_id+'" value="'+data.catName+'" placeholder="Name of the category" style="font-size: 40px;">';
                itemContent += "</div></div>";
                itemContent += '<div class="col-1"><button type="button" class="btn btn-danger btn-circle-lg" onclick="removeCategory('+data.cat_id+')"><i class="fa fa-trash"></i> </button></div></div>';
                itemContent += '<div class="specContent">';

                $.each(data.specs,function(key,row){
                    console.log(row);
                    itemContent += '<div id="specContent'+row.id+'" class="specItem mt-2" specCounter='+row.id+'><div class="row">';
                    itemContent += '<input type="hidden" id="specDb'+row.id+'" value="'+row.id+'" />';
                    itemContent += '<input type="hidden" name="specId[]" id="specId'+row.id+'" value="'+row.id+'" />';
                    itemContent += '<div class="col-5 d-flex">';
                    
                    if( row.publish == 1 ){
                        itemContent += '<input type="checkbox" id="specStatus'+row.id+'" checked class="mr-2"  />';    
                    }else{
                        itemContent += '<input type="checkbox" id="specStatus'+row.id+'" class="mr-2"  />';
                    }

                    itemContent += '<input type="text" class="form-control form-control-line specName font-weight-bold" maxlength="50" name="specName[]" id="specName'+row.id+'" placeholder="Name of the specification" value="'+row.label+'" >';
                    itemContent += '</div>';

                    itemContent += '<div class="col-6"><input type="text" class="form-control form-control-line specDesc font-weight-bold" maxlength="50" name="specDesc[]" id="specDesc'+row.id+'" placeholder="Description of the specification" value="'+row.description+'" ></div>';
                    itemContent += '<div class="col-1"><button type="button" class="btn btn-danger btn-circle-lg" onclick="removeSpec('+data.cat_id+','+row.id+')"><i class="fa fa-trash"></i> </button></div>';
                    itemContent += "</div></div>";
                });
                
                itemContent += '<div class="row mt-2">';
                itemContent += '<div class="col-12"><button type="button" class="btn waves-effect waves-light btn-light btn-lg" onclick="addSpec('+data.cat_id+')"><i class="fas fa-plus"></i></button></div>';
                itemContent += "</div></div>";
                itemContent += "";

                $('.categoryContent').append(itemContent);
                categoryItemCount++;
                specItemCount++;

            }

        }
    </script>
</body>

</html>
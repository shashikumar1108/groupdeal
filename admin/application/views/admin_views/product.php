<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?=$headerContent?>
    <link href="<?=asset_url()?>libs/raty-js/lib/jquery.raty.css" rel="stylesheet">
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
                    <h3 class="text-themecolor mb-0">Product Catalogue</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Masters</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid note-has-grid">


                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
                            <li class="nav-item"> <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center active px-2 px-md-3 mr-0 mr-md-2"  id="all-active">
                                <i class="icon-layers mr-1"></i><span class="d-none d-md-block">ACTIVE PRODUCTS</span></a> 
                            </li>
                            <li class="nav-item"> <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="all-draft">
                                <i class="icon-briefcase mr-1"></i><span class="d-none d-md-block">IN DRAFT</span></a> 
                            </li>
                            <li class="nav-item"> <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="all-request">
                                <i class="icon-share-alt mr-1"></i><span class="d-none d-md-block">REQUESTS</span></a> 
                            </li>
                            <li class="nav-item ml-auto"> <a href="<?=base_url().'masters/product/create'?>" class="nav-link btn-primary rounded-pill d-flex align-items-center px-3">
                                <i class="icon-note m-1"></i><span class="d-none d-md-block font-14">Create New Product</span></a> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div  id="note-full-container" class="note-has-grid row">
                        <div class="col-12 single-note-item all-active">
                            <div class="card card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="app-search" style="display: flex;" id="draftForm">
                                            <input type="text" class="form-control" placeholder="Search &amp; enter"> 
                                            &nbsp;&nbsp;&nbsp;<button class="dt-button buttons-copy buttons-html5 btn btn-cyan text-white mr-1 btn-info" tabindex="0" aria-controls="file_export"><span>Search</span></button>
                                        </form>
                                    </div>

                                    <div class="col-3 p-3">                                    
                                        <div class="scrollable ps-container ps-theme-default" style="height:100%;" data-ps-id="cdb2df9b-b814-2491-9e2a-4a6b9d89c016">
                                            <div class="divider"></div>
                                            <ul class="list-group">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold" style="color: #fff;background-color: #7460ee;"> Categories </a>
                                                </li>
                                            </ul>
                                            <ul class="list-group activeCatList" style="border: 1px solid #f1e8e8;">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold"> Loading please wait... </a>
                                                </li>
                                            </ul>
                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-9 p-2 mt-2 activeCatItems">
                                        <!--
                                        <div class="draftItem">
                                            <div class="row el-element-overlay">
                                                <div class="col-lg-12 col-md-12">
                                                    <span style="font-size:30px;font-weight:bold;">Category Name</span>
                                                </div>
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-12 col-md-12">

                                                    <div class="d-flex align-items-center do-block">
                                                        <div class="btn-group mt-1 mb-1">
                                                            <div class="checkbox checkbox-info">
                                                                <span style="font-size:20px;font-weight:bold;">Category Name</span>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <h4 class="font-weight-bold">1 Item</h4>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="card">
                                                        <div class="el-card-item pb-3">
                                                            <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center"> <img src="<?=asset_url()?>images/gallery/chair.jpg" class="d-block position-relative w-100" alt="user" />
                                                                <div class="el-overlay w-100 overflow-hidden">
                                                                    <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white" href="<?=asset_url()?>images/gallery/chair.jpg"><i class="icon-magnifier"></i></a></li>
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline el-link text-white border-white" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <div class="">
                                                                    <h6 class="mb-0">Rating stars</h6>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    237823 ratings
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <h5 class="mb-0">Rounded Chair</h5>
                                                            </div>

                                                            <div class="d-flex no-block align-items-center">
                                                                <button type="button" class="btn btn-block btn-primary">See Details</button>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 single-note-item all-draft">
                            <div class="card card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="app-search" style="display: flex;" id="draftForm">
                                            <input type="text" class="form-control" placeholder="Search &amp; enter"> 
                                            &nbsp;&nbsp;&nbsp;<button class="dt-button buttons-copy buttons-html5 btn btn-cyan text-white mr-1 btn-info" tabindex="0" aria-controls="file_export"><span>Search</span></button>
                                        </form>
                                    </div>

                                    <div class="col-3 p-3">                                    
                                        <div class="scrollable ps-container ps-theme-default" style="height:100%;" data-ps-id="cdb2df9b-b814-2491-9e2a-4a6b9d89c016">
                                            <div class="divider"></div>
                                            <ul class="list-group">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold" style="color: #fff;background-color: #7460ee;"> Categories </a>
                                                </li>
                                            </ul>
                                            <ul class="list-group draftCatList" style="border: 1px solid #f1e8e8;">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold"> Loading please wait... </a>
                                                </li>
                                            </ul>
                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-9 p-2 mt-2 draftCatItems">
                                        <!--
                                        <div class="draftItem">
                                            <div class="row el-element-overlay">
                                                <div class="col-lg-12 col-md-12">
                                                    <span style="font-size:30px;font-weight:bold;">Category Name</span>
                                                </div>
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-12 col-md-12">

                                                    <div class="d-flex align-items-center do-block">
                                                        <div class="btn-group mt-1 mb-1">
                                                            <div class="checkbox checkbox-info">
                                                                <span style="font-size:20px;font-weight:bold;">Category Name</span>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <h4 class="font-weight-bold">1 Item</h4>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="card">
                                                        <div class="el-card-item pb-3">
                                                            <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center"> <img src="<?=asset_url()?>images/gallery/chair.jpg" class="d-block position-relative w-100" alt="user" />
                                                                <div class="el-overlay w-100 overflow-hidden">
                                                                    <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white" href="<?=asset_url()?>images/gallery/chair.jpg"><i class="icon-magnifier"></i></a></li>
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline el-link text-white border-white" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <div class="">
                                                                    <h6 class="mb-0">Rating stars</h6>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    237823 ratings
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <h5 class="mb-0">Rounded Chair</h5>
                                                            </div>

                                                            <div class="d-flex no-block align-items-center">
                                                                <button type="button" class="btn btn-block btn-primary">See Details</button>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        -->
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 single-note-item all-request">
                            <div class="card card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="app-search" style="display: flex;" id="draftForm">
                                            <input type="text" class="form-control" placeholder="Search &amp; enter"> 
                                            &nbsp;&nbsp;&nbsp;<button class="dt-button buttons-copy buttons-html5 btn btn-cyan text-white mr-1 btn-info" tabindex="0" aria-controls="file_export"><span>Search</span></button>
                                        </form>
                                    </div>

                                    <div class="col-3 p-3">                                    
                                        <div class="scrollable ps-container ps-theme-default" style="height:100%;" data-ps-id="cdb2df9b-b814-2491-9e2a-4a6b9d89c016">
                                            <div class="divider"></div>
                                            <ul class="list-group">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold" style="color: #fff;background-color: #7460ee;"> Categories </a>
                                                </li>
                                            </ul>
                                            <ul class="list-group requestCatList" style="border: 1px solid #f1e8e8;">
                                                <li class="list-group-item p-0 border-0">
                                                    <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold"> Loading please wait... </a>
                                                </li>
                                            </ul>
                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-9 p-2 mt-2 requestCatItems">
                                        <!--
                                        <div class="draftItem">
                                            <div class="row el-element-overlay">
                                                <div class="col-lg-12 col-md-12">
                                                    <span style="font-size:30px;font-weight:bold;">Category Name</span>
                                                </div>
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-12 col-md-12">

                                                    <div class="d-flex align-items-center do-block">
                                                        <div class="btn-group mt-1 mb-1">
                                                            <div class="checkbox checkbox-info">
                                                                <span style="font-size:20px;font-weight:bold;">Category Name</span>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <h4 class="font-weight-bold">1 Item</h4>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <div class="row el-element-overlay">

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="card">
                                                        <div class="el-card-item pb-3">
                                                            <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center"> <img src="<?=asset_url()?>images/gallery/chair.jpg" class="d-block position-relative w-100" alt="user" />
                                                                <div class="el-overlay w-100 overflow-hidden">
                                                                    <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white" href="<?=asset_url()?>images/gallery/chair.jpg"><i class="icon-magnifier"></i></a></li>
                                                                        <li class="el-item d-inline-block my-0  mx-1"><a class="btn default btn-outline el-link text-white border-white" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <div class="">
                                                                    <h6 class="mb-0">Rating stars</h6>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    237823 ratings
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-flex no-block align-items-center">
                                                                <h5 class="mb-0">Rounded Chair</h5>
                                                            </div>

                                                            <div class="d-flex no-block align-items-center">
                                                                <button type="button" class="btn btn-block btn-primary">See Details</button>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        -->
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
    <script>
        $(document).ready(function(){
            $('#all-active').click();
            loadActiveProducts();
            loadDraftProducts();
            loadRequestProducts();
        })

        var loader = '<div class="col-md-12 text-center" >';
        loader += '<div class="spinner-border mt-4" style="width: 10rem; height: 10rem;color:#1e88e5;" role="status">';
        loader += '<span class="sr-only">Loading please wait...</span>';
        loader += '</div></div>';
        
        function loadActiveProducts(){
            //$('.activeContent').html(loader);
            productList(1);
        }

        function loadDraftProducts(){
            //$('.draftContent').html(loader);
            productList(2);
        }

        function loadRequestProducts(){
            //$('.requestContent').html(loader);
            productList(3);
        }

        function productList(type = 0,catId=0,subcatId=0){
            if( type != 0 ){

                var payload = "?type="+type+"&catId="+catId+"&subcatId="+subcatId;
                $.ajax({
                    url: "<?=api_url()?>product/list"+payload,
                    type: 'GET',
                    headers:{'Authorization':token},
                    dataType:'json',
                    success: function (response) {
                        //console.log(response); 
                        if( response.data.category != undefined && response.data.items != undefined ){
                            //console.log("Category :",response.data.category.length)
                            loadCategoryTab(type, response.data.category);
                            loadProductTab(type, response.data.items);
                        }
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
                                xhr.responseJSON.message,
                                'warning'
                            )
                        }
                    }
                });

            }
        }

        function openCategory(menu = 0,catId = 0,subcatId = 0,type = 0){
            // console.log("Menu : ",menu)
            // console.log("catId : ",catId)
            // console.log("subcatId : ",subcatId)
            // console.log("Type : ",type)
            productList(type,catId,subcatId);
        }

        function loadCategoryTab(type, category){
            // console.log("type : ",type)
            console.log("category : ",category)

            var categoryMenu = "";

            $.each(category,function(key,row){
                
                //console.log(row)
                categoryMenu += '<li class="list-group-item p-0 border-0">';
                categoryMenu += '<a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block font-weight-bold" > '+row.catName+' </a>';
                categoryMenu += '</li>';

                $.each(row.subCat,function(skey,srow){
                    categoryMenu += '<li class="list-group-item p-0 border-0">';
                    categoryMenu += '<a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block" onclick="openCategory(2,'+row.catId+','+srow.subcatId+','+type+')"> '+srow.subcatName;
                    categoryMenu += '<span class="todo-badge badge badge-info float-right">'+srow.itemCount+'</span></a>';
                    categoryMenu += '</li>';
                });

            })
            categoryMenu += '';
            
            if( type == 1 ){
                $('.activeCatList').html(categoryMenu);
            }else if( type == 2 ){
                $('.draftCatList').html(categoryMenu);
            }else if( type == 3 ){
                $('.requestCatList').html(categoryMenu);
            }
        }

        function loadProductTab(type, product){

            var imageurl = "<?=asset_url()?>images/default-product.png";
            // console.log("type : ",type)
            // console.log("product : ",product)

            var productContent = '';
            

            $.each(product,function(key,row){
                
                //console.log(row)
                if( row.subCat.length ){

                    productContent += '<div class="draftItem">';
                    productContent += '<div class="row el-element-overlay">';
                    productContent += '<div class="col-12">';
                    productContent += '<span style="font-size:30px;font-weight:bold;">'+row.catName+'</span>';
                    productContent += '</div>';
                    productContent += '</div>';

                    productContent += '<div class="row el-element-overlay">';
                    $.each(row.subCat,function(skey,srow){
                        
                        //console.log(srow)
                        productContent += '<div class="col-12">';

                        productContent += '<div class="d-flex align-items-center do-block">';
                        productContent += '<div class="btn-group mt-1 mb-1">';
                        productContent += '<div class="checkbox checkbox-info">';
                        productContent += '<span style="font-size:20px;font-weight:bold;"> <i class="fas fa-list"></i> '+srow.subcatName+' </span>';
                        productContent += '</div>';
                        productContent += '</div>';
                        productContent += '<div class="ml-auto">';
                        productContent += '<h4 class="font-weight-bold"> '+srow.products.length+' Item</h4>';
                        
                        productContent += '</div></div></div></div>';

                        //Products List
                        productContent += '<div class="row el-element-overlay">';
                        $.each(srow.products,function(pkey,prow){
                            
                            
                            if( prow.images != '' ){
                                var images = prow.images.split(',');
                                if( images.length ){
                                    imageurl = images[0];
                                }
                            }

                            if( prow.id != null ) {
                                productContent += '<div class="col-3">';
                                productContent += '<div class="card">';
                                productContent += '<div class="el-card-item pb-3">';
                                productContent += '<div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center"> ';
                                productContent += '<img src="'+imageurl+'" class="d-block position-relative w-100" alt="user">';
                                productContent += '<div class="el-overlay w-100 overflow-hidden">';
                                productContent += '</div></div>';
                                productContent += '<div class="d-flex no-block align-items-center"><div class=""><h6 class="mb-0"><div class="score-rating"></div></h6></div>';
                                productContent += '<div class="ml-auto">'+prow.total_ratings+' ratings</div></div>';
                                productContent += '<div class="d-flex no-block align-items-center"><h5 class="mb-0">'+prow.product_name+'</h5></div>';
                                productContent += '<div class="d-flex no-block align-items-center">';
                                
                                
                                if( type == 1 ){
                                    productContent += '<button type="button" class="btn btn-block btn-primary" onclick="productDetails('+prow.id+');" >See Details</button>';
                                    productContent += '<div class="btn-group ml-4">';
                                    productContent += '<button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>';
                                    productContent += '<div class="dropdown-menu animated flipInX">';
                                    productContent += '<a class="dropdown-item" href="javascript:void(0)" onclick="editProduct('+prow.id+')"> <i class="fas fa-edit"></i> Edit Product</a>';
                                    productContent += '<a class="dropdown-item" href="javascript:void(0)" onclick="deleteProduct('+prow.id+','+type+')"> <i class="fas fa-trash"></i> Delete Product</a>';
                                    productContent += '</div>';
                                    productContent += '</div>';                                    
                                }else if( type == 2 ){
                                    productContent += '<button type="button" class="btn btn-block btn-primary" onclick="editProduct('+prow.id+')"><i class="fas fa-edit"></i> Edit</button>';
                                    productContent += '<button type="button" class="btn btn-light ml-2" onclick="deleteProduct('+prow.id+','+type+')"><i class="fas fa-trash"></i> </button>';
                                }else if( type == 3 ){
                                    productContent += '<button type="button" class="btn btn-block btn-warning text-white" onclick="moveProduct('+prow.id+')"><i class="fas fa-check"></i> Move to Drafts</button>';
                                    productContent += '<button type="button" class="btn btn-light ml-2" onclick="approveProduct('+prow.id+',3)"><i class="fas fa-times"></i> </button>';
                                }
                                
                                productContent += '</div>';
                                productContent += '</div></div></div>';

                                
                                productContent += '';
                            }

                        });
                        

                    }); 
                    productContent += '</div>';                                      
                    productContent += '';
                
                }

            })
            
            if( type == 1 ){
                $('.activeCatItems').html(productContent);
            }else if( type == 2 ){
                $('.draftCatItems').html(productContent);
            }else if( type == 3 ){
                $('.requestCatItems').html(productContent);
            }

            $('.score-rating').raty({
                score: 0,
                readOnly: true
            });

        }

        function editProduct(id){
            //console.log(id)
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
                    window.location.href="<?=base_url('masters/product/edit?productId=')?>"+id;
                }
            })
        }

        function productDetails(id){
            window.location.href="<?=base_url('masters/product/details?productId=')?>"+id;
        }

        function deleteProduct(id,type = 0){
            //console.log(id)

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
                        url: "<?=api_url()?>product/delete",
                        type: 'POST',
                        headers:{'Authorization':token},
                        data:{productId:id,status:status},
                        dataType:'json',
                        success: function (response) {
                            //console.log(response); 
                            if( type == 1 ){ loadActiveProducts(); }
                            else if( type == 1 ){ loadDraftProducts(); }
                            else if( type == 1 ){ loadRequestProducts(); }
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
                                    xhr.responseJSON.message,
                                    'warning'
                                )
                            }
                        }
                    });
                     
                }
            })
        }

        function moveProduct(id){
            //console.log(id)

            $('#request-modal').modal('show');
            $.ajax({
                url: "<?=api_url()?>product?productId="+id,
                type: 'GET',
                headers:{'Authorization':token},
                dataType:'json',
                success: function (response) {
                    //console.log(response); 
                    if( response.data != undefined && response.data.general != undefined && response.data.general.length ){
                        var imageurl = "<?=asset_url()?>images/default-product.png";
                        if( response.data.general[0].images != '' ){
                            var images = response.data.general[0].images.split(',');
                            if( images.length ){
                                imageurl = images[0];
                            }
                        }
                        
                        var output = "";
                        output +='<input type="hidden" name="request_id" id="request_id" value="'+id+'" />';
                        output +='<div class="row">';
                        output +='<div class="col-12">';
                        output +='<label class="font-weight-bold">Loaded Photo</label><br>';
                        output +='<a href="'+imageurl+'" target="_blank"><img src="'+imageurl+'" style="width:150px;height:200px;" alt="user"></a>';
                        output +='</div>';
                        output +='<div class="col-12"><label class="font-weight-bold">Category of the product</label><p>'+response.data.general[0].catName+'</p></div>';
                        output +='<div class="col-12"><label class="font-weight-bold">Subcategory of the product</label><p>'+response.data.general[0].subcatName+'</p></div>';
                        output +='<div class="col-12"><label class="font-weight-bold">Brand</label><p>'+response.data.general[0].brandName+'</p></div></div>';
                        $('#request-modal .modal-body').html(output);
                    }
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
                            xhr.responseJSON.message,
                            'warning'
                        )
                    }
                }
            });

        }

        function approveProduct(id,status){
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
                        url: "<?=api_url()?>product/request",
                        type: 'POST',
                        headers:{'Authorization':token},
                        data:{productId:id,status:status},
                        dataType:'json',
                        success: function (response) {
                            //console.log(response); 
                            var loader = '<div class="row">';
                            loader += '<div class="col-12 text-center">';
                            loader += '<div class="spinner-border text-primary" style="width: 50px;height: 50px;" role="status">';
                            loader += '<span class="sr-only">Loading...</span>';
                            loader += '</div> <h3 class="font-weight-bold">Loading please wait...</h3>';
                            loader += '</div></div>';
                            $('#request-modal .modal-body').html(loader);
                            $('#request-modal').modal('hide');
                            loadRequestProducts();
                            loadDraftProducts();
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
                                    xhr.responseJSON.message,
                                    'warning'
                                )
                            }
                        }
                    });
                     
                }
            })
        }

        function submitApprove(){
            if( $('#request-modal .modal-body #request_id').length ){
                var request_id = $.trim($('#request-modal .modal-body #request_id').val());
                approveProduct(request_id,2);
            }
        }   
    </script>

    <div id="request-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Product Information</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="spinner-border text-primary" style="width: 50px;height: 50px;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div> <h3 class="font-weight-bold">Loading please wait...</h3>
                        </div>        
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning text-white" onclick="submitApprove()"><i class="fas fa-check"></i> Approve and Move to Drafts</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="<?=asset_url()?>libs/raty-js/lib/jquery.raty.js"></script>
    <script src="<?=asset_url()?>extra-libs/raty/rating-init.js"></script>
</body>

</html>
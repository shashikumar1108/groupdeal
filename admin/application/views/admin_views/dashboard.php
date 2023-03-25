<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=asset_url()?>images/favicon.png">
    <title>Group Deal</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="<?=asset_url()?>libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="<?=asset_url()?>libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?=asset_url()?>libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>extra-libs/css-chart/css-chart.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="<?=asset_url()?>libs/jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?=asset_url()?>dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                    <h3 class="text-themecolor mb-0">Dashboard 3</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard 3</li>
                    </ol>
                </div>
                <div class="col-md-7 col-12 align-self-center d-none d-md-block">
                    <div class="d-flex mt-2 justify-content-end">
                        <div class="d-flex mr-3 ml-2">
                            <div class="chart-text mr-2">
                                <h6 class="mb-0"><small>THIS MONTH</small></h6>
                                <h4 class="mt-0 text-info">$58,356</h4>
                            </div>
                            <div class="spark-chart">
                                <div id="monthchart"></div>
                            </div>
                        </div>
                        <div class="d-flex ml-2">
                            <div class="chart-text mr-2">
                                <h6 class="mb-0"><small>LAST MONTH</small></h6>
                                <h4 class="mt-0 text-primary">$48,356</h4>
                            </div>
                            <div class="spark-chart">
                                <div id="lastmonthchart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center">
                                    <h2 class="font-weight-light mb-0">324</h2>
                                    <h6 class="text-muted">New Clients</h6>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <div data-label="20%" class="css-bar mb-0 css-bar-info css-bar-20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center">
                                    <h2 class="font-weight-light mb-0">2376</h2>
                                    <h6 class="text-muted">Total Visits</h6>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <div data-label="30%" class="css-bar mb-0 css-bar-success css-bar-20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center">
                                    <h2 class="font-weight-light mb-0">1795</h2>
                                    <h6 class="text-muted">New Leads</h6>
                                </div>
                                <!-- Column -->
                                <div class="col text-right ">
                                    <div data-label="40%" class="css-bar mb-0 css-bar-primary css-bar-40"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center">
                                    <h2 class="font-weight-light mb-0">36870</h2>
                                    <h6 class="text-muted">Page Views</h6>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <div data-label="60%" class="css-bar mb-0 css-bar-danger css-bar-60"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales Overview</h4>
                                <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
                                <div class="amp-pxl" style="height: 300px;"></div>
                                <div class="text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-success"><i class="fa fa-circle font-10 mr-2 "></i>Ample
                                            </h6>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <h6 class=" text-info"><i class="fa fa-circle font-10 mr-2"></i>Pixel</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Newsletter Campaign</h4>
                                <h6 class="card-subtitle">Overview of Newsletter Campaign</h6>
                                <div class="campaign2 ct-charts" style="height: 300px;"></div>
                                <div class="text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-success"><i class="fa fa-circle font-10 mr-2 "></i>Open Rate
                                            </h6>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-info"><i class="fa fa-circle font-10 mr-2"></i>Recurring
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Current Visitors</h4>
                                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                                <div id="usa" style="height: 300px"></div>
                                <div class="text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-success"><i class="fa fa-circle font-10 mr-2 "></i>Valley
                                            </h6>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-info"><i class="fa fa-circle font-10 mr-2"></i>Newyork
                                            </h6>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-danger"><i class="fa fa-circle font-10 mr-2"></i>Kansas
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex no-block">
                                    <h4 class="card-title">Projects of the Month</h4>
                                    <div class="ml-auto">
                                        <select class="custom-select">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="month-table">
                                    <div class="table-responsive mt-3">
                                        <table class="table stylish-table mb-0 no-wrap v-middle">
                                            <thead>
                                                <tr>
                                                    <th class="border-0 text-muted font-weight-medium" colspan="2">Assigned</th>
                                                    <th class="border-0 text-muted font-weight-medium">Name</th>
                                                    <th class="border-0 text-muted font-weight-medium">Priority</th>
                                                    <th class="border-0 text-muted font-weight-medium">Budget</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:50px;"><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-info">S</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Sunil Joshi</h6><small class="text-muted">Web
                                                            Designer</small>
                                                    </td>
                                                    <td>Elite Admin</td>
                                                    <td><span class="badge badge-success px-2 py-1">Low</span></td>
                                                    <td>$3.9K</td>
                                                </tr>
                                                <tr class="active">
                                                    <td><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                                src="<?=asset_url()?>images/users/2.jpg" class="rounded-circle" alt="user"
                                                                width="50"></span></td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Andrew</h6><small class="text-muted">Project Manager</small>
                                                    </td>
                                                    <td>Real Homes</td>
                                                    <td><span class="badge badge-info px-2 py-1">Medium</span></td>
                                                    <td>$23.9K</td>
                                                </tr>
                                                <tr>
                                                    <td><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-success">B</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Bhavesh patel</h6><small
                                                            class="text-muted">Developer</small>
                                                    </td>
                                                    <td>MedicalPro Theme</td>
                                                    <td><span class="badge badge-primary px-2 py-1">High</span></td>
                                                    <td>$12.9K</td>
                                                </tr>
                                                <tr>
                                                    <td><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-primary">N</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Nirav Joshi</h6><small class="text-muted">Frontend
                                                            Eng</small>
                                                    </td>
                                                    <td>Elite Admin</td>
                                                    <td><span class="badge badge-danger px-2 py-1">Low</span></td>
                                                    <td>$10.9K</td>
                                                </tr>
                                                <tr>
                                                    <td><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-warning">M</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Micheal Doe</h6><small class="text-muted">Content
                                                            Writer</small>
                                                    </td>
                                                    <td>Helping Hands</td>
                                                    <td><span class="badge badge-warning px-2 py-1">High</span></td>
                                                    <td>$12.9K</td>
                                                </tr>
                                                <tr>
                                                    <td><span
                                                            class="round text-white d-inline-block text-center rounded-circle bg-danger">N</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="font-weight-medium mb-0">Johnathan</h6><small class="text-muted">Graphic</small>
                                                    </td>
                                                    <td>Digital Agency</td>
                                                    <td><span class="badge badge-info px-2 py-1">High</span></td>
                                                    <td>$2.6K</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Column -->
                        <div class="card"> <img src="<?=asset_url()?>images/background/profile-bg.jpg" alt="Card image cap"
                                class="profile-bg-height  w-100 rounded-top">
                            <div class="card-body little-profile text-center">
                                <div class="pro-img"><img src="<?=asset_url()?>images/users/4.jpg" alt="user"
                                        class="rounded-circle shadow-sm" width="128" /></div>
                                <h3 class="mb-0">Angela Dominic</h3>
                                <p>Web Designer &amp; Developer</p>
                                <p><small>Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit orem ipsum dolor sit amet, this is a consectetur adipisicing elit orem ipsum dolor sit amet, this is a consectetur adipisicing elit</small></p>
                                <a href="javascript:void(0)"
                                    class="mt-1 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>
                                <div class="row text-center mt-3 justify-content-center">
                                    <div class="col-6 col-md-4 mt-3">
                                        <h3 class="mb-0 font-weight-light">1099</h3><small>Articles</small>
                                    </div>
                                    <div class="col-6 col-md-4 mt-3">
                                        <h3 class="mb-0 font-weight-light">23,469</h3><small>Followers</small>
                                    </div>
                                    <div class="col-6 col-md-4 mt-3">
                                        <h3 class="mb-0 font-weight-light">6035</h3><small>Following</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <!-- card -->
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mr-3 align-self-center">
                                        <h1 class="text-white"><i class="ti-pie-chart"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title text-white">Bandwidth usage</h3>
                                        <h6 class="card-subtitle text-white op-5">March 2020</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-weight-light text-white text-nowrap">50 GB</h2>
                                    </div>
                                    <div class="col-8 pt-1 pb-2 align-self-center">
                                        <div class="usage chartist-chart" style="height:60px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mr-3 align-self-center">
                                        <h1 class="text-white"><i class="icon-cloud-download"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title text-white">Download count</h3>
                                        <h6 class="card-subtitle text-white op-5">March 2020</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-weight-light text-white text-nowrap text-truncate">35487</h2>
                                    </div>
                                    <div class="col-8 pt-1 pb-2 text-right">
                                        <div class="spark-count" style="height:60px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feeds</h4>
                                <ul class="feeds m-0 p-0 pt-2 scrollable" style="height: 327px;">
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-info btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="far fa-bell"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="">You have 4 pending tasks.</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">Just Now</span>
                                        </div>
                                    </div>
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-success btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="ti-server"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="text-truncate">Server #1 overloaded</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">2 Hours ago</span>
                                        </div>
                                    </div>
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-warning btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="ti-shopping-cart"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="text-truncate">New order received.</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">31 May</span>
                                        </div>
                                    </div>
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-danger btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="ti-user"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="text-truncate">New user registered.</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">30 May</span>
                                        </div>
                                    </div>
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-inverse btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="ti-user"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="text-truncate">New Version just arrived.</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">27 May</span>
                                        </div>
                                    </div>
                                    <div class="feed-item d-flex py-2 align-items-center">
                                        <a href="javascript:void(0)"
                                            class="btn btn-info btn-circle font-18 p-3 text-white d-flex align-items-center justify-content-center"><i
                                                class="far fa-bell"></i></a>
                                        <div class="ml-3 text-truncate">
                                            <span class="text-truncate">You have 4 pending tasks.</span>
                                        </div>
                                        <div class="justify-content-end text-truncate ml-auto">
                                            <span class="font-12 text-muted">30 May</span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body bg-info rounded-top">
                                <h4 class="text-white card-title">My Contacts</h4>
                                <h6 class="card-subtitle text-white mb-0 op-5">Checkout my contacts here</h6>
                            </div>
                            <div class="card-body p-2">
                                <div class="message-box contact-box position-relative mt-2">
                                    <h2 class="add-ct-btn position-absolute"><button type="button"
                                            class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button>
                                    </h2>
                                    <div class="message-widget contact-widget position-relative scrollable" style="height: 293px;">
                                        <!-- Message -->
                                        <a href="#" class="py-3 px-2 border-bottom d-block text-decoration-none">
                                            <div class="user-img position-relative d-inline-block mr-2"> <img
                                                    src="<?=asset_url()?>images/users/1.jpg" alt="user"
                                                    class="rounded-circle w-100">
                                                <span
                                                    class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                            </div>
                                            <div class="mail-contnet d-inline-block align-middle">
                                                <h5 class="my-1">Pavan kumar</h5> <span
                                                    class="mail-desc font-12 text-truncate overflow-hidden text-nowrap d-block">info@wrappixel.com</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="py-3 px-2 border-bottom d-block text-decoration-none">
                                            <div class="user-img position-relative d-inline-block mr-2"> <img
                                                    src="<?=asset_url()?>images/users/2.jpg" alt="user"
                                                    class="rounded-circle w-100">
                                                <span
                                                    class="profile-status pull-right d-inline-block position-absolute bg-danger rounded-circle"></span>
                                            </div>
                                            <div class="mail-contnet d-inline-block align-middle">
                                                <h5 class="my-1">Sonu Nigam</h5> <span
                                                    class="mail-desc font-12 text-truncate overflow-hidden text-nowrap d-block">pamela1987@gmail.com</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="py-3 px-2 border-bottom d-block text-decoration-none">
                                            <div class="user-img position-relative d-inline-block mr-2"> <span
                                                    class="round text-white d-inline-block text-center rounded-circle bg-info">A</span>
                                                <span
                                                    class="profile-status pull-right d-inline-block position-absolute bg-warning rounded-circle"></span>
                                            </div>
                                            <div class="mail-contnet d-inline-block align-middle">
                                                <h5 class="my-1">Arijit Sinh</h5> <span
                                                    class="mail-desc font-12 text-truncate overflow-hidden text-nowrap d-block">cruise1298.fiplip@gmail.com</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="py-3 px-2 d-block text-decoration-none">
                                            <div class="user-img position-relative d-inline-block mr-2"> <img
                                                    src="<?=asset_url()?>images/users/4.jpg" alt="user"
                                                    class="rounded-circle w-100">
                                                <span
                                                    class="profile-status pull-right d-inline-block position-absolute bg-warning rounded-circle"></span>
                                            </div>
                                            <div class="mail-contnet d-inline-block align-middle">
                                                <h5 class="my-1">Pavan kumar</h5> <span
                                                    class="mail-desc font-12 text-truncate overflow-hidden text-nowrap d-block">kat@gmail.com</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="card-title">Recent Comments</h4>
                                <h6 class="card-subtitle mb-3 pb-1">Latest Comments on users from Material</h6>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="comment-widgets scrollable mb-2 common-widget" style="height: 450px;">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><span
                                            class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                src="<?=asset_url()?>images/users/1.jpg" class="rounded-circle" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100 p-3">
                                        <h5>James Anderson</h5>
                                        <p class="mb-1 overflow-hidden">Lorem Ipsum is simply dummy text of the printing
                                            and type
                                            setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the
                                            printing and type setting industry.</p>
                                        <div class="comment-footer"> <span class="text-muted pull-right">April 14,
                                                2016</span> <span class="badge badge-info">Pending</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)" class="pl-3"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-heart"></i></a>
                                            </span> </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row active p-3">
                                    <div class="p-2"><span
                                            class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                src="<?=asset_url()?>images/users/2.jpg" class="rounded-circle" alt="user" width="50"></span></div>
                                    <div class="comment-text active w-100 p-3">
                                        <h5>Michael Jorden</h5>
                                        <p class="mb-1 overflow-hidden">Lorem Ipsum is simply dummy text of the printing
                                            and type
                                            setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the
                                            printing and type setting industry..</p>
                                        <div class="comment-footer "> <span class="text-muted pull-right">April 14,
                                                2016</span> <span
                                                class="badge badge-light-success text-success">Approved</span>
                                            <span class="action-icons active">
                                                <a href="javascript:void(0)" class="pl-3"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="icon-close"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i
                                                        class="ti-heart text-danger"></i></a>
                                            </span> </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><span
                                            class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                src="<?=asset_url()?>images/users/3.jpg" class="rounded-circle" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100 p-3">
                                        <h5>Johnathan Doeting</h5>
                                        <p class="mb-1 overflow-hidden">Lorem Ipsum is simply dummy text of the printing
                                            and type
                                            setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the
                                            printing and type setting industry.</p>
                                        <div class="comment-footer"> <span class="text-muted pull-right">April 14,
                                                2016</span> <span class="badge badge-danger">Rejected</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)" class="pl-3"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-heart"></i></a>
                                            </span> </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><span
                                            class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                src="<?=asset_url()?>images/users/4.jpg" class="rounded-circle" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100 p-3">
                                        <h5>James Anderson</h5>
                                        <p class="mb-1 overflow-hidden">Lorem Ipsum is simply dummy text of the printing
                                            and type
                                            setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the
                                            printing and type setting industry..</p>
                                        <div class="comment-footer"> <span class="text-muted pull-right">April 14,
                                                2016</span> <span class="badge badge-info">Pending</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)" class="pl-3"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)" class="pl-3"><i class="ti-heart"></i></a>
                                            </span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <button class="float-right btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#myModal">Add Task</button>
                                <h4 class="card-title">To Do list</h4>
                                <h6 class="card-subtitle mb-0">List of your next task to complete</h6>
                                <!-- ============================================================== -->
                                <!-- To do list widgets -->
                                <!-- ============================================================== -->
                                <div class="to-do-widget mt-3 common-widget scrollable" style="height: 442px;">
                                    <!-- .modal for add task -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Task</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Task name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Task Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Assign to</label>
                                                            <select class="custom-select form-control pull-right">
                                                                <option selected="">Sachin</option>
                                                                <option value="1">Sehwag</option>
                                                                <option value="2">Pritam</option>
                                                                <option value="3">Alia</option>
                                                                <option value="4">Varun</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Submit</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputSchedule" class="material-inputs"
                                                    name="inputCheckboxesSchedule">
                                                <label for="inputSchedule" class=""> <span>Schedule meeting with</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto list-style-none m-0 pl-4 ml-1">
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/1.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Steave" class="rounded-circle"></li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/2.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Jessica" class="rounded-circle"></li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/3.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Priyanka" class="rounded-circle"></li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/4.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Selina" class="rounded-circle"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputCall" class="material-inputs" name="inputCheckboxesCall">
                                                <label for="inputCall" class=""> <span>Give Purchase report to</span>
                                                    <span class="badge badge-danger">Today</span> </label>
                                            </div>
                                            <ul class="assignedto m-0 pl-4 ml-1">
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/3.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Priyanka" class="rounded-circle"></li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/4.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Selina" class="rounded-circle"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputBook" class="material-inputs" name="inputCheckboxesBook">
                                                <label for="inputBook" class=""> <span>Book flight for holiday</span>
                                                </label>
                                            </div>
                                            <div class="font-12 pl-3 d-inline-block ml-2"> 26 jun 2020</div>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputForward" class="material-inputs" name="inputCheckboxesForward">
                                                <label for="inputForward" class=""> <span>Forward all tasks</span> <span
                                                        class="badge badge-warning">2 weeks</span> </label>
                                            </div>
                                            <div class="font-12 pl-3 d-inline-block ml-2"> 26 jun 2020</div>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputRecieve" class="material-inputs" name="inputCheckboxesRecieve">
                                                <label for="inputRecieve" class=""> <span>Recieve shipment</span>
                                                </label>
                                            </div>
                                            <div class="font-12 pl-3 d-inline-block ml-2"> 26 jun 2020</div>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputpayment" class="material-inputs" name="inputCheckboxespayment">
                                                <label for="inputpayment" class=""> <span>Send payment today</span>
                                                </label>
                                            </div>
                                            <div class="font-12 pl-3 d-inline-block ml-2"> 26 jun 2020</div>
                                        </li>
                                        <li class="list-group-item border-0 mb-0 py-3 pr-3 pl-0" data-role="task">
                                            <div class="checkbox checkbox-info w-100">
                                                <input type="checkbox" id="inputForward2" class="material-inputs" name="inputCheckboxesd">
                                                <label for="inputForward2" class=""> <span>Important tasks</span> <span
                                                        class="badge badge-success">2 weeks</span> </label>
                                            </div>
                                            <ul class="assignedto m-0 pl-4 ml-1">
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/1.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Assign to Steave" class="rounded-circle">
                                                </li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/2.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Assign to Jessica" class="rounded-circle">
                                                </li>
                                                <li class="d-inline-block border-0 mr-1"><img
                                                        src="<?=asset_url()?>images/users/4.jpg" alt="user"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Assign to Selina" class="rounded-circle">
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
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
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab"
                        aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false"><i
                            class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-3 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium mb-2 mt-2">Layout Settings</h5>
                        <div class="checkbox checkbox-info mt-3">
                            <input type="checkbox" name="theme-view" class="material-inputs" id="theme-view">
                            <label for="theme-view"> <span>Dark Theme</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" class="sidebartoggler material-inputs" name="collapssidebar" id="collapssidebar">
                            <label for="collapssidebar"> <span>Collapse Sidebar</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="sidebar-position" class="material-inputs" id="sidebar-position">
                            <label for="sidebar-position"> <span>Fixed Sidebar</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="header-position" class="material-inputs" id="header-position">
                            <label for="header-position"> <span>Fixed Header</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="boxed-layout" class="material-inputs" id="boxed-layout">
                            <label for="boxed-layout"> <span>Boxed Layout</span> </label>
                        </div> 
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium mb-2 mt-2">Logo Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium mb-2 mt-2">Navbar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium mb-2 mt-2">Sidebar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none mt-3">
                        <li>
                            <div class="message-center chat-scroll position-relative">
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_1' data-user-id='1'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/1.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle online"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_2' data-user-id='2'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/2.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle busy"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Sonu Nigam</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">I've sung a song! See you at</span> <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_3' data-user-id='3'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/3.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle away"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Arijit Sinh</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">I am a singer!</span> <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_4' data-user-id='4'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/4.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Nirav Joshi</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_5' data-user-id='5'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/5.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Sunil Joshi</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_6' data-user-id='6'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/6.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Akshay Kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_7' data-user-id='7'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/7.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_8' data-user-id='8'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="<?=asset_url()?>images/users/8.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Varun Dhavan</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="mt-3 mb-3">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="<?=asset_url()?>images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="<?=asset_url()?>images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="<?=asset_url()?>images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="<?=asset_url()?>images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <?=$script?>
</body>

</html>
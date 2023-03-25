<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?=asset_url()?>libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?=asset_url()?>libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=asset_url()?>libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="<?=asset_url()?>dist/js/app.min.js"></script>
<script src="<?=asset_url()?>dist/js/app.init.js"></script>
<script src="<?=asset_url()?>dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?=asset_url()?>libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?=asset_url()?>extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?=asset_url()?>dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?=asset_url()?>dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?=asset_url()?>dist/js/custom.min.js"></script>
<!--This page JavaScript -->

<!-- Common -->
<script src="<?=asset_url()?>js/common.js"></script>
<script src="<?=asset_url()?>libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?=asset_url()?>extra-libs/sweetalert2/sweet-alert.init.js"></script>

<script>
    $(document).ready(function(){
        $('.numbersonly').keyup(function(e)                        {
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
    })
</script>
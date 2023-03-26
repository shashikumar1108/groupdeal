<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Group Deals</title>
    <link href="<?=asset_url()?>css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=asset_url()?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?=asset_url()?>css/owl.theme.default.css">
    <link rel="stylesheet" href="<?=asset_url()?>css/style_category.css">
    
    <link rel="stylesheet" href="<?=asset_url()?>css/signup.css"/>
</head>

<body>

    <div class="signup-conatiner">
        <div class="signup-left">
            <img src="<?=asset_url()?>images/GDLogo-t.svg" alt="" class="signup-logo">

            <img src="<?=asset_url()?>images/signup.svg" alt="" class="img-fluid signup-img">

            <h4>Welcome!</h4>
            <p>Sign up on Group Deals to experience the world of discounted products and benefits through online group
                buying. </p>
        </div>

        <div class="signup-right">

            <div class="sign-top-right">
                
                <button type="button" class="btn btn-signup">Sign In <img src="<?=asset_url()?>images/right-green.svg"
                        alt=""></button>
                        <p class="account-message">Already have an account ?</p>
            </div>

            <div class="signup-form-wrap">
            

            <form action="" class="signupform">
                <div class="form-group country">
                    <label for="">Country code</label>
                    <div class="country-code"><img src="<?=asset_url()?>images/india.svg" alt=""> +91</div>
                </div>

                <div class="form-group phone">
                    <label for="phone_no">Phone number</label>
                    <input type="text" name="phone_no" id="phone_no" maxlength="10" class="form-control phone-icon icon-form" placeholder="XXXX - XXXX - XX">
                    <!--<span class="error-msg error-text"><img src="<?=asset_url()?>images/warning.svg" /> Enter a valid phone number</span>-->
                </div>
                <div class="form-group btn-checkl">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-green btn-disabled btn-cn" disabled type="button">Confirm Number</button>
                </div>

                <div class="spam-mail"><img src="<?=asset_url()?>images/info-grey.svg" /> We won’t share it or send spam mail. It
                    will be used just for your account safety.</div>


                    <div class="form-group">
                        <label for="">Email (optional)</label>
                        <input type="text" class="form-control email-icon icon-form" placeholder="Enter an email address you’re using">
                    </div>

                    <div class="form-group">
                        <label for="">Create password</label>
                        <span class="con"><input type="text" class="form-control lock-icon  icon-form" placeholder="8 + characters"> <span class="eye-icon"><img src="<?=asset_url()?>images/eye-open.svg"/></span> </span>
                    </div>

                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <span class="con"><input type="text" class="form-control lock-icon  icon-form" placeholder="Confirm your password"> <span class="eye-icon"><img src="<?=asset_url()?>images/eye.svg"/></span> </span>
                    </div>

                    <button type="button" class="btn btn-block btn-green btn-disabled mg-84 next" disabled>Next Step <img src="<?=asset_url()?>images/right-grey.svg" alt=""></button>

                    <!--
                    <div class="socail-btn">
                        <a href="#" class="social-signup"><img src="<?=asset_url()?>images/googleicon.svg" alt=""> Sign up with Google</a> <a href="#" class="social-signup"><img src="<?=asset_url()?>images/facebookicon.svg" alt=""> Sign up with Facebook</a>
                    </div>
                    -->
            </form>
        </div>
        </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-signup">
          <div class="modal-content">
             
            <div class="modal-body">
              <p class="warning-msg"><img src="<?=asset_url()?>images/warning-orange.svg" alt=""> Mobile number already in use</p>
              <p class="pop-text">Mobile number you used (+910432234378) already is registered in our system.  </p>
              <p class="pop-sm-title">Already have an account?</p>
              <a href="#" class="pop-mm-titile">Log In</a>
              <p class="pop-sm-title">New to Group Deals?</p>
              <a href="#" class="pop-mm-titile mb-8">Create account with a different mobile number</a>
              <a href="#" class="pop-mm-titile mb-8">Still create account with this mobile number</a>
            </div>
          </div>
        </div>
      </div>

    <script src="<?=asset_url()?>js/jquery.min.js"></script>
    <script src="<?=asset_url()?>js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#exampleModal').modal('hide');
        });
    </script>
    
</body>

</html>
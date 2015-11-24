<div class="blue">
    <div class="topBar row">
        <!-- Logo Image Start -->
        <div id="logo" class="small-12 medium-6 columns">
            <!-- Replace the src with path to your logo image -->
            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo-dark.png" alt="VenturePact"></a>
        </div>
        <!-- Logo Image End -->

        <!-- Social Media Buttons Start -->
        <div class="socialButtons small-12 medium-6 columns">
            <ul>
                <li><a href="https://www.facebook.com/VenturePact" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/social-icons/facebook-32.png" alt="Like Us On Facebook" target="_blank"></a>
                </li>
                <li><a href="https://twitter.com/VenturePact" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/social-icons/twitter-32.png" alt="Follow On Twitter" target="_blank"></a>
                </li>
                <li><a href="https://plus.google.com/+Venturepact/posts" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/social-icons/googleplus-32.png" alt="PlusOne On Google+" target="_blank"></a>
                </li>
                <li><a href="https://www.linkedin.com/company/venturepact" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/social-icons/linkedin-32.png" alt="Follow On LinkedIn" target="_blank"></a>
                </li>
                <li><a href="https://www.youtube.com/venturepact" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/social-icons/youtube-32.png" alt="Subscribe On Youtube" target="_blank"></a>
                </li>
            </ul>
        </div>
        <!-- Social Media Buttons End -->
    </div>

    <div class="hero row clearfix">
        <header class="clearfix">
            <!-- Product or E-book image start -->
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/Outsourcing_101.jpg" alt="Outsourcing 101: How, When & Where To Outsource" id="productHero" class="small-12 small-centered medium-4 large-4 large-uncentered columns">
            <!-- Product or E-book image End -->

            <div class="small-12 medium-7 large-7 end columns clearfix">
                <h1 class="mt-13">HOW, WHEN & WHERE TO OUTSOURCE?</h1>
                <h3 class=" font-set">Outsourcing 101 Guide</h3>
                <p class="textjustify">Whether you are an entrepreneur looking to build a company or an IT professional looking to work with software developers, this downloadable ebook will help you plan and better communicate with your development team.
                </p>
                <h2>Download Now</h2>
                <form onsubmit="return false;" id="newsletter-form" class="clearfix small-12 medium-12 medium-centered large-12 large-centered np columns" novalidate="novalidate">
                    <?php if(!Yii::app()->user->hasFlash('Success')){?>
                        <label for="newsletter_email ">
                            <input class="left required ml0" type="email" name="newsletter_email" id="newsletter_email" placeholder="Enter your valid e-mail" data-parsley-required-message="Email is required">
                        </label>
                        <input class="left ml0 book2button" type="submit" name="newsletter_submit" id="newsletter_submit" data-closeonbackgroundclick="true" value="Get PDF">
                        <script>
                          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                          ga('create', 'UA-35066643-1', 'auto');
                          ga('send', 'pageview');

                        </script>
                    <?php }else{ 
                    $path = Yii::app()->createAbsoluteUrl(Yii::app()->theme->baseUrl.'/ebook/eBook101.pdf'); 
                    ?>
                        <br><a href="<?php echo $path; ?>" class="button expand radius anchor-style" target="_blank">Click Here To Read!</a>                 
                        <script>
                          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                          ga('create', 'UA-35066643-1', 'auto');
                          ga('send', { 'hitType': 'pageview', 'page': '/virtual-ebook101-success', 'title': 'Ebook 101 Download' });

                        </script>
                    <?php } ?>
                </form>

                <!-- Watch Video Button Start -->
                <!--<button class="watchVideo left" ><span class="icon-play4 left"></span>Watch Review</button>-->
                <!-- Watch Video Button End -->

                <!-- Video PopUp Start -->
                <div id="videoModal" class="modalbg reveal-modal small" data-reveal>

                    <div class=" widescreen vimeo" style="display: block;">
                        <!-- Video Embedded Code Start -->
                        <div>

                            <style>
                                ._form {
                                    position: relative;
                                    background: #fff;
                                    width: 400px;
                                    /*F*/
                                    padding: 0!important;
                                    text-align: left;
                                }
                                ._form em {
                                    color: #9a9a9a;
                                }
                                ._form a {
                                    margin-left: 3px;
                                }
                                ._form ._field,
                                ._form ._field ._label,
                                ._form ._type_radio,
                                ._form ._type_checkbox,
                                ._form ._type_captcha,
                                ._form ._field table {
                                    background: none;
                                }
                                ._form ._field {
                                    position: relative;
                                    width: 100%;
                                    cursor: move;
                                    font-style: normal;
                                    margin: 1.2em 0;
                                    padding: 0;
                                    overflow: hidden;
                                }
                                ._form ._field input[type="text"] {
                                    width: 100%;
                                    padding: 8px;
                                    font-size: 16px;
                                    border: 1px solid #fff;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._field ._label {
                                    display: block;
                                    margin: 0 0 0.5em;
                                    padding: 0!important;
                                    font-size: 15px;
                                }
                                ._form ._field ._option input[type="checkbox"],
                                ._form ._field ._option input[type="radio"] {
                                    position: relative;
                                    width: 13px;
                                    height: 13px;
                                    margin: -4px 0 0 1px;
                                    cursor: pointer;
                                    vertical-align: middle;
                                }
                                ._form ._field ._option input[type="submit"],
                                ._form ._field ._option input[type="button"] {
                                    margin: 0;
                                    cursor: pointer;
                                    height: 35px;
                                    width: 100% !important;
                                    font-size: 15px;
                                    background: #EA9638 !important;
                                    color:#fff !important;
                                }
                                 ._form ._field ._option input[type="submit"]:hover{
                                    background: #DD7842;
                                }
                                ._form ._field ._option select {
                                    display: block;
                                    margin: 0;
                                    padding: 0;
                                    width: auto;
                                    font-size: 15px;
                                    border: 1px solid #b6b6b6;
                                }
                                ._form ._type_radio ._option,
                                ._form ._type_checkbox ._option {
                                    font-size: 13px;
                                    font-weight: normal;
                                    line-height: 1.8;
                                }
                                ._form ._type_date ._option input[type="text"] {
                                    float: left;
                                    width: 100px;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._type_date ._option input[type="button"] {
                                    width: 37px;
                                    height: 36px;
                                    margin-left: 5px;
                                    padding: 20px;
                                    background: url(http://activesales.venturepact.com/admin/css/../images/icon_calendar.gif) no-repeat 0 0;
                                    border: none;
                                    outline: none;
                                    text-indent: -9999px;
                                }
                                ._form ._type_captcha img {
                                    float: left;
                                    margin: 0 6px 0 0;
                                    width: 70px;
                                    height: 33px;
                                    border: 1px solid #b6b6b6;
                                }
                                ._form ._type_captcha input[type="text"] {
                                    margin: -14px 0 0 0!important;
                                    width: 25%;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._field table {
                                    width: 100%!important;
                                }
                                ._form ._field table tbody tr td {
                                    width: 50%!important;
                                    font-size: 15px;
                                }
                                @import url(http://fonts.googleapis.com/css?family=PT+Sans);
                                ._form {
                                    margin: 0;
                                    padding: 0px!important;
                                    background: #f0f0f0;
                                    color: #2c2c2c;
                                    font-weight: normal;
                                    text-shadow: 1px 1px 1px #fff;
                                }
                                ._form #notice {
                                    margin: !important;
                                    padding: 0 0 3px!important;
                                    color: #acacac;
                                    font-size: 11px;
                                    font-family: helvetica, arial, sans-serif;
                                }
                                ._form #notice a:link,
                                ._form #notice a:visited {
                                    color: #acacac;
                                    text-decoration: underline;
                                }
                                /* ========================= start header/footer*/
                                .formwrapper {
                                    width: auto;
                                    margin: 0px!important;
                                    padding: 10px 20px 3px!important;
                                    background: #f8f8f8 !important;
                                    border:0px !important;
                                    /*border-left: 1px solid #dedede;
                                    border-right: 1px solid #dedede;*/
                                }
                                .formwraptop {
                                    margin: 0px!important;
                                    padding: 0px!important;
                                    height: 5px;
                                }
                                .formwraptop .topleft {
                                    float: left;
                                    height: 5px;
                                    width: 20px;
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_form_top_left.png) no-repeat top left;
                                }
                                .formwraptop .topbg {
                                    height: 5px;
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_form_top_bg.png) no-repeat top right;
                                }
                                .formwrapbottom {
                                    margin: 0px!important;
                                    padding: 0px!important;
                                    height: 5px;
                                }
                                .formwrapbottom .bottomleft {
                                    float: left;
                                    height: 5px;
                                    width: 20px;
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_form_bottom_left.png) no-repeat bottom left;
                                }
                                .formwrapbottom .bottombg {
                                    height: 5px;
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_form_bottom_bg.png) no-repeat bottom right;
                                }
                                /* ========================= end header/footer*/
                                ._form ._field,
                                ._form ._field ._label,
                                ._form ._type_radio,
                                ._form ._type_checkbox,
                                ._form ._type_captcha,
                                ._form ._field table {
                                    /*background: none;*/
                                }
                                ._form ._field {
                                    position: relative;
                                    width: 100%;
                                    cursor: default;
                                    font-style: normal;
                                    margin: 0 0 16px!important;
                                    padding: 0!important;
                                    overflow: hidden;
                                }
                                ._form ._field input[type="text"],
                                ._form ._field input[type="email"] {
                                    width: 100%;
                                    margin: 0!important;
                                    padding: 4px!important;
                                    font-size: 18px;
                                    border: 1px solid #fff;
                                    
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_input.gif) repeat-x top left;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._field ._label {
                                    margin: 0 0 0.3em!important;
                                    color: #2A7477;
                                    font-size: 14px;
                                    font-family: helvetica, arial, sans-serif;
                                    font-weight: 400;
                                }
                                ._form ._field ._option {
                                    margin: 0;
                                    padding: 0;
                                    color: #202020;
                                    font-size: 13px;
                                    font-family: helvetica, arial, sans-serif;
                                    font-weight: normal;
                                    line-height: 20px;
                                }
                                ._form ._type_header ._label {
                                    width: 100%;
                                    font-style: normal;
                                    font-size: 26px!important;
                                    line-height: 34px;
                                    font-family: 'PT Sans', arial, serif;
                                    font-weight: 700;
                                    color: #202020;
                                    margin: 0 0 10px!important;
                                    padding: 0 0 10px!important;
                                    overflow: hidden;
                                    background: transparent url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_hdr_line.gif) repeat-x bottom left;
                                }
                                ._form ._type_input ._option textarea {
                                    padding: 2px!important;
                                    width: 97%!important;
                                    background: #fff url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_input.gif) repeat-x top left;
                                    border: 1px solid #fff;
                                    -webkit-border-radius: 3px;
                                    -moz-border-radius: 3px;
                                    border-radius: 3px;
                                }
                                ._form ._field ._option input[type="submit"],
                                ._form ._field ._option input[type="button"] {
                                    width: auto;
                                    height: 48px;
                                    margin: 10px 0 0!important;
                                    padding: 8px 32px 8px 15px!important;
                                    cursor: pointer;
                                    font-family: helvetica, arial, sans-serif;
                                    font-weight: 700;
                                    font-size: 14px;
                                    color: #fff;
                                    /*background: #f2b103 url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/bg_submit_btn.gif) repeat-x top right;*/
                                    /*border: 1px solid #fff;*/
                                    -webkit-border-radius: 4px;
                                    -moz-border-radius: 4px;
                                    border-radius: 4px;
                                    text-shadow: 1px 1px 1px #ca9300;
                                }

                                ._form ._type_radio ._option label {
                                    display: inline;
                                    font-size: 14px;
                                    font-weight: normal;
                                    line-height: 18px;
                                }
                                ._form ._type_radio ._option label input[type="radio"] {
                                    position: relative;
                                    width: 13px;
                                    height: 13px;
                                    margin: -4px 0 0 1px!important;
                                    cursor: pointer;
                                    vertical-align: middle;
                                    border: none;
                                    line-height: 18px;
                                }
                                ._form ._type_date ._option input[type="text"] {
                                    float: left;
                                    width: 100px;
                                    font-size: 18px;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._type_date ._option input[type="button"] {
                                    float: left;
                                    width: 27px;
                                    height: 27px;
                                    margin: 0 0 0 5px!important;
                                    padding: 0;
                                    background: url(http://activesales.venturepact.com/admin/templates/form-themes/grey/images/icon_calendar.gif) no-repeat;
                                    border: none;
                                    outline: none;
                                    text-indent: -9999px;
                                }
                                ._form ._field ._option select {
                                    display: block;
                                    margin: 0;
                                    padding: 0;
                                    width: auto;
                                    font-size: 18px;
                                    border: 1px solid #d7d7d7;
                                }
                                ._form ._type_captcha img {
                                    float: left;
                                    width: 88px;
                                    height: 44px;
                                    margin: 0 6px 0 0;
                                    border: 1px solid #d7d7d7;
                                }
                                ._form ._type_captcha input[type="text"] {
                                    margin: 0!important;
                                    width: 40%;
                                    font-size: 18px;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                }
                                ._form ._field table {
                                    margin: 0;
                                    padding: 0;
                                    border-collapse: collapse;
                                    width: 100%!important;
                                    table-layout: fixed;
                                    margin-bottom: 18px;
                                    font-size: 12px!important;
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                }
                                ._form ._field table td {
                                    padding: 0 10px 0 0!important;
                                    line-height: 18px;
                                    text-align: left;
                                    font-size: 12px!important;
                                    color: #606060;
                                }
                                ._form ._type_input ._option table tbody#_forward_rcpt input {
                                    margin: 0 0 5px 0!important;
                                    width: 96%!important;
                                }
                                ._form ._type_input ._option table tbody#_forward_rcpt img.image_addrcpt {
                                    cursor: pointer;
                                }
                                .form_errors {
                                    text-align: center;
                                    font-size: 15px;
                                    margin: 10px;
                                    color: #900;
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-weight: bold;
                                    margin-bottom: 20px;
                                }
                            </style>
                            <form action='http://activesales.venturepact.com/proc.php' method='post' id='_form_118' accept-charset='utf-8' enctype='multipart/form-data' data-parsley-validate>
                                <input type='hidden' name='f' value='118'>
                                <input type='hidden' name='s' value=''>
                                <input type='hidden' name='c' value='0'>
                                <input type='hidden' name='m' value='0'>
                                <input type='hidden' name='act' value='sub'>
                                <input type='hidden' name='nlbox[]' value='2'>
                                <div class='_form'>
                                    <!--//formwraptop-->
                                    <div class='formwrapper'>
                                        <div id='_field343'>
                                            <div id='compile343' class='_field _type_input'>
                                                <div class='_label '>
                                                    Full Name *
                                                </div>
                                                <div class='_option'>
                                                    <input type='text' name='fullname' data-parsley-required-message="Name is Required" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div id='_field344'>
                                            <div id='compile344' class='_field _type_input'>
                                                <div class='_label '>
                                                    Email *
                                                </div>
                                                <div class='_option'>
                                                    <input type='email' name='email' id="userEmail" data-parsley-required-message="Email is Required" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div id='_field548'>
                                            <div id='compile548' class='_field _type_input'>
                                                <div class='_label '>
                                                    Organization *
                                                </div>
                                                <div class='_option'>
                                                    <input type='text' name='org' data-parsley-required-message="Organization is Required" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div id='_field345'>
                                            <div id='compile345' class='_field _type_input'>
                                                <div class='_option'>
                                                    <input type='submit' value="Download" id="subscribe">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//formwrapbottom-->
                                </div>
                            </form>
                        <script>
                            ga('send', { 'hitType': 'pageview', 'page': '/virtual-ebook101-form', 'title': 'Ebook 101 Form' });
                        </script>
                        </div>
                        <!-- Video Embedded Code End -->
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
                <!-- Video PopUp End -->

                <!-- BuyButton Start -->
                <!--<a href="#" class="button buyButton orange">&#36;15.00 | BUY NOW!<br>
				<span>PDF, ePub and Kindle versions included.</span>
			</a>-->
                <!-- Buy Button End -->
            </div>
        </header>
    </div>
</div>

<!-- Media Proof Logos Start -->
<div class="mediaProof row">
    <ul class="clearfix">
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo1.jpg" alt="Adidas">
        </li>
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo4.jpg" alt="AthenaHealth">
        </li>
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo5.jpg" alt="FinansBank">
        </li>
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo16.jpg" alt="ESPN">
        </li>
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo17.jpg" alt="BMW">
        </li>
        <li class="small-4 medium-2 large-2 columns">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/media-logos/logo18.png" alt="Alcatel-Lucent">
    </ul>
</div>
<!-- Media Proof Logos End -->

<!-- List Of Benefits Section Start -->
<div class="benefits">

    <div class="row">
        <div class="cols small-12 medium-3 large-3 large-offset-1 medium-offset-1 columns headerText hide-for-small-only">
            <hr/>
        </div>
        <div class="cols small-12 medium-4 large-4 columns mt10">
        <h3>What You'll Learn</h3>
        </div>
        <div class="cols small-12 medium-3 large-3 end columns headerText hide-for-small-only">
            <hr/>
        </div>
    </div>
    <div class="row content">

        <div class="cols small-12 medium-6 large-6 columns">
            <div class="small-12 medium-2 large-2 mt-10 columns">
                <span class="icon-cloud"></span>
            </div>
            <div class="small-12 large-10 medium-10 columns">
                <h4>Should I Outsource?</h4>
                <p>While outsourcing is great, it may not be appropriate for certain companies and use cases.</p>
            </div>
        </div>
        <div class="cols small-12 medium-6 large-6 columns">
            <div class="small-12 medium-2 large-2 mt-10 columns">
                <span class="icon-bulb"></span>
            </div>
            <div class="small-12 large-10 medium-10 columns">
                <h4>How to Select the Right Team?</h4>
                <p>It’s important to figure out who really is good v/s who just sells really well.</p><p><br></p>
            </div>
        </div>
        <div class="cols small-12 medium-6 large-6 columns">
            <div class="small-12 medium-2 large-2 mt-10 columns">
                <span class="icon-lab2"></span>
            </div>
            <div class="small-12 large-10 medium-10 columns">
                <h4>How to Structure Contracts?</h4>
                <p>Your product roadmap will change. It’s imperative that you agree on a system whereby changes and the associated budget/timeline modifications are handled.</p>
            </div>
        </div>
        <div class="cols small-12 medium-6 large-6 columns">
            <div class="small-12 medium-2 large-2 mt-10 columns">
                <span class="icon-rocket2"></span>
            </div>
            <div class="small-12 large-10 medium-10 columns">
                <h4>How to Avoid Common Pitfalls?</h4>
                <p>Most projects fail because expectations are not set clearly in the beginning. People are on different pages with respect to exactly what needs to be built.</p>
            </div>
        </div>
    </div>

</div>
<!-- List Of Benefits Section End -->

<!-- First Showcase Section Start -->
<!-- <div class="productShowcaseOne">
    <div class="row">
        <div class="content clearfix mt-50 mb-50">

            <div class="small-12 medium-12 large-7 columns showcaseOne">
                <span class="icon-heart3"></span>
                <h4>Read it on your favorite device</h4>
                <p>VenturePact has worked on over one hundred software projects. Along the way, we have learned many lessons.</p>
                <p>This eBook is a brief culmination of our experiences with global software projects including large scale ERPs, Google Glass apps, innovative websites and mobile applications. </p>
                <br>
            </div>

            <div class="small-12 medium-12 large-4 large-offset-1 columns end">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/ebook/img/ipad_portrait.png" class="ipad-img-set" alt="E-book Showcase Image">
            </div>

        </div>
    </div>
</div> -->
<!-- First Showcase Section End -->
<style type="text/css">
  #userEmail{
    height:37px;
  }
  .parsley-errors-list {
    color: #fc0000;
    list-style-type: none;
    margin-bottom: 0px;
    font-size: 11px;
    padding-left: 0px !important;
    text-shadow: 0px 0px 0px #fff !important;
  }
  .parsley-errors-list li.check {
    display: none;
    border-bottom-color: rgba(0, 0, 0, 0.2);
    border-width: 0 5px 5px;
    left: 49%;
    bottom: 28px;
    color: transparent;
    border-style: solid;
    position: absolute;
    width: 0px;
    height: 0px;
 }
 .parsley-errors-list li.parsley-required {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    color: #fff !important;
    display: inline-block;
    padding: 5px !important;
  }
  .headerText hr {
    border: 1px solid rgba(42,116,119,0.2);
  }
  .anchor-style, .anchor-style:visited, .anchor-style:active
  {
    background: #E99538;
    color:#fff;
    font-weight:bold !important;
  }
  .anchor-style:hover
  {
    background: #DD7741;
  }
</style>
<script type="text/javascript">
$(document).ready(function(){
 
});
</script>
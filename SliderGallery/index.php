<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Slider Gallery</title>
    <style type="text/css" media="screen">
    <!--
        body {
            padding: 0; 
            font: 1em "Trebuchet MS", verdana, arial, sans-serif; 
            font-size: 100%;
            background-color: #212121;
            margin: 0;
        }

        h1 { 
            margin-bottom: 2px; 
        }

        #container {
            background-color: #fff;
            width: 580px;
            margin: 15px auto;
            padding: 50px;
        }
        
        /* slider specific CSS */
        .sliderGallery {
            background: url(images/productbrowser_background_20070622.jpg) no-repeat;
            overflow: hidden;
            position: relative;
            padding: 10px;
            height: 160px;
            width: 560px;
        }
        
        .sliderGallery UL {
            position: absolute;
            list-style: none;
            overflow: none;
            white-space: nowrap;
            padding: 0;
            margin: 0;
        }
        
        .sliderGallery UL LI {
            display: inline;
        }
        
        .slider {
            width: 542px;
            height: 17px;
            margin-top: 140px;
            margin-left: 5px;
            padding: 1px;
            position: relative;
            background: url(images/productbrowser_scrollbar_20070622.png) no-repeat;
        }
        
        .handle {
            position: absolute;
            cursor: move;
            height: 17px;
            width: 181px;
            top: 0;
            background: url(images/productbrowser_scroller_20080115.png) no-repeat;
            z-index: 100;
        }
        
        .slider span {
            color: #bbb;
            font-size: 80%;
            cursor: pointer;
            position: absolute;
            z-index: 110;
            top: 3px;
        }
        
        .slider .slider-lbl1 {
            left: 50px;
        }
        
        .slider .slider-lbl2 {
            left: 107px;
        }
        
        .slider .slider-lbl3 {
            left: 156px;
        }

        .slider .slider-lbl4 {
            left: 280px;
        }

        .slider .slider-lbl5 {
            left: 455px;
        }
    -->
    </style>

    <!-- updated to jQ 1.2.6 and UI 1.5.2 2008-11-28 -->
    <script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="jquery.ui-1.5b/jquery.dimensions.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript" charset="utf-8">
        window.onload = function () {
            var container = $('div.sliderGallery');
            var ul = $('ul', container);
            
            var itemsWidth = ul.innerWidth() - container.outerWidth();
            
            $('.slider', container).slider({
                min: 0,
                max: itemsWidth,
                handle: '.handle',
                stop: function (event, ui) {
                    ul.animate({'left' : ui.value * -1}, 500);
                },
                slide: function (event, ui) {
                    ul.css('left', ui.value * -1);
                }
            });
        };
    </script>
</head>
<body>
    <div id="container">
        <h1>Slider Gallery</h1>
        <p>This shows a demonstration of a slider widget from the jQuery UI library used to create the same effect used on <a href="http://www.apple.com/mac/">Apple's web site</a>.</p>
        <p><a href="/slider-gallery">Read the article, and see the screencast this demonstration relates to</a></p>

        <div class="sliderGallery">
            <ul>
            	<li><img class="pb-airportexpress" src="../imagens/imagem1.jpg" /></li>
                <li><img src="../imagens/imagem2.jpg" /></li>
                <li><img src="../imagens/imagem3.jpg" /></li>
                <li><img src="../imagens/imagem4.jpg" /></li>
                <!--<li><img class="pb-airportexpress" src="images/pb_airport_express.jpg" /></li>
                <li><img src="images/pb_airport_extreme.jpg" /></li>
                <li><img src="images/pb_timecapsule_20080115.jpg" /></li>
                <li><img src="images/pb_keyboards20070807.jpg" /></li>
                <li><img src="images/pb_mighty_mouse.jpg" /></li>
                <li><img src="images/pb_cinema_display20071026.jpg" /></li>
                <li><img src="images/pb_mac_pro_20070622.jpg" /></li>-->
                
                <li><img class="pb-macmini" src="../ImageFlow/img/bw1.jpg" /></li>
                <li><img src="../ImageFlow/img/lights2.jpg" /></li>
                <li><img class="pb-macbookair" src="../ImageFlow/img/refl_d74220e49ffea46fa779459f47b007ee_lights3.jpg" /></li>
                <!--<li><img class="pb-macbookpro" src="images/pb_macbook_pro20071026.jpg" /></li>
                <li><img class="pb-imac" src="images/pb_imac20071026.jpg" /></li>
                <li><img src="images/pb_macosx_20080115.jpg" /></li>
                <li><img src="images/pb_ilife_20080115.jpg" /></li>
                <li><img src="images/pb_dot_mac_20080115.jpg" /></li>
                <li><img src="images/pb_iwork_20080115.jpg" /></li>
                <li><img class="pb-macmini" src="images/pb_mac_mini.jpg" /></li>
                <li><img src="images/pb_macbook20071026.jpg" /></li>
                <li><img class="pb-macbookair" src="images/pb_macbookair_20080115.jpg" /></li>
                <li><img class="pb-macbookpro" src="images/pb_macbook_pro20071026.jpg" /></li>
                <li><img class="pb-imac" src="images/pb_imac20071026.jpg" /></li>
                <li><img src="images/pb_macosx_20080115.jpg" /></li>
                <li><img src="images/pb_ilife_20080115.jpg" /></li>
                <li><img src="images/pb_dot_mac_20080115.jpg" /></li>
                <li><img src="images/pb_iwork_20080115.jpg" /></li>-->

                <!--<li><img src="images/pb_quicktime.jpg" /></li>
                <li><img src="images/pb_aperture20080212.jpg" /></li>
                <li><img src="images/pb_final_cut_studio2_20080115.jpg" /></li>
                <li><img src="images/pb_final_cut_express_20080115.jpg" /></li>
                <li><img src="images/pb_logic_studio_20080115.jpg" /></li>
                <li><img src="images/pb_logic_express_20080115.jpg" /></li>
                <li><img src="images/pb_shake_20080115.jpg" /></li>                    
                <li><img src="images/pb_apple_remote_desktop_20080115.jpg" /></li>
                <li><img src="images/pb_xserve.jpg" /></li>

                <li><img src="images/pb_xserve_raid.jpg" /></li>
                <li><img class="pb-xsan" src="images/pb_xsan_20080115.jpg" /></li>
                <li><img class="pb-macosxserver" src="images/pb_macosx_server20071016.jpg" /></li>-->
            </ul>
            <div class="slider">
                <div class="handle"></div>
                <span class="slider-lbl1">Wi-Fi</span>
                <span class="slider-lbl3">Macs</span>
                <span class="slider-lbl4">Applications</span>
                <span class="slider-lbl5">Servers</span>
            </div>
        </div>
    </div>
</body>
</html>
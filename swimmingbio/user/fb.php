<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="http://jwpsrv.com/library/7wUgBlniEeOm6hIxOQfUww.js"></script>

        <script type="text/javascript" src="js/swfobject.js"></script>
        <script type="text/javascript">
            var flashvars = {};
            var params = {};
            var attributes = {};
            swfobject.embedSWF("sb_player1.swf", "myAlternativeContent", "362", "304", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
        </script>



    </head>

    <body>

        <div id="container">
            <div id="header">
                <div id="logo">
                    <h1><a href="index.html">Swimming Biomechanics</a></h1>
                </div>
                <?php include 'includes/login_register_block.php'; ?>

                <div id="mainnav">
                    <ul>
                        <li id="nav01"><a href="index.php">Home</a></li>
                        <li id="nav02" class="selected" ><a href="fb.php">Freestyle Biomechanics</a></li>
                    </ul>
                </div><!-------end MAINNAV DIV ---------->
                <!------<div id="flags">
                        <ul>
                                <li id="flag01"><a href="">Japan</a></li>
                                <li id="flag02"><a href="">USA</a></li>
                                <li id="flag03"><a href="">Spain</a></li>
                                <li id="flag04"><a href="">China</a></li>
                                <li id="flag05"><a href="">France</a></li>
                        </ul>	
                </div>------------>
            </div><!-------end header div ---------->

            <h2>Freestyle Biomechanics</h2>
            <div id="c_all">
                <div id="content_fb">
                    <p>The Freestyle or Front Crawl is the primary swimming stroke used by both competitive swimmers, including <br/>triathletes, and recreation swimmers.<br/><br/>It is not just the �stroke of choice�, but also of necessity. It is the fastest of all swimming strokes and with practice,<br/> can be performed rhythmically for extended periods of time.<br/><br/>For analysis, the stroke is divided into nine (9) segments. Each segment covers efficient movement mechanics and<br/> the common �stroke defects� associated with each segment.  </p>
                </div>


                <?php
                include_once 'page.php';
                echo pageContent(18);
                ?>
            </div><!-------CONTENT DIV CLOSE----------> 


            <div class="clear"></div>

            <div id="footer">
                <div id="footer_content">
                    <div id="footer_left">
                        <h3>Keep in touch</h3>
                        <form id="mc-embedded-subscribe-form" class="form" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="">
                            <input id="mce-EMAIL" class="input" type="email" value="You email address" onblur="if (value == '')
                    value = defaultValue" onfocus="if (value == defaultValue)
                    value = ''" name="EMAIL">
                                <input type="submit" value="submit">
                                    </form>
                                    </div>
                                    <div id="footer_center">
                                        <h3>Social Networking</h3>
                                        <li id="f_2"><a href="">+ Join us on Facebook</a></li>
                                        <li id="f_3"><a href="">+ Follow us on Twitter</a></li>
                                    </div>
                                    <div id="footer_center2">
                                        <p><A HREF="javascript:popUp('jan_bio.html')">Jan Prins - Bio</A><p/>
                                    </div>
                                    <div id="footer_right">
                                        <p>� Swimming Biomechanics 2013.</p><br/>   
                                        <p>	All Rights Reserved</p>
                                    </div>
                                    </div>
                                    </div><!----------FOOTER DIV CLOSE------->
                                    </div>
                                    <!-------CONTEAINER DIV CLOSE----------> 

                                    <div id="footer_wrap"></div>
<div id="light1" class="pop_up_conf_1">
      <div id="closeButton"> <a href = "" onclick = "close()">Close</a></div>
      <div class="pay" id="pay" style="display:none">
      You must Subcribe to this module</br></br>
      <span><a href="subscriptions.php" type="submit" class="btn btn-success" id="confirmBtn"> Subscribe now </a></span> <!---if logged in derectly redirect to the payment page --->
      <a href = "javascript:void(0)" onclick = "document.getElementById('light1').style.display='none';document.getElementById('fade').style.display='none'"><span id="cancel">cancel</span></a>
      </div>
      <div class="activated" id="activated" style="display:none">
      Module xxxx has been activated<br><br>
       <span><a href="" style="width:300px;" class="btn btn-success" onclick="close();">Close</a></span>
      </div>
      
    </div>
    
    
	<div id="light" class="white_content" style="overflow:hidden">
    
   
    
    <div id="closeButton"> <a href = "" onclick = "close()">Close</a></div>
    
    

<div id='player'></div>
<script type='text/javascript'>
    jwplayer('player').setup({
        file: "../admin/lessonContent/videos/Test.flv",
        width: '100%',
        height:'95%',
	label: "720p HD" ,
        fallback: 'false',
        primary: 'html5',
		
    });
</script>

    </div>
    <div id="fade" class="black_overlay" style="height:1500px;"></div>
    
    <script>
$('#confirmBtn').click(function(){



	


		
		// $('#pay').css('display', 'none');
		//  $('#activated').css('display', 'block');
		  
	
	
	
	
	});
	

</script>                                    
<script type="text/javascript">

function showFreeContent(){
	
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	window.scrollTo(0,0);
	}
function showConfirmBox(){
	document.getElementById('light1').style.display='block';
	document.getElementById('fade').style.display='block';
	document.getElementById('pay').style.display='block';
	window.scrollTo(0,0);
	}
function close(){
	
	document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none'
	document.getElementById('pay').style.display='block'
	document.getElementById('activated').style.display='none'
	
		  
	}
</script>
                                    </body>
                                    </html>

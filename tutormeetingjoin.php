<?php
require_once('conn.php');
$apiKey= "Mn7nWLBnSFqtuDqKYZECpA";
$apiSecret = "KHU68I10qyTi20OHH6apxu1zwGGFdMWihXzA";

$id=$_GET['id'];
$query="select * from scheduleinfo_db where id='$id'";
$result=mysqli_query($conn,$query);
while ($rows=$result->fetch_assoc()) {
    $meeting_id=$rows['meeting_id'];
    $rep=json_decode($rows['responsive']);
    $password=$rep->password;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Meeting</title>
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.0/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.0/css/react-select.css" />

    <style>
        .footer__inner .btn {
    	height: 52px;
	
	}
	.security-option-menu__button, .more-button__button, .sharing-setting-dropdown-menu-container__button, .audio-option-menu__button,.video-option-menu__button {
		color: #333;
		background-color: transparent;
		border-color: transparent;
	}
	.security-option-menu__button{
		padding-top:10px;
	}
	.security-option-menu__button:hover, .more-button__button:hover, .sharing-setting-dropdown-menu-container__button:hover, .audio-option-menu__button:hover,.video-option-menu__button:hover  {
		color: #333;
		border-color: transparent;
		border-radius: 0px;
	}
	.chat-header__chat-pop-btn{
		height: 20px;
	}
	.security-option-menu__pop-menu--checked > a::before {
		content: '';
		background-position: -386px -6px;
		width: 13px;
		height: 12px;
		position: absolute;
		left: 3px;
		top: 7px;
	}
	.audio-option-menu__pop-menu--checked > a::before {
		content: '';
		background-position: -386px -6px;
		width: 13px;
		height: 12px;
		position: absolute;
		left: 5px;
		top: 5px;
	}
	.audio-option-menu__pop-menu{
		left:50px;
	}
	.chat-container__chat-control{
		height: 50px;
	}
	.chat-box__chat-textarea {   
		height: 53px;
	}
	.chat-more-options__chat-control-more{
		margin-top: 10px;
		height: 30px;
	}
    #moreButton {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
        height: 52px;
        background: transparent;
        border: unset;
    }
    .full-screen-widget--speaker-icon, .full-screen-widget--gallery-icon  {
        height: 13px !important;
        
    }			

    .full-screen-widget__button {
    
        background-color: transparent !important;
        color: white !important;
    
    }
    .full-screen-icon  .full-screen-widget__pop-menu{
        background: #000 !important;
        border: 1px solid #fff !important;
    }
    .full-screen-icon  .full-screen-widget__pop-menu li{
        background: #000 !important;				
    }
    .full-screen-icon  .dropdown-menu > li > a {
        color: #fff !important;		
        padding: 3px 34px!important;		
    }
    .zm-icon-disallow-video {
        background-position: -312px -216px;
        width: 32px;
        height: 30px;
    }
</style>
</head>

<body>
    
    <script src="https://source.zoom.us/1.9.0/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.0/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.0/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.0/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.0/lib/vendor/lodash.min.js"></script>

    <!-- import ZoomMtg -->
    <script src="https://source.zoom.us/zoom-meeting-1.9.0.min.js"></script>
    <!-- <body>   -->
    <script type="text/javascript">
        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }

        ZoomMtg.preLoadWasm();
        ZoomMtg.prepareJssdk();
        ZoomMtg.showRecordFunction({
            show: true
        });
        var meetConfig = {
            apiKey: "<?php echo $apiKey ?>",
            apiSecret: "<?php echo $apiSecret ?>",
            meetingNumber:"<?php echo $meeting_id ?>",
            userName: "Tutor",
            passWord: "<?php echo $password ?>",
            leaveUrl: "./tutorSession.php",
            role: 1
        };
        var signature = ZoomMtg.generateSignature({
            meetingNumber: meetConfig.meetingNumber,
            apiKey: meetConfig.apiKey,
            apiSecret: meetConfig.apiSecret,
            role: meetConfig.role,
            success: function(res) {
                console.log(res.result);
            }
        });
        ZoomMtg.init({
            leaveUrl: meetConfig.leaveUrl,
            isSupportAV: true,
            success: function() {
                ZoomMtg.join({
                    meetingNumber: meetConfig.meetingNumber,
                    userName: meetConfig.userName,
                    signature: signature,
                    apiKey: meetConfig.apiKey,
                    passWord: meetConfig.passWord,
                    success: function(res) {
                        console.log(res);
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            },
            error: function(res) {
                console.log(res);
            }
        });
    </script>
</body>

</html>
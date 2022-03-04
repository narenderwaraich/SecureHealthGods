<!DOCTYPE html>
<html>
<head>
    <title>Veryfiy Email</title>
    <style type="text/css">
    .confirm-btn{
    background-color: #ce2350;
    text-transform: uppercase;
    color: #ffffff;
    border: 2px solid #ce2350;
    margin: auto;
    text-align: center;
    border-radius: 5px;
   padding: 8px 12px;
    font-size: 14px;
    font-weight: 600;
    width: auto;
}
.confirm-btn:hover{
   color: #ce2350;
    cursor: pointer;
    background: transparent;
    border: 2px solid #ce2350;
}
.footer-logo-txt{
    color: #fff;
    font-size: 46px;
    font-weight: 900;
    line-height: 90px !important;
    font-family: cursive;
    text-shadow: 0 0 30px rgba(0, 0, 0, 0.62);
    text-align: center;
}
input[type="button"]:focus{   
  box-shadow: none !important;
  outline:  none;
}
    </style>
</head>
<body>

    
<h2>Hi <span style="text-transform: uppercase;"></span></h2>
<br><br><br>
<p>Greetings for choosing FreeKaFanda. 

Please click the link below to confirm your email and activate your account.</p>
<center>
    <br>
    <a href="/" aria-label="home" class="footer-logo-txt">
              FreeKaFanda
              </a>
    <br>
    <a href="{{url('/verifyemail/'.$email_token)}}"><button type="button" class="confirm-btn">Confirm Email</button></a>
</center>
<br>
<h3>Thanks <br>
Team FreeKaFanda</h3>
 <p>Kindly contact us at <a href="mailto:hello@freekafanda.in">hello@freekafanda.in</a> , in case you have any queries </p>   
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        

        *, *:after, *:before {
            margin: 0;
            padding: 0;

            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;

            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;

            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            font-smooth: always;

            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            font-family: inherit;

            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        body {
            
             
            position: relative;
            
            height: 100vh;
            text-align: center;
             

            
        }
        body:after{
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            
            z-index: -1
        }

        ul{
            list-style: none;
        }

        img {
            -ms-interpolation-mode: bicubic;
            vertical-align: middle;
            border: 0;
        }

        .profile-card{
            width: 300px;
            border-radius: 2px;
            overflow: hidden;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
            position: relative;
            margin: auto;
            background: rgba(255,255,255,1);
            top: 50%;
            transform: translateY(-50%);
        }

        .profile-card header{
            display: block;
            position: relative;
            background: rgba(255,255,255,1);
            text-align: center;
            padding: 30px 0 20px;
            z-index: 1;
            overflow: hidden;
        }

        .profile-card header:before{
            content: "";
            position: absolute;
            
            background-size: cover;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: -1;
            
        }

        .profile-card header:after{
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: linear-gradient(
                to bottom,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 1) 100%
            );
        }

        .profile-card header img{
            border-radius: 100%;
            overflow: hidden;
            width: 150px;
            /*border: 1px solid rgba(255,255,255,.5);*/
            box-shadow: 0 1px 0 rgba(0,0,0,.1),0 1px 2px rgba(0,0,0,.1);
        }

        .profile-card header h1{
            font-weight: 200;
            font-size: 42px;
            color: #444;
            letter-spacing: -3px;
            margin: 0;
            padding: 0;
        }

        .profile-card header h2{
            font-weight: 400;
            font-size: 14px;
            color: #666;
            letter-spacing: .5px;
            margin: 0;
            padding: 0;
        }

        .profile-card .profile-bio{
            padding: 0 30px;
            text-align: center;
            color: #888;
        }

        .profile-card .profile-social-links{
            display: table;
            width: 70%;
            margin: 20px auto;
        }

        .profile-card .profile-social-links li{
            display: table-cell;
            width: 33.3333333333333333%
        }

        .profile-card .profile-social-links li a{
            display: block;
            text-align: center;
            padding: 10px;
            margin: 0 10px;
            border-radius: 100%;
            -webkit-transition: box-shadow 0.2s;
            -moz-transition: box-shadow 0.2s;
            -o-transition: box-shadow 0.2s;
            transition: box-shadow 0.2s;
        }
        .profile-card .profile-social-links li a:hover{
            box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12),0 1px 1px 0 rgba(0,0,0,.24);
        }

        .profile-card .profile-social-links li a:active{
            box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
        }

        .profile-card .profile-social-links li a img{
            width: 100%;
            display: block;
        }




        /* Modify the background color navbara */
         
        .navbar-custom {
            background-color:  #ff6fb7;
        }
        /* Modify brand and text color navbara */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: Black;
        }



    </style>
</head>
<body>

 <!-- Image and text -->
 <nav class="navbar navbar-custom"  >
    <a class="navbar-brand" href="#">
        <img src="images/diamond.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Zlatara <strong> <i>
            Silver
        </strong></i>
    </a> 
    <div>
        <a class="nav-link" href="glavna.php" style="color:black;text-decoration: none;float:left"><strong>Pocetna</strong> </a>
        <a   class="nav-link" href="odjava.php" style="color:black;text-decoration: none;float:right">Odjava</a>
    </div>
    </nav>
    <!-- kod ispod je preuzet sa stranice  https://www.webtopic.com/bootstrap-user-profile-templates/-->

<!-- this is the markup. you can change the details (your own name, your own avatar etc.) but don’t change the basic structure! -->


<aside class="profile-card">
  
  <header>
    
    <!-- here’s the avatar -->
    <a href="">
      <img src="" id="slikaPreview">
    </a>

    <!-- the username -->
    <h1 id="nazivPreview"></h1>
    
    
    
  </header>
  
  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">
    
    <p id="opisPreview"> </p>
    
  </div>
  
  
  
</aside>
<!-- that’s all folks! -->


<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>


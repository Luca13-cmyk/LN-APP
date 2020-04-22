<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/res/admin/login_register/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/res/admin/login_register/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LN-APP| Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/res/admin/login_register/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/res/admin/login_register/assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/res/admin/login_register/assets/demo/demo.css" rel="stylesheet" />
  <!-- CSS  JS Loader -->
  <script src="/res/admin/assets/loader/pace2/pace.min.js"></script>
  <link href="/res/admin/assets/loader/pace2/themes/silver/pace-theme-minimal.css" rel="stylesheet" />
  <!-- reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LeGZtQUAAAAAJscBKcE_t8l__0eVniemBuqFLMB"></script>
  <!-- Aviso -->
  <style>
  
  #aviso_content
  {
    margin-top: 20px;
    position: relative;
    

  }
  .aviso-per #show_error
  {
    color: #f76060;
    position: absolute;
    right: 10px;

  }
  .travel_info
  {
    font-size: 24px;
    animation: pula 1.5s linear infinite 0.5s;
    
  }

  @keyframes pula{
    0%{
        opacity: 0;
        transform: scale(0);
    }
    1%{
        opacity: 0.5;
        transform: scale(0);
    }
    99%{
        opacity: 0.1;
        transform: scale(1.7);
    }
    100%{
        opacity: 0;
        transform: scale(0);
    }
}

#celular_sidebar
  {
    display: none !important;
  }

@media screen and (max-width: 991px)
{
  #celular_sidebar
  {
    display: block !important;
  }
}


  
  </style>
</head>

<body class="login-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
      <div class="container">
        
        <div class="dropdown button-dropdown">
          <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
            <span class="button-bar"></span>
            <span class="button-bar"></span>
            <span class="button-bar"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-header">Recursos</a>
            <a class="dropdown-item" href="/chat-app">ChatApp</a>
            <a class="dropdown-item" href="/speed-test">SpeedTest</a>
            <a class="dropdown-item" href="/ip">IP</a>
            <!-- <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">One more separated link</a> -->
          </div>
        </div>
        
    
        <div class="navbar-translate">
          <a class="navbar-brand" href="/" rel="tooltip" title=".........." data-placement="bottom">
            LN-APP
          </a>
          <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-bar top-bar"></span>
            <span class="navbar-toggler-bar middle-bar"></span>
            <span class="navbar-toggler-bar bottom-bar"></span>
           </button>
        </div>
    
          <div id="celular_sidebar" class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
          <ul class="navbar-nav">
          
            <li class="nav-item">
              <a class="nav-link" href="/chat-app">ChatApp</a>
              <a class="nav-link" href="/speed-test">SpeedTest</a>
              <a class="nav-link" href="/ip">IP</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">....</a>
            </li> -->
          </ul>
          </div>
      </div>
    </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(/res/admin/login_register/assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form id="form" action="/login" method="POST" class="form">
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="/res/admin/login_register/assets/img/now-logo.png" alt="">
                </div>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Login" name="login" autocomplete="none">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </span>
                  </div>
                  <input type="password" placeholder="Password" name="password" class="form-control" />
                </div>
                <div id="aviso_content" class="input-group no-border input-lg ">
                  <?php if( $error != '' ){ ?>

                  <div class="aviso-per">
                      <i class="now-ui-icons travel_info"></i> <i id="show_error"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></i>
                  </div>
                  <?php } ?>

                    
                  
                </div>
              </div>
              <div class="card-footer text-center">
                 
                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block" type="button">
                    <i class="now-ui-icons objects_spaceship"></i> Entrar
                </button>
        
                <!-- <div class="pull-left">
                  <h6>
                    <a href="/forgot" class="link">Esqueceu a senha</a>
                  </h6>
                </div>
                <div class="pull-right">
                  <h6>
                    <a href="/register" class="link">Registre-se</a>
                  </h6>
                </div> -->
                
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class=" container ">
       
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, LN-APP|
           Por
          <a href="#" target="_blank">Luca Negrette</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="/res/admin/login_register/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/res/admin/login_register/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/res/admin/login_register/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/res/admin/login_register/assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/res/admin/login_register/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/res/admin/login_register/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Login JS -->
  <script src="/res/admin/login_register/assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <!-- reCAPTCHA v3 -->
  <script>
      
      $('#form').submit(function(event) {
        event.preventDefault();
          
          grecaptcha.ready(function() {
              grecaptcha.execute('6LeGZtQUAAAAAJscBKcE_t8l__0eVniemBuqFLMB', {action: '/admin/login'}).then(function(token) {
                  $('#form').prepend('<input type="hidden" name="token" value="' + token + '">');
                  $('#form').prepend('<input type="hidden" name="action" value="/admin/login">');
                  $('#form').unbind('submit').submit();
                  
              });
          });
    });
    </script>
</body>

</html>
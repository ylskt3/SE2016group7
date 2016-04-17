
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    
    <!-- CSS -->
      
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
          
        <link rel="stylesheet" href="assets/css/elements.css">
        <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
    
    
        <!--
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        -->
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
  <script src="assets/semantic/semantic.min.js"></script>
  <script src="assets/js/application.js"></script>
    
    
    <!-- Favicon and touch icons -->
        
        <link rel="shortcut icon" href="assets/ico/linkedin.ico">


</head>
<body id="bodyID">
    
    <!-- Top menu -->
    
    <nav class="navbar navbar-inverse navbar-fixed-top"> 
      <div class="container">  
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Go to home" href="home.html">Pseudo Linkedin</a>
        </div>     
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Edit Portfolio</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="business_creation.html">Create business</a></li>
              </ul>
            </li>
            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Connect your friends">Connection</a></li>
            <li><a href="searh_job.html" data-toggle="tooltip" data-placement="bottom" title="Search for jobs">Search Jobs</a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="contact us">Contact us</a></li>
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
             
            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Notification"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>Notification</a></li>
            <li><a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->    
      </div>
    </nav>
    
    
    <!-- Profile -->
   
     <div  class="container jumbotron">
       
      <!-- Main component for a primary marketing message or call to action -->
      
        <h1>Welcome to your home page!</h1>
        <p>You can view your information here</p> 
      

    </div> <!-- /container 1 -->
 
    <div  class="container jumbotron">
      
        <div>
        <img  class="img-circle" width="304" height="236" src="assets/img/9.jpg">
        </div>

        <div class="ui stackable celled grid container">
            <div class="two column row">
               <div class="column">
                   <div class="ui segment">LastName, FirstName </div>
               </div>
               <div class="column">
                 <div class="ui segment">Interest: playing basketball</div>
                </div>
            </div>
            <div class="three column row">
                <div class="column">
                        <div class="ui segment">Phone: 573-xxx-xxxx</div>
               </div>
               <div class="column">
                   <div class="ui segment">Email: something@gmai;.com</div>
               </div>
               <div class="column">
                   <div class="ui segment">University of Missouri - Columbia</div>
               </div>
            </div>
            <div class="two column row">
                <div class="column">
                        <div class="ui segment">Address 1:</div>
                </div>
                 <div class="column">
                        <div class="ui segment">Address 2:</div>
                </div>
            </div>
       </div>     
    
   </div> <!-- /container 2-->
    

   <div class="container jumbotron">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Education
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Experience
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Volunteer
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
  </div> <!-- /container 3-->
  
    
    
  
    

</body>
</html>
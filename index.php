<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.2/vue-router.min.js"></script>

    <?php session_start(); // place it on the top of the script ?>
    <?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
    ?>

  </head>
  <body>
      <header> 
        <div class="row">
    <img src="images/logo.png" alt="logo" class="logo">
    <div class="nav1">
  <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link" href="#">HOME</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">ABOUT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">VIEWS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">BOOK A TOUR</a>
  </li>

</ul>
</div>
</div>
</header>
<!--Main Layout-->

<div class="image1">
<img class="" src="images/ff.jpg" alt="responsive image">
</div>
<div class="row">
      
      <div class="col-md-12">
        
          <img id="img-1" src="images/background_middle.png" alt="test" class="img-responsive">
        
        
          <p  id="book-p" >Book <br>  Your Journey</p>
          <div id="root">
  <button class="button" @click="showLoginModal=true" >Destination</button>
     <my-modal v-show="showLoginModal" @close='showLoginModal=false' >

     <p class="image is-4by3">
      <img src="images/1.png" alt="">
    </p>
     </my-modal>
     <button class="button" @click="showsignoutModal=true">Arrival time</button>
     <my-modal v-show="showsignoutModal" @close='showsignoutModal=false' >

     <p class="image is-4by3">
      <img src="images/2.png" alt="">
    </p>
</my-modal>
   <button class="button" @click="showsignoutModal=true">Booking</button>
     <my-modal v-show="showsignoutModal" @close='showsignoutModal=false' >

     <p class="image is-4by3">
      <img src="images/3.png" alt="">
    </p>
</my-modal>

</div>
</div>
</div>


<div class="content-2">
   <hr  class="hr1" style="width:90%; height: 1px; border: none; background-color: #55d1d2" >
  <p class="p-1">ABOUT ONTARIO SUMMER</p>
      <hr class="hr1" style="width:90%; height: 1px; border: none; background-color: #55d1d2">
      <p class="p-2">Ontario is one of the 13 provinces and territories of Canada and is located in east-central Canada. It is Canada's most populous province accounting for 38.3 percent of the country's population, and is the second-largest province in total area. Ontario is fourth-largest in total area when the territories of the Northwest Territories and Nunavut are included. It is home to the nation's capital city, Ottawa, and the nation's most populous city, Toronto, which is also Ontario's provincial capital. </p>
      <img src="images/img1.png" alt="img1" class="img1" style="margin-top:20px;">
</div>

<div class="content-3">
<hr  class="hr2" style="width:90%; height: 1px; border: none; background-color: #55d1d2" >
  <p class="p-3">Ontario Special</p>
      <hr class="hr2" style="width:90%; height: 1px; border: none; background-color: #55d1d2">
      <div class="row">
      <p id="p-6" class="col p-2" style="width:60%;margin-left:-1%;text-align:left;float:left;margin-top:30px;">After the long winter in Toronto, I finally got to enjoy the outdoors. Forest trees, tree entanglement, wilderness adventures, take the time to go out and enjoy nature with family or friends in this outdoor season, Ontario has the most beautiful parks and attractions.</p>
      <img class="col img2" src="images/img2.png" alt="img2" style="margin:40px 0;width:50%;float:right;">
      </div>
</div>
<img src="images/img3.png" alt="img3" style="clear:both;">
<div class="container">
<hr  class="hr3" style="width:90%; height: 1px; border: none; background-color: #55d1d2" >
  <p class="p-7">Ontario Gallery</p>
      <hr class="hr3" style="width:90%; height: 1px; border: none; background-color: #55d1d2">
      <div class="container">
  <div class="row">
    <a href="images/carletonC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/carletonC.jpg" class="img-fluid rounded">
    </a>
    <a href="images/cntowerC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/cntowerC.jpg" class="img-fluid rounded">
    </a>
    <a href="images/FlowerpotC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/FlowerpotC.jpg" class="img-fluid rounded">
    </a>
  </div>
  <div class="row">
    <a href="images/niagaraC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/niagaraC.jpg" class="img-fluid rounded">
    </a>
    <a href="images/searchmountC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/searchmountC.jpg" class="img-fluid rounded">
    </a>
    <a href="images/niagararboatC.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="images/niagaraboatC.jpg" class="img-fluid rounded">
    </a>
  </div>
</div>
<div class="video">
<div class="embed-responsive embed-responsive-16by9 ">
  <iframe class="embed-responsive-item" src="video/Ontario.mp4" allowfullscreen control></iframe>
</div>


</div>
    <form action="Admin/sign-up.php" method="POST" class="px-4 py-3 row">
      <div class="form-group">
        <label for="first_name">First Name: 
          <input type="text" name="first_name" id="first_name" required>
      </label>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name: 
          <input type="text" name="last_name" id="last_name" required>
      </label>
      </div>
      <div class="form-group">
        <label for="email">Email: 
          <input type="email" name="email" id="email" required>
      </label>
      </div>
      <div class="form-group">
        <label for="country">Country: 
          <input type="text" name="country" id="country" required>
      </div>
    </label>
      <button type="submit" name="submit" class="btn btn-primary">SUBSCRIBE</button>
  </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    

    <footer>
    <p class="p-8">© 2016 Personal Potfolio. All Rights Reserved.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
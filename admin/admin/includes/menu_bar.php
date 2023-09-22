
<div class="loader_bg">
    <div class="loader"></div>
</div>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed menu-open">

<div class="wrapper">
   
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars " style="color:white;  position:relative;  z-index: 1;"></i></a>
      </li>
    </ul>



    <ul class="navbar-nav1 mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" id="main-sidebar" href="#">
       

        <center>  <i class="fa fa-cogs text-white"> </i> </center>

 
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style ="padding:0;">

        <a class=" dropdown-item " style="margin-bottom" href="my_profile.php">
          <i class="fa fa-cogs dark"> </i>  Profile Settings</a>

              
                 <a class="border-top dropdown-item " onclick="return confirm('Are you sure To Log Out')" href="../logout.php" ><i class="fa fa-power-off dark"></i> Logout</a>

      </li>
  
    </ul>
  </nav>

  <div class="loader_bg">
    <div class="loader"></div>
</div>
 

    <script>
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        }, 1500);
    </script>



<style>
.loader_bg{
    position: fixed;
    top:0px;
    height:130%;
    z-index: 99999999;
    background: #fff;
    width: 100%;
    height: 100%;
}
.loader{
    border: 0 soild transparent;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    position: absolute;
    top: calc(50vh - 75px);
    left: calc(50vw - 75px);
}
.loader:before, .loader:after{
    content: '';
    border: 0.4em solid #3C8DBC;
    border-radius: 50%;
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    left: 0;
    animation: loader 2s linear infinite;
    opacity: 0;
}
.loader:before{
    animation-delay: .5s;
}
@keyframes loader{
    0%{
        transform: scale(0);
        opacity: 0;
    }
    50%{
        opacity: 1;
    }
    100%{
        transform: scale(1);
        opacity: 0;
    }
}






    </style>
  <script>
    function changeStyle(){
        var element = document.getElementById("main-sidebar");
        element.style.display = "none";
    }
    </script>
  <script>
$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
    </script>

  <style>
    

    body {
    
    display: block;
    margin: 0 !important;
}
/* 
    @media screen and (min-width: 0px) and (max-width: 700px) {
      .hide {

  
}
} */

@media screen and (min-width: 701px) and (max-width: 1024px) {
  .fa-bars {
position:absolute;
top:100px;
display: block;
    /*hide the icon on larger screens*/
    visibility: hidden;
  }
}
    .navbar-nav1 {
      float:right;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  margin-top: -30px;
  list-style: none;
}

.hide {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;

}
    .content-header {
  position: relative;
  padding-top: 30px;
  padding-bottom:30px;
  margin-bottom:80px;
  
}
.content-header > h1 {
  margin: 0;
  font-size: 15px;
}
.content-header > h1 > small {
  display: inline-block;
  font-weight: 300;
  padding-left: 110px;

}
.content-header > .breadcrumb {
  padding-left: 10px;
  background: transparent;
  margin-top: 0;
  margin-bottom: 0;
  font-size: 12px;
  padding: 7px 5px;
  position: absolute;
  right: 10px;
  border-radius: 2px;
  top:0;
}
.breadcrumb {
    list-style: none;
    border-radius: 4px;
    background-color:white;
    margin-left:20px;
  }


  .add{
    position:absolute;
    top:1120px;
    right: 60px;
  }
  .dashboard{
    padding-left: 20px;
    font-size:24px;
  }
.content-header > .breadcrumb > li > a {
  text-decoration: none;
  display: inline-block;
}
.content-header > .breadcrumb > li > a > .fa,
.content-header > .breadcrumb > li > a > .glyphicon,
.content-header > .breadcrumb > li > a > .ion {
  margin-right: 5px;
}
.content-header > .breadcrumb > li + li:before {
  content: '>\00a0';
}
@media (max-width: 691px) {
  .content-header {
  position: relative;
  padding-top: 110px;
  padding-left: 0;
  padding-right: 0;
  
  
}
  .content-header > .breadcrumb {
    position: relative;
    margin-top: 5px;
    top: 0;
    right: 0;
    float: none;
    background: #d2d6de;
    padding-left: 10px;
  }
  .content-header > .breadcrumb li:before {
    color: #97a0b3;
  }

  .content-wrapper>.content {
    position: relative;
    top:-36px;
}

}

.content {
    min-height: 420px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}


    </style>
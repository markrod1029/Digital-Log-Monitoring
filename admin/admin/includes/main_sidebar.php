<aside class="main-sidebar sidebar-dark-primary">
 
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link " style ="border-style:none; height:70px; " >
      <img src="../../path/images/logo.png" alt=" Logo" class=" img-circle " style=" height:50px; position:absolute; ">
          
      <span class="brand-text font-weight-light text-center ml-5 mr-15" style="font-size:17px;  position:absolute; left:10px; ">Digital Log Monitoring With <br>Data Analytics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <div class="con">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-3 mb-3 d-flex">
        <div class="image"  style="position:relative; right:10px;">
          <img src="<?php echo (!empty($user['photo'])) ? '../../path/images/'.$user['photo'] : '../../../path/images/profile.jpg'; ?>" class="img-circle elevation-2" alt="User Image" style=" height:50px; width:50px; ">
        </div>
        <div class="info">
          <a href="#" class="d-block mt-1 mb-0 text-white text-center font-size:16px;"><?php echo $user['fname'].' '.$user['lname']; ?></a>
          <a href="#" class="d-block  text-white ml-2 font-size:16px; text-center mb-2"><?php echo $user['position']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="header text-center brand-text  text-white">PERSONAL</li>


                    <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Analytics 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">     
                  <i> &nbsp;</i>
                  <p>Elementary
                  <i class="right fas fa-angle-left"></i>
                  </p></a>
                <ul class="nav-treeview">
                  <li class="nav-item">
                    <a href="elementary_morning_daily.php" class="nav-link"> 
                       <i class="far fa-circle nav-icon"></i>
                       <p>Morning</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="elementary_afternoon_daily.php" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                       <p> Afternoon</p></a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">     
                  <i> &nbsp;</i>
                  <p>Junior
                  <i class="right fas fa-angle-left"></i>
                  </p></a>
                <ul class="nav-treeview">
                  <li class="nav-item">
                    <a href="junior_morning_daily.php" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                       <p>Morning</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="junior_afternoon_daily.php" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                       <p>Afternoon</p></a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">     
                  <i> &nbsp;</i>
                  <p>Senior
                  <i class="right fas fa-angle-left"></i>
                  </p></a>
                <ul class="nav-treeview">
                  <li class="nav-item">
                    <a href="senior_morning_daily.php" class="nav-link"> 
                     <i class="far fa-circle nav-icon"></i>
                       <p>Morning</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="senior_afternoon_daily.php" class="nav-link"> 
                     <i class="far fa-circle nav-icon"></i>
                       <p>Afternoon</p></a>
                  </li>
                </ul>

                
              </li>
            </ul>

          </li>




             <li class="nav-item has-treeview ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-calendar"></i>
             <p>
             School Anouncement
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="announcement.php" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                 <p>Anouncement List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="add_announcement.php" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                 <p>Add Anouncement</p>
               </a>
             </li>
           </ul>
          </li>





          <!--<li class="nav-item has-treeview ">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-user"></i>-->
          <!--    <p>-->
          <!--    Teacher-->
          <!--      <i class="right fas fa-angle-left"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="teacher.php" class="nav-link ">-->
          <!--         <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Teacher List</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="add_teacher.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Add Teacher</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->


 
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">




              <li class="nav-item">
                <a href="student.php" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                  <p>Student List
                  </p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="add_student.php" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>

              
            
              
            </ul>
          </li>
    

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
              Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="schedule.php" class="nav-link ">
             <i class="far fa-circle nav-icon"></i>
                  <p>Schedule List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_schedule.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                  <p>Add Schedule</p>
                </a>
              </li>
            </ul>
          </li>

      <?php
      if(isset($_SESSION['user'])){ 
        ?>
          <!-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
              Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="schedule.php" class="nav-link ">
                <i> &nbsp;</i>
                  <p>Admin List</p>
                </a>
              </li>
              
            </ul>
          </li> -->

      <?php
      } ?>



          
           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
              Report
              <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="activity_log.php" class="nav-link ">
                   <i class="far fa-circle nav-icon"></i>
                  <p> Logs</p>
                </a>
              </li>

             

              <li class="nav-item">
                <a href="monitoring_report.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                  <p> Monitoring Report</p>
                </a>
              </li>

              <!--<li class="nav-item">-->
              <!--  <a href="afternoon_report.php" class="nav-link ">-->
              <!--  <i> &nbsp;</i>-->
              <!--    <p> Afternoon Report</p>-->
              <!--  </a>-->
              <!--</li>-->
              
            </ul>
          </li>

        <!--<li class="nav-item">-->
        <!--    <a href="scanner.php" class="nav-link">-->
        <!--      <i class="nav-icon fa f fa-scanner"></i>-->
        <!--      <p>Scanner Account</p>-->
        <!--    </a>-->
        <!--  </li>-->
 
          

          <li class="nav-item">
            <a href="aboutus.php" class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>About Us</p>
            </a>
          </li>
          <br>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    </div>
    <!-- /.sidebar -->
  </aside>


       
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

.layout-top-nav .wrapper .main-header .brand-image {
  margin-top: -1.5rem;
  margin-right: 1.2rem;
  height: 133px;
}


.main-header  {
  -webkit-transition: width 0.3s ease-in-out;
  -o-transition: width 0.3s ease-in-out;
  transition: width 0.3s ease-in-out;
  display: block;
  float: left;
  height: 80px;
  font-size: 20px;
  line-height: 50px;
  text-align: center;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  padding: 0 15px;
  font-weight: 300;
}
.layout-navbar-fixed .wrapper .main-header {
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
  background-color: #367fa9;
  height: 80px;

}
.main-sidebar{
  background-color: #367fa9;
  height:190px;
  margin-bottom:100px;

}

.layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {
  background-color: #367fa9;

}
.sidebar {
    height: calc(100% - (3.5rem + 1px));
    overflow-y: auto;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    padding-top: 0;
    background-color: #367fa9;
    height:190px;
  margin-bottom:100px;

}



.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #222D32;
    color: #fff;
}

[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
  background-color: #222D32;
    color: #fff;
}

.user-panel {
    background-image: url('../../path/images/bg.jpg');
  background-repeat: no-repeat;
  background-position: center;
  position: relative;
  /* background: url(../images/background.png) center no-repeat; */
width:1000px;
  padding-top:50px;
  padding-bottom:20px;
  overflow: hidden;
  color:black;

}

.user-panel .info {
  display: inline-block;
  padding:0;
}


.con{
  height: 500px;
  overflow-y: auto;
  overflow-x: hidden;
  margin-top:20px;  
}
.con::-webkit-scrollbar-track
{
	background-color:#367FA9;
  height:10px;

}
.con:hover::-webkit-scrollbar
{
  display: block;
  height:10px;

}
.con::-webkit-scrollbar
{
	width: 6px;
	background-color: #367FA9;
  display:none;
  height:10px;


}

.con::-webkit-scrollbar-thumb
{
	background-color: #C1C7AB;

}




.content-header {
  position: relative;
  padding-top: 70px;
  padding-left: 0;
  padding-right: 0;
  padding-bottom:10px;
  background-color: #F5F5F5;
  
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
  top: 15px;
  right: 10px;
  border-radius: 2px;
}
.breadcrumb {
    list-style: none;
    border-radius: 4px;
    background-color:white;
    padding-top:0;
  }


  .add{
    position:absolute;
    top:20px;
    right: 20px;
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
@media (max-width: 991px) {
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
}


    </style>
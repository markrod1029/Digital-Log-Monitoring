<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Announcements List
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Announcements List</li>
                </ol>
              </div>
    </div>
        </section>



        <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="card">
            
            <div class="box-header with-border " style ="background-color:#367FA9;">
                
              
            </div>

            



            <section class=" container-fluid" id="two-column-list">
    <div class="container">
        <div class="row ">
                <section aria-label="Announcements" class="announcements">
                    <h2 class="font-weight-bold border-bottom pb-3 mt-3 mb-0 text-center">Announcements</h2>

                    <div class="announcement-slider border-r-xs-0 border-r position-relative">
                        <div>
                            <ul class="nolist list-unstyled position-relative mb-0 px-lg-5 ">
                              
                            <?php 
                    
                    $sql = "SELECT * FROM schedule_list  ";

                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? '../../path/images/'.$row['photo'] : '../../path/images/profile.jpg';
                       
                    ?>
                            
                            <li class="border-bottom pb-4 ">
                                    <span class="meta text-uppercase text-center"><?php echo $row['start_datetime'].' - '.$row['end_datetime']?> </span>
                                    <h4 class="font-weight-bold mt-0">
                                        <a href="#">
                                        <?php echo $row['title']?>
                                        </a>
                                    </h4>
                                    <p class="m-0 post_intro"> <?php echo $row['description']?></p>
                                </li>
                        

                                <?php
                    }?>
                            </ul>
                            <br>
                            <a class="all pos-stat text-uppercase ml-lg-5 " href="#">All announcements
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                          

                        </div>
                        <br>

                 
                    </div>
                </section>
          
        </div>
    </div>


        </div>
    </div>







  
    <?php include 'includes/footer.php'; ?>

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>








<style>


.meta {
    font-family: Helvetica,Arial,open-sans;
    font-size: .8571rem;
    font-weight: 600;
    color: #0093e0!important;
}



@media (max-width: 991px) {
  .announcements h2 {
    border-bottom: none;
  }
}

@media (max-width: 991px) {
  .announcements h2.events-heading {
    padding-left: 15px;
    margin-top: 20px;
  }
}

.announcements .slick-slider ul {
  font-family: "Open Sans Condensed", Arial, Verdana, sans-serif;
}

.announcements .slick-slider ul li:last-child {
  border-bottom: none;
  margin-bottom:65px;
}

.announcements .slick-slider ul li h3:hover a {
  color: #7d3793;
  text-decoration: underline;
}

.announcements .slick-slider ul p {
  font-size: 1.2rem;
  font-family: "Helvetica Neue", Helvetica, Arial, open-sans;
}

.announcements .slick-slider .all {
  color: #0093e0!important;
  font-family: "Helvetica Neue", Helvetica, Arial, open-sans;
}

.announcements .slick-slider .all:hover {
  border-bottom: none;
}

.announcements .slick-slider .all .fa-caret-right {
  padding-left: 6px;
  position: relative;
}

.announcements .slick-slider .all .fa-caret-right:after {
  content: '';
  position: absolute;
  width: 100%;
  height: 6px;
  bottom: -4px;
  right: 0;
  background-color: #fff;
}

.announcements .left-right-arrows button:first-child {
  margin-right: 3px;
}

@media (max-width: 991px) {
  .announcements {
    margin: 0 auto;
    width: 70%;
  }
}

@media (max-width: 767px) {
  .announcements {
    width: 80%;
  }
}

@media (max-width: 500px) {
  .announcements {
    width: 100%;
  }
}

.left-right-arrows {
  position: absolute;
  bottom: 0px;
  right: 10px;
}

@media (max-width: 767px) {
  .left-right-arrows {
    border-top: -21px;
  }
}

.left-right-arrows button {
  height: 38px;
  width: 38px;
  border: 1px solid #464646;
}

@media (min-width: 360px) and (max-width: 767px) {
  .left-right-arrows button {
    height: 50px;
    width: 50px;
  }
}


.events-section {
  position: relative;
  margin: 0 auto;
}

@media (max-width: 991px) {
  .events-section {
    width: 70%;
  }
}

@media (max-width: 767px) {
  .events-section {
    width: 80%;
  }
}

@media (max-width: 500px) {
  .events-section {
    width: 100%;
  }
}

.events-section .slick-slider ul {
  font-family: "Open Sans Condensed", Arial, Verdana, sans-serif;
}

.events-section .slick-slider ul li {
  padding: 2rem 0;
  position: relative;
}



.events-section .slick-slider ul li:last-child {
  border-bottom: none;
  margin-bottom: 65px;
}



@media (max-width: 767px) {
  .events-section .slick-slider ul li:after {
    width: 80px;
  }
}

.events-section .slick-slider ul li:hover .events-date {
  background-color: #461e52;
  color: #fff;
}

.events-section .slick-slider ul li:hover .event-li h3 {
  color: #0093e0!important;
}

.events-section .slick-slider ul li .event-li {
  display: inline-block;
  padding-left: 42px;
}

@media (max-width: 767px) {
  .events-section .slick-slider ul li .event-li {
    padding-left: 15px;
  }
}

.events-section .slick-slider ul li .event-li h3 {
  display: inline-block;
  margin-bottom: 8px;
}

@media (max-width: 767px) {
  .events-section .slick-slider ul li .event-li h3 {
    font-size: 1.429rem;
  }
}

.events-section .slick-slider ul li .event-li p {
  font-size: 1.214rem;
  font-weight: 600;
  color: #000;
  font-family: "Helvetica Neue", Helvetica, Arial, open-sans;
}

@media (max-width: 767px) {
  .events-section .slick-slider ul li .event-li p {
    font-size: 16px;
    /*font-size: 1.6rem;*/
  }
}

.events-section .slick-slider .all {
  color: #461e52;
  font-family: "Helvetica Neue", Helvetica, Arial, open-sans;
}

.events-section .slick-slider .all:hover {
  border-bottom: none;
}

.events-section .slick-slider .all .fa-caret-right {
  padding-left: 6px;
  position: relative;
}

.events-section .slick-slider .all .fa-caret-right:after {
  content: '';
  position: absolute;
  width: 100%;
  height: 6px;
  bottom: -4px;
  right: 0;
  background-color: #fff;
}

.events-section .slick-slider .events-date {
  min-width: 81px;
  height: 88px;
  background-color: #0093e0!important;
  font-family: "Helvetica Neue", Helvetica, Arial, open-sans;
  font-weight: 600;
  padding-top: 19px;
  display: inline-block;
  transition: all, 0.4s, ease;
}

@media (max-width: 767px) {
  .events-section .slick-slider .events-date {
    width: 61px;
    height: 68px;
    padding-top: 10px;
  }
}

.events-section .slick-slider .events-date a:focus, .events-section .slick-slider .events-date a:hover {
  color: #fff;
}

.events-section .slick-slider .events-date span {
  font-weight: 300;
  font-size: 2.5rem;
  display: block;
  padding: 0;
  line-height: 30px;
}

@media (max-width: 767px) {
  .events-section .slick-slider .events-date span {
    font-size: 1.429rem;
  }
}

@media (min-width: 991px) {
  .events-section .left-right-arrows {
    bottom: 0px;
  }
}
a {
    transition: all,.4s,ease;
}
</style>


<script>
    $('.announcement-slider').slick({
		dots: false,
		arrows: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		prevArrow: $('.prev-arrow-announcement'),
		nextArrow: $('.next-arrow-announcement')
	});

	$('.events').slick({
		dots: false,
		arrows: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		prevArrow: $('.prev-arrow-events'),
		nextArrow: $('.next-arrow-events')
	});
    </script>


</body>




<?php

  include ('inc/header.php');
  include ('inc/nav.php');
?>


  <div id="slider_wrapper">
    <div class="container">
      <div id="slider_inner">
        <div class="">
          <div id="slider">
            <div class="">
              <div class="carousel-box">
                <div class="inner">
                  <div class="carousel main">
                    <ul>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>Welcome To Our</span></div>
                            <div class="txt2"><span>TRAVEL AGENCY</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>7 - Day Tour</span></div>
                            <div class="txt2"><span>AMAZING CARIBBEAN</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>5 Days In</span></div>
                            <div class="txt2"><span>PARIS (Capital Of World)</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>12 - Day Cruises</span></div>
                            <div class="txt2"><span>FROM GREECE TO SPAIN</span></div>
                            <div class="txt3"><span>MEDITERRANEAN - 12 - Day Cruises By "GRAND VICTORIA III" Cruise Liner.</span></div>  
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="slider_pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="front_tabs">
    <div class="container">
      <div class="tabs_wrapper tabs1_wrapper">
        <div class="tabs tabs1">
          <div class="tabs_tabs tabs1_tabs">

              <ul>
                <li class="active flights"><a href="#tabs-1">Circuits</a></li>
              </ul>

          </div>
          <div class="tabs_content tabs1_content">

              <div id="tabs-1">
                <form action="javascript:;" class="form1" method="post">
                  <div class="row">
                    <div class="col-sm-4 col-md-2">
                      <div class="select1_wrapper">
                        <label>Flying from:</label>
                        <div class="select1_inner">
                          <select class="select2 select" style="width: 100%">
                            <option value="1">City or Airport</option>
                            <option value="2">Alaska</option>
                            <option value="3">Bahamas</option>
                            <option value="4">Bermuda</option>
                            <option value="5">Canada</option>
                            <option value="6">Caribbean</option>
                            <option value="7">Europe</option>
                            <option value="8">Hawaii</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="select1_wrapper">
                        <label>To:</label>
                        <div class="select1_inner">
                          <select class="select2 select" style="width: 100%">
                            <option value="1">City or Airport</option>
                            <option value="2">Alaska</option>
                            <option value="3">Bahamas</option>
                            <option value="4">Bermuda</option>
                            <option value="5">Canada</option>
                            <option value="6">Caribbean</option>
                            <option value="7">Europe</option>
                            <option value="8">Hawaii</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="input1_wrapper">
                        <label>Departing:</label>
                        <div class="input1_inner">
                          <input type="text" class="input datepicker" value="Mm/Dd/Yy">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="input1_wrapper">
                        <label>Returning:</label>
                        <div class="input1_inner">
                          <input type="text" class="input datepicker" value="Mm/Dd/Yy">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-1">
                      <div class="select1_wrapper">
                        <label>Adult:</label>
                        <div class="select1_inner">
                          <select class="select2 select select3" style="width: 100%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-1">
                      <div class="select1_wrapper">
                        <label>Child:</label>
                        <div class="select1_inner">
                          <select class="select2 select select3" style="width: 100%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="button1_wrapper">
                        <button type="submit" class="btn-default btn-form1-submit">Search</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Here we display les circuit -->
    <?php

      $sql = "SELECT * FROM circuit";
      $result = query($sql);
      confirm($result);
      if (row_count($result) > 0){
      echo "
      <div class='container'>
      <div class='row'>

      ";
      while($row = mysqli_fetch_assoc($result)) {

    ?>

  <div class="popular col-md-4 col-lg-4" style="margin-top: 10px;">
    <div class="popular_inner">
      <figure>
        <?php echo '<img src="'.$row["image_url"].'" alt="">' ?>
        <div class="over">
          <div class="v1"> <?php echo $row["themeCircuit"];  ?> </div>
        </div>
      </figure>
      <div class="caption">
        <div class="txt1"><span><?php echo $row["themeCircuit"];  ?></span><?php echo $row["duree"]; ?> Days</div>
        <div class="txt2"></div>
        <div class="txt3 clearfix">
          <div class="left_side">
          </div>
          <div class="right_side"><a href=<?php echo "reserve.php?idc=".$row["idCircuit"]; ?> class="btn-default btn1">Reservée</a></div>
        </div>
      </div>
    </div>
  </div>
  <?php
        }
      }

      echo '
      </div>
      </div>
      ';
  ?>
  <div id="why1">
    <div class="container">
      <img src="" alt="">
      <h2 class="animated" data-animation="fadeInUp" data-animation-delay="100">WHY WE ARE THE BEST</h2>

      <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod <br>tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>

      <br><br>

      <div class="row">
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="200">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why1.png" alt="" class="img1 img-responsive">
                  <img src="images/why1_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Amazing Travel</div>
                  <div class="txt2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</div>
                  <div class="txt3">Read More</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="300">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why2.png" alt="" class="img1 img-responsive">
                  <img src="images/why2_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Discover</div>
                  <div class="txt2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</div>
                  <div class="txt3">Read More</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="400">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why3.png" alt="" class="img1 img-responsive">
                  <img src="images/why3_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Book Your Trip</div>
                  <div class="txt2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</div>
                  <div class="txt3">Read More</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="500">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why4.png" alt="" class="img1 img-responsive">
                  <img src="images/why4_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Nice Support</div>
                  <div class="txt2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</div>
                  <div class="txt3">Read More</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="partners">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="100">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner1.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner1_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="200">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner2.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner2_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="300">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner3.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner3_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="400">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner4.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner4_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="500">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner5.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner5_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-2 col-xs-6">
          <div class="thumb1 animated" data-animation="flipInX" data-animation-delay="600">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure>
                  <img src="images/partner6.jpg" alt="" class="img1 img-responsive">
                  <img src="images/partner6_hover.jpg" alt="" class="img2 img-responsive">
                </figure>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>

<?php
  include ('inc/footer.php');
?>
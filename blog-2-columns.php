<?php
 include('includephp/navbar.php');
 include('includephp/header.php');
?>

<!--======= intro =======-->
 
<section class="iq-breadcrumb overview-block-pt text-center iq-bg iq-bg-fixed iq-over-black-90 iq-box-shadow" style="background: url(images/about/check.jpg);" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heading-title iq-breadcrumb-title iq-mtb-100">
                        <h1 class="title iq-tw-8 iq-font-white">BLOGS</h1>
                        <div class="divider white"></div>
                    </div>
                <ul class="breadcrumb">
                    <li><a href="index.html"><i class="ion-home"></i> Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
</section>
  
<!--======= End intro =======-->

<div class="main-content">  
<!--======= Blog =======-->

<section id="blog" class="iq-page-blog overview-block-ptb" >
    <div class="container">
        <div class="row">
        <?php
            require 'admin/database/dbconfig.php';
            $query="SELECT * from blog";
            $query_run=mysqli_query($connection,$query);
            $check_blog=mysqli_num_rows($query_run)>0;
            if($check_blog)
            {
                while($row=mysqli_fetch_array($query_run))
                {
                    ?>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="iq-blog-box">
                        <div class="iq-blog-image clearfix">
                           <img  src="admin/uploadedimage/<?php echo $row['image'];?>" alt="#" class="img-responsive center-block">
                        </div>
                    <div class="iq-blog-detail">
                        <div class="blog-title"> <a href="blog-single.html"><h5 class="iq-tw-6"><?php echo $row['title'];?></h5> </a> </div>
                        <div class="iq-blog-meta">
                            <ul class="list-inline">
                                <li><a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['date'];?></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> 5</a></li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <p><?php echo $row['content'];?></p>
                        </div>
                        <div class="blog-button">
                            <a href="javascript:void(0)" class="pull-left iq-tw-6 iq-user"><i class="fa fa-user-circle" aria-hidden="true"></i> YOPP</a>
                            <a href="javascript:void(0)" class="pull-right iq-tw-6">Read More <i class="fa fa-angle-right" aria-hidden="true"></i></a> </div>
                        </div>
                        </div>
                    </div>
                    
                  <?php
                  }                  
            }
                
                ?>

         <!-- while loop end -->   

            
        
         
    </div>
</section>

<!--======= End Blog =======--> 
</div>
  
   <div class="footer">

    <!-- Subscribe Our Newsletter -->

    <div class="iq-ptb-60 green-bg iq-subscribe">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <form class="form-inline" method="POST" action="php/subscriber_list.php">
                <div class="form-group">
                  <label for="email">Subscribe Our Newsletter</label>
                  <input type="email" class="form-control" placeholder="Enter Your Email" id="email" name="email">
                </div>
                <button name="subscriber_list" type="submit" class="button bt-white re-mt-30">Subscribe Now</button>
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Subscribe Our Newsletter END -->

    <!-- full-contact -->

    <section id="contact-us" class="iq-full-contact white-bg">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-sm-6">
                    <div class="iq-map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.8822175416312!2d73.90672811439856!3d18.57934807222422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c134e6c4ff8f%3A0xa810745cf9310798!2sPune%20International%20Airport!5e0!3m2!1sen!2sin!4v1617441088316!5m2!1sen!2sin" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" style="border:0" ></iframe>
                    </div>
                </div>
                <div class="col-sm-6 iq-mt-20 iq-pall-40">
                    <h4 class="heading-left iq-tw-6 iq-pb-20">Get in Touch</h4>
                    <div class="row">
                        <div id="formmessage">Success/Error Message Goes Here</div>
                        <form class="form-horizontal" id="contactform" method="post" action="../php/contact-form.php">
                            <div class="contact-form">
                                <div class="col-sm-6">
                                    <div class="section-field">
                                        <input id="name" type="text" placeholder="Name*" name="name">
                                    </div>
                                    <div class="section-field">
                                        <input type="email" placeholder="Email*" name="email">
                                    </div>
                                    <div class="section-field">
                                        <input type="text" placeholder="Phone*" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="section-field textarea">
                                        <textarea class="input-message" placeholder="Comment*" rows="7" name="message"></textarea>
                                    </div>
                                    <input type="hidden" name="action" value="sendEmail" />
                                    <button id="submit" name="submit" type="submit" value="Send" class="button pull-right iq-mt-40">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <div id="ajaxloader" style="display:none"><img class="center-block mt-30 mb-30" src="images/ajax-loader.gif" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
       
<?php
include('includephp/scripts.php');
 include('includephp/footer.php');
 
?>
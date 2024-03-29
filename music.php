<?php require 'main_head.php';?>
<?php require 'navbar.php';?>

<div class="container">
	<div class="row">
	    <div class="box">
	        <div class="col-lg-12">
	            <hr class="page-title">
	            <h2 class="intro-text text-center bc-header">Contact <strong>business casual</strong>
	            </h2>
	            <hr class="page-title">
	        </div>
	        <div class="col-md-8">
	            <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
	            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
	        </div>
	        <div class="col-md-4">
	            <p>Phone: <strong>555.519.2013</strong>
	            </p>
	            <p>Email: <strong>feedback@startbootstrap.com</strong>
	            </p>
	            <p>Address: <strong>The Plaza<br>5483 Start Bootstrap Ave.<br>Beverley Hills, CA 26829</strong>
	            </p>
	        </div>
	        <div class="clearfix"></div>
	    </div>
	</div>
	
	<div class="row">
	    <div class="box">
	        <div class="col-lg-12">
	            <hr>
	            <h2 class="intro-text text-center bc-header">Contact <strong>form</strong>
	            </h2>
	            <hr>
	            <p>This contact form is just the form elements, it is not a working form. You will have to make the form work by yourself, or take it out if you can't figure out how to make it work.</p>
	            <form role="form">
	                <div class="row">
	                    <div class="form-group col-lg-4">
	                        <label>Name</label>
	                        <input type="text" class="form-control">
	                    </div>
	                    <div class="form-group col-lg-4">
	                        <label>Email Address</label>
	                        <input type="email" class="form-control">
	                    </div>
	                    <div class="form-group col-lg-4">
	                        <label>Phone Number</label>
	                        <input type="tel" class="form-control">
	                    </div>
	                    <div class="clearfix"></div>
	                    <div class="form-group col-lg-12">
	                        <label>Message</label>
	                        <textarea class="form-control" rows="6"></textarea>
	                    </div>
	                    <div class="form-group col-lg-12">
	                        <input type="hidden" name="save" value="contact">
	                        <button type="submit" class="btn btn-default">Submit</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>

</div>
<!-- /.container -->

<footer>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p>Copyright &copy; Company 2013</p>
        </div>
    </div>
</div>
</footer>

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>

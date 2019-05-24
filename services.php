<?php
$page = 'services';
include_once('assets/partials/header.php');
?>
<!-- /#page-title-wrapper -->
<section id="short-intro" class="section colored-wrapper">
<div class="container">
    <div class="row">
        <div class="col-md-6 wrapper-1">
            <div id="carousel-example-generic" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="assets/img/carousel/property-1.jpg" class="img-responsive" alt="Carousel Image">
                    </div>
                    <div class="item">
                        <img src="assets/img/carousel/property-2.jpg" class="img-responsive" alt="Carousel Image">
                    </div>
                    <div class="item">
                        <img src="assets/img/carousel/property-3.jpg" class="img-responsive" alt="Carousel Image">
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-md-6 wrapper-1">
            <h5 class="subpage-title">Services</h5>
            <p style="font-size: 14px; color: #4a2663">
            We offer Inventories, Check Outs, Check Ins and Property Inspections for Landlords and Agents. An Inventory is an unbiased legal document that can assist a Landlord to claim back any monies for damages against their property. If a tenant disputes any deductions that a Check Out report hi-lights and the matter goes to DPS or TDS for arbitration without an Inventory it's unlikely a Landlord has a claim on a tenants deposit nor would they be successful in obtaining reimbursement. 
            </p>
        </div>
    </div>
</div>
<!-- /.container -->
</section>
<!-- /#our-services -->


<?php
include_once('assets/partials/footer.php');
?>
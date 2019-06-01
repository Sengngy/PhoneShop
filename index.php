<?php
    include('view/header.php');
?>



<!-- row -->

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <div class="section-title" style="border-bottom:1px solid #777; padding-bottom: 15px">
            <h3 class="title">New Arrivals</h3>
            <div class="section-nav">
                <ul class="section-tab-nav tab-nav" ">
                    <li class="active"><a data-toggle="tab" href="#tab1">PHONE</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-3">

        <?php get_site_cat(); ?>

    </div>

    <div class="col-md-9">
        <?php get_site_product(); ?>
    </div>

</div>
<!-- /row -->


<?php
    include('view/footer.php');
?>
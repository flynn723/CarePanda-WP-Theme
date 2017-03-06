<style>
#order-summary-accordion .product-img {
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 250px;
}
#order-summary-accordion .order-sum-total {
    display: inline-block;
	border-top: 3px solid #9a65a5;
}
</style>
<div class="panel-group" id="order-summary-accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOrderSummaryOne">
		  <h4 class="panel-title">
		    <a role="button" data-toggle="collapse" data-parent="" href="#collapseOrderSummaryOne" aria-expanded="true" aria-controls="collapseOrderSummaryOne">
		      <?php _e('Order Summary'); ?><i class="fa fa-caret-down float-right"></i>
		    </a>
		  </h4>
		</div>
		<div id="collapseOrderSummaryOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOrderSummaryOne">
		  <div class="panel-body">
		  	<div class="order-summary-row row">
				<div class="product-img-col hidden-xs col-sm-12">
				  	<img src="https://justinestrada.com/carepanda/wp-content/themes/carepanda/img/carepanda-mobile-device-screen-w-logo-buttons.png" class="product-img"/>
				</div>
		  		<div class="col-xs-7 clearfix"><h4>Compliance Package Plan</h4></div>
		  		<div class="col-xs-7">User Quantity</div><div class="col-xs-5 text-right"><p class="order-sum-user-quantity">User Quantity Not Set</p></div>
		  		<div class="col-xs-7">Account Fee</div><div class="col-xs-5 text-right"><p class="order-sum-account-fee">Package Plan Not Selected</p></div>
		  		<div class="col-xs-7">Total</div><div class="col-xs-5 text-right"><p class="order-sum-total">$0.00</p></div>
		  	</div>
		  	
		  </div><!-- end of <div class="panel-body"> -->
		</div>
	</div>
<div>
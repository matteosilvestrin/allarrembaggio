<!-- msg_azione -->
<?	if(!empty($msg_azione)){ ?>

    <style>
	.flashmsg{	background-color:rgba(40,177,219,1.00);	}
	</style>

	<div class="container">
   <div class="alert alert-info row" style="text-align:center">
	<p class="bg-primary flashmsg"><?= $msg_azione ?></p>
	</div>
    </div><!-- /container -->

<?	} ?>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>All Project Messages</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 full-width" id="appendMessages">
    	<?php
			$this->renderPartial('_projectMessages', array('rooms'=>$rooms, 'more'=>$more, 'offset'=>$offset, 'limit'=>$limit));
		?>
	</div>
</div>

<script type="text/javascript">	
	function loadMore(element){
		var type = "<?php isset($_REQUEST['view']) && $_REQUEST['view'] == 'manager' ? '&view=manager' : ''; ?>";
	    element.val('Loading ...');
	    $.ajax({
	        type:"POST",
	        url:"<?php echo Yii::app()->createUrl('/admin/default/projectMessages');?>",
	        data:"start="+$("#offset").val() + type,
	        beforeSend:function() {
	        	$('#loadHolder').remove();
	        },
	        success:function(response){
	            $('#appendMessages').append(response)
	        }
	    });
	 }
 </script>
<?php
	foreach($rooms as $room) {
		$message = $room->chatMessages(array("limit"=>1, "order"=>"add_date DESC"));
		$messageOb = $message[0];

		$roomUser = $room->chatRoomHasUsers(array("condition"=>"users_id<>1"));
		$roomUserOb = $roomUser[0];

		$userImage = $room->suppliersProjects[0]->suppliers->users->image;
		if(preg_match('/www.filepicker.io/', $userImage)) $userImage .= "/convert?w=80&h=80&fit=crop";
		if(empty($userImage)) $userImage = Yii::app()->theme->baseUrl . "/images/avatar.png";
		?>
			<div class="col-md-10 col-md-offset-1 well well-md">
				<div class="media">
					<div class="media-left col-md-2">
						<a href="<?php echo Yii::app()->createUrl('/admin/suppliersProjects/introduction', array("pid"=>base64_encode($room->suppliersProjects[0]->id))); ?>">
						  <img class="media-object img img-circle" src="<?php echo $userImage; ?>" width="80" height="80" alt="User Image">
						</a>
					</div>
					<div class="media-body col-md-8">
						<h4 class="media-heading"><a style="color:#00B6AD;" href="<?php echo Yii::app()->createUrl('/admin/suppliersProjects/introduction', array("pid"=>base64_encode($room->suppliersProjects[0]->id))); ?>" class="link-default"><?php echo $room->suppliersProjects[0]->clientProjects->name; ?></a>
						</h4>
						<strong>
							<?php
								echo ($room->suppliersProjects[0]->admin_message_count == 0)? "No" : $room->suppliersProjects[0]->admin_message_count; ?> Unread Messages
						</strong>
					</div>
					<div class="col-md-2">
						<a href="#" class="btn btn-primary pull-right mt30">Go to Chat Room</a>
					</div>
				</div>
			</div>
		<?php
	}

?>
<div id="loadHolder">
	<?php
		if($more == 1) {
			?>
				<div class="text-center col-md-10 col-md-offset-1">
		            <input type="hidden" value="<?php echo $offset + $limit;?>" id="offset"/>
		            <input type="button" onclick="loadMore($(this))" value="Load More" class="btn btn-default"/>
				</div>
			<?php
		}
	?>
</div>
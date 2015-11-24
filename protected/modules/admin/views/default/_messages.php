<?php
	foreach($rooms as $room) {
		$message = $room->chatMessages(array("limit"=>1, "order"=>"id DESC"));
		$messageOb = $message[0];

		$roomUser = $room->chatRoomHasUsers(array("condition"=>"users_id<>1"));
		$roomUserOb = $roomUser[0];

		$userImage = $roomUserOb->users->image;
		if(preg_match('/www.filepicker.io/', $userImage)) $userImage .= "/convert?w=80&h=80&fit=crop";
		if(empty($userImage)) $userImage = Yii::app()->theme->baseUrl . "/images/avatar.png";
		?>
			<div class="col-md-10 col-md-offset-1 well well-md">
				<div class="media">
					<div class="media-left pull-left">
						<a href="<?php echo Yii::app()->createUrl('/admin/users/initChat', array("uid"=>$roomUserOb->users->id)); ?>">
						  <img class="media-object img img-circle" src="<?php echo $userImage; ?>" width="80" height="80" alt="User Image">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><a style="color:#00B6AD;" href="<?php echo Yii::app()->createUrl('/admin/users/initChat', array("uid"=>$roomUserOb->users->id)); ?>" class="link-default"><?php echo $room->room_name; ?></a></h4>
						<?php
							$username = $messageOb->chatMessageHasUser->users->role_id == 1 ? 'Admin' : $messageOb->chatMessageHasUser->users->first_name;
							echo "<strong>" . $username . ":</strong> " . $messageOb->message; ?>
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
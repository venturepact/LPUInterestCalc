<div class="adminNotes">

	<div class="notesContainer">
		<button type="button" class="btn btn-default flat-but">
		  <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Notes
		</button>

		<div class="notesHolder">
			<textarea class="notesArea" data-uid="<?php echo $user->id; ?>"><?php if(!empty($user->admin_notes)) echo $user->admin_notes; ?></textarea>
			<button class="btn btn-primary saveNote">Save</button>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.flat-but').click(function() {
			if($(this).hasClass('open')) {
				$('.notesHolder').slideUp();
				$(this).removeClass('open');
				$(this).css('right', '-30px');
			} else {
				$('.notesHolder').slideDown();
				$(this).addClass('open');
				$(this).css('right', '0');
			}
		});

		$(document).mouseup(function (e) {
		    var container = $(".flat-but, .notesHolder");

		    if (!container.is(e.target)
		        && container.has(e.target).length === 0) {
		        $('.notesHolder').slideUp();
				$('.flat-but').removeClass('open');
				$('.flat-but').css('right', '-30px');
		    }
		});

		$(".notesArea").keyup(function(e) {
		    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
		        $(this).height($(this).height()+1);
		    };
		});

		$('.saveNote').on('click', function() {
			var post_data = {
				note: $('.notesArea').val(),
				uid: $('.notesArea').data('uid')
			};

			console.log(post_data);

			$.ajax({
				type: 'POST',
				url: '<?php echo Yii::app()->createUrl("/admin/users/saveNotes"); ?>',
				data: post_data,
				dataType: 'json',
				beforeSend: function() {
					$('.saveNote').prop('disabled', true);
					$('.saveNote').text('Saving..');
				},
				success: function(response) {
					$('.saveNote').prop('disabled', false);
					if(response.success) {
						console.log(response.msg);
						$('.saveNote').text('Saved');
						$('.saveNote').addClass('btn-success').removeClass('btn-primary');
					} else {
						console.log(response.msg);
						$('.saveNote').text('Failed');
						$('.saveNote').addClass('btn-danger').removeClass('btn-primary');
					}

					setTimeout(function(){
						$('.saveNote').text('Save');
						if($('.saveNote').hasClass('btn-success')) {
							$('.saveNote').addClass('btn-primary').removeClass('btn-success');
						}
						if($('.saveNote').hasClass('btn-danger')) {
							$('.saveNote').addClass('btn-primary').removeClass('btn-danger');
						}
					}, 2000);
				},
			});
		});
	});
</script>
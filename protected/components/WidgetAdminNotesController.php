<?php
class WidgetAdminNotesController extends CWidget
{
	public $visible 	= true;
	public $uid 		= null;

 	public function init() {
		if($this->visible) {}
	}

	public function run() {
		if($this->visible) {
			$this->renderContent();
		}
	}

	protected function renderContent() {
		$uid = $this->uid;

		// get notes for this user
		$user = Users::model()->findByPk($uid);

		$this->render('widgetAdminNotes', array('user'=>$user));
	}
}
<?php
class WidgetHomeMenu extends CWidget
{
	public $visible=true;
 	public function init()
	{
		if($this->visible)
		{

		}
	}

	public function run()
	{
		if($this->visible)
		{
			$this->renderContent();
		}
	}
	protected function renderContent()
	{
		$model	=	new LoginForm;
		$forgot	=	new ForgotpasswordForm;
		if(Yii::app()->user->hasState('remail')){
			$users   =   Users::model()->find(array('condition'=>'username=:email','params'=>array(':email'=>Yii::app()->user->remail) ));
		}	
		if(empty($users))
			$users	=	new Users;

		$this->render('widgetHomeMenu',array('model'=>$model,'forgot'=>$forgot,'users'=>$users));
	}
}

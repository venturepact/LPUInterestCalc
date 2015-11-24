<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $status;
	public function authenticate()
	{
        //Master Password to get into any account       
        $masterPassword = base64_encode(Yii::app()->params['masterPassword']);
        $master = 0; // if master is set to 1 then only allow login        

		$record		=	Users::model()->findByAttributes(array('username'=>$this->username));
		
		if(empty($record))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
        else{
            // check for master password and other validations
            if($this->password == $masterPassword && $record->status == 1)
                $master=1;
            else if($record->status == 0 )            	
                $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;            
            else if($record->password != $this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
                        
            else
                $master =1;
        }
        if($master)
		{
			$img = Yii::app()->theme->baseUrl."/style/images/userAvatarBig.png";
			
			$img		=	(!empty($record->image))?$record->image:Yii::app()->theme->baseUrl."/style/images/userAvatarBig.png";
			
			$this->setState('parentId', $record->id);
			
			
			if (strpos($img,'filepicker.io') !== false)
				$img	=	$img.'/convert?w=90&h=90&fit=crop';

			$this->setState('image', $img);
			$this->setState('id', $record->id);	
			$tz = empty($record->time_zone)?"America/New_York":$record->time_zone;		
			$this->setState('tz', $tz);			
			$this->setState('activation', $record->status);

            // Add chat room in session for users that are not admin
            if($record->role_id != 1 || $record->id != 1) {
            	$chat_room_id = Users::getChatRoom($record);
            	//echo $chat_room_id;die;
                $this->setState('chatRoom', $chat_room_id);
            }

			// CVarDumper::dump($record->roles,10,1);die;
			$role			=	(isset($role))?$role:$record->roles->name;
			$this->status	=	$record->status;
			$this->setState('role_id', $record->role_id);
			$this->setState('role', $role);
			$this->setState('profileStatus',$record->status);			
			$this->setState('name', $record->display_name);
			$this->setState('fname', $record->first_name);
			$this->setState('email', $record->username);
			$this->errorCode=self::ERROR_NONE;
		}
        return !$this->errorCode;
	}
}

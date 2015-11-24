<?php
class WidgetAdminNotificationController extends CWidget
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
		/*==========  Personal Message  ==========*/
		
		$totalMsgCount = 0;
		$totalManagerMsgCount = 0;
		$individualMsg = array();
		$roomsWithMsg = array();
		
		// for private rooms
		$chatRooms = ChatRoom::model()->findAllByAttributes(array("room_type"=>'0'));
		foreach ($chatRooms as $chatRoom) {
		    $chatAdmin = ChatRoomHasUsers::model()->findByAttributes(array('chat_room_id'=>$chatRoom->id, 'users_id'=>'1'));
		    if(!empty($chatAdmin) && $chatAdmin->message_count > 0) {
		        $totalMsgCount++;
		        $individualMsg[$chatRoom->id] = $chatAdmin->message_count;
		        $roomsWithMsg[] = $chatRoom->id;
		        $chatUser = ChatRoomHasUsers::model()->find("chat_room_id = $chatRoom->id AND users_id <> 1");
		        if(!empty($chatUser->users->clientProfiles) && $chatUser->users->clientProfiles[0]->manager_id == Yii::app()->user->id)
		        	$totalManagerMsgCount++;
		    }
		}

		// select latest chat message from rooms
		$criteria = new CDbCriteria;
		$criteria->with = array("chatRoom"=>array("select"=>false));
		$criteria->order = "t.add_date DESC";
		$criteria->addInCondition("chatRoom.id", $roomsWithMsg);
		$allMessages = ChatMessages::model()->findAll($criteria);

		// get messages in chat room
		$messages = array();
		$gotMsg = array();
		foreach($allMessages as $eachMsg) {
		    if(!in_array($eachMsg->chat_room_id, $gotMsg)) {
		        $messages[] = $eachMsg;
		        $gotMsg[] = $eachMsg->chat_room_id;
		    }
		}

		$personalMessages = array(
			'totalMsgCount' => $totalMsgCount,
			'totalManagerMsgCount' => $totalManagerMsgCount,
			'messages' => $messages,
			'individualMsg' => $individualMsg,
		);


		/*==========  Project Messages  ==========*/

		$unread_rooms = array();

		$criteria = new CDbCriteria;
		$criteria->select = false;
		$criteria->condition = "t.admin_message_count > 0";
		$unread_rooms_count = SuppliersProjects::model()->count($criteria);

		$criteria->join  = "LEFT JOIN client_projects ON client_projects.id = t.client_projects_id";
		$criteria->join .= " LEFT JOIN client_profiles ON client_profiles.id = client_projects.client_profiles_id";
		$criteria->condition = "t.admin_message_count > 0 and client_profiles.manager_id=".Yii::app()->user->id;
		$unread_manager_rooms_count = SuppliersProjects::model()->count($criteria);

		unset($criteria);

		$queryProjectsWithMsg = "SELECT sp.id, sp.admin_message_count, cr.chat_room_id, cr.latest_msg from
									(
										select chat_room_id, max(id) as latest_msg
								    	from chat_messages
								    	group by chat_room_id order by latest_msg desc
								    ) as cr
								left join suppliers_projects as sp on sp.chat_room_id = cr.chat_room_id
								left join chat_room as crt on crt.id = cr.chat_room_id
								WHERE sp.admin_message_count > 0 AND crt.room_type = 1 LIMIT 10";
		$command = Yii::app()->db->createCommand($queryProjectsWithMsg);
		$rowsProjects=$command->queryAll();
		$projectIds = array();
		foreach ($rowsProjects as $project) {
			$projectIds[] = $project['id'];
		}

		$criteria = new CDbCriteria;
		$criteria->select = "*";
		$criteria->addInCondition('t.id', $projectIds);
		$criteria->order = "FIELD(t.id, ".implode(',', $projectIds).")";
		$unread_rooms = SuppliersProjects::model()->findAll($criteria);

		if(!empty($unread_rooms))
		@usort($unread_rooms, function($a, $b)
		{
		    return strtotime($a->chatRoom->chatMessages[count($a->chatRoom->chatMessages) - 1]->add_date) < strtotime($b->chatRoom->chatMessages[count($b->chatRoom->chatMessages) - 1]->add_date);
		});

		$projectMessages = array(
			'unread_rooms' => $unread_rooms,
			'unread_rooms_count' => $unread_rooms_count,
			'unread_manager_rooms_count' => $unread_manager_rooms_count,
		);


		/*==========  Notifications  ==========*/
		
		$criteria           =   new CDbCriteria();
		$criteria->order    =   't.id DESC';
		$criteria->limit    =   3;
		$criteria->condition = "t.for_user = 1";
		$logs       =   Log::model()->findAll($criteria);
		$logCount   =   Log::model()->countbyattributes(array('is_checked'=>0,'for_user'=>Yii::app()->user->id));

		unset($criteria);
		$criteria           =   new CDbCriteria();
		$criteria->condition = "t.for_user = " . Yii::app()->user->id;
		$managerLogCount   =   Log::model()->countbyattributes(array('is_checked'=>0,'for_user'=>Yii::app()->user->id));

		$notifications = array(
			'logs' => $logs,
			'logCount' => $logCount,
			'managerLogCount' => $managerLogCount
		);
		
		/*========== Innovation Index Notifications  ==========*/
		
		$criteria           =   new CDbCriteria();
		$criteria->order    =   't.id DESC';
		$criteria->limit    =   3;
		$criteria->condition = "t.users_id = 1";
		$logs       =   InInnovationLog::model()->findAll($criteria);
		$logCount   =   InInnovationLog::model()->countbyattributes(array('ischecked'=>0,'users_id'=>Yii::app()->user->id));

		unset($criteria);
		$criteria           =   new CDbCriteria();
		$criteria->condition = "t.users_id = " . Yii::app()->user->id;
		$managerLogCount   =   InInnovationLog::model()->countbyattributes(array('ischecked'=>0,'users_id'=>Yii::app()->user->id));

		$innovationNotifications = array(
			'logs' => $logs,
			'logCount' => $logCount,
			'managerLogCount' => $managerLogCount
		);

		$this->render('widgetAdminNotification', array('personalMessages'=>$personalMessages, 'projectMessages'=>$projectMessages, 'notifications'=>$notifications,'innovationNotifications'=>$innovationNotifications));
	}
}
<?php
class WidgetAdminChatController extends CWidget
{
    public $layout          = '//layouts/column2';
    public $visible         = true;
    public $room_id         = null;
    public $user_id         = null;
    public $show            = null;
    public $filpickerKey    = "ANQWcFDQRUiGfBqjfgINQz";
    public $res             = array(
                                "avtar"=>"https://www.filepicker.io/api/file/gV55SrpScerWjiokSE7A"
                              );
    
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
        $this->Chat();
    }   
    protected function Chat()
    {
        if(1||isset($_REQUEST["room_id"]) )
        {
            $room_id = base64_decode($this->room_id);
            $user_id = base64_decode($this->user_id);

            //echo $room_id;die;
            
            $setVariable = array();
            if(!empty($room_id) && $room_id != 0)
            {
                $limit_num_messages = 10;
                $allusers = ChatRoomHasUsers::model()->findAllByAttributes(array("chat_room_id"=>$room_id));
                
                $chatRoomUsers = CHtml::listData($allusers,"id","id");

                //get data of chat messages on the basis of all users in that room collected from above query
                $chatData = ChatMessages::model()->findAllByAttributes(array("chat_message_has_user_id"=>$chatRoomUsers),array('order'=>'id desc','limit'=>$limit_num_messages));
                usort($chatData, function($a, $b)
                {
                    return $a->id > $b->id;
                });
                //Get the chatRoomHasUs er table id
                $criteria = new CDbCriteria();
                $criteria->join ='LEFT JOIN chat_room ON chat_room.id = t.chat_room_id';
                $criteria->condition = 'chat_room.room_type = :room_type and t.chat_room_id=:chat_room_id and t.users_id= :user_id';
                
                // get current user
                $mainUser = Users::model()->findByPK(Yii::app()->user->id);
                if($mainUser->role_id == 1) {
                    $userId = 1;
                } else {
                    $userId = Yii::app()->user->id;
                }

                /*0 will be for admin chat */
                $criteria->params = array(":room_type" => "0","chat_room_id"=>$room_id,"user_id"=>$userId);
                $roomUser = ChatRoomHasUsers::model()->find($criteria);
                $message_count = $roomUser->message_count;
                unset($criteria);

                //get all the messages which I have not seen.
                $queryNotSeen = "SELECT id FROM chat_messages cm WHERE cm.`chat_room_id`=".$room_id."  and id NOT in (SELECT csb.chat_messages_id FROM   chat_seen_by csb WHERE  csb.chat_messages_id = cm.id and csb.users_id = ".$roomUser->users_id.") ";
                $command = Yii::app()->db->createCommand($queryNotSeen);
                $rows=$command->queryAll();
                
                //CVarDumper::dump($rows,10,1);die;
                foreach ($rows as $key => $value) {
                    $chatSeenBy = new ChatSeenBy;
                    $chatSeenBy->chat_messages_id = $value["id"];
                    $chatSeenBy->users_id = $roomUser->users_id;
                    $chatSeenBy->save();
                }

                // update message count
                if($this->show == "full") {
                    $roomUser->message_count = 0;
                    $roomUser->update();
                }
                
                $setVariable["chatData"]=$chatData;
                $setVariable["roomUser"]=$roomUser;
                $setVariable["allusers"]=$allusers;
                $setVariable["admin"]=Users::model()->findByPk(1);
                $setVariable["user1"]=new Users;
                $setVariable["room"]=$room_id;
                $setVariable['message_count'] = $message_count;
                //CVarDumper::dump($setVariable,10,1);die;              

            }
            //CVarDumper::dump($setVariable,10,1);die;
            if($this->show == "full")
                $this->render('widgetAdminChat',$setVariable);
            if($this->show == "floating")
                $this->render('widgetFloatingChat',$setVariable);
        }else
        {
            if($this->show == "full")
                $this->render('widgetAdminChat');
            if($this->show == "floating")
                $this->render('widgetFloatingChat');
        }
    }// end of method
}

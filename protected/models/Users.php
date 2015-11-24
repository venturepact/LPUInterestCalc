<?php
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $confirm_password;
	public $company_name;
	public $company_link;
	public $company_size;
	public $country;
	public $cities_id;
	public $link;
	public $addUser;
	public $refCode;
	public $redirect_uri;

	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id,username, password,first_name,promo_code', 'required'),
			array('status, role_id , is_innovation_user, is_in_invited', 'numerical', 'integerOnly'=>true),
			array('last_name, first_name, role', 'length', 'max'=>45),
			array('image, linkedin', 'length', 'max'=>200),
			array('company_name, display_name, time_zone, promo_code, last_login_location', 'length', 'max'=>100),
			array('username, password', 'length', 'max'=>255),
			array('phone_number', 'length', 'max'=>25),
			array('add_date, last_login, last_login_location, refCode', 'safe'),
			array('username,display_name,linkedin,promo_code', 'unique'),
			array('username', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, last_name, first_name, image, company_name, display_name, is_linkedin_user, username, phone_number, password, linkedin, role, time_zone, add_date, last_login, last_login_location, status, role_id,promo_code,refCode,is_innovation_user, is_in_invited', 'safe', 'on'=>'search'),
			array('id, last_name, first_name, company_name, is_linkedin_user, username, linkedin, role, status, role_id,is_innovation_user, is_in_invited', 'safe', 'on'=>'invitesSearch'),
			array('id, last_name, first_name, image, company_name, display_name, is_linkedin_user, username, phone_number, password, linkedin, role, time_zone, add_date, last_login, last_login_location, status, role_id,promo_code,refCode', 'safe', 'on'=>'newClientsSearch'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'chatRooms' => array(self::HAS_MANY, 'ChatRoom', 'users_id'),
			'chatRoomHasUsers' => array(self::HAS_MANY, 'ChatRoomHasUsers', 'users_id'),
			'managerHasClients' => array(self::HAS_MANY, 'ClientProfiles', 'manager_id'),
			'clientProfiles' => array(self::HAS_MANY, 'ClientProfiles', 'users_id'),
			'logs' => array(self::HAS_MANY, 'Log', 'login_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'users_id'),
			'proposalPitches' => array(self::HAS_MANY, 'ProposalPitches', 'users_id'),
			'suppliers' => array(self::HAS_MANY, 'Suppliers', 'users_id'),
			'teams' => array(self::HAS_MANY, 'Team', 'users_id'),
			'teamList' => array(self::HAS_MANY, 'Team', 'add_by'),
			'roles' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'usersHasCities' => array(self::HAS_MANY, 'UsersHasCities', 'users_id'),
			'usersHasTeams' => array(self::HAS_MANY, 'UsersHasTeam', 'users_id'),
			'usersOffices' => array(self::HAS_MANY, 'UsersOffices', 'user_id'),
			'linkedinConnections' => array(self::HAS_MANY, 'LinkedinConnections', 'users_id'),
			'synapsePayment' => array(self::HAS_MANY, 'SynapsePayment', 'users_id'),
			'suppliersTransactions' => array(self::HAS_MANY, 'SuppliersTransactions', 'users_id'),
			'refWallets' => array(self::HAS_MANY, 'RefWallet', 'users_id'),
			'referral' => array(self::HAS_MANY, 'Referral', 'referral_id'),
			'reference' => array(self::HAS_MANY, 'Referral', 'referance_id'),
			
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'last_name' => 'Last Name',
			'first_name' => 'Name',
			'image' => 'Image',
			'company_name' => 'Company Name',
			'display_name' => 'Display Name',
			'username' => 'Username',
			'phone_number' => 'Phone Number',
			'password' => 'Password',
			'linkedin' => 'Linkedin',
			'is_linkedin_user' => 'Is Linkedin User',
			'role' => 'Designation',
			'time_zone' => 'Time Zone',
			'add_date' => 'Add Date',
			'last_login' => 'Last Login',
			'last_login_location' => 'Last Login Location',
			'status' => 'Status',
			'role_id' => 'Role',
			'promo_code'=>'Promo Code',
		);
	}

	public function invitesSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->addCondition('t.is_innovation_user = 1');
		// $criteria->order='t.id DESC';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.last_name',$this->last_name,true);
		$criteria->compare('t.first_name',$this->first_name,true);
		// $criteria->compare('t.image',$this->image,true);
		$criteria->compare('t.company_name',$this->company_name,true);
		// $criteria->compare('t.display_name',$this->display_name,true);
		$criteria->compare('t.username',$this->username,true);
		// $criteria->compare('t.phone_number',$this->phone_number,true);
		// $criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.linkedin',$this->linkedin,true);
		$criteria->compare('t.is_linkedin_user',$this->is_linkedin_user,true);
		$criteria->compare('t.role',$this->role,true);
		// $criteria->compare('t.time_zone',$this->time_zone,true);
		// $criteria->compare('t.add_date',$this->add_date,true);
		// $criteria->compare('t.last_login',$this->last_login,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.role_id',$this->role_id);
		// $criteria->compare('t.promo_code',$this->promo_code);
		$criteria->compare('t.is_in_invited',$this->is_in_invited,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('is_linkedin_user',$this->is_linkedin_user,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('time_zone',$this->time_zone,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('promo_code',$this->promo_code);
		$criteria->compare('is_in_invited',$this->is_in_invited);
		//CVarDumper::dump($this,10,1);die;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function newClientsSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		$criteria->order 	=	't.add_date DESC';
		$criteria->join 	=	'LEFT JOIN client_profiles clientProfiles ON clientProfiles.users_id=t.id';
		$criteria->condition= 	'(Select COUNT(*) from client_projects where client_projects.client_profiles_id = clientProfiles.id) = 0 AND t.role_id = 2';

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.last_name',$this->last_name,true);
		$criteria->compare('t.first_name',$this->first_name,true);
		$criteria->compare('t.image',$this->image,true);
		$criteria->compare('t.company_name',$this->company_name,true);
		$criteria->compare('t.display_name',$this->display_name,true);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.phone_number',$this->phone_number,true);
		$criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.linkedin',$this->linkedin,true);
		$criteria->compare('t.is_linkedin_user',$this->is_linkedin_user,true);
		$criteria->compare('t.role',$this->role,true);
		$criteria->compare('t.time_zone',$this->time_zone,true);
		$criteria->compare('t.add_date',$this->add_date,true);
		$criteria->compare('t.last_login',$this->last_login,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.role_id',2);
		$criteria->compare('t.promo_code',$this->promo_code);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Return chat room for users
	 * If not exist, create one and return
	 */
	public static function getChatRoom($u) {
		// do initiation process
		$criteria = new CDbCriteria();
		$criteria->join ='LEFT JOIN chat_room ON chat_room.id = t.chat_room_id';
		$criteria->condition = 'chat_room.room_type = :room_type  and t.users_id= :user_id';
		/*0 will be for admin chat */
		$criteria->params = array(":room_type" => "0","user_id"=>$u->id);
		$roomUser = ChatRoomHasUsers::model()->find($criteria);

		//CVarDumper::dump($roomUser,10,1);die;

		// if room not found create a chat room
		if(empty($roomUser)) {

			// create a chat room
			$room = new ChatRoom();
			$room->room_type = 0;
			$room->room_name =  ucfirst($u->first_name) . " - Admin Chat";
			$room->add_date = date("Y-m-d H:i:s");
			$room->status = 1;

			// if chat room creation failed, rollback and show error
			if(!$room->save()) {
				/*$transaction->rollback();
				Yii::app()->user->setFlash('failureFlash', 'The user with user_id : '.$uid . " does not exists.");*/
				//$this->redirect(array('/site/index'));
			}

			// if chat room created, add user to the room
			$userGroup = array(1, $u->id);
			foreach ($userGroup as $user) {
				$chatHasUsers = new ChatRoomHasUsers();
				$chatHasUsers->chat_room_id = $room->id;
				$chatHasUsers->users_id = $user;
				$chatHasUsers->added_by = "Admin";
				$chatHasUsers->add_date = date("Y-m-d H:i:s");
				$chatHasUsers->status = 1;

				if($user == 1) $chatHasUsers->users_type = 1;

				if(!$chatHasUsers->save()) {
					CVarDumper::dump($chatHasUsers,10,1);
					die;
					/*$transaction->rollback();
					Yii::app()->user->setFlash('failureFlash', "The user with user_id : ".$uid . " does not exists.");*/
					//$this->redirect(array('/site/index'));
				}

			}
			//$transaction->commit();
			$roomUser = $chatHasUsers;
		}
		return isset($roomUser->chat_room_id)?$roomUser->chat_room_id:'0';

	}

	/**
     * Accepts a date time string and returns time in ago
     */
    public static function ago( $datetime )
    {
    	date_default_timezone_set(Yii::app()->user->tz);
        $interval = date_create('now')->diff( date_create($datetime) );
        if ( $v = $interval->y >= 1 ) {
            $in = ($interval->y == 1) ? ' year' : ' years';
            return $interval->y . $in;
        }
        if ( $v = $interval->m >= 1 ) {
            $in = ($interval->m == 1) ? ' month' : ' months';
            return $interval->m . $in;
        }
        if ( $v = $interval->d >= 1 ) {
            $in = ($interval->d == 1) ? ' day' : ' days';
            return $interval->d . $in;
        }
        if ( $v = $interval->h >= 1 ) {
            $in = ($interval->h == 1) ? ' hour' : ' hours';
            return $interval->h . $in;
        }
        if ( $v = $interval->i >= 1 ) {
            $in = ($interval->i == 1) ? ' minute' : ' minutes';
            return $interval->i . $in;
        }
        $in = ($interval->s == 1) ? ' second' : ' seconds';
        return $interval->s . $in;
    }

    public static function calculateDuration( $startdate,$enddate )
    {
    	date_default_timezone_set(Yii::app()->user->tz);
        $interval = date_create($enddate)->diff( date_create($startdate));
        if ( $v = $interval->y >= 1 ) {
            $in = ($interval->y == 1) ? ' year' : ' years';
            return $interval->y . $in;
        }
        if ( $v = $interval->m >= 1 ) {
            $in = ($interval->m == 1) ? ' month' : ' months';
            return $interval->m . $in;
        }
        if ( $v = $interval->d >= 1 ) {
            $in = ($interval->d == 1) ? ' day' : ' days';
            return $interval->d . $in;
        }
        if ( $v = $interval->h >= 1 ) {
            $in = ($interval->h == 1) ? ' hour' : ' hours';
            return $interval->h . $in;
        }
        if ( $v = $interval->i >= 1 ) {
            $in = ($interval->i == 1) ? ' minute' : ' minutes';
            return $interval->i . $in;
        }
        $in = ($interval->s == 1) ? ' second' : ' seconds';
        return $interval->s . $in;
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

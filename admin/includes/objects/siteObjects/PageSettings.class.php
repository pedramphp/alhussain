<?php 

class PageSettings extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';

	private static $REQUIRED_EDIT_FIELDS = array("pageTitle","pageSubtitle","pageHeaderId");
	
	private static $NON_EMPTY_EDIT_FIELDS = array("pageTitle");
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	public function process(){		
		$types = array('edit');
		$request = LiteFrame::FetchGetVariable();
		if(Request::issetFields(array("type"),'GET') && !empty($request['type']) && in_array($request['type'],$types)){
			$this->edit();		
		}else{
			$this->manage();
		}		
	}
	
	private function setUnEditedRecords(){
		
    	$request = LiteFrame::FetchPostVariable();
    	$record = DatabaseStatic::$ah->LoadId_page_header($request['pageHeaderId']);
    	$this->results['pageHeader'] = array(
			'title'=> $request['pageTitle'],
			'subTitle'=> $request['pageSubtitle'],
			'id'=> $request['pageHeaderId'],
    		'actionTitle'=>  $record->action_title,
    		'edit' => LiteFrame::GetApplicationPath() . '?action=pageSettings&headerId=' . $request['pageHeaderId']. '&type=edit'
		);
	}
	
	
	private function edit(){
	
		$request = LiteFrame::FetchGetVariable();
		if(!Request::issetFields(array("headerId"),'GET') || !Request::isNumeric($request['headerId']) ){
			Redirect::Action("404");
			return; 
		
		} 	
			
		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
			$record = DatabaseStatic::$ah->LoadId_page_header($request['headerId']);
			$this->results['pageHeader'] = array(
				'id'=> $record->id,
				'title'=> $record->header,
				'subTitle'=> $record->sub_header			
			);
			$this->results['pageHeader']['actionTitle'] = $record->action_title;
			$this->results['pageHeader']['edit'] = LiteFrame::GetApplicationPath() . '?action=pageSettings&headerId=' . $record->id.'&type=edit';
		
			return;
		}
		
	
		$request = Request::trimAllRequest('POST');
		if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
		    !Request::isNumeric($request['pageHeaderId'])
		){
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
			return;
		}
		
		$record = DatabaseStatic::$ah->LoadId_page_header($request['pageHeaderId']);
		if(empty($record)){
			
			Redirect::Action("pageSettings",array("status"=>'not_found'));
			return;
		}
		
		$record->sub_header = $request['pageSubtitle'];
		$record->header = $request['pageTitle'];
		$record->updated_date = ModuleHelper::getCurrentSqlDate();

		if($record->Save()){
			Redirect::Action("pageSettings",array("status"=>'edit'));
		}else{
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$SQL_ERROR;
		}
		
	}
	
	private function manage(){
		
		$request = LiteFrame::FetchGetVariable();
		
		if(isset($request['status']) && in_array($request['status'],array('error','not_found','edit')) ){
			switch($request['status']){
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited a page header';
					break;	
				case "error":
					$this->results['errorMsg'] = self::$SQL_ERROR;
					break;
				case "not_found":
					$this->results['errorMsg'] = 'This record was not found in our database';
					break;
					
			}
		}
		$params = array('order','action_title DESC');
		$records = DatabaseStatic::$ah->Load_page_header($params);
		$this->results['pageHeader'] = array('records'=>array());
		$pageHeaderRecs = &$this->results['pageHeader']['records'];
		foreach($records as $record){
			$recordArray = $record->ToArray();
			$pageHeaderRecs[] = array(
				'action'=> $recordArray['action'],
				'title'=> $recordArray['header'],
				'actionTitle'=> $recordArray['action_title'],
				'subTitle'=> $recordArray['sub_header'],
				'preview'=> dirname(LiteFrame::GetApplicationPath()) . '/'. $recordArray['action'],
				'edit'=> LiteFrame::GetApplicationPath() . '?action=pageSettings&headerId=' . $recordArray['id'].'&type=edit'
			);
			
		}
		
	}
	
	
	
}
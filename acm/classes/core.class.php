<?php

defined( '_ACM_VALID' ) or die( 'Direct Access to this location is not allowed.' );
//mybb integration


define('IN_MYBB', NULL);
require_once '../forum/global.php';
require_once '../forum/MyBBIntegrator.php';
require_once '../forum/inc/datahandlers/user.php';
require_once '../libs/mysql.inc.php';


class core {

	public function __construct() {
		$this->secure_post();
	}

	public function index() {
		if(ACCOUNT::load()->verif())
			$this->show_account();
		else
			$this->show_login();
	}

	public function loggout() {
		ACCOUNT::load()->loggout();
		MSG::add_valid(LANG::i18n('_logout'));
		$this->index();
	}
    
    public function loginForo() {
        //mod by fede1608
		
		MSG::add_error(LANG::i18n('_wrong_auth'));
		$host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'signinforum.php';
        header("Location: http://$host$uri/$extra");
        exit;
        
	}
    
	public function login() {
        global $mybb, $db, $cache, $plugins, $lang, $config;
        $MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config);
		if(empty($_POST['Luser']) || empty($_POST['Lpwd']))
		{
			MSG::add_error(LANG::i18n('_no_id_no_pwd'));
		}else{

			$this->secure_post();

			if(!ACCOUNT::load()->auth($_POST['Luser'], $_POST['Lpwd'], @$_POST['Limage']))
            {
				MSG::add_error(LANG::i18n('_wrong_auth'));
            }
            else
            {   
                $mysqldb= new SQL("freya.linekkit.com:3306", "root", "overflow1021", "linekkitlogin");
                $query = $mysqldb->execute('SELECT * FROM accounts WHERE login="'.$db->escape_string($_POST['Luser']).'"');
                $useracm = $query[0];
                    
                    $MyBBI->logout();
                    if(!$MyBBI->login($useracm['userForum'], $_POST['Lpwd'],'','')){
                        //$this->loginForo();
                       echo '';
                    }else {
                        echo '';
                    }
                    
                   
            }
		}

		$this->index();
	}

	public function show_login() {
		SmartyObject::getInstance()->assign('vm', array(
		    'exist_account'		=> LANG::i18n('_exist_account'),
		    'account_length'	=> CONFIG::g()->core_id_limit,
		    'password_length'	=> CONFIG::g()->core_pwd_limit,
		    'account'			=> LANG::i18n('_account'),
		    'password'			=> LANG::i18n('_password'),
		    'login_button'		=> LANG::i18n('_login_button'),
		    'forgot_password'	=> LANG::i18n('_forgot_password'),
		    'new_account'		=> LANG::i18n('_new_account'),
		    'new_account_text'	=> LANG::i18n('_new_account_text'),
		    'create_button'		=> LANG::i18n('_create_button')
		));
		if(CONFIG::g()->core_act_img) {
			SmartyObject::getInstance()->assign('image', 'image');
		}
		SmartyObject::getInstance()->setTemplate('form.tpl');
	}

	public function show_account() {
		
		SmartyObject::getInstance()->assign('vm', array(
			'title_page'		=> LANG::i18n('_title_page'),
		    'account_text'		=> LANG::i18n('_chg_pwd_text')
		));
		
		$modules = array();
		
		$modules[] = array('name'=>LANG::i18n('_chg_pwd'), 'link'=>'?action=show_chg_pwd'.$this->session_url());
		
		if ($this->allow_char_mod())
			$modules[] = array('name'=>LANG::i18n('_accounts_services'), 'link'=>'?action=acc_serv'.$this->session_url());
		
		if (ACCOUNT::load()->can_chg_email())
			$modules[] = array('name'=>LANG::i18n('_chg_email'), 'link'=>'?action=show_chg_email'.$this->session_url());
		
		$modules[] = array('name'=>LANG::i18n('_logout_link'), 'link'=>'?action=loggout'.$this->session_url());
		
		SmartyObject::getInstance()->assign('modules', $modules);
		
		SmartyObject::getInstance()->register_block('dynamic', 'smarty_block_dynamic', false);
		SmartyObject::getInstance()->setTemplate('account.tpl');
	}

	public function registration() {
	global $mybb, $db, $cache, $plugins, $lang, $config;
		$LCoins= 0;//(empty($_POST['Lc']))? 0:intval($POST['Lc']);
		// $Mreg=(empty($_POST['Mreg'])||$_SERVER['HTTP_REFERER']!="http://minekkit.com/lreg.php")? 1359932400:$_POST['Mreg'];
		// settype($Mreg, "integer");
		////$daysML= intval(((time()/60)/60)/24)-intval((($Mreg/60) / 60) / 24); 4/2/13 = 1359932400
		// $daysML = ((strtotime("4 February 2013")-$Mreg) / 3600 )/ 24;
		// $daysML = intval($daysML);
		// switch (true){
		// case ($daysML >=75):
		// $LCoins=40;
		// break;
		// case ($daysML >=50):
		// $LCoins=20;
		// break;
		// case ($daysML >=30):
		// $LCoins=10;
		// break;
		// case ($daysML >=15):
		// $LCoins=5;
		// break;
		// default:
		// $LCoins=0;
		// break;
		// }
		
		//mybb integration
		// echo 'ok1';
		// define('IN_MYBB', NULL);
		////chdir('../');
		// require_once 'foro/global.php';
		// echo 'ok12';
		// require_once 'foro/MyBBIntegrator.php';
		// require_once "foro/inc/datahandlers/user.php";
		// echo 'ok13';
		//chdir('acm/');
		// print_r($mybb);
		// print_r($db);
        if(isset($_POST['Fuser'])){
    		$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config);
    		$infoUser	= array(
    			'username', 'password', 'password2', 'email', 'email2', 'referrer', 'timezone', 'language',
    			'profile_fields', 'allownotices', 'hideemail', 'subscriptionmethod', 
    			'receivepms', 'pmnotice', 'emailpmnotify', 'invisible', 'dstcorrection'
    		);
    		
    		$infoUser['username']=$_POST['Fuser'];
    		$infoUser['password']=$_POST['Lpwd'];
    		$infoUser['password2']=$_POST['Lpwd2'];
    		$infoUser['email']=$_POST['Lemail'];
    		$infoUser['email2']=$_POST['Lemail'];
    		$infoUser['referrer']=0;
    		$infoUser['timezone']=-3;
    		$infoUser['language']='espanol';
    		$infoUser['profile_fields']['fid3']='Desconocido';
    		$infoUser['profile_fields']['fid1']='Desconocido';
    		$infoUser['allownotices']=1;
    		$infoUser['hideemail']=0;
    		$infoUser['subscriptionmethod']=0;
    		$infoUser['receivepms']=1;
    		$infoUser['pmnotice']=2;
    		$infoUser['emailpmnotify']=0;
    		$infoUser['invisible']=0;
    		$infoUser['dstcorrection']=2;
    		
    
    		
    		$userhandler = new UserDataHandler("insert");
    		
    		$userhandler->set_data($infoUser);
    		
    		if(!$userhandler->validate_user())
    		{
    			
    			$errors = $userhandler->get_friendly_errors();
    			print_r($errors);
    			MSG::add_error(LANG::i18n('_REGISTER_ERROR'));
    			$this->show_create(true);
    			
    			//die('El Nombre de Usuario del foro ya esta utilizado.');	
    		}
    		else if(ACCOUNT::load()->create($_POST['Luser'], $_POST['Lpwd'], $_POST['Lpwd2'], $_POST['Lemail'], @$_POST['Limage'], $LCoins,$_POST['Fuser'])) 
    		{
    		
    			//exito
    			$MyBBI->register($infoUser);
    			$this->show_login();
    		}else
    		{
    		
    			$this->show_create(true);
    		}
        }else{
            if(ACCOUNT::load()->create($_POST['Luser'], $_POST['Lpwd'], $_POST['Lpwd2'], $_POST['Lemail'], @$_POST['Limage'], $LCoins,'')) 
    		{
    			//exito
    			$this->show_login();
    		}else
    		{
    			$this->show_create(true);
    		}
        }
	}

	public function show_ack(){
		SmartyObject::getInstance()->assign('vm', array(
		    'terms_and_condition'		=> LANG::i18n('_TERMS_AND_CONDITION'),
		    'return'					=> LANG::i18n('_return'),
		    'accept_button'				=> LANG::i18n('_accept_button')
		));
		SmartyObject::getInstance()->setTemplate('ack.tpl');
	}

	public function show_create($acka = false) {

		$ack = (@$_POST['ack'] == 'ack') ? true : false;
		$ack = ($acka) ? true : $ack;

		if(CONFIG::g()->core_ack_cond && !$ack) {
			$this->show_ack();
			return false;
		}
		
		SmartyObject::getInstance()->assign('vm', array(
		    'new_account'			=> LANG::i18n('_new_account'),
		    'new_account_text'		=> LANG::i18n('_new_account_text2'),
		    'account_length'		=> CONFIG::g()->core_id_limit,
		    'password_length'		=> CONFIG::g()->core_pwd_limit,
		    'account'				=> LANG::i18n('_account'),
		    'password'				=> LANG::i18n('_password'),
		    'password2'				=> LANG::i18n('_password2'),
		    'email'					=> LANG::i18n('_email'),
		    'image_control_desc'	=> LANG::i18n('_image_control_desc'),
		    'return'				=> LANG::i18n('_return'),
		    'create_button'			=> LANG::i18n('_create_button'),
		    'post_id'				=> @$_POST['Luser'],
		    'post_email'			=> @$_POST['Lemail']
		));
		if(CONFIG::g()->core_act_img) {
			SmartyObject::getInstance()->assign('image', 'image');
		}
		SmartyObject::getInstance()->setTemplate('create.tpl');
	}

	public function show_forget() {
		SmartyObject::getInstance()->assign('vm', array(
		    'forgot_pwd'			=> LANG::i18n('_forgot_pwd'),
		    'forgot_pwd_text'		=> LANG::i18n('_forgot_pwd_text'),
		    'account_length'		=> CONFIG::g()->core_id_limit,
		    'account'				=> LANG::i18n('_account'),
		    'email'					=> LANG::i18n('_email'),
		    'image_control_desc'	=> LANG::i18n('_image_control_desc'),
		    'return'				=> LANG::i18n('_return'),
		    'forgot_button'			=> LANG::i18n('_forgot_button'),
		    'post_id'				=> @$_POST['Luser'],
		    'post_email'			=> @$_POST['Lemail']
		));
		if(CONFIG::g()->core_act_img) {
			SmartyObject::getInstance()->assign('image', 'images');
		}
		SmartyObject::getInstance()->setTemplate('forgot_pwd.tpl');
	}

	public function forgot_pwd() {

		if(ACCOUNT::load()->forgot_pwd($_POST['Luser'], $_POST['Lemail'], @$_POST['Limage'])) {
			MSG::add_valid(LANG::i18n('_password_request'));
			$this->index();
		}else{
			$this->show_forget();
		}

		return true;
	}

	public function forgot_pwd_email() {

		if(ACCOUNT::load()->forgot_pwd2($_GET['login'], $_GET['key'])) {
			MSG::add_valid(LANG::i18n('_password_reseted'));
			$this->index();
		}else{
			MSG::add_error(LANG::i18n('_control'));
			$this->show_forget();
		}

		return true;
	}

	public function chg_pwd_form() {

		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}

		$account = unserialize($_SESSION['acm']);

		if(ACCOUNT::load()->edit_password($_POST['Lpwdold'], $_POST['Lpwd'], $_POST['Lpwd2'])) {
			MSG::add_valid(LANG::i18n('_change_pwd_valid'));
			$this->show_account();
		}
		else
		{
			$this->show_chg_pwd();
		}
	}

	public function show_chg_pwd() {
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}

		SmartyObject::getInstance()->assign('vm', array(
		    'chg_pwd'				=> LANG::i18n('_chg_pwd'),
		    'chg_pwd_text'			=> LANG::i18n('_chg_pwd_text'),
		    'password_length'		=> CONFIG::g()->core_pwd_limit,
		    'passwordold'			=> LANG::i18n('_passwordold'),
		    'password'				=> LANG::i18n('_password'),
		    'password2'				=> LANG::i18n('_password2'),
		    'return'				=> LANG::i18n('_return'),
		    'chg_button'			=> LANG::i18n('_chg_button')
		));
		
		SmartyObject::getInstance()->setTemplate('chg_pwd.tpl');
	}

	public function chg_email_form() {

		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}

		if(!ACCOUNT::load()->can_chg_email()) {
			$this->index();
			return;
		}

		if(ACCOUNT::load()->edit_email($_POST['Lpwd'], $_POST['Lemail'], $_POST['Lemail2'])) {
			MSG::add_valid(LANG::i18n('_change_email_valid'));
			$this->show_account();
		}
		else
		{
			$this->show_chg_email();
		}
	}

	public function show_chg_email() {
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}

		if(!ACCOUNT::load()->can_chg_email()) {
			$this->index();
			return;
		}
		
		SmartyObject::getInstance()->assign('vm', array(
		    'chg_pwd'				=> LANG::i18n('_chg_email'),
		    'chg_pwd_text'			=> LANG::i18n('_chg_email_text'),
		    'password_length'		=> CONFIG::g()->core_pwd_limit,
		    'password'				=> LANG::i18n('_password'),
		    'email'					=> LANG::i18n('_email'),
		    'email2'				=> LANG::i18n('_email2'),
		    'return'				=> LANG::i18n('_return'),
		    'chg_button'			=> LANG::i18n('_chg_button')
		));
		
		SmartyObject::getInstance()->setTemplate('chg_email.tpl');

	}

	public function email_validation() {

		if(ACCOUNT::load()->email_validation($_GET['login'], $_GET['key'])) {
			MSG::add_valid(LANG::i18n('_change_email_valid'));
		}else{
			MSG::add_error(LANG::i18n('_control'));
		}
		
		$this->index();

		return true;
	}
	
	public function acc_serv(){
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}
		
		if(!$this->allow_char_mod()) {
			MSG::add_error(LANG::i18n('_acc_serv_off'));
			$this->index();
			return;
		}
		
		SmartyObject::getInstance()->assign('vm', array(
			'select_item'			=> LANG::i18n('_accounts_services'),
			'return'				=> LANG::i18n('_return'),
		));
		
		$items = array();
		
		if(CONFIG::g()->service_fix)
			$items[] = array('id' => 0, 'name' => LANG::i18n('_character_fix'), 'link' => '?action=char_fix_l'.$this->session_url());
		
		if(CONFIG::g()->service_unstuck)
			$items[] = array('id' => 1, 'name' => LANG::i18n('_character_unstuck'), 'link' => '?action=char_unstuck_l'.$this->session_url());
		
		if(CONFIG::g()->service_sex)
			$items[] = array('id' => 1, 'name' => LANG::i18n('_character_sex'), 'link' => '?action=char_sex_l'.$this->session_url());
		
		if(CONFIG::g()->service_name)
			$items[] = array('id' => 1, 'name' => LANG::i18n('_character_name'), 'link' => '?action=char_name_l'.$this->session_url());
		
		//Code by fede
		$items[] = array('id' => 4, 'name' => LANG::i18n('_change_coins'), 'link' =>"../actionsLC.php?id=1");
		$items[] = array('id' => 5, 'name' => LANG::i18n('_character_name'),'link' => "../actionsLC.php?id=2");
		$items[] = array('id' => 6, 'name' => LANG::i18n('_character_sex'), 'link' =>"../actionsLC.php?id=3");
		
		//end
		SmartyObject::getInstance()->assign('items', $items);
		
		SmartyObject::getInstance()->register_block('dynamic', 'smarty_block_dynamic', false);
		
		SmartyObject::getInstance()->setTemplate('select.tpl');
	}
	
	private function char_ufl($mod = null){
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}
		
		if(is_null($mod)) {$this->index(); return;} // shouldn't happend
		
		$mode = 'service_'.$mod;
		
		if(!$this->allow_char_mod() || !CONFIG::g()->$mode) {
			MSG::add_error(LANG::i18n('_acc_serv_off'));
			$this->index();
			return;
		}
		
		unset($worlds);
		$worlds = WORLD::load_worlds(); // charging world
		
		SmartyObject::getInstance()->assign('vm', array(
			'select_item'			=> LANG::i18n('_character_'.$mod),
			'select_desc'			=> LANG::i18n('_character_'.$mod.'_desc'),
		    'return'				=> LANG::i18n('_return')
		));
		
		$items = array();
		
		foreach  ($worlds as $world) {
			foreach  ($world->get_chars() as $char) {
				$items[] = array('id' => $world->get_id(), 'name' => $world->get_name() . ' : ' .$char->getName(), 'link' => '?action=char_'.$mod.'&wid='.$world->get_id().'&cid='.$char->getId().$this->session_url());
			}
		}
		
		if(empty($items))
			$items[] = array('id' => 0, 'name' => LANG::i18n('_any_character'), 'link' => '?action=acc_serv'.$this->session_url());
		
		SmartyObject::getInstance()->assign('items', $items);
		
		SmartyObject::getInstance()->register_block('dynamic', 'smarty_block_dynamic', false);
		
		SmartyObject::getInstance()->setTemplate('select.tpl');
	}
	
	public function char_unstuck_l() {
		$this->char_ufl('unstuck');
	}
	
	public function char_fix_l() {
		$this->char_ufl('fix');
	}
	
	public function char_sex_l() {
		$this->char_ufl('sex');
	}
	
	public function char_name_l() {
		$this->char_ufl('name');
	}
	
	private function char_uf($mod = null) {
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}
		
		if(is_null($mod)) {$this->index(); return;}

		$mode = 'service_'.$mod;
		
		if(!$this->allow_char_mod() || !CONFIG::g()->$mode) {
			MSG::add_error(LANG::i18n('_acc_serv_off'));
			$this->index();
			return;
		}
		
		if(empty($_GET['wid']) || empty($_GET['cid'])) {
			MSG::add_error(LANG::i18n('_error_select_char'));
			$this->index();
			return;
		}
		
		$char = new character($_GET['cid'], $_GET['wid']);
		
		if(is_null($char->getId())) {
			MSG::add_error(LANG::i18n('_error_select_char'));
			$this->index();
			return;
		}
		
		SmartyObject::getInstance()->assign('vm', array(
			'select_item'	=> LANG::i18n('_character_'.$mod),
			'select_desc'	=> sprintf(LANG::i18n('_character_'.$mod.'_confirm'), $char->getName(), world::get_name_world($char->getWorldId()), LANG::i18n('_character_sex_'.$char->getGender()), LANG::i18n('_character_sex_'.((int)(!$char->getGender())))),
		    'return'		=> LANG::i18n('_return')
		));
		
		$items = array();
		$items[] = array('id' => 1, 'name' => LANG::i18n('_confirm'), 'link' => '?action=char_'.$mod.'_confirm&wid='.$char->getWorldId().'&cid='.$char->getId().$this->session_url());
		$items[] = array('id' => 1, 'name' => LANG::i18n('_back'), 'link' => '?action=char_'.$mod.'_l'.$this->session_url());
		SmartyObject::getInstance()->assign('items', $items);
		
		SmartyObject::getInstance()->register_block('dynamic', 'smarty_block_dynamic', false);
		SmartyObject::getInstance()->setTemplate('select.tpl');
	}
	
	public function char_unstuck() {
		$this->char_uf('unstuck');
	}
	
	public function char_fix() {
		$this->char_uf('fix');
	}
	
	public function char_sex() {
		$this->char_uf('sex');
	}
	
	public function char_name() {
		$this->char_uf('name');
	}

	private function char_ufc($mod = null) {
		
		if(!ACCOUNT::load()->verif()) {
			MSG::add_error(LANG::i18n('_WARN_NOT_LOGGED'));
			$this->index();
			return;
		}
		
		if(is_null($mod)) {$this->index(); return;}
		
		$mode = 'service_'.$mod;
		
		if(!$this->allow_char_mod() || !CONFIG::g()->$mode) {
			MSG::add_error(LANG::i18n('_acc_serv_off'));
			$this->index();
			return;
		}
		
		if(empty($_GET['wid']) || empty($_GET['cid'])) {
			MSG::add_error(LANG::i18n('_error_select_char'));
			$this->index();
			return;
		}
		
		$char = new character($_GET['cid'], $_GET['wid']);

		if(!$char->$mod())
			MSG::add_error(LANG::i18n('_character_'.$mod.'_no'));
		else
			MSG::add_valid(LANG::i18n('_character_'.$mod.'_yes'));

		$this->index();

		return;
	}
	
	public function char_unstuck_confirm() {
		$this->char_ufc('unstuck');
	}
	
	public function char_fix_confirm() {
		$this->char_ufc('fix');
	}
	
	public function char_sex_confirm() {
		$this->char_ufc('sex');
	}
	
	public function char_name_confirm() {
		$this->char_ufc('name');
	}

	public function activation() {

		if(!ACCOUNT::load()->valid_account(htmlentities($_GET['key'])))
			MSG::add_error(LANG::i18n('_activation_control'));
		else
			MSG::add_valid(LANG::i18n('_account_actived'));

		$this->index();

		return;
	}
	
	private function allow_char_mod() {
		CONFIG::g()->cb('service_name', false);
	
		if(SID != '')					// SID by URL aren't safe we prohibit accounts services when we can't use cookies
			return false;
		
		if(!CONFIG::g()->service_allow)
			return false;
		
		if(!CONFIG::g()->service_fix && !CONFIG::g()->service_unstuck && !CONFIG::g()->service_name && !CONFIG::g()->service_sex)
			return false;
		
		return true;
	}
	
	private function session_url() {
		if(SID != '')
			return '&'.(SID);
		
		return '';
	}

	private function secure_post() {

		if (!$_POST) return;

		foreach($_POST as $key => $value) {
			if ($key == 'Luser')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_id_limit);

			if ($key == 'Lpwd')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_pwd_limit);

			if ($key == 'Lpwd2')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_pwd_limit);

			if ($key == 'Lpwdold')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_pwd_limit);

			if ($key == 'Lemail')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_email_limit);

			if ($key == 'Lemail2')
				$_POST[$key] = substr($value, 0, CONFIG::g()->core_email_limit);

			if ($key == 'Limage')
				$_POST[$key] = substr($value, 0, 5);

			if ($key == 'key')
				$_GET[$key] = substr($value, 0, 10);

			if (!($key == 'wid' && is_int($value)))
				$_GET[$key] = NULL;

			if (!($key == 'cid' && is_int($value)))
				$_GET[$key] = NULL;
				
		}

		$_POST = array_map('htmlentities', $_POST);
		$_POST = array_map('htmlspecialchars', $_POST);
		
		return;
	}

	public function gen_img_cle($num = 5) {
		$key = '';
		$chaine = "ABCDEF123456789";
		for ($i=0;$i<$num;$i++) $key.= $chaine[rand()%strlen($chaine)];
		$_SESSION['code'] = $key;
	}
}
?>

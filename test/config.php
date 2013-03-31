<?

error_reporting(E_ERROR | E_WARNING);
$realms = array(
// "Realm name" => array(realmd_DB, characters_DB, remote_access, tabs)
    "WoW" => array(1, 1, 1, 1),    ###>>>-- �������� �������� � ���� ���� �������� � �������� ������ ���� ���� � ���� ��� �������� � ���� "wow"   
);

//����� ����� �����������          
$realmCur = "WoW";                 ###>>>>--�������� �������� � ���� ���� �������� � �������� ������ ���� ���� � ���� ��� �������� � ���� "wow"    
$realmd_DB = array(

// Connection to realmd DBs
    1 => array("localhost:3306", "trinity", "trinity", "auth"),
);
$characters_DB = array(

// Connection to characters DBs
    1 => array("localhost:3306", "trinity", "trinity", "characters"),
);
$remote_access = array(

// Connection to remote access
// array(server_remote_ip, remote_port, USERNAME, password)
// USERNAME must be upper case here and in DB
    1 => array("localhost", "3443", "trinity", "trinity"),
);
$tabs = array(

// Files containing sites and rewards for every realm (all must be placed in folder \tabs)
    1 => array("sites.php", "rewards.php"),
//2 => array("sites2.php", "rewards2.php"),
//3 => array("sites3.php", "rewards3.php"),
);

// ������ �������� �� ����: ���� �� ����� ����������!
$site_link = "http://192.168.0.101/";

// ?&#65533;�� �������
$server_name = "WoW-Cataclysm FUN";

// Max number of points that every account can get per day
// Default: -1 - number of vote sites
$max_acc_points_per_day = -9;

// IP voting period (in seconds)
$ip_voting_period = 60 * 60 * 24;

// Voting sites online check
$use_online_check = True;

// If you are using MaNGOS revision below 8886 change this to 1
$mangos_rev = 0;

// �������� ���������
// filename => array(language_form, tooltip, reward_text_language)
// tooltip - choices are "fr", "de", "es", "ru" (for "en" use www)
$langs = array(
    "Russian" => array("Russian", "www", 0),
);

// ����������� ����
$default_language = "Russian";

// Language cookie
$cookie_expire = time() + 60 * 60 * 24;

// ��������� ������� � �������
$bnsUnbanCount = 150;

//������ � ��������� � �������
$bns_uslugi = Array(
    "rename" => array("50"), //���������������
    "sex" => array("70"), //����� ����
    "race" => array("130"), //����� ����
    "face" => array("40"), //����� ���������
    "gold" => array("0"),
    "fun" => array("0"), //����
    "test" => array("0"), //�����
    "testa" => array("0"), //�����
    "testas" => array("0"), //�����
    "testass" => array("0"), //����� ���
    "testt" => array("0"), //��������� ������
    "testta" => array("0"), //���������� ������
    "testtf" => array("0"), //�������
    "testtd" => array("0"), //������ �������� ���
    "tes" => array("0"), //����
    "tesa" => array("0"), //��������
    "tesw" => array("0"), //���������
    "tesd" => array("0"), //����
    "tesl" => array("0"), //����
    "tesx" => array("0"), //��������
    "tesxs" => array("0"), //������
    "tesn" => array("0")      //������
);
////////////////������ � ��������� � ������////////////////
//������ � ��������� � ������
$gls_uslugi = Array(

    "gold" => array("0"),//����
 	"testta" => array("0"), //���������� ������
	"tesd" => array("0"), //����
    "testt" => array("0"), //��������� ������
	"tesw" => array("0"), //��������e
);
////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////
$realm_db = Array(
    'addr' => "localhost:3306", //SQL server IP:port this realmd located on
    'user' => "root", //SQL server login this realmd located on
    'pass' => "", //SQL server pass this realmd located on
    'name' => "auth", //Realmd DB name
);

$world_db = Array(
    "WoW Cataclysm FUN" => array(//��� ������
        "1", //Realm ID
        "root", //SQL server login this DB located on
        "", //SQL server pass this DB located on
        "localhost:3306", //SQL server IP:port this DB located on
        "world", //World Database name
        "localhost:8085"       //����� � ���� ����
    ),
       /*  "--" => array(		        //���  ������
          "2",					          //Realm ID
          "root",			            //SQL server login this DB located on
          "",			          //SQL server pass this DB located on
          "localhost:3306",	      //SQL server IP:port this DB located on
          "",		         	//World Database name
          "localhost:8086" 	     	//����� � ���� ����
          ), */
);

$characters_db = Array(
    "WoW x100 " => array(//��� ������
        "1", //Realm ID
        "root", //SQL server login this DB located on
        "", //SQL server pass this DB located on
        "localhost:3306", //SQL server IP:port this DB located on
        "characters", //�haracters Database name
    ),
      /*     	"Wotlk" => array(		        //��� ������
          "2",				          	//Realm ID
          "trinity",		             	//SQL server login this DB located on
          "trinity",		          	//SQL server pass this DB located on
          "localhost:3306",     	//SQL server IP:port this DB located on
          "characters_fan",			        //�haracters Database name
          ), */
);
##################################################################################################
#########################����������� ��������� ���� � ������ �����################################
##################################################################################################
//��������� ����� ����, ���� ����.
$header_title = "WoW Cataclysm";   //���������
$header_description = "C����� World of Warcraft.";  //��������
$header_keywords = "������ ��� wow, world of warcraft pvp ������, world warcraft, lich king, burning crusade, fun server";   //�������� �����
//��������� ������ � ���� �����
$site_name = "WoW Cataclysm";          // ��� �����
$site_url = "http://192.168.0.101/index.php";   // ����� ����� ������� ���� ip ��� �����
$forum_url = "../forum/";  // ����� ������
$register_url = "../reg.php";  // ����� �������� �����������
$cp_url = "";     // ����� ������
$cp_ur2 = "http://192.168.0.101/lk/";     // ����� ������  ������� ���� ip ��� �����
$terms_url = "";  // ����� �������� "��������� � ��������������".
$rules_url = "../pravila.php";  // ����� �������� "������� �������".
####################################################################################################


//��������� ���������� ���������� ��������
$news_count = 1;
///////////////////////////////
// ����� ������
$cp_template = "cataklizm";        // imperial , lich , cataklizm


$wowhead = true;                       //���������� �������� ����� wowhead.com ��������� ����.
$wowheadjs = '<script src="http://ru.wowhead.com/widgets/power.js" language="JavaScript"></script>';  //������ ������������ ��� �����������
$wowheadlink = "http://ru.wowhead.com/?item=";  //������ �� �������
//////////////////////////////////

$core_ver = "4.0.6a"; //������ ����� �������, ��������������  2.4.3, 3.0.9 ,3.1.3 ,3.3.5a
//����� "��������� ��������������" , "����������� ������"
$admin_name = "";
$admin_email = "";

//��������� ��������������
$email_body_sendmail = '<p>��������� �������������� �� [USERNAME]</p>
<p>[MESSAGE]</p>
<p>��������� c IP-������: [REMOTE_ADDR]</p>
<p>[SITE_URL]</p>';

//����������� ������, ������ ������
$email_subject_sendpass = "����������� ������"; //���� ������
//���� ������
$email_body_sendpass = '<p>�����������,  [USERNAME]</p>
<p>[DATE] �� ����������� ������ � ������ �������� c IP-������: [REMOTE_ADDR]</p>
<p>���� �� �� ������ ������ �������, ������ �������������� ������ ������.</p>
<p><h2>������ �������� ��� �����������!</h2></p> 
<p>��� ����� ������ �����:  [USERPASS]</p>
<p>��� ������������� ������ ������ �� ������</p>
<p>������ �� [������ ��������� ������ ������] ������� ��������� � ����� ������. </p> 
<p>���� ��� �������� ����� �� ��������� ����������� ������.</p>  
<p>����� ������� �� ������ ����� � ������ ������� </p> 
<p>� ������ ���� �����: <B> [USERNAME]</B></p>
<p>� ���� ����� ������: <B> [USERPASS]</B></p>  
<p><B>������ ��������� ������ ������.</B>  ' . $cp_ur2 . '?s=send&code=[USERCODE]</p>
<p>� ������ �� ������� �� ���� ���� �������. � �� ��������� ������ :) </p>
<p>� ���������, ������������� ������� - [SITE_URL]</p>';
///////////////////////////////////////
//����������� �������� � ������
$cp_register = true; //����������� � ������
$expansion = 2;  // ������� ���������� �� ��������� � ����������� 0=> WOW 1=> TBC 2=> Wotlk
///////////////////////////////////////
//����������� ����������
$repair_aurs_clean = true;  //������ ��� ���� � ���������
$repair_groups_clean = true;  // ������ ������ � ���������
$repair_instance_clean = true;    // ������ ��������, ���������� ����� ��������� ���� ������
$repair_add_sicknes = true; //��������� �����(�������) 10 �����
$repair_tele_home = true;    //������������� � ���������
/////////////////////////////

//������  "�������������� ���������" (����)
$notuse_month = 12;  // ����� � �������, ����� ������� �������� �������� � ������  "�������������� ���������"
$notuse_after = 10;  // ������� ����� �������� �������� �������� � ������  "�������������� ���������"
$notuse_rate = Array(
    "10" => "2", //���� �� ���� ��� ���������, ������������� �� ������, ��� ������� ��������� ������ ���� ����
    "20" => "2",
    "30" => "2",
    "40" => "2",
    "50" => "3",
    "60" => "4",
    "70" => "4.28",
    "80" => "6",
);
//////////////////////////////
//���� ��������� ����� �� ������, � ������ ���������� ����� ������ � ���� ��� ����, ���� ������� ������ ��������� �� � ����� (������ ��� ������ "�������� ������")
$SendGoldPerRealmRate = array("1" => 1/* ,"2" =>1 */);
//�������� �� 2 �������
$CharactersTwoSide = true;
//����������� ���������� ���������� �� �������
$CharactersPerAccount = 10;
//id ��������� �� �������� ����� ��������� ����� � ��������� ������� ��� ������� (������ "������� ������", "������� �����")
$mailsender = 6;


//������� �������������, ������� ����� ������� �� ������ ���������
$billing = array(
    "webmoney", //�������� ������
    "yandex"    //������ ������ (������ ������������ � ������)
);
///////////////////////
//sms_loc  ������ ��� ���  � �������, ���� ������� � ������� ������ �� ������� �� � ������ ����� �������
$sms_loc = Array(
    "1151" => array(//�����
        "0.99", //��������� �� ��� � $
        "130"), //���������� ������� �� ������ ���
);
$sms_prefix_loc = "#awow";
////////////////////////////////
//Webmoney
//��������� ���� ��� �������� ���������� (������ ��� ������ Webmoney)
$secret_key = "wow_kras";

$purse = array(
// ���� �������� � �������.
    "wmz" => array("1", "Zpassword", "0.01")/* ,   //�� ��������� 1 ������ �� �� ����� ��������� (������ ��� ������ Webmoney)
          "wmr" => array("2", "Rpassword", "0.25"),
          "wme" => array("3", "Epassword", "0.02") */
);
/////////////////////////////////
//Yandex ������ �������� �� �������� �������� � ������
$yandex_exchange = 1;  //���� ������ �� ��������� 5 ������� �� 1 RUR
$yandex_payment = "41001623659186"; //����� ����� �� ������� ����� ��������� �������������
/////////////////////////////////
?>
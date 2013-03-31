<?

error_reporting(E_ERROR | E_WARNING);
$realms = array(
// "Realm name" => array(realmd_DB, characters_DB, remote_access, tabs)
    "WoW" => array(1, 1, 1, 1),    ###>>>-- Обратите внимание в этих двух строчках в ковычках должно быть одно и тоже как например у меня "wow"   
);

//Какой реалм действующий          
$realmCur = "WoW";                 ###>>>>--Обратите внимание в этих двух строчках в ковычках должно быть одно и тоже как например у меня "wow"    
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

// Кнопка возврата на сайт: слеш на конце обязателен!
$site_link = "http://192.168.0.101/";

// ?&#65533;мя сервера
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

// Языковые настройки
// filename => array(language_form, tooltip, reward_text_language)
// tooltip - choices are "fr", "de", "es", "ru" (for "en" use www)
$langs = array(
    "Russian" => array("Russian", "www", 0),
);

// Стандартный язык
$default_language = "Russian";

// Language cookie
$cookie_expire = time() + 60 * 60 * 24;

// Стоимость разбана в бонусах
$bnsUnbanCount = 150;

//Услуги и стоимость в бонусах
$bns_uslugi = Array(
    "rename" => array("50"), //Переименоваание
    "sex" => array("70"), //Смена пола
    "race" => array("130"), //Смена расы
    "face" => array("40"), //Смена внешности
    "gold" => array("0"),
    "fun" => array("0"), //Шлем
    "test" => array("0"), //Грудь
    "testa" => array("0"), //Плечи
    "testas" => array("0"), //Штаны
    "testass" => array("0"), //Кисти рук
    "testt" => array("0"), //Двуручное оружие
    "testta" => array("0"), //Одноручное оружие
    "testtf" => array("0"), //Кинжалы
    "testtd" => array("0"), //Оружие дальнего боя
    "tes" => array("0"), //Щиты
    "tesa" => array("0"), //Реликвии
    "tesw" => array("0"), //Украшения
    "tesd" => array("0"), //Плащ
    "tesl" => array("0"), //Пояс
    "tesx" => array("0"), //Запястья
    "tesxs" => array("0"), //Ступни
    "tesn" => array("0")      //Маунты
);
////////////////Услуги и стоимость в голоса////////////////
//Услуги и стоимость в голоса
$gls_uslugi = Array(

    "gold" => array("0"),//голд
 	"testta" => array("0"), //Одноручное оружие
	"tesd" => array("0"), //Плащ
    "testt" => array("0"), //Двуручное оружие
	"tesw" => array("0"), //Украшениe
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
    "WoW Cataclysm FUN" => array(//Имя реалма
        "1", //Realm ID
        "root", //SQL server login this DB located on
        "", //SQL server pass this DB located on
        "localhost:3306", //SQL server IP:port this DB located on
        "world", //World Database name
        "localhost:8085"       //Адрес и порт мира
    ),
       /*  "--" => array(		        //Имя  реалма
          "2",					          //Realm ID
          "root",			            //SQL server login this DB located on
          "",			          //SQL server pass this DB located on
          "localhost:3306",	      //SQL server IP:port this DB located on
          "",		         	//World Database name
          "localhost:8086" 	     	//Адрес и порт мира
          ), */
);

$characters_db = Array(
    "WoW x100 " => array(//Имя реалма
        "1", //Realm ID
        "root", //SQL server login this DB located on
        "", //SQL server pass this DB located on
        "localhost:3306", //SQL server IP:port this DB located on
        "characters", //Сharacters Database name
    ),
      /*     	"Wotlk" => array(		        //Имя реалма
          "2",				          	//Realm ID
          "trinity",		             	//SQL server login this DB located on
          "trinity",		          	//SQL server pass this DB located on
          "localhost:3306",     	//SQL server IP:port this DB located on
          "characters_fan",			        //Сharacters Database name
          ), */
);
##################################################################################################
#########################Внимательно исправьте путь к вашему сайту################################
##################################################################################################
//Настройка шапки хтмл, мета теги.
$header_title = "WoW Cataclysm";   //назвыание
$header_description = "Cервер World of Warcraft.";  //описание
$header_keywords = "сервер для wow, world of warcraft pvp сервер, world warcraft, lich king, burning crusade, fun server";   //ключевые слова
//Настройка ссылок в меню входа
$site_name = "WoW Cataclysm";          // имя сайта
$site_url = "http://192.168.0.101/index.php";   // адрес сайта впишите свой ip или адрес
$forum_url = "../forum/";  // адрес форума
$register_url = "../reg.php";  // адрес страницы регистрации
$cp_url = "";     // адрес панели
$cp_ur2 = "http://192.168.0.101/lk/";     // адрес панели  впишите свой ip или адрес
$terms_url = "";  // адрес страницы "условиями о пожертвованиях".
$rules_url = "../pravila.php";  // адрес страницы "Правила сервера".
####################################################################################################


//Настройка количества выводимыхэ новостей
$news_count = 1;
///////////////////////////////
// Стиль панели
$cp_template = "cataklizm";        // imperial , lich , cataklizm


$wowhead = true;                       //отображать придметы через wowhead.com требуется инет.
$wowheadjs = '<script src="http://ru.wowhead.com/widgets/power.js" language="JavaScript"></script>';  //скрипт подключаемый для отображения
$wowheadlink = "http://ru.wowhead.com/?item=";  //ссылка на предмет
//////////////////////////////////

$core_ver = "4.0.6a"; //версия патча сервера, поддержевается  2.4.3, 3.0.9 ,3.1.3 ,3.3.5a
//Почта "Сообщение Администратору" , "Напоминание пароля"
$admin_name = "";
$admin_email = "";

//Сообщение Администратору
$email_body_sendmail = '<p>Сообщение Администратору от [USERNAME]</p>
<p>[MESSAGE]</p>
<p>Сообщение c IP-адреса: [REMOTE_ADDR]</p>
<p>[SITE_URL]</p>';

//Напоминание пароля, шаблон письма
$email_subject_sendpass = "Напоминание пароля"; //тема письма
//тело письма
$email_body_sendpass = '<p>Здраствуйте,  [USERNAME]</p>
<p>[DATE] Вы запрашевали пароль к вашему аккаунту c IP-адреса: [REMOTE_ADDR]</p>
<p>Если Вы не делали такого запроса, просто проигнорируйте данное письмо.</p>
<p><h2>Дальше прочтите все внимательно!</h2></p> 
<p>Ваш новый пароль будет:  [USERPASS]</p>
<p>Для подтверждения нового пароля вы должны</p>
<p>Пройти по [ссылке активации нового пароля] которая находится в конце письма. </p> 
<p>Анна вас приведет назад на страничку напоминания пароля.</p>  
<p>Патом нажмите на кнопку «Вход в личный кабинет» </p> 
<p>И ведите свой логин: <B> [USERNAME]</B></p>
<p>И свой новый пароль: <B> [USERPASS]</B></p>  
<p><B>Ссылка активации нового пароля.</B>  ' . $cp_ur2 . '?s=send&code=[USERCODE]</p>
<p>И больше не давайте не кому свой аккаунт. И не забывайте пароль :) </p>
<p>С уважением, Администрация сервера - [SITE_URL]</p>';
///////////////////////////////////////
//Регистрация аккаунта в панели
$cp_register = true; //Регистрация в панели
$expansion = 2;  // Игровое дополнение по умолчанию в регистрации 0=> WOW 1=> TBC 2=> Wotlk
///////////////////////////////////////
//Исправление персонажей
$repair_aurs_clean = true;  //чистим все ауры у персонажа
$repair_groups_clean = true;  // Чистим группы у персонажа
$repair_instance_clean = true;    // Чистим инстансы, произойдет сброс счётчиков всех инстов
$repair_add_sicknes = true; //Добавляем штраф(болезнь) 10 минут
$repair_tele_home = true;    //Телепортируем в гостиницу
/////////////////////////////

//Услуга  "Неиспользуемые персонажи" (тест)
$notuse_month = 12;  // Время в месяцах, после которго персонаж попадает в услугу  "Неиспользуемые персонажи"
$notuse_after = 10;  // Уровень после которого персонаж попадает в услугу  "Неиспользуемые персонажи"
$notuse_rate = Array(
    "10" => "2", //Рейт на цену для персонажа, расчитывается по уровню, для каждого диапазона уровня своя цена
    "20" => "2",
    "30" => "2",
    "40" => "2",
    "50" => "3",
    "60" => "4",
    "70" => "4.28",
    "80" => "6",
);
//////////////////////////////
//Рейт получения голда за бонусы, в масиве содержится номер реалма и рейт для него, если реалмов больше дополните их в масив (только для услуги "Получить золото")
$SendGoldPerRealmRate = array("1" => 1/* ,"2" =>1 */);
//акккаунт на 2 фракции
$CharactersTwoSide = true;
//Максимально количество персонажей на аккаунт
$CharactersPerAccount = 10;
//id персонажа от которого будут приходить почта с купленным товаром для игроков (услуги "Покупка маунта", "Покупка сумок")
$mailsender = 6;


//платежи пожертвование, укажите какие платежи вы будите принимать
$billing = array(
    "webmoney", //Вебмоней сервис
    "yandex"    //Яндекс деньги (Оплата производится в ручную)
);
///////////////////////
//sms_loc  тарифы для смс  в массиве, если номеров и тарифов больше то введите их в массив через запятую
$sms_loc = Array(
    "1151" => array(//номер
        "0.99", //стоимость за смс в $
        "130"), //количество бонусов за данное смс
);
$sms_prefix_loc = "#awow";
////////////////////////////////
//Webmoney
//Секретный ключ для проверки транзакции (только для оплаты Webmoney)
$secret_key = "wow_kras";

$purse = array(
// Ваши кошельки в массиве.
    "wmz" => array("1", "Zpassword", "0.01")/* ,   //по умолчанию 1 кошелёк он же будет первичным (только для оплаты Webmoney)
          "wmr" => array("2", "Rpassword", "0.25"),
          "wme" => array("3", "Epassword", "0.02") */
);
/////////////////////////////////
//Yandex деньги операция по переводу проходит в ручную
$yandex_exchange = 1;  //курс обмены по умолчанию 5 бонусов за 1 RUR
$yandex_payment = "41001623659186"; //Номер счета на который будут приходить пожертвования
/////////////////////////////////
?>
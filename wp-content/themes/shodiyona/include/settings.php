<?php
global $includeFiles;
$includeFiles = array('js' => array(), 'css' => array());

global $currencyCode, $currencyList;
$currencyCode = 'uzs';
$currencyList = get_field('currency', 'option');
if(isset($_COOKIE['currencyCode'])) {
	$isExist = false;
	foreach($currencyList as $key => $val) {
		if($_COOKIE['currencyCode'] == $key) {
			$isExist = true;
			break;
		}
	}
	if($isExist) {
		$currencyCode = $_COOKIE['currencyCode'];
	} else {
		unset($_COOKIE['currencyCode']);
		setcookie('currencyCode', null, -1);
	}
}

if(!isset($_COOKIE['currencyCode'])) {
	setcookie("currencyCode", $currencyCode, time()+(60*60*24*30), '/');
}

global $currentUrl;
$currentUrl = site_url() . $_SERVER['REQUEST_URI'];

global $customPostTypes;
$customPostTypes = array(
	'auto' => array('title' => 'Auto'),
	'beauty' => array('title' => 'Beauty and health'),
	'organization' => array('title' => 'Organization of weddings'),
	'photo' => array('title' => 'Photo and Video'),
	'rent' => array('title' => 'Rent'),
	'rest' => array('title' => 'Recreation and entertainment'),
	'restaurant' => array('title' => 'Restaurants'),
	'shop' => array('title' => 'Trade shops'),
	'training' => array('title' => 'Training center')
);

global $countryList;
$countryList = array(
	'uzbekistan' => array(
		'andijan region' => array(
			'ahunbabayev' => array(),
			'andijan' => array(),
			'asaka' => array(),
			'khanabad' => array(),
			'khodjaabad' => array(),
			'khurgantepa' => array(),
			'paxtaabad' => array(),
			'paytug' => array(),
			'shakhrikhan' => array(),
		),
		'bukhara region' => array(
			'alat' => array(),
			'bukhara' => array(),
			'galaasiya' => array(),
			'gazli' => array(),
			'gijduvan' => array(),
			'kagan' => array(),
			'karakul' => array(),
			'romitan' => array(),
			'shafirkan' => array(),
			'vabkent' => array(),

		),
		'jizzakh region' => array(
			'dashtabad' => array(),
			'dostlik' => array(),
			'djisak' => array(),
			'gagarin' => array(),
			'galliyaaral' => array(),
			'mardjanbulak' => array(),
			'pakhtakar' => array(),
		),
		'karakapakhstan region' => array(
			'beruniy' => array(),
			'bustan' => array(),
			'chimbay' => array(),
			'khodjeyli' => array(),
			'kungrad' => array(),
			'mangid' => array(),
			'muynak' => array(),
			'nukus' => array(),
			'shumanay' => array(),
			'takhiatash' => array(),
			'turtkul' => array(),
		),
		'kashkaryo region' => array(
			'beshkent' => array(),
			'chiroqchi' => array(),
			'dekhkanabad' => array(),
			'guzar' => array(),
			'kamashi' => array(),
			'karshi' => array(),
			'kasan' => array(),
			'kasbi' => array(),
			'kitab' => array(),
			'mirishkor' => array(),
			'mubarek' => array(),
			'nishan' => array(),
			'shakhrisabz' => array(),
			'talimardjan' => array(),
			'yakkabag' => array(),

		),
		'navoiy region' => array(
			'kiziltepa' => array(),
			'navoiy' => array(),
			'nurata' => array(),
			'uchkuduk' => array(),
			'yangirabat' => array(),
			'zarafshan' => array(),
		),
		'namangan region' => array(
			'chartak' => array(),
			'chust' => array(),
			'khakulabad' => array(),
			'kasansay' => array(),
			'namangan' => array(),
			'pal' => array(),
			'turakurgan' => array(),
			'uchkurgan' => array(),
		),
		'samarkand region' => array(
			'aktash' => array(),
			'bulungur' => array(),
			'chilek' => array(),
			'djambay' => array(),
			'djuma' => array(),
			'ishlikhan' => array(),
			'kattakhurgan' => array(),
			'nurabad' => array(),
			'samarqand' => array(),
			'urgut' => array(),
			'ziadin' => array(),
		),
		'surkhandaryo region' => array(
			'baysun' => array(),
			'denay' => array(),
			'djarkurgan' => array(),
			'kizirik' => array(),
			'kumkurgan' => array(),
			'muzrabad' => array(),
			'shargun' => array(),
			'sherabad' => array(),
			'shurchi' => array(),
			'termez' => array(),

		),
		'fergana region' => array(
			'besharik' => array(),
			'fergana' => array(),
			'khamza' => array(),
			'kokand' => array(),
			'kuva' => array(),
			'kuvasay' => array(),
			'margilan' => array(),
			'rishtan' => array(),
		),
		'khorazm region' => array(
			'bagat' => array(),
			'Gurlen' => array(),
			'Khanka' => array(),
			'Khiva' => array(),
			'Pitnak' => array(),
			'Urgench' => array(),
		),
		'sirdaryo' => array(
			'baxt' => array(),
			'gulistan' => array(),
			'shirin' => array(),
			'sirdaryo' => array(),
			'yangiyer' => array(),
		),
		'tashkent region' => array(
			'ahangaran' => array(),
			'akkurgan' => array(),
			'almalik' => array(),
			'angren' => array(),
			'bekabad' => array(),
			'buka' => array(),
			'chinaz' => array(),
			'chirchiq' => array(),
			'dustabad' => array(),
			'eshonguzar' => array(),
			'gazalkent' => array(),
			'gulbahor' => array(),
			'keles' => array(),
			'kibray' => array(),
			'krasnagorsk' => array(),
			'parkent' => array(),
			'pskent' => array(),
			'toytepa' => array(),
			'yangibazar' => array(),
			'yangiyul' => array(),
			'zafar' => array(),
			'tashkent' => array(
				'bektemir',
				'chilanzar',
				'yashnabad',
				'mirobod',
				'mirzo ulugbek',
				'olmazar',
				'sergeli',
				'shaykhontohur',
				'uchtepa',
				'yakkasaray',
				'yunusabad'
			),
		)
	),
	'russian' => array()
);

global $filters;
$filters = array(
	'select_country',

	//restaurants
	'type_of_restaurant',
	'datetimeevent',
	'types_of_services',
	'number_of_people',
);
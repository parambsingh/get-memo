<?php

define('BANK_PASSWORD', '2DD4F9C5-22FC-4B5C-A6C7-860EB657F399');
define('RAIDA_PASSWORD', '5c4a9d7893e04');

function pr($a = []) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}




function getCloudCoin($optionsParam = []) {
	$defaultOptions = [
	  'name' => 'memos3.jpg',
	  'dn'=>1
	];

	extract(array_merge($defaultOptions, $optionsParam));


	$baseUrl = 'https://bank.cloudcoin.global/service/link.aspx';
	$baseUrl = 'https://bank.celebrium.com/service/link.aspx';
	echo $url = $baseUrl. '?pk='.BANK_PASSWORD.'&password='.RAIDA_PASSWORD.'&c_id='.$name.'&dn='.$dn;

	
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (!$resultFromAPI = curl_exec($ch)) {
        $resultFromAPI = curl_error($ch);
    }

    curl_close($ch);
    return $resultFromAPI;
}

try {

	//~ $name = 'amy.jpg';
	//~ $dn = 1;
//~ 
	//~ $cloudCoinJson = getCloudCoin(['name'=>$name,'dn'=>$dn]);
//~ 
	//~ pr($cloudCoinJson); die;


	$cloudCoinJson =  '{ 
    "cloudcoin": [
        {
            "nn": "1",
            "sn": "1373627",
            "an": [
                "1994167cd0b659ca07c68ca57778a6f7",
                "abd7b4d3b146531f6163a0f8c707d59c",
                "b2fbc0d3b7e8639ce5232ba10feaba9e",
                "3cd9a1bed08aab0b11eca0fd8385206f",
                "c3fc7bd685bb033b270cb10ba5c05da2",
                "dedf09839bf7426d69ca9f8495441986",
                "302f54200c559a0906f30e0cef81029c",
                "59c3f14c3ecdd2e7b66cea1f6c2cd113",
                "87ad0ddb471a44447f670bd9cbba9ff9",
                "e395e34aa092bd23a9e711a4cea691ae",
                "2907e892bb333bc800731791af572c4a",
                "d810038a5e411a9e311ba5033732d821",
                "d27f71c61975cfd9d9521de4cc22f39c",
                "0053f19ecf38b879e52f2ad8c5a17a57",
                "9f2e1b80b66cc69cdb230546dad56a32",
                "764c223a8e27e5378fab57be80ecdd62",
                "d78efbedb72f56baef4d6a55b2b86a4c",
                "f2e291c9a011ab231ef992e035c42eb5",
                "6a43aa3d4a05e2e0a3a07dfeb5addf1e",
                "69116a50557b63eb94bda5bea5c418dc",
                "e79110229d1b6f25477b67cbf2781fe0",
                "e977f9f81a1ac97fd30fe5d12ba45a14",
                "a09684cde274cb83580b0e0dbfe0d460",
                "4e839b53df570b321b75a3dcd54f1bff",
                "33bb19c8f5f02c0afc371c697650a090"
            ],
            "ed": "5-2020",
            "pown": "pnppppppppppppppppppppppp",
            "aoid": []
        }
    ]
}';

	$cloudCoin = json_decode($cloudCoinJson, true);

	$nameOnly = explode('.', $name);
	
	//e.g dn.CloudCoin.nn.sn.filename.jpg
	$fileName = $dn.'.CloudCoin.'.$cloudCoin['cloudcoin'][0]['nn']. '.'.$cloudCoin['cloudcoin'][0]['sn'].'.'.$nameOnly[0].'.stack'; 

	$file = fopen($fileName,'w+');
   	fwrite($file, json_encode($cloudCoin, JSON_PRETTY_PRINT));
   	fclose($file);

   	echo '<a href="download_cloudcoin.php?file='.$fileName.'" target="_blank">'.$fileName.'</a>';

	
} catch(Exception $e) {
		echo "Cloud Coin Error: ";
		pr($e);
}
die;
//~ 
//~ echo $result;

//~ echo '{	"cloudcoin": 	[		{ 		"nn":"1", 		"sn":"1195388", 		"an": ["38041671e09ea7dfa473631ee9eedc2b", "214c95da29d570d15cbbe0b08d27df07", "53907f2ff6285cd0ba4eb241fb55c854", "2dfebce62348bed33e7592045ab65db9", "9dbc2ad4654233074311118b965b2686",			"7aeaf11fc376a41dff816d5b80a0722c", "11c2fb0c4599555ce1a08d615b070401", "b4875f8d0fd0ecc4b47197d5c92644f8", "9de7928dc5a071e1e2160c2befbddcfa", "bc8e04b74b41a69d0c354de75c6eab24",			"76858d2d27e3a6c4f82c82a1d435b6a5", "7fef3451f6b9b217eb2771e895132282", "9a8bfa7efaa227892ccea9e382f8fbfc", "d4521b09b02a1eeb833a385f1ad9702f", "0bc4f6c20cd4c71ea4dc3042d74a6d2a",			"e910425d31190b756b6b7e71d73dfa97", "141f0d7c4f52c8b51c441a4fd1d10b4e", "153d86c978a9838b995f59b58d0e599c", "7f2d89ac671b78fc3a0a30954de86b1c", "c59cbd82d760db7eabe50e57771d2ad2",			"ded404c52f2a061b787f5183f6564f78", "f0632736db3e58a6bac77fad1bbd89c6", "163cc0abda2d239cd6ba1938887fc581", "44f6cc96de22487f2f77ee0bfc655bec", "94dcfb6ace6b0042dccc426da389689d"],		"ed":"4-2020",		"pown":"ppppppppppppppppppppppppp",		"aoid": []		}	] }';
?>


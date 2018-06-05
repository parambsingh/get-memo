<?php


define('BANK_PASSWORD', '2DD4F9C5-22FC-4B5C-A6C7-860EB657F399');
define('RAIDA_PASSWORD', '5c4a9d7893e04');

function pr($a = []) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}


function getTicket() {
	
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

	$cloudCoins = json_decode($cloudCoinJson, true);
	
	
	
	//foreach($cloudCoins['cloudcoin'][0]['an'] as $key => $an){




		"https://raida3.cloudcoin.global/service/get_ticket?nn=1&sn=1373627&toserver=3&an=3cd9a1bed08aab0b11eca0fd8385206f&pan=3cd9a1bed08aab0b11eca0fd8385206f&denomination=1";

		$sn = "1373627"; 

		 $baseUrl = "https://raida3.cloudcoin.global/service/get_ticket?nn=1&sn=".$sn."&toserver=3&an=".$cloudCoins['cloudcoin'][0]['an'][3]."&pan=".$cloudCoins['cloudcoin'][0]['an'][3]."&denomination=1";
		 //https://raida3.cloudcoin.global/service/get_ticket?nn=1&sn=1373635&an=CACC3A6CEA736E35A6644093B3D42AD0&pan=CACC3A6CEA736E35A6644093B3D42AD0&denomination=1
		 
		 $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $baseUrl);
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
		$arr = json_decode($resultFromAPI, true);
		
		pr($arr);
		
		getTemplate($sn, $arr['message']);
		
		return $resultFromAPI;
		 
	
//	}
	
	
	
    
}

function getTemplate($sn, $message) {
	
	
		 $baseUrl = "https://raida.tech/get_template.php?nn=1&sn=".$sn."&fromserver1=3&message1=".$message;
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $baseUrl);
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
		pr($resultFromAPI);
		
		return $resultFromAPI;
    
}

getTicket();

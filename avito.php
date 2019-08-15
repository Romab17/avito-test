<?php 
$FileStructure = file_get_contents("TestcaseStructure.json"); 
$SArr = json_decode($fileStructure,true);
$ValidateArr = json_decode($fileStructure,true); 
$fileValues = file_get_contents("Values.json"); 
$ValuesArr = json_decode($fileValues, true);
foreach ($ValuesArr["values"] as $vKey => $vVal){
	foreach ($SArr["params"] as $sKey => $sVal){
		if ($sVal["id"] == $vVal["id"]){
			$SArr["params"][$sKey]["value"] = $vVal["value"];
			if(isset($SArr["params"][$sKey]["values"])){
				foreach ($SArr["params"][$sKey]["values"] as $sdKey => $sdVal){
					if ($SArr["params"][$sKey]["values"][$sdKey]["id"] == $vVal["value"]){
						$SArr["params"][$sKey]["value"] = $SArr["params"][$sKey]["values"][$sdKey]["title"];
					}
				}
			}
		}
	}
}
foreach ($ValuesArr["values"] as $vKey => $vVal){
        foreach ($SArr["params"] as $sKey => $sVal){
                 if(isset($SArr["params"][$sKey]["values"])){
                        foreach ($SArr["params"][$sKey]["values"] as $sdKey => $sdVal){
                                if(isset($SArr["params"][$sKey]["values"][$sdKey]["params"])){
					foreach ($SArr["params"][$sKey]["values"][$sdKey]["params"] as $sddKey => $sddVal){
						if($vVal["id"] == $sddVal["id"]){
							$SArr["params"][$sKey]["values"][$sdKey]["params"][$sddKey]["value"] = $vVal["value"];
								if(isset($SArr["params"][$sKey]["values"][$sdKey]["params"][$sddKey]["values"])){
									foreach ($SArr["params"][$sKey]["values"][$sdKey]["params"][$sddKey]["values"] as $sdddKey => $sdddVal){
										if ($sdddVal["id"] == $vVal["value"]){
											$SArr["params"][$sKey]["values"][$sdKey]["params"][$sddKey]["value"] = $SArr["params"][$sKey]["values"][$sdKey]["params"][$sddKey]["values"][$sdddKey]["title"];
										}
									}
								}
						}
					}
                       		 }
                        }
                }
        }
}
if ($ValidateArr  == $SArr){
	$ArrTextError = array("error" => array("message"=> "Входные файлы некорректны"));
	$JsonTextError = json_encode($ArrTextError,JSON_UNESCAPED_UNICODE);
	file_put_contents("error.json",$JsonTextError);
}
$final_json = json_encode($SArr);
file_put_contents("StructureWithValues.json",$final_json);
?>

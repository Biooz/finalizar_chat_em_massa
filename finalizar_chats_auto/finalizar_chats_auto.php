<php
<?php
function finalizarChat($id){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.huggy.io/v2/chats/".$id."/close");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "{
    \"sendFeedback\": false
  }");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
  "X-Authorization: Bearer a6af9ed744a7f4c9bc90b3f818e0e41b"
));
$response = curl_exec($ch);
curl_close($ch);
var_dump($response);
}


$num = 0;
$response = "vazio";
while(!empty($response)){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.huggy.io/v2/chats?page=".$num);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "X-Authorization: Bearer a6af9ed744a7f4c9bc90b3f818e0e41b"
));
$response = curl_exec($ch);
curl_close($ch);
$atendimentos = json_decode($response);
for($i=0; $i < count($atendimentos); $i++){
  $dado = $atendimentos[$i]->closedAt;
  echo $dado;
  if($atendimentos[$i]->closedAt == ""){
      $id = $atendimentos[$i]->id;
      echo "id";
      finalizarChat($id);
  }
}
if(empty($response)){
  var_dump($response);
}
curl_close($ch);
$num++;
}
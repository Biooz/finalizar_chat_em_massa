<?php
function finalizarChat($id,$company)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.huggy.app/v3/chats/{$id}/close/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
    \"sendFeedback\": false
  }");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMzODc1ZDQxMWFjMDYwMGUzMWQyYzBhNjIyM2NjMjA0Y2E5ZDZiNmNjMTE4MjE3NGIzYzc0MWYzZmQ2ZmJmODMwMWVhMTJmYmMwNzA1YjAwIn0.eyJhdWQiOiJBUFAtODA3MDk5ZGEtZDZmNy00YzQ5LTg3YTQtMDJkMWE2NGExYzdiIiwianRpIjoiYzM4NzVkNDExYWMwNjAwZTMxZDJjMGE2MjIzY2MyMDRjYTlkNmI2Y2MxMTgyMTc0YjNjNzQxZjNmZDZmYmY4MzAxZWExMmZiYzA3MDViMDAiLCJpYXQiOjE1Nzk2MTI2MDMsIm5iZiI6MTU3OTYxMjYwMywiZXhwIjoxNTgyMjkxMDAzLCJzdWIiOiIyMTExNCIsInNjb3BlcyI6WyJpbnN0YWxsX2FwcCIsInJlYWRfYWdlbnRfcHJvZmlsZSJdfQ.Z3exyA3qpjuwH3g5jPWq6GGrGkspvXwOgBt4lpep1zHOtMJ584Q8Y0YEfQEBXlMII_8KOBYQItomRdpnGtaGYiI1_YO0WEB35m9Z_V0Bft88SMyeF5JNX7AJZCAh2YnmO0OgyadOyGiquNr6GCnjRWrugUApzRTYmL4E_i9nunc"
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    var_dump($response);
}

$num = 0;
$response = "vazio";
while (!empty($response)) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.huggy.app/v3/companies/{$company}/chats");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMzODc1ZDQxMWFjMDYwMGUzMWQyYzBhNjIyM2NjMjA0Y2E5ZDZiNmNjMTE4MjE3NGIzYzc0MWYzZmQ2ZmJmODMwMWVhMTJmYmMwNzA1YjAwIn0.eyJhdWQiOiJBUFAtODA3MDk5ZGEtZDZmNy00YzQ5LTg3YTQtMDJkMWE2NGExYzdiIiwianRpIjoiYzM4NzVkNDExYWMwNjAwZTMxZDJjMGE2MjIzY2MyMDRjYTlkNmI2Y2MxMTgyMTc0YjNjNzQxZjNmZDZmYmY4MzAxZWExMmZiYzA3MDViMDAiLCJpYXQiOjE1Nzk2MTI2MDMsIm5iZiI6MTU3OTYxMjYwMywiZXhwIjoxNTgyMjkxMDAzLCJzdWIiOiIyMTExNCIsInNjb3BlcyI6WyJpbnN0YWxsX2FwcCIsInJlYWRfYWdlbnRfcHJvZmlsZSJdfQ.Z3exyA3qpjuwH3g5jPWq6GGrGkspvXwOgBt4lpep1zHOtMJ584Q8Y0YEfQEBXlMII_8KOBYQItomRdpnGtaGYiI1_YO0WEB35m9Z_V0Bft88SMyeF5JNX7AJZCAh2YnmO0OgyadOyGiquNr6GCnjRWrugUApzRTYmL4E_i9nunc"
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $atendimentos = json_decode($response);
    for ($i = 0; $i < count($atendimentos); $i++) {
        $dado = $atendimentos[$i]->closedAt;
        echo $dado;
        if ($atendimentos[$i]->closedAt == "") {
            $id = $atendimentos[$i]->id;
            echo "id";
            finalizarChat($id);
        }
    }
    if (empty($response)) {
        var_dump($response);
    }
    curl_close($ch);
    $num++;
}

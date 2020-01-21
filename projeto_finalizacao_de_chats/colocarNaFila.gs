function colocarFila(ApiToken, chatID) {
  var url = "https://api.huggy.io/v2/chats/" + chatID + "/queue";
  var payload = {
  };
  var headers = {
    "Authorization": "Bearer "+ ApiToken,
    "Content-Type": "application/json"
  };
  var options = {
    "method": "post",
    "headers": headers,
    "contentType" : "application/json",
    "payload": JSON.stringify(payload),
    "muteHttpExceptions": false
  };
  
  var request = UrlFetchApp.getRequest(url, options);
  Logger.log(request);
  var response = UrlFetchApp.fetch(url,options);
  Logger.log(response.getContentText());  
}


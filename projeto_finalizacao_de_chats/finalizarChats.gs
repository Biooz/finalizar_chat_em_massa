function finalizarChat(ApiToken, chatID) {
  var url = "https://api.huggy.io/v2/chats/" + chatID + "/close";
  var payload = {
    "sendFeedback": false
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
    "muteHttpExceptions": true
  };
  
  var request = UrlFetchApp.getRequest(url, options);
  Logger.log(request);
  var response = UrlFetchApp.fetch(url,options);
  if(response.getResponseCode() != 200){
    return;
  }
  Logger.log(response.getContentText());  
}


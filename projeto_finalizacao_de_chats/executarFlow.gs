function executarFlow(ApiToken, chatID, flowId) {
  var url = "https://api.huggy.io/v2/chats/" + chatID + "/flow";
  var payload = {
    "flowId": flowId
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


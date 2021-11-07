

/**
 * 🍺封装请求
 */
function request(action){
  $.ajax({
    type : "GET",
    async : false,
    url : "../action.php?action="+action,
    success : function(data) {
      return data;
    },
    error : function() {
      console.log ('🍺failed');
    }
})}
//request('getIp');
//DomAction();
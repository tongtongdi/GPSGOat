var common = {
    isEmpty: function (data) {
      if(data=="" || data.length<=0){
          return true;
      }else{
          return false;
      }
    },
    jsonAjax: function (url, param, callBack,ansyc) {
        var ajaxParam = "";
        if (common.isJson(param)) {
            for (var key in param) {
                ajaxParam += (key + "=" + param[key] + "&");
            }
            ajaxParam = ajaxParam.substr(0, ajaxParam.length - 1);
            ajaxParam = param;
        } else {
            ajaxParam = param;
        }
        $.ajax({
            type: "post",
            url: url,
            data: ajaxParam,//"foo=bar1&foo=bar2"。
            dataType: "JSON",
            success: callBack,
            error: function (data) {
                var text = data.responseText;
                alert(text);
            }
        });
    },
    /**
     * 判断是否Json 是返回true,否则false
     * @param obj
     * @returns {Boolean}
     */
    isJson: function (obj) {
        var isjson = typeof (obj) == "object" && Object.prototype.toString.call(obj).toLowerCase() == "[object object]" && !obj.length
        return isjson;
    },
    getCookie:function (name) {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
};
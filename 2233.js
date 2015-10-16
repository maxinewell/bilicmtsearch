function getjson(){
    var url = "aid2cid.php";
    try {
        $.ajax({
            url: url,
            type: "post",
            data:{
                aid: $("#aid").val()
            },
            success: getxml
        });
    }catch(e){
        alert("&#36755;&#20837;&#30340;&#97;&#118;&#21495;&#26080;&#25928;" + e);
    }
}

function getxml(cid) {
    if(cid !==  'http://comment.bilibili.com/.xml') {
        try {
            $.ajax({
                type: "GET",
                url: cid,
                dataType: "xml",
                success: xmlParser
            });
        } catch (e) {
            alert("\u0043\u006f\u006d\u006d\u0065\u006e\u0074\u0020\u0078\u006d\u006c\u83b7\u53d6\u5931\u8d25\uff0c\u8bf7\u786e\u8ba4\u0041\u0069\u0064\u0020\u002d\u0020" + e);
        }
    }else{
        alert("\u8f93\u5165\u7684\u0061\u0076\u53f7\u65e0\u6548");
    }
}

function xmlParser(xmlR) {
    var c = 0;
    var ck = "";
    $(xmlR).find('d').each(function(){
        if($(this).text() == $("#comt").val()){
            var attrs = $(this).attr("p").split(',');
            ck += (attrs[6] + ",");
            c ++;
        };
    });
    midd(ck);
    $(".jumbotron").remove();
    $(".container").append("<div class='jumbotron' style='background:rgba(255, 255, 255, 0.7);'></div>");
    $(".jumbotron").append("<h1 id='loading'>\u006d\u0069\u0064\u7834\u89e3\u4e2d\u002e\u002e\u002e</h1>");
    $(".jumbotron").append("<p>Find "+ c + " results.</p>");
}

function midd(list){
    var url = "middec.php";
    try {
        $.ajax({
            url: url,
            type: "post",
            data:{
                mid: list
            },
            success: middeclist
        });
    }catch(e){
        alert("aid-cid failed" + e);
    }
}

function middeclist(list) {
    var mids = list.split(',');
    mids.pop();
    $(".jumbotron").append("<table id='table' class='table table-striped'></table>");
    mids.forEach(function (mid) {
        $("#table").append("<tr><td>" + "<a href='http://space.bilibili.com/" + mid + "'target='_blank'>" + mid + "</a>" + "</tr></td>");
    });
    $("#loading").text("\u7834\u89e3\u5b8c\u6210");
}



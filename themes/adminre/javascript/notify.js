





$(document).ready(function() {
    bindEditClick();   
    
});

// Updates the typing event
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sendSimpleMessage(msg) {
    msg = cleanMsg(msg);
    //console.log(msg);
    if (msg != '' && connected) {
        var socketdata = {
            "for": $chat_window.data("u"), // introduction id
            "from": $chat_window.data("user"), // logedin user
            "room": $chat_window.data("room"), //chat room id
            "msg": msg,
            "template": "4",
            "url": userpicurl,
            "username": username
        };
        socketdata.msg = render_simple_message(socketdata.msg);
        // socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
        console.log(socketdata);
        socket.emit("admin_chat_message", socketdata);
    }
}

function render_simple_message(data) {
    var type = $chattingscrollWindow.attr('data-type');
    var temp = "";
    if(type != "window") {
        temp += "<div class=\"message-box right-img\"><div class=\"message-right\">";
        temp += "<p>" + data + "</p></div>";
        temp += "<span class=\"time\">" + moment(Date()).fromNow() + "</span></div>";
    } else {
        temp += "<li class=\"media\"><a class=\"pull-right\" href=\"#\"><img width=\"24px\" height=\"24px\" class=\"media-object\" alt=\"Generic placeholder image\" src=\""+ userpicurl +"\"></a>";
        temp += "<div class=\"pull-right media-body chat-pop mod\"><h4 class=\"media-heading\">You <span class=\"pull-left\"><i class=\"fa fa-clock-o\"></i> <abbr class=\"timeago\" title=\""+ moment(Date()).fromNow() +"\" >" + moment(Date()).fromNow() + "</abbr> </span></h4>";
        temp += "<p>"+data+"</p></div></li>";
    }
    $chattingscrollWindow.append(temp);
    initJs();
    $txtChatWindow.val('');
    return data;
}




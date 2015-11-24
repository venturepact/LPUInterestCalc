//Defining constant variables.

var socket = io.connect(window.location.origin + ':8080');
var $window = $(window);
var dhId = $("#dhId").val();
var $chat_box = $("#chat-box");
var $txtChatBox = $chat_box.find("#txtChatBox");
var $txtChatStatus = $("#txtChatStatus");
var $chattingscroll = $chat_box.find("#chattingscroll"); // ul box for chatting 
var $btnChatBox = $("#btnChatBox");

//notify.js
var $chat_window = $("#chat-window");
var $txtChatWindow = $("#txtChatWindow");
var $txtChatStatusWindow = $("#txtChatStatusWindow");
var $chattingscrollWindow = $("#chattingscrollWindow"); // ul box for chatting
var $btnChatWindow = $("#btnChatWindow");
var connected = false;
var FADE_TIME = 150; // ms
var TYPING_TIMER_LENGTH = 400; // ms
var typing = false;
var lastTypingTime;
var dynamic = '<div class="col-md-12 bt mt10 p10 pl30 bgwhite" id="{{id}}""><a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 pull-left btnEditPitch" data-id="lastInsertedId"><span class="icon-note" aria-hidden="true"></span> &nbsp;Edit Quote </a><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10"></span></div></div></div>';
var milestoneHtml = "<span class='fs14 blue-new mb10'><span class='icon-direction fs16' aria-hidden='true'></span> Paid in {{milstoneCount}} Milestones</span><table class='table table-hover fs14 ml10 mt10'></table>";
var client_end = $('[name="client"]').val();
var supplier_end = $('[name="supplier"]').val();
var admin_end = $('[name="admin"]').val();
var floating_end = $('[name="floating"]').val();
var msg_initials = "msg-id-";

//console.log(templates[0]);
var socketId = 0;
socket.on('connect', function(err) {
    if (err) console.log("error : ", err);
    console.log("dhId", dhId);
    var data = {
        "dhId": dhId,
        "room": $chat_box.data("room"), //chat room id 
        "admin_room": $chat_window.data("room"), //admin - user room
    };
    socket.emit('init', data);
    socket.emit('initAll', data);

    socket.on('ID', function(data) {
        console.dir("socketId received  : " + JSON.stringify(data));
        socketId = data;
        updateOnlineUsers(data.onlineusers);
        connected = true;
        disableChat();
    });
    socket.on('update online', function(data) {
        console.log('update on line received ', data);
        updateOnlineUsers(data);
    });
    socket.on('update message seen', function(data) {
        console.log('update message seen ', data);
        var thismessage = $("#msg-id-"+data.chat_message_id);
        if(thismessage.find('.seen_by_message').hasClass('hide')){
            thismessage.find('.seen_by_message').removeClass('hide');
            
        }
        console.log(thismessage.find('a').hasClass('.seen-u'+data.dhId));
        if(!thismessage.find('a').hasClass('.seen-u'+data.dhId)){
            var userhtml = '<a href="javascript:void(0)" class="pr5 seen-u-'+data.dhId+' " data-toggle="tooltip" data-placement="bottom" title="'+data.first_name+'" ><img  src="'+data.image+'" class="img-circle img45"></a>';
            thismessage.find('.see_by_users').append(userhtml);
            console.log(thismessage.find('.seen-u'+data.dhId));
        }
        
    });

    socket.on('new_message', function(data) {

        console.log("request received FOR NEW MESSAGE" + JSON.stringify(data));
        var thistemp = data.msg + '<div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
        console.log($chattingscroll.length);
        if($chattingscroll.length > 0 && socketId.room == data.room){
            $chattingscroll.prepend(thistemp);
            initJs();
            if (data.lastInsertedId) {
                var data = {
                    "dhId": dhId,
                    "chat_message_id": data.lastInsertedId, //chat room id 
                    "type": admin_end==1?'2':data.type,
                    "room":data.room
                };
                if($chattingscroll.length != 0)
                    socket.emit('update seenby', data);
            }
        }
        //render_supplier_message(data, templates[0],1);

    });

    socket.on('new_admin_message', function(data) {
        console.log(data);
        console.log("request received FOR NEW admin MESSAGE" + JSON.stringify(data));
        var type = $chattingscrollWindow.attr('data-type');
        var temp = "";
        if (type == "window") {
            temp += "<li class='media'><a class='pull-left' href='#'><img width='24px' height='24px' class='media-object' alt='Generic placeholder image' src='" + data.url + "'></a>";
            temp += "<div class='media-body chat-pop'><h4 class='media-heading'>" + data.username + "<span class='pull-right'><i class='fa fa-clock-o'></i><abbr class='time' data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</abbr></span></h4>";
            temp += "<p>" + data.msg + "</p></div></li>";
        } else {
            temp += "<div class='message-box left-img'><div class='picture'>";
            temp += "<img title='user name' width='40' height='40' class='img-circle' src='" + data.url + "'>";
            temp += "</div><div class='message'><p>" + data.msg + "</p></div>";
            temp += "<span class='time' data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</span></div>";
        }
        // $chattingscrollWindow.append(temp);
        var thistemp = temp;
        $chattingscrollWindow.append(thistemp);
        initJs();

        // update seen by
        if (data.lastInsertedId && $chattingscrollWindow.length != 0) {
            var data = {
                "dhId": dhId,
                "chat_message_id": data.lastInsertedId, //chat room id 
                "type": floating_end==1?'3':data.type,
                "room":data.room
            };
            socket.emit('update seenby', data);
        }

    });
    socket.on('deal', function(data) {

        console.log("request received deal closed" + JSON.stringify(data));
        var thistemp = data.msg;
        $chattingscroll.prepend(thistemp);
        if(data.template==3){
            $('.btnEditPitch, .btnAcceptOffer').remove();
            $("#menu1").attr('disabled', 'disabled');
        }
        initJs();

            //render_supplier_message(data, templates[0],1);

        });

    socket.on('message_saved',function(socketdata){
        switch(socketdata.template){
            case '1':
                console.log('>>>>>>> inside save_message',socketdata);
                socketdata.layout = 'chat_message_tpl';
                sm(socketdata);
                var htmid = "<div class='col-md-12 np pt15 pb10 mt30 bt' data-animate='fadeIn' id='{{id}}'><div class='col-md-1'><a href=''><img class='img-circle img45 myimage' src='{{url}}'></a></div><div class='col-md-2'><h5 class='fs14 display_block font_newregular mb5 mt5 team-text-blue'>{{username}}:</h5><h6 class='fs12 display_block nm time' data-last='dummy'>{{ondate}}</h6></div><div class='col-md-9'><p class='tsm-text mb15'>{{msg}}</p></div>";
                var temp = htmid;
                //console.log(temp);
                temp = temp.replace('{{url}}', socketdata.url);
                temp = temp.replace('{{username}}', socketdata.username);  
                temp = temp.replace('{{id}}', msg_initials + socketdata.lastInsertedId);     
                temp = temp.replace('{{msg}}', socketdata.msg);                          
                temp = temp.replace("{{ondate}}", moment.utc().format('YYYY-MM-DD HH:mm:ss'));
                //temp= $(temp);    
                //temp.find('.time').data('last',(new Date()));    
                temp = temp.replace("dummy", moment.utc().format('YYYY-MM-DD HH:mm:ss'));

                
                $txtChatBox.val('');
                var thistemp = temp + '<div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
                $chattingscroll.prepend(thistemp);
                socketdata.msg=thistemp;
                initJs();
                socket.emit("chat_message", socketdata);
                break;
            case '3':
                    
                var parent = '<div class="tab-slide-detail col-md-12 np pt10 mt20" data-animate="fadeIn" id="'+(msg_initials + socketdata.lastInsertedId)+'"><div class="col-md-12 pl5 as_t pitch_content">' +socketdata.msg + '</div><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
                $chattingscroll.prepend(parent);
                socketdata.msg= parent;
                socket.emit("deal", socketdata);
                //remove all the action buttons from the form
                $('.btnEditPitch, .btnAcceptOffer').remove();
                $("#menu1").attr('disabled', 'disabled');
                break;
            case '5' : 
                $chattingscroll.prepend(socketdata.msg);
                initJs();
                socket.emit("deal", socketdata);
                break;


        }
    });
    socket.on('new pitch', function(data) {
        console.log("request received FOR pitch" + JSON.stringify(data));
        //change message for other side 
        var temp = data.msg;
        var d = dynamic;
        console.log(data.type);
        console.log(client_end);
        console.log(supplier_end);
        if (data.type == 0 && supplier_end) {
            //if message from supplier and recipient is client then only change the messages 
        }
        if (data.type == 0 && client_end == 1) {
            console.log("From Supplier to client");
            temp = temp.replace("Quote Sent", "Quote Received");
            d = d.replace('Edit Quote', 'Make An Offer');

        }
        if (data.type == 1 && supplier_end == 1) {
            //if message from client and recipient is supplier then only change the messages 
            d = d.replace('btnEditPitch', 'btnAcceptOffer');
            d = d.replace('Edit Quote', 'Accept Offer');
            d = d.replace('icon-note', 'icon-check');            
            temp = temp.replace("Terms Sent", "Offer Received");
        }
        if (data.type == 1 && client_end == 1) {
            d = d.replace('Edit Quote', 'Edit Terms');
        }

        d = d.replace('lastInsertedId', data.proposal_id);
        var thistemp = '<div class="tab-slide-white col-md-12 np pt10 mt20" data-animate="fadeIn">' + temp + d;

        $chattingscroll.prepend(thistemp);
        initJs();
        bindEditClick();
        var data = {
            "dhId": dhId,
            "chat_room_id": data.lastInsertedId, //last inserted id 
        };
        socket.emit('update seenby', data)
            //render_supplier_message(data, templates[0],1);

    });

    socket.on('disconnect', function() {
        console.log('disconnect');
    });
    // Whenever the server emits 'typing', show the typing message
    socket.on('typing', function(data) {
        if(socketId.room == data.room){
            console.log('recived typing ', data);
            var htm = data.username + " is typing";
            $txtChatStatus.html(htm);
            console.log(data + "typing");
        }
    });

    // Whenever the server emits 'stop typing', kill the typing message
    socket.on('stop typing', function(data) {
        if(socketId.room == data.room){
            console.log('received stop typing ', data);
            var htm = data.username + " has entered text";
            $txtChatStatus.html(htm)
        }
    });
    /*
     * function for chat interface sending messages
     *
     */


 });
socket.on('connect_error', function(err) {
    // handle server error here
    console.log('Error connecting to server');
    connected = false;
    disableChat()
});
socket.on('reconnect_error', function() {
    console.log("reconnect failed ");
    connected = false;
    disableChat()
});

$(document).ready(function() {
    window.setInterval("updatechatTime()", (1000));
    var chatscrollLi = $chattingscroll.find('li:last-child').offset();
    bindEditClick();
    $btnChatWindow.on("click", function() {
        console.log("send clicked");
        var msg = $txtChatWindow.val().trim();
        console.log(msg);
        sendSimpleMessage(msg);

    });
    $txtChatWindow.on('keydown', function(event) {
        console.log('writing');
        // When the client hits ENTER on their keyboard
        if (event.which === 13) {
            var msg = $txtChatWindow.val().trim();
            sendSimpleMessage(msg);
            stopTypingUpdate();

        }
        updateTyping();
    });

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    $btnChatBox.on("click", function() {
        console.log("send clicked");
        var msg = $txtChatBox.val().trim();
        sendMessage(msg);

    });
    $txtChatBox.on('keydown', function(event) {
        console.log('writing');
        // When the client hits ENTER on their keyboard
        if (event.which === 13) {
            var msg = $txtChatBox.val().trim();
            sendMessage(msg);
            stopTypingUpdate();

        }
        updateTyping();
    });

});
// Updates the typing event
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sendMessage(msg) {
    msg = cleanMsg(msg);
    //console.log(msg);
    if (msg != '' && connected) {
        var socketdata = {
            "for": $chat_box.data("u"), // introduction id 
            "from": $chat_box.data("user"), // logedin user
            "room": $chat_box.data("room"), //chat room id 
            "msg": msg,
            "template": "1",
            "type": admin_end==1?'2':client_end,
            "url": userpicurl,
            "username": username
        };
        //socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
        //console.log(socketdata);
        socket.emit("save_message", socketdata);
        
        
    }
}

function sendPitch(data, type, lastInsertedId) {
    var temp = templates[1].template;
    //lastInsertedId  = 1;
    console.log(lastInsertedId);
    console.log(JSON.stringify(data));
    if (typeof(lastInsertedId) !== 'undefined') {
        if(data['ProposalPitches[trial]'] == "")
                temp = temp.replace("{{trial}}","NA");
            else
                temp = temp.replace("{{trial}}",data['ProposalPitches[trial]'] + " Days");
        if (data["ProposalPitches[billing_type]"] == 1) {
            //code Time and Material 
            console.log(" Time & Material");
            temp = temp.replace('mil-box', 'mil-box hide');
            
            if (data['ProposalPitches[tm_billing_schedule_type]'][1] == 0)
                temp = temp.replace("{{tm_billing_schedule_type}}", 'Weekly');
            else
                temp = temp.replace("{{tm_billing_schedule_type}}", 'Monthly');

            temp = temp.replace("{{tm_amount}}", numberWithCommas(data["ProposalPitches[fp_total_price]"]));
            temp = temp.replace("{{billing_type}}", "Time & Material");
            temp = temp.replace("{{amount}}", numberWithCommas(data['ProposalPitches[tm_amount]']));

        } else {
            console.log("Fixed Price");
            var milstones = data["PitchHasMilestones[overview][]"];
            var milamount = data["PitchHasMilestones[amount][]"];
            console.log("Milstone type ", typeof(milstones));
            console.log('Milstone length',milstones.length)
            if (typeof(milstones) == 'string' && milstones.length >0) {
                tablehtml += "<tr><td>#" + (1) + " </td><td data-original-title='" + milstones + "' data-container='body' data-toggle='tooltip' data-placement='top' title='' class='ellipsis display_block mil-width400'>" + milstones + "</td><td>$" + numberWithCommas(milamount) + "</td></tr>";
                var m = milestoneHtml.replace("{{milstoneCount}}", '1');
                var mHtml = $("<div>" + m + "</div>");
                mHtml.find('table').html(tablehtml);
                temp = temp.replace("{{milestone}}", mHtml.html());
            } else {
                if (milstones.length > 0) {
                    var tablehtml = "";
                    for (var i = 0; i < milstones.length; i++) {
                        tablehtml += "<tr><td>#" + (i + 1) + " </td><td><td data-original-title='" + milstones[i] + "' data-container='body' data-toggle='tooltip' data-placement='top' title='' class='ellipsis mil-width400 display_block'>" + milstones[i] + "</td><td>$" + numberWithCommas(milamount[i]) + "</td></tr>";
                        console.log(milstones[i] + "amount " + milamount[i]);
                    };
                    var m = milestoneHtml.replace("{{milstoneCount}}", milstones.length);
                    var mHtml = $("<div>" + m + "</div>");
                    mHtml.find('table').html(tablehtml);
                    temp = temp.replace("{{milestone}}", mHtml.html());
                } else {
                    temp = temp.replace('mil-box', 'mil-box hide');
                }
            }


            //code for Fixed Price
            temp = temp.replace("{{tm_amount}}", data["ProposalPitches[tm_amount]"]);
            temp = temp.replace("{{billing_type}}", "Fixed Price");
            temp = temp.replace("{{tm_billing_schedule_type}}", '');
            temp = temp.replace("{{amount}}", data['ProposalPitches[fp_total_price]']+ " Total");
            
        }
        // set duration type 
        if (data["ProposalPitches[fp_total_price_interval]"] == 0) {
            temp = temp.replace("{{fp_total_price_interval}}", "Days");
        } else if(data["ProposalPitches[fp_total_price_interval]"] == 1) {
            temp = temp.replace("{{fp_total_price_interval}}", "Weeks");
        }else if(data["ProposalPitches[fp_total_price_interval]"] == 2) {
            temp = temp.replace("{{fp_total_price_interval}}", "Months");
        }
        // = temp.replace("{{start_date}}", moment(data["ProposalPitches[start_date]"]).format('DD MMM YYYY'));
        temp = temp.replace("{{start_date}}", moment(data["ProposalPitches[start_date]"]).format('DD MMM YYYY'));
        var placeholders = templates[1].placeholders.split(',');
        //console.log(temp);  
        for (var i = 0; i < placeholders.length; i++) {
            $.each(data, function(index, value) {
                var p = placeholders[i].substr(2);
                p = p.substr(0, p.length - 2);

                if ("ProposalPitches[" + p + ']' == index) {
                    console.log("ProposalPitches[" + p + '] = ' + index);
                    temp = temp.replace(placeholders[i], value);
                }
            });
        };
        temp = temp.replace("{{ondate}}", moment.utc().format('YYYY-MM-DD HH:mm:ss'));
        temp = temp.replace("dummy", moment.utc().format('YYYY-MM-DD HH:mm:ss'));

        var d = dynamic;
        if (type == 1) {
            temp = temp.replace("Quote Sent", "Terms Sent");
            d = d.replace('Edit Quote', 'Edit Terms');
        }
        d = d.replace('lastInsertedId', lastInsertedId);
        var thistemp = '<div class="tab-slide-white col-md-12 np pt10 mt20" data-animate="fadeIn">' + temp + d;

        $chattingscroll.prepend(thistemp);
        bindEditClick();

        //create link and seen by for self 

        if (connected) {
            var socketdata = {
                "for": $chat_box.data("u"), // introduction id 
                "from": $chat_box.data("user"), // logedin user
                "room": $chat_box.data("room"), //chat room id 
                "msg": temp,
                "template": "2",
                "url": userpicurl,
                "username": username,
                "type": type,
                'proposal_id': lastInsertedId
            };
            //socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
            console.log(socketdata);
            socket.emit("pitch", socketdata);
        }
        initJs();
    } else {
        console.log('Last inserted id is undefined');
    }

}

function bindEditClick() {
    $('.btnEditPitch').click(function() {
        console.log($(this).data('id'))
    });

}

function updateOnlineUsers(data) {

    $('[id^="o_stat_"]').removeClass('online-dot').addClass('offline-dot');
    if (data) {
        for (var i = data.length - 1; i >= 0; i--) {
            $('#o_stat_' + data[i]).removeClass('offline-dot').addClass('online-dot');
        };
    }
}

function cleanMsg(msg) {
    var temp = msg
    var blacklist = ['<script', '<script>', '</script>', '<style>', '</style>'];
    var replace_with = '';
    $.each(blacklist, function(key, val) {
        // search for value and replace it
        msg = msg.replace(blacklist[key], replace_with);
    })
    if (temp != msg)
        msg = msg + " - Trimmed bad words";
    return msg;

}

function updateTyping() {
    if (socketId) {
        if (!typing) {
            startTypingUpdate();
        }
        lastTypingTime = (new Date()).getTime();

        setTimeout(function() {
            var typingTimer = (new Date()).getTime();
            var timeDiff = typingTimer - lastTypingTime;
            if (timeDiff >= TYPING_TIMER_LENGTH && typing) {
                stopTypingUpdate();
            }
        }, TYPING_TIMER_LENGTH);
    }
}

function stopTypingUpdate() {
    //$txtChatStatus.html("You have entered text");
    //socket.emit('stop typing',{"room":$chat_box.data("room")});
    socket.emit('stop typing', {
        "room": $chat_box.data("room")
    });
    typing = false;
}

function startTypingUpdate() {

    //$txtChatStatus.html("You are typing");
    socket.emit('typing', {
        "room": $chat_box.data("room")
    });
    typing = true;
}

function render_supplier_message(data, t, align) {
    //console.log(data.url);
    var temp = t.template;
    //console.log(temp);
    temp = temp.replace('{{url}}', data.url);

    //replace all occurrence of alignment
    /* var re = new RegExp('{{alignment}}', 'g');
    temp = temp.replace(re, align);*/
    var placeholders = t.placeholders.split(',');
    //console.log(temp);  
    for (var i = 0; i < placeholders.length; i++) {
        $.each(data, function(index, value) {
            var p = placeholders[i].substr(2);
            p = p.substr(0, p.length - 2);
            if (p == index) {
                temp = temp.replace(placeholders[i], value);
            }
        });
    };
    temp = temp.replace("{{ondate}}", moment.utc().format('YYYY-MM-DD HH:mm:ss'));
    //temp= $(temp);    
    //temp.find('.time').data('last',(new Date()));    
    temp = temp.replace("dummy", moment.utc().format('YYYY-MM-DD HH:mm:ss'));

    
    $txtChatBox.val('');
    //console.log(temp);
    return temp;

}


function updatechatTime() {

    $('.time').each(function() {
        //console.log("updating time ", typeof($(this).data('last')));
        if ($(this).data('last') !== '') {
            // console.log(moment($(this).data('last')));
            var localTime  = moment.utc($(this).data('last')).toDate();
            localTime = moment(localTime).format('YYYY-MM-DD HH:mm:ss');
            var lt = moment(localTime).format('YYYY-MM-DD HH:mm:ss') ;            
            $(this).html(moment(lt).fromNow());
            
        }
    });
}

function initJs() {
    if (typeof(Core) != 'undefined') {
        Core.init();
    }
}

function initChat() {
    var data = {
        "dhId": dhId,
        "room": $("#chat-box").data("room"), //chat room id 
    };
    console.log(data);
    socket.emit('init', data);
    dhId = $("#dhId").val();
    $chat_box = $("#chat-box");
    $txtChatBox = $("#txtChatBox");
    $txtChatStatus = $("#txtChatStatus");
    $window = $(window);
    $chattingscroll = $("#chattingscroll"); // ul box for chatting 
    $btnChatBox = $("#btnChatBox");
    $btnChatBox.bind("click");
    //$txtChatBox.bind('keydown');
    $txtChatBox.on('keydown', function(event) {
        console.log('writing');
        // When the client hits ENTER on their keyboard
        if (event.which === 13) {
            var msg = $txtChatBox.val().trim();
            sendMessage(msg);
            stopTypingUpdate();

        }
        updateTyping();
    });
}

function disableChat() {
    if (!connected) {
        $txtChatBox.attr('disabled', 'disabled');
        $btnChatBox.attr('disabled', 'disabled');
        $("#menu1").attr('disabled', 'disabled');

        $txtChatStatus.html('Chat is experiencing some error');
    } else {
        $txtChatBox.removeAttr('disabled');
        $btnChatBox.removeAttr('disabled');
        $("#menu1").removeAttr('disabled');
        $txtChatStatus.html('');
    }
}

/*Function to send Offer Accept event of the user to all */
function OfferAccept(t) {
    t.attr('disabled','disabled').val('Preparing Your Workspace');
    var content = $(t.closest('.tab-slide-white').html());

    content.find('.badge').remove();
    content.find('.icon-doc').addClass('icon-check').removeClass('icon-doc');
    content.find('.team-text-blue').addClass('text-white').removeClass('team-text-blue');
    content.find('.milestone-box').css('background', '#fafafa');
    content.find('.time').prev().html('Deal Closed');
    content.find('.btnAcceptOffer').parent().removeClass('bgwhite');
    content.find('.btnEditPitch, .btnAcceptOffer').remove();
    var htm = content.html();
    if (connected) {
        var socketdata = {
            "for": $chat_box.data("u"), // introduction id 
            "from": $chat_box.data("user"), // logedin user
            "room": $chat_box.data("room"), //chat room id 
            "msg": htm,
            "template": "3",
            "type": client_end,
            "url": userpicurl,
            "username": username,

        };
        console.log(socketdata);
        socket.emit("save_message", socketdata);
        
    }

    //initJs();
}

/*Function to send decline event of the user to all */
function sendDecline(data) {
    console.log(data);
    htm = $(".declinediv").html();
    htm = $("<div>" + htm + "</div>");
    var reason = "";
    $.each(data, function(i, o) {
        if(i.toLowerCase().indexOf("answer") >= 0) {
            if(o == "on") {
                var m = i.indexOf('[') + 1;
                var n = i.indexOf(']');
                var no = i.substring(m, n);
                o = $.trim($('#checkbox_' + no).next('label').text());
            }
            reason += "<p>" + o + "</p>";
        }
    });
    
    var msg = "sd";
    if (msg != '' && connected) {
        var socketdata = {
            "from": $chat_box.data("user"), // logedin user
            "room": $chat_box.data("room"), //chat room id 
            "msg": msg,
            "template": "5",
            "url": userpicurl,
            "type": admin_end==1?'2':data.type,
            "username": username
        };
        socketdata.user1 = username;
        socketdata.user2 = otherUser;
        socketdata.reason = reason;
        socketdata.msg = render_supplier_message(socketdata, templates[4], 0);
        console.log(socketdata);
        socket.emit("save_message", socketdata);
        
    }
    
}

//notify.js
function sendSimpleMessage(msg) {
    msg = cleanMsg(msg);
    console.log(msg + " from ssm");
    if (msg != '' && connected) {
        var socketdata = {
            "from": $chat_window.data("user"), // logedin user
            "room": $chat_window.data("room"), //chat room id
            "msg": msg,
            "template": "4",
            "url": userpicurl,
            "username": username,
            "dhId": dhId, 
            "type": '3',
        };
        console.log("near rsm");
        socketdata.msg = render_simple_message(socketdata.msg);
        // socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
        console.log(socketdata);
        socket.emit("admin_chat_message", socketdata);
    }
}

function render_simple_message(data) {
    console.log(data + " from rsm");
    var type = $chattingscrollWindow.attr('data-type');
    var temp = "";
    if (type != "window") {
        temp += "<div class=\"message-box right-img\"><div class=\"message-right\">";
        temp += "<p>" + data + "</p></div>";
        temp += "<span class=\"time\" data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</span></div>";
    } else {
        temp += "<li class=\"media\"><a class=\"pull-right\" href=\"#\"><img width=\"24px\" height=\"24px\" class=\"media-object\" alt=\"Generic placeholder image\" src=\"" + userpicurl + "\"></a>";
        temp += "<div class=\"pull-right media-body chat-pop mod\"><h4 class=\"media-heading\">You <span class=\"pull-left\"><i class=\"fa fa-clock-o\"></i> <abbr class=\"time\" data-last=\"" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "\" >" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</abbr> </span></h4>";
        temp += "<p>" + data + "</p></div></li>";
    }
    $chattingscrollWindow.append(temp);
    initJs();
    $txtChatWindow.val('');
    return data;
}


//Defining constant variables.
var dport = $("#dport").val();
//var socket;
/*if (window.location.protocol == "https:") {
     socket = io.connect(window.location.origin + ':' + dport,{secure : true});
}else
{
     socket = io.connect(window.location.origin + ':' + dport);
}*/
var wlocation = location.origin.replace(/https?:\/\//i, "") + ':' + dport;
//var socket = io.connect(wlocation);
var socket = io.connect(window.location.origin + ':' + dport, {
  secure: true
});
var durl = $("#durl").val();
var $window = $(window);
var dhId = $("#dhId").val();
var $chat_box = $("#chat-box");
var $txtChatBox = $chat_box.find("#txtChatBox");
var $txtChatStatus = $("#txtChatStatus");
var $chattingscroll = $chat_box.find("#chattingscroll"); // ul box for chatting
var $btnChatBox = $("#btnChatBox");
var $cbxsendFeature = $("#cbxsendFeature");
var $localStorage = typeof(Storage) != "undefined" ? true : false;
var $sendFeature = $localStorage == true && localStorage.getItem("sf") == true ? true : $cbxsendFeature.prop('checked');
var sound = document.getElementById("msg-audio");
sound.addEventListener("canplay", function() {
  sound.currentTime = 0;
});
var $notificationCount = $("#notificationCount");

//notify.js
var $chat_window = $("#chat-window");
var $txtChatWindow = $("#txtChatWindow");
var $txtChatStatusWindow = $("#txtChatStatusWindow");
var $chattingscrollWindow = $("#chattingscrollWindow"); // ul box for chatting
var $btnChatWindow = $("#btnChatWindow");
var $chatSection_window = $('#floatingChatSection');
var $chat_status_window = $('#privateChatStatus');
var connected = false;
var FADE_TIME = 150; // ms
var TYPING_TIMER_LENGTH = 400; // ms
var typing = false;
var lastTypingTime;
var newMessages = [];
var newAdminMessages = [];
var onPage = false;
var docTitle = document.title;
var titleInterval = 0;
var lastSeen = "";
/*
<a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 ml10 pull-left btnAcceptOffer btnChatHide" data-id="lastInsertedId"><span class="icon-check" aria-hidden="true"></span> &nbsp;Accept Quote & Select Team </a>
*/
var dynamic = '<div class="col-md-12 bt mt10 p10 pl30 bgwhite" id="{{id}}""><a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 pull-left btnEditPitch btnChatHide" data-id="lastInsertedId"><span class="icon-note" aria-hidden="true"></span> &nbsp;Edit Quote </a> <a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 ml10 pull-left btnAcceptOffer " data-id="lastInsertedId"><span class="icon-check" aria-hidden="true"></span> &nbsp;Accept Quote & Select Team </a><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message"></span><span class="see_by_users"> </span></div></div></div>';
var milestoneHtml = "<span class='fs14 blue-new mb10'><span class='icon-direction fs16' aria-hidden='true'></span> To be paid in {{milstoneCount}} Milestones</span><table class='table table-hover fs14 mt10'></table>";
var callbtn = '<a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 pull-left font_newregular propose-btn" onclick="initCalander()"><span class="icon-clock" aria-hidden="true"></span> &nbsp;Propose New Time</a>';

var client_end = $('[name="client"]').val();
var supplier_end = $('[name="supplier"]').val();
var admin_end = $('[name="admin"]').val();
var floating_end = $('[name="floating"]').val();
var msg_initials = "msg-id-";
var prefresh = 0;
var socketId = 0;

socket.on('connect', function(err) {
  if (err) console.log("error : ", err);
  //console.log("dhId", dhId);
  var data = {
    "dhId": dhId,
    "room": $chat_box.data("room"),
    //chat room id
    "admin_room": $chat_window.data("room"),
    //admin - user room
  };
  socket.emit('init', data);
  socket.emit('initAll', data);

  socket.on('ID', function(data) {
    //console.dir("socketId received  : " + JSON.stringify(data));
    socketId = data;

    updateOnlineUsers(data);
    connected = true;
    //console.log("status ",prefresh)
    if (prefresh == 2) {
      disableChat(prefresh);
      prefresh = 1;
      //console.log("status ",prefresh)
    }
    disableChat();
  });

  socket.on('update online', function(data) {
    //console.log('update on line received ', data);
    updateOnlineUsers(data);
  });

  socket.on('update message seen', function(data) {
    console.log('update message seen ', data);
    var thismessage = $("#msg-id-" + data.chat_message_id);
    if (thismessage.find('.seen_by_message').hasClass('hide') && data.dhId != dhId) {
      thismessage.find('.seen_by_message').removeClass('hide');
    }
    if (thismessage.find('.bgwhite').hasClass('hide') && data.dhId != dhId) {
      thismessage.find('.bgwhite').removeClass('hide');
    }
    //console.log(thismessage.find('a').hasClass('.seen-u' + data.dhId));
    if (!thismessage.find('a').hasClass('.seen-u-' + data.dhId) && data.dhId != dhId) {
      var userhtml = '<a href="javascript:void(0)" class="pr5 cursor_default seen-u-' + data.dhId + ' " data-toggle="tooltip" data-placement="bottom" title="' + data.first_name + '" ><img  src="' + data.image + '" class="img-circle img45"></a>';
      thismessage.find('.see_by_users').append(userhtml);
      //console.log(thismessage.find('.seen-u' + data.dhId));
    }
  });

  socket.on('new_message', function(data) {
    updateNotification();
    if (data.type == 0) updateClientInterface(data);
    else
    updateSupplierInterface(data);
    //console.log("request received FOR NEW MESSAGE" + JSON.stringify(data));
    var thistemp = data.msg; /*+ '<div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';*/
    //console.log($chattingscroll.length);
    //msg-id-1474
    var messageid = $("#" + msg_initials + data.lastInsertedId).length;
    if ($chattingscroll.length > 0 && socketId.room == data.room && messageid == 0) {
      $chattingscroll.prepend(thistemp);
      initJs();
      if (data.lastInsertedId) {
        var data = {
          "dhId": dhId,
          "chat_message_id": data.lastInsertedId,
          //chat room id
          "type": admin_end == 1 ? '2' : data.type,
          "room": data.room
        };
        if (!onPage) newMessages.push(JSON.stringify(data));
        else
        if ($chattingscroll.length != 0) socket.emit('update seenby', data);
      }
    }
    //render_supplier_message(data, templates[0],1);
  });

  socket.on('new_admin_message', function(data) {
    //console.log(data);
    //console.log("request received FOR NEW admin MESSAGE" + JSON.stringify(data));
    var type = $chattingscrollWindow.attr('data-type');
    var temp = "";
    if (type == "window") {
      if (data.dhId != dhId) {
        temp += "<li class='media'><a class='pull-left' href='#'><img width='24px' height='24px' class='media-object' alt='Generic placeholder image' src='" + data.url + "'></a>";
        temp += "<div class='media-body chat-pop'><h4 class='media-heading'>" + data.username + "<span class='pull-right'><i class='fa fa-clock-o'></i><abbr class='time' data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</abbr></span></h4>";
        temp += "<p>" + data.msg + "</p></div></li>";
      } else {
        temp += "<li class=\"media\"><a class=\"pull-right\" href=\"#\"><!--<img width=\"24px\" height=\"24px\" class=\"media-object\" alt=\"Generic placeholder image\" src=\"" + userpicurl + "\">--></a>";
        temp += "<div class=\"pull-right media-body chat-pop mod\"><h4 class=\"media-heading\">You <span class=\"pull-left\"><i class=\"fa fa-clock-o\"></i> <abbr class=\"time\" data-last=\"" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "\" >" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</abbr> </span></h4>";
        temp += "<p>" + data.msg + "</p></div></li>";
      }
    } else {
      if (data.dhId != dhId) {
        temp += "<div class='message-box left-img'><!--<div class='picture'>";
        temp += "<img title='user name' width='40' height='40' class='img-circle' src='" + data.url + "'>";
        temp += "</div>--><div class='message'><p>" + data.msg + "</p></div>";
        temp += "<span class='time' data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</span></div>";
      } else {
        temp += "<div class=\"message-box right-img\"><div class=\"message-right\">";
        temp += "<p>" + data.msg + "</p></div>";
        temp += "<span class=\"time\" data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</span></div>";
      }
    }

    if ($('.chat-section').length != 0 && $('.chat-section').is(':hidden')) {
      $('.chat-icon').addClass('chat-icon-hovered');
      var msgCount = newAdminMessages.length + 1;
      var display = (msgCount == 1) ? "a" : msgCount;
      $('.chat-icon > .chat-tooltip').html("You've received " + display + " new message<br/><br/>" + data.msg);
      window.setTimeout(function() {
        $('.chat-icon').removeClass('chat-icon-hovered');
        $('.chat-icon > .chat-tooltip').html("Have questions or feedback?");
      }, 10000);
    }
    // $chattingscrollWindow.append(temp);
    var thistemp = temp;
    $chattingscrollWindow.append(thistemp);
    initJs();

    if ($('#chat-internalbox-height').length > 0) {
      var objDiv = document.getElementById("chat-internalbox-height");
      objDiv.scrollTop = objDiv.scrollHeight;
    }

    // update seen by
    if (data.lastInsertedId && $chattingscrollWindow.length != 0) {
      var data = {
        "dhId": dhId,
        "chat_message_id": data.lastInsertedId,
        //chat room id
        "type": floating_end == 1 ? '3' : data.type,
        "room": data.room
      };
      //newMessages.push(JSON.stringify(data));
      if ($chatSection_window.is(':visible')) {
        socket.emit('update seenby', data);
      } else {
        newAdminMessages.push(JSON.stringify(data));
      }
    }
  });

  socket.on('deal', function(data) {
    updateNotification();
    //console.log("request received deal closed" + JSON.stringify(data));
    var thistemp = data.msg;
    $chattingscroll.prepend(thistemp);
    if (data.template == 3) {
      $('.btnEditPitch, .btnAcceptOffer').remove();
      $("#menu1").attr('disabled', 'disabled');
      var redirect = window.location.href;
      if (redirect.indexOf('#') >= 0) {
        redirect = redirect.split()[0];
      }
      window.location.replace(redirect);
    }
    initJs();
    
    if(data.lastInsertedId) {
      data.chat_message_id = data.lastInsertedId;
    }

    data.dhId = dhId;

    if (!onPage) {
      // console.log('deal');
      newMessages.push(JSON.stringify(data));
    } else {
      // console.log('deal cloased');
      if ($chattingscroll.length != 0) socket.emit('update seenby', data);
    }

    //render_supplier_message(data, templates[0],1);
  });

  socket.on('message_saved', function(socketdata) {
    populateMessage(socketdata);
    $('[data-toggle="tooltip"]').tooltip();
  });

  socket.on('new pitch', function(data) {
    updateNotification();
    console.log("request received FOR pitch" + JSON.stringify(data));
    //change message for other side
    var temp = data.msg;
    var d = dynamic;
    $(".btnAcceptOffer").remove();
    $('.see_by_users').each(function(){
      if($.trim($(this).html()) == "")
        $(this).closest('.bgwhite').addClass('hide');
    });

    if (data.type == 0 && supplier_end == 1) {
      //if message from supplier and recipient is client then only change the messages
    }
    else if (data.type == 0 && client_end == 1) {
      console.log("From Supplier to client");
      temp = temp.replace("Quote Sent", "Quote Received");
      // d = d.replace('Edit Quote', 'Accept Quote & Select Team');
      //d = d.replace('btnChatHide', ''); //For accept offer flow at client side
    }
    else if (data.type == 1 && supplier_end == 1) {
      console.log("From client to supplier");
      //if message from client and recipient is supplier then only change the messages
      d = d.replace('btnChatHide', ''); //For accept offer flow at client side      
      d = d.replace('Accept Quote & Select Team', 'Accept Offer');
      d = d.replace('icon-note', 'icon-check');
      temp = temp.replace("Edit Quote", "Offer Received");
      
    }
    else if (data.type == 1 && client_end == 1) {
      console.log("From client to client");

      d = d.replace('btnChatHide', '');
      d = d.replace('btnAcceptOffer', 'btnChatHide');  
      d = d.replace('Edit Quote', 'Update Terms');
    }

    d = d.replace(/lastInsertedId/g, data.proposal_id);
    var thistemp = '<div class="tab-slide-white col-md-12 col-xs-12 np pt10 mt20" data-animate="fadeIn" id="' + (msg_initials + data.lastInsertedId) + '">' + temp + d;

    $chattingscroll.prepend(thistemp);
    initJs();
    bindEditClick();
    var data = {
      "dhId": dhId,
      "chat_message_id": data.lastInsertedId, //chat message id
      "type": admin_end == 1 ? '2' : data.type,
      "room": data.room
    };
    if (!onPage) newMessages.push(JSON.stringify(data));
    else
    if ($chattingscroll.length != 0) socket.emit('update seenby', data);
  });

  socket.on('notify', function(data) {
    console.log('notify', data);
    if ($chat_box.length == 0 || ($chat_box.length > 0 && $chat_box.data("room") != data.room)) {
      console.log('aa gya ', data.
      for);
      if (admin_end != 1 && data.
      for != undefined) {
        updateNotification();
        if (data.type == 0) updateClientInterface(data);
        else
        updateSupplierInterface(data);
      } else if (admin_end == 1) updateAdminNotification();
    }
  });

  socket.on('message_deleted', function(data) {
    // alert('message deleted');
    if ($('#msg-id-' + data.message).length > 0) {
      $('#msg-id-' + data.message).slideUp('800');
      console.log('#msg-id-' + data.message + ' deleted');
    }
  });

/*socket.on('disconnect', function() {
        //console.log('disconnect');
      });*/

  // Whenever the server emits 'typing', show the typing message
  socket.on('typing', function(data) {
    if (socketId.room == data.room) {
      //console.log('recived typing ', data);
      var htm = data.username + " is typing";
      $txtChatStatus.html(htm);
      //console.log(data + "typing");
    }
  });

  // Whenever the server emits 'stop typing', kill the typing message
  socket.on('stop typing', function(data) {
    if (socketId.room == data.room) {
      //console.log('received stop typing ', data);
      //var htm = data.username + " has entered text";
      var htm = "";
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
  //console.log('Error connecting to server');
  connected = false;
  prefresh = 2;
  disableChat();
});

socket.on('reconnect_error', function() {
  //console.log("reconnect failed ");
  connected = false;
  var prefresh = true;
  prefresh = 2;
  disableChat();
});

// document ready actions starts
$(document).ready(function() {
  //alert(typeof $sendFeature);
  if ($localStorage) {
    if (localStorage.getItem("sf") != null) {
      console.log(localStorage.getItem("sf"));
      $sendFeature = localStorage.getItem("sf") == 'true' ? true : false;
      //alert(typeof $sendFeature);
      if ($sendFeature == true) {

        $cbxsendFeature.prop('checked', true);
      } else {
        $cbxsendFeature.prop('checked', false);
      }
    }
  }

  $cbxsendFeature.change(function() {
    $sendFeature = $(this).prop('checked');
    localStorage.setItem("sf", $sendFeature);
  });

  $(".chat-icon").click(function() {
    if (newAdminMessages.length > 0) {
      for (var i = newAdminMessages.length - 1; i >= 0; i--) {
        //console.log(newAdminMessages[i]);
        socket.emit('update seenby', JSON.parse(newAdminMessages[i]));
      };
    }
    newAdminMessages = [];
  });
  $window.on("blur focus", function(e) {
    //$chat_box.on("blur focus", function(e) {
    // console.log(e.type);
    if (e.type && $chat_box.length > 0) { //  reduce double fire issues
      switch (e.type) {
      case "blur":
        // do work focus out
        onPage = false;
        lastSeen = moment();
        // console.log('update last seen ',lastSeen);
        break;
      case "focus":
        // do work focus in
        onPage = true;
        console.log('Switched on page');
        if (newMessages.length > 0) {
          for (var i = newMessages.length - 1; i >= 0; i--) {
            console.log("Updating seenby ", newMessages[i]);
            socket.emit('update seenby', JSON.parse(newMessages[i]));
          };
        }
        newMessages = [];

        //Update the page if idle diff is more then 15 min
        if(lastSeen!=""){
            var now = moment();
            var ms = moment(now,"DD/MM/YYYY HH:mm:ss" ).diff(moment(lastSeen,"DD/MM/YYYY HH:mm:ss"));
            var d = moment.duration(ms);
            if(parseInt(d.asHours()) > 0 || parseInt(d.minutes()) > 15)
                window.location.reload();
            // console.log("diff ",d.asHours() + d.minutes());
        }
        break;
      } //end switch
    }
    document.title = docTitle;
    if (titleInterval != 0) {
      clearInterval(titleInterval);
      titleInterval = 0;
    }
    //console.log(onPage);
  });

  //Updating the time in the application
  window.setInterval("updatechatTime()", (1000));
  var chatscrollLi = $chattingscroll.find('li:last-child').offset();
  bindEditClick();

  $btnChatWindow.on("click", function() {
    //console.log("send clicked");
    var msg = $txtChatWindow.val().trim();
    //console.log(msg);
    sendSimpleMessage(msg);
  });

  $txtChatWindow.on('keydown', function(event) {
    //console.log('writing');
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
    //console.log("send clicked");
    var msg = $txtChatBox.val().trim();
    var attachment = getAttachment();

    sendMessage(msg + attachment);
  });

  $txtChatBox.on('keyup', function(event) {
    //console.log('writing');
    // When the client hits ENTER on their keyboard
    if (event.which === 13 && !event.shiftKey && $sendFeature) {
      var msg = $txtChatBox.val().trim();
      var attachment = getAttachment();
      sendMessage(msg + attachment);
      stopTypingUpdate();

    }
    updateTyping();
  });

  // delete message event listener
  $chattingscroll.on('click', '.delete-chat-message', function(e) {
    //console.log('Deleting message : ' + $(this).data('id'));
    var data = new Array();
    data['msg_id'] = $(this).data('id');
    data['room_id'] = $chat_box.data('room');
    bootbox.confirm('Are you sure about deleting this message?', function(result) {
      if (result) deleteMessage(data);
    });
  });
});

// functions start


function deleteMessage(data) {
  $.ajax({
    type: 'POST',
    url: durl + '/site/deleteMessage',
    data: 'mid=' + data['msg_id'] + '&rid=' + data['room_id'],
    dataType: 'JSON',
    success: function(response) {
      if (response.success) {
        var socketdata = {
          "room": data['room_id'],
          "message": data['msg_id'],
        };
        $('#msg-id-' + data['msg_id']).slideUp('800');
        socket.emit("delete_message", socketdata);
      } else
      console.log(response.msg);
    }
  });
}

function getAttachment() {
  var url = $('#chat-attachment-url').val();
  var name = $('#chat-attachment-name').val();
  if (url != '' && name != '') {
    var anchor = '<a class="display_block orange-new fs14" href="' + url + '" target="_blank" > <span aria-hidden="true" class="icon-paper-clip fs16"></span>' + name + '</a>';
    $('#chat-attachment-url').val('');
    $('#chat-attachment-name').val('');
    $('#chat-attachment-span').html('');
    if (!$('#chat-attachment-span').closest('.only-attach').hasClass('hide')) {
      $('#chat-attachment-span').closest('.only-attach').addClass('hide');
    }
    return anchor;
  }
  return '';
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sendMessage(msg) {
  msg = msg.replace(/\n\r?/g, '<br />');
  msg = cleanMsg(msg);
  ////console.log(msg);
  if (msg != '') {
    var socketdata = {
      "for": $chat_box.data("u"),
      // introduction id
      "from": $chat_box.data("user"),
      // logedin user
      "room": $chat_box.data("room"),
      //chat room id
      "msg": msg,
      "template": "1",
      "type": admin_end == 1 ? '2' : client_end,
      "url": userpicurl,
      "username": username
    };
    //socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
    //console.log(socketdata);
    $txtChatBox.val('');
    if (connected) socket.emit("save_message", socketdata);
    else
    sendOfflineMessage(socketdata);
  }
}

function sendMessageNonChatPage(data) {
  var socketdata = {
    'for': data.user,
    'from': data.from,
    'room': data.room,
    'msg': data.msg,
    "template": "1",
    "type": '2',
    "url": userpicurl,
    "username": data.username
  };
  //console.log(socketdata);
  if (connected) socket.emit("save_message", socketdata);
  else
  sendOfflineMessage(socketdata);
}

function sendPitch(data, type, response) {
  var temp = templates[1].template;
  //response.id  = 1;
  //console.log(response.id);
  //console.log(JSON.stringify(data));
  if (typeof(response.id) !== 'undefined') {
    if (data['ProposalPitches[trial]'] == "") temp = temp.replace("{{trial}}", "NA");
    else
      temp = temp.replace("{{trial}}", data['ProposalPitches[trial]'] + " Days");
    
    if (data["ProposalPitches[billing_type]"] == 1) {
      //code Time and Material
      //console.log(" Time & Material");
      temp = temp.replace('mil-box', 'mil-box hide');
      console.log(data['ProposalPitches[tm_billing_schedule_type]']);

      if (data['ProposalPitches[tm_billing_schedule_type]'] == 0) 
        temp = temp.replace("{{tm_billing_schedule_type}}", 'Weekly');
      else
        temp = temp.replace("{{tm_billing_schedule_type}}", 'Monthly');

      temp = temp.replace("{{tm_amount}}", numberWithCommas(data["ProposalPitches[fp_total_price]"]));
      temp = temp.replace("{{billing_type}}", "Time & Material");
      temp = temp.replace("{{amount}}", numberWithCommas(data['ProposalPitches[tm_amount]']));

    } 
    else {
      //code Fixed Price
      // console.log("Fixed Price");      
      var milstones = data["PitchHasMilestones[overview][]"];
      var milamount = data["PitchHasMilestones[amount][]"];
      var mildue = data["PitchHasMilestones[due_date][]"];
      // console.log("Milstone type ", typeof(milstones));
      // console.log('Milstone length', milstones.length)
      if (typeof(milstones) == 'string' && milstones.length > 0 && milstones != "") {
        var amount = '';
        if($.trim(milamount) != "") amount = '$' + numberWithCommas(milamount);
        tablehtml += '<tr><td>#' + (1) + ' </td><td data-original-title="' + milstones + '" data-container="body" data-toggle="tooltip" data-placement="top" title="" class="ellipsis mil-width400">' + milstones + "</td><td>" + amount + "</td><td>" + mildue + "</td></tr>";
        var m = milestoneHtml.replace("{{milstoneCount}}", '1');
        var mHtml = $("<div>" + m + "</div>");
        mHtml.find('table').html(tablehtml);
        temp = temp.replace("{{milestone}}", mHtml.html());
      } else {
        if (milstones.length > 0) {
          var tablehtml = "";
          var emptyMilestone = 0;
          for (var i = 0; i < milstones.length; i++) {

            if (milamount[i] != "" && mildue[i] != "") {
              var amount = '';
              if($.trim(milamount[i]) != "") amount = '$' + numberWithCommas(milamount[i]);
              tablehtml += '<tr><td>#' + (i + 1) + ' </td><td data-original-title="' + milstones[i] + '" data-container="body" data-toggle="tooltip" data-placement="top" title="" class="ellipsis mil-width400">' + milstones[i] + "</td><td>" + amount + "</td><td>" + mildue[i] + "</td></tr>";
            } else
            emptyMilestone++;
            console.log(milstones[i] + "amount " + milamount[i] + "due " + mildue[i]);
          }
          var m = milestoneHtml.replace("{{milstoneCount}}", (milstones.length - emptyMilestone));
          var mHtml = $("<div>" + m + "</div>");
          mHtml.find('table').html(tablehtml);
          temp = temp.replace("{{milestone}}", mHtml.html());
        } else {
          temp = temp.replace('mil-box', 'mil-box hide');
        }
      }


      //code for Fixed Price
      temp = temp.replace("{{tm_amount}}", numberWithCommas(data['ProposalPitches[fp_total_price]']) + " <span class='fs10 all-inc'>All Incl.</span>");
      temp = temp.replace("{{billing_type}}", "Fixed Price");
      temp = temp.replace("{{tm_billing_schedule_type}}", '');
      temp = temp.replace("{{amount}}", numberWithCommas(data['ProposalPitches[fp_total_price]']) + " <span class='fs10 all-inc'>All Incl.</span>");

    }
    
    // set duration and type when modal design changed
    /*if(!$('#indefinite').is(':checked') && typeof data["ProposalPitches[end_date]"] != 'undefined' && data["ProposalPitches[end_date]"].length > 0) {
      var days_diff = getDateDiffInDays(data["ProposalPitches[start_date]"], data["ProposalPitches[end_date]"]);
      temp = temp.replace("{{duration}}", days_diff);
      temp = temp.replace("{{fp_total_price_interval}}", "Days");
    } else {
      temp = temp.replace("{{duration}}", "Indefinite");
      temp = temp.replace("{{fp_total_price_interval}}", "");
    }*/

    if(typeof(response.contract_link) !== 'undefined' && response.contract_link != null) {
      temp = temp.replace("{{contract}}", '<div class="col-md-12 mt-10"><a data-original-title="Download Contract" target="_blank" href="'+response.contract_link+'" class="orange-new fs12 pull-left mt10" data-toggle="tooltip" data-placement="bottom"><span class="icon-paper-clip fs12 orange-new" aria-hidden="true"></span> Contract</a></div>');
    } else {
       temp = temp.replace("{{contract}}", '');
    }


    if(!$('#indefinite').is(':checked')){
      if (data["ProposalPitches[fp_total_price_interval]"] == 0) {
        temp = temp.replace("{{fp_total_price_interval}}", "Days");
      } else if (data["ProposalPitches[fp_total_price_interval]"] == 1) {
        temp = temp.replace("{{fp_total_price_interval}}", "Weeks");
      } else if (data["ProposalPitches[fp_total_price_interval]"] == 2) {
        temp = temp.replace("{{fp_total_price_interval}}", "Months");
      }
      temp = temp.replace("{{duration}}", data["ProposalPitches[duration]"]);
      
    }else {
      temp = temp.replace("{{duration}}", "Indefinite");
      temp = temp.replace("{{fp_total_price_interval}}", "");
    }
    temp = temp.replace("{{fp_total_price_interval}}", "");


    temp = temp.replace("{{start_date}}", moment(parseDateFormat(data["ProposalPitches[start_date]"])).format('DD MMM YYYY'));
    
    var placeholders = templates[1].placeholders.split(',');
    //console.log(temp);
    for (var i = 0; i < placeholders.length; i++) {
      $.each(data, function(index, value) {
        var p = placeholders[i].substr(2);
        p = p.substr(0, p.length - 2);

        if ("ProposalPitches[" + p + ']' == index) {
          //console.log("ProposalPitches[" + p + '] = ' + index);
          temp = temp.replace(placeholders[i], value);
        }
      });
    };
    temp = temp.replace("{{ondate}}", moment.utc().format('YYYY-MM-DD HH:mm:ss'));
    temp = temp.replace("dummy", moment.utc().format('YYYY-MM-DD HH:mm:ss'));


    var socketdata = {
      "for": $chat_box.data("u"), // introduction id
      "from": $chat_box.data("user"), // logedin user
      "room": $chat_box.data("room"), //chat room id
      "msg": temp,
      "template": "2",
      "url": userpicurl,
      "username": username,
      "type": type,
      'proposal_id': response.id
    };
    if (connected) {
      socket.emit("save_message", socketdata);
    } else
      sendOfflineMessage(socketdata);
    initJs();
  } else {
    //console.log('Last inserted id is undefined');
  }
}

function bindEditClick() {
  $('.btnEditPitch').click(function() {
    //console.log($(this).data('id'))
  });
}

function updateOnlineUsers(data) {

  var onlineClass = 'online-dot1';
  var oflineClass = 'offline-dot1';
  if (data) {
    if (data.room == $chat_box.data("room")) {
      $('[id^="o_stat_"]').each(function() {
        var elem = $(this);
        var eid = elem.attr('id').split('_');
        if (data.data.indexOf(eid[3]) >= 0) {
          if (!elem.hasClass(onlineClass)) elem.removeClass(oflineClass).addClass(onlineClass);
        } else {
          if (elem.hasClass(onlineClass)) elem.removeClass(onlineClass).addClass(oflineClass);
        }
      });
    }

    if (data.room == $chat_window.data("room")) {
      //console.log(data.data);
      var onlineClass = 'online-dot';
      var oflineClass = 'offline-dot';
      var elem = $('#private-chat-status');
      if (data.data.indexOf('1') >= 0) {
        console.log('Private chat admin online');
        if (!elem.hasClass(onlineClass)) elem.removeClass(oflineClass).addClass(onlineClass);
      } else {
        if (elem.hasClass(onlineClass)) {
          elem.removeClass(onlineClass).addClass(oflineClass);
        }
      }
    }
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
  if (temp != msg) msg = msg + " - Trimmed bad words";
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

  moment.locale('en', {
    calendar: {
      lastDay: '[Yesterday, ] LT',
      sameDay: '[Today, ] LT',
      nextDay: '[Tomorrow, ] LT',
      lastWeek: 'ddd [, ] h:mm a',
      nextWeek: '[coming] dddd [, ] LT',
      sameElse: 'L'
    }
  });

  //UI fixes as per request 
  moment.localeData('en')._relativeTime.m ="a min";
  moment.localeData('en')._relativeTime.mm ="%d mins";
  moment.localeData('en')._relativeTime.future ="a few seconds ago";
  moment.localeData('en')._relativeTime.h ="an hr";
  moment.localeData('en')._relativeTime.hh ="%d hrs";


  $('.time').each(function() {
    if ($(this).data('last') !== '') {
      var localTime = moment.utc($(this).data('last')).toDate();
      var rightNow = moment.utc().toDate();
      var today = moment.utc($(this).data('last')).isSame(moment.utc(), 'day');
      var week = moment.utc().week();
      var timeWeek = moment.utc($(this).data('last')).week();
      var lt = moment.utc($(this).data('last')).format('YYYY-MM-DD HH:mm:ss');

      if (rightNow.getFullYear() != localTime.getFullYear()) 
        $(this).html(moment(localTime).format('MMM D YYYY'));
      else if (week != timeWeek) $(this).html(moment(localTime).format('D MMM, h:mm a'));
      else if (!today) $(this).html(moment(localTime).calendar());
      else $(this).html(moment.utc(lt).fromNow());
    }
  });

  // for call schedules
  $('.call-date').each(function() {
    if ($(this).data('last') !== '') {
      var localTime = moment.utc($(this).data('last')).toDate();
      $(this).html(moment(localTime).format('Do MMM'));
    }
  });

  $('.call-time').each(function() {
    if ($(this).data('last') !== '') {
      var localTime = moment.utc($(this).data('last')).toDate();
      var dateEnd = moment(localTime).add(30, 'minutes');
      $(this).html(moment(localTime).format('hh:mma') + ' - ' + moment(dateEnd).format('hh:mma [GMT]Z'));
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
    "room": $("#chat-box").data("room"),
    //chat room id
  };
  //console.log(data);
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
    //console.log('writing');
    // When the client hits ENTER on their keyboard
    if (event.which === 13) {
      var msg = $txtChatBox.val().trim();
      sendMessage(msg);
      stopTypingUpdate();

    }
    updateTyping();
  });
}

function disableChat(prefresh) {
  //console.log("status out ",prefresh)
  if (typeof(prefresh) != 'undefined' && prefresh == 2) {
    //console.log("status inside ",prefresh)
    window.location.reload();
  }
  if (!connected) {
    //$txtChatBox.attr('disabled', 'disabled');
    //$btnChatBox.attr('disabled', 'disabled');
    //$("#menu1").attr('disabled', 'disabled');
    //$txtChatStatus.html('Your ISP has restricted this feature. Feel free to <a href="mailto:manager@venturepact.com">email me</a> or try using another internet connection.');

    // for one to one chat
    //$txtChatWindow.attr('disabled', 'disabled');
    //$btnChatWindow.attr('disabled', 'disabled');
    //$chat_status_window.html('Your ISP has restricted this feature. Feel free to <a href="mailto:manager@venturepact.com">email me</a> or try using another internet connection.');
  } else {

    // $txtChatBox.removeAttr('disabled');
    // $btnChatBox.removeAttr('disabled');
    // $("#menu1").removeAttr('disabled');
    $txtChatStatus.html('');

    // for one to one chat
    // $txtChatWindow.removeAttr('disabled');
    // $btnChatWindow.removeAttr('disabled');
    $chat_status_window.html('');
  }
}

/*Function to send Offer Accept event of the user to all */

function OfferAccept(t) {
  t.attr('disabled', 'disabled').text('Preparing Your Workspace');

  var content = $(t.closest('.tab-slide-white').html());

  content.find('.badge').remove();
  content.find('.icon-doc').addClass('icon-check').removeClass('icon-doc');
  content.find('.team-text-blue').addClass('text-white').removeClass('team-text-blue');
  // content.find('.milestone-box').css('background', '#fafafa');
  content.find('.time').prev().html('Project Initiated');
  content.find('.time').html(moment.utc().format('YYYY-MM-DD HH:mm:ss'));
  content.find('.time').attr('data-last', moment.utc().format('YYYY-MM-DD HH:mm:ss'));
  content.find('.btnAcceptOffer').parent().removeClass('bgwhite');
  content.find('.btnEditPitch, .btnAcceptOffer').remove();
  var htm = content.html();
  var socketdata = {
    "for": $chat_box.data("u"),
    // introduction id
    "from": $chat_box.data("user"),
    // logedin user
    "room": $chat_box.data("room"),
    //chat room id
    "msg": htm,
    "template": "3",
    "type": client_end,
    "url": userpicurl,
    "username": username,
  };
  if (connected) {
    socket.emit("save_message", socketdata);

  } else {
    sendOfflineMessage(socketdata);
  }
  //initJs();
}

/*Function to send decline event of the user to all */

function sendDecline(data) {
  // console.log(data);
  htm = $(".declinediv").html();
  htm = $("<div>" + htm + "</div>");
  var reason = "";
  $.each(data, function(i, o) {
    if (i.toLowerCase().indexOf("answer") >= 0) {
      if (o == "on") {
        var m = i.indexOf('[') + 1;
        var n = i.indexOf(']');
        var no = i.substring(m, n);
        o = $.trim($('#checkbox_' + no).next('label').text());
      }
      reason += "<p>" + o + "</p>";
    }
  });

  var msg = "sd";
  if (msg != '') {
    var socketdata = {
      "from": $chat_box.data("user"),
      // logedin user
      "room": $chat_box.data("room"),
      //chat room id
      "msg": msg,
      "template": "5",
      "url": userpicurl,
      "type": admin_end == 1 ? '2' : client_end,
      "username": username
    };
    socketdata.user1 = username;
    socketdata.user2 = otherUser;
    socketdata.reason = reason;
    socketdata.msg = render_supplier_message(socketdata, templates[4], 0);
    console.log(socketdata);
    if (connected) socket.emit("save_message", socketdata);
    else
      sendOfflineMessage(socketdata);

  }

}

//notify.js

function sendSimpleMessage(msg) {
  msg = cleanMsg(msg);
  //console.log(msg + " from ssm");
  if (msg != '') {
    var socketdata = {
      "from": $chat_window.data("user"),
      // logedin user
      "room": $chat_window.data("room"),
      //chat room id
      "msg": msg,
      "template": "4",
      "url": userpicurl,
      "username": username,
      "dhId": dhId,
      "type": '3',
    };
    //console.log("near rsm");
    socketdata.msg = render_simple_message(socketdata.msg);
    // socketdata.msg = render_supplier_message(socketdata, templates[0], 0);
    //console.log(socketdata);
    sma(socketdata);
    if (connected) socket.emit("admin_chat_message", socketdata);
    else
    sendOfflineMessage(socketdata);

  }
}

function render_simple_message(data) {
  //console.log(data + " from rsm");
  var type = $chattingscrollWindow.attr('data-type');
  var temp = "";
  if (type != "window") {
    temp += "<div class=\"message-box right-img\"><div class=\"message-right\">";
    temp += "<p>" + data + "</p></div>";
    temp += "<span class=\"time\" data-last='" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "'>" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</span></div>";
  } else {
    temp += "<li class=\"media\"><a class=\"pull-right\" href=\"#\"><!--<img width=\"24px\" height=\"24px\" class=\"media-object\" alt=\"Generic placeholder image\" src=\"" + userpicurl + "\">--></a>";
    temp += "<div class=\"pull-right media-body chat-pop mod\"><h4 class=\"media-heading\">You <span class=\"pull-left\"><i class=\"fa fa-clock-o\"></i> <abbr class=\"time\" data-last=\"" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "\" >" + moment.utc().format('YYYY-MM-DD HH:mm:ss') + "</abbr> </span></h4>";
    temp += "<p>" + data + "</p></div></li>";
  }
  $chattingscrollWindow.append(temp);
  initJs();
  if ($('#chat-internalbox-height').length > 0) {
    var objDiv = document.getElementById("chat-internalbox-height");
    objDiv.scrollTop = objDiv.scrollHeight;
  }
  $txtChatWindow.val('');
  return data;
}

var siteGetNotification = null;

function updateNotification() {
  //update notification count before sending request
  var count = parseInt($notificationCount.text());
  count += 1;
  if (!onPage) {
    $notificationCount.text(count);
    $notificationCount.parent().show().removeClass('hide');
    if (titleInterval != 0) {
      clearInterval(titleInterval);
      titleInterval = 0;
    }
    titleInterval = setInterval(updateTitle, 1000);
    sound.play();
  }
  if (siteGetNotification && siteGetNotification.readystate != 4) {
    siteGetNotification.abort();
  }

  // ajax call to get notification
  console.log('Before', $notificationCount.text());
  siteGetNotification = $.ajax({
    url: durl + "/site/getNotification",
    dataType: 'html',
    type: 'post',
    success: function(data) {
      //console.log(data);
      $("#notification_container").html(data);
      siteGetNotification = null;
      console.log('success', $notificationCount.text());
    },
    error: function() {}
  });
  console.log('After', $notificationCount.text());

}

function updateSupplierInterface(data) {
  // update intro listing notifications
  if ($('.allProjectListing').length != 0) {
    if ($('#introListing-' + atob(data.
    for)).length != 0) {
      // do something
      var badge = $('#introListing-' + atob(data.
      for)).find('.badge.badge-red');
      var count = badge.find('span').text();
      count = parseInt(count) + 1;
      badge.find('span').text(count);
      badge.removeClass('hide');
      //console.log('updating intros');
      if (badge.closest('.newProjectsListing').length != 0) {
        $('#newProjectNoti').removeClass('hide');
        //console.log('updating new intros');
      }
      if (badge.closest('.activeProjectsListing').length != 0) {
        $('#activeProjectNoti').removeClass('hide');
        //console.log('updating active intros');
      }
      if (badge.closest('.archivedProjectsListing').length != 0) {
        $('#archivedProjectNoti').removeClass('hide');
        //console.log('updating archiveed intros');
      }
    }
  }

  // update workspace section
  updateWorkspace(data);
}

function updateWorkspace(data) {
  console.log('Updating workspace...');
  if ($('#workspaceNotificationCount').length != 0) {
    if ($('#workspaceProject-' + atob(data.
    for)).length != 0) {
      var count = $('#workspaceProject-' + atob(data.
      for)).text();
      //console.log('Updating : ', count);
      count = parseInt(count) + 1;
      $('#workspaceProject-' + atob(data.
      for)).text(count);
      $('#workspaceProject-' + atob(data.
      for)).removeClass('hide');
      //var wcount = $('#workspaceNotificationCount').text();
      //wcount = parseInt(wcount) + 1;
      //$('#workspaceNotificationCount').text();
      $('#workspaceNotificationCount').removeClass('hide');
    } else {
      if ($('#dashboardNotificationCount').length != 0) {
        $('#dashboardNotificationCount').removeClass('hide');
      }
    }
  }
}

function updateClientInterface(data) {
  // console.log('Updating Client... ', data);
  // if introdetail page, update counts
  if ($('.teamIntroListing').length != 0) {
    // console.log('Intro Page - Update count');
    // if project exists
    if ($('#teamIntroList-' + atob(data.
    for)).length != 0) {
      // console.log('found project...updating now');
      var elem = $('#teamIntroList-' + atob(data.
      for)).find('.badge.badge-red');
      // console.log('Badge: ', elem);
      var count = elem.find('span').text();
      count = parseInt(count) + 1;
      elem.find('span').text(count);
      elem.removeClass('hide');
    }
  }
  // if home, update count
  if ($('.clientProjectsHome').length != 0) {
    // find project
    if ($('#homeProject-' + atob(data.
    for)).length != 0) {
      // show supplier project notification
      var elem = $('#homeProject-' + atob(data.
      for)).find('.badge.badge-red');
      // console.log('Badge: ', elem);
      var count = elem.find('span').text();
      count = parseInt(count) + 1;
      elem.find('span').text(count);
      elem.removeClass('hide');

      // show client project notification
      var parent = $('#homeProject-' + atob(data.
      for)).data('parent-id');
      $('#clientProject-' + parent).find('.tab-icon-cont').removeClass('hide');
    }
  }

  updateWorkspace(data);
}

function updateAdminNotification() {
  console.log('Updating notifications admin');
  $.ajax({
    url: durl + "/admin/default/getWidgetNotification",
    dataType: 'html',
    type: 'post',
    success: function(data) {
      if (!onPage) {
        $('#notifyWidgetAdmin').html(data);
        if (titleInterval != 0) {
          clearInterval(titleInterval);
          titleInterval = 0;
        }
        titleInterval = setInterval(updateTitle, 1000);
        sound.play();
      }
    },
    error: function() {}
  });
}

function updateTitle() {
  if (docTitle == document.title) {
    var count = parseInt($notificationCount);
    if (count != NaN) document.title = " (" + parseInt($notificationCount.text()) + ") You got a new message";
    else
    document.title = " You got a new message";
  } else {
    document.title = docTitle;
  }
  // console.log('update title ', document.title);
}

function sendOfflineMessage(socketdata) {
  console.log('sending ofline');
  $.ajax({
    url: durl + "/supplier/sendOfflineMessage",
    dataType: 'json',
    type: 'post',
    data: socketdata,
    success: function(data) {
      console.log(data);
      if (!data.iserror) {
        socketdata.lastInsertedId = data.lastInsertedid;
        populateMessage(socketdata);
      } else
      alert('Something went wrong');
    },
    error: function() {}
  });
}

function populateMessage(socketdata) {
  switch (socketdata.template) {
    case '1':
      //console.log('>>>>>>> inside save_message');
      socketdata.layout = 'chat_message_tpl';
      sm(socketdata);
      var htmid = "<div class='col-md-12 col-xs-12 np pt15 pb10 mt30 bt chat-outerr' data-animate='fadeIn' id='{{id}}'><div class='col-md-1 col-xs-2'><a href=''><img class='img-circle img45 myimage' src='{{url}}'></a></div><div class='col-md-2 col-xs-10'><h5 class='fs14 display_block font_newregular mb5 mt5 team-text-blue'>{{username}}:</h5><h6 class='fs12 display_block nm time' data-last='dummy'>{{ondate}}</h6></div><div class='col-md-9 col-xs-12 rs-mt15'><p class='tsm-text mb15'>{{msg}}</p>";

      var temp = htmid;
      ////console.log(temp);
      temp = temp.replace('{{url}}', socketdata.url);
      temp = temp.replace('{{username}}', socketdata.username);
      temp = temp.replace('{{id}}', msg_initials + socketdata.lastInsertedId);
      temp = temp.replace('{{msg}}', socketdata.msg);
      temp = temp.replace("{{ondate}}", moment.utc().format('YYYY-MM-DD HH:mm:ss'));
      //temp= $(temp);
      //temp.find('.time').data('last',(new Date()));
      temp = temp.replace("dummy", moment.utc().format('YYYY-MM-DD HH:mm:ss'));


      //$txtChatBox.val('');
      var deleteTemp = '';
      if (socketdata.from == $chat_box.data("user")) {
        deleteTemp += "<span class='icon-close chat-del delete-chat-message' data-id='" + socketdata.lastInsertedId + "' aria-hidden='true'></span>";
      }
      var thistemp = temp + deleteTemp + '</div><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
      var sendtemp = temp + '</div><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
      $chattingscroll.prepend(thistemp);
      socketdata.msg = sendtemp;
      initJs();
      socket.emit("chat_message", socketdata);
      break;
    case '3':

      var parent = '<div class="tab-slide-detail col-md-12 col-xs-12 np pt10 mt20" data-animate="fadeIn" id="' + (msg_initials + socketdata.lastInsertedId) + '"><div class="col-md-12 col-xs-12 pl5 as_t pitch_content">' + socketdata.msg + '</div><div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div>';
      $chattingscroll.prepend(parent);
      socketdata.msg = parent;
      socketdata.chat_message_id = socketdata.lastInsertedId;
      socketdata.dhId = dhId;
      socket.emit("deal", socketdata);
      //console.log("request received deal closed" + JSON.stringify(socketdata));
      //remove all the action buttons from the form
      $('.btnEditPitch, .btnAcceptOffer').remove();
      $("#menu1").attr('disabled', 'disabled');
      //bootbox.alert("You will be redirected in 5 sec");
      window.setTimeout(function() {
        var redirect = window.location.href;
        if (redirect.indexOf('#') >= 0) {
          redirect = redirect.split()[0];
        }
        window.location.replace(redirect);
      }, 3000);

      break;
    case '5':
      $chattingscroll.prepend(socketdata.msg);
      initJs();
      socket.emit("deal", socketdata);
      break;
    case '2':
      var d = dynamic;
      var temp = socketdata.msg;
      if (socketdata.type == 1) {
        temp = temp.replace("Quote Sent", "Offer Made");
        d = d.replace('Edit Quote', 'Update Terms');
      }else{      
        d = d.replace('lastInsertedId', socketdata.proposal_id);
        d = d.replace('btnChatHide', "");
        d = d.replace('btnAcceptOffer', "btnChatHide");
      }

      //requirement change update id of the Select Button below message box
      $("#select-team-new").attr("data-id",socketdata.proposal_id);

      var thistemp = '<div class="tab-slide-white col-md-12 col-xs-12 np pt10 mt20" data-animate="fadeIn" id="' + (msg_initials + socketdata.lastInsertedId) + '">' + temp + d;
      socketdata.msg = temp;
      $chattingscroll.prepend(thistemp);
      socket.emit("pitch", socketdata);
      bindEditClick();
      break;  
    case '8':
      var htm = '<div class="tab-slide-white col-md-12 col-sm-12 col-xs-12 np pt10 mt20 animated-waypoint" data-animate="fadeIn" id="'+msg_initials + socketdata.lastInsertedId+'">'+socketdata.msg;
      var sendother = htm + "</div>";
      socketdata.msg = sendother;
      htm+='<div class="col-md-12 bt p10 pl30 bgwhite">';
      htm+=callbtn;
      htm+='<div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div></div>';

      var html = $('<div>' + htm + '</div>');
      html.find(".call-events").each(function(i, obj) {
         $(obj).find('a').remove();
      });
      html.find('.propose-btn').remove();
      html.find('.bgwhite').addClass('hide');

      $chattingscroll.prepend(html.html());
      initJs();

      socketdata.msg = htm;
      socket.emit("deal", socketdata);
      break;
    case '9':
      var htm = '<div class="tab-slide-white col-md-12 col-sm-12 col-xs-12 np pt10 mt20 animated-waypoint" data-animate="fadeIn" id="'+msg_initials + socketdata.lastInsertedId+'">'+socketdata.msg;
      htm+='<div class="col-md-12 bt p10 pl30 bgwhite hide">';
      htm+='<div class="pull-right mr20 mt5"><span class="fs10 grey-text mr10 hide seen_by_message">Seen By:</span><span class="see_by_users"></span></div></div></div>';

      $chattingscroll.prepend(htm);
      initJs();

      socketdata.msg = htm;
      socket.emit("deal", socketdata);
      break;
  }
}
/**
 *
 * Function for handeling call scheduling
 *
 */
function sendSchedule(response) {
  //added one extra line needed 
  var endText = '';
  if(supplier_end == '1') {
    endText = ' (from the development team)';
  }
  else if(client_end == '1') {
    endText = ' (from the client team)';
  }
  var extraline  = '<div class="col-md-8 col-md-offset-3 col-sm-12 col-xs-12 pl20 fs14 mt10">'+response.fname+endText+' has requested a 30 min call. Please select one of the following time slots. </div>';
  var temp = $("<div>" + extraline + templates[7].template + "</div>");

  console.log(response);
  temp.find('.time').attr('data-last', moment.utc().format('YYYY-MM-DD HH:mm:ss'));
  temp.find(".call-events").each(function(i, obj) {
    if(response['data']['event'][i]["dt"]){
       $(obj).attr("data-id", response['data']['event'][i]["id"]);
       $(obj).find(".call-date").attr("data-last", response['data']['event'][i]["dt"]);
       $(obj).find(".call-date").text(response['data']['event'][i]["dt"]);
       $(obj).find(".call-time").attr("data-last", response['data']['event'][i]["dt"]);
       $(obj).find(".call-time").text(response['data']['event'][i]["dt"]);
    }else{
      $(obj).addClass('hide');
    }
  });

  console.log(temp);
  var socketdata = {
    "for": $chat_box.data("u"),// introduction id
    "from": $chat_box.data("user"),// logedin user
    "room": $chat_box.data("room"),//chat room id
    "msg": temp.html(),
    "template": "8",
    "url": userpicurl,
    "username": username,
    "type": client_end,
    'proposal_id': response['data']['lastInsertedId']
  };
  if (connected) {
    console.log('sending', socketdata);
    socket.emit("save_message", socketdata);
  }
  else sendOfflineMessage(socketdata);
  initJs();
}

function sendSelectedSchedule(response) {
  var temp = $("<div>" + templates[8].template + "</div>");
  temp.find('.time').attr('data-last', moment.utc().format('YYYY-MM-DD HH:mm:ss'));
  temp.find('.call-date').attr('data-last', response.slot.start);
  temp.find('.call-date').text(response.slot.start);
  temp.find('.slot_start').text(response.slot.start);
  temp.find('.slot_start').attr('data-last', response.slot.start);
  temp.find('.slot_separator').addClass('hide');
  temp.find('.slot_end').text('').addClass('hide');
  // temp.find('.slot_end').attr('data-last', response.slot.end);

  console.log(temp);
  var socketdata = {
    "for": $chat_box.data("u"),// introduction id
    "from": $chat_box.data("user"),// logedin user
    "room": $chat_box.data("room"),//chat room id
    "msg": temp.html(),
    "template": "9",
    "url": userpicurl,
    "username": username,
    "type": client_end
  };
  if (connected) {
    console.log('sending');
    socket.emit("save_message", socketdata);
  }
  else sendOfflineMessage(socketdata);
  initJs();
}

function parseDateFormat(date) {
  var x = date.split("-");
  return new Date(x[2],(x[0]-1),x[1]);
}

function getDateDiffInDays(date1, date2) {
  var one_day=1000*60*60*24;
  date1 = parseDateFormat(date1);
  date2 = parseDateFormat(date2);
  _Diff=Math.ceil((date2.getTime()-date1.getTime())/(one_day));
  return _Diff;
}
/*
 *  Document   : base_comp_calendar.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Calendar Page
 */
var BaseCompCalendar ;
var meraEvent;
$(document).ready(function(){

    BaseCompCalendar = function() {
        // Add new event in the event list
        var addEvent = function() {
            var $eventInput      = $('.js-add-event');
            var $eventInputVal   = '';

            // When the add event form is submitted
            $('.js-form-add-event').on('submit', function(){
                $eventInputVal = $eventInput.prop('value'); // Get input value

                // Check if the user entered something
                if ( $eventInputVal ) {
                    // Add it to the events list
                    $('.js-events')
                        .prepend('<li class="animated fadeInDown">' +
                                $('<div />').text($eventInputVal).html() +
                                '</li>');

                    // Clear input field
                    $eventInput.prop('value', '');

                    // Re-Init Events
                    initEvents();
                }

                return false;
            });
        };

        // Init drag and drop event functionality
        var initEvents = function() {
            $('.js-events')
                .find('li')
                .each(function() {
                    var $event = $(this);

                    //reset the existing events 
                    if($event.find('[type=hidden]').val() != '')
                        $('.js-calendar').fullCalendar('removeEvents',$event.attr('id'));

                    $event.find('.btnDeleteEvent').addClass('hide');
                    $event.find('.event_my_date').html('');
                    $event.find('.event_other_date').html('');
                    $event.find('[type=hidden]').val('');
                    $event.addClass('eventbox-grey-bg').removeClass('js-events-bg');

                    // create an Event Object
                    var $eventObject = {
                        title: $.trim($event.text()),
                        color: $event.css('background-color'),
                        id:$event.attr('id')
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', $eventObject);

                    // make the event draggable using $ UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true,
                        revertDuration: 0
                    });
                });
        };

        // Init FullCalendar
        var initCalendar = function(){
            var $date    = new Date();
            var $d       = $date.getDate();
            var $m       = $date.getMonth();
            var $y       = $date.getFullYear();

            $('.js-calendar').fullCalendar({
                editable: true,
                droppable: true,
                defaultView: 'agendaWeek',
                allDaySlot: false,
                dragScroll:true,
                defaultTimedEventDuration: '00:30:00',
                eventDurationEditable: false,
                firstDay :moment().weekday(),
                header: {
                    left: 'title',
                    right: 'prev,next '
                },
                viewRender: function(currentView){
                    var minDate = moment(),
                    maxDate = moment().add(2,'weeks');
                    // Past
                    if (minDate >= currentView.start && minDate <= currentView.end) {
                        $(".fc-prev-button").prop('disabled', true); 
                        $(".fc-prev-button").addClass('fc-state-disabled'); 
                    }
                    else {
                        $(".fc-prev-button").removeClass('fc-state-disabled'); 
                        $(".fc-prev-button").prop('disabled', false); 
                    }
                },
                eventRender: function(event, element) {
                    meraEvent = event;
                    // console.log('meraEvent',event._id);                    
                    element.css("background-color","#1ea8cd");
                },
                eventReceive: function(event) { // called when a proper external event is dropped
                    console.log('eventReceive', event);
                },
                drop: function($date, $allDay,ev, ui, resrevertFunc) { 
                    // this function is called when something is dropped
                    var check = moment($date).format('YYYY-MM-DD HH:mm');
                    var today = moment().format('YYYY-MM-DD HH:mm');
                    // console.log(check);
                    if(check < today)
                    {
                       bootbox.alert('Dates before current time is not allowed');
                       revertFunc();
                       return false;
                    }
                    else
                    {
                        // retrieve the dropped element's stored Event Object
                        var $originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var $copiedEventObject = $.extend({}, $originalEventObject);

                        // assign it the date that was reported
                        $copiedEventObject.start = $date;

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" 
                        $('.js-calendar').fullCalendar('renderEvent', $copiedEventObject,true);
                        
                        $(this).removeClass('eventbox-grey-bg').addClass('js-events-bg');
                        console.log($date);
                        console.log(moment($date).format('YYYY-MM-DD HH:mm'));
                        setValuesTOEvents($(this),moment($date).format('YYYY-MM-DD HH:mm'));
                        
                        $(this).draggable("destroy");
                        $(this).find('.btnDeleteEvent').removeClass('hide');
                        //$(this).attr('data-id',"sf");
                    }
                    
                },
               
                
               eventDrop: function( event, delta, revertFunc, jsEvent, ui, view){
                    console.log('drop',event);
                    var check = moment(event.start).format('YYYY-MM-DD HH:mm');
                    var today = moment().format('YYYY-MM-DD HH:mm');
                    // console.log(check);
                    if(check < today)
                    {
                       bootbox.alert('Dates before current time is not allowed');
                       revertFunc();
                    }
                    else
                    {   
                        var eventid = $("#"+event.id);
                        var selectedDate = event.start.format();
                        console.log(event.start);
                        console.log(moment(event.start).format('YYYY-MM-DD HH:mm'));

                        setValuesTOEvents(eventid,moment(event.start).format('YYYY-MM-DD HH:mm'));
                    }
               },
            
         
               
            });
        };

        return {
            init: function () {


                // Add Event functionality
                addEvent();

                // FullCalendar, for more examples you can check out http://fullcalendar.io/
                initEvents();
                initCalendar();
            }
        };
    }();
});

// Initialize when page loads
$(document).ready(function(){
    console.log('intial');
   
    BaseCompCalendar.init();
    $(document).on('click',"#btnScheduleCall",function(){
        var form = $("#frmSchedualCall");
        var canProceed = true;
        var that = $(this);
        var btnText = that.val();
        form.find('#calltype').val(client_end);
        // console.log(form.find('#calltype').val());

        that.val('Please Wait..').attr('disabled',"disabled");
        if(form.find("#room").val()=="")
            form.find('#room').val($chat_box.data("room"));

        var hiddenCount =0 ;
        form.find("[type=hidden]").each(function(){
            // console.log($(this));
            if($(this).val()=="")
                hiddenCount++;
            if(hiddenCount == 3)
                canProceed =false;
        });
        if(canProceed){
             $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    datatype: 'json',
                    success: function(response) {
                        // console.log(response);
                        response = JSON.parse(response);
                        if(!response.iserror)
                        {
                            $("#modelChatScheduling").modal('hide');
                            that.val(btnText).removeAttr('disabled');
                            sendSchedule(response);


                        }

                    }
                });


        }// end can proceed
        else{
            bootbox.alert('Select at least one appointment to proceed');
        }
        // that.val(btnText).removeAttr('disabled');

    });
    $(document).on('click','.btnDeleteEvent',function(){
        //Find the current event to delete
        var eventid = $(this).closest('li').attr('id');
        $('.js-calendar').fullCalendar('removeEvents', eventid);

        //Bind drag with it 
        var $event = $(this).closest('li');
        //reset the event div
        $event.find('.btnDeleteEvent').addClass('hide');
        $event.find('.event_my_date').html('');
        $event.find('.event_other_date').html('');
        $event.find('[type=hidden]').val('');
        $event.addClass('eventbox-grey-bg').removeClass('js-events-bg');
        
        // create an Event Object
        var $eventObject = {
            title: $.trim($event.text()),
            color: $event.css('background-color'),
            id: $event.attr('id')
        };

        // store the Event Object in the DOM element so we can get to it later
        $event.data('eventObject', $eventObject);

        // make the event draggable using $ UI
        $event.draggable({
            zIndex: 999,
            revert: true,
            revertDuration: 0
        });
    });

    //$("#modelChatScheduling").css("display": "block");         
})
function initCalander(){
    $("#modelChatScheduling").modal('show');
    $('#modelChatScheduling').on('shown.bs.modal', function () {        
        BaseCompCalendar.init();
        resetCalendar();
       $(".js-calendar").fullCalendar('render');
    });
    //$(".js-calendar").fullCalendar('render');

}
function setValuesTOEvents(obj,eventDate){
    var client_end = $('[name="client"]').val();
    var team = (client_end == 1) ? "Developer" : "Client";
    var other_team_text = team + " time zone : ";
    // console.log(client_end);
    var selectedDate = moment(eventDate);
    //var forUtcDate = new Date(eventDate.format());
    //var utcDate = moment.utc(forUtcDate.toUTCString()).format('YYYY-MM-DD HH:mm');
    var utcDate = moment.utc(selectedDate);
    obj.find('[type=hidden]').val(moment(utcDate).format('YYYY-MM-DD HH:mm'));
    
    var selectedDate = moment(selectedDate).format('YYYY-MM-DD HH:mm');
    var dateFormatted = moment(selectedDate).format('DD MMM, hh:mma');
    var dateEnd = moment(selectedDate).add(30, 'minutes');
    var dateFormattedEnd = moment(dateEnd).format('hh:mma [GMT]Z');
    obj.find('.event_my_date').html(dateFormatted + ' - ' + dateFormattedEnd);

    var team_tz = $('#team_tz').val();
    var selectedDateTeam = moment(utcDate).tz(team_tz).format('YYYY-MM-DD HH:mm');
    var dateFormatted = moment(selectedDateTeam).format('DD MMM, hh:mma');
    var dateEnd = moment(utcDate).add(30, 'minutes');
    var dateFormattedEnd = moment(dateEnd).tz(team_tz).format('hh:mma [GMT]Z');
    obj.find('.event_other_date').html("<i>"+other_team_text + dateFormatted + ' - ' + dateFormattedEnd+"</i>");
    
}
function resetCalendar(){
    // $('.js-calendar').fullCalendar('removeEvents');
   
}

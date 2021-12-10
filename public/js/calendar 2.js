$(document).ready(function() {

    var SITEURL = "http://127.0.0.1:8000";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        lang: 'fr',
        editable: false,
        events: SITEURL + '/calendar',
        displayEventTime: true,
        editable: false,
        eventRender: function(event, element, view) {
            console.log(event);
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        eventClick: function(event) {
            $("#presences").modal('toggle');
            $(".modal-content").load("/students/" + event.id + " form", function() {
                addClickEvent();
            });
        }
    });
});
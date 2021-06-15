<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>


<script src="./Public/Interface/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./Public/Interface/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="./Public/Interface/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="./Public/Interface/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./Public/Interface/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="./Public/Interface/plugins/moment/moment.min.js"></script>
<script src="./Public/Interface/plugins/fullcalendar/main.min.js"></script>
<script src="./Public/Interface/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="./Public/Interface/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="./Public/Interface/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="./Public/Interface/plugins/fullcalendar-bootstrap/main.min.js"></script>


<!-- Select2 -->
<script src="./Public/Interface/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="./Public/Interface/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="./Public/Interface/plugins/moment/moment.min.js"></script>
<script src="./Public/Interface/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="./Public/Interface/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="./Public/Interface/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./Public/Interface/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="./Public/Interface/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="./Public/Interface/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(document).ready(function()
{
  bsCustomFileInput.init();
  var pathArray = window.location.pathname.split('/');
  $("li.nav-item a.nav-link")
  .filter(function()
  {
    return $(this).attr("href").split('/')[[1]] == pathArray[2];
  }).addClass('active');
  $("li.nav-item a.nav-link")
  .filter(function()
  {
    return $(this).attr("href").split('/')[[1]] == pathArray[2];
  }).parents(".has-treeview").addClass("menu-open");
  
})
  $(function () {
    var interval = setInterval(function() {
    var momentNow = moment();
    $('#time').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' : ' + momentNow.format('MMMM - DD - YYYY') +', '+ momentNow.format('hh:mm:ss A'));
  }, 100);
  var obj = ""
  function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }
    
    ini_events($('#external-events div.external-event'))

       
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events 
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

  
    
    id = $(this).find("option:selected").val()
        $.ajax({
            url: './home/load_event',
            type: 'POST',
            dataType: 'json',
            data: {
                id:id
            },
            success: function(doc) {
            console.log(doc)
            
            obj = doc
            },
            async: false
        });
        console.log(id)
        var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay', 
      },
      'themeSystem': 'bootstrap',
      events    : obj,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      },
      selectable: true,
			selectHelper: true,
			select: function(start, end) {
        $("#modal-2").modal("show")
        $("#att").click(function(){
          type = $("#id_att option:selected").val()
          id = $("#id option:selected").val()
          date = moment(start.start).format("YYYY-MM-DD")
          time_in = moment().format("HH:mm:ss")
          if(type == 1)
          {
            $.ajax({
              type: "POST",
              url: "./attendance/add/",
              data: {id:id,date:date, time_in:time_in},
              dataType: "json",
              success: function (response) {
                console.log(response)
                if(response == true)
                {
                  Swal.fire(
                    'Time in : '+time_in+'!',
                    'You clicked the button!',
                    'success'
                  ).then((result) => {
                    id = $("#id").find("option:selected").val()
                      $.ajax({
                          url: './home/load_event',
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              id:id
                          },
                          success: function(doc) {
                          console.log(doc)
                          
                          obj = doc
                          },
                          async: false
                      });
                      calendar.getEventSources().forEach(eventSource => {
                          eventSource.remove()
                      });
                      calendar.addEventSource( obj )
                      calendar.refetchEvents()
                                })

                }
                else
                {
                  Swal.fire({
                    title: 'This has already!',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ok!'
                  })
                }
              }
            });
          }
          else
            if(type == 2)
          {
            $.ajax({
              type: "POST",
              url: "./attendance/check/",
              data: {id:id,date:date},
              dataType: "json",
              success: function (response) {
                console.log(response)
                if(response == 1)
                {
                  $.ajax({
                    type: "POST",
                    url: "./attendance/edit/",
                    data:{id:id,date:date, time_in:time_in},
                    dataType: "json",
                    success: function (response) {
                        if(response == true)
                        {
                          Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                          ).then((result) => {
                            id = $("#id").find("option:selected").val()
                              $.ajax({
                                  url: './home/load_event',
                                  type: 'POST',
                                  dataType: 'json',
                                  data: {
                                      id:id
                                  },
                                  success: function(doc) {
                                  console.log(doc)
                                  
                                  obj = doc
                                  },
                                  async: false
                              });
                              calendar.getEventSources().forEach(eventSource => {
                                  eventSource.remove()
                              });
                              calendar.addEventSource( obj )
                              calendar.refetchEvents()
                              })
                        }
                      }
                  });
                  
                }
              }
            });
          }
         
			})
    },
      eventClick: function() {
        Swal.fire(
          'Good job!',
          'You clicked the button!',
          'success'
        )
      },
      eventRender: function(info) {
        info.el.querySelector('.fc-title').innerHTML = info.event.title;
}    });
calendar.render()
$('#id').on('change', function() {

  if($("#id option:selected").val() !="default")
  {
    id = $(this).find("option:selected").val()
        $.ajax({
            url: './home/load_event',
            type: 'POST',
            dataType: 'json',
            data: {
                id:id
            },
            success: function(doc) {
            console.log(doc)
            
            obj = doc
            },
            async: false
        });
        calendar.getEventSources().forEach(eventSource => {
            eventSource.remove()
        });
        calendar.addEventSource( obj )
        calendar.refetchEvents()
  }
});
  


    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)
      

      //Remove event from text input
      $('#new-event').val('')
    })
  })
    /* initialize the external events
     -----------------------------------------------------------------*/
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })


  $(document).ready(function()
  {
    $("#set").click(function()
    {
      $(this).find(".user").toggleClass("show")
    })
    $("#logout").click(function()
    {
      $.ajax({
        type: "method",
        url: "http://localhost/HRM/core/session.php",
        data: "data",
        dataType: "json",
        success: function (data) {
        }
      });
      location.reload();
    })
    $("#view-info").click(function()
    {
      var role = "<?php echo $_SESSION['role'] ?>"
      if( role =="user")
      {
        id = "<?php echo $_SESSION['id'] ?>"
        location.href = "./employee/detail/"+id
        
      }
      else
      {
        location.href = "./account/"
      }
    })
  })
 
</script>
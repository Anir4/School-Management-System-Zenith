<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calendrie</title>
  <style>

  #calendar {
    width: 1100px;
    margin:  auto;
    
  }
  </style>
  @include('etudiant.particals.head') 
</head>
<body>
  @include('etudiant.particals.nav')
  
  <div id="calendar"></div>


  @include('etudiant.particals.script')

  <script text="text/javascript">
  var events=new Array();
  @foreach ($getmytimetable as $value)
    @foreach ($value['week'] as $week)
    events.push({
      title:'{{$value['nom']}}',
      daysOfWeek:[{{$week['fullcalendar_day']}}], 
      startTime:'{{$week['debut']}}',
      endTime:'{{$week['fin']}}',
    });
    @endforeach
  @endforeach
 var calendarEl = document.getElementById('calendar');
 var calendar = new FullCalendar.Calendar(calendarEl, {
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
  },
    initialDate: '<?=date('Y-m-d')?>',
      navLinks: true, 
      editable: false,
      events: events,
  });

  calendar.render();
  </script>
</body>
</html>
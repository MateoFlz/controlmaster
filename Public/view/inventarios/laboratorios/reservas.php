<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/siret/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Reservas de laboratorio</h5>
        </div>
        <div class="card-body">
            <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      
    });

    calendar.render();
  });

            </script>
            <div id="calendar">

            </div>
    
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>
var idletable =  $('#idledataTable').DataTable({
        "order": [[ 0, "desc" ]]
    } );

var  attendancetable = $('#attendancedataTable').DataTable({
     "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]],
     "order": [[ 0, "desc" ]], 
    "initComplete": function (settings, json) {
     var api = this.api();
     CalculateAttendance_TableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateAttendance_TableSummary(this);
        return ;   
      }
    } );

function CalculateAttendance_TableSummary(attendancetable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

        var api = attendancetable.api();

            // Total over all pages
         // var numRows = api.rows( {search:'applied'} ).count();
         //       $('.tile_stats_count .total_number_works').text(numRows.toFixed(2));


         api.columns(".hour_works").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

        $('.tile_stats_count .total_hours_work').text(sum.toFixed(2));
      });

       api.columns(".point_works").each(function (index) {
         var column_point = api.column(index,{page:'current'});

           var sum_point = column_point 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


        $('.tile_stats_count .total_points').text(sum_point.toLocaleString("en")+'.00');
      

      });
  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
    $.fn.dataTable.ext.search.pop();

});
});

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrangeidle span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrangeidle').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrangeidle').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  idletable.draw();
    $.fn.dataTable.ext.search.pop();

});
});

var currentTime = new Date();
// First Date Of the month 
var startDateFrom = new Date(currentTime.getFullYear(),currentTime.getMonth(),1);
// Last Date Of the Month 
var startDateTo = new Date(currentTime.getFullYear(),currentTime.getMonth() +1,0);
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = startDateFrom;
      var max = startDateTo;
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
    $.fn.dataTable.ext.search.pop();
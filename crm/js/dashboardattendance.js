 $(document).ready(function() {


datetime = new Date(document.getElementById("time_in").value);


status_log = document.getElementById("statuslog").value;

if(status_log == 'Break In' || status_log == 'Lunch Start'){

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = datetime.getTime() - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="attendance_timer"
  document.getElementById("attendance_timer").innerHTML = status_log.split(" ")[0] + ": " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    document.getElementById("attendance_timer").innerHTML = status_log.split(" ")[0] + ": " + (hours + 1) + "h "
  + (minutes + 1) + "m " + (seconds + 1) + "s ";
  }
}, 1000);

}



// status_log = document.getElementById("statuslog").value;
// date1 = new Date(document.getElementById("time_in").value);

// if (date1 != null) {

// if(status_log == 'Break In' || status_log == 'Lunch Start' || status_log == 'Time Out'){
// var date2 = new Date(document.getElementById("time_log").value);
// }
// else{
//     var date2 = new Date();
// }

// var diff = date2.getTime() - date1.getTime();

// var msec = diff;

// var totalSeconds = Math.floor(msec / 1000);
// msec -= totalSeconds * 1000;

// const myInterval = setInterval(setTime, 1000);

// function setTime() {
//   ++totalSeconds;
//   var seconds = pad(totalSeconds % 60);
//   var minutes = (pad(parseInt(totalSeconds / 60, 10) % 60));
//   var hours = (pad(parseInt(totalSeconds / 3600, 10) %60));
//   document.getElementById("attendance_timer").innerHTML = hours + "h "
//   + minutes + "m " + seconds + "s ";
 
//   if(status_log == 'Break In' || status_log == 'Lunch Start' || status_log == 'Time Out'){
//       clearInterval(myInterval);
//   }
  
// }

// function pad(val) {
//   var valString = val + "";
//   if (valString.length < 2) {
//     return "0" + valString;
//   } else {
//     return valString;
//   }
// }

// }

 });
function Once_timer(){
   $.get(base_url + "account/session_id2", function (result) {
        var  session_id = result.trim();
          $('#warningModal_'+session_id+'').modal("show"); 


       });
    Once_timer = function(){};
}

// function Once_timer_manual(){
//    $.get(base_url + "dashboard/beep_idle", function (result) {
//         var  session_id = result.trim();
//           $('#warningModal_'+session_id+'').modal("show"); 


//        });
//     Once_timer_manual = function(){};

// }


function Hide_Modal(){
   $.get(base_url + "account/session_id_hide", function (result) {
        var  session_id = result.trim();
          $('#warningModal_'+session_id+'').modal("hide"); 
          $('#mdlLoggedOut_'+session_id+'').modal("show"); 


       });

}


function Update_once(){
    alert("test");
    Update_once = function(){};

}

   var timer =1* 60 * 60;
   var timer_manual =1* 60 * 60;

 window.app = window.app || {};
        app.session = {

            //Settings
            warningTimeout: 15000, //(ms) The time we give them to say they want to stay signed in
            inactiveTimeout: 1000 * 60 * 60, //(ms) The time until we display a warning message
            minWarning: 5000, //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
            timerSyncId: "SomethingUnique", //The key idleTimer will use to write to localStorage
            logoutUrl: base_url +'account/logout', //Your url to log out, if you want you could build the url to pass a referal param
            keepAliveUrl: "api/user/KeepAlive", // The url for the keepalive api
            keepaliveInterval: 5000, //(ms) the interval to call keep alive url
            //From here down you shouldnt have to alter anything
            warningStart: null, //Date time the warning was started
            warningTimer: null, //Timer running every second to countdown to logout
            keepaliveTimer: null, //Timer for independent ping to keep session alive
            logout: function() {
                //Write to storage to tell other tab its time to sign out
                // if (typeof(localStorage) !== "undefined") {
                //     localStorage.setItem(app.session.timerSyncId, 0);
                // }

                //Send this page to the logout url, that will destroy session and forward to login

                //To simulate logout we are justo showing the logout dialog and locking the screen

                 Hide_Modal();
            },
            keepAlive: function() {
                //Hide logout modal
                //   $.get(base_url + "account/session_id", function (result) {
                //        var   session_id = result.trim();
                //       $('#warningModal_'+session_id+'').modal("hide"); 


                // });

                //Clear the timer
                clearTimeout(app.session.warningTimer);
                app.session.warningTimer = null;

                //Restart the idleTimer
                $(document).idleTimer("reset");
            },
            startKeepAliveTimer: function() {
                // Basically I just poll the server half way through the session life
                // to make sure the servers session stays valid
                // Hide_alert();

                clearTimeout(app.session.keepaliveTimer);
                app.session.keepaliveTimer = setInterval(function() {
                    app.session.sendKeepAlive();
                }, (app.session.inactiveTimeout / 2));
            },
            sendKeepAlive: function() {
                // Write a new date to storage so any other tabs are informed that this tab
                //  sent the keepalive
                if (typeof(localStorage) !== "undefined") {
                    localStorage.setItem(app.session.timerSyncId + "_keepalive", +new Date());
                }

                // The actual call to the keep alive api
                //$.post(app.session.keepAliveUrl).fail(function (jqXHR) {
                //    if (jqXHR.status == 500 || jqXHR.status == 0) {
                //        app.session.logout();
                //    }
                //});
            },
            showWarning: function(obj) {
                //Get time when user was last active

                var diff = (+new Date()) - obj.lastActive - obj.timeout,
                    warning = (+new Date()) - diff;

                // Destroy idleTimer so users are forced to click the extend button
                $(document).idleTimer("pause");

                //On mobile js is paused, so see if this was triggered while we were sleeping
                if (diff >= app.session.warningTimeout || warning <= app.session.minWarning) {
                    app.session.logoutUrl();
                } else {
                    Once_timer();
                    $('#time').html(Math.round((app.session.warningTimeout - diff) / 1000));
                    app.session.warningStart = (+new Date()) - diff;

                     $("<audio></audio>").attr({
                        'src': base_url +'audio/Purge_Siren_Sound_Effect.mp3',
                        'volume':0.7,
                        'autoplay':'autoplay'
                        }).appendTo("body");

                    //Update counter downer every second
                    app.session.warningTimer = setInterval(function() {
                        var remaining = Math.round((app.session.warningTimeout / 1000) - (((+new Date()) - app.session.warningStart) / 1000));

                         ++timer;

                             
                             var hour = Math.floor(timer /3600);
                            var minute = Math.floor((timer - hour*3600)/60);
                            var seconds = timer - (hour*3600 + minute*60);

                           

                          if(hour < 10)

                             hour = "0"+hour;

                          if(minute < 10)

                             minute = "0"+minute;

                          if(seconds < 10)

                             seconds = "0"+seconds;

                          var running_hour = hour + ":" + minute + ":" + seconds;

                           // $('#time').html(running_hour);

                          dataEdit = 'idleTime='+  running_hour;

                            $.ajax({
                                type:'GET',
                                data:dataEdit,
                                url: base_url +'account/update_idle_auto',
                                dataType: 'json', 
                                async: true,
                                cache: false,
                                timeout:50000,      
                                 success: function(data) {  
                                 },// success                
                              });

                        if (remaining >= 0) {
                            $('#time').html(remaining);
                        } else {
                            app.session.logout();
                        }
                    }, 1000)
                }
            },
            localWrite: function(e) {

                if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app.session.timerSyncId && app.session.warningTimer != null) {
                    // If another tab has written to cache then
                    if (e.originalEvent.newValue == 0) {
                        // If they wrote a 0 that means they chose to logout when prompted
                        app.session.logout();
                    } else {
                        // They chose to stay online, so hide the dialog
                        app.session.keepAlive();
                    }

                } else if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app.session.timerSyncId + "_keepalive") {
                    // If the other tab sent a keepAlive poll to the server, reset the time here so we dont send two updates
                    // This isnt really needed per se but it will save some server load
                    app.session.startKeepAliveTimer();
                }
            }
        };

        $(function() {
            //This will fire at X after page load, to show an inactive warning
            $(document).on("idle.idleTimer", function(event, elem, obj) {
                app.session.showWarning(obj);
            });

            //Create a timer to keep server session alive, independent of idleTimer
            app.session.startKeepAliveTimer();

            //User clicked ok to extend session
            $("#update_idle").click(function() {
                app.session.keepAlive(); //Remove the warning dialog etc
            });

              $(document).on('mouseover mousedown touchstart click keydown mousewheel DDMouseScroll wheel scroll',document,function(e){
            // console.log(e.type); // Uncomment this line to check which event is occured
                // app.session.startKeepAliveTimer(); //Remove the warning dialog etc
                app.session.keepAlive(); //Remove the warning dialog etc

           });

            //User hover
            $("#logout").click(function() {
                app.session.logout();
            });
            $( ".session_expired" ).hover(function() {
                  app.session.logout();
            });  

            //Set up the idleTimer, if inactive for X seconds log them out
            $(document).idleTimer({
                timeout: app.session.inactiveTimeout - app.session.warningTimeout,
                timerSyncId: app.session.timerSyncId
            });

            // Monitor writes by other tabs
            $(window).bind("storage", app.session.localWrite);
        });




 // window.app_manual = window.app_manual || {};
 //        app_manual.session = {

 //            //Settings
 //            warningTimeout: 20000, //(ms) The time we give them to say they want to stay signed in
 //            inactiveTimeout: 20000, //(ms) The time until we display a warning message
 //            minWarning: 5000, //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
 //            timerSyncId: "SomethingUnique", //The key idleTimer will use to write to localStorage
 //            logoutUrl: base_url +'account/logout', //Your url to log out, if you want you could build the url to pass a referal param
 //            keepAliveUrl: "api/user/KeepAlive", // The url for the keepalive api
 //            keepaliveInterval: 5000, //(ms) the interval to call keep alive url
 //            //From here down you shouldnt have to alter anything
 //            warningStart: null, //Date time the warning was started
 //            warningTimer: null, //Timer running every second to countdown to logout
 //            keepaliveTimer: null, //Timer for independent ping to keep session alive
 //            logout: function() {
 //                //Write to storage to tell other tab its time to sign out
 //                // if (typeof(localStorage) !== "undefined") {
 //                //     localStorage.setItem(app_manual.session.timerSyncId, 0);
 //                // }

 //                //Send this page to the logout url, that will destroy session and forward to login

 //                //To simulate logout we are justo showing the logout dialog and locking the screen

 //                 Hide_Modal();
 //            },
 //            keepAlive: function() {
 //                //Hide logout modal
 //                //   $.get(base_url + "account/session_id", function (result) {
 //                //        var   session_id = result.trim();
 //                //       $('#warningModal_'+session_id+'').modal("hide"); 


 //                // });

 //                //Clear the timer
 //                clearTimeout(app_manual.session.warningTimer);
 //                app_manual.session.warningTimer = null;

 //                //Restart the idleTimer
 //                $(document).idleTimer("reset");
 //            },
 //            startKeepAliveTimer: function() {
 //                // Basically I just poll the server half way through the session life
 //                // to make sure the servers session stays valid
 //                // Hide_alert();

 //                clearTimeout(app_manual.session.keepaliveTimer);
 //                app_manual.session.keepaliveTimer = setInterval(function() {
 //                    app_manual.session.sendKeepAlive();
 //                }, (app_manual.session.inactiveTimeout / 2));
 //            },
 //            sendKeepAlive: function() {
 //                // Write a new date to storage so any other tabs are informed that this tab
 //                //  sent the keepalive
 //                if (typeof(localStorage) !== "undefined") {
 //                    localStorage.setItem(app_manual.session.timerSyncId + "_keepalive", +new Date());
 //                }

 //                // The actual call to the keep alive api
 //                //$.post(app_manual.session.keepAliveUrl).fail(function (jqXHR) {
 //                //    if (jqXHR.status == 500 || jqXHR.status == 0) {
 //                //        app_manual.session.logout();
 //                //    }
 //                //});
 //            },
 //            showWarning: function(obj) {
 //                //Get time when user was last active

 //                var diff = (+new Date()) - obj.lastActive - obj.timeout,
 //                    warning = (+new Date()) - diff;

 //                // Destroy idleTimer so users are forced to click the extend button
 //                $(document).idleTimer("pause");

 //                //On mobile js is paused, so see if this was triggered while we were sleeping
 //                if (diff >= app_manual.session.warningTimeout || warning <= app_manual.session.minWarning) {
 //                    app_manual.session.logoutUrl();
 //                } else {
 //                    Once_timer_manual();
 //                    $('#time').html(Math.round((app_manual.session.warningTimeout - diff) / 1000));
 //                    app_manual.session.warningStart = (+new Date()) - diff;

 //                     $("<audio></audio>").attr({
 //                        'src': base_url +'audio/Purge_Siren_Sound_Effect.mp3',
 //                        'volume':0.7,
 //                        'autoplay':'autoplay'
 //                        }).appendTo("body");

 //                    //Update counter downer every second
 //                    app_manual.session.warningTimer = setInterval(function() {
 //                        var remaining = Math.round((app_manual.session.warningTimeout / 1000) - (((+new Date()) - app_manual.session.warningStart) / 1000));

 //                         ++timer_manual;

                             
 //                             var hour = Math.floor(timer_manual /3600);
 //                            var minute = Math.floor((timer_manual - hour*3600)/60);
 //                            var seconds = timer_manual - (hour*3600 + minute*60);

                           

 //                          if(hour < 10)

 //                             hour = "0"+hour;

 //                          if(minute < 10)

 //                             minute = "0"+minute;

 //                          if(seconds < 10)

 //                             seconds = "0"+seconds;

 //                          var running_hour = hour + ":" + minute + ":" + seconds;

 //                           // $('#time').html(running_hour);

 //                          dataEdit = 'idleTime='+  running_hour;

 //                            $.ajax({
 //                                type:'GET',
 //                                data:dataEdit,
 //                                url: base_url +'account/idle_user_beep/' + running_hour,
 //                                dataType: 'json', 
 //                                async: true,
 //                                cache: false,
 //                                timeout:50000,      
 //                                 success: function(data) {  
 //                                 },// success                
 //                              });

 //                        if (remaining >= 0) {
 //                            $('#time').html(remaining);
 //                        } else {
 //                            app_manual.session.logout();
 //                        }
 //                    }, 1000)
 //                }
 //            },
 //            localWrite: function(e) {

 //                if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app_manual.session.timerSyncId && app_manual.session.warningTimer != null) {
 //                    // If another tab has written to cache then
 //                    if (e.originalEvent.newValue == 0) {
 //                        // If they wrote a 0 that means they chose to logout when prompted
 //                        app_manual.session.logout();
 //                    } else {
 //                        // They chose to stay online, so hide the dialog
 //                        app_manual.session.keepAlive();
 //                    }

 //                } else if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app_manual.session.timerSyncId + "_keepalive") {
 //                    // If the other tab sent a keepAlive poll to the server, reset the time here so we dont send two updates
 //                    // This isnt really needed per se but it will save some server load
 //                    app_manual.session.startKeepAliveTimer();
 //                }
 //            }
 //        };

 //        $(function() {
 //            //This will fire at X after page load, to show an inactive warning
 //            $(document).on("idle.idleTimer", function(event, elem, obj) {
 //                app_manual.session.showWarning(obj);
 //            });

 //            //Create a timer to keep server session alive, independent of idleTimer
 //            app_manual.session.startKeepAliveTimer();

 //            //User clicked ok to extend session
 //            $("#update_idle").click(function() {
 //                app_manual.session.keepAlive(); //Remove the warning dialog etc
 //            });

 //              $(document).on('mouseover mousedown touchstart click keydown mousewheel DDMouseScroll wheel scroll',document,function(e){
 //            // console.log(e.type); // Uncomment this line to check which event is occured
 //                // app_manual.session.startKeepAliveTimer(); //Remove the warning dialog etc
 //                app_manual.session.keepAlive(); //Remove the warning dialog etc

 //           });

 //            //User hover
 //            $("#logout").click(function() {
 //                app_manual.session.logout();
 //            });
 //            $( ".session_expired" ).hover(function() {
 //                  app_manual.session.logout();
 //            });  

 //            //Set up the idleTimer, if inactive for X seconds log them out
 //            $(document).idleTimer({
 //                timeout: app_manual.session.inactiveTimeout - app_manual.session.warningTimeout,
 //                timerSyncId: app_manual.session.timerSyncId
 //            });

 //            // Monitor writes by other tabs
 //            $(window).bind("storage", app_manual.session.localWrite);
 //        });

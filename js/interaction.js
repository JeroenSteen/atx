// Timestamp on fase enter
var bt = new Date();
//Global url
var url;
//Passed test boolean
var passed = false;

$(document).keydown(function(e){
  //Key pressed
  var key       = e.keyCode;
  //Terms of fase
  var beginTerm = $("#beginTerm").html();
  var endTerm   = $("#endTerm").html();
  //Correct answer to pass test
  var rightTerm = $("#rightTerm").html();

  switch(key) {
    case 38:

      //console.log("up");
      if(beginTerm == rightTerm) {
        passed = true;
      } else {
        passed = false;
      }

      break;
    case 40:
      //console.log("up");
      if(endTerm == rightTerm) {
        passed = true;
      } else {
        passed = false;
      }
      break;
  }

  //User passed the fase
  if (passed) {
    // Timestamp on fase end
    var et = new Date();
    // Elapsed time in milliseconds
    var m = Math.abs(et - bt);
    //Show elapsed time
    console.log(m);

    //Find current URI
    var curUrl    = new URI(window.location.href);
    var testerID  = curUrl.query(true).tester;
    plainUrl      = curUrl.search("").href();

    //Save time, and wait
    $.post({
      url: plainUrl+'ajax/save_time.php',
      data: {
        begin_time: bt,
        end_time: et,
        milliseconds: m,
        tester: testerID
      },
      async: true
    });
    return;

    //Find current URI
    url = new URI(window.location.href);
    //Find current fase
    fase = url.query(true).fase;
    //Increment fase
    fase = parseInt(fase) + 1;

    //Change URI
    url.removeQuery("fase");
    url.addQuery("fase", fase);

    //Redirect to new fase
    window.location.href = url.href();
  }

});
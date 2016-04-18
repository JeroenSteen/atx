// Timestamp on fase enter
var bt = new Date();
//Global url
var url;
//Passed test boolean
var passed = false;

var curUrl;
var testerID;
var state;

function getTimeStamp(time) {
  //return time.toISOString().slice(0, 19).replace('T', ' ');
  return moment(time).tz("Europe/Amsterdam").format();
}

$(document).keydown(function(e){
  //Key pressed
  var key           = e.keyCode;
  //Terms of fase
  var beginTerm     = $("#beginTerm").html();
  var endTerm       = $("#endTerm").html();
  //Correct answer to pass test
  var rightTerm     = $("#rightTerm").html();
  //Atrributes
  var branchID      = $("#branchID").html();
  var professionID  = $("#professionID").html();
  var expressionID  = $("#expressionID").html();
  var gender        = $("#gender").html();

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
    curUrl    = new URI(window.location.href);
    try {
      testerID  = curUrl.query(true).tester;
      state     = url.query(true).state;
    } catch (err) {
      /* */
    } finally {
      //User still needs to start test
      if(testerID == undefined && state != "start") return;
    }
    plainUrl      = curUrl.search("").href();

    //console.log(bt,et,m,testerID,branchID,professionID,expressionID,gender);
    //Save time, and wait
    $.post({
      url: plainUrl+'ajax/save_time.php',
      data: {
        begin_time: getTimeStamp(bt),
        end_time: getTimeStamp(et),
        milliseconds: m,
        tester: testerID,
        branch_id: branchID,
        profession_id: professionID,
        expression_id: expressionID,
        gender: gender
      },
      async: true
    });
    //return;

    //Find current URI
    url = new URI(window.location.href);
    //Find current fase
    fase = url.query(true).fase;
    //Increment fase
    fase = parseInt(fase) + 1;
    //Change URI
    url.removeQuery("fase");
    url.addQuery("fase", fase);

    //Next fase is not outside the end
    if(fase - 1 != 40) {
      //Redirect to new fase
      window.location.href = url.href();
    } else {
      plainUrl = plainUrl+"?state=finish";

      //The end, go to begin to start a new fase
      window.location.href = plainUrl;
    }

  } else {

    //Failed test fase, find test button
    var test_button = $("#testButton");
    //Animate error color on button
    test_button.addClass("red");
    //Wait for a while
    setTimeout(function(){
      test_button.removeClass("red");
    },600);

  }

});
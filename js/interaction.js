$(document).keydown(function(e){

  var key = e.keyCode;

  switch(key) {
    case 38:
      console.log("up");
      break;
    case 40:
      console.log("down");
    }
});
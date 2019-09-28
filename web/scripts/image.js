var count = 1;
setInterval(function() {
    count = ($("#butterfly :nth-child("+count+")").fadeOut().next().length == 0) ? 1 : count+1;
    $("#butterfly :nth-child("+count+")").fadeIn();
}, 3000);
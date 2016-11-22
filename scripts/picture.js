function picture_cent() {
    var cw = $('#test1').width();
    $('#test1').css({'height': cw + 'px'});
    var cw1 = $('#test2').width();
    var cw2 = $('#test2').height();
    $('#test2').css({'width': '100%'});
    var cw1 = parseInt(cw1);
    var cw2 = parseInt(cw2);
    if (cw2 > cw1) {
        var res = (cw2 - cw1) / 2;
        $('#test2').css({'top': '-' + String(res) + 'px'});
    }else if(cw2<cw1){
        var res = (cw1-cw2)/2;
        $('#test2').css({'left': '-' + String(res) + 'px'});
    }
}
picture_cent();
window.addEventListener("resize", picture_cent);

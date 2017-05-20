$(function(){
       $("input").prop('required',true);
});

$(function(){
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var $iframes = $(e.relatedTarget.hash).find('iframe');
    $iframes.each(function(index, iframe){
      $(iframe).attr("src", $(iframe).attr("src"));
    });
  });
});

$('#lol div').hide();
$('.lol').click(function(e){
        e.preventDefault();
        $('#lol div').slideToggle();
        $(this).toggleClass('active');
});

$('#hs div').hide();
$('.hs').click(function(e){
        e.preventDefault();
        $('#hs div').slideToggle();
        $(this).toggleClass('active');
});

$('#csgo div').hide();
$('.csgo').click(function(e){
        e.preventDefault();
        $('#csgo div').slideToggle();
        $(this).toggleClass('active');
});

$('#hots div').hide();
$('.hots').click(function(e){
        e.preventDefault();
        $('#hots div').slideToggle();
        $(this).toggleClass('active');
});
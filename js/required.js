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

$('#stream div').hide();
$('.game').click(function(e){
        e.preventDefault();
        $('#stream div').slideToggle();
        $(this).toggleClass('active');
});
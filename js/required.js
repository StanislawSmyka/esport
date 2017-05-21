$(function(){
       $("input").prop('required',true);
});

$(function(){
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var $iframes = $(e.relatedTarget.hash).find('iframe');
    $iframes.each(function(index, iframe){
      $(iframe).prop('src', $(iframe).prop('src'));
    });
  });
});
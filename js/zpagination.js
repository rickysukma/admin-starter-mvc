
$(document).ready(function(){var a=document.location.href.match(/\#(.*)$/);a&&$(".Zebra_Pagination a").each(function(){var b=$(this);b.attr("href",b.attr("href")+"#"+a[1])})});
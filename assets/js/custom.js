function hideFile() {
    var blockpositions = [];
    $('.block').not(this).each(function (index, elem) {
        blockpositions[index] = [$(elem).position().top, $(elem).position().left];
    });
    var thisposition = [$(this).position().top, $(this).position().left];
    $(this).hide();
    var newpositions = [];
    $('.block').not(this).each(function (index, elem) {
        newpositions[index] = [$(elem).position().top, $(elem).position().left];
    });
    $(this).show().css({
        position: 'absolute',
        top: thisposition[0],
        left: thisposition[1]
    }).hide(200);
    $('.block').not(this).each(function (tindex, telem) {
        $(telem).css({
            position: 'absolute',
            top: blockpositions[tindex][0],
            left: blockpositions[tindex][1]
        }).animate({
            top: newpositions[tindex][0],
            left: newpositions[tindex][1]
        }, 200, function () {
            $(this).css({
                position: 'static',
                top: 'auto',
                left: 'auto'
            });
        });;
    });
};









    //  Delete File or Directory
    function deleteFile() {
      $(this).parent().addClass("fadeOutUp animated");
      if (confirm('Are you sure you want to delete this?')) {
      //Delete it
      var request = $.ajax({
        url: "actions/delete.php",
        type: "POST",
        data: { path : $(this).data('path') },
        dataType: "html"
      });
      
      var that = this;
      request.done(function() {
        $(that).parent().hide("slow");
      });
   
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
      //return false; 
    } else {  
    $(this).parent().removeClass("fadeOutUp animated").addClass( "fadeInDown animated" );
    }
    }






    //  Change Directory
    function changeDirForward() {
      //$( "#loader" ).fadeIn( "slow");
      $('.blocks').addClass('fadeOutLeft animated');
      var request = $.ajax({
        url: "actions/changedir.php",
        type: "POST",
        data: { dir : $(this).data('path') },
        dataType: "html"
      });

   setTimeout(function() {
      request.done(function( response ) {
        $('html, body').animate({ scrollTop: 0 }, 0);
        $( "#directory" ).html( response );
        $('.blocks').addClass('fadeInRight animated');
      });
   }, 450);
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
      return false; 
    }


    function changeDirBackward() {
      //$( "#loader" ).fadeIn( "slow");
      $('.blocks').addClass('fadeOutRight animated');
      var request = $.ajax({
        url: "actions/changedir.php",
        type: "POST",
        data: { dir : $(this).data('path') },
        dataType: "html"
      });

   setTimeout(function() {
      request.done(function( response ) {
        $('html, body').animate({ scrollTop: 0 }, 0);
        $( "#directory" ).html( response );
        $('.blocks').addClass('fadeInLeft animated');
      });
   }, 450);
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
      return false; 
    }



    // Document Ready
    $(function () {
      $('#directory').on('click', '.js-changeDirForward', changeDirForward);
      $('#directory').on('click', '.js-changeDirBackward', changeDirBackward);
      $('#directory').on('click', '.js-deleteFile', deleteFile);
      //$('#directory').on('click', '.block', hideFile);
    });




  





//Scroll Fixed, Shrink
$(function(){
 var shrinkHeader = 15;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('header').addClass('shrink');
        }
        else {
            $('header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
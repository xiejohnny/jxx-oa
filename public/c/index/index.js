define(['text!v/index/index.html'], function(indexHTML)
{
	return {
		render : function(){
			$glbTpl.html(indexHTML);

			$('.menu-list a').on('click',function() {
		      var parent = $(this).parent();
		      var sub = parent.find('> ul');

		      if(!$('body').hasClass('left-side-collapsed')) {
		         if(sub.is(':visible')) {
		            sub.slideUp(200, function(){
		               parent.removeClass('nav-active');
		               $('.main-content').css({height: ''});
		               mainContentHeightAdjust();
		            });
		         } else {
		            visibleSubMenuClose();
		            parent.addClass('nav-active');
		            sub.slideDown(200, function(){
		                mainContentHeightAdjust();
		            });
		         }
		      }
		      return false;
		    });

		   function visibleSubMenuClose() {
		      $('.menu-list').each(function() {
		         var t = $(this);
		         if(t.hasClass('nav-active')) {
		            t.find('> ul').slideUp(200, function(){
		               t.removeClass('nav-active');
		            });
		         }
		      });
		   }

		   function mainContentHeightAdjust() {
		      // Adjust main content height
		      var docHeight = $(document).height();
		      if(docHeight > $('.main-content').height())
		         $('.main-content').height(docHeight);
		   }

		   //  class add mouse hover
		   $('.custom-nav > li').hover(function(){
		      $(this).addClass('nav-hover');
		   }, function(){
		      $(this).removeClass('nav-hover');
		   });


		   // Menu Toggle
		   $('.toggle-btn').click(function(){
		      var body = $('body');
		      var bodyposition = body.css('position');

		      if(bodyposition != 'relative') {

		         if(!body.hasClass('left-side-collapsed')) {
		            body.addClass('left-side-collapsed');
		            $('.custom-nav ul').attr('style','');

		            $(this).addClass('menu-collapsed');

		         } else {
		            body.removeClass('left-side-collapsed chat-view');
		            $('.custom-nav li.active ul').css({display: 'block'});

		            $(this).removeClass('menu-collapsed');

		         }
		      } else {

		         if(body.hasClass('left-side-show'))
		            body.removeClass('left-side-show');
		         else
		            body.addClass('left-side-show');

		         mainContentHeightAdjust();
		      }

		   });

		   $(window).resize(function(){

		      if($('body').css('position') == 'relative') {

		         $('body').removeClass('left-side-collapsed');

		      } else {

		         $('body').css({left: '', marginRight: ''});
		      }

		   });

		    // panel collapsible
		    $('.panel .tools .fa').click(function () {
		        var el = $(this).parents(".panel").children(".panel-body");
		        if ($(this).hasClass("fa-chevron-down")) {
		            $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
		            el.slideUp(200);
		        } else {
		            $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
		            el.slideDown(200); }
		    });

		    $('.todo-check label').click(function () {
		        $(this).parents('li').children('.todo-title').toggleClass('line-through');
		    });

		    $(document).on('click', '.todo-remove', function () {
		        $(this).closest("li").remove();
		        return false;
		    });

		    // panel close
		    $('.panel .tools .fa-times').click(function () {
		        $(this).parents(".panel").parent().remove();
		    });
		}
	};
});
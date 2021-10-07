// Globals
var prefixes         = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
var $timeline        = $('.timeline');
var $timelineItem    = $('.timeline-item');
var $timelineContent = $('.timeline-content');
var $hasHovered      = true;
var hideOnExit       = false;

// mouseenter event handler
$timelineItem.on('mouseenter', function(e) {
  
  var isSelected = $(this).hasClass('selected');
  
  if ( isSelected === false ) {
  
    var leftPos = $(this).position().left,
        left    = leftPos -leftPos,
        $that   = $(this);

        $timelineItem.removeClass('selected');
        $(this).addClass('selected');

    if ( $hasHovered === false ) {
      // Show Bounce

        // Set Flag
        $hasHovered = true;

        // Show DD Bounce
        showBounce(left);

        // Show DD content Bounce
        showContentBounce($that);

    } else {
      // Follow

        // Hide previous dd content
        $timelineContent.removeClass('animated fadeIn bounceIn');

        // Show hovered dd content
        $that.find($timelineContent).addClass('animated fadeIn');
    }
  }
  
});


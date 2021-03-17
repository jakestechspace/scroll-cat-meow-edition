// handles showing scroll to top button and actual scrolling
! function() {
  var scrollButton = document.querySelector('#scroll-cat-meow');

  window.addEventListener('scroll', function() {

    var scrollY = window.pageYOffset;

    if(scrollY > 200) {
      scrollButton.style.display = 'block';
    } else {
      scrollButton.style.display = 'none';
    }
  });

  scrollButton.addEventListener('click', function() {
    window.scroll({
      top: 0, 
      left: 0, 
      behavior: 'smooth' 
     });
  });
}();

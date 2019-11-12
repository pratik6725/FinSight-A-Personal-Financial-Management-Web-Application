//Smooth Scrolling

/* $('#nav-bar a, .btn').on('click', (e)=>{
    console.log('1');
    if(this.hash !== ''){
        e.preventDefault();
        console.log('2');
        const hash = this.hash;

        $('html, body').animate(
            {
            scrollTop: $(hash).offset().top - 100
            },
        800
        );
    }
});*/


//navbar opacity when scrolling
window.addEventListener('scroll', function() {
    if (window.scrollY > 150) {
      document.querySelector('#nav-bar').style.opacity = 0.9;
    }else{
      document.querySelector('#nav-bar').style.opacity = 1;
    }
  
}); 

var navMenuAnchorTags= document.querySelectorAll('.nav-menu a');
console.log(navMenuAnchorTags);
  
    navMenuAnchorTags[navMenuAnchorTags.length-1].addEventListener('click',function(event){
      event.preventDefault();
      var targetSectionId= this.textContent.trim().toLowerCase();
      var targetSection = document.getElementById(targetSectionId);
      var targetSectionCoordinates= targetSection.getBoundingClientRect();
      console.log(targetSection);
      var start=0;
     var interval = setInterval(function(){
        
       if(targetSectionCoordinates.y<=start){
          clearInterval(interval);
           return;
        } 
       start+=50;         
       window.scrollBy(0,50);
      },50);
    });


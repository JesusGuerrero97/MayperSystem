
   document.getElementById("sechead").addEventListener('click', (e) => {
       
    
       if(e.target.classList.contains('tab')){
          
            changeTab(e.target);
           
       }else if(e.target.parentElement.classList.contains('tab')){
            
           changeTab(e.target.parentElement);
       }
   });
      
      function changeTab(e){
          let tabs = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
           
           let contents = Array.prototype.slice.apply(document.querySelectorAll('.content'));
           
           let i = tabs.indexOf(e);
    
           
           contents.map(panel => panel.classList.remove('content-active'));
//          
           contents[i].classList.add('content-active');
      }

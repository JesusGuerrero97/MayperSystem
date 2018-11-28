
document.getElementById('tabs-container').addEventListener('click', (e)=> {
   
    
    if(e.target.classList.contains('tab') || e.target.classList.contains('tab-active')){
       
        changeClasses(e.target);
    
    }else if(e.target.parentElement.classList.contains('tab') || e.target.parentElement.classList.contains('tab-active')){
        
        changeClasses(e.target.parentElement);
        
    }
    
});

function changeClasses(e){

    let tabs = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
    let panels = Array.prototype.slice.apply(document.querySelectorAll('.content'));
    
    let i = tabs.indexOf(e);
        
        tabs.map(tab => tab.classList.remove('tab-active'));
        tabs[i].classList.add('tab-active');
        
        panels.map(panel => panel.classList.remove('content-active'));
        panels[i].classList.add('content-active');
    
}

function recover(i){
    let panels = Array.prototype.slice.apply(document.querySelectorAll('.content'));
    
    panels.map(panel => panel.classList.remove('content-active'));
        panels[i].classList.add('content-active');
}
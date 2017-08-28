// JavaScript Document

var clic = 1;
function divLogin(){ 
   if(clic==1){
   document.getElementById("responsive_menu_content").style.display="block";
   clic = clic + 1;
   } else{
       document.getElementById("responsive_menu_content").style.display = 'none';      
    clic = 1;
   }   
}

var clic = 1;
function divLogin1(){ 
   if(clic==1){
   document.getElementById("responsive_menu_content").style.display="none";
   clic = clic + 1;
   } else{
       document.getElementById("responsive_menu_content").style.display = 'none';      
    clic = 1;
   }  
}


var clic = 1;
function divLogin2(){ 
   if(clic==1){
   document.getElementById("responsive_menu_dropdown_content").style.display="block";
   clic = clic + 1;
   } else{
       document.getElementById("responsive_menu_dropdown_content").style.display = 'none';      
    clic = 1;
   }   
}

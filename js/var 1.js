function validate() {
     var dis = document.forms["RegForm"]["discount"];
     window.alert("Discount should be between 0 and 80"); 
      if(dis>80)
       {
         window.alert("Discount should be between 0 and 80"); 
        dis.focus(); 
        return false; 
       }
    return true;
    }

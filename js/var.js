function validate() {
     var fname = document.forms["RegForm"]["firstName"];
     var userid = document.forms["RegForm"]["userName"];
     //var pass=document.forms["RegForm"]["pwd"];
     var em=document.forms["RegForm"]["emailId"];
     var mno=document.forms["RegForm"]["mobileNo"];
     //var desease=document.forms["RegForm"]["search"];
     var add1=document.forms["RegForm"]["address"];
     var mb=mno.value;
     var emo=em.value;
     if (fname.value == "")                                  
      { 
        window.alert("Please enter your First Name."); 
        fname.focus(); 
        return false; 
      } 
     if (userid.value == "")                                  
      { 
        window.alert("Please enter user id"); 
        userid.focus(); 
        return false; 
      } 
     /* if (pass.value == "")                                  
      { 
        window.alert("Please enter password"); 
        pass.focus(); 
        return false; 
      } */
      if(mb.length!=10)
       {
         window.alert("Please select valid mobile number"); 
        mno.focus(); 
        return false; 
       }
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      if(reg.test(emo) == false)
       {
        window.alert("Please select valid email id"); 
        em.focus(); 
        return false; 
       }
       return true;
    }

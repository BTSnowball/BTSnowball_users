 function BTSULogin(){
  document.BULogin.BTSnowBallUsername.value=document.BULogin.username.value+'@@'+document.BULogin.serdm.value;
  document.BULogin.submit();
 }
 $(function() {  
    $("#checkall").click(function() {  
        $("input[@name='pdel']").each(function() {  
            $(this).attr("checked", true); 
        }); 
    }); 
    $("#delcheckall").click(function() {  
        $("input[@name='pdel']").each(function() {  
            $(this).attr("checked", false); 
        }); 
    }); 
});
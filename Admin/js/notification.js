function MyFunction(){
  
    var x=document.getElementById("msg_to").value;

        if(x=="one"){
            var all=document.getElementById("all_users");
            all.style.display="none";
            var one=document.getElementById("one_user");
            one.style.display="block";
        }
        else{
            var one=document.getElementById("one_user");
            one.style.display="none";
            var all=document.getElementById("all_users");
            all.style.display="block";
        }
        
    
}
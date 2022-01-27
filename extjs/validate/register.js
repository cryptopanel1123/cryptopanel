let registerbtn = document.getElementById("register");
console.log(registerbtn)
registerbtn.addEventListener("click",(e)=>{
    let email = document.getElementById("email");
    let pass1 = document.getElementById("pass1");
    let pass2 = document.getElementById("pass2");
    let terms = document.getElementById("terms-agree");
    // if((pass1.value.length+pass2.value.length) < 12 || (pass1.value.length+pass2.value.length) >40 || pass1.value!=pass2.value ||email.value == ''  || pass1.value == '' || pass2.value == '' || terms.checked == false){
    //        e.preventDefault();
    //         alert("INCORRECT or EMPTY INPUTS");
    // }
    let msg='';
    if((pass1.value.length+pass2.value.length) < 12 || (pass1.value.length+pass2.value.length) >40 ){
        msg+='INCORRECT PASSWORD LENGTH!\n';
    }
    if(pass1.value!=pass2.value){
        msg+='PASSWORDS DIDN\'T MATCHED\n';
    }
    if(email.value == ''  || pass1.value == '' || pass2.value == '' ){
        msg+='INPUTS CAN\'T BE EMPTY!\n';
    }
    if(terms.checked == false){
        msg+='MUST ACCEPT TERMS & CONDITIONS\n';
    }
    if(msg!=''){
        e.preventDefault();
        alert(msg);
    }
});
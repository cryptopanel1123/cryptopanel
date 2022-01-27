let passbtn = document.getElementById("password");
console.log(passbtn);
passbtn.addEventListener("click",(e)=>{
    let pass1 = document.getElementById("pass1");
    let pass2 = document.getElementById("pass2");
    let msg='';
    if(pass1.value.length < 6 || pass1.value.length > 20 ){
        msg+='INCORRECT PASSWORD LENGTH!\n';
    }
    if(pass2.value == ''  || pass1.value == ''){
        msg+='INPUTS CAN\'T BE EMPTY!\n';
    }
    if(pass1.value!=pass2.value){
        msg+='PASSWORDS DIDN\'T MATCHED!\n';
    }
    if(msg!=''){
        e.preventDefault();
        alert(msg);
    }
});
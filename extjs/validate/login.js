let loginbtn = document.getElementById("login");
console.log(loginbtn);
loginbtn.addEventListener("click",(e)=>{
    let email = document.getElementById("email");
    let pass1 = document.getElementById("pass1");
    let msg='';
    if(pass1.value.length < 6 || pass1.value.length > 20 ){
        msg+='INCORRECT PASSWORD LENGTH!\n';
    }
    if(email.value == ''  || pass1.value == ''){
        msg+='INPUTS CAN\'T BE EMPTY!\n';
    }
    if(msg!=''){
        e.preventDefault();
        alert(msg);
    }
});
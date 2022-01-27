let forgotbtn = document.getElementById("forgot");
console.log(forgotbtn);
forgotbtn.addEventListener("click",(e)=>{
    let email = document.getElementById("email");
    let msg='';
    if(email.value == ''){
        msg+='INPUTS CAN\'T BE EMPTY!\n';
    }
    if(msg!=''){
        e.preventDefault();
        alert(msg);
    }
});
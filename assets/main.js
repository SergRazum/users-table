let birthdayBtn = document.querySelectorAll('button.showBirthday');
birthdayBtn.forEach((e)=>{    
    e.addEventListener('click', ()=>{
    
        let id_user = e.parentElement.parentElement.children[0].textContent;
        let fio_user = e.parentElement.parentElement.children[1].textContent;
 
        const ajax = new XMLHttpRequest();
        const url = "../vendor/birthday.php";
        const params = "id_user=" + id_user+ "&fio_user=" + fio_user;
        ajax.open("POST", url, true); 
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         
        ajax.addEventListener("readystatechange", () => {
            if(ajax.readyState === 4 && ajax.status === 200) {       
                e.classList.add("none");
                e.parentElement.parentElement.children[2].textContent=ajax.responseText;
            }
        });
         
        ajax.send(params);

    });
});















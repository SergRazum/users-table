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

let btn = document.querySelectorAll('.swall');
btn.forEach((e)=>{ 
e.addEventListener('click', ()=>{
    let id = e.parentElement.parentElement.children[0].textContent;
    let name = e.parentElement.parentElement.children[1].textContent;
    let birthday = e.parentElement.parentElement.children[2].textContent;
    let created = e.parentElement.parentElement.children[3].textContent;
    let updated = e.parentElement.parentElement.children[4].textContent;
    
    Swal.fire({
        title: 'Изменение записи в таблице',
        html:
        `<p>Имя</p> <input id = "name" type="text" name="name" value="${name}"> ` +
        `<p>День рождения</p > <input id = "birthday" type="date" name="birthday" value="${birthday}"> ` +
        `<p>Создание</p> <input id = "created" type="datetime-local" name="created" value="${created}"> ` +
        `<p>Обновление</p> <input id = "updated" type="datetime-local" name="updated" value="${updated}">`,
        focusConfirm: false,
        confirmButtonColor: "#1FAB45",
        confirmButtonText: "Сохранить",
        showCancelButton: true,
        cancelButtonColor: '#3085d6',
        cancelButtonText: "Отменить",
        buttonsStyling: true,

        preConfirm: () => {
          return [
            id = e.parentElement.parentElement.children[0].textContent,
            name = document.getElementById('name').value,
            birthday = document.getElementById('birthday').value,
            created = document.getElementById('created').value,
            updated = document.getElementById('updated').value,
        ]}

    }).then(
        (result) => {
            if (result.isConfirmed) {
            request = new XMLHttpRequest();
            url = "vendor/update.php";
            params = "id=" + id + "&name=" + name + "&birthday=" + birthday + "&created=" + created + "&updated=" + updated;
            request.open("POST", url, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.addEventListener("readystatechange", () => {
                if(request.readyState === 4 && request.status === 200) {       
                    // console.log(request.responseText);
                    swal.fire(
                        "Успешно!",
                        "Изменения были сохранены!",
                        "success"
                    )
                }
                else{
                    swal.fire(
                        "Internal Error",
                        "Oops, your note was not saved.",
                        "error"
                        )
                }
            });
            request.send(params);
            }
            else if (result.dismiss === Swal.DismissReason.cancel) {
                swal.fire(
                    'Отмена',
                    'Изменения не были сохранены',
                    'warning'
            )}
        }).catch(swal.noop);
});
})
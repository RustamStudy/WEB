document.getElementById('closeOrderFrom').onclick = () => {
    document.getElementsByClassName('popup')[0].classList.add('hidden');
}

let tr = document.querySelectorAll('.table tbody tr');
let trOrder = document.getElementsByClassName('table-tr__order');
let order = 0;
let orderArrayId = 0;

for (let i = 0; i < tr.length; i++) {
    let places = [];
    tr[i].onclick = () => {
        document.getElementsByClassName('popup')[0].classList.remove('hidden');
        order = tr[i].getAttribute('idord');

        for (let j = 0; j < trOrder.length; j++) {
            if (trOrder[j].getAttribute('idord') == order) {
                orderArrayId = j
            }
        }
        adminOrder.textContent = trOrder[orderArrayId].getElementsByTagName('td')[0].innerText +
            ' от ' + trOrder[orderArrayId].getElementsByTagName('td')[1].innerText;
        adminName.textContent = trOrder[orderArrayId].getElementsByTagName('td')[2].innerText;
        adminPhone.textContent = trOrder[orderArrayId].getElementsByTagName('td')[3].innerText;
        adminMail.textContent = trOrder[orderArrayId].getElementsByTagName('td')[4].innerText;
        adminFilm.textContent = trOrder[orderArrayId].getElementsByTagName('td')[5].innerText;
        adminTime.textContent = trOrder[orderArrayId].getElementsByTagName('td')[7].innerText;
        places = '';
        places = [];
        for (let j = 0; j < document.getElementsByClassName('table-tr__place').length; j++) {
            if (document.getElementsByClassName('table-tr__place')[j].getAttribute('idord') == tr[i].getAttribute('idord')) {
                places.push({
                    'id': tr[i].getAttribute('idord'),
                    'idPlaces': document.getElementsByClassName('table-tr__place')[j].getElementsByTagName('td')[1].getAttribute('idPlac'),
                    'places': document.getElementsByClassName('table-tr__place')[j].getElementsByTagName('td')[1].innerText
                })

            }
        }
        let element = '';
        placeArr.innerHTML = '';
        for (let j = 0; j < places.length; j++) {

            element += "<div class='filmTicetInfo'>";
            element += "<label id = 'label'>Место</label>";
            element += `<input class = 'numPlaces' idBases = '${places[j].idPlaces}' value = '${places[j].places}'>`;
            element += "<button class = 'editPlaces'>Редактировать</button>";
            element += "<button class = 'deletePlaces'>Удалить</button>";
            element += "</div>";

        }
        placeArr.insertAdjacentHTML('beforeEnd', element);
        clicki()
    }

}
function clicki() {
    let editButon = document.getElementsByClassName('editPlaces');
    let editInputBase
    for (let i = 0; i < editButon.length; i++) {
        editButon[i].onclick = () => {
            let editInput = editButon[i].parentElement.getElementsByClassName('numPlaces')[0];
            editInputBase = [editInput.value, editInput.getAttribute('idBases')];
            $.post(
                "./index.php",
                {
                    method: "edit",
                    id1: editInputBase[0],
                    id2: editInputBase[1],
                },
                function (data) {
                    location.reload();
                }
            )
        }
    }
    let deleteButon = document.getElementsByClassName('deletePlaces');
    let deleteInputBase
    for (let i = 0; i < editButon.length; i++) {
        deleteButon[i].onclick = () => {
            let deleteInput = editButon[i].parentElement.getElementsByClassName('numPlaces')[0];
            deleteInputBase = [deleteInput.getAttribute('idBases')];
            console.log(deleteInputBase);
            $.post(
                "./index.php",
                {
                    method: "delete",
                    id1: deleteInputBase[0]
                },
                function (data) {
                    location.reload();
                }
            )
        }
    }

}
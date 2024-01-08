let searchInput = document.getElementById("search");
let datalist = document.getElementById("filteredEventOptions");
searchInput.addEventListener('keyup', function () {
    while (datalist.lastChild) {
        datalist.removeChild(datalist.lastChild);
    }
    console.log(searchInput.value);
    fetch("/event/filter"  ,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
                'url': '/event/filter',
                "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
            body: JSON.stringify({
                "nonFilteredEvent": searchInput.value
            })
        }).then(res => res.json()).then(data => {

        for (let i = 0; i < data.filterEventNames.length; i++) {
            console.log("data: " + data.filterEventNames[i].event_name);
            let option = document.createElement("option");
            // option.setAttribute("hidden", data[i].client_id);
            // option.setAttribute("value", data[i].name);
            option.innerText = data.filterEventNames[i].event_name;
            datalist.appendChild(option);
        }
    });
})

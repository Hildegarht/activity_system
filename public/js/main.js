
var add_task = document.getElementById("add_task");
add_task.addEventListener("click", (event) => {
    document.querySelector(".center-pop").style.display = "flex"
    AOS.init();
})

// var search_task = document.getElementById("date_search_task");
// search_task.addEventListener("submit", async (event) => {
//     event.preventDefault();

//     var formData = new FormData(search_task);
//     var url = search_task.getAttribute("action");

//     let response = await fetch(url, {
//         method: "POST",
//         mode: 'cors',
//         cache: 'no-cache',
//         body: formData,
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//             'X-CSRF-Token':formData.get("_token")
//             // 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//     });

//     if(response.ok) {
//         console.log(response.body);
//     } else {
//         console.log("error")
//     }
// })


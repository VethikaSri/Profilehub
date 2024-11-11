function saveData(){
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    console.log(username + " " + password);

    // localStorage.setItem("username", username);
    // localStorage.setItem("password", password);

    let user_records = new Array();
    user_records = JSON.parse(localStorage.getItem("users"))? JSON.parse(localStorage.getItem("users")):[]
    user_records.push({
        "username" : username,
        "password" : password
    }),
    localStorage.setItem("users", JSON.stringify(user_records));
}

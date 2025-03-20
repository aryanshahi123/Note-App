function checklogin() {
    let x = document.getElementById("user").value;
    let y = document.getElementById("pwd").value;

    if (x.trim() == "" || y.trim() == "") {
        alert("Values cannot be empty.");
        return false;
    } else {
        return true;
    }
}

function checksignup(){
    let x = document.getElementById("user").value;
    let y = document.getElementById("pwd").value;
    let z = document.getElementById("cpwd").value;

    if (x.trim() == "" || y.trim() == "" || z.trim() == "") {
        alert("Values cannot be empty.");
        return false;
    } else if(y !== z){
        alert("Passwords do not match!");
        return false;
    } else if(y.length<6)
        {
            alert("Passwords cant be shorter than 6 characters.");
        return false;
        }
        else{
        return true;
    }
}

function checkentry(){
    let title = document.getElementById("title").value;
    let body = document.getElementById("text-area").value;

    if(title.trim()==""||body.trim()==""){
        alert("Please fill the fields.");
        return false;
    }else if(title.length>50){
        alert("Title cannot be longer than 50 characters.");
        return false;
    }else if(body.length>500){
        alert("Content cannot be longer than 500 characters.");
        return false;
    }else{
        return true;
    }
}
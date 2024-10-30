let logoutbtn;
let loginbtn;
let loginbox;
let closebtn;
let post;
let test;
let indivpost;

function init() {
    loginbtn = document.getElementById("login");
    logoutbtn = document.getElementById("logout");
    loginbox = document.getElementById("logbox");
    closebtn = document.getElementById("close");

    if (logoutbtn) {
        username = logoutbtn.textContent; 
        logoutbtn.addEventListener("mouseover", logout);
        logoutbtn.addEventListener("mouseleave", logoutexit);
    }

    if (loginbtn) loginbtn.addEventListener("click", login);

    if (closebtn) closebtn.addEventListener("click", close);


    logoutbtn.onclick = function() {
        fetch('logout.php')
            .then(response => {
                if (response.ok) {
                    window.location.href = 'index.php';
                }
            })
            .catch(error => console.error('Error:', error));
    };
}

window.addEventListener("load", init);

post = document.querySelectorAll(".post");

for (let i = 0; i < post.length; i++){
    post[i].addEventListener("click", openpage);
}

function openpage(){
    postData = this;
    localStorage.setItem("post-data", postData.outerHTML);
    window.location.href = "post.html";
}

function login() {
    loginbox.style.display = "unset";
}

function logout() {
    logoutbtn.textContent = "LOGOUT";
}

function logoutexit() {
    logoutbtn.textContent = username; 
}

function close() {
    loginbox.style.display = "none";
}



var btn = document.querySelectorAll(".btn");
for(var i =0;i<btn.length;i++){
    var modal = document.querySelector(".modal");
    var iconclose = document.querySelector(".close");
    btn[i].addEventListener("click", show);
    function show(){
        modal.classList.add("activemodal");
    };
    iconclose.onclick = function(){
        modal.classList.remove("activemodal");
    };
}

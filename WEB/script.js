const sleep = ms => new Promise(r => setTimeout(r, ms));

function createItem(){
    const rouletteItem = document.createElement("i");
    rouletteItem.setAttribute("class","roulette-item");
    x = Math.floor(Math.random()*37);
    if(x == 0){
        rouletteItem.style.backgroundColor = "var(--green-color)";
    }
    else if(x >19){
        rouletteItem.style.backgroundColor = "var(--black-color)";
    }
    else {
        rouletteItem.style.backgroundColor = "var(--red-color)";
    }
    return rouletteItem

}

async function spin(){
    for(var i = 0; i < 5; i++){
        for(var i = 0; i < 9; i++){
            await sleep(100*i);
            var rouletteItem = createItem();
            const roulette = document.getElementById('roulette');
            roulette.appendChild(rouletteItem);
        }
    document.getElementsByClassName("roulette-item").remove();
}
}
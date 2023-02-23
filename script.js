const sleep = ms => new Promise(r => setTimeout(r, ms));

var numbers = [0,32,15,19,4,21,2,25,17,34,6,27,13,36,11,30,8,23,10,5,24,16,33,1,20,14,31,9,22,18,29,7,28,12,35,3,26];

function createItem(x){

    var rouletteItem = document.createElement("div");
    rouletteItem.setAttribute("class","roulette-item");

    var number=document.createTextNode(x);
    rouletteItem.appendChild(number);

    return rouletteItem
}

function getRandomInt(min,max){
    return Math.floor(Math.random()*(max-min+1)+min);
}

async function spin(){

    var roulette = document.getElementById("roulette");

    var randomInt=getRandomInt(36,72);

        for(var i=0;i<randomInt;i++){
            var index=i
            if(i>36){
                index=i-37;
            }


            var rouletteItem=createItem(numbers[index]);

            if(index==0){
                rouletteItem.style.backgroundColor="var(--green-color)";
            }
            else if(index%2==0){
                rouletteItem.style.backgroundColor="var(--black-color)";
            }
            else if(index%2!=0){
                rouletteItem.style.backgroundColor="var(--red-color)";
            }
            
            roulette.appendChild(rouletteItem);
            roulette.firstChild.remove();
            await sleep(5*i);
        }

}

const sleep = ms => new Promise(r => setTimeout(r, ms));

function createItem(x){

    const rouletteItem = document.createElement("div");
    rouletteItem.setAttribute("class","roulette-item");

    if(x==00){
        rouletteItem.style.backgroundColor = "var(--green-color)";
    }
    else if(x%2==0){
        rouletteItem.style.backgroundColor = "var(--red-color)";
    }
    else{
        rouletteItem.style.backgroundColor = "var(--black-color)";
    }
    var number=document.createTextNode(x)
    rouletteItem.appendChild(number);
    return rouletteItem

}

function createNumber(n){
    var x=[];
    var y=[];
    for(var i=0;i<n;i++){
        if(i%2==0){
            x.push(i);
        }else{
            y.push(i);
        }
    }
    return [x,y]
}

async function spin(){
    let numberArray=createNumber(36);
    let evenNumbers=numberArray[0];
    let oddNumbers=numberArray[1];

        for(var i =0;i<45;i++){
            if(i%36==0){
                var evenNumbersClone = [...evenNumbers];
                var oddNumbersClone = [...oddNumbers];
            }

            if(i%2==0){
                var x=evenNumbersClone
            }
            else{
                var x=oddNumbersClone
            }
            var RandomInt=Math.floor(Math.random()*x.length);
            await sleep(10*i);
            var rouletteItem = createItem(x[RandomInt]);
            x.splice(RandomInt,1);
            const roulette = document.getElementById('roulette');
            roulette.appendChild(rouletteItem);
            roulette.firstChild.remove();
        }
}
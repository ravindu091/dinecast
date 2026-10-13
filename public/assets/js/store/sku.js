const generateButton = document.getElementById('generate-sku');
const ingredientInput = document.getElementById('ing-name');
const skuInput = document.getElementById('sku-number');

generateButton?.addEventListener("click",async ()=>{
    console.log('Clicked the generate button');
    
    const name = ingredientInput.value.trim();
    
    const categorySku = categoryInput.dataset.sku;

    if(!name || !categorySku){
        alert("select a category and enter an ingredient");
        return;
    }

    generateButton.disabled = true;

    try{
        skuInput.value = await generateSku(name , categorySku);

    }catch(error){
        console.log(error);
        alert("unable to generate sku");
    }finally{
        generateButton.disabled = false;
    }
})


async function generateSku(ingredient , categorySku){
    
    ingredient = ingredient.split(" ");
    ingredientFamily = ( ingredient.length > 1) ? ingredient[1] : ingredient[0];


    sku = categorySku + "-" + ingredientSku(ingredientFamily);

    const prefix = `${categorySku}-${ingredientSku(ingredientFamily)}`;
    const existingIngredients = await getIngredientsBySku(prefix);

    const sequence = String(existingIngredients.length + 1).padStart(3, "0");

    return `${prefix}-${sequence}`;
}

function ingredientSku(ingredient){
    if(ingredient.length < 1){
        return "error";
    }else if(ingredient.length <2){
        return ingredient + "XX";
    }else if(ingredient.length < 3){
        return ingredient + "X";
    }else{

        let sku = ingredient.slice(0,3);
        //Random Position
        // const randomPosition = Math.floor(Math.random() * (ingredient.length - 2)) + 1;

        // sku += ingredient[randomPosition];
        // sku += ingredient.at(-1);

        return sku.toUpperCase();

    }
    

}

async function getIngredientsBySku(sku){
    const baseUrl = window.BASE_URL || '/dinecast';
    const uri = `${baseUrl}/ingredient/sku/${encodeURIComponent(sku)}`;

    const response = await fetch(uri);

    if(!response.ok){
        throw new Error(`HTTP error when get ingredient list by sku! Status: ${response.status}`);
    }

    
    

    return await response.json();
}



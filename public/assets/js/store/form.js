
//add ingredient form category selection

const categoryDropdown = document.getElementById("category-dropdown");
const dropdownMenu = document.getElementById("dropdown-menu")
const dropdownMenuButton = document.getElementById("dropdown-button");
const categoryInput = document.getElementById("category-input");
const categorySearch = document.getElementById("category-search");
const categoryOptions = document.querySelectorAll(".dropdown-option");
const selectedCategory = document.getElementById("selected-category")

if (dropdownMenu && dropdownMenuButton && categorySearch) {
dropdownMenuButton.addEventListener('click',()=>{
    dropdownMenu.classList.toggle('active');
    if(dropdownMenu.classList.contains("active")){
        categorySearch.focus()
        
    }

});

categorySearch.addEventListener('input', (event)=>{
    const searchText = event.target.value.toLowerCase().trim();
    console.log(searchText);
    categoryOptions.forEach(option =>{
        const searchableText = option.textContent.toLowerCase().trim();
        console.log(searchableText);
        option.style.display = searchableText.includes(searchText) ? "flex" : "none";
    });

});

categoryOptions.forEach(option =>{
    option.addEventListener("click" , ()=>{
        selectedCategory.textContent = option.querySelector('span').textContent;
        categoryInput.value = option.dataset.value;
        categorySearch.value = "";
        dropdownMenu.classList.remove("active");

        categoryOptions.forEach(item =>{
            item.style.display = "flex";
        })
    })
})


}
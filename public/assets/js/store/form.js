
//add ingredient form category selection
// function setupCategoryDropdown(config){
//     const root = document.getElementById(config.rootId);
//     const button = document.getElementById(config.buttonId);
//     const menu = document.getElementById(config.menuId);
//     const search = document.getElementById(config.searchId);
//     const hiddenInput = document.getElementById(config.inputId);
//     const selectedText = document.getElementById(config.selectedId);

//     if(!root || !button || !menu || !search || !hiddenInput || !selectedText){
//         return null;
//     }

//     const options = root.querySelectorAll('.dropdown-option');

//     function showAllOption(){
//         options.forEach(option =>{
//             option.style.display = 'flex';
//         });
//     }

//     function closeMenu(){
//         menu.classList.remove('active');

//         search.value = '';
//         showAllOption();
//     }

//     button.addEventListener('click',()=>{
//         const isOpen = menu.classList.toggle('active');

//         if(isOpen){
//             search.focus();
//         }
//     });

//     search.addEventListener('input',()=>{
//         const term = search.value.toLowerCase.trim();

//         options.forEach(option =>{
//             const searchableText = option.dataset.search;

//             option.style.display =  searchableText.includes(term) ? 'flex' : 'none';


//         });
//     });

//     options.forEach(option => {
//         option.addEventListener('click', ()=>{
//             hiddenInput.value = option.dataset.value;
//             selectedText.textContent = option.querySelector('span').textContent.trim();

//             closeMenu();
//         })
//     })

//     return{
//         select(categoryId){
//             const selectedOption = []
//         }
//     }
// }
const categoryDropdown = document.getElementById("category-dropdown");
const dropdownMenuButton = document.getElementById("dropdown-button");
const dropdownMenu = document.getElementById("dropdown-menu")
const categorySearch = document.getElementById("category-search");
const categoryInput = document.getElementById("category-input");
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
        categoryInput.dataset.sku = option.dataset.sku;
        
        categorySearch.value = "";
        dropdownMenu.classList.remove("active");

        categoryOptions.forEach(item =>{
            item.style.display = "flex";
        })
    })
})


}
const dropdownMenu = document.querySelector('#dropdownMenuButton')
const checkboxes = document.querySelectorAll('div[class="dropdown-menu"]')

dropdownMenu.addEventListener('click',afficherFiltre)

function afficherFiltre(){
   if(dropdownMenu.value === "desactive"){
       dropdownMenu.value = "active"
       checkboxes.forEach(checkbox => {
           checkbox.style.visibility = 'hidden';
       })
   } else {
       dropdownMenu.value = "desactive"
       checkboxes.forEach(checkbox => {
           checkbox.style.visibility = 'visible';
       })
   }
}
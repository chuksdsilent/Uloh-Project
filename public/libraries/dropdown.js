//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var dropdownContainer = document.getElementsByClassName("dropdown-container");

var i;
var pathname = window.location.pathname;
console.log(pathname);
for(i =0; i < dropdownContainer.length; i++){
    dropdownContainer[i].style.display = "block";

}
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    console.log(this.nextElementSibling);
  var dropdownContent = this.nextElementSibling;
    this.classList.toggle("active");
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
} 
const cancelButton = document.getElementById("cancel-button");
const suppressButton = document.getElementById("suppress");
const confirmSuppressContainer = document.getElementById("confirm-container");
const confirmSuppressButton = document.getElementById("confirm-suppress-btn");
const closeModalBtn = document.querySelector(".close");


let clientIdInput = document.querySelector("#client-id");
let firstNameInput = document.querySelector("#first_name");
let LastNameInput = document.querySelector("#last_name");
let addressInput = document.querySelector("#address");
let telephoneInput = document.querySelector("#tel");
let dateInput = document.querySelector("#date");



try {
cancelButton.addEventListener("click", () => {
    window.location.href='index.php';
});


suppressButton.addEventListener("click", () => {
    confirmSuppressContainer.style.display = "flex";  
});

confirmSuppressButton.addEventListener("click", () => {
    confirmSuppressContainer.style.display = "none"; 
});

closeModalBtn.addEventListener("click", () => {confirmSuppressContainer.style.display = "none";})

window.onclick = function(event) {
    if (event.target == confirmSuppressContainer) {
        confirmSuppressContainer.style.display = "none";
    }
    }
} catch {
    console.log("erreur");
}





try{
    const fp = flatpickr(dateInput, {
        altInput: true,
        altFormat: "d / m / Y",
        minDate: new Date().fp_incr(2),
        maxDate: "2025-06"
    });

} catch(error) {
    console.log("erreur");
   
}

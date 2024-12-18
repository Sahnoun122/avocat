const modal = document.querySelector("#crud-modal");
let isclick = true;
let btn = function() {
    if (isclick == 1) {
        modal.style.display = "block";
        isclick = 0;
    } else {
        modal.style.display = "none";
        isclick = 1;
    }
}

const dueDate = document.getElementById('mindate');
        function mindate() {
          const today = new Date().toISOString().split('T')[0];
          dueDate.setAttribute('max', today);
      }

      mindate();

      const datemax= document.getElementById('maxdate');
        function maxdate() {
          const today = new Date().toISOString().split('T')[0];
          datemax.setAttribute('min', today);
      }

      maxdate();







      document.getElementById("myForm").addEventListener("submit", function(event) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const phonePattern = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
    
        const email = document.getElementById("floating_email").value;
        const phone = document.getElementById("floating_phone").value;
        const password = document.getElementById("floating_password").value;
        const confirmPassword = document.getElementById("floating_repeat_password").value;
    
        if (!email.match(emailPattern)) {
            alert("L'adresse email est invalide.");
            event.preventDefault();
        }
        if (!phone.match(phonePattern)) {
            alert("Le numéro de téléphone est invalide.");
            event.preventDefault();
        }
        if (!password.match(passwordPattern)) {
            alert("Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, et faire au moins 8 caractères.");
            event.preventDefault();
        }
        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas.");
            event.preventDefault();
        }
    });
    
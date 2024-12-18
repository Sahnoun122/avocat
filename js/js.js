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

    
 
//      function validation(){

//     const emailInput = document.getElementById('email').value;
//     const phoneInput = document.getElementById('phone').value;
//     const passwordInput = document.getElementById('password').value;
//     const nameInput = document.getElementById('nom').value;
//     const prenomInput = document.getElementById('prenom').value;

//     const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//     const phoneRegex = /^\+?\d{10,15}$/;
//     const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
//     const nameRegex = /^[a-zA-ZÀ-ÿ]+(?:[-' ]?[a-zA-ZÀ-ÿ]+)*$/;



//         let valid = true;

//         if (!emailRegex.test(emailInput)) {
//              document.getElementById('alert-nom').innerHTML = "Le email doit comporter @.";
//              document.getElementById('alert-nom').className="text-sm text-red-600 font-light"
//             valid = false;
//         }

//         if (!phoneRegex.test(phoneInput)) {
//               document.getElementById('alert-phone').innerHTML = "entre votr numero de telephone.";
//              document.getElementById('alert-phone').className="text-sm text-red-600 font-light"
//             valid = false;
//         }

//         if (!passwordRegex.test(passwordInput)) {
//               document.getElementById('alert-password').innerHTML = "le mot de paase doit etre fort.";
//              document.getElementById('alert-password').className="text-sm text-red-600 font-light"
//             valid = false;
//         }

//         if (!nameRegex.test(nameInput)) {
//               document.getElementById('alert-nom').innerHTML = "Le nom doit comporter entre 2 et 50 lettres uniquement.";
//              document.getElementById('alert-nom').className="text-sm text-red-600 font-light"
//             valid = false;
//         }
//         if (!nameRegex.test(prenomInput)) {
//             document.getElementById('alert-prenom').innerHTML = "Le prenom doit comporter entre 2 et 50 lettres uniquement.";
//            document.getElementById('alert-prenom').className="text-sm text-red-600 font-light"
//              valid = false;
//       }

//    }
//    document.getElementById('add-form').addEventListener('submit', function (e) {
//     if (!validation()) {
//       e.preventDefault(); 
//     }
//   });



<?php
include '../conn.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role'];
    $specialite = $_POST['specialite'];
    $anne_experience = $_POST['anne_experience'];
    $biographie = $_POST['biographie'];
    $email = $_POST['email'];
    $password = $_POST['passworrd'];
    $cpassword = $_POST['cpassworrd'];
    $phone = $_POST['phone'];

    if ($password != $cpassword) {
        // $error[] = 'Les mots de passe ne correspondent pas.';
        echo "Password Unmatched !";
    } else {
        echo "Password Matched !";
        $select = "SELECT * FROM useer WHERE email = '$email'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'Utilisateur déjà existant';
        } else {
            if ($role == "Client") {
                $insert = "INSERT INTO useer (nom, prenom, role, email, passworrd, telephone, cpassworrd) VALUES ('$nom', '$prenom', '$role', '$email', '$password', '$phone', '$password')";

                if (mysqli_query($conn, $insert)) {
                    header('Location: connecter.php');
                    exit;
                } else {
                    echo "L'insertion dans la base de données a échoué Client.";
                }
            } else if ($role == "Avocat") {

                $admin = 'admin';
                
                $insert = "INSERT INTO useer (nom, prenom, role, email, passworrd, telephone, cpassworrd) VALUES ('$nom', '$prenom', '$admin', '$email', '$password', '$phone', '$password')";

                if (mysqli_query($conn, $insert)) {
                    $user_id = mysqli_insert_id($conn); 
                    $insert1 = "INSERT INTO avocat (specialites, annes_exp, biograghie, id) VALUES ('$specialite', '$anne_experience', '$biographie', '$user_id')";

                    if (mysqli_query($conn, $insert1)) {
                        header('Location: connecter.php');
                        exit;
                    } else {
                        echo mysqli_error($conn);
                        // echo "L'insertion dans la table avocat a échoué Avocat.";
                    }
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                $error[] = "Rôle invalide.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>insrire</title>
</head>

<body>






    <form class="max-w-md mx-auto mt-10" id="add-form" method="POST" action="">
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo"<span class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400'>".$error."</span>";
            };
        }
        ?>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">nom</label>
                <span id="alert-nom"></span>

            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="prenom" id="prenom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">prenom</label>
                <span id="alert-prenom"></span>

            </div>
        </div>

        <div>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">identifie</label>
            <select id="select-role" name="role" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option>Client</option>
                <option>Avocat</option>

            </select>
        </div>

        


        <div class="hidden mt-5" id="infos-avocat">



            <div class="relative z-0 w-full mb-5 group">
                <input type="text" id="base-input" name="specialite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="base-input" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">specialite</label>
            </div>
            <div>
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">anne d'expèrience</label>
                <input type="text" id="small-input" name="anne_experience" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>



            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">biographie</label>
            <textarea id="message" rows="4" name="biographie" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>


        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">email</label>
            <span id="alert-email"></span>

        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="passworrd" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">mot de passe</label>
            <span id="alert-password"></span>

        </div>


        
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="cpassworrd" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> confirme mot de passe </label>
            <span id="alert-password"></span>

        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">telephone</label>
                <span id="alert-phone"></span>

            </div>

        </div>
        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>




    <!-- <script>
        function validation() {

            const emailInput = document.getElementById('email').value;
            const phoneInput = document.getElementById('phone').value;
            const passwordInput = document.getElementById('password').value;
            const nameInput = document.getElementById('nom').value;
            const prenomInput = document.getElementById('prenom').value;

            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phoneRegex = /^\+?\d{10,15}$/;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const nameRegex = /^[a-zA-ZÀ-ÿ]+(?:[-' ]?[a-zA-ZÀ-ÿ]+)*$/;



            let valid = true;

            if (!emailRegex.test(emailInput)) {
                document.getElementById('alert-nom').innerHTML = "Le email doit comporter @.";
                document.getElementById('alert-nom').className = "text-sm text-red-600 font-light"
                valid = false;
            }

            if (!phoneRegex.test(phoneInput)) {
                document.getElementById('alert-phone').innerHTML = "entre votr numero de telephone.";
                document.getElementById('alert-phone').className = "text-sm text-red-600 font-light"
                valid = false;
            }

            if (!passwordRegex.test(passwordInput)) {
                document.getElementById('alert-password').innerHTML = "le mot de paase doit etre fort.";
                document.getElementById('alert-password').className = "text-sm text-red-600 font-light"
                valid = false;
            }

            if (!nameRegex.test(nameInput)) {
                document.getElementById('alert-nom').innerHTML = "Le nom doit comporter entre 2 et 50 lettres uniquement.";
                document.getElementById('alert-nom').className = "text-sm text-red-600 font-light"
                valid = false;
            }
            if (!nameRegex.test(prenomInput)) {
                document.getElementById('alert-prenom').innerHTML = "Le prenom doit comporter entre 2 et 50 lettres uniquement.";
                document.getElementById('alert-prenom').className = "text-sm text-red-600 font-light"
                valid = false;
            }

        }
        document.getElementById('add-form').addEventListener('submit', function(e) {
            if (!validation()) {
                e.preventDefault();
            }
        });
    </script> -->




    <script>
        const selectRole = document.getElementById('select-role');
        const infosAvocat = document.getElementById('infos-avocat');

        selectRole.addEventListener('change', function(){
            let role = selectRole.value;

            if(role === 'Client'){
                infosAvocat.classList.add('hidden');
            }else{
                infosAvocat.classList.remove('hidden');
            }
        })
    </script>

    
</body>

</html>
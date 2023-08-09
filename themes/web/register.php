<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?= url("/assets/web/images/icons/favicon.png")?>"/>
<style>
  /* Estilos gerais */
  body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
  }

  .login-page {
    display: block;
    overflow: hidden;
    border: 1px solid #ccc;
    width: 50%;
    margin: 0 auto;
    text-align: center;
    border-radius: 3px;
}
.login-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .login-title {
    text-align: center;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 30px;
}
.login-btn {
    padding: 10px 30px;
    border: 1px solid #005146;
    background: #005146;
    color: #fff;
    transition: 0.4s;
    font-size: 15px;
    font-weight: 700;
    border-radius: 2px;
    text-transform: uppercase;
    display: block;
    width: 100%;
}
.login-btn:hover{
    border: 1px solid #005146;
    background: transparent;
    color: #005146;
    transition: 0.4s;
}
.flex-box{
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
}

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }

  button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  button:hover {
    background-color: #45a049;
  }

  p {
    text-align: center;
    margin-top: 15px;
  }

  a {
    color: #005146;
    text-decoration: none;
  }

  /* Responsividade */
  @media (max-width: 480px) {
    form {
      padding: 10px;
    }
  }
  .message-container {
    font-size: 14px;
    margin-top: 10px;
    padding: 10px;
    border-radius: 3px;
    text-align: center;
    width: 100%;
  }

  .success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>	
<div class="row">
<div class="login-form ">
<h4 class="login-title ">REGISTER</h4>
<form>
    <div>
        Nome: <input name="name" type="text">
    </div>
    <div>
        E-mail: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="password">
    </div>
    <div>
    <button type="submit" id="submit" class="login-btn">Enviar</button>
    </div>
    <div class="message-container"></div> 
    <p> Ja é cadastrado? <a href="<?= url("/login")?>">Login</a> </p>
    </div>
</form>
      
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" async>
    const form = document.querySelector("form");
    const headers = {
        email: "fabiosantos@ifsul.edu.br",
        password: "12345678"
    };

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const data = await fetch(`<?= url("api/user");?>`, {
            method: "POST",
            body: new FormData(form),
            headers: headers
        });

        const response = await data.json();
        
        const nameInput = form.querySelector("input[name='name']");
    const emailInput = form.querySelector("input[name='email']");
    const passwordInput = form.querySelector("input[name='password']");

    const name = nameInput.value;
    const email = emailInput.value;
    const password = passwordInput.value;

        const messageContainer = document.querySelector(".message-container");


        if (response.success && response.success.user) {
            console.log(response.success.user);
            showMessage("Email cadastrado com sucesso!", "success");
           resetFormFields([nameInput, emailInput, passwordInput]);
    } else {
      console.log("Error: User data not available.");
      showMessage("Erro: O email já está cadastrado.", "error");
    }
  });

  function showMessage(message, type) {
    const messageContainer = document.querySelector(".message-container");
    messageContainer.innerHTML = message;
    messageContainer.classList.remove("success", "error");
    messageContainer.classList.add(type);

    // Remove the message after 5 seconds
    setTimeout(() => {
      messageContainer.innerHTML = "";
    }, 5000);
  }
  function resetFormFields(inputs) {
    inputs.forEach((input) => {
      input.value = "";
    });
  }
</script>










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
  .error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>	
<div class="row">
<div class="login-form">
    <h4 class="login-title">LOGIN</h4>
    <form>

    <div>
        E-mail: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="password">
    </div>
    <div>
    <button type="submit" id="submit" class="login-btn">Login</button>
    </div>
    <div class="message-container"></div> 
    <p>Não tem cadastro? <a href="<?= url("/registro")?>">Cadastrar-se</a> </p>
    <div class="response">

    </div>
</form>

</div>
</div>
</div>

<script type="text/javascript" async>
    const url = `<?= url("api/user/login");?>`;

    async function request (url, options) {
        try {
            const response = await fetch (url, options);
            const data = await response.json();

            return data;
        } catch (err) {
            console.error(err);
            return {
                type: "error",
                message: err.message
                
            };
        }
    }

    document.querySelector("form").addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData(document.querySelector("form"));
        const options = {
            method: 'POST',
            body : formData
        };
        const resp = await request(url, options);
        console.log(resp);
        const messageContainer = document.querySelector(".message-container");

        
        if (resp.type === "success") {
            // Redirect to trends.php on successful login
            window.location.href = '<?= url("trends"); ?>';
        
        } else {
          
          showMessage("Erro: O email ou senha invalidos.", "error");
            // Handle errors or show a message to the user
            // For example, you could display an error message on the login form
            // alert("Login failed. Please try again.");
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

</script>
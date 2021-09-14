<template>
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card">
        <div class="card-header">
          <h3>Registrarse</h3>
        </div>
        <div class="card-body">
          <form>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input v-model="modelUser.name" type="text" class="form-control" placeholder="Nombre">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input v-model="modelUser.last_name" type="text" class="form-control" placeholder="Apellido">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
              </div>
              <input v-model="modelUser.email" type="email" class="form-control" placeholder="Correo electronico">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input v-model="modelUser.password" type="password" class="form-control" placeholder="Contraseña">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input v-model="modelUser.password_confirmation" type="password" class="form-control" placeholder="Confirmar contraseña">
            </div>

            <div class="form-group">
              <input @click="register()" value="Registrarse" class="btn float-right login_btn">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
  export default {
    data() {
      return {
        modelUser: {
          name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
        },
      }
    },
    methods: {
      register() {
        axios.post(route('auth.register.user.api'), {
            name: this.modelUser.name,
            last_name: this.modelUser.last_name,
            email: this.modelUser.email,
            password: this.modelUser.password,
            password_confirmation: this.modelUser.password_confirmation,
          })
          .then(response => {
            toastr.success(response.data.message.success, 201);
            this.$store.commit('auth_user_token/addAccessToken', {
              accessToken: response.data.result.access_token,
              timeExpirationToken: response.data.result.expire_session,
              auth: true,
              user_id: response.data.result.user_id,
              full_name: response.data.result.full_name,
            });
            let urlChange = this.$router.resolve({
              name: 'dashboard',
            });
            window.location.href = urlChange.href;
          })
          .catch(error => {
            if (error.response) {
              if (error.response.status == 401 || error.response.status == 403) {
                var message = '';
                if (error.response.status == 401) {
                  message = error.response.data.message.unauthorized;
                  if (message == undefined) {
                    message = error.response.data.message;
                  }
                } else {
                  message = error.response.data.message.forbidden;
                }
                if (error.response.data.name_route_redirect != null) {
                  var url = error.response.data.name_route_redirect;
                  toastr.error(message, 500);
                } else {
                  toastr.error(message, 500);
                }
              } else if (error.response.status == 400) {
                for (var field in error.response.data.message) {
                  toastr.warning(error.response.data.message[field], 400);
                }
              } else if (error.response.status == 500) {
                if (error.response.data.message.danger != null) {
                  toastr.error(error.response.data.message.danger, 500);
                } else {
                  toastr.error(error.response.data.message, 500);
                }
              } else {
                toastr.error(error.response.data.message, 500);
              }
            } else {
              toastr.error(error.message, 500);
            }
          });
      }
    }
  }
</script>

<style media="screen">
  /* Made with love by Mutiullah Samim*/

  @import url('https://fonts.googleapis.com/css?family=Numans');

  html,
  body {
    background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
  }

  .container {
    height: 100%;
    align-content: center;
  }

  .card {
    height: 370px;
    margin-top: auto;
    margin-bottom: auto;
    width: 400px;
    background-color: rgba(0, 0, 0, 0.5) !important;
  }

  .social_icon span {
    font-size: 60px;
    margin-left: 10px;
    color: #FFC312;
  }

  .social_icon span:hover {
    color: white;
    cursor: pointer;
  }

  .card-header h3 {
    color: white;
  }

  .social_icon {
    position: absolute;
    right: 20px;
    top: -45px;
  }

  .input-group-prepend span {
    width: 50px;
    background-color: #FFC312;
    color: black;
    border: 0 !important;
  }

  input:focus {
    outline: 0 0 0 0 !important;
    box-shadow: 0 0 0 0 !important;

  }

  .remember {
    color: white;
  }

  .remember input {
    width: 20px;
    height: 20px;
    margin-left: 15px;
    margin-right: 5px;
  }

  .login_btn {
    color: black;
    background-color: #FFC312;
    width: 100px;
  }

  .login_btn:hover {
    color: black;
    background-color: white;
  }

  .links {
    color: white;
  }

  .links a {
    margin-left: 4px;
  }
</style>

<template>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">PedidosManzanaVerde</a>
    <a v-if="authUser.auth == true" class="navbar-brand" href="#">{{ 'Bienvenido: ' + authUser.full_name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li v-if="authUser.auth == false" class="ml-4" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
          <router-link :to="{ name : route.path }" :key="key">
            <span :class="route.class"></span>
            {{route.name}}
          </router-link>
        </li>
        <li v-if="authUser.auth == true" class="ml-4" v-for="(route, key) in routes.user" v-bind:key="route.path">
          <router-link :to="{ name : route.path }" :key="key">
            <span :class="route.class"></span>
            {{route.name}}
          </router-link>
        </li>
        <li v-if="authUser.auth == true" class="ml-4">
          <span class="glyphicon glyphicon-log-out"></span>
          <a href="#" @click="logoutApp()">Salir</a>
        </li>
      </ul>
    </div>
  </nav>

</template>

<script>
  export default {
    data() {
      return {
        authUser: this.$store.getters['auth_user_token/credentials'],
        routes: {
          // UNLOGGED
          unlogged: [{
              name: 'Registrarse',
              path: 'register',
              class: 'glyphicon glyphicon-user'
            },
            {
              name: 'Iniciar Session',
              path: 'login',
              class: 'glyphicon glyphicon-log-in'
            }
          ],
          // LOGGED USER
          user: [{
            name: 'Dashboard',
            path: 'dashboard',
            class: 'glyphicon glyphicon-home'
          },
          {
            name: 'Carrito de compra',
            path: 'shoppingcart',
            class: 'glyphicon glyphicon-shopping-cart'
          }
        ],
          // LOGGED ADMIN
        }
      }
    },
    methods: {
      logoutApp: function() {
        axios.defaults.headers.common["Authorization"] = 'Bearer ' + this.authUser.accessToken;
        axios.post(route('logout.api'))
          .then(response => {
            toastr.success(response.data.message.success, 200);
            this.$store.commit('auth_user_token/addAccessToken', {
              accessToken: '',
              timeExpirationToken: '',
              auth: false,
              user_id: '',
              full_name: '',
            });
            let urlChange = this.$router.resolve({
              name: 'login',
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

            this.$router.push({
              name: 'login',
            });

          });
      }
    }
  }
</script>

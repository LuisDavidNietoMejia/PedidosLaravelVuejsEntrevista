<template>
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="row">
        <div class="col-md-3 col-xs-12 col-lg-3" v-for="food in foods" :key="food.food.id" style="margin-top:25px; margin: 0px 15px 0px 25px;">
          <div class="card" style="width: 18rem;">
            <img :src="food.food.image" title="Title of image" alt="alt text here">
            <a style="color:white;" class="btn btn-info text-center">{{ 'Cantidad pedida ' + food.food.cantidad }}</a>
            <a @click="removeFood(food.food)" style="color:white;" class="btn btn-danger text-center">Quitar</a>
            <div class="card-body">
              <h4 style="color:#BDBCBC;" class="text-center card-title">{{ food.food.title }}</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        authUser: this.$store.getters['auth_user_token/credentials'],
        foods: [],
      }
    },
    mounted(){
        this.foods = this.$store.getters['shopping_cart_user_food/foods'](this.authUser.user_id);
    },
    methods: {
      removeFood: function(food) {
        this.$store.commit('shopping_cart_user_food/removeFood', {
          food: food
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
    /* background-size: cover; */
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
  }

  .container {
    height: 100%;
    align-content: center;
  }

  .card {
    margin-top: auto;
    margin-bottom: auto;
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

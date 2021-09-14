<template>
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="row" v-for="food in foods" :key="food.id">

        <div class="col-md-3 col-xs-12 col-lg-3" style="margin-top:25px;">
          <div class="card" style="width: 18rem;">
            <img v-bind:src="food.image" :title="food.title" :alt="food.title">            
            <input type="number" min="1" name="cantidad" v-model="food.cantidad">
            <a @click="taskFood(food)" style="color:white;" class="btn btn-success text-center">Pedir</a>
            <div class="card-body">
              <h4 style="color:#BDBCBC;" class="text-center card-title">{{ food.title }}</h4>
              <p class="card-text" style="color:white;">{{ food.description }}</p>
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
        foods: [
          {
            id: 1,
            title: 'LA LASAÑA',
            image: 'imgfotos/lasaña.jpg',
            description: 'La lasaña de carne picada es una receta de esas de toda la vida que nunca falla. Gusta a mayores y a pequeños. Su elaboración, no es excepcionalmente difícil aunque, sí que hay que seguir una serie de pasos para realizarla. No obstante hasta los más principiantes en la cocina serán capaces de prepararla',
            cantidad: 0
          },
          {
            id: 2,
            title: 'BOLAS DE ARROZ ITALIANAS RELLENAS',
            image: 'imgfotos/bolasdearroz.jpg',
            description: 'Estas bolas de arroz rellenas, las probé hace poco cuando estuve por primera vez en una conocida pizzería de la ciudad en la que resido. Palencia. La pizzería en concreto se llama Kuró. Allí, pedimos unas pizzas y también estas bolas de arroz. Cada una con un relleno distinto. Me sorprendieron y agradaron mucho. Tanto es así que me decidí poco después a prepararlas en casa. Y ahora, quiero ponerla aquí. Vayamos con la receta de las bolas de arroz rellenas.',
            cantidad: 0
          },
          {
            id: 3,
            title: 'ESPAGUETIS EN SALSA PESTO CASERA',
            image: 'imgfotos/espaguetis.jpg',
            description: 'Los espaguetis al pesto, consisten en esta popular pasta, preparada con esta salsa de color verde. La albahaca, es el ingrediente que tornará a nuestros espaguetis de este susodicho color. El pesto es una salsa con mucha personalidad. Tanto por el color como por el sabor. El ajo y el queso le darán un toque potente mientras que la albahaca, le dará un toque anisado. Los ingredientes para preparar los espaguetis al pesto son:',
            cantidad: 0
          },
          {
            id: 4,
            title: 'ENSALADA CESAR',
            image: 'imgfotos/ensaladacesar.jpg',
            description: 'Cuando buscamos una receta de ensaladas, la ensalada César es una de las más conocidas en el mundo. No hay país que no elabore este tipo de ensaladas, siempre adaptándolo a sus costumbres y gustos gastronómicos. Hoy vamos a ver cómo preparar la receta original de la ensalada Cesar. Y por «original» o «auténtica» no me refiero a que, no le puedas añadir algún ingrediente suelto, de tu gusto, que la receta más original del mundo no lleve. Si no que más bien, me refiero a que me pasa mucho que, cuando pido una ensalada Cesar en algún restaurante, me ponen «ensalada con queso de sándwich aderezada con mayonesa comercial». Y no, esto no es lo que tengo en mente por la ensalada Cesar.',
            cantidad: 0
          },
        ]
      }
    },
    methods: {
      getImage: function(src){
        return src;
      },
      taskFood: function(food) {
        food['id'] = Date.now();
        food['user_id'] = this.authUser.user_id;
        this.$store.commit('shopping_cart_user_food/addFood', {
          food: food,
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

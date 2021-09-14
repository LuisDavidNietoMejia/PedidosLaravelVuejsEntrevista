const state = {
  foods: [],
}
const mutations = {
  addFood (state, food) {
    console.log(food.food.cantidad);
    if(food.food.cantidad == 0){
      toastr.error('La cantidad debe ser mayor a 0', 400);
      return;
    }
    toastr.success('Se realizo su pedido con exito', 200);
    state.foods.push(food);
  },
  removeFood (state, food) {
    const i = state.foods.map(item => item.id).indexOf(food.id);
    state.foods.splice(i, 1);
    toastr.success('Comida eliminada con exito', 200);
  }
}
const actions = {
    addFood (state, payload) {
     state.commit('addFood', payload);
   },
   removeFood (state, payload) {
     state.commit('removeFood', payload);
   }
}
const getters = {
  foods: state => (user_id, params) => {
      var filterUserFoods = state.foods.filter((food)=> {
                return food.food.user_id === user_id;
      });
      console.log(filterUserFoods);
      return filterUserFoods;
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}

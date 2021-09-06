import { isLoggedIn, logOut } from './shared/utilities/auth';
export default {
    state: {
        basket: {
            items: []
        },
        isLoggedIn: false,
        user: {}
    },
    mutations: {
        setBasket(state, payload) {
            state.basket = payload;
        },
        addToBasket(state, payload) {
            state.basket.items.push(payload);
        },
        removeFromBasket(state, payload) {
            state.basket.items = state.basket.items.filter(item => item.id !== payload);
        },
        setUser(state, payload) {
            state.user = payload;
        },
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        }
    },
    actions:{
        loadStoredState(context) {
          const basket = localStorage.getItem('basket');
          if(basket) {
              context.commit('setBasket', JSON.parse(basket));
          }
          context.commit('setLoggedIn', isLoggedIn());
        },
        addToBasket({commit, state}, payload) {
            commit('addToBasket', payload);
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        removeFromBasket({commit, state}, payload) {
            commit('removeFromBasket', payload);
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        emptyBasket({commit, state}, payload) {
          commit('setBasket', { items: [] });
          localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        async loadUser({ commit, dispatch }) {
            if(isLoggedIn()) {
                try {
                    const user = (await axios.get('/kingdom_vision/user')).data;
                    console.log(user.id);
                    commit("setUser", user);
                    commit("setLoggedIn", true);
                    if(user) {
                        await axios.get(`/kingdom_vision/api/cart/${user.id}`)
                            .then(
                                response => {
                                    commit("setBasket", { items: response.data });
                                }
                            );
                    }
                }
                catch(error) {
                    dispatch("logout");
                }
            }
        },
        logout({commit}) {
            commit("setUser", {});
            commit("setLoggedIn", false);
            logOut();
        }
    },
    getters: {
        itemsInBasket: (state) => state.basket.items.length,
        loggedUser: (state) => state.user,
        alreadyInBasket(state) {
            return function (id) {
                return state.basket.items.reduce(
                    (result, item) => result || item.id === id,
                    false
                );
            }
        }
    },
};

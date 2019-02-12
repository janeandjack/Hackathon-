$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
Vue.component('my-modal',{
    template:`
    <div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
      <div class="box">
     <slot></slot>
      </div>
    </div>
    <button class="modal-close is-large" @click="$emit('close')" aria-label="close"></button>
  </div>
    
    
    
    
    
    `
})



new Vue({
    el:'#root',
    data:{
        showLoginModal:false,
        showsignoutModal:false,
        showregModal:false,
    }
})

import SubcribeComponent from './components/SubcribeComponent.js';

let router = new VueRouter({

  routes: [
      { path: '/', redirect: { name: "login"} },
      { path: '/login', name: "subcribe", component: SubcribeComponent }
  ]
});

const vm = new Vue({
 
  data: {
    authenticated: false,
    administrator: false,

    genericMessage: "hello from the parent",

    mockAccount: {
      username: "user",
      password: "password"
    },

    user: [],

    currentUser: {}
  },

  // created: function() {
  //   if (this.authenticated == false) {
  //     this.$router.push({ path: "/login" });
  //   }
  // },

  methods: {
    setAuthenticated(status, data) {
        this.authenticated = status;
        this.user = data;
    },

    logout() {
        this.$router.push({ path: "/login" }); 
        this.authenticated = false;        
    },

    setCurrentUser(user) {
      debugger;
      console.log('setting current user');

      this.currentUser = user;
      this.$router.push({path: "/userhome"});
    }
  },

  router: router
}).$mount("#app");

router.beforeEach((to, from, next) => {
  console.log('router guard fired!', to, from, vm.authenticated);

  if (vm.authenticated == false) {
    next("/login");
  } else {
    next();
  }
});
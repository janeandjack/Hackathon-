export default {
    template: `
    <form class="px-4 py-3">
    <div class="form-group">
      <label for="first_name">First Name: 
        <input type="text" v-model="input.first_name" id="first_name" required>
    </label>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name: 
        <input type="text" v-model="input.last_name" id="last_name" required>
    </label>
    </div>
    <div class="form-group">
      <label for="email">Email: 
        <input type="email" v-model="input.email" id="email" required>
    </label>
    </div>
    <div class="form-group">
      <label for="country">Country: 
        <input type="text" v-model="input.country" id="country" required>
    </div>
  </label>
    <button type="submit" v-on:click.prevent="subcribe()" class="btn btn-primary">SUBSCRIBE</button>
</form>
     `,
 
     data() {
         return {
             input: {
                first_name: "",
                last_name: "",
                email: "",
                country: ""
             },
         }
     },
 
     methods: {
         subscribe() {
            //console.log(this.$parent.mockAccount.username);
 
            if(this.input.first_name != "" && this.input.last_name != "" && this.input.email != ""&& this.input.country != "") {
            // fetch the user from the DB
            // generate the form data
            let formData = new FormData();

             formData.append("first_name", this.input.first_name);
             formData.append("last_name", this.input.last_name);
             formData.append("email", this.input.email);
             formData.append("country", this.input.country);

             let url = `./admin/sign-up.php`;
 
             fetch(url, {
                    method: 'POST',
                    body: formData
                })
                 .then(res => res.json())
                 .then(data => {
                    if (data == "Subcribe Failed") {
                      console.warn(data);
                         //this.authenticated = false;
                         console.log("authentication failed, please try again");
                    } else {
                         this.$emit("authenticated", true, data[0]);
                         this.$router.replace({ name: "users" });
                    }
                })
             .catch(function(error) { 
                 console.log(error);
             });
        } else {
                 console.log("Please fill the form!");
            }
        }
    }
 }
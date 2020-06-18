<template>
  <div class="container" style="margin-top: 10px;">
    <v-col cols="12">
      <v-card color="#385F73" dark>
        <v-card-title class="headline">Total New Products</v-card-title>
        <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>
      </v-card>
    </v-col>
    <form @submit.prevent="postToApi()">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="name"
              placeholder="Name Items"
              v-model="formsitems.name"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="stock"
              placeholder="stock Items"
              v-model="formsitems.stock"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="unit"
              placeholder="Unit Items"
              v-model="formsitems.unit"
            />
          </div>
          <div class="form-group">
            <button class="btn btn-sm btn-success">Submit</button>
            <router-link class="btn btn-sm btn-info" to="/">Back</router-link>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script lang="ts">
export default {
  data() {
    return {
      formsitems: {
        name: "",
        stock: "",
        unit: ""
      }
    };
  },
  methods: {
    postToApi() {
      const data = {
        name: this.formsitems.name,
        stock: this.formsitems.stock,
        unit: this.formsitems.unit
      };
      axios
        .post("http://localhost:8000/api/items/create", data)
        .then(result => {
          // console.log(result);
          this.$router.push({ path: "/items" });
        });
    }
  }
};
</script>

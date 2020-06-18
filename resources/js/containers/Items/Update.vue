<template>
  <div class="container" style="margin-top: 10px;">
    <form @submit.prevent="patchToApi()">
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
  created() {
    this.getToApi();
  },
  methods: {
    getToApi() {
      axios
        .get("http://127.0.0.1:8000/api/items/detail/" + this.$route.params.id)
        .then(result => {
          this.formsitems.name = result.data.name;
          this.formsitems.stock = result.data.stock;
          this.formsitems.unit = result.data.unit;
        });
    },

    patchToApi() {
      const data = {
        name: this.formsitems.name,
        stock: this.formsitems.stock,
        unit: this.formsitems.unit
      };
      axios
        .put(
          "http://127.0.0.1:8000/api/items/update/" + this.$route.params.id,
          {
            name: this.formsitems.name,
            stock: this.formsitems.stock,
            unit: this.formsitems.unit
          }
        )
        .then(result => {
          this.$router.push({ path: "/items" });
        });
    }
  }
};
</script>

<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <v-col cols="12">
          <v-card color="#385F73" dark>
            <v-card-title class="headline">Total New Products</v-card-title>

            <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>

            <v-card-actions>
              <router-link class="mx-2" fab dark small color="primary" to="/items/create">
                <v-btn text small>Create new products</v-btn>
              </router-link>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12">
          <div class="card">
            <div class="card-body">
              <!-- <table class="table table-bordered table-stripped">
                <thead>
                  <tr>
                    <th>Name Items</th>
                    <th>Stock Items</th>
                    <th>Unit Items</th>
                    <th>Date</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in items" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.stock }}</td>
                    <td>{{ item.unit }}</td>
                    <td>{{ item.created_at }}</td>
                    <td>{{ item.updated_at }}</td>
                    <td>
                      <v-btn class="btn btn-sm btn-info" x-small :to="/items/ + item.id">edit</v-btn>
                      <v-btn
                        class="btn btn-sm btn-danger"
                        x-small
                        v-on:click="handleDelete(item.id)"
                      >Delete</v-btn>
                    </td>
                  </tr>
                </tbody>
              </table>-->
              <v-data-table
                :headers="headers"
                :items="items"
                sort-by="calories"
                class="elevation-1"
                data-app
              >
                <template v-slot:top></template>
                <template v-slot:item.actions="{ item }">
                  <v-icon small class="mr-2">mdi-pencil</v-icon>
                  <v-icon small @click="handleDelete(item.id)">mdi-delete</v-icon>
                </template>
                <template v-slot:no-data>
                  <p>Data Tidak ada</p>
                </template>
              </v-data-table>
            </div>
          </div>
        </v-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],

      headers: [
        { text: "items name", value: "name" },
        { text: "stock", value: "stock" },
        { text: "unit", value: "unit" },
        { text: "date", value: "created_at" },
        { text: "date", value: "updated_at" },
        { text: "Actions", value: "actions", sortable: false }
      ],
      editedIndex: -1
    };
  },

  created() {
    this.getToApi();
  },
  methods: {
    getToApi() {
      axios.get("http://127.0.0.1:8000/api/items").then(result => {
        this.items = result.data;
      });
    },

    handleDelete(id) {
      axios.delete("http://127.0.0.1:8000/api/items/" + id).then(result => {
        this.getToApi();
      });
    }
  }
};
</script>

<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <v-col cols="12">
          <v-card color="#385F73" dark>
            <v-card-title class="headline">Total New Products</v-card-title>

            <v-card-subtitle>
              Lorem ipsum dolor, sit amet consectetur adipisicing
              elit. Nemo dolore nostrum voluptatum ad, praesentium
              magnam asperiores nam dolor quisquam consectetur
              suscipit ratione corrupti minima nihil assumenda
              ipsum ut quia at.
            </v-card-subtitle>

            <v-card-actions>
              <router-link class="mx-2" fab dark small color="primary" to="/products/create">
                <v-btn text small>Create new products</v-btn>
              </router-link>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12">
          <v-row justify="center">
            <v-col cols="12" sm="10" md="8" lg="6">
              <form @submit.prevent="postTransaction()">
                <v-card-text>
                  <v-text-field
                    ref="name"
                    label="Customers Name"
                    v-model="formTransaction.user_id"
                    placeholder="Customers Name"
                    required
                  ></v-text-field>
                </v-card-text>
                <v-card-text>
                  <v-text-field
                    ref="name"
                    label="Total Price"
                    v-model="formTransaction.total_price"
                    placeholder="Total Price"
                    required
                  ></v-text-field>
                </v-card-text>
                <v-card-text>
                  <v-text-field
                    ref="name"
                    label="Total Amount"
                    v-model="formTransaction.total_amount"
                    placeholder="Total Amoun"
                    required
                  ></v-text-field>
                </v-card-text>
                <v-divider class="mt-12"></v-divider>
                <v-card-actions>
                  <v-btn text>Cancel</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="primary"
                    type="submit"
                    text
                    @submit.prevent="postTransaction()"
                  >Submit</v-btn>
                </v-card-actions>
              </form>
            </v-col>
            <v-col cols="12" sm="10" md="8" lg="6">
              <v-card ref="form">
                <v-data-table
                  :headers="headers"
                  :items="transactions"
                  sort-by="calories"
                  class="elevation-1"
                >
                  <template v-slot:top></template>
                  <template v-slot:item.actions="{ item }">
                    <!-- <v-icon small class="mr-2">mdi-pencil</v-icon> -->
                    <v-icon small @click="handleDelete(item.id)">mdi-delete</v-icon>
                  </template>
                  <template v-slot:no-data>
                    <v-btn color="primary">Reset</v-btn>
                  </template>
                </v-data-table>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      headers: [
        // {
        //   text: "Dessert (100g serving)",
        //   align: "start",
        //   sortable: false,
        //   value: "id"
        // },
        { text: "total amount", value: "user.name" },
        { text: "total amount", value: "user.email" },
        { text: "total price", value: "total_price" },
        { text: "total amount", value: "total_amount" },
        { text: "Actions", value: "actions", sortable: false }
      ],

      transactions: [],
      value: null,
      editedIndex: -1,
      dbSelect: null,
      dbOptions: [],
      formTransaction: {
        user_id: "",
        total_price: "",
        total_amount: ""
      }
    };
  },
  created() {
    this.getTransaction();
    const selectValues = [
      { id: 1, name: "A" },
      { id: 2, name: "B" },
      { id: 3, name: "C" },
      { id: 4, name: "D" },
      { id: 5, name: "E" }
    ];
    this.dbOptions = selectValues;
  },
  methods: {
    getTransaction() {
      const urls = "http://127.0.0.1:8000/api/transaction";
      // get trasactions
      axios({
        method: "get",
        url: urls
      }).then(result => {
        this.transactions = result.data;
        // console.log(this.transactions);
      });
    },
    postTransaction() {
      const urls = "http://127.0.0.1:8000/api/transaction/create";
      const data = {
        user_id: this.formTransaction.user_id,
        total_price: this.formTransaction.total_price,
        total_amount: this.formTransaction.total_amount
      };
      axios.post(urls, data).then(result => {
        this.getTransaction();
        this.formTransaction = {
          user_id: "",
          total_price: "",
          total_amount: ""
        };
      });
    },
    handleDelete(id) {
      const urls = "http://127.0.0.1:8000/api/transaction/delete/";
      axios.delete(urls + id).then(result => {
        const index = this.transactions.indexOf(id);
        this.transactions.splice(index, 1);
        this.getTransaction();
      });
      // console.log(id);
    }
  }
};
</script>

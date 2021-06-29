<template>
  <app-layout>
    <ul class="flex flex-row">
      <li class="text-gray-300 text-sm">Dashboard&nbsp;/&nbsp;</li>
      <li class="text-gray-400 text-sm">Products</li>
    </ul>
    <inertia-link class="bg-blue-900 border-red-900 mb-5 px-3 rounded-full text-white" href="/admin/products/create">Create</inertia-link>
    <table class="table w-full">
        <thead>
            <tr class="border-2 border-blue-900">
                <th class="text-left px-4 py-2">#</th>
                <th class="text-left px-4 py-2">Name</th>
                <th class="text-left px-4 py-2">Price</th>
                <th class="text-left px-4 py-2">User</th>
                <th class="text-left px-4 py-2">Views</th>
                <th class="text-left px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-200" v-for="product in productList.data" :key="product.id">
                <td class="px-4 py-2">{{product.id}}</td>
                <td class="px-4 py-2">{{product.name}}</td>
                <td class="px-4 py-2">{{product.price}}</td>
                <td class="px-4 py-2">{{product.user_id}}</td>
                <td class="px-4 py-2">{{product.views}}</td>
                <td class="px-4 py-2">
                  <button @click="deleteRow(product.id)" class="bg-red-900 border-red-900 mb-5 px-3 rounded-full text-white">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
    <Pagination class="mt-6" :links="productList.links" />
  </app-layout>
</template>

<script>
import AppLayout from "@/Pages/Ecommerce/panel";
import Pagination from "@/Jetstream/Pagination";

export default {
  components: {
    AppLayout,
    Pagination,
  },
  props: {
    productList: Object
  },
  data() {
    return {
      // data: Object,
    };
  },
  methods: {
    deleteRow (id) {
      if (!confirm("Are you sure want to remove?")) return;
      var data={};
      data._method = "DELETE";
      data.id = id;
      this.$inertia.post("/admin/products/" + data.id, data);
    }
  },
};
</script>

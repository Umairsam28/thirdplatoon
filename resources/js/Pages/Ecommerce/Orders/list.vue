<template>
  <app-layout>
    <ul class="flex flex-row">
      <li class="text-gray-300 text-sm">Dashboard&nbsp;/&nbsp;</li>
      <li class="text-gray-400 text-sm">Orders</li>
    </ul>
    <table class="table w-full">
        <thead>
            <tr class="border-2 border-blue-900">
                <th class="text-left px-4 py-2">#</th>
                <th class="text-left px-4 py-2">Name</th>
                <th class="text-left px-4 py-2">Total</th>
                <th class="text-left px-4 py-2">User</th>
                <th class="text-left px-4 py-2">Date</th>
                <th class="text-left px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-200" v-for="product in ordersList.data" :key="product.id">
                <td class="px-4 py-2">{{product.id}}</td>
                <td class="px-4 py-2">{{product.first_name}} {{product.last_name}}</td>
                <td class="px-4 py-2">${{product.total}}</td>
                <td class="px-4 py-2">{{product.email}}</td>
                <td class="px-4 py-2">{{product.created_at}}</td>
                <td class="px-4 py-2">
                  <a target="_blank" :href="'/order/invoice/'+product.id" class="bg-green-900 border-red-900 mb-5 px-3 rounded-full text-white">Invoice</a>
                </td>
            </tr>
        </tbody>
    </table>
    <Pagination class="mt-6" :links="ordersList.links" />
  </app-layout>
</template>

<script>
import AppLayout from "@/Pages/Ecommerce/panel";
import Pagination from "@/Jetstream/Pagination";

export default {
  components: {
    AppLayout,
    Pagination
  },
  props: {
    ordersList: Object
  },
  data() {
    return {
      // data: Object,
    };
  },
  methods: {
    
  },
};
</script>

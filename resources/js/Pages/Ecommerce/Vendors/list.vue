<template>
  <app-layout>
    <ul class="flex flex-row">
      <li class="text-gray-300 text-sm">Dashboard&nbsp;/&nbsp;</li>
      <li class="text-gray-400 text-sm">Vendors</li>
    </ul>
    <table class="table w-full">
        <thead>
            <tr class="border-2 border-blue-900">
                <th class="text-left px-4 py-2">#</th>
                <th class="text-left px-4 py-2">Name</th>
                <th class="text-left px-4 py-2">Email</th>
                <th class="text-left px-4 py-2">Is Vendor?</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-200" v-for="(user, userk) in usersList.data" :key="userk">
                <td class="px-4 py-2">{{user.id}}</td>
                <td class="px-4 py-2">{{user.name}}</td>
                <td class="px-4 py-2">{{user.email}}</td>
                <td class="px-4 py-2">
                    <div @click="updateVendor(user.id, userk)" class="w-20 text-center font-bold cursor-pointer rounded" :class="[user.is_vendor==1?'bg-green-200':'bg-red-200']">
                        {{user.is_vendor==1?'Yes':'No'}}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <Pagination class="mt-6" :links="usersList.links" />
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
    usersList: Object
  },
  data() {
    return {
    //   results = []
    };
  },
  methods: {
    async updateVendor (id, userk) {
      /*var _result = await */fetch("/admin/ecommerce/vendors-toggle/" + id).then(e=>e.json());
      this.$page.usersList.data[userk].is_vendor = !this.$page.usersList.data[userk].is_vendor;
    }
  },
};
</script>

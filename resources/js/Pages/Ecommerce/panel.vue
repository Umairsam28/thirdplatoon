<template>
  <app-layout>
    <template #header>
      <ul class="flex">
        <li
          class="
            transition
            duration-200
            ease-linear
            flex
            hover:bg-blue-500
            hover:text-white
            items-center
            p-1.5
            rounded
          "
        >
          <inertia-link href="/admin/products"
            >Products
            <span
              class="
                bg-blue-900
                border-red-900
                h-24
                items-center
                justify-center
                px-3
                py-1
                rounded-full
                text-white
                w-24
              "
              >{{productCount}}</span
            ></inertia-link
          >
        </li>
        <li
          class="
            transition
            duration-200
            ease-linear
            flex
            hover:bg-blue-500
            hover:text-white
            items-center
            p-1.5
            rounded
          "
        >
          <inertia-link href="/admin/orders"
            >Orders
            <span
              class="
                bg-blue-900
                border-red-900
                h-24
                items-center
                justify-center
                px-3
                py-1
                rounded-full
                text-white
                w-24
              "
              >{{ordersCount}}</span
            ></inertia-link
          >
        </li>
        <li
          v-if="user.user_type=='admin'"
          class="
            transition
            duration-200
            ease-linear
            flex
            hover:bg-blue-500
            hover:text-white
            items-center
            p-1.5
            rounded
          "
        >
          <inertia-link href="/admin/ecommerce/category"
            >Categories
            <span
              class="
                bg-blue-900
                border-red-900
                h-24
                items-center
                justify-center
                px-3
                py-1
                rounded-full
                text-white
                w-24
              "
              >{{categoryCount}}</span
            ></inertia-link
          >
        </li>
        <li
          v-if="user.user_type=='admin'"
          class="
            transition
            duration-200
            ease-linear
            flex
            hover:bg-blue-500
            hover:text-white
            items-center
            p-1.5
            rounded
          "
        >
          <inertia-link href="/admin/ecommerce/vendors"
            >Vendors
            <span
              class="
                bg-blue-900
                border-red-900
                h-24
                items-center
                justify-center
                px-3
                py-1
                rounded-full
                text-white
                w-24
              "
              >{{vendorsCount}}</span
            ></inertia-link
          >
        </li>
      </ul>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
          <slot />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  data() {
    return {
      productCount: 0,
      categoryCount: 0,
      vendorsCount: 0,
      ordersCount: 0,
      user: {}
    };
  },
  methods: {
    async getSummary () {
      var _data = await fetch('/admin/ecommerce/summary').then(e=>e.json()).then(e=>{
        return e;
      });
      this.productCount = _data.productCount;
      this.categoryCount = _data.categoryCount;
      this.vendorsCount = _data.vendorsCount
      this.ordersCount = _data.ordersCount,
      this.user = _data.user
    }
  },
  mounted () {
    this.getSummary();
  }
};
</script>

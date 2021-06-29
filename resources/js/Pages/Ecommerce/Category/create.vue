<template>
  <app-layout>
    <ul class="flex flex-row">
      <li class="text-gray-300 text-sm">Dashboard&nbsp;/&nbsp;</li>
      <li class="text-gray-300 text-sm">Category&nbsp;/&nbsp;</li>
      <li class="text-gray-400 text-sm">Create</li>
    </ul>
    <hr class="mb-5 mt-2" />
    <div class="grid grid-cols-2 gap-6 mb-4">
      <div>
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2"
          >Name:</label
        >
        <input
          type="text"
          v-model="form.name"
          id="name"
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none
            focus:shadow-outline
          "
          placeholder="Enter Name"
        />
      </div>
      <div>
        <label for="slug" class="block text-gray-700 text-sm font-bold mb-2"
          >Slug:</label
        >
        <input
          type="text"
          v-model="form.slug"
          id="slug"
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none
            focus:shadow-outline
          "
          placeholder="Enter Slug"
        />
      </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mb-4">
        <div class="col-span-1">
        <label
          for="handle_stock"
          class="block text-gray-700 text-sm font-bold mb-2"
          >Active?</label
        >
        <input
          type="checkbox"
          v-model="form.is_active"
          id="is_active"
        />
      </div>
    </div>
    <div class="flex mt-2 flex-row-reverse">
        <button @click="saveData" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
           Save
        </button>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Pages/Ecommerce/panel";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  components: {
    AppLayout,
  },
  props: {},
  data() {
    return {
      form: {
        name: "",
        slug: "",
        is_active: true,
      },
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      metaOpen: false,
      mediaOpen: true,
    };
  },
  watch: {
    "form.name": function () {
      let _val = this.form.name;
      _val = _val.replace(/([^a-zA-Z0-9\-_\s]+)/gi, "");
      _val = _val.replace(/\s+/g, "-");
      this.form.slug = _val.toLowerCase();
    },
  },
  methods: {
      saveData () {
        this.$inertia.post("/admin/ecommerce/category", this.formDataSend,{
          forceFormData: true,
        }).then(e=>{
          console.log(e);
        });
      }
  },
  computed: {
    formDataSend () {
      const data = new FormData();
      data.append('_method','POST');
      for (let j in this.form) {
        data.append(j, this.form[j]);
      }
      return data;
    }
  }
};
</script>

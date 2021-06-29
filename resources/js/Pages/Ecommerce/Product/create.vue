<template>
  <app-layout>
    <ul class="flex flex-row">
      <li class="text-gray-300 text-sm">Dashboard&nbsp;/&nbsp;</li>
      <li class="text-gray-300 text-sm">Products&nbsp;/&nbsp;</li>
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
    <div class="grid grid-cols-2 gap-6 mb-4">
      <div>
        <label
          for="short_description"
          class="block text-gray-700 text-sm font-bold mb-2"
          >Short Description:</label
        >
        <textarea
          v-model="form.short_description"
          id="short_description"
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
          placeholder="Enter Short Description"
          rows="4"
        />
      </div>
      <div>
        <label
          for="description"
          class="block text-gray-700 text-sm font-bold mb-2"
          >Description:</label
        >
        <ckeditor
          :editor="editor"
          v-model="form.description"
          :config="editorConfig"
        ></ckeditor>
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
      <div class="col-span-2">
        <label
          for="handle_stock"
          class="block text-gray-700 text-sm font-bold mb-2"
          >Manage Stock?</label
        >
        <input
          type="checkbox"
          v-model="form.handle_stock"
          id="handle_stock"
        />
      </div>
      <div class="col-span-3" v-if="form.handle_stock === true">
        <label for="stock" class="block text-gray-700 text-sm font-bold mb-2"
          >Stock:</label
        >
        <input
          type="number"
          v-model="form.stock"
          id="stock"
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
          placeholder="Enter Stock"
        />
      </div>
      <div class="col-span-3">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2"
          >Price:</label
        >
        <input
          type="number"
          step="any"
          v-model="form.price"
          id="price"
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
          placeholder="Enter Price"
        />
      </div>
      <div class="col-span-3">
        <label for="discount" class="block text-gray-700 text-sm font-bold mb-2"
          >Discount %:</label
        >
        <input
          type="number"
          step="any"
          v-model="form.discount"
          id="discount"
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
          placeholder="Enter Discount%"
        />
      </div>
    </div>
    <div class="bg-gray-200 p-2">
      <h1 @click="mediaOpen = !mediaOpen" class="font-bold text-black">
        Media Management
        <div
          class="
            inline-block
            align-middle
            ml-1
            transition
            duration-100
            ease-in-out
          "
          :class="[
            mediaOpen === true ? 'transform rotate-0' : 'transform rotate-180',
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="fill-current h-4 w-4"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
      </h1>
      <div
        v-if="mediaOpen === true"
        class="gap-6 grid grid-cols-12 mb-4 transition duration-500 ease-in-out"
      >
        <div class="col-span-6">
          <label for="select_files" class="block text-gray-700 text-sm font-bold mb-2"
            >Select Files:</label
          >
          <input
            type="file"
            id="select_files"
            ref="images"
            multiple
            class="
              bg-white
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
          />
        </div>
      </div>
    </div>
    <hr class="mb-5 mt-5" />
    <div class="bg-gray-200 p-2">
      <h1 @click="metaOpen = !metaOpen" class="font-bold text-black">
        Meta Management
        <div
          class="
            inline-block
            align-middle
            ml-1
            transition
            duration-100
            ease-in-out
          "
          :class="[
            metaOpen === true ? 'transform rotate-0' : 'transform rotate-180',
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="fill-current h-4 w-4"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
      </h1>
      <div
        v-if="metaOpen === true"
        class="gap-6 grid grid-cols-12 mb-4 transition duration-500 ease-in-out"
      >
        <div class="col-span-3">
          <label
            for="meta_title"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Title:</label
          >
          <input
            type="text"
            v-model="form.meta_title"
            id="meta_title"
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
            placeholder="Enter Title"
          />
        </div>
        <div class="col-span-3">
          <label
            for="meta_keywords"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Keywords:</label
          >
          <input
            type="text"
            v-model="form.meta_keywords"
            id="meta_keywords"
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
            placeholder="Enter Keywords"
          />
        </div>
        <div class="col-span-6">
          <label
            for="meta_description"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Description:</label
          >
          <input
            type="text"
            v-model="form.meta_description"
            id="meta_description"
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
            placeholder="Enter Description"
          />
        </div>
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
        handle_stock: true,
        is_active: true,
        stock: 0,
        meta_description: "",
        meta_keywords: "",
        meta_title: "",
        short_description: "",
        description: "",
        price: 0,
        discount: 0,
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
        this.$inertia.post("/admin/products", this.formDataSend,{
          forceFormData: true,
        }).then(e=>{
          console.log(e);
        });
      }
  },
  computed: {
    formDataSend () {
      const files = this.$refs.images.files;
      const data = new FormData();
      console.log(files)
      data.append('_method','POST');
      for(var i = 0; i < files.length; i++){
        data.append('images['+i+']', files[i]);
      }
      for (let j in this.form) {
        data.append(j, this.form[j]);
      }
      return data;
    }
  }
};
</script>

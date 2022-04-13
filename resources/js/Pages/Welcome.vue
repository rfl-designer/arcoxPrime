
<template>
<app-layout-customer title="Home" :categories="categories">
  <div class="h-[450px] bg-emerald-700"></div>
  <div class="mt-8 px-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 xl:gap-4">
      <div class="col-span-1 border border-slate-300 hover:shadow-xl" v-for="product in products.slice(0, 12)" :key="product.id">
        <div class="w-full bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:aspect-none">
          <img :src="'/storage/img/product_image.png'" :alt="product.name" class="-z-10 w-full object-center object-cover lg:w-full">
        </div>
        <div class="my-4 px-2 flex flex-col items-center justify-between">
          <div class="">
            <h3 class="text-sm text-center font-semibold text-black ">
              <Link :href="route('shop.show', product.slug)">
                <span aria-hidden="true" class="inset-0 text-black">{{ product.name }}</span>
              </Link>
            </h3>
            <p class="mt-1 text-sm text-slate-500 text-center">{{ $filters.formatCurrency(product.price) }}</p>
          </div>
          <button 
            class="text-xs uppercase font-medium text-black bg-emerald-500 py-2 w-full rounded mt-2 hover:brightness-90"
          >
          ADICIONAR AO CARRINHO
          </button>
        </div>
      </div>
  </div>
</app-layout-customer>
</template>

<script>
import AppLayoutCustomer from '../Layouts/AppLayoutCustomer.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
  props: ['products', 'categories'],
  components: {
    AppLayoutCustomer,
    Link,
  },
  setup() {
  },
  emits: [
    'categories'
  ]
}
</script>


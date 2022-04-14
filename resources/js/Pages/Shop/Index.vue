<template>
    <app-layout-customer :title="`Catálogo: ${categoryName}`" :categories="categories">
        <h2 class="text-base text-white font-medium py-2 text-center w-full bg-emerald-900">
            Catálogo</h2>
        <breadcrumb-shop>
            <template #breadcrumb>
                <div>
                    <span class="text-rose-900">{{ categoryName }}</span>
                </div>
            </template>
        </breadcrumb-shop>
        <div class="flex p-4 shadow mx-12 rounded-md">
            <div class="w-3/12 h-fit flex flex-col border border-slate-200 rounded-md overflow-hidden">
                <span class="text-lg text-black font-medium py-2 w-full pl-4 bg-emerald-200">Filtrar
                    por Categorias:</span>
                <div
                    class="flex flex-col h-fit divide-y divide-slate-100 hover:divide-white last:border-b last:border-slate-100">
                    <Link :href="route('shop.index', { category: category.slug })"
                        v-for="(category, index) in categories" :key="index"
                        class="py-4 pl-4 w-full text-emerald-900 hover:text-emerald-900 hover:bg-emerald-100 hover:rounded-md"
                        :class="route().current('shop.index', { category: category.slug }) ? 'bg-emerald-100 text-emerald-900' : 'bg-white text-emerald-900'">
                    {{ category.name }}
                    </Link>
                </div>
            </div>
            <div class="w-9/12 px-4">
                <h3 class="text-lg text-emerald-900 mb-2">Produtos</h3>
                <hr />
                <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 lg:gap-4">
                    <div class="col-span-1 border border-slate-300 hover:shadow-xl rounded" v-for="product in products"
                        :key="product.id">
                        <div
                            class="w-full  bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  lg:aspect-none">
                            <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                                class="-z-10 w-full object-center object-cover ">
                        </div>
                        <div class="my-4 px-2 flex flex-col items-center justify-between">
                            <div class="">
                                <h3 class="text-sm text-center font-semibold ">
                                    <Link :href="route('shop.show', product.slug)">
                                    <span aria-hidden="true" class="inset-0 text-black">{{ product.name }}</span>
                                    </Link>
                                </h3>
                                <p class="mt-1 text-sm text-slate-500 text-center">{{
                                    $filters.formatCurrency(product.price)
                                }}
                                </p>
                            </div>
                            <form @submit.prevent="form.post(`/addcart/${product.id}`)" class="w-full">
                                <input type="number" v-model="form.quantity" class="hidden">
                                <button type="submit"
                                    class="text-xs uppercase font-medium text-black bg-emerald-500 py-2 w-full rounded mt-2 hover:brightness-90">
                                    ADICIONAR AO CARRINHO
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout-customer>
</template>

<script>
import AppLayoutCustomer from '@/Layouts/AppLayoutCustomer.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/outline'
import BreadcrumbShop from '@/Components/BreadcrumbShop.vue'

export default {
    components: {
        AppLayoutCustomer,
        Link,
        Head,
        ChevronRightIcon,
        HomeIcon,
        BreadcrumbShop,
    },
    props: ['products', 'categories', 'categoryName'],
    setup() {
    const form = useForm({
      quantity: 1,
    })

    return {
      form,
    }
  },

}
</script>

